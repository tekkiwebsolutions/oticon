@extends('layouts.app')

<!--<div class="header-wrapper">
    <div class="container">
        <div class="row position-relative">
            <div class="font-adj d-flex position-absolute">
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
                <a href="#"><img alt="" class="img-fluid" src="images/font-size.png" /></a>
            </div>
            <div class="col-lg-12 col-md-12 col-12 text-center">
                <img src="images/logo.svg" class="img-fluid logo" alt="">
            </div>
        </div>
    </div>
</div>-->
@include('layouts.header')
@section('content')


<div class="content-wrapper-full">
    <div class="container">
        <div class="row">
            <div class="choose-option text-center">Select one of the options below to continue</div>    

        </div>
    </div>
    <div class="container-fluid age-group-wrapper">
        <div class="row">
            <?php  
            $circleImg = array('circle-pink.png','circle-peach.png','circle-green.png');
            $i=0;  ?>
            @foreach($ageCatData as $ageCat)  
            <div class="col-lg-4 col-md-4 col-12 age_group_anchor">
                <a href="{{url('introduction/'.$ageCat->slug)}}">

                <div class="age-group-col  @if ($i%2 == 1) shape-two @else shape-one @endif  position-relative">
                    <img alt="" class="img-fluid age-group-image" src="{{ url($ageCat->image)}}">
                    <div class="circle">
                        <img alt="" class="img-fluid" src="images/{{$circleImg[$i]}}">
                        <div class="age-group-name">
                            <a href="{{url('introduction/'.$ageCat->slug)}}">
                                {{$ageCat->title}}
                            </a>
                            <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                        </div>
                    </div>
                </div>
				</a>
            </div>
            <?php $i++; ?>
            @endforeach

            <!--<div class="col-lg-4 col-md-4 col-12">
				<a href="{{ route('introduction') }}">
                <div class="age-group-col shape-two position-relative">
                    <img alt="" class="img-fluid age-group-image" src="images/teen-age-group.jpg">
                    <div class="circle"><img alt="" class="img-fluid" src="images/circle-peach.png">
                        <div class="age-group-name">
                            <a href="#">Teen</a>
                            <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                        </div>
                    </div>
                </div>
				</a>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
				<a href="{{ route('introduction') }}">
                <div class="age-group-col shape-one position-relative">
                    <img alt="" class="img-fluid age-group-image" src="images/adult-age-group.jpg">
                    <div class="circle"><img alt="" class="img-fluid" src="images/circle-green.png">
                        <div class="age-group-name">
                            <a href="#">Adult</a>
                            <img alt="" class="img-fluid arrow-icon" src="images/white-arrow.png">
                        </div>
                    </div>
                </div>
				</a>
            </div>-->
            
        </div>

    </div>
</div>

@include('layouts.footer')

@endsection


