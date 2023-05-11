<?php

namespace App\Http\Controllers;

use App\Events\UserEmailVerified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class WebEmailVerifyController extends Controller
{
    public function create()
    {
        return view('sessions.verify-email');
    }

    public function store(EmailVerificationRequest $request)
    {
//        dd($request->user());  //先看一下有什麼
        $request->fulfill();
        // 觸發歡迎信
        event(new UserEmailVerified($request->user()));
        return redirect('/profile');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect('/')->with('message', 'Verification link sent!');
    }
}
