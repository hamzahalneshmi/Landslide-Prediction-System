@include('Admin-lte.partials.header')
<div class="wrapper">
    @include('Admin-lte.partials.nav')
    @include('Admin-lte.partials.slider')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('lang.Error') }}</h3>
                            </div>
                            <div>
                                <h1>
                                    <center>{{ __('lang.401') }}<br>
                                        {{ __('lang.ACCESSDENIED') }}</center>
                                </h1>
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
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>{{ __('lang.Title') }}</h5>
            <p>{{ __('lang.Sidebarcontent') }}</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    @include('Admin-lte.partials.copyrights')
</div>
@include('Admin-lte.partials.footer')
</body>

</html>
