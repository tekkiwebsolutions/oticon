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
                    <h2 class="heading">My Media</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec sapien enim. In et suscipit libero, non molestie risus. Praesent in nunc et ligula molestie gravida rhoncus eget augue. Cras turpis libero, venenatis non nulla at, maximus vehicula est. Etiam sollicitudin sodales tellus, a interdum nisi lacinia id. Proin egestas volutpat dui nec auctor. Suspendisse non nibh imperdiet risus bibendum consequat sed vel leo. Phasellus sed tellus at mi facilisis efficitur. Nullam ac cursus urna. Aliquam vel nulla velit.</p>
                        <div class='reports-notifications'>
                            <img src='images/notification-sign.png' class='img-fluid sign'/>
                            <p>Mp3 will expire within 3 days</p>
                            <a href=''><img src='images/close.png' class='img-fluid'/></a>
                        </div>
                        <table class="table table-reponsive table-data my-media">
                        <thead>
                            <tr>
                            <th scope="col">File Name</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                            <tr>
                            <td><a href="#" class='file-text'><img src='images/music.png'/>sample.mp3</a></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class=' icons'><a href='#'><img src='images/speaker-icon.png'/></a></td>
                            <td class=' icons'><a href='#'><img src='images/delete.png'/></td>
                            </tr>
                        </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class='row'>
                <div class="col-md-12">
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
