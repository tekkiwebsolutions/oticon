@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-7">
                        <h2 class="heading">Receiver-in-the-Ear (RITE)</h2>
                    </div>
                    <div class="col-lg-5 col-md-5 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/design-right.png')}}"  class='img-fluid'/>
                            <h3>designRITE</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/mini-rite.png')}}"  class='img-fluid'/>
                            <h3>miniRITE</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/rite.png' )}}"  class='img-fluid'/>
                            <h3>RITE</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/mini-bite.png')}}"  class='img-fluid'/>
                            <h3>miniBTE</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/bte.png')}}"  class='img-fluid'/>
                            <h3>BTE</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/bte-plus-power.png')}}"   class='img-fluid'/>
                            <h3>BTE Plus Power</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/IIC.png')}}"  class='img-fluid'/>
                            <h3>IIC</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product_list'>
                            <a href='#'>
                            <img src="{{url('images/cic.png')}}"  class='img-fluid'/>
                            <h3>CIC</h3>
                            </a>
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
