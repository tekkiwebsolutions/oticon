@section('header')

<div class="header-wrapper">
    <div class="container">
        <div class="row position-relative">
            <div class="font-adj d-flex position-absolute">
                 <a href="#" class='active'><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#" class=''><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"class=''><img alt="" class="img-fluid" src="images/font-size.png" /></a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <a href="{{ route('ageGroup') }}">
                    <img src="images/logo.svg" class="img-fluid logo" alt="" title="Oticon">
                </a>
            </div>
            <div class="login-btn-area position-absolute d-flex">
                @guest
                <a href="{{ route('login') }}">Login</a>
                <span><a href="#"><img alt="" src="images/login-icon.png"></a></span>
                @else
                <div class="dropdown">
                    <a class='icon-profile' href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                       <img alt="{{ Auth::user()->email }}" src="images/login-icon.png" class='on-hover'><img alt="{{ Auth::user()->email }}" src="images/pink-login-icon.png" class='no-hover'/>
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                    </ul>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form> 
                <!-- <span><a href="#"><img alt="{{ Auth::user()->email }}" src="images/login-icon.png"></a></span> -->
                @endguest
            </div>
        </div>
    </div>
</div>
    
@endsection