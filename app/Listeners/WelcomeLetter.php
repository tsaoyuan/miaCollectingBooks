<?php

namespace App\Listeners;

use App\Events\UserEmailVerified;
use App\Mail\UserWelcome;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class WelcomeLetter
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserEmailVerified $event): void
    {
//        dd($event->user->email);
        Mail::to($event->user->email)->send(new UserWelcome($event->user));
    }
}
