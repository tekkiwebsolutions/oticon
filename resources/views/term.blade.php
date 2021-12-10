@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-12 "></div>
            <div class="col-lg-9 col-md-9 col-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12"><h2 class="heading">Terms of Use</h2></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <p>{{$site_data->terms_of_use}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection