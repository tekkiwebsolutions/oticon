@extends('layouts.app')

<div class="header-wrapper">
    <div class="container">
        <div class="row position-relative">
            <div class="font-adj d-flex position-absolute">
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <img src="images/logo.svg" class="img-fluid logo" alt="">
            </div>
        </div>
    </div>
</div>

@section('content')
<div class="content-wrapper-full">
    <div class="container">
        <div class="row">
            <div class="choose-option text-center">Select one of the options below to continue</div>    

        </div>
    </div>
    <div class="container-fluid age-group-wrapper">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 age-group-col position-relative">
            <a href="{{ route('introduction') }}">
                <img alt="" class="img-fluid age-group-image" src="images/children-age-group.jpg">
                <div class="circle"><img alt="" class="img-fluid" src="images/circle-pink.png">
                <div class="age-group-name">
                    <a href="#">Children</a>
                    <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                </div>
            </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 age-group-col position-relative">
            <a href="{{ route('introduction') }}">
                <img alt="" class="img-fluid age-group-image" src="images/teen-age-group.jpg">
                <div class="circle"><img alt="" class="img-fluid" src="images/circle-peach.png">
                <div class="age-group-name">
                    <a href="#">Teen</a>
                    <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                </div>
            </div>
            </a>
            </div>
            <div class="col-lg-4 col-md-4 col-12 age-group-col position-relative">
            <a href="{{ route('introduction') }}">
                <img alt="" class="img-fluid age-group-image" src="images/adult-age-group.jpg">
                <div class="circle"><img alt="" class="img-fluid" src="images/circle-green.png">
                <div class="age-group-name">
                    <a href="#">Adult</a>
                    <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                </div>
            </div>
            </a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

@endsection