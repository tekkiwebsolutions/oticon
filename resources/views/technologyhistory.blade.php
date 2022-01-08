@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">
                            @if($data->title)
                            {{$data->title}}
                            @else
                            TECHNOLOGY HISTORY
                            @endif
                        </h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                       <a href="{{ route('yourSolutionCat', $ageCatUrl) }}" class="back_btn">Back</a>
                    </div>
                </div> 
                <div class='row tech_history'>
                    @if($data)
                    <div class='col-md-7 tech_img'>
                        <img src="{{ url($data->images)}}" class="img-fluid tech-image"/>
                    </div> 
                    <div class='col-md-5 tech-description'>
                        <p>{{$data->description}}</p>
                    </div>
                    @endif
                </div> 
            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection