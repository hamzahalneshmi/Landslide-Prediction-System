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
                    <h3 class="card-title">{{ __('lang.Add_Permission') }} </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <div class='col-lg-4 col-lg-offset-4'>
                  
                      {{ Form::open(array('url' => 'admin/permissions')) }}
                  
                      <div class="form-group">
                          {{ Form::label('name', 'Name') }}
                          {{ Form::text('name', '', array('class' => 'form-control')) }}
                      </div><br>
                      @if(!$roles->isEmpty())
                          <h4>{{ __('lang.AssignPermissiontoRoles') }}</h4>
                  
                          @foreach ($roles as $role) 
                              {{ Form::checkbox('roles[]',  $role->id ) }}
                              {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                  
                          @endforeach
                      @endif
                      <br>
                      {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
                  
                      {{ Form::close() }}
                  
                  </div>






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
