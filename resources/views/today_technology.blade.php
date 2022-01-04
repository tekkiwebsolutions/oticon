@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 style_head">
                        <h2 class="heading">TODAY’S TEHCNOLOGY</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                       <a href="{{ route('yourSolutionCat', $ageCatUrl) }}" class="back_btn">Back</a>
                    </div>
                </div> 
                <div class='row'>
                <div class="row pr-0">
                    <div class="col-lg-12 col-md-12 col-12 main-banner-tech">
                        <img alt="" class="img-fluid" src="{{url($data[0]->image)}}" with="100%" id="backgroundImage">
                        <div class="main-volume">
                            <img src="{{ url('images/muted.png')}}" class="img-fluid icon-large" onClick="playMyAudio()" id="playbutton" />
                            <img src="{{ url('images/speaker.png')}}" class="img-fluid icon-large" onClick="pauseMyAudio()" id="pausebutton" style="display: none;" />
                            <img src="{{ url('images/speaker-icon-one.png')}}" class="img-fluid icon-one" />
                            <img src="{{ url('images/icon-second.png')}}" class="img-fluid icon-second" />
                            <img src="{{ url('images/speaker-third.png')}}" class="img-fluid icon-third" />
                        </div>
                    </div>
                </div>
                <div class="row situtation-filter-row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="custom-selectbox">
                            <select class="form-select" aria-label="Default select" id="section">
                                @foreach($data as $row)
                                <option value="{{$row->id}}">{{$row->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                    <div class='bg-noise'>
                    <label class="mb-2">Background Noise</label>
                        <div class="d-flex">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="backgroundplay" id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1" >Yes</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="backgroundplay" id="flexRadioDefault2" checked value="0">
                                <label class="form-check-label" for="flexRadioDefault2">No</label>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-12 noise-adjust">
                    <label class="mb-2">Noise Adjust</label>
                    <div class="custom-range-slider tech-range">
                            <input type="range" class="form-range" id="my_range" min="0" max="9" >
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
<audio src="{{url($data[0]->background_sound)}}" id="withImpairment" loop ></audio>
<audio src="{{url($data[0]->sound)}}" id="withoutImpairment" loop ></audio>   
<script>
       $("[name='backgroundplay']").click(function(){
            var myAudio = document.getElementById("withoutImpairment");
            if (myAudio.duration > 0 && !myAudio.paused) {
                checkbackgroudPlay();
            }        
       });

       $("#my_range").on("#my_range input change", function() {   
            var myAudio = document.getElementById("withoutImpairment");
            if (myAudio.duration > 0 && !myAudio.paused) {
                playMyAudio();
            }
        });
 

       
        function checkbackgroudPlay(){
            var imairment = $("[name='backgroundplay']:checked").val();
            var myAudio = document.getElementById("withImpairment");
            var vol = $("#my_range").val();
            if(imairment=='1'){                
                myAudio.play();
                myAudio.volume = "0."+vol;
                //myAudio.loop = true;
            } else{
                myAudio.pause();  
            }
        }

        function playMyAudio(){
            var vol = $("#my_range").val();
            var myAudio = document.getElementById("withoutImpairment");
            myAudio.play();
            myAudio.volume = "0."+vol;
            //myAudio.loop = true;
            $("#playbutton").hide(); 
            $("#pausebutton").show();  
            checkbackgroudPlay();       
        }
     function pauseMyAudio(){
        document.getElementById("withoutImpairment").pause();        
        document.getElementById("withImpairment").pause();     
        $("#playbutton").show(); 
        $("#pausebutton").hide();
     }
     $("#section").change(function(){
        var section =  $(this).val();
        $.ajax({
            type: "POST", 
            url: "{{ route('getViewDetail') }}",
            data: { section: section},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#backgroundImage").attr('src',res.image);
                $("#withImpairment").attr('src',res.background_sound);
                $("#withoutImpairment").attr('src',res.sound);
                pauseMyAudio();
            }
        });
     });
 
   </script>
@endsection
