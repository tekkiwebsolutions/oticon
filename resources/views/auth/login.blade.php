@extends('layouts.app')

@section('content')
    <div class="login-wrapper">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-4 col-md-4 col-12 position-relative">
                <img alt="" class="img-fluid" src="images/slide-1.jpg"> 
                <a href="#" class="logo-login"><img alt="" class="img-fluid" src="images/logo.png"></a>
                </div>
                <div class="col-lg-8 col-md-8 col-12">
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
                                <div class="col-md-6 col-12 create-account">Not Yet Registered? <a href="{{ route('register') }}">Create Account</a></div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 col-12 forgot-password"><a href="{{ route('password.request') }}">Forgot Password?</a></div>
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
