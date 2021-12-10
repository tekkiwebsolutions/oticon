@extends('layouts.app')
@include('layouts.header')

@section('content') 
<?php use Illuminate\Support\Facades\DB; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">Reports</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="{{ route('reports', $ageCatUrl ) }}" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row reports-page">
                    <div class="col-lg-12 col-md-12 col-12 pb-4">
                        <div class="page-banner"><img alt="" class="img-fluid" src="{{ url($resources->image)}}" ></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12"><h3 class="resources-heading">{{$resources->title}}</h3></div>
                            @if(isset($resources->pdf_upload) && $resources->pdf_upload !="")
                            <div class="col-lg-3 col-md-3 col-12"><a href='{{url($resources->pdf_upload)}}' class='download-pdf' target="_blank" ><img src="{{ url('images/pdf-icon.png')}}" /><span>download pdf</span></a></div>
                            @endif
                        </div>
                        <p>{{$resources->description}}</p>
                        
                        @if(isset($resources->url) && $resources->url !="")
                            <a href="{{$resources->url}}" class="read_more" target="_blank" ><span>Read More</span></a>
                        @endif
                        @if(!empty($questionnaires) && $questionnaires->count())
                        <div class="col-lg-12 col-sm-12 col-md-12 questionnaires_block">
                        <br>
                        <form method="POST" action="{{ url('save_questionnaires') }}" >
                            @csrf
                            <input type="hidden" value="{{$ageCatUrl}}" name="ageCatUrl">
                            <input type="hidden" value="{{$resource_id}}" name="resource_id">
                            <h3>Questionnaires</h3>
                            @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div> 
                            @endif
                            @if($errors->any())
                            <div class="alert alert-danger" role="alert">
                                {{$errors->first()}}
                            </div> 
                            @endif
                            @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{session('status')}}
                            </div>                                
                            @endif
                            @foreach($questionnaires as $questionnaire)
                            <?php  $questionnaireoptions = DB::select("select * from questionnaireoptions where questionnaires_id='".$questionnaire->id."' ORDER BY id ASC"); ?>
                                <div class="suspend_top">
                                    <span>{{$questionnaire->title}}</span>
                                    @foreach($questionnaireoptions as $questionnaireoption)
                                    <label><input type='radio' name="questionnaireoption[{{$questionnaire->id}}]" value="{{$questionnaireoption->id}}">{{$questionnaireoption->options}}</label>
                                    @endforeach
                                </div>
                            @endforeach
                            <input type="submit" name='questionnaire_submit' value="Submit">
                            </form>
                        </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.right_sidebar')

@include('layouts.footer')
<script type="text/javascript">
    $(document).ready(function(){

        $('.questionnaires_block input').click(function() {
        $('.questionnaires_block input:not(:checked)').parent().removeClass("selected");
        $('.questionnaires_block input:checked').parent().addClass("selected");
    });

    })
</script>
@endsection
