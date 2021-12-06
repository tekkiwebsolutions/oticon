@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">TODAY’S TEHCNOLOGY</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class='row'>
                <div class="row pr-0">
                    <div class="col-lg-12 col-md-12 col-12 main-banner-tech">
                        <img alt="" class="img-fluid" src="{{ url('images/today-technology-main.jpg')}}" with="100%">
                        <div class="main-volume">
                            <img src="{{ url('images/speaker.png')}}" class="img-fluid icon-large"/>
                            <img src="{{ url('images/speaker-icon-one.png')}}" class="img-fluid icon-one" />
                            <img src="{{ url('images/icon-second.png')}}" class="img-fluid icon-second" />
                            <img src="{{ url('images/speaker-third.png')}}" class="img-fluid icon-third" />
                        </div>
                    </div>
                </div>
                <div class="row situtation-filter-row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="custom-selectbox">
                            <select class="form-select" aria-label="Default select">
                                <option selected>3D View</option>
                                <option value="1">1D View</option>
                                <option value="2">2D View</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class='bg-noise'>
                    <label class="mb-2">Background Noise</label>
                        <div class="d-flex">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">No</label>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-12 noise-adjust">
                    <label class="mb-2">Noise Adjust</label>
                    <div class="custom-range-slider tech-range">
                            <input type="range" class="form-range" id="myRange">
                        </div>
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
