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
                    
    
                      <a style="margin-left: fluid" href="/admin/adminpost/create" class="btn btn-primary">{{ __('lang.New_Post') }}</a>
                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                        <tr>
                            <th scope="col">{{ __('lang.Post_ID') }}</th>
                            <th scope="col">{{ __('lang.Author_Name') }}</th>
                            <th scope="col">{{ __('lang.Title') }}</th>
                            <th scope="col">{{ __('lang.Slug') }}</th>
                            <th scope="col">{{ __('lang.Excerpt') }}</th>
                            <th scope="col">{{ __('lang.Body') }}</th>
                            <th scope="col">{{ __('lang.Image') }}</th>
                            <th scope="col">{{ __('lang.Category_Na') }}</th>
                            <th scope="col">{{ __('lang.Popularity') }}</th>
                            <th scope="col">{{ __('lang.Created_at') }}</th>
                            <th scope="col">{{ __('lang.Action') }}</th>

                          </tr>
                      </thead>
                      <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td> {{$post->id}}</td>
                                <td> {{$post->user->name}}</td>
                                <td> {{$post->title}}</td>
                                <td> {{$post->slug}}</td>
                                <td style="
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 200px;
                                  "> {{$post->excerpt}}</td>
                                <td style="
                                    white-space: nowrap;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    max-width: 200px;
                                  "> {{$post->body}}</td>
                                <td> <img src="/images/{{$post->image}}" alt="" width="100" height="100"></td>
                                <td> {{$post->category->name}}</td>
                                <td> {{$post->view_count}}</td>
                                <td> {{$post->created_at}}</td>
                                <td>
                                    <a href="/admin/adminpost/{{$post->id}}/edit" class="float-left">
                                      <button type="button" class="btn btn-block btn-primary">{{ __('lang.Edit') }}</button>
                                    </a>
                                <form action="/admin/adminpost/{{$post->id}}" method="POST" class="float-left">
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
                      <li class="page-item">{{ $posts->links() }}</li>
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