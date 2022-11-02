<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logoPinggir.png') }}">
    <!-- <link rel="icon" href="images/logoPinggir.png" type="image/gif" /> -->
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('plugins/bower_components/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('plugins/bower_components/morrisjs/morris.css') }}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="{{ asset('plugins/bower_components/calendar/dist/fullcalendar.css') }}" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="{{ asset('ampleadmin-minimal/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('ampleadmin-minimal/css/style.css') }}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('ampleadmin-minimal/css/colors/default.css') }}" id="theme" rel="stylesheet">
    <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    @yield('customcss')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{url('admin')}}">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon-->
                        <!-- <img src="{{ asset('logo.png') }}" alt="home" width="40px" class="dark-logo" /> -->
                        <center>
                        <img src="{{ asset('images/logoPinggir.png') }}" width="39px" alt="home" class="light-logo" />
                        </center>
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text-->
                        <!-- <img src="{{ asset('logo-text1.png') }}" width="175px" alt="home" class="dark-logo" />
                        <img src="{{ asset('logo-text1.png') }}" width="175px" alt="home" class="light-logo" /> -->
                        <b>AG-KOPI</b>
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('images/profil.jpeg')}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{ Auth::user()->nama }}</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('images/profil.jpeg')}}" alt="user" /></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->username }}</p>
                                        <!-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div> -->
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <!-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> -->
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <div class="user-profile">
                    <div class="dropdown user-pro-body">
                        <div><img src="{{ asset('images/profil.jpeg')}}" alt="user-img" class="img-circle"></div>
                        <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu animated flipInY">
                            <!-- <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li> -->
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="nav" id="side-menu">
                    @if( Auth::user()->role == 'admin')
                    <li><a href="{{url('artikel')}}" class="waves-effect"><i class="mdi mdi-newspaper fa-fw"></i> <span class="hide-menu">Artikel</span></a></li>
                    <li><a href="{{url('gambar')}}" class="waves-effect"><i class="mdi mdi-google-photos fa-fw"></i> <span class="hide-menu">Galeri</span></a></li>
                    <li><a href="{{url('Allfile')}}" class="waves-effect"><i class="mdi mdi-file-pdf fa-fw"></i> <span class="hide-menu">File</span></a></li>
                    <li><a href="{{url('youtube')}}" class="waves-effect"><i class="mdi mdi-play-circle-outline fa-fw"></i> <span class="hide-menu">Video</span></a></li>
                        <!-- <li><a href="{{url('grafik')}}" class="waves-effect"><i class="mdi mdi-chart-pie fa-fw"></i> <span class="hide-menu">Grafik</span></a></li> -->
                        <li><a href="{{url('poktan')}}" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">Kelompok Tani</span></a></li>
                        <!-- <li><a href="{{url('laporan')}}" class="waves-effect"><i class="mdi mdi-clipboard-text fa-fw"></i> <span class="hide-menu">Laporan</span></a></li> -->
                        <li> <a href="#" class="waves-effect"><i class="mdi mdi-apps fa-fw"></i><span class="hide-menu"> Master <span class="fa arrow"></span> </span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li> <a href="{{url('desa')}}"><span class="hide-menu">Desa</span></a> </li> -->
                                <li> <a href="{{url('komentar')}}"><span class="hide-menu">Komentar</span></a> </li>
                                <li> <a href="{{url('admin')}}"><span class="hide-menu">Users</span></a> </li>
                            </ul>
                        </li>
                    @elseif( Auth::user()->role == 'editor')
                        <li><a href="{{url('poktan_user')}}" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw"></i> <span class="hide-menu">Kelompok Tani</span></a></li>
                    @else
                    @endif
                        <li><a href="{{url('logout')}}" class="waves-effect"><i class="mdi mdi-logout-variant fa-fw"></i> <span class="hide-menu">Logout</span></a></li>

                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    @yield('header')
                </div>

                @yield('content')

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center" > 2022 &copy; @SyarifuanEfendi </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('ampleadmin-minimal/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('ampleadmin-minimal/js/waves.js') }}"></script>
    <!--Counter js -->
    <script src="{{ asset('plugins/bower_components/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/counterup/jquery.counterup.min.js') }}"></script>
    <!-- chartist chart -->
    <!-- <script src="{{ asset('plugins/bower_components/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}"></script> -->
    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('ampleadmin-minimal/js/custom.min.js') }}"></script>
    <!-- <script src="{{ asset('ampleadmin-minimal/js/dashboard1.js') }}"></script> -->
    <script src="{{ asset('plugins/bower_components/toast-master/js/jquery.toast.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/morrisjs/morris.js') }}"></script>

    <!--Style Switcher -->
    <script src="{{ asset('plugins/bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
