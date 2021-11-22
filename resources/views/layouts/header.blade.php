@section('header')

<div class="header-wrapper">
    <div class="container">
        <div class="row position-relative">
            <div class="font-adj d-flex position-absolute">
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <img src="images/logo.svg" class="img-fluid logo" alt="">
            </div>
            <div class="login-btn-area position-absolute d-flex">
                @guest
                <a href="{{ route('login') }}">Login</a>
                <span><a href="#"><img alt="" src="images/login-icon.png"></a></span>
                @else
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                    <span><a href="#"><img alt="{{ Auth::user()->email }}" src="images/login-icon.png"></a></span>

                    
                    
                    <div>
                        
                    </div>
                @endguest
            </div>
        </div>
    </div>
</div>
    
@endsection