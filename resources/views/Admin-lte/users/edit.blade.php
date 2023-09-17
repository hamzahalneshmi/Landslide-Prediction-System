@include('Admin-lte.partials.header')
<div class="wrapper">
    @include('Admin-lte.partials.nav')
    @include('Admin-lte.partials.slider')
  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{ __('lang.Manage') }}</h3>
                  </div>
                  
                  <div class='col-lg-4 col-lg-offset-4'>

                    <h1><i class='fa fa-user-plus'></i>{{ __('lang.Edit') }}  {{$user->name}}</h1>
                    <hr>
                
                    {{ Form::model($user, array('url' => array('admin/users', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}
                
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                
                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                    </div>
                
                    <h5><b>{{ __('lang.GiveRole') }}</b></h5>
                
                    <div class='form-group'>
                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                
                        @endforeach
                    </div>
                
                    
                
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}
                
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
