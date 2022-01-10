@extends('layouts.app')
@include('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 main-banner-tech">
                        <img alt="" class="img-fluid" id="situationsImage" src="@if($sections[0]->Images) {{url($sections[0]->Images)}} @else {{ url('images/situations.jpg')}} @endif">
                        <div class="main-volume">
                            <img src="{{ url('images/muted.png')}}" class="img-fluid icon-large" onClick="playMyAudio()" id="playbutton" />
                            <img src="{{ url('images/speaker.png')}}" class="img-fluid icon-large" onClick="pauseMyAudio()" id="pausebutton" style="display: none;" />
                        </div>
                    </div>
                </div>
                
                <div class="row situtation-filter-row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="custom-selectbox">
                            <select class="form-select" aria-label="Default select" name="section" id="section">
                                @foreach($sections as $section )
                                <option value="{{$section->id}}">{{$section->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="custom-selectbox">
                            <select class="form-select" aria-label="Default select" name="subsection" id="subsection" >
                                @foreach($sub_sections as $sub_section )
                                    <option value="{{$sub_section->id}}">{{$sub_section->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 hearing_block">
                        <label class="mb-2">Hearing Impairment</label>
                        <div class="d-flex">
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="hearing_impairment" id="flexRadioDefault1" value="1" checked >
                                <label class="form-check-label" for="flexRadioDefault1">Yes</label>
                            </div>
                            <div class="form-check custom-radio">
                                <input class="form-check-input" type="radio" name="hearing_impairment" id="flexRadioDefault2" value="0" >
                                <label class="form-check-label" for="flexRadioDefault2" >No</label>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<html>
 <body>
   <audio src="{{url($sub_sections[0]->impairment_sound)}}" id="withImpairment" loop ></audio>
   <audio src="{{url($sub_sections[0]->soud)}}" id="withoutImpairment" loop ></audio>   

   <script>
       $("[name='hearing_impairment']").click(function(){
            var myAudio = document.getElementById("withoutImpairment");
            if (myAudio.duration > 0 && !myAudio.paused) {
                checkbackgroudPlay();
            }   
       });
       function checkbackgroudPlay(){
            var imairment = $("[name='hearing_impairment']:checked").val();
            var myAudio = document.getElementById("withImpairment");
            if(imairment=='1'){                
                myAudio.play();
                //myAudio.loop = true;
            } else{
                myAudio.pause();  
            }
       }
     function playMyAudio(){
        var imairment = $("[name='hearing_impairment']:checked").val();
        var myAudio = document.getElementById("withoutImpairment");
        myAudio.play();
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
            url: "{{ route('getSectionDetail') }}",
            data: { section: section},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#subsection").html(res.html);
                $("#situationsImage").attr('src',res.image);
                $("#subsection").trigger("change");
            }
        });
     });

     $("#subsection").change(function(){
        var subsection =  $(this).val();
        $.ajax({
            type: "POST", 
            url: "{{ route('getSubsectionDetail') }}",
            data: { subsection: subsection},
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#withImpairment").attr('src',res.withImpairment);
                $("#withoutImpairment").attr('src',res.withoutImpairment);
                pauseMyAudio();
            }
        });
     });
     
   </script>
 </body>
</html>
@include('layouts.right_sidebar')

@include('layouts.footer')

@endsection