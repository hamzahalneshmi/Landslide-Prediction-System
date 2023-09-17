@include('Admin-lte.partials.header')
<div class="wrapper">
    @include('Admin-lte.partials.nav')
    @include('Admin-lte.partials.slider')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('lang.EditRole') }} {{ $role->name }}</h3>
                            </div>




                            <div class='col-lg-4 col-lg-offset-4'>


                                {{ Form::model($role, ['url' => ['admin/roles', $role->id], 'method' => 'PUT']) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Role Name') }}
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>

                                <h5><b>{{ __('lang.AssignPermissions') }}</b></h5>
                                @foreach ($permissions as $permission)

                                    {{ Form::checkbox('permissions[]', $permission->id, $role->permissions) }}
                                    {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

                                @endforeach
                                <br>
                                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}

                                {{ Form::close() }}
                            </div>



                        </div>
                    </div>
                </div>
            </div>
    <!-- /.row -->
</section>
</div>

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
