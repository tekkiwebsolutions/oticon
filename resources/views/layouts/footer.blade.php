<?php use Illuminate\Support\Facades\DB; 
$socialicons =  DB::table('social_media')->orderBy('id', 'ASC')->get();
?>
<div class="footer-wrapper text-center">
    <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('about_us') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('policy') }}">Privacy Policy</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('term') }}">Terms of Use</a></li>
    </ul>
    
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 text-center social-icon-main">
            @foreach($socialicons as $socialicon)
             <a href="{{$socialicon->url_link}}">
                 <img alt="" class="social-icon" src="{{url($socialicon->image)}}">
             </a>
             @endforeach 
        </div>
    </div>
    <div class="copyright">Copyright &#169; 2021. Oticon. All Rights Reserved. </div>
</div>
@include('cookies')
 