@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrap">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.reports_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area side-content-account">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <h2 class="heading">Reports</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                        <div class='reports-notifications' id="alert_msg">
                            <img src='images/notification-sign.png' class='img-fluid sign' />
                            <p>Reports will expire within {{$siteData->reports_exp}} day(s)</p>
                            <a href="javascript:voide(0)" onclick="$('#alert_msg').remove()"><img src='images/close.png' class='img-fluid' /></a>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block" id="success_msg">
                                    <strong>{{ $message }}</strong>
                                    <a href="javascript:voide(0)" onclick="$('#success_msg').remove()" class="close" data-dismiss="alert" ><img src="images/close.png" class="img-fluid"></a>
                                </div>
                            @endif
                            </div>
                        </div>
                        <div class="table_cover_row">
                            <table class="table table-reponsive table-data myaccounts_reports_table">
                                <thead>
                                    <tr>
                                        <th scope="col">SL.NO</th>
                                        <th scope="col">Created Date</th>
                                        <th scope="col">File Name</th>
                                        <th scope="col">Client Folder</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                        <th scope="col"></th> 
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($excelData as $value)
                                    <tr>
                                        <td scope="row">{{$loop->iteration}}</td>
                                        <td>{{date("d M, Y", strtotime($value->created_at))}}</td>
                                        <td><a href="{{asset($value->excel_path)}}" class='file-text'><img src='images/sample-text.png' />{{$value->file_name}}</a></td>
                                        
                                        <td>{{$value->client_folder}}</td>
 

                                        <td class='text-center'><a href='{{asset($value->pdf_path)}}' target="_blank"><span>View Details</span></a></td>
                                        <td class=' icons'><a href="{{route('sendpdf', $value->id)}}" ><img src='images/envolpe.png' /></a></td>
                                        <td class=' icons'><a href="{{asset($value->pdf_path)}}" target="_blank"><img src='images/download.png' /></a></td>
                                        <td class=' icons'><a  href="{{route('exceldelete', $value->id)}}" onclick="return confirm('Are you sure?')" ><img src='images/delete.png' /></td>
                                    </tr>
                                    @endforeach 								  
									 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 col-lg-12 pagination_bar'>
                    {!! $excelData->links() !!}							 
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

@endsection
