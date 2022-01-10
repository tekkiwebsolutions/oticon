@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area product_category">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h2 class="heading">Receiver-in-the-Ear (RITE)</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-6 text-end">
                       <a href="{{ route('product_categories', $ageCatUrl) }}" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    @foreach($product_Lists as $product_List)
                        <div class='col-md-3 col-lg-3 col-12 product_category_inner'>
                            <div class='product_list'>
                            <a href="{{ route('styles', [$ageCatUrl, $product_List->id]) }}">
                                <img src="{{url($product_List->image)}}"  class='img-fluid'/>
                                <h3>{{$product_List->title}}</h3>
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
