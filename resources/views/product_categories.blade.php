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
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/behind-the-ear.png' class='img-fluid'/>
                            <h3>Behind-the-Ear Hearing Aid (BTE)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/recive-inner.png' class='img-fluid'/>
                            <h3>Receiver-in-the-Ear (RITE)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/in-the-ear.png' class='img-fluid'/>
                            <h3>In-the-Ear (ITE)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/cic-product.png' class='img-fluid'/>
                            <h3>Completely-in-the-Canal (CIC)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/cic-product-icon.png' class='img-fluid'/>
                            <h3>Bilateral Contralateral Routed
                                Sound (BICROS) & Contralateral
                                Routed Sound  (CROS)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/bchd.png' class='img-fluid'/>
                            <h3>Bone Conduction Hearing Device (BCHD)</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/cochar.png' class='img-fluid'/>
                            <h3>Cochlear Implant</h3>
                            </a>
                        </div>
                    </div>
                    <div class='col-md-3 col-lg-3 col-12'>
                        <div class='product-listed-categories'>
                            <a href='#'>
                            <img src='images/bimodal.png' class='img-fluid'/>
                            <h3>Bimodal Devices</h3>
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
