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
                    <form method="post" action="/admin/adminpost" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group"> 
                            <label for="Author_name">{{ __('lang.Author_N') }}</label>
                            <select name="Author_name" class="form-control" required>
                                <option value="">{{ __('lang.Select') }} </option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->id }} - {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
              
                        <div class="form-group">
                            <label for="Title">{{ __('lang.Title') }}</label>
                            <input type="test" class="form-control"  name="Title"/>
                        </div>
                        <div class="form-group">
                            <label for="Slug">{{ __('lang.Slug') }}</label>
                            <input type="text" class="form-control" name="Slug"/>
                        </div>
                        <div class="form-group">
                            <label for="Excerpt">{{ __('lang.Excerpt') }}</label>
                            <input type="text" class="form-control" name="Excerpt"/>
                        </div>
                        <div class="form-group">
                            <label for="Body">{{ __('lang.Body') }}</label>
                            <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fas fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="mb-3">
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                          class="form-control" name="Body"></textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
                        </div>
                        <div class="form-group">
                            <label for="profile_image">{{ __('lang.Image') }}</label>
                            <div class="col-md-6">
                                <input id="profile_image" type="file" class="form-control" name="profile_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Category_Name">{{ __('lang.Category_N') }}</label>
                            <select name="Category_Name" class="form-control" required>
                                <option value=""> {{ __('lang.Select') }}</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Popularity">{{ __('lang.Popularity') }}</label>
                            <input type="number" class="form-control" name="Popularity"/>
                        </div>
                                                                
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Add_Post') }}</button>
                    </form>
                  </div>
                  <!-- /.card-body -->
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