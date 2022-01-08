@extends('layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="container">
        <div class="row g-0">
            <div class="col-lg-4 col-md-4 col-12 position-relative">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="images/slide-1.jpg" class="d-block w-100 img-fluid" alt="">
                        </div>
                        <div class="carousel-item">
                        <img src="images/slide-2.jpg" class="d-block w-100 img-fluid" alt="">
                        </div>
                        <div class="carousel-item">
                        <img src="images/slide-3.jpg" class="d-block w-100 img-fluid" alt="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
               <a href="#" class="logo-login"><img alt="" src="images/logo.png"></a>
            </div>
            <div class="col-lg-8 col-md-8 col-12 position-relative">
                <div class="font-adj d-flex position-absolute">
                    <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                    <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                    <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                </div>
                <div class="login-section register-section">
                    <h1>Create your account</h1>
                    <p class="login-subheading">Single device to solve your hearing problem</p>
                    <form class="login-form" id="registerForm" method="POST" action="{{ route('register') }}" role="form">
                        @csrf
                        <div class="row form-row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 position-relative">
                                <input type="text" class="form-control textbox" id="firstname" placeholder="First Name" name="first_name">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/user-icon.png"></span>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 position-relative last-name-col">
                                <input type="text" class="form-control textbox" id="lastname" placeholder="Last Name" name="last_name">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/user-icon.png"></span>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="text" class="form-control textbox" id="occupation" placeholder="Occupation" name="occupation">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/occupation-icon.png"></span>
                            </div>
                        </div>


                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                               <select class="form-control textbox" id="country" name="country_id">
                               <option >Select Country</option>
                               @foreach($countries as $country)
                                   <option value="{{$country->id}}">{{$country->name}}</option>
                               @endforeach
                               </select>
                               <span class="textbox-icon"><img alt="" class="img-fluid" src="images/location-icon.png"></span>
                           </div>
                        </div>

                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                               <select class="form-control textbox" id="location" name="location">
                               <option >Select country first</option>
                               </select>
                               <span class="textbox-icon"><img alt="" class="img-fluid" src="images/location-icon.png"></span>
                           </div>
                        </div>

                        <!--<div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="text" class="form-control textbox" id="location" placeholder="Location" name="location">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/location-icon.png"></span>
                            </div>
                        </div> -->

                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="text" class="form-control textbox" id="email" placeholder="Email Address" name="email">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/mail-icon.png"></span>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="text" class="form-control textbox" id="confirmemail" placeholder="Confirm Email Address" name="email_confirm">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/mail-icon.png"></span>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="password" class="form-control textbox" id="password" placeholder="Password" name="password">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/lock-icon.png"></span>
                            </div>
                        </div>
                        <div class="row form-row">
                            <div class="col-lg-12 col-md-12 col-12 position-relative">
                                <input type="password" class="form-control textbox" id="confirmpassword" placeholder="Confirm Password" name="password_confirm">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/lock-icon.png"></span>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class=" custom-checkbox checkbox checkbox-success checkbox-inline">
                                    <input type="checkbox" name="checkTerms" value="1" id='checkTerms'>
                                    <label for="checkTerms" class="checkboxTerm">I agree to the <a href="#">Terms of Use</a></label>
                                     
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-login">Register</button>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12 text-center create-account">Already have an account? <a href="{{ route('login') }}">Login</a></div>
                        </div>
                    </form>
                </div>

                @include('layouts.footer')

            </div>
        </div>
        </div>
    </div>
    <script>
        $.validator.addMethod('email', function (value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
        }, 'Please enter a valid Email address');
        $.validator.addMethod('password_check', function(value, element) {
            return this.optional(element) || (value.match(/[a-zA-Z]/) && value.match(/[0-9]/));
        },
        'Password must contain at least one numeric and one alphabetic character.');
        
        $("#registerForm").validate({
            rules: {
                
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                email : { 
                    email : true, 
                    required: true,
                    remote: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "unique_email",
                        type: "POST",
                        dataType: "JSON",
                        data:
                        {
                            email: function()
                            {
                                return $('#registerForm :input[name="email"]').val();
                            }
                        }
                    }
                },
                email_confirm: {
                    email: true,
                    required: true,
                    equalTo: "#email"
                },
                password: {
                    required: true,
                    password_check: true,
                    minlength: 6
                },
                password_confirm: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                checkTerms: {
                    required: true, 
                } 
                
            },
            messages: {
                name: {
                    required: "This field is required",
                    minlength: "Please provide correct name"
                },
                last_name: {
                    required: "This field is required",
                    minlength: "Please provide correct name"
                },
                password: {
                    required: "This field is required",
                    // password_check: "Password must contain at least 1 number and 1 character",
                    minlength: "Your password must be at least 6 characters long"
                },
                password_confirm: {
                    equalTo: "Password does not match"
                },
                email: {
                    required: "This field is required",
                    email: "Please enter a valid Email address",
                    remote: jQuery.validator.format("{0} is already taken.")
                },
                email_confirm: {
                    equalTo: "Email does not match"
                },
                checkTerms: {
                    required: "Please check Terms of Use"
                }
            }
        });
        $("#country").change(function(){
            var country =  $(this).val();
            $.ajax({
                type: "POST", 
                url: "{{ route('getStates') }}",
                data: { country_id: country},
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(res) {
                    res = JSON.parse(res);
                    $("#location").html(res.html);
                }
            });
        });
    </script>
@endsection
