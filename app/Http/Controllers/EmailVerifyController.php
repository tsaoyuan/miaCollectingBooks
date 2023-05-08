<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function create()
    {
        return view('sessions.verify-email');
    }

    public function store(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/profile');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return redirect('/')->with('message', 'Verification link sent!');
    }
}