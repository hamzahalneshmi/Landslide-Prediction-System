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
                    
    
                      <a style="margin-left: fluid" href="/admin/category/create')}}" class="btn btn-primary" data-toggle="modal" data-target="#ModalLoginForm">{{ __('lang.New_C') }}</a>
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('lang.Category_Na') }}</th>
                            <th scope="col">{{ __('lang.Created_at') }}</th>
                            <th scope="col">{{ __('lang.updated_at') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td> {{$category->id}}</td>
                                <td> {{$category->name}}</td>
                                <td> {{$category->created_at}}</td>
                                <td> {{$category->updated_at}}</td>
                                <td>
                                    <a href="/admin/category/{{$category->id}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="/admin/category/{{$category->id}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $categories->links() }}</li>
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
              <h1 class="modal-title">{{ __('lang.Insert_a_new') }}</h1>
          </div>
          <div class="modal-body">
            <form method="post" action="/admin/category">
              @csrf
              <div class="form-group"> 
                  <label for="category_name">{{ __('lang.Category_N') }}</label>
                  <input type="text" class="form-control" name="category_name"/>
              </div>
              <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Add_Category') }}</button>
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