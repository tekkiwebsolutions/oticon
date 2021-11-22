<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
