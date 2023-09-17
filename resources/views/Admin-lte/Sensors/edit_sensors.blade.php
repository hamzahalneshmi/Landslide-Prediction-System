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
                    <form method="post" action="/admin/sensors/{{$sensor->Sensor_ID}}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group"> 
                            <label for="Sensor_Name">{{ __('lang.SensorName') }}</label>
                            <input type="text" class="form-control" name="Sensor_Name" value={{ $sensor->Sensor_Name }}>
                        </div>
                        <div class="form-group">
                            <select name="Monitored_Location_ID" class="form-control" required>
                                <option value="{{ $sensor->Monitored_Location_ID }}"> {{ $sensor->location->Location_Name }}</option>
                                @foreach($Mlocations as $Mlocation)
                                    <option value="{{ $Mlocation->Monitored_Location_ID }}">
                                        {{ $Mlocation->Location_Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
              
                        <div class="form-group">
                            <label for="Latitude">{{ __('lang.Latitude') }}</label>
                            <input type="number" class="form-control" name="Latitude" step="0.000000001" value={{ $sensor->Latitude }}>
                        </div>
                        <div class="form-group">
                            <label for="Longitude">{{ __('lang.Longitude') }}</label>
                            <input type="number" class="form-control" name="Longitude" step="0.00000001" value={{ $sensor->Longitude }}>
                        </div>
                        <div class="form-group">
                            <label for="Installation_Time">{{ __('lang.InstallationTime') }}</label>
                            <input type="datetime-local" class="form-control" name="Installation_Time" value={{ $sensor->Installation_Time }}>
                        </div>
                                                 
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.SaveSensor') }}</button>
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