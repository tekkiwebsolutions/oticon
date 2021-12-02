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
		$users = DB::table('cms_users')->where('email', 'LIKE', $request->email )->first();
		if(isset($users->id) && $users->id > 0){
			$to_name = $users->name;
			$to_email = $request->email;
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$pass =  substr(str_shuffle($chars),0,6);
	
			$hashPass = Hash::make($pass);
			
			DB::table('cms_users')->where('id', $users->id)->update(['password' => $hashPass]);
	
			$data = array('name'=> $to_name, 'body'=>'Your password has been reset. Your new password is '.$pass, 'pass'=>$pass);
			Mail::send('mail',$data,function($message) use($to_name, $to_email){
				$message->to($to_email)->subject("Admin forgot password.");
			}); 
			return '1';
		} else{
			return '0';
		}
		
	}
   
}