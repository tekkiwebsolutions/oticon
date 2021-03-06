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
                        <h2 class="heading">Reports</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row reports-page">
                    <div class="col-lg-12 col-md-12 col-12 pb-4">
                        <div class="page-banner"><img alt="" class="img-fluid" src="images/resources-banner.jpg"></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12"><h3 class="resources-heading">Lorem ipsum dolor sir amet, consectetur adipiscing elit</h3></div>
                            <div class="col-lg-3 col-md-3 col-12"><a href="#" class="download-pdf"><img src="images/pdf-icon.png"/><span>download pdf</span></a></div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection
