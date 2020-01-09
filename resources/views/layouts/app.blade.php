<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="http://asset.wibs.sch.id/migration/admin/css/app.css" rel="stylesheet" type="text/css">
    <link href="http://asset.wibs.sch.id/migration/admin/css/style.css" rel="stylesheet" type="text/css">
    <link href="http://asset.wibs.sch.id/migration/admin/css/icons.css" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css"> -->
    @stack('css')

    <!-- Favicons -->
    <link href="{{ asset('img/logoIconAlWafi.png') }}" rel="icon">

</head>

<body>
    <!-- Loader -->
    <div id="preloader"><div id="status"><div class="spinner"></div></div></div>
    @include('sweetalert::alert')
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <!-- Text Logo -->
                    <!--<a href="#" class="logo">-->
                    <!--Annex-->
                    <!--</a>-->
                    <!-- Image Logo -->
                    <a href="{{ url('home') }}" class="logo mt-2">
                        <img src="{{ asset('img/logoAlWafi.png') }}" alt="" height="55" class="logo-small">
                        <img src="{{ asset('img/logoAlWafi.png') }}" alt="" height="65" class="logo-large">
                    </a>

                </div>
                <!-- End Logo container-->


                <div class="menu-extras topbar-custom">

                    <ul class="list-inline float-right">
                        <!-- User-->
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user mt-2" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                {{ Auth::user()->name }}
                                <!-- <img src="http://asset.wibs.sch.id/migration/admin/images/bg-account.png" alt="{{ Auth::user()->name }}" class="rounded-circle"> -->
                                <img src="{{ asset('img/profile.png') }}" alt="{{ Auth::user()->name }}" class="ml-1 rounded-circle">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5>Welcome</h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                                <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
																							document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout m-r-5 text-muted"></i> Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->

        <!-- MENU Start -->
        @include('layouts.navbar')
    </header>
    <!-- End Navigation Bar-->


    <div class="wrapper mt-3">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">WIBS</a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title mt-4">@yield('title')</h4>
                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <!-- Page Content -->
            <div class="m-b-30">
                @yield('content')
            </div>
            <!-- End Page Content -->

        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->


    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    © 2018 WIBSSCH by BERNITEK.
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Scripts -->
    
    <!-- <script src="{{ asset('js/jquery.min..js') }}"></script>
    <script src="{{ asset('js/popper.min..js') }}"></script>
    <script src="{{ asset('js/bootstrap.min..js') }}"></script>
    <script src="{{ asset('js/modernizr.min..js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

    <script src="{{ asset('plugins/skycons/skycons.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script> -->
    
    <script src="http://asset.wibs.sch.id/migration/admin/js/jquery.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/popper.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/bootstrap.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/modernizr.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/waves.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/jquery.slimscroll.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/jquery.nicescroll.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/js/jquery.scrollTo.min.js"></script>

    <script src="http://asset.wibs.sch.id/migration/admin/plugins/skycons/skycons.min.js"></script>
    <script src="http://asset.wibs.sch.id/migration/admin/plugins/raphael/raphael-min.js"></script>


    <script type="text/javascript">
        function StartLoader() {
            $('#status').fadeIn();
            $('#preloader').delay(350).fadeIn('slow');
            $('body').delay(350).css({
                'overflow': 'invisible'
            });
        }

        function FinishLoader() {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({
                'overflow': 'visible'
            });
        }
    </script>
    @stack('js')
    <!-- App js -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="http://asset.wibs.sch.id/migration/admin/js/app.js"></script>

</body>

</html>