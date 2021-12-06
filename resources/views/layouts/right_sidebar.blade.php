@section('right_sidebar')
<div class="sidebar-wrapper">
    <div class="sidebar-inner">
        <ul class="navigation">
            <li><a href="{{ route('introductionCat', $ageCatUrl) }}" class="active">About This Tool</a></li>
            <li><a href="{{ route('aboutHearingEar', $ageCatUrl) }}">How to Use This Tool</a></li>
            @guest<li><a href="#">Login/sign Up</a></li>@endguest
            <li><a href="{{ route('situations', $ageCatUrl) }}">Hearing and Hearing Loss</a></li>
            <li><a href="#">Listening Environments</a></li>
            <li><a href="{{ route('yourHearingCat', $ageCatUrl ) }}">Your Hearing</a></li>
            <li><a href="{{ route('binaural_benifits', $ageCatUrl ) }}">Hearing Technology</a>
                <ul class="sub-navigation">
                    <li><a href="{{ route('technologyHistory', $ageCatUrl ) }}">Types of Hearing<br> Technology</a></li>
                    <li><a href="{{ route('styles', $ageCatUrl ) }}">Styles of Hearing aids</a></li>
                    <li><a href="{{ route('todayTechnology', $ageCatUrl ) }}">Features of Hearing<br> Technology</a></li>
                    <li><a href="#">Hearing Assistive Technology</a></li>
                </ul>
            </li>
            <li><a href="{{ route('reports', $ageCatUrl ) }}">Personalized Reports</a></li>
        </ul>
    </div>
</div>
@endsection