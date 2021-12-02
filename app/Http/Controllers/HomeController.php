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
    
    
    public function technologyHistory()
    {
        return view('technologyhistory');
    }
    
    public function todayTechnology()
    {
        return view('today_technology');
    }
    public function binaural_benifits(){

        return view('binaural_benifits');
    }
    public function dashboard(){
        return view('dashboard');
    }

    public function myaccounts_reports(){
        return view('myaccounts_reports');
    }
    public function myaccount_agendas(){
        return view ('myaccount_agendas');
    }
    public function myaccount_media(){
        return view('myaccount_media');
    }
    public function myaccount(){
        return view('myaccount');
    }
    public function product_categories(){
        return view('product_categories');
    }
    public function product_listing(){
        return view('product_listing');
    }
    public function myaccount_agendas_create(){
        return view('myaccount_agenda_create');
    }
    
}
