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
                    <form method="post" action="/admin/initialization/{{$initialization->Initialization_ID}}">
                        @method('PATCH') 
                        @csrf
                        
                        <div class="form-group">
                            <label for="Sensor_Type_ID">{{ __('lang.SIN') }}</label>
                            <select name="Sensor_Type_ID" class="form-control" required>
                                <option value="{{ $initialization->Sensor_Type_ID }}"> {{ $initialization->Sensor_Type_ID }} , {{ $initialization->sensed_item->Sensor_Type_Name }}</option>
                                @foreach($sneseditems as $sneseditem)
                                    <option value="{{ $sneseditem->Sensor_Type_ID }}">
                                        {{ $sneseditem->Sensor_Type_ID }}, {{ $sneseditem->Sensor_Type_Name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="High_Risk_Top">{{ __('lang.High_Risk_Top') }}</label>
                            <input type="number" class="form-control" step="0.00000000001" name="High_Risk_Top" value="{{$initialization->High_Risk_Top}}"/>
                        </div>
                        <div class="form-group">
                            <label for="High_Risk_Bottom">{{ __('lang.High_Risk_Bottom') }}</label>
                            <input type="number" class="form-control" step="0.0000000001" name="High_Risk_Bottom" value="{{$initialization->High_Risk_Bottom}}"/>
                        </div>
                        <div class="form-group">
                            <label for="Medium_Risk_Top">{{ __('lang.Medium_Risk_Top') }}</label>
                            <input type="number" class="form-control"step="0.0000000001" name="Medium_Risk_Top" value="{{$initialization->Medium_Risk_Top}}"/>
                        </div>
                        <div class="form-group">
                          <label for="Medium_Risk_Bottom">{{ __('lang.Medium_Risk_Bottom') }}</label>
                          <input type="number" class="form-control" step="0.00000000001" name="Medium_Risk_Bottom" value="{{$initialization->Medium_Risk_Bottom}}"/>
                      </div>
                      <div class="form-group">
                        <label for="Low_Risk_Top">{{ __('lang.Low_Risk_Top') }}</label>
                        <input type="number" class="form-control" step="0.00000000001" name="Low_Risk_Top" value="{{$initialization->Low_Risk_Top}}"/>
                    </div>
                    <div class="form-group">
                        <label for="Low_Risk_Bottom">{{ __('lang.Low_Risk_Bottom') }}</label>
                        <input type="number" class="form-control" step="0.00000000001" name="Low_Risk_Bottom" value="{{$initialization->Low_Risk_Bottom}}"/>
                    </div>
                                             
                                                 
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Save') }}</button>
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