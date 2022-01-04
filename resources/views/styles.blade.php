@extends('layouts.app')
@include('layouts.header')

@section('content')
<?php
$i = 1;
?>
<style>
    .hair-color [type='radio']:checked+.form-check-label::before {
        box-shadow: 0 0 0 3px #c6168d;
    }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')

            <div class="col-lg-10 col-md-10 col-12 center-area">
                <form method="POST" action="{{ url('save_xls') }}">
                    @csrf
                    <input type="hidden" name="product_id" id="product_id" value="{{$product_id}}">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 style_head">
                            <h2 class="heading">Styles</h2>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-end">
                            <a href="{{ route('yourSolutionCat', $ageCatUrl) }}" class="back_btn">Back</a>
                        </div>
                    </div>
                    <div class="row style_row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 style-image-width">
                                    <div class="custom-selectbox styles-custom-selectbox position-relative">
                                        <span><img alt="" class="img-fluid" src="{{ url('images/male-thumb.jpg')}}"></span>
                                        <select class="form-select" aria-label="Default select" name="model" id="model">
                                            @foreach($models as $model)
                                            <option value="{{$model->id}}">{{$model->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 style-image-width">
                                    <div class="custom-selectbox styles-custom-selectbox position-relative">
                                        <span><img alt="" class="img-fluid" src="{{ url('images/female-thumb.jpg')}}"></span>
                                        <select class="form-select" aria-label="Default select" name="preferred_model" id="preferred_model">
                                            @foreach($preferred_models as $preferred_model)
                                            <option value="{{$preferred_model->id}}">{{$preferred_model->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 hair_row">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-12 hair-color">
                                    <label class="mb-2">Hair Color</label>
                                    <div class="d-flex" id="hair_color">
                                        @foreach($style_colors as $color)
                                        <div class="form-check custom-radio" >
                                            <input class="form-check-input" type="radio" name="hair_color" id="flexRadioDefault1" <?php if ($i == 1) echo 'checked=""'; ?> value="{{$color->id}}" onclick="change_hair_color({{$color->id}})">
                                            <span class="form-check-label" style="background-color:{{$color->color_code}}"></span>
                                            {{$color->color_title}}
                                        </div>
                                        <?php $i++; ?>
                                        @endforeach

                                        <!--<div class="form-check custom-radio">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked="">
                                        <label class="form-check-label" for="flexRadioDefault2">Brown</label>
                                    </div> -->

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 hair-color_btn "><button type="button" class="btn save-selection-btn" onclick="$('#folderModel').modal('show')">Save Selection</button></div>
                            </div>
                        </div>
                    </div>
                    <div class="row style-image-row">
                        <div class="col-lg-6 col-md-6 col-12 style-image-col">
                            <div id="circlr">
                                <img data-src="{{url($style_colors[0]->image)}}" id="image0">
                                <img data-src="{{url($style_colors[0]->image_2)}}" id="image1">
                                <img data-src="{{url($style_colors[0]->image_3)}}" id="image2">
                                <img data-src="{{url($style_colors[0]->image_4)}}" id="image3">
                                <img data-src="{{url($style_colors[0]->image_5)}}" id="image4">
                                <img data-src="{{url($style_colors[0]->image_6)}}" id="image5">
                                <img data-src="{{url($style_colors[0]->image_7)}}" id="image6">
                                <img data-src="{{url($style_colors[0]->image_8)}}" id="image7">
                                <img data-src="{{url($style_colors[0]->image_9)}}" id="image8">
                                <img data-src="{{url($style_colors[0]->image_10)}}" id="image9">
                                <div id="loader"></div>
                            </div>
                            <div class="custom-range-slider">
                                <input type="range" class="form-range" id="my_range" min="0" max="9" value="1">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 style-image-width">
                            <div class="style-detail-col">
                                <div class="style-detail-inner">
                                    <h4 id="brand">{{$preferred_models[0]->brand}}</h4>
                                    <h3 id="title">{{$preferred_models[0]->title}}</h3>
                                    <p id="description">{{$preferred_models[0]->description}}</p>
                                </div>
                                <div class="style-detail-thumb">
                                    <span class="image-thumb">
                                        <img alt="" class="img-fluid" src="{{ url($styles_product[0]->image)}}" id="product_image">
                                    </span>
                                    @foreach($styles_product as $product)
                                    <a href="javascript:void(0)" class="color-thumb black-color" style="background-color:{{$product->color_code}}" onclick="change_product_color({{$product->id}})"></a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
<!-- Modal -->
<div class="modal fade" id="folderModel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="$('#folderModel').modal('hide')">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div class="custom-selectbox styles-custom-selectbox position-relative">
                    <input list="folderval" name="folder" id="folder" class="datalist_input" placeholder="Folder name or Client name">
                    <span class="data_add" onclick="addFolders()">+</span>
                    <datalist class="form-control" id="folderval" name="folderval"  style="visibility: hidden;">
                        @foreach($folders as $folder)
                        <option>{{$folder->client_folder}}</option>
                        @endforeach     
                    </datalist>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-default cta-btn">Save</button>
            </div>
        </div>

    </div>
</div>

                </form>

            </div>
        </div>
    </div>
</div>




@include('layouts.right_sidebar')
@include('layouts.footer')

<script type="text/javascript">
    var crl = circlr('circlr', {
        scroll: true,
        method: 'auto',
        loader: 'loader',
        //start:'5'
    });

    $("#my_range").on("#my_range input change", function() {
        var vol = $("#my_range").val();
        crl.turn(parseInt(vol));
    });

    function change_product_color(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('change_product_color') }}",
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data) {
                var data = JSON.parse(data);
                $('#product_image').attr('src', data.image);
            }
        });
    }


    function change_hair_color(id) {
        $.ajax({
            type: "POST",
            url: "{{ route('change_hair_color') }}",
            data: {
                id: id
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(data) {
                var data = JSON.parse(data);
                $('#image0').attr('src', data.image);
                $('#image1').attr('src', data.image2);
                $('#image2').attr('src', data.image3);
                $('#image3').attr('src', data.image4);
                $('#image4').attr('src', data.image5);
                $('#image5').attr('src', data.image6);
                $('#image6').attr('src', data.image7);
                $('#image7').attr('src', data.image8);
                $('#image8').attr('src', data.image9);
                $('#image9').attr('src', data.image10);
            }
        });
    }


    $("#model").change(function() {
        var model = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ route('getModelDetail') }}",
            data: {
                model: model
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                console.log(res.html);
                $("#preferred_model").html(res.html);
            }
        });
    });

    $("#preferred_model").change(function() {
        var enthencityModel = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ route('getEnthencityDetail') }}",
            data: {
                enthencityModel: enthencityModel
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                $("#brand").html(res.brand);
                $("#title").html(res.title);
                $("#description").html(res.description);
                $("#hair_color").html(res.html);
            }
        });
    });
    /*$("input.datalist_input").focus(function(){
        $(".modal .data_add").css("visibility", "visible"); 
    });
    $("input.datalist_input, #folderval").focusout(function(){
        $(".modal .data_add").css("visibility", "hidden"); 
    });
    $("#folderval, option").click(function(){
        $(".modal .data_add").css("visibility", "hidden"); 
    }); */
   
    /*function addFolders(){
        var folder = $("[name='folder']").val();
        $.ajax({
            type: "POST",
            url: "{{ route('addFolder') }}",
            data: {
                folder: folder
            },
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(res) {
                res = JSON.parse(res);
                if(res.id){
                    $("#folderval").append('<option value="'+res.id+'">'+res.folder_name+'</option>');
                    $("#folderval").val(res.id);
                } 
            }
        });
    }*/
</script>
@endsection