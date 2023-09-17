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
                    
    
                      <a style="margin-left: fluid" href="/admin/initialization/create')}}" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">New Role</a>
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">{{ __('lang.ID') }}</th>
                            <th scope="col">{{ __('lang.Sensor') }}</th>
                            <th scope="col">{{ __('lang.SensorItemName') }}</th>
                            <th scope="col">{{ __('lang.High_Risk_Top') }}</th>
                            <th scope="col">{{ __('lang.High_Risk_Bottom') }}</th>
                            <th scope="col">{{ __('lang.Medium_Risk_Top') }}</th>
                            <th scope="col">{{ __('lang.Medium_Risk_Bottom') }}</th>
                            <th scope="col">{{ __('lang.Low_Risk_Top') }}</th>
                            <th scope="col">{{ __('lang.Low_Risk_Bottom') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                            
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($initializations as $initialization)
                            <tr>
                                <td> {{$initialization->Initialization_ID}}</td>
                                <td> {{$initialization->sensed_item->sensor->Sensor_Name}}</td>
                                <td> {{$initialization->sensed_item->Sensor_Type_Name}}</td>
                                <td> {{$initialization->High_Risk_Top}}</td>
                                <td> {{$initialization->High_Risk_Bottom}}</td>
                                <td> {{$initialization->Medium_Risk_Top}}</td>
                                <td> {{$initialization->Medium_Risk_Bottom}}</td>
                                <td> {{$initialization->Low_Risk_Top}}</td>
                                <td> {{$initialization->Low_Risk_Bottom}}</td>
                                
                                <td>
                                    <a href="/admin/initialization/{{$initialization->Initialization_ID}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="{{ route('admin.initialization.destroy', $initialization->Initialization_ID)}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $initializations->links() }}</li>
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
                <h1 class="modal-title">{{ __('lang.System_Initialization') }}</h1>
            </div>
            <div class="modal-body">
              <form method="post" action="/admin/initialization">
                @csrf
                <div class="form-group">
                  <label for="Sensor_Type_ID">{{ __('lang.SensedItemName') }}</label>
                  <select name="Sensor_Type_ID" class="form-control" required>
                      <option value="">{{ __('lang.Select') }}</option>
                      @foreach($sneseditems as $sneseditem)
                          <option value="{{ $sneseditem->Sensor_Type_ID }}">
                            {{ $sneseditem->Sensor_Type_ID }} , {{ $sneseditem->Sensor_Type_Name }}
                          </option>
                      @endforeach
                  </select>
                </div>
      
                <div class="form-group">
                    <label for="High_Risk_Top">{{ __('lang.High_Risk_Top') }}</label>
                    <input type="number" class="form-control" step="0.00000000001" name="High_Risk_Top"/>
                </div>
                <div class="form-group">
                    <label for="High_Risk_Bottom">{{ __('lang.High_Risk_Bottom') }}</label>
                    <input type="number" class="form-control" step="0.0000000001" name="High_Risk_Bottom"/>
                </div>
                <div class="form-group">
                    <label for="Medium_Risk_Top">{{ __('lang.Medium_Risk_Top') }}</label>
                    <input type="number" class="form-control"step="0.0000000001" name="Medium_Risk_Top"/>
                </div>
                <div class="form-group">
                  <label for="Medium_Risk_Bottom">{{ __('lang.Medium_Risk_Bottom') }}</label>
                  <input type="number" class="form-control" step="0.00000000001" name="Medium_Risk_Bottom"/>
              </div>
              <div class="form-group">
                <label for="Low_Risk_Top">{{ __('lang.Low_Risk_Top') }}</label>
                <input type="number" class="form-control" step="0.00000000001" name="Low_Risk_Top"/>
            </div>
            <div class="form-group">
                <label for="Low_Risk_Bottom">{{ __('lang.Low_Risk_Bottom') }}</label>
                <input type="number" class="form-control" step="0.00000000001" name="Low_Risk_Bottom"/>
            </div>
                                         
                <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Add') }}</button>
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