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
                    <div class="col-lg-12 col-md-12 col-12">
                        <h2 class="heading">Saved Agendas</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                        <div class='reports-notifications'>
                            <img src='images/notification-sign.png' class='img-fluid sign'/>
                            <p>Agendas will expire within x-day</p>
                            <a href=''><img src='images/close.png' class='img-fluid'/></a>
                        </div>
                        <div class='agendas'>
                        <a href='#' class='create_agenda'>Create Agenda </a>
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
                            <tr>
                            <td scope="row">01</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td scope="row">02</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td scope="row">03</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td scope="row">04</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td scope="row">05</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td scope="row">06</td>
                            <td>20 Jun, 2021</td>
                            <td><p>Lorem ipsum dolor sit amet</p></td>
                            <td><a href="#" class='file-text'><img src='images/pdf-icon.png'/>sample.pdf</a></td>
                            <td class='icons'><a href='#'><img src='images/edit.png'/></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12 col-lg-12'>
                <ul class='pagination-myaccount'>
                            <li class='previous-icon'><a href='#'><img src='images/previous-icon.png'/></a></li>
                            <li class='active'><a href=''>1</a></li>
                            <li class=''><a href='#'>2</a></li>
                            <li class=''><a href='#'>3</a></li>
                            <li class=''>...</li>
                            <li class=''><a href='#'>12</a></li>
                            <li class='next-icon'><a href='#'><img src='images/next-icon.png'/></a></li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footer')

@endsection
