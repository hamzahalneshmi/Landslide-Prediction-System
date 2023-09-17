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
                                <h5> Predictions</h5>
                            </div>
                            <div class="card-body">
                                

                                 <!-- Main Input For Receiving Query to our ML -->
                                 <form action="/admin/prediction/displacement"method="post">
                                    @csrf
                                    <input type="hidden" name="start" placeholder="start" required="required" value="360"/>
                                    <input type="hidden" name="end" placeholder="end" required="required" value="390" />
                                    <button type="submit" class="btn btn-primary btn-block btn-large">Displacement analysis</button>
                                </form>

                                

                                <br>
                                <form action="/admin/prediction/pressure"method="post">
                                    @csrf
                                    <input type="hidden" name="start" placeholder="start" required="required" value="360"/>
                                    <input type="hidden" name="end" placeholder="end" required="required" value="390" />
                                    <button type="submit" class="btn btn-primary btn-block btn-large">Pressure analysis</button>
                                </form>
                                <br>
                                <form action="/admin/prediction/humidity"method="post">
                                    @csrf
                                    <input type="hidden" name="start" placeholder="start" required="required" value="360"/>
                                    <input type="hidden" name="end" placeholder="end" required="required" value="390" />
                                    <button type="submit" class="btn btn-primary btn-block btn-large">Humidity analysis</button>
                                </form>
                                <br>
                                <form action="/admin/prediction/rainfull"method="post">
                                    @csrf
                                    <input type="hidden" name="start" placeholder="start" required="required" value="360"/>
                                    <input type="hidden" name="end" placeholder="end" required="required" value="390" />
                                    <button type="submit" class="btn btn-primary btn-block btn-large">Rainfull analysis</button>
                                </form>

                                <br>
                                <form action="/admin/prediction/temp"method="post">
                                    @csrf
                                    <input type="hidden" name="start" placeholder="start" required="required" value="360"/>
                                    <input type="hidden" name="end" placeholder="end" required="required" value="390" />
                                    <button type="submit" class="btn btn-primary btn-block btn-large">Tempreture analysis</button>
                                </form>
                               
                                





                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    @include('Admin-lte.partials.copyrights')

    @include('Admin-lte.partials.sliderbar')

</div>
@include('Admin-lte.partials.footer')



</body>

</html>
