@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="about-hearing-thumb"><img alt="" class="img-fluid" src="{{ url('images/about-hearing-thumb.png')}}"></div>
                        <div class="about-hearing-large"><img alt="" class="img-fluid" src="{{ url('images/about-hearing.png')}}" >
                            <span class="hearing_icon_1"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem a</p></i>
                            </span>
                            <span class="hearing_icon_2"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem b</p></i>
                            </span>
                            <span class="hearing_icon_3"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem c</p></i>
                            </span>
                            <span class="hearing_icon_4"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem d</p></i>
                            </span>
                            <span class="hearing_icon_5"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem e</p></i>
                            </span>
                            <span class="hearing_icon_6"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem f</p></i>
                            </span>
                            <span class="hearing_icon_7"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem g</p></i>    
                            </span>
                            <span class="hearing_icon_8"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem h</p></i>    
                            </span>
                            <span class="hearing_icon_9"><i class="fa fa-plus">
                                 <p class="tooltiptext">lorem i</p></i>     
                            </span>
                            <span class="hearing_icon_10"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem j</p></i>
                            </span>
                            <span class="hearing_icon_11"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem k</p></i>
                            </span>
                            <span class="hearing_icon_12"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem l</p></i>
                            </span>
                            <span class="hearing_icon_13"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem m</p></i>
                            </span>
                            <span class="hearing_icon_14"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem n</p></i>
                            </span>
                            <span class="hearing_icon_15"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem o</p></i>
                            </span>
                            <span class="hearing_icon_16"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem p</p></i>
                            </span>
                            <span class="hearing_icon_17"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem q</p></i>
                            </span>
                            <span class="hearing_icon_18"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem r</p></i>
                            </span>
                            <span class="hearing_icon_19"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem s</p></i>
                            </span>
                            <span class="hearing_icon_20"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem t</p></i>
                            </span>
                            <span class="hearing_icon_21"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem u</p></i>
                            </span>
                            <span class="hearing_icon_22"><i class="fa fa-plus">
                                <p class="tooltiptext">lorem v</p></i>
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