@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-6">
                        <h2 class="heading">BINAURAL BENEFITS</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 text-end">
                       <a href="#" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12 col-12'>
                    <!-- <img src='images/binaural-graph.png' class='img-fluid' width="100%"/> -->
                    <div id='canvas_id'>
                        <canvas id="line-chart" width="200" height="200"></canvas>
                        <div class='canvas_data'>
                                <span>Quiet Room</span>
                                <span class='noisy'>Noisy Environment</span>
                        </div>
                    </div>
                     <script>
                        const labels = ['0%',' ','20%',' ','40%',' ','60%',' ','80%',' ','100%'];
                        //const fillPattern = ctx.createPattern(img, 'repeat');
                       // img.src = 'images/ears.png';
                       var yourImage = new Image()
                       yourImage.src = "{{ url('/images/ears.png')}}";
                       var binauralimage = new Image()
                       binauralimage.src = "{{ url('images/Binaural-Fitting.png')}}"; 
                       var Normalimg = new Image()
                       Normalimg.src = "{{ url('images/third-icon.png')}}";  

                        var data = {
                            labels: labels,
                            datasets: [{
                                    label: 'Monaural Fitting ',
                                    data: [0,12,30, 33, 35, 40, 50, 55, 66,70,80],
                                    fill: false,
                                    //  hidden : true,
                                    borderColor: 'rgb(126, 196, 244)',
                                    tension: 0.1,
                                    borderWidth: 1,
                                    pointStyle: [yourImage],
                                    //backgroundColor:fillPattern
                                },
                                {
                                label: 'Binaural Fitting',
                                    data: [10,20, 40, 45, 50, 70, 75, 76,80,90],
                                    fill: false,

                                    borderColor: 'rgb(198, 23, 141)',
                                    tension: 0.1,
                                    borderWidth: 1,
                                    pointStyle: [binauralimage],
                                },
                                {
                                    label: 'Binaural Fitting',
                                    data: [15,55, 60, 65, 70, 72, 82, 86,89,90],
                                    fill: false,
                                    borderColor: 'rgb(102,102,102)',
                                    tension: 0.1,
                                    borderWidth: 1,
                                    height: 500,
                                    pointStyle: [Normalimg],
                                }


                            ]
                        }

                        const config = {
                            type: 'line',
                            data: data,
                            
                            options: {
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                 
                                    }
                                },
                                scales: {
                                    y: {
                                        ticks: {
                                        callback: function(val, index) {
                                            if (val == 0){
                                                return '';
                                            }
                                            else if (val == 10) {
                                                return 'Party';
                                            } else if (val == 20) {
                                                return 'Street';
                                            }
                                            else if (val == 30){
                                                return 'Restaurant';
                                            }
                                            else if (val == 40){
                                                return 'Store';
                                            }
                                            else if (val == 50){
                                                return 'Car';
                                            }
                                            else if (val == 60){
                                                return 'Group Conversation';
                                            }
                                            else if (val == 70){
                                                return 'Television';
                                            }
                                            else if (val == 80){
                                                return 'One Speaker ';
                                            }
                                            else if (val == 90){
                                                return '';
                                            }

                                        },
                                        }
                                    },

                                }
                            }
                        };


                        const myChart = new Chart(
                            document.getElementById('line-chart'),
                            config
                        );





                    </script>
                    </div>
                </div>
                <div class="row  checkbox-ideal">
                    <div class="col-md-1 col-lg-1 col-12 line-green justify-content-between align-items-center p-0">
                       <p class='ideal'></p>
                    </div>
                    <div class="col-md-1 col-lg-1 col-12 justify-content-between align-items-center">
                       <p class='ideal-text'>Ideal</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                    <div class="custom-control custom-checkbox checkboxes">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox1">
                                        <label class="custom-control-label" for="customCheckBox1">Monaural Fitting</label>
                                    </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                    <div class="custom-control custom-checkbox checkboxes">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox2">
                                        <label class="custom-control-label" for="customCheckBox2">Binaural Fitting</label>
                                    </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                    <div class="custom-control custom-checkbox checkboxes">
                                        <input type="checkbox" class="custom-control-input" id="customCheckBox3">
                                        <label class="custom-control-label" for="customCheckBox3">Normal Hearing</label>
                                    </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection
