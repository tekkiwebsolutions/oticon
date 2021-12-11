@extends('layouts.app')
@include('layouts.header')

@section('content')
<?php 
$i=1; 
if(isset($_GET['page']) && $_GET['page']>1){
    $i= (($_GET['page']-1)*10)+1; 
}


?>
<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h2 class="heading">Saved Agendas</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                        <div class='reports-notifications' id="alert_msg">
                            <img src='images/notification-sign.png' class='img-fluid sign'/>
                            <p>Agendas will expire within x-day</p>
                            <a href="javascript:voide(0)" onclick="$('#alert_msg').remove()"><img src='images/close.png' class='img-fluid'/></a>
                        </div>
                        <div class='agendas'>
                        <a href="{{route('myaccount_agendas_create')}}" class='create_agenda'>Create Agenda </a>
                        <table class="table table-reponsive table-data myaccount-agendas">
                        <thead>
                            <tr>
                            <th scope="col">SL.NO</th>
                            <th scope="col">Created Date</th>
                            <th scope="col">Title</th>
                            <th scope="col">File name</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($agendas) && $agendas->count())
                            @foreach($agendas as $agenda)
                            <?php  $pdfName= explode('agendas/', $agenda->pdf); ?>
                                <tr>
                                    <td scope="row">{{$i}}</td>
                                    <td>{{date("d M, Y", strtotime($agenda->created_at))}}</td>
                                    <td>{{$agenda->title}}</td>
                                    <td>
                                        <a href="{{url($agenda->pdf)}}" class='file-text' target="_blank" >
                                            <img src='images/pdf-icon.png'/>{{$pdfName[1]}}
                                        </a>
                                    </td>
                                    <td class='icons'>
                                        <a href="{{route('myaccount_agendas_edit',$agenda->id)}}">
                                            <img src='images/edit.png'/>
                                        </a>
                                    </td>
                                    <td class=' icons'>
                                        <a href="{{route('delete_agendas', $agenda->id)}}">
                                            <img src='images/delete.png'/>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                            @else
                                <tr>
                                    <td colspan="10">There are no data.</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 col-lg-12 pagination_bar'>
                {!! $agendas->links() !!}
                <!-- <ul class='pagination-myaccount'>
                            <li class='previous-icon'><a href='#'><img src='images/previous-icon.png'/></a></li>
                            <li class='active'><a href=''>1</a></li>
                            <li class=''><a href='#'>2</a></li>
                            <li class=''><a href='#'>3</a></li>
                            <li class=''>...</li>
                            <li class=''><a href='#'>12</a></li>
                            <li class='next-icon'><a href='#'><img src='images/next-icon.png'/></a></li>
                        </ul> -->
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

@endsection
