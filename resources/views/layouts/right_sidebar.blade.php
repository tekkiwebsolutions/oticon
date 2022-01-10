@section('right_sidebar')
<div class="sidebar-wrapper">
@if($ageCatUrl)

    <div class="sidebar-inner">
        <ul class="navigation">
            <li><a href="{{ route('introductionCat', $ageCatUrl) }}" class="@if($curruntpage=='introduction') active @endif">About This Tool</a></li>


            <li><a href="{{ route('aboutHearingEar', $ageCatUrl) }}" class="@if($curruntpage=='about_hearing') active @endif">How to Use This Tool</a></li>

            @guest<li><a href="#" class="@if($curruntpage=='about_hearing') active @endif">Login/sign Up</a></li>@endguest

            <li><a href="{{ route('situations', $ageCatUrl) }}" class="@if($curruntpage=='situations') active @endif">Hearing and Hearing Loss</a></li>

            <li><a href="{{ route('yourSolutionCat', $ageCatUrl) }}" class="@if($curruntpage=='your_solution') active @endif">Listening Environments</a></li>

            <li><a href="{{ route('yourHearingCat', $ageCatUrl ) }}" class="@if($curruntpage=='your_hearing') active @endif">Your Hearing</a></li>

            <li><a href="{{ route('binaural_benifits', $ageCatUrl ) }}" class="@if($curruntpage=='binaural_benifits') active @endif">Hearing Technology</a>
                <ul class="sub-navigation">
                    <li><a href="{{ route('technologyHistory', $ageCatUrl ) }}" class="@if($curruntpage=='technology_history') active @endif">Types of Hearing<br> Technology</a></li>
                    <li><a href="{{ route('styles', [$ageCatUrl,1] ) }}" class="@if($curruntpage=='styles') active @endif">Styles of Hearing aids</a></li>
                    <li><a href="{{ route('todayTechnology', $ageCatUrl ) }}" class="@if($curruntpage=='today_technology') active @endif">Features of Hearing<br> Technology</a></li>
                    <li><a href="{{ route('product_categories', $ageCatUrl ) }}" class="@if($curruntpage=='product_categories') active @endif">Hearing Assistive Technology</a></li>
                </ul>
            </li>

            <li><a href="{{ route('reports', $ageCatUrl ) }}" class="@if($curruntpage=='reports') active @endif">Personalized Reports</a></li>

        </ul>
    </div>
    @endif
</div>
@endsection