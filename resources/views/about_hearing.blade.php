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
                        @if(!empty($about_hearing_file))
                        <a class="about-hearing-thumb" href="{{route('aboutHearing_cat', [$ageCatUrl, $about_hearing_file->pid])}}">
                            <img alt="" class="img-fluid"  src="{{ url($about_hearing_file->small_image)}}" >
                        </a>
                    
                        <div class="brain_ad-large">
                            <img alt="" class="img-fluid" src="{{ url($about_hearing_file->images)}}" >
                            @if(!empty($about_hearing_popup))
                            @foreach($about_hearing_popup as $popup)
                            <span class="brain_ad" style="top: {{$popup->top_position}}%; left: {{$popup->left_position}}%;">
                                <i class="fa fa-plus"> <p class="tooltiptext">{{$popup->title}}</p></i>
                            </span>
                            @endforeach
                            @endif 
                        </div>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection