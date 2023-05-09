<?php

namespace App\Providers;

use App\Mail\UserRegistedNotifyToAdmin;
use App\Mail\UserRegisterEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailToAdmin
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
    public function handle(Registered $event): void
    {
//        dd($event->user);
        \Mail::to('alice79101@gmail.com')->send(new UserRegistedNotifyToAdmin($event->user));
    }
}
