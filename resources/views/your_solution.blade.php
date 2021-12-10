@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">    
        @include('layouts.left_sidebar')
             
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="d-flex category-row">
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="{{url('images/product-category.jpg')}}"  >
                        <span class="category-name">Product <br> Categories</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="{{url('images/technology-history.jpg')}}"  >
                        <span class="category-name">Technology <br> History</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="{{url('images/today-technology.jpg')}}"  ">
                        <span class="category-name">Today’s <br> Technologies</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="{{url('images/styles.jpg')}}"  >
                        <span class="category-name">Styles</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="{{url('images/binaural-benefits.jpg')}}"  >
                        <span class="category-name">Binaural <br> Benefits</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection