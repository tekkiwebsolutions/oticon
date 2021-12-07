<div class="col-lg-2 col-md-2 col-12 left-area sidebar-myaccount">
    <ul class='my-account-sidebar'>
        <li class="@if($curruntpage=='myaccounts_reports') active @endif">
            <a href="{{route('myaccounts_reports')}}">
                <img src="{{ url('images/reports-myaccount-icon.png')}}" />
                <span>Reports</span>
            </a>
        </li>
        <li class="@if($curruntpage=='myaccount_agendas') active @endif">
            <a href="{{route('myaccount_agendas')}}">
                <img src="{{ url('images/save-agends-icon.png')}}" />
                <span>Saved <br>Agendas</span>
            </a>
        </li>
        <li class="@if($curruntpage=='myaccount_media') active @endif"><a href="{{route('myaccount_media')}}"><img src="{{ url('images/my-media-icon.png')}}"  /><span>My Media</span></a></li>
        <li class="@if($curruntpage=='myaccount') active @endif"><a href="{{route('myaccount')}}"><img src="{{ url('images/my-account-sidebar-icon.png')}}" /><span>My Account</span></a></li>
    </ul>
</div>