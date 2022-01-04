@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper-oticon">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a href="{{ route('myaccounts_reports') }}" class='dashboard-section'>
              <div class='dashboard-icons'>
                  <img src='images/reports-icon.png'/>
                  <h3>Reports</h3>
              </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('myaccount_agendas') }}" class='dashboard-section'>
            <div class='dashboard-icons'>
                  <img src='images/agendas-icon.png'/>
                  <h3>Saved Agendas</h3>
              </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('myaccount_media') }}" class='dashboard-section'>
            <div class='dashboard-icons'>
                  <img src='images/media-icon.png'/>
                  <h3>My Media</h3>
              </div>
            </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('myaccount') }}" class='dashboard-section'>
            <div class='dashboard-icons'>
                  <img src='images/my-account-icon.png'/>
                  <h3>My Account</h3>
              </div>
            </a>
            </div>
        </div>
    </div>
</div>




@include('layouts.footer')

@endsection
