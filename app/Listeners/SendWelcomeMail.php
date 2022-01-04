<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Verified;
use Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Messages\MailMessage;

class SendWelcomeMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */

    public function handle(Verified $event)
    {

        $data = 'welcome_email';
        $value = DB::table('email_notifications')->select('*')->where('email_template', $data)->get();
        Mail::send('notification.emailnotification', ['user' => $event->user , 'value'=>$value], function ($message) use ($event) {
            $message->to($event->user->email);
            $message->subject('Welcome to Oticon');
        });
    }
}
