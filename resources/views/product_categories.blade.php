@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area product_category">
                <div class="row">
                    @foreach($product_categories as $product_categorie)
                    <div class='col-md-3 col-lg-3 col-sm-4 product_category_inner'>
                        <div class='product-listed-categories'>
                            <a href="{{ route('product_listing', [$ageCatUrl, $product_categorie->id]) }}">
                            <img src="{{url($product_categorie->image)}}" class='img-fluid'/>
                            <h3>{{$product_categorie->title}}</h3>
                            </a>
                        </div>
                    </div>
                    @endforeach 
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection
