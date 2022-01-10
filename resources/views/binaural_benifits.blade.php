@extends('layouts.app')
@include('layouts.header')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            @include('layouts.left_sidebar')
            <div class="col-lg-10 col-md-10 col-12 center-area">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h2 class="heading">BINAURAL BENEFITS</h2>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 text-end">
                       <a href="{{ route('yourSolutionCat', $ageCatUrl) }}" class="back_btn">Back</a>
                    </div>
                </div>
                <div class="row">
                    <div class='col-md-12 col-12'>
                    <!-- <img src='images/binaural-graph.png' class='img-fluid' width="100%"/> -->
                    <div id='canvas_id'>
                        <canvas id="line-chart"></canvas>
                        <div class='canvas_data'>
                                <span>Quiet Room</span>
                                <span class='noisy'>Noisy Environment</span>
                        </div>
                    </div>
                     <script>
                         var labelData=[];
                         for(var i=0; i<=100; i++){
                             labelData.push(i+'%');
                         }
                        const labels = ['0%',' ','20%',' ','40%',' ','60%',' ','80%',' ','100%'];
                        //const labels =labelData;
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
                                    label: "Monaural Fitting",
                                    data:[ {x: 5, y: 10}, {x: 12, y: 20}, {x: 20, y: 30}, {x: 22, y: 40}, {x: 23, y: 50}, {x: 25, y: 60}, {x: 40, y: 70}, {x: 46, y: 80}, {x: null, y: 90}],
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
                                data:[ {x: 57, y: 10}, {x: 60, y: 20}, {x: 62, y: 30}, {x: 58, y: 40}, {x: 55, y: 50}, {x: 54, y: 60}, {x: 53, y: 70}, {x: 58, y: 80}],
                                    fill: false,
                                    borderColor: 'rgb(198, 23, 141)',
                                    tension: 0.1,
                                    borderWidth: 1,
                                    pointStyle: [binauralimage],
                                },
                                {
                                    label: 'Normal Hearing',
                                    data:[ {x: 65, y: 10}, {x: 67, y: 20}, {x: 69, y: 30}, {x: 75, y: 40}, {x: 83, y: 50}, {x: 90, y: 60}, {x: 93, y: 70}, {x: 94, y: 80}],
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
                                        //display: false,
                                        position: 'bottom', 
                                        
                                    },
                                },                                 
                                responsive: true,
                                scales: {
                                    x: {
                                        display: true,
                                        type: 'linear',
                                        min: 0,
                                        max: 100, 
                                        ticks: { 
                                            callback: function(value, index, values) {
                                                return  value+'%';
                                            }
                                        }
                                    },  
                                    y: {
                                        beginAtZero: true,
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
                    <div class="row ">
                        <div class="col-md-1 col-lg-1 col-12 line-green justify-content-between align-items-center p-0">
                        <p class='ideal'></p>
                        </div>
                        <div class="col-md-1 col-lg-1 col-12 justify-content-between align-items-center">
                        <p class='ideal-text'>Ideal</p>
                        </div>
                    </div>
                </div>
                <!--<div class="row  checkbox-ideal">
                    <div class="col-md-1 col-lg-1 col-12 line-green justify-content-between align-items-center p-0">
                       <p class='ideal'></p>
                    </div>
                    <div class="col-md-1 col-lg-1 col-12 justify-content-between align-items-center">
                       <p class='ideal-text'>Ideal</p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                        <div class="custom-control custom-checkbox checkboxes">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox1" checked >
                            <label class="custom-control-label" for="customCheckBox1">Monaural Fitting</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                        <div class="custom-control custom-checkbox checkboxes">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox2" checked>
                            <label class="custom-control-label" for="customCheckBox2">Binaural Fitting</label>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3 col-12 d-flex justify-content-between align-items-center position-relative ">
                        <div class="custom-control custom-checkbox checkboxes">
                            <input type="checkbox" class="custom-control-input" id="customCheckBox3" checked >
                            <label class="custom-control-label" for="customCheckBox3">Normal Hearing</label>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>


@include('layouts.right_sidebar')
@include('layouts.footer')

@endsection
