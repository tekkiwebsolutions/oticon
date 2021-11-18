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
                    <div class="col-lg-12 col-md-12 col-12"><h2 class="heading">Introduction</h2></div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img alt="" class="img-fluid" src="images/introduction.jpg">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                        <p>Donec eu quam leo. Aenean elit dui, sollicitudin id malesuada tempor, ultricies eu tellus. Praesent lacinia velit eu libero sollicitudin laoreet. Sed posuere nibh augue, ut facilisis diam convallis eu. Vivamus vel gravida mauris. Fusce rutrum elementum ex, vel gravida diam suscipit vitae. Proin convallis lacus velit, et sagittis enim tincidunt blandit. Mauris sit amet velit id orci tristique faucibus eget nec est. Nulla lectus enim, hendrerit eget erat in, finibus fringilla velit. Mauris a vulputate diam. Morbi eu dui at arcu vehicula blandit. Curabitur ut tortor a nulla elementum tristique. Donec congue enim non odio vehicula semper. Donec id odio erat.</p>
                        <a href="#" class="cta-btn">Counselling Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection