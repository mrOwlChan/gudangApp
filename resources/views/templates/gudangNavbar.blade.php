<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GudangApp | Gudang Panel</title>

        <!-- jQuery -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
       
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
       
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
       
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
       
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
       
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/jqvmap/jqvmap.min.css') }}">
       
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">
       
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
       
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.css') }}">
       
        <!-- summernote -->
        <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.css') }}">

        {{-- Icon Title --}}
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/icons/warehouse_icon.png') }}">   

        {{-- Link to Other Libraries or CSS--}}
        @yield('libsOnHeader')

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/" class="nav-link"><span class="fas fa-home"></span> Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link"><span class="fas fa-info-circle"></span> About</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                @include('templates.partials.navbar_item_userpanel')

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('assets/images/icons/warehouse_icon.png') }}" alt="GudangApp Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">GudangApp</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar mt-3 mb-3">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview {{ Request::is('dashboard') ? 'menu-open' : '' }} ">
                                <a href="#" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./index2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./index3.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dashboard v3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item has-treeview {{ (Request::is('warehouse') || Request::is('warehouse*')  ? 'menu-open' : '') }}">
                                <a href="#" class="nav-link {{ (Request::is('warehouse') || Request::is('warehouse*')  ? 'active' : '') }}">
                                    <i class="nav-icon fas fa-warehouse"></i>
                                    <p>
                                        Warehouse
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="warehouse" class="nav-link {{ (Request::is('warehouse') || Request::is('warehouse/create')  ? 'active' : '') }}">
                                            <i class="{{ (Request::is('warehouse') || Request::is('warehouse/create')  ? 'far fa-dot-circle' : 'far fa-circle') }} nav-icon"></i>
                                            <p>Warehouse List</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./index2.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Warehouse Stocks</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="./index3.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock Movements</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="pages/widgets.html" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>
                                        Widgets
                                        <span class="right badge badge-danger">New</span>
                                    </p>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        Layout Options
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">6</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Top Navigation + Sidebar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/boxed.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Boxed</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Sidebar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-topnav.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Navbar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/fixed-footer.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Fixed Footer</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Collapsed Sidebar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                    <p>
                                        Charts
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/charts/chartjs.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>ChartJS</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/flot.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Flot</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/charts/inline.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inline</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            {{-- <li class="nav-header">EXAMPLES</li> --}}
                            {{-- <li class="nav-item">
                                <a href="pages/calendar.html" class="nav-link">
                                    <i class="nav-icon far fa-calendar-alt"></i>
                                    <p>
                                        Calendar
                                        <span class="badge badge-info right">2</span>
                                    </p>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="pages/gallery.html" class="nav-link">
                                    <i class="nav-icon far fa-image"></i>
                                    <p>
                                        Gallery
                                    </p>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-envelope"></i>
                                    <p>
                                        Mailbox
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="pages/mailbox/mailbox.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Inbox</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/mailbox/compose.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Compose</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/mailbox/read-mail.html" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Read</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    @yield('contentHeader')
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        @yield('mainContent')
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2021-2022. MeowChan</strong>
                <div class="float-right d-none d-sm-inline-block">
                    Powered By<b><a href="https://adminlte.io"> AdminLTE.io</a> version</b> 3.1.0-pre
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        {{-- <!-- jQuery -->
        <script src="assets/AdminLTE/plugins/jquery/jquery.min.js"></script> --}}
        
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <!-- ChartJS -->
        <script src="{{ asset('assets/AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
        
        <!-- Sparkline -->
        <script src="{{ asset('assets/AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
        
        <!-- JQVMap -->
        <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        
        <!-- daterangepicker -->
        <script src="{{ asset('assets/AdminLTE/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
        
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        
        <!-- Summernote -->
        <script src="{{ asset('assets/AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
        
        <!-- overlayScrollbars -->
        <script src="{{ asset('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.js') }}"></script>
        
        {{-- Link to Other Libraries --}}
        @yield('libsOnFooter')
    </body>
</html>
