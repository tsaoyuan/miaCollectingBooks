<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function create(string $token)
    {
        return view('sessions.password_reset', ['token' => $token]);
    }

    public function store(Request $request)
    {
        // 表單內容驗證
        $credential = $request->validate([
            'token' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // broker 驗證使用者、驗證token、重設密碼（hash）
        $result = Password::broker('users')->reset(
            $credential,
            function (User $user, $password) {
                $user->update(
                    ['password' => Hash::make($password)]
                );
            }
        ); // 如果成功，$result = 'passwords.reset'

        return redirect('/login')->with('success', '密碼重設成功！請重新登入！');
    }

    public function resetPassword(Request $request)
    {
       $credential = $request->validate([
           'token' => 'required|string',
           'email' => 'required|email',
           'password' => 'required|min:6',
       ]) ;


       // 官方文件，想請SoJ幫忙說明一下
       $status = Password::reset(
           $credential,
           function (User $user, string $password) {
               $user->forceFill([
                   'password' => Hash::make($password)
               ])->setRememberToken(Str::random(60));

               $user->save();

               event(new PasswordReset($user));
           }
       );

       if ( $status === Password::PASSWORD_RESET) {
           return redirect()->route('login')->with('status', __($status));
       } else {
           return back()->withErrors(['email' => [__($status)]]);
       }

    }
}
