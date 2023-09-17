<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('lang.System_Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">





                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    {{ __('lang.Security') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('Show Users')
                                <li class="nav-item">
                                    <a href="{{ url('admin/users/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Manage') }}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Show Roles')
                                <li class="nav-item">
                                    <a href="{{ url('admin/roles/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Roles') }}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Show Permissions')
                                <li class="nav-item">
                                    <a href="{{ url('admin/permissions/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Permissions') }}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>




                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tools"></i>
                                <p>
                                    {{ __('lang.Sensors') }}
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('Show Initialization')
                                <li class="nav-item">
                                    <a href="{{ url('admin/initialization/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.System_Initialization') }}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Show Monitored locations')
                                <li class="nav-item">
                                    <a href="{{ url('admin/MonitoredLocations/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Monitored_Locations') }}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Show Sensors')
                                <li class="nav-item">
                                    <a href="{{ url('admin/sensors/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Sensors_Management') }}</p>
                                    </a>
                                </li>
                                @endcan
                                @can('Show Sensed Items')
                                <li class="nav-item">
                                    <a href="{{ url('admin/senseditem/') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('lang.Sensed_Item_Management') }}</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @can('Read Data')
                        <li class="nav-item">
                            <a href="{{ url('admin/data/') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    {{ __('lang.Data') }}
                                    <span class="right badge badge-danger">{{ __('lang.New') }}</span>
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('Show Landslides Predictions')
                        <li class="nav-item">
                            <a href="{{ url('admin/prediction/') }}" class="nav-link">
                                <i class="nav-icon fas fa-code-branch"></i>
                                <p>
                                    {{ __('lang.Landslides_Predictions') }}
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('Show Displacement')
                        <li class="nav-item">
                            <a href="{{ url('admin/displacementMonitoring') }}" class="nav-link">
                                <i class="nav-icon fas fa-code-branch"></i>
                                <p>
                                    {{ __('lang.Displacement_Monitoring') }}
                                </p>
                            </a>
                        </li>
                        @endcan
                    </ul>

                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>
                            {{ __('lang.Front_End_Management') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('Show Categories')
                        <li class="nav-item">
                            <a href="{{ url('admin/category/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('lang.Categories') }}</p>
                            </a>
                        </li>
                        @endcan
                        
                        @can('Show Posts')
                        <li class="nav-item">
                            <a href="{{ url('admin/adminpost/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('lang.Posts') }}</p>
                            </a>
                        </li>
                        @endcan
                        @can('Show Comments')
                        <li class="nav-item">
                            <a href="{{ url('admin/comments/') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('lang.Comments') }}</p>
                            </a>
                        </li>
                        @endcan
                        @can('Show Newsletter')
                        <li class="nav-item">
                            <a href="{{ url('/newsletter') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('lang.Newsletter') }}</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
