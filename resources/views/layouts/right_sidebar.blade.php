@section('right_sidebar')
<div class="sidebar-wrapper">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li><a href="{{ route('introduction') }}" class="active">About This Tool</a></li>
            <li><a href="{{ route('aboutHearing') }}">How to Use This Tool</a></li>
            <li><a href="#">Login/sign Up</a></li>
            <li><a href="{{ route('situations') }}">Hearing and Hearing Loss</a></li>
            <li><a href="#">Listening Environments</a></li>
            <li><a href="{{ route('yourSolution') }}">Your Hearing</a></li>
            <li><a href="#">Hearing Technology</a>
                <ul class="sub-navigation">
                    <li><a href="#">Types of Hearing<br> Technology</a></li>
                    <li><a href="#">Styles of Hearing aids</a></li>
                    <li><a href="#">Features of Hearing<br> Technology</a></li>
                    <li><a href="#">Hearing Assistive Technology</a></li>
                </ul>
            </li>
            <li><a href="#">Personalized Reports</a></li>
        </ul>
    </div>
</div>
@endsection