@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">Styles</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class='row tech_history'>
                    <div class='col-md-7 tech_img'>
                        <img src="{{ url('images/tech-image.jpg')}}" class="img-fluid tech-image"/>
                    </div> 
                    <div class='col-md-5 tech-description'>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sus-pendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                    <p>Donec eu quam leo. Aenean elit dui, sollicitudin id malesuada tempor, ultricies eu tellus. Praesent lacinia velit eu libero sollicitudin laoreet. Sed posuere nibh augue, ut facilisis diam convallis eu. Vivamus vel gravida mauris. Fusce rutrum elementum ex, vel gravida diam suscipit vitae. Proin convallis lacus velit, et sagittis enim tincidunt blandit. Mauris sit amet velit id orci tristique faucibus eget nec est. Nulla lectus enim, hendrerit eget erat in, finibus fringilla velit. Mauris a vulputate diam. Morbi eu dui at arcu vehicula blandit. Curabitur ut tortor a nulla elementum tristique. Donec congue enim non odio vehicula semper. Donec id odio erat.</p>  
                    </div>       
                </div>    
               


            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection