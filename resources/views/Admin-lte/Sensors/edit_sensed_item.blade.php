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
                    <form method="post" action="/admin/senseditem{{$sneseditem->Sensor_Type_ID}}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group"> 
                            <label for="Sensor_Type_Name">{{ __('lang.SIN') }}</label>
                            <input type="text" class="form-control" name="Sensor_Type_Name" value={{ $sneseditem->Sensor_Type_Name }}>
                        </div>
                        <div class="form-group">
                            <label for="Sensor_ID">{{ __('lang.Senso') }}</label>
                            <select name="Sensor_ID" class="form-control" required>
                                <option value="{{ $sneseditem->sensor->Sensor_ID }}"> {{ $sneseditem->sensor->Sensor_Name }}, {{ $sneseditem->sensor->location->Location_Name }}</option>
                                @foreach($sensors as $sensor)
                                    <option value="{{ $sensor->Sensor_ID }}">
                                        {{ $sensor->Sensor_Name }}, {{ $sensor->location->Location_Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
              
                        <div class="form-group">
                            <label for="Max_Value">{{ __('lang.MV') }}</label>
                        <input type="number" class="form-control" name="Max_Value" step="0.000000001" value="{{$sneseditem->Max_Value}}"/>
                        </div>
                        <div class="form-group">
                            <label for="Min_Value">{{ __('lang.MiV') }}</label>
                            <input type="number" class="form-control" name="Min_Value" step="0.000000001" value="{{$sneseditem->Min_Value}}"/>
                        </div>
                        <div class="form-group">
                            <label for="Value_Measurement_Unit">{{ __('lang.Value_Measurement_Unit') }}</label>
                            <input type="text" class="form-control" name="Value_Measurement_Unit" value="{{$sneseditem->Value_Measurement_Unit}}"/>
                        </div>
                        <div class="form-group">
                          <label for="Warning_Value">{{ __('lang.WarningValue') }}</label>
                          <input type="number" class="form-control" name="Warning_Value" step="0.000000001" value="{{$sneseditem->Warning_Value}}"/>
                      </div>
                                             
                                                 
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.SaveSnesedItem') }}</button>
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