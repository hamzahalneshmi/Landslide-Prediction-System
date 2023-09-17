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
                                <h5>Rainfull Predictions</h5>
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
                                                data: [-1.509628911177805, 12.057767638662181, 5.5181785288788685, 12.577809540157066, 15.179367228038666, 13.059779877499066, 0.16526665076389957, 0.085487859454628, 8.26581234181696, 2.901804333809457, 8.32275339631027, 4.230482998631749, -1.2235214982268374, 5.831065739071179, 4.580213215546083, 16.30346740316697, 5.964151476810294, 6.444244668003513, 6.317762364942622, 6.3438746972939075, 3.6362958359716613, 6.468855189360697, 5.968955599763037, 3.680185481821607, 3.4009172090956783, 4.932126107761581, 4.379735572330082, 5.229538322438064, 6.005143136558383, 5.691390284569123, 5.6365623758545045]
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
                                                data: [7.049757946,
0.768335373,
10.47301599,
7.507757721,
12.36598087,
14.24172721,
12.36215434,
0.515959185,
1.061013285,
10.77604794,
1.342333758,
8.339537332,
6.406005429,
0.211723523,
4.714746683,
6.46781679,
15.35767122,
5.167381346,

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
