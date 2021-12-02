@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-12 left-area sidebar-myaccount">
                <ul class='my-account-sidebar'>
                    <li class=''><a href='#'><img src='images/reports-myaccount-icon.png'/><span>Reports</span></a></li>
                    <li class='active'><a href='#'><img src='images/save-agends-icon.png'/><span>Saved <br>Agendas</span></a></li>
                    <li class=''><a href='#'><img src='images/my-media-icon.png'/><span>My Media</span></a></li>
                    <li class=''><a href='#'><img src='images/my-account-sidebar-icon.png'/><span>My Account</span></a></li>
                </ul>
            </div>
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mx-auto">
                            <h2 class='text-center heading'>Create Agenda</h2>
                           <div class='agenda-form'>
                                <div class='agenda-box-shadow'>
                                    <input type="input" class="form-controls" placeholder="Agenda Name">
                                    <select class="form-controls" aria-label="Default select">
                                        <option selected>Select</option>
                                        <option value="1">test@gmail.com</option>
                                        <option value="2">test23@gmail.com</option>
                                    </select>
                                    <textarea class="form-controls message" id="exampleFormControlTextarea1" rows="3" placeholder="Description"></textarea>
                                    <label>Agenda By Section</label>
                                    <div class='multi-selected'>
                                        <div class="row">
                                            <div class="col-md-5">
                                            <select name="to[]" id="multiselect1_to" class="form-controls" size="8" multiple="multiple"></select>

                                            </div>

                                            <div class="col-md-1 text-center arrows-select">
                                                <button type="button" id="multiselect1_rightSelected" class=" btn-block"><i class="fas fa-angle-double-left"></i></button>
                                                <button type="button" id="multiselect1_leftSelected" class=" btn-block"><i class="fas fa-angle-double-right"></i></button>
                                            </div>

                                            <div class="col-md-5">
                                            <select name="from[]" id="multiselect1" class="form-controls" size="8" multiple="multiple">
                                                    <option value="Introduction">Introduction</option>
                                                    <option value="About Hearing">About Hearing</option>
                                                    <option value="Your Hearing">Your Hearing</option>
                                                    <option value="Situations">Situations</option>
                                                    <option value="Your Solution">Your Solution</option>
                                                    <option value="Aural Rehab">Aural Rehab</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                    <button type="submit" type='sumbit' class='btn-common submit-button' value="Submit">Submit</button>
                                    </div>
                                    <div class='col-md-6'>
                                        <button type='sumbit' class='btn-common save-template' value="Save Template">Save Template </button>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                jQuery(document).ready(function($) {
                                    $('#multiselect1').multiselect();
                                    $('#multiselect2').multiselect();
                                });
                                </script>

                            </div>
                     </div>
                </div>
            </div>

        </div>
    </div>
</div>



@include('layouts.footer')

@endsection
