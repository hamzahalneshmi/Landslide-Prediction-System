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
                    <h3 class="card-title"></h3>
                    <h1>{{ __('lang.Manage') }}Manage
                    <a href="{{ url('admin/users/create') }}" class="btn btn-success">{{ __('lang.AddUser') }}</a>
                    <a href="{{ url('admin/roles/') }}" class="btn btn-default pull-right">{{ __('lang.Roles') }}</a>
                    <a href="{{ URL::to('admin/permissions') }}" class="btn btn-default pull-right">{{ __('lang.Permissions') }}</a>
                    </h1>

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">{{ __('lang.ID') }}</th>
                            <th scope="col">{{ __('lang.Name') }}</th>
                            <th scope="col">{{ __('lang.Email') }}</th>
                            <th scope="col">{{ __('lang.EmailVerification') }}</th>
                            <th>{{ __('lang.UserRoles') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{$user->id}}</td>
                                <td> {{$user->name}}</td>
                                <td> {{$user->email}}</td>
                                <td> {{$user->email_verified_at}}</td>
                                <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}

                                <td>
                                    <a href="/admin/users/{{$user->id}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="/admin/users/{{$user->id}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $users->links() }}</li>
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
