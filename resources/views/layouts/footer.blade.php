@section('footer')
<div class="footer-wrapper text-center">
    <ul class="nav">
        <li class="nav-item"><a class="nav-link" href="{{ route('about_us') }}">About Us</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('policy') }}">Privacy Policy</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('term') }}">Terms of Use</a></li>
    </ul>
    <div class="copyright">Copyright &#169; 2021. Oticon. All Rights Reserved. </div>
</div>
@include('cookies')
@endsection