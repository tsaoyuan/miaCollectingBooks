<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;

class PasswordForgotController extends Controller
{
    public function create()
    {
        return view('sessions.password_forgot');
    }

    public function store(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email'
        ]);

        // 呼叫 Password::broker() 在 users table 找到對應的使用者
        // 並寄出密碼重設連結到使用者輸入的 email
        $result = Password::broker('users')->sendResetLink($credential);

        abort_if(
            $result !== Password::RESET_LINK_SENT,
            Response::HTTP_BAD_REQUEST,
            __($result)
        );

        return redirect('/')->with('success', '請至email信箱收取重設連結!');

    }
}
