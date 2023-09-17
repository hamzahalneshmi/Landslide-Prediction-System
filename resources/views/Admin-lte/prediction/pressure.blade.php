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
                                <h5>Pressure Predictions</h5>
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
                                                data: [848.1762586004181, 852.9222317105504, 841.9087350422359, 844.3467884308096, 840.1940485218023, 844.6737375256951, 848.0373489273471, 839.4096152655587, 843.319986417981, 842.4241656760586, 842.3234844197744, 841.2802273095654, 850.2999106668789, 851.6084095921756, 845.8467305239543, 845.4290288752711, 849.170430591208, 849.8623713513937, 849.6670034927515, 850.3560345459981, 850.4748664950635, 850.0605321670674, 848.3152694412682, 849.9200396905871, 849.300738220143, 850.5155771300844, 850.5471529820728, 847.8351690263008, 849.1252006779926, 849.920455244769, 849.4501104294853]
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
                                                data: [841.450643,
849.9896733,
851.269494,
842.6735233,
847.0063123,
839.1416464,
844.0849304,
848.1945201,
839.8172982,
843.9707597,
843.0191758,
844.740873,
840.6853614,
851.1975279,
850.3353895,
846.0917873,
848.2266476,
848.1040056,

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
