@extends('layouts.app')
@include('layouts.header')

@section('content')
<style>
</style>
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
                <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">Styles</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 pb-4">
                        <div class='all-reports'>
                            <div class="all-reports-inner">
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est.</p>
                            <a href='#' class='download-pdf'><img src='images/pdf-icon.png'/><span>download pdf</span></a>
                            </div>
                        </div>

                        <div class='all-reports'>
                            <div class='all-reports-inner'>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est.</p>
                            <a href='#' class='download-pdf'><img src='images/pdf-icon.png'/><span>download pdf</span></a>
                            </div>
                        </div>

                        <div class='all-reports '>
                           <div class='all-reports-inner highlighted'>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est.</p>
                            <a href='#' class='read_more'><span>Read More</span></a>
                            </div>
                        </div>

                        <div class='all-reports'>
                            <div class='all-reports-inner'>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est.</p>
                            <a href='#' class='download-pdf'><img src='images/pdf-icon.png'/><span>download pdf</span></a>
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
