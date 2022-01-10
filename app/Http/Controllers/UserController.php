<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function unique_email(Request $request)
	{
		$user = User::where('email', '=', $request->get('email'))->first();
		if ($user) {
			echo "false";
		} else {
			echo "true";
		}
	}

	public function adminforgot(Request $request)
	{
		$users = DB::table('cms_users')->where('email', 'LIKE', $request->email)->first();
		if (isset($users->id) && $users->id > 0) {
			$to_name = $users->name;
			$to_email = $request->email;
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$pass =  substr(str_shuffle($chars), 0, 6);

			$hashPass = Hash::make($pass);

			DB::table('cms_users')->where('id', $users->id)->update(['password' => $hashPass]);

			$data = array('name' => $to_name, 'body' => 'Your password has been reset. Your new password is ' . $pass, 'pass' => $pass);
			Mail::send('mail', $data, function ($message) use ($to_name, $to_email) {
				$message->to($to_email)->subject("Admin forgot password.");
			});
			return '1';
		} else {
			return '0';
		}
	}

	public function adminstatus(Request $request)
	{
		$fectEnabled = DB::table('cms_users')->select('2f_auth as fector', 'email', 'id')->where('email', 'LIKE', $request->email)->first();
		if ($fectEnabled->fector == 1) {
			$email = $fectEnabled->email; 
			$code = rand(1000, 9999);
			$getotp = DB::table('cms_users')
				->where('id', $fectEnabled->id)
				->update(['two_factor_code' => $code]);

			$otpdata = 'welcome_email';
			$msg="Please enter the OTP to verify your account.";
			$custTitle ="OTP";
			$custsubject ="";
			$value = DB::table('email_notifications')->select('*')->where('email_template', $otpdata)->get();

			Mail::send('notification.emailnotification', ['value' => $value,'code'=> $code,'msg'=> $msg,'custTitle'=> $custTitle,'custsubject'=> $custsubject], function ($message) use ($email) {
				$message->to($email)	
					->subject('My Accoount Otp');
			}); 
			return '1';
		} else {
			return '0';
		} 
	}
	 

	public function checkauthotp(Request $request)
	{
		$email = $request->email;
		$otpdata = $request->otpdata;
		$user = DB::table('cms_users')->select('id')->where('email', $email)->where('two_factor_code', $otpdata)->first()->id;
		if ($user >0) {
			return '1';
		} else {
			return '0';
		} 
	}
	public function resendauthotp(Request $request)
	{
		$email = $request->email; 
		$code = rand(1000, 9999);
		$getotp = DB::table('cms_users')
		->where('email', $email)
		->update(['two_factor_code' => $code]);

		$otpdata = 'welcome_email';
		$msg="Please enter the OTP to verify your account.";
		$custTitle ="OTP";
		$custsubject ="";
		$value = DB::table('email_notifications')->select('*')->where('email_template', $otpdata)->get();

		Mail::send('notification.emailnotification', ['value' => $value,'code'=> $code,'msg'=> $msg,'custTitle'=> $custTitle,'custsubject'=> $custsubject], function ($message) use ($email) {
			$message->to($email)	
				->subject('My Accoount Otp');
		}); 

		return '1';
	}
	public function home()
	{
		return redirect('login')->with('success', 'Account Registred successfully, Please vefiry now !');
	}
	
}
