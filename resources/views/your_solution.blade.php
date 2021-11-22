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
                <div class="d-flex category-row">
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="images/product-category.jpg">
                        <span class="category-name">Product <br> Categories</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="images/technology-history.jpg">
                        <span class="category-name">Technology <br> History</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="images/today-technology.jpg">
                        <span class="category-name">Today’s <br> Technologies</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="images/styles.jpg">
                        <span class="category-name">Styles</span>
                    </a>
                    <a href="#" class="category-col position-relative">
                        <img alt="" class="img-fluid" src="images/binaural-benefits.jpg">
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