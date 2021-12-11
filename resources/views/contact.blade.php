@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12"><h2 class="heading">Contact</h2></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        {!! $site_data->contact_page !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

@endsection