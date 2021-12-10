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
                        <h2 class="heading">Styles</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row style_row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-selectbox styles-custom-selectbox position-relative">
                                    <span><img alt="" class="img-fluid" src="{{ url('images/male-thumb.jpg')}}" ></span>
                                    <select class="form-select" aria-label="Default select">
                                        <option selected>Male</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="custom-selectbox styles-custom-selectbox position-relative">
                                    <span><img alt="" class="img-fluid" src="{{ url('images/female-thumb.jpg')}}" ></span>
                                    <select class="form-select" aria-label="Default select">
                                        <option selected>Ethnicity: German</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 hair-color">
                                <label class="mb-2">Hair Color</label>
                                <div class="d-flex">
                                    <div class="form-check custom-radio">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">Black</label>
                                    </div>
                                    <div class="form-check custom-radio">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">Brown</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12"><button type="button" class="btn save-selection-btn">Save Selection</button></div>
                        </div>
                    </div>
                </div>
                <div class="row style-image-row">
                    <div class="col-lg-6 col-md-6 col-12 style-image-col">
                        <img alt="" class="img-fluid" src="{{ url('images/style-image.jpg')}}" >
                        <div class="custom-range-slider">
                            <input type="range" class="form-range" id="myRange">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="style-detail-col">
                            <div class="style-detail-inner">
                                <h4>Nera 2</h4>
                                <h3>miniRITE</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. </p>
                            </div>
                            <div class="style-detail-thumb">
                                <span class="image-thumb"><img alt="" class="img-fluid" src="{{ url('images/image-thumb.jpg')}}" ></span>
                                <a href="#" class="color-thumb black-color"></a>
                                <a href="#" class="color-thumb light-brown-color"></a>
                                <a href="#" class="color-thumb medium-brown-color"></a>
                                <a href="#" class="color-thumb brown-color"></a>
                                <a href="#" class="color-thumb white-color"></a>
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