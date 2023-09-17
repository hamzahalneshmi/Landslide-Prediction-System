@include('Admin-lte.partials.header')
<div class="wrapper">
    @include('Admin-lte.partials.nav')
    @include('Admin-lte.partials.slider')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    @include('partials.alerts')

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Humidity Predictions</h5>
                            </div>
                            <div class="card-body">


                               




                                <!-- Main content -->
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- AREA CHART -->
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">{{ __('lang.AreaChart') }}</h3>

                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-tool"
                                                                data-card-widget="remove"><i
                                                                    class="fas fa-times"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="chart">
                                                            <canvas id="areaChart"
                                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->

                                                <!-- DONUT CHART -->



                                            </div>
                                           
                                            <!-- LINE CHART -->
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">{{ __('lang.LineChart') }}</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                                class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                                class="fas fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="chart">
                                                        <canvas id="lineChart"
                                                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                    </div>
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </section>
                                <!-- /.content -->
                               <h6>predictions from 2020-12-24 to 2021-1-22 :</h6> {{ $data['chart_data'] }}
                               
                                <!-- /.content-wrapper -->

                                <!-- Control Sidebar -->
                                @include('Admin-lte.partials.copyrights')

                                @include('Admin-lte.partials.sliderbar')

                            </div>
                            @include('Admin-lte.partials.footer')


                            <script>
                                $(function() {
                                    //--------------
                                    //- AREA CHART -
                                    //--------------

                                    // Get context with jQuery - using jQuery's .get() method.
                                    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
                                    var areaChartData = {
                                        labels: ['24', '25', '26', '27', '28', '29',
                                            '30','31','1','2', '3', '4', '5', '6', '7',
                                            '8','9','10','11', '12', '13', '14', '15', '16',
                                            '17','18','19','20','21','22'],
                                        datasets: [{
                                                label: 'Predictions',
                                                backgroundColor: 'rgba(60,141,188,0.9)',
                                                borderColor: 'rgba(60,141,188,0.8)',
                                                pointRadius: false,
                                                pointColor: '#3b8bba',
                                                pointStrokeColor: 'rgba(60,141,188,1)',
                                                pointHighlightFill: '#fff',
                                                pointHighlightStroke: 'rgba(60,141,188,1)',
                                                data: [25.232178101118524, 33.38752561145999, 29.686298694846947, 31.20190543800231, 32.54446787724444, 29.74458778249645, 31.305249234160893, 25.183076996922974, 28.446260289199742, 30.63431708515401, 28.801367412060493, 29.71449937493323, 31.042462956178465, 33.11891405719805, 31.46470975744948, 30.54492090017405, 24.172327908927745, 23.790456546711095, 24.109155006052053, 23.220706255527332, 24.546149659980408, 24.61001211302115, 23.82840747478534, 24.55404747404059, 25.127193451814428, 25.476161523015378, 24.475570563717444, 23.85342404248797, 23.32211325983289, 22.888144838010984, 23.659598985666875]
                                            },
                                            {
                                                label: 'Data',
                                                backgroundColor: 'rgba(210, 214, 222, 1)',
                                                borderColor: 'rgba(210, 214, 222, 1)',
                                                pointRadius: false,
                                                pointColor: 'rgba(210, 214, 222, 1)',
                                                pointStrokeColor: '#c1c7d1',
                                                pointHighlightFill: '#fff',
                                                pointHighlightStroke: 'rgba(220,220,220,1)',
                                                data: [37.29719145,
24.83011754,
32.93095845,
19.89420563,
35.72222707,
40.63571009,
31.5692172,
32.92691673,
39.93809813,
29.62864102,
27.10865982,
24.66412831,
35.14421948,
30.04097231,
39.80980454,
22.59223766,
38.95784107,
23.71617462,

]
                                            },
                                        ]
                                    }

                                    var areaChartOptions = {
                                        maintainAspectRatio: false,
                                        responsive: true,
                                        legend: {
                                            display: false
                                        },
                                        scales: {
                                            xAxes: [{
                                                gridLines: {
                                                    display: false,
                                                }
                                            }],
                                            yAxes: [{
                                                gridLines: {
                                                    display: false,
                                                }
                                            }]
                                        }
                                    }

                                    // This will get the first returned node in the jQuery collection.
                                    var areaChart = new Chart(areaChartCanvas, {
                                        type: 'line',
                                        data: areaChartData,
                                        options: areaChartOptions
                                    })
                                    
 //-------------
                                    //- LINE CHART -
                                    //--------------
                                    var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
                                    var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
                                    var lineChartData = jQuery.extend(true, {}, areaChartData)
                                    lineChartData.datasets[0].fill = false;
                                    lineChartData.datasets[1].fill = false;
                                    lineChartOptions.datasetFill = false

                                    var lineChart = new Chart(lineChartCanvas, {
                                        type: 'line',
                                        data: lineChartData,
                                        options: lineChartOptions
                                    })
                                   

                                })

                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>

</html>
