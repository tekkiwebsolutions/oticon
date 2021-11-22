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
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="graph-col">
                            <img alt="" class="img-fluid" src="images/graph.jpg">
                        </div>
                        <div class="filters-col">
                            <label class="filer-label">Ear Position</label>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-between align-items-center filter-text-col position-relative">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                        <label class="custom-control-label" for="customCheckBox1">Left</label>
                                    </div>
                                    <a href="#" class="edit"><img alt="" class="img-fluid" src="images/edit-icon.png"></a>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12 d-flex justify-content-between align-items-center filter-text-col position-relative">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox2">
                                        <label class="custom-control-label" for="customCheckBox2">Right</label>
                                    </div>
                                    <a href="#" class="edit"><img alt="" class="img-fluid" src="images/edit-icon.png"></a>
                                </div>
                            </div>
                            <label class="filer-label mt-4">Choose any sound</label>
                            <div class="col-lg-12 col-md-12 col-12 d-flex sound-col">
                                <div class="form-check custom-radio pet-icon">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        <img alt="" class="img-fluid" src="images/pet-icon-selected.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <img alt="" class="img-fluid" src="images/bus-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        <img alt="" class="img-fluid" src="images/bird-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault4">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        <img alt="" class="img-fluid" src="images/bird-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault5">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        <img alt="" class="img-fluid" src="images/phone-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault6">
                                    <label class="form-check-label" for="flexRadioDefault6">
                                        <img alt="" class="img-fluid" src="images/tap-icon.png">
                                    </label>
                                </div>
                            </div>

                            <label class="filer-label gender-label">Choose gender</label>
                            <div class="col-lg-12 col-md-12 col-12 d-flex sound-col">
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault7">
                                    <label class="form-check-label" for="flexRadioDefault7">
                                        <img alt="" class="img-fluid" src="images/male-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault8">
                                    <label class="form-check-label" for="flexRadioDefault8">
                                        <img alt="" class="img-fluid" src="images/female-icon.png">
                                    </label>
                                </div>
                                <div class="form-check custom-radio">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault9">
                                    <label class="form-check-label" for="flexRadioDefault9">
                                        <img alt="" class="img-fluid" src="images/kid-icon.png">
                                    </label>
                                </div>
                            </div>

                            <label class="filer-label gender-label">Upload Audio</label>

                            <div class="drop-zone">
                                <span class="drop-zone__prompt">Choose File</span>
                                <input type="file" name="myFile" class="drop-zone__input">
                            </div>

                            <div class="reset-btn"><button type="button" class="btn">Reset all</button></div>


                        </div>
                    </div>
                </div>
                


            </div>
        </div>
    </div>
</div>

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

@endsection