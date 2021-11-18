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
                <a href="#" class="logo-login"><img alt="" class="img-fluid" src="images/logo.png"></a>
                </div>
                <div class="col-lg-8 col-md-8 col-12 position-relative">
                    <div class="font-adj d-flex position-absolute">
                        <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                        <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                        <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                    </div>
                    <div class="login-section">
                        <h1>Hi, Welcome Back !</h1>
                        <p class="login-subheading">Single device to solve your hearing problem</p>
                        <form class="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-lg-12 col-md-12 col-12 position-relative form-row">
                                <input type="email" class="form-control textbox" id="email" placeholder="Enter Your Email Address" name="email">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/mail-icon.png"></span>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12 position-relative form-row">
                                <input type="password" class="form-control textbox" id="password" placeholder="Enter Password" name="password">
                                <span class="textbox-icon"><img alt="" class="img-fluid" src="images/lock-icon.png"></span>
                            </div>
                            <button type="submit" class="btn btn-login">Login</button>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-12 create-account">Not Yet Registered? <a href="{{ route('register') }}">Create Account</a></div>
                                @if (Route::has('password.request'))
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-12 forgot-password"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
                                @endif
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div> -->
                        </form>
                    </div>

                    <!-- footer -->
                    <div class="footer-wrapper text-center">
                        <ul class="nav">
                            <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Privacy Policy</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Terms of Use</a></li>
                        </ul>
                        <div class="copyright">Copyright &#169; 2021. Oticon. All Rights Reserved. </div>
                    </div>
                    <!-- footer -->

                </div>
            </div>
        </div>
    </div>
@endsection
