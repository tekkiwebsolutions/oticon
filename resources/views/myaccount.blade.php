@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12 left-area sidebar-myaccount">
                <ul class='my-account-sidebar'>
                    <li class=''><a href='#'><img src='images/reports-myaccount-icon.png'/><span>Reports</span></a></li>
                    <li class=''><a href='#'><img src='images/save-agends-icon.png'/><span>Saved <br>Agendas</span></a></li>
                    <li class=''><a href='#'><img src='images/my-media-icon.png'/><span>My Media</span></a></li>
                    <li class='active'><a href='#'><img src='images/my-account-sidebar-icon.png'/><span>My Account</span></a></li>
                </ul>    
            </div>
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                    <h2 class="heading">My Account</h2>
                     <p class='profile'>Profile</p>
                     <div class='profile-name'>
                         <h3>Lea Watkins</h3>
                         <h4>Business Executive</h4>
                         <span class='email'>lea@gmail.com</span>
                    </div>  
                    <div class='address'><p>Address One, Torronto,<br> Canada</p></div> 
                    <div class='my-account-button'>
                        <p><a href='#' class='edit-profile'>Edit Profile</a></p>
                        <p><a href='#' class='change-pass'>Change Password</a></p>
                    </div> 
                    <div class='notifiy'>
                    <p class='profile'>Notifications</p>
                      <p class='email-notify-label'>Email Notifications</p>
                       
                        <div class="custom-selectbox email-select">
                            <select class="form-select" aria-label="Default select">
                                <option selected>Select</option>
                                <option value="1">test@gmail.com</option>
                                <option value="2">test23@gmail.com</option>
                               
                            </select>
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