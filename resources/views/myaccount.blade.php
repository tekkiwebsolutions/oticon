@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
					@if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                            <a href="javascript:voide(0)" onclick="$('#alert_msg').remove()" class="close" data-dismiss="alert" ><img src="images/close.png" class="img-fluid"></a>
                        </div>
                    @endif
                    <h2 class="heading">My Account</h2>
                     <p class='profile'>Profile</p>
                     <div class='profile-name'>
                         <h3>{{$data->first_name}} {{$data->last_name}}</h3>
                         <h4>{{$data->occupation}}</h4>
                         <span class='email'>{{$data->email}}</span>
                    </div>  
                    <div class='address'>{{$data->location}}</div> 
                    <div class='my-account-button'>
                        <p><a href='{{route("myaccountEdit")}}' class='edit-profile'>Edit Profile</a></p>
                        <p><a href='{{route("mypassword")}}' class='change-pass'>Change Password</a></p>
                    </div> 
                    <div class='notifiy'>
                    <p class='profile'>Notifications</p>
                      <p class='email-notify-label'>Email Notifications</p>
                       
                        <div class="custom-selectbox email-select">
						 <div class="d-flex">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="email_notification" id="flexRadioDefault1" value="1" checked="">
                                <label class="form-check-label" for="flexRadioDefault1">Enable</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="email_notification" id="flexRadioDefault2" value="0">
                                <label class="form-check-label" for="flexRadioDefault2">Disable</label>
                            </div>
                        </div>
                           <!--  <select class="form-select" aria-label="Default select">
                                <option selected>Select</option>
                                <option value="1">test@gmail.com</option>
                                <option value="2">test23@gmail.com</option>
                               
                            </select> -->
                        </div>
                    </div>               
                    </div>
                </div>
                
                  
                
               


            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

@endsection