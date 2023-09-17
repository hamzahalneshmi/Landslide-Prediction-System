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
                      <a style="margin-left: fluid" href="admin/sensors/create" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">{{ __('lang.Insertanewsenseditem') }}</a>
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">{{ __('lang.SensedItemID') }}</th>
                            <th scope="col">{{ __('lang.SensorItemName') }}</th>
                            <th scope="col">{{ __('lang.Sensor') }}</th>
                            <th scope="col">{{ __('lang.MonitoredLocation') }}</th>
                            <th scope="col">{{ __('lang.MaxValue') }}</th>
                            <th scope="col">{{ __('lang.MinValue') }}</th>
                            <th scope="col">{{ __('lang.ValueMeasurementUnit') }}</th>
                            <th scope="col">{{ __('lang.WarningValue') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($sneseditems as $sneseditem)
                            <tr>
                                <td> {{$sneseditem->Sensor_Type_ID}}</td>
                                <td> {{$sneseditem->Sensor_Type_Name}}</td>
                                <td> {{$sneseditem->sensor->Sensor_Name}}</td>
                                <td> {{$sneseditem->sensor->location->Location_Name}}</td>
                                <td> {{$sneseditem->Max_Value}}</td>
                                <td> {{$sneseditem->Min_Value}}</td>
                                <td> {{$sneseditem->Value_Measurement_Unit}}</td>
                                <td> {{$sneseditem->Warning_Value}}</td>
                                <td>
                                    <a href="/admin/senseditem/{{$sneseditem->Sensor_Type_ID}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="{{ route('admin.senseditem.destroy', $sneseditem->Sensor_Type_ID)}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $sneseditems->links() }}</li>
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
              <h1 class="modal-title">{{ __('lang.Insertanewsenseditem') }}</h1>
          </div>
          <div class="modal-body">
            <form method="post" action="/admin/senseditem">
              @csrf
              <div class="form-group"> 
                  <label for="Sensor_Type_Name">{{ __('lang.SensedItemName') }}</label>
                  <input type="text" class="form-control" name="Sensor_Type_Name"/>
              </div>
    
              <div class="form-group">
                <label for="Sensor_ID">{{ __('lang.Senso') }}</label>
                <select name="Sensor_ID" class="form-control" required>
                    <option value="">{{ __('lang.Select') }}</option>
                    @foreach($sensors as $sensor)
                        <option value="{{ $sensor->Sensor_ID }}">
                            {{ $sensor->Sensor_Name }}, {{ $sensor->location->Location_Name }}
                        </option>
                    @endforeach
                </select>
              </div>
    
              <div class="form-group">
                  <label for="Max_Value">{{ __('lang.MV') }}</label>
                  <input type="number" class="form-control" step="0.00000000001" name="Max_Value"/>
              </div>
              <div class="form-group">
                  <label for="Min_Value">{{ __('lang.MiV') }}</label>
                  <input type="number" class="form-control" step="0.0000000001" name="Min_Value"/>
              </div>
              <div class="form-group">
                  <label for="Value_Measurement_Unit">{{ __('lang.Value_Measurement_Unit') }}</label>
                  <input type="text" class="form-control" name="Value_Measurement_Unit"/>
              </div>
              <div class="form-group">
                <label for="Warning_Value">{{ __('lang.WarningValue') }}</label>
                <input type="number" class="form-control" step="0.00000000001" name="Warning_Value"/>
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