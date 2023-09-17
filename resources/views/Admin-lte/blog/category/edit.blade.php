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

                   </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <form method="post" action="/admin/category/{{$category->id}}">
                        @method('PATCH') 
                        @csrf
                        <div class="form-group"> 
                            <label for="category_name">{{ __('lang.Category_N') }}</label>
                            <input type="text" class="form-control" name="category_name" value={{ $category->name }}>
                        </div>
                        
                                             
                                                 
                        <button type="submit" class="btn btn-block btn-primary">{{ __('lang.Save_C') }}</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
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