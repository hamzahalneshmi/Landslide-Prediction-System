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
                    <h3 class="card-title">{{ __('lang.Manage') }}</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">


                    <div class='col-lg-4 col-lg-offset-4'>

                        <h1><i class='fa fa-user-plus'></i> {{ __('lang.AddUser') }}</h1>
                        <hr>
                    
                        {{ Form::open(array('url' => 'admin/users')) }}
                    
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', array('class' => 'form-control')) }}
                        </div>
                    
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', array('class' => 'form-control')) }}
                        </div>
                    
                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                    
                            @endforeach
                        </div>
                    
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}
                    
                        </div>
                    
                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                    
                        </div>
                    
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
