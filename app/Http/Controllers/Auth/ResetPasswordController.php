<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Mail;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    
    protected $redirectTo = RouteServiceProvider::HOME;



    protected function setUserPassword($user, $password)
    {
        $user->password = Hash::make($password);

        $data = 'account_warning';
        $value = DB::table('email_notifications')->select('*')->where('email_template', $data)->get();

        $email = $user->email;

        Mail::send(
            'notification.emailnotification',
            ['email' => $email, 'value' => $value],
            function ($message) use ($email) {
                $message->to($email)->subject('Password Changed Oticon');
            }
        );
    }
}
