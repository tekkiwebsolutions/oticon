@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 col-xs-12 col-sm-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 ">
                        
                        <a class="about-hearing-thumb" href="{{route('aboutHearingEar', $ageCatUrl)}}">
                            <img alt="" class="img-fluid"  src="{{ url('images/about-hearing-small.png')}}" >
                        </a>
                    
                        <div class="brain_ad-large"><img alt="" class="img-fluid" src="{{ url('images/brain_ad.png')}}" >
                            <span class="brain_ad_1"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem a</p></i>
                            </span>
                            <span class="brain_ad_2"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem b</p></i>
                            </span>
                            <span class="brain_ad_3"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem c</p></i>
                            </span>
                            <span class="brain_ad_4"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem d</p></i>
                            </span>
                            <span class="brain_ad_5"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem e</p></i>
                            </span>
                            <span class="brain_ad_6"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem f</p></i>
                            </span>
                            <span class="brain_ad_7"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem g</p></i>    
                            </span>
                            <span class="brain_ad_8"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem h</p></i>    
                            </span>
                            <span class="brain_ad_9"><i class="fa fa-plus">
                                 <p class="tooltiptext">lorem i</p></i>     
                            </span>
                            <span class="brain_ad_10"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem j</p></i>
                            </span>
                            <span class="brain_ad_11"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem k</p></i>
                            </span>
                            <span class="brain_ad_12"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem l</p></i>
                            </span>
                            <span class="brain_ad_13"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem m</p></i>
                            </span>
                            <span class="brain_ad_14"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem n</p></i>
                            </span>
                            <span class="brain_ad_15"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem o</p></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection