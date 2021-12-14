@extends('layouts.app')
@include('layouts.header')

@section('content')
<?php $moreUrl =""; ?>
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
                       <a href="{{ route('reports', $ageCatUrl ) }}"  class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    </div>

                    <div class="col-md-3">
                    <form action="">
                        @if (isset($_GET['search']) && $_GET['search']!="") 
                            <input type="hidden" name="search" value="{{trim($_GET['search'])}}" />
                            <?php $moreUrl .="&search=".$_GET['search']; ?>
                        @endif
                        <select name="order" class="form-control" onchange = 'this.form.submit();'>
                        <option value="DESC" @if (isset($_GET['order']) && $_GET['order'] == 'DESC') selected @endif >Oldest</option>
                            <option value="ASC" @if (isset($_GET['order']) && $_GET['order'] == 'ASC') selected @endif >Newest</option>
                        </select>
                    </form>
                    </div>
                    <div class="col-md-4">
                    <form action="">
                        @if (isset($_GET['order'])) 
                            <input type="hidden" name="order" value="{{$_GET['order']}}"/>
                            <?php $moreUrl .="&order=".$_GET['order']; ?>
                        @endif
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="search" value="@if (isset($_GET['search']) && $_GET['search'] !="" ){{trim($_GET['search']) }}@endif"  placeholder="Search here" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" class="read_more" value="Search"/>
                            </div>
                        </div>
                        </form>
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 pb-4" id="data-wrapper">
                        @if(!empty($resources) && $resources->count())
                            @foreach($resources as $resource)
                            <div class='all-reports'> 
                                <div class="all-reports-inner  @if(isset($resource->url) && $resource->url !="") highlighted @endif ">
                                <a href="{{ route('resources', [$ageCatUrl, $resource->id]) }}" class="text-decoration-none">
                                    <h3>{{Str::limit($resource->title, 100, ' ...')}}</h3>
                                </a>
                                <p>{{Str::limit($resource->description, 250, ' ...')}} </p>
                                @if(isset($resource->pdf_upload) && $resource->pdf_upload !="")
                                    <p><a href='{{url($resource->pdf_upload)}}' class='download-pdf' target="_blank" ><img src="{{ url('images/pdf-icon.png')}}" /><span>download pdf</span></a></p>
                                
                                @endif
                                
                                @if(isset($resource->url) && $resource->url !="")
                                <p><a href="{{ route('resources', [$ageCatUrl, $resource->id]) }}" class='read_more' ><span>Read More</span></a></p>
                                @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div class='all-reports'> 
                                <td colspan="10">There are no data.</td>
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

<script>
    var ENDPOINT = "{{ url('/') }}";
    var page = 2;
    //infinteLoadMore(page);

    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() >= $(document).height()-100) {
            
            infinteLoadMore(page);
            page++;
        }
    });

    function infinteLoadMore(page) {
        $.ajax({
                url: ENDPOINT + "/reports/{{$ageCatUrl}}/?page=" + page+"{{$moreUrl}}",
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    $('.auto-load').show();
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }
                $('.auto-load').hide();
                $("#data-wrapper").append(response);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
    }

</script>
@endsection
