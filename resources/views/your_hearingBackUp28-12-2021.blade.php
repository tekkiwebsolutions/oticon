@extends('layouts.app')
@include('layouts.header')
@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 order_graph">
                        <div class="graph-col">
                            <!--start-->
                            <table id="01496673" data-appointment="10041362"  data-audiogram="new">
                                <thead>
                                    <tr>
                                        <th>Frequency</th>
                                        <th>Right Air Threshold</th>
                                        <th>Right Bone Threshold</th>
                                        <th>Left Air Threshold</th>
                                        <th>Left Bone Threshold</th>
                                        <th>Sound Field Unaided</th>
                                        <th>Sound Field Aided</th>
                                        <th>Cochlear Implant</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>t125</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t180</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t250</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t375</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t500</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t750</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t1k</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t1500</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t2k</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t3k</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t4k</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t6k</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t8k</td>
                                        <td>0</td>
                                        <td></td>
                                        <td>0</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>t12k</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>


                            <!-----end------>
                        </div>
                        <div class="filters-col">
                            <label class="filer-label">Ear Position</label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-between align-items-center filter-text-col position-relative">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="leftRight" id="button_left">
                                        <label class="custom-control-label" for="button_left">Left</label>
                                    </div>
                                    <a href="#" class="edit"><img alt="" class="img-fluid" src="{{ url('images/edit-icon.png')}}"></a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-between align-items-center filter-text-col position-relative">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="leftRight" id="button_right" >
                                        <label class="custom-control-label" for="button_right">Right</label>
                                    </div>
                                    <a href="#" class="edit"><img alt="" class="img-fluid" src="{{ url('images/edit-icon.png')}}"></a>
                                </div>
                            </div>
                            <label class="filer-label mt-4">Choose any sound</label>
                            <div class="col-lg-12 col-md-12 col-12 d-flex sound-col">
                                <div class="form-check custom-radio pet-icon">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="pet" value="pet_audio" >
                                    <label class="form-check-label" for="pet">
                                        <img alt="" class="img-fluid" src="{{ url('images/pet-icon.png')}}">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="bus" value="bus_audio">
                                    <label class="form-check-label" for="bus">
                                        <img alt="" class="img-fluid" src="{{ url('images/bus-icon.png')}}">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="bird" value="bird_audio">
                                    <label class="form-check-label" for="bird">
                                        <img alt="" class="img-fluid" src="{{ url('images/bird-icon.png')}}">
                                    </label>
                                </div>
                                
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="phone" value="phone_audio">
                                    <label class="form-check-label" for="phone">
                                        <img alt="" class="img-fluid" src="{{ url('images/phone-icon.png')}}" >
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="plane" value="plane_audio">
                                    <label class="form-check-label" for="plane">
                                        <img alt="" class="img-fluid" src="{{ url('images/plane-icon.png')}}">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="tap" value="tap_audio">
                                    <label class="form-check-label" for="tap">
                                        <img alt="" class="img-fluid" src="{{ url('images/tap-icon.png')}}">
                                    </label>
                                </div>
                            </div>

                            <label class="filer-label gender-label">Choose gender</label>
                            <div class="col-lg-12 col-md-12 col-12 d-flex sound-col">
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="male" value="male_audio">
                                    <label class="form-check-label" for="male">
                                        <img alt="" class="img-fluid" src="{{ url('images/male-icon.png')}}">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="female" value="female_audio">
                                    <label class="form-check-label" for="female">
                                        <img alt="" class="img-fluid" src="{{ url('images/female-icon.png')}}">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="audio_radio" id="kid" value="kid_audio">
                                    <label class="form-check-label" for="kid">
                                        <img alt="" class="img-fluid" src="{{ url('images/kid-icon.png')}}">
                                    </label>
                                </div>
                            </div>

                            <label class="filer-label gender-label">Upload Audio</label>

							<form action="{{route('mediaupload')}}" method="post" id="cform" class="contact-form" enctype="multipart/form-data">
                                @csrf
                                <div class="drop-zone">
                                    <span class="drop-zone__prompt">Choose File</span>
                                    <input type="file" name="media_name" accept=".mp3,audio/*" class="drop-zone__input " id="media_name" onchange="event.preventDefault();
                                                     document.getElementById('cform').submit();">
                                    <input type="hidden" name="user_id" class="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="user_name" class="user_name" value="{{ auth()->user()->email }}">
                                </div>
                            </form>

                            <div class="reset-btn"><button type="button" class="btn" onclick="window.location.reload()">Reset all</button></div>


                        </div>
                    </div>
                </div>
                


            </div>
        </div>
    </div>
</div>

<audio src="{{url('images/audio/pet.mp3')}}" id="pet_audio" loop ></audio> 
<audio src="{{url('images/audio/bus.wav')}}" id="bus_audio" loop ></audio>  
<audio src="{{url('images/audio/bird.mp3')}}" id="bird_audio" loop ></audio> 
<audio src="{{url('images/audio/phone.wav')}}" id="phone_audio" loop ></audio>  
<audio src="{{url('images/audio/plane.mp3')}}" id="plane_audio" loop ></audio>  
<audio src="{{url('images/audio/tap.mp3')}}" id="tap_audio" loop ></audio>  
<audio src="{{url('images/audio/male.ogg')}}" id="male_audio" loop ></audio>  
<audio src="{{url('images/audio/female.mp3')}}" id="female_audio" loop ></audio>  
<audio src="{{url('images/audio/kid.mp3')}}" id="kid_audio" loop ></audio>  
<script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".drop-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
            updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("drop-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
            dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
            inputElement.files = e.dataTransfer.files;
            updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("drop-zone--over");
        });
        });

        /**
        * Updates the thumbnail on a drop zone element.
        *
        * @param {HTMLElement} dropZoneElement
        * @param {File} file
        */
        function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".drop-zone__prompt")) {
            dropZoneElement.querySelector(".drop-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("drop-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
            thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
        }
</script>

@include('layouts.right_sidebar')
@include('layouts.footer')
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ba-debug.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.audiogram.js') }}"></script>
<script type="text/javascript">
    $('#01496673').audiogram({
        editable : true,
        fill: true
    });
    
    $('#button_save').button({
        text : true,
        icons : {
            primary : "ui-icon-check"
        }
    });
    $('.radioSetSelector, .tympanometry_right, .tympanometry_left, .reliability').buttonset();

    function playAudio(vol){
        $("[name='audio_radio']").each(function(){
            var audio_id = $(this).val();
            var audio = document.getElementById(audio_id);
            audio.pause();
        }); 
        var id = $("[name='audio_radio']:checked").val();
        if(id){
            var audio = document.getElementById(id);
            audio.play();
            audio.volume = "0."+vol;
        }  
    }
</script>
@endsection