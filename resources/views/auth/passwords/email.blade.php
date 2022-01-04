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
                        <img src="{{asset('images/slide-1.jpg')}}" class="d-block w-100 img-fluid" alt="">
                        </div>
                        <div class="carousel-item">
                        <img src="{{asset('images/slide-2.jpg')}}" class="d-block w-100 img-fluid" alt="">
                        </div>
                        <div class="carousel-item">
                        <img src="{{asset('images/slide-3.jpg')}}" class="d-block w-100 img-fluid" alt="">
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
                <a href="#" class="logo-login"><img alt="" class="img-fluid" src="{{asset('images/logo.png')}}"></a>
                </div>
                <div class="col-lg-8 col-md-8 col-12 position-relative">
                    <div class="font-adj d-flex position-absolute">
                        <a href="#"><img alt="" class="img-fluid" src="{{asset('images/font-size.png')}}" /></a>
                        <a href="#"><img alt="" class="img-fluid" src="{{asset('images/font-size.png')}}" /></a>
                        <a href="#"><img alt="" class="img-fluid" src="{{asset('images/font-size.png')}}" /></a>
                    </div>
                    <div class="login-section">
                        <h1>{{ __('Reset Password') }}</h1>
                        <strong>{{ $message }}</strong>
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif
                        <form class="login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf 
                            
                            <div class="col-lg-12 col-md-12 col-12 position-relative form-row">
                                <input type="email" class="form-control textbox @error('email') is-invalid @enderror" id="email" placeholder="Enter Your Email Address" name="email">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="{{asset('images/mail-icon.png')}}"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <br>

                            <button type="submit" class="btn btn-login">{{ __('Send Password Reset Link') }}</button>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 create-account text-center">Back to <a href="{{ route('login') }}">Login</a></div>
                            </div>
                        </form>
                    </div>
 
                    @include('layouts.footer')
                </div>
            </div>
        </div>
    </div>
@endsection
