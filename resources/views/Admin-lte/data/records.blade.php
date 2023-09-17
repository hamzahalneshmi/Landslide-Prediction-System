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
                                <form method="post" action="/admin/data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="Sensor">Filter By Sensor:</label>
                                        <select name="Sensor" class="form-control">
                                            <option value=""> -- Select One --</option>
                                            @foreach ($sensors as $sensor)
                                                <option value="{{ $sensor->Sensor_ID }}">
                                                    {{ $sensor->Sensor_ID }} - {{ $sensor->Sensor_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="senseditem">Filter By Sensed Item:</label>
                                        <select name="senseditem" class="form-control" >
                                            <option value=""> -- Select One --</option>
                                            @foreach ($senseditems as $senseditem)
                                                <option value="{{ $senseditem->Sensor_Type_ID }}">
                                                    {{$senseditem->Sensor_Type_ID}} - {{ $senseditem->Sensor_Type_Name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-block btn-primary">Filter</button>
                                </form>



                            </div>
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>{{ __('lang.ID') }}</th>
                                            <th>{{ __('lang.Location') }}</th>
                                            <th>{{ __('lang.Sensor') }}</th>
                                            <th>{{ __('lang.Sensed_Item') }}</th>
                                            <th>{{ __('lang.Data') }}</th>
                                            <th>{{ __('lang.Time') }}</th>
                                            <th>{{ __('lang.Note') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($records as $record)
                                                <td>{{ $record->Recored_ID }}</td>
                                                <td>{{ $record->sensor->location->Monitored_Location_ID }} {{ $record->sensor->location->Location_Name }}</td>
                                                <td>{{ $record->sensor->Sensor_ID }} {{ $record->sensor->Sensor_Name }}</td>
                                                <td>{{ $record->type->Sensor_Type_ID }} {{ $record->type->Sensor_Type_Name }}</td>
                                                <td>{{ $record->Data }}</td>
                                                <td>{{ $record->Time }}</td>
                                                <td>
                                                    {{ $record->Note }}
                                                    
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ __('lang.ID') }}</th>
                                            <th>{{ __('lang.Location') }}</th>
                                            <th>{{ __('lang.Sensor') }}</th>
                                            <th>{{ __('lang.Sensed_Item') }}</th>
                                            <th>{{ __('lang.Data') }}</th>
                                            <th>{{ __('lang.Time') }}</th>
                                            <th>{{ __('lang.Note') }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item">{{ $records->links() }}</li>
                                </ul>
                            </div>
                            <a href="/admin/backup" class="btn btn-info">Export all data as CSV</a>
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
