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
                <h3 class="card-title"></h3>
            <h1> Roles
              <a href="{{ URL::to('admin/roles/create') }}" class="btn btn-success">{{ __('lang.AddRole') }}</a>

            <a href="{{ url('admin/users') }}" class="btn btn-default pull-right">{{ __('lang.Users') }}</a>
            <a href="{{ url('admin/permissions') }}" class="btn btn-default pull-right">{{ __('lang.Permissions') }}</a>
          </h1>
              </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('lang.Role') }}</th>
                            <th>{{ __('lang.Permissions') }}</th>
                            <th>{{ __('lang.Action') }}</th>
                        </tr>
                    </thead>
        
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
        
                            <td>{{ $role->name }}</td>
        
                            <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                            <td>
                            <a href="{{ URL::to('admin/roles/'.$role->id.'/edit') }}" class="btn btn-primary pull-left" style="margin-right: 3px;">{{ __('lang.Edit') }}</a>
                            <form action="{{ url('admin/roles', $role->id)}}" method="POST" class="float-left">
                              {{ method_field('DELETE') }}
                              @csrf
                              <button type="submit" class="btn btn-block btn-danger">{{ __('lang.Delete') }}</button>
                            </form>
        
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
        
                </table>
            </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item">{{ $roles->links() }}</li>
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
@include('Admin-lte.partials.copyrights')

@include('Admin-lte.partials.sliderbar')

</div>
@include('Admin-lte.partials.footer')
</body>
</html>
