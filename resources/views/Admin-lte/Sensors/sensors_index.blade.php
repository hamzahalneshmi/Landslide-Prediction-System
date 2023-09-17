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
                      <a style="margin-left: fluid" href="/admin/sensors/create" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">{{ __('lang.New_Sensor') }}</a>
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">{{ __('lang.AddSensor') }}</th>
                            <th scope="col">{{ __('lang.SensorName') }}</th>
                            <th scope="col">{{ __('lang.MonitoredLocation') }}</th>
                            <th scope="col">{{ __('lang.Latitude') }}</th>
                            <th scope="col">{{ __('lang.Longitude') }}</th>
                            <th scope="col">{{ __('lang.InstallationTime') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($sensors as $sensor)
                            <tr>
                                <td> {{$sensor->Sensor_ID}}</td>
                                <td> {{$sensor->Sensor_Name}}</td>
                                <td> {{$sensor->location->Location_Name}}</td>
                                <td> {{$sensor->Latitude}}</td>
                                <td> {{$sensor->Longitude}}</td>
                                <td> {{$sensor->Installation_Time}}</td>
                                <td>
                                    <a href="/admin/sensors/{{$sensor->Sensor_ID}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="/admin/sensors/{{$sensor->Sensor_ID}}" method="POST" class="float-left">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="submit" class="btn btn-block btn-danger">{{ __('lang.Delete') }}</button>
                                </form>
                                </td>
                            <tr>
                            @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      <li class="page-item">{{ $sensors->links() }}</li>
                    </ul>
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






<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title">{{ __('lang.Insertanewsensor') }}</h1>
          </div>
          <div class="modal-body">
            <form method="post" action="{{ url('/admin/sensors') }}">
              @csrf
              <div class="form-group"> 
                  <label for="Sensor_Name">{{ __('lang.SensorName') }}</label>
                  <input type="text" class="form-control" name="Sensor_Name"/>
              </div>
    
              <div class="form-group">
                <label for="Monitored_Location_ID">{{ __('lang.Location') }}</label>
                <select name="Monitored_Location_ID" class="form-control" required>
                    <option value="">{{ __('lang.Select') }}</option>
                    @foreach($Mlocations as $Mlocation)
                        <option value="{{ $Mlocation->Monitored_Location_ID }}">
                            {{ $Mlocation->Location_Name }}
                        </option>
                    @endforeach
                </select>
              </div>
    
              <div class="form-group">
                  <label for="Latitude">{{ __('lang.Latitude') }}</label>
                  <input type="number" class="form-control" step="0.0000000000001" name="Latitude"/>
              </div>
              <div class="form-group">
                  <label for="Longitude">{{ __('lang.Longitude') }}</label>
                  <input type="number" class="form-control" step="0.0000000000001" name="Longitude"/>
              </div>
              <div class="form-group">
                  <label for="Installation_Time">{{ __('lang.InstallationTime') }}</label>
                  <input type="datetime-local" class="form-control" name="Installation_Time"/>
              </div>
                                       
              <button type="submit" class="btn btn-block btn-primary">{{ __('lang.AddSensor') }}</button>
          </form>
              
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






@include('Admin-lte.partials.copyrights')

@include('Admin-lte.partials.sliderbar')

</div>
@include('Admin-lte.partials.footer')
</body>
</html>