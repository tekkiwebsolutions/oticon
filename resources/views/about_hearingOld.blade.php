@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12 left-area">
                <div class="left-area-inner position-relative">
                    <div class="person-time d-flex person-time-active">
                        <img alt="" src="images/children.jpg" class="img-fluid">
                        <span>Children</span>
                    </div>
                    <div class="person-time d-flex">
                        <img alt="" src="images/teen.jpg" class="img-fluid">
                        <span>Teen</span>
                    </div>
                    <div class="person-time d-flex">
                        <img alt="" src="images/adult.jpg" class="img-fluid">
                        <span>Adult</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="about-hearing-thumb"><img alt="" class="img-fluid" src="images/about-hearing-thumb.png"></div>
                        <div class="about-hearing-large"><img alt="" class="img-fluid" src="images/about-hearing-1.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection