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
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form method="post" action="/admin/MonitoredLocations/{{$location->Monitored_Location_ID}}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group"> 
                            <label for="Location_Name">{{ __('lang.LocatioName') }}</label>
                            <input type="text" class="form-control" name="Location_Name" value={{ $location->Location_Name }}>
                        </div>
              
                        <div class="form-group">
                            <label for="Latitude">{{ __('lang.Latitude') }}</label>
                            <input type="number" class="form-control" name="Latitude" step="0.000000001" value={{ $location->Latitude }}>
                        </div>
              
                        <div class="form-group">
                            <label for="Longitude">{{ __('lang.Longitude') }}</label>
                            <input type="number" class="form-control" name="Longitude" step="0.000000001" value={{ $location->Longitude }}>
                        </div>
                        <div class="form-group">
                            <label for="Hight">{{ __('lang.Hight') }}</label>
                            <input type="number" class="form-control" name="Hight" step="0.0000000001" value={{ $location->Hight }}>
                        </div>
                        <div class="form-group">
                            <label for="Installation_Time">{{ __('lang.InstallationTime') }}</label>
                            <input type="datetime-local" class="form-control" name="Installation_Time" value={{ $location->Installation_Time }}>
                        </div>
                                                 
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Savelocation') }}</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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