<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Agenda;

class AdminDashController extends Controller
{
    public function admin_index() {
        $data = [];
        $user = User::all();
        $agenda = Agenda::all();
        $data['page_title'] = "Dashboard";
        return view("admin_dashboard", $data,compact('user','agenda'));
    }
}
