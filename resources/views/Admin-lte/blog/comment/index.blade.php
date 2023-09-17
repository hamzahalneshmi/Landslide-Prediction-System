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
                  
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('lang.User_Name') }}</th>
                            <th scope="col">{{ __('lang.Post_ID') }}</th>
                            <th scope="col">{{ __('lang.Parent_Comment') }}</th>
                            <th scope="col">{{ __('lang.Comment_Body') }}</th>
                            <th scope="col">{{ __('lang.Created_at') }}</th>
                            <th scope="col">{{ __('lang.updated_at') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($comments as $comment)
                            <tr>
                                <td> {{$comment->id}}</td>
                                <td> {{$comment->user->name}}</td>
                                <td> {{$comment->post_id}}</td>
                                <td> {{$comment->parent_id}}</td>
                                <td> {{$comment->body}}</td>
                                <td> {{$comment->created_at}}</td>
                                <td> {{$comment->updated_at}}</td>
                                <td>
                                    <form action="/admin/comments/{{$comment->id}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $comments->links() }}</li>
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