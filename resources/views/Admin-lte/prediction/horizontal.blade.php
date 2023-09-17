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
                                <h5>Displacement Predictions</h5>
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
                                                        <h3 class="card-title">{{ __('lang.AreaChart') }} for the horizontal displacement</h3>

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
                                                    <h3 class="card-title">{{ __('lang.LineChart') }} for the horizontal displacement</h3>

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
                                        











                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- AREA CHART -->
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">{{ __('lang.AreaChart') }} for the vertical displacement</h3>

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
                                                            <canvas id="areaChart2"
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
                                                    <h3 class="card-title">{{ __('lang.LineChart') }} for the vertical displacement</h3>

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
                                                        <canvas id="lineChart2"
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
                               <h6>predictions for the horizontal displacement from 2020-12-24 to 2021-1-22 :</h6> {{ $data['chart_data'] }}
                               <br>
                               <br>
                               <h6>predictions for the vertical displacement from 2020-12-24 to 2021-1-22 :</h6> {{ $data2['chart_data'] }}

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
                                                data: [783.9045287261398, 810.0677152117411, 805.5393254536318, 807.1074696118771, 800.8475867931985, 802.2726238880194, 806.9607165192699, 810.0677181464732, 809.5902122360607, 808.3519052648656, 813.4009821576625, 813.480481290316, 804.038555981725, 808.8117695563554, 803.6238238769154, 799.9823354696468, 793.9360041600273, 793.5766046351223, 788.094566613293, 787.0323388045074, 807.5731904247835, 804.3881583584982, 808.2431254361339, 806.3195682552727, 800.115921337292, 805.553919762982, 810.4613215556249, 809.8719252890302, 808.9270360331393, 813.3875070821069, 814.0313695619491, 817.8906113007996, 810.4665900178334, 801.3681195289769, 799.000658963284, 791.2877220268317, 775.3394244945035, 805.73363073273, 810.4618584953502, 817.97624041467, 824.1364830204216, 836.5147844957515, 802.1600236609237, 807.455864204327, 795.1303226990092, 785.1067671186348, 779.5382262049054, 770.8280662686514, 754.5757058367356, 747.8462200742249, 740.7670420430879, 729.3269634521614, 717.6252283362493, 708.1956203627407, 699.3381914198402, 691.99817639123, 681.8099385334953, 806.7758575552924, 809.1003741169948, 810.3745549366784, 801.1449761260178, 803.4834332389901, 810.2672505016629, 805.9141458576211, 801.2577765099359, 799.091904910301, 804.0256532473951, 805.6763668838302, 810.7799579864161, 802.7953547562079, 810.0870747590768, 807.2351513693069, 801.2911248515676, 803.7406836571265, 808.169328031045, 806.8921023744377, 805.289144858325, 803.6831718676013]
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
                                                data: [807.1395,
805.3431,
804.9081667,
809.7886,
806.968,
804.1474,
801.3268,
806.8938,
806.8690667,
806.5928,
804.3478,
807.9926,
804.0559,
805.9885,
804.0082333,
807.5581,
807.8252,
808.0674
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








<script>
    $(function() {
        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart2').get(0).getContext('2d')
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
                    data: [-249.65582559514, -235.9472961942061, -254.4464688635074, -251.4019649595443, -255.38004302867552, -254.83732625993449, -262.76051209547035, -256.4377405213894, -263.0249275423497, -264.4685689672441, -266.6214857586237, -269.1221000647435, -269.57729876217604, -261.4611978397506, -276.3387051969195, -254.50199229527522, -249.33605307022557, -240.04052365215318, -238.42350855689722, -222.39624390950675, -221.15968583239652, -213.6518913078331, -206.52748456878564, -200.15811448061106, -190.56421414619976, -173.89262735686142, -179.80546121726294, -168.38308454930547, -163.14914960619285, -152.93872433147732, -151.0986391306875, -136.378906451064, -134.94224712010546, -127.45327850022181, -119.33348399958486, -112.91723196422275, -104.40593181925533, -227.07653745131532, -239.2834628234144, -235.1548980630043, -238.83565190451384, -234.72642311130025, -237.6883062561697, -235.25811519651413, -245.62257409459377, -237.1289086092157, -238.03557341766736, -242.584881393192, -248.22365956169313, -240.2895269335208, -257.0751319279432, -234.13095014525507, -232.6563489452301, -235.6334917013536, -238.57071755337137, -244.39697853286887, -252.3040240545176, -257.002313119834, -262.9886003680911, -268.51894905315936, -276.9876450777454, -269.67909633618063, -285.5964940502448, -287.1277133524274, -294.70626542556374, -297.61235624491417, -308.776736341002, -306.64442158742185, -316.25090105381474, -243.10119408488143, -222.10886261857317, -252.6215170520719, -207.99427644547785, -174.10917966304095, -162.34837120914506, -138.22744816218759, -117.8448944328018, -116.5871962891277]
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
                    data: [-267.55,
-272.9,
-278.25,
-283.6,
-288.95,
-294.3,
-299.65,
-305,
-310.35,
-315.7,
-242.3,
-221.4,
-251,
-203.85,
-182.35,
-160.85,
-139.35,
-117.85
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
        var lineChartCanvas = $('#lineChart2').get(0).getContext('2d')
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
