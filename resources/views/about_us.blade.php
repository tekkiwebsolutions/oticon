@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content">
    @if(isset(($site_data->image)))
    <div class='topful_banner'><img alt="" class="img-fluid age-group-image" src="{{ url($site_data->image)}}"></div>
    @else
    <div class='topful_banner'><img alt="" class="img-fluid age-group-image" src="{{ url('images/resources-banner.jpg')}}"></div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                <span class="breadcrumbs">
                    @if($site_data->breadcrumbs=='Enabled')                        
                        <a href="{{ route('ageGroup') }}"><i class="fas fa-home-lg-alt"></i></a><i class="fal fa-chevron-right"></i>About Us                        
                    @endif
                </span>
                    <div class="col-lg-12 col-md-12 col-12">
                        <h2 class="heading">{{$site_data->title}}</h2>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        {!! $site_data->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@include('layouts.footer')

@endsection