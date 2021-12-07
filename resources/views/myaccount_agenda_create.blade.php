@extends('layouts.app')
@include('layouts.header')

@section('content')
<?php 
$sectionss = array();
if(isset($data->sectionss)){
    $sectionss = explode(',', $data->sectionss);
}
?>
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
        @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 mx-auto">
                        <h2 class='text-center heading'>Create Agenda</h2>
                        <form method="POST" action="{{ url('save_agendas') }}"  novalidate >
                            @csrf
                            @if(isset($data->id)) 
                            <input type="hidden" name="agenda_id" value="{{$data->id}}">
                            @endif
                            <div class='agenda-form'>
                                <div class='agenda-box-shadow'>
                                    <input type="input" class="form-controls" placeholder="Agenda Name" name="title" 
                                    value="@if(isset($data->title)){{$data->title}}@endif">
                                    <select class="form-controls" aria-label="Default select" name="client_name">
                                        <option >Select</option>
                                        <option value="1" 
                                        @if(isset($data->client_name) &&  $data->client_name == "1") selected @endif 
                                        >test@gmail.com</option>
                                        <option value="2"
                                        @if(isset($data->client_name) && $data->client_name == "2") selected @endif
                                        >test23@gmail.com</option>
                                    </select>
                                    <textarea class="form-controls message" id="exampleFormControlTextarea1" name="description" rows="3" placeholder="Description">@if(isset($data->description)){{$data->description}}@endif</textarea>
                                    <label>Agenda By Section</label>
                                    <div class='multi-selected'>
                                        <div class="row">
                                            <div class="col-md-5">
                                           <!--  <select name="to[]" id="multiselect1_to" class="form-controls" size="8" multiple="multiple"></select> -->

                                            </div>

                                            <div class="col-md-1 text-center arrows-select">
                                                <button type="button" id="multiselect1_rightSelected" class=" btn-block"><i class="fas fa-angle-double-left"></i></button>
                                                <button type="button" id="multiselect1_leftSelected" class=" btn-block"><i class="fas fa-angle-double-right"></i></button>
                                            </div>

                                            <div class="col-md-5">
                                            <select name="selections[]" id="multiselect1" class="form-controls" size="8" multiple="multiple">
                                                    <option value="Introduction" 
                                                    @if(in_array('Introduction',$sectionss)) selected @endif
                                                     >Introduction</option>
                                                    <option value="About Hearing"
                                                    @if(in_array('About Hearing',$sectionss)) selected @endif
                                                    >About Hearing</option>
                                                    <option value="Your Hearing"
                                                    @if(in_array('Your Hearing',$sectionss)) selected @endif
                                                    >Your Hearing</option>
                                                    <option value="Situations"
                                                    @if(in_array('Situations',$sectionss)) selected @endif
                                                    >Situations</option>
                                                    <option value="Your Solution"
                                                    @if(in_array('Your Solution',$sectionss)) selected @endif
                                                    >Your Solution</option>
                                                    <option value="Aural Rehab"
                                                    @if(in_array('Aural Rehab',$sectionss)) selected @endif
                                                    >Aural Rehab</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-4 col-offset-8' style="margin: 0 auto;">
                                    <button type="submit" type='sumbit' class='btn-common submit-button' value="Submit">Submit</button>
                                    </div>
                                </div>

                                

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect1').multiSelect();
    $('#multiselect2').multiSelect();
});
</script>
@include('layouts.footer')

@endsection


