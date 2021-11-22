<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function ageGroup()
    {
        return view('age_group');
    }

    public function aboutHearing()
    {
        return view('about_hearing');
    }

    public function yourHearing()
    {
        return view('your_hearing');
    }

    public function introduction()
    {
        return view('introduction');
    }

    public function situations()
    {
        return view('situations');
    }

    public function yourSolution()
    {
        return view('your_solution');
    }

    public function styles()
    {
        return view('styles');
    }

    public function resources()
    {
        return view('resources');
    }
    public function reports()
    {
        return view('reports');
    }
    
    
}
