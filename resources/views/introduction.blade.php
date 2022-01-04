@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-xs-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-xs-12"><h2 class="heading">Introduction</h2></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-xs-12 img_area">
                        <img alt="" class="img-fluid" src="{{url($data->images)}}">
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 text_area">
                        <p>{{$data->description}}</p>
                        <a href="{{url('myaccount_agendas')}}" class="cta-btn">Counselling Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection