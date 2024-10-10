<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>Zaara Travels | {{ $title ?? 'Admin Dashboard' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Zaara Travels | Admin Dashboard" name="description" />
    {{-- UPLON --}}

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ config('app.url') }}/assets/assets/images/favicon.ico">

    <!-- Vendor css -->
    <link href="{{ config('app.url') }}/assets/assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ config('app.url') }}/assets/assets/css/app.min.css" rel="stylesheet" type="text/css"
        id="app-style" />

    <!-- Icons css -->
    <link href="{{ config('app.url') }}/assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ config('app.url') }}/assets/assets/js/config.js"></script>

    @yield('head')
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">


        <!-- Sidenav Menu Start -->
        <div class="sidenav-menu">

            <!-- Brand Logo -->
            <a href="index.html" class="logo">
                <span class="logo-light">
                    <span class="logo-lg"><img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg"
                            alt="logo"></span>
                    <span class="logo-sm"><img src="{{ config('app.url') }}/assets/images/favicon.png"
                            alt="small logo"></span>
                </span>

                <span class="logo-dark">
                    <span class="logo-lg"><img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg"
                            alt="dark logo"></span>
                    <span class="logo-sm"><img src="{{ config('app.url') }}/assets/images/favicon.png"
                            alt="small logo"></span>
                </span>
            </a>

            <!-- Sidebar Hover Menu Toggle Button -->
            <button class="button-sm-hover">
                <i class="ti ti-circle align-middle"></i>
            </button>

            <!-- Full Sidebar Menu Close Button -->
            <button class="button-close-fullsidebar">
                <i class="ti ti-x align-middle"></i>
            </button>

            <div data-simplebar>

                <!--- Sidenav Menu -->
                <ul class="side-nav">
                    <li class="side-nav-title">Navigation</li>

                    <li class="side-nav-item">
                        <a href="{{ route('home') }}" class="side-nav-link home">
                            <span class="menu-icon"><i class="mdi mdi-view-dashboard"></i></span>
                            <span class="menu-text"> Dashboard </span>

                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('booking.index') }}" class="side-nav-link Bookings">
                            <span class="menu-icon"><i class="ti ti-brand-booking"></i></span>
                            <span class="menu-text"> Bookings </span>

                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('driver.index') }}" class="side-nav-link Drivers">
                            <span class="menu-icon"><i class="ti ti-user"></i></span>
                            <span class="menu-text"> Drivers </span>

                        </a>
                    </li>
                    <li class="side-nav-item cab">
                        <a data-bs-toggle="collapse" href="#sidebarTables" aria-expanded="false"
                            aria-controls="sidebarTables" class="side-nav-link">
                            <span class="menu-icon"><i class="mdi mdi-car"></i></span>
                            <span class="menu-text"> Cabs Category</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarTables">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('cab.index') }}" class="side-nav-link">
                                        <span class="menu-text">View Category</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('cab.create') }}" class="side-nav-link">
                                        <span class="menu-text">Add Category</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item local_city">
                        <a data-bs-toggle="collapse" href="#local_city" aria-expanded="false" aria-controls="local_city"
                            class="side-nav-link">
                            <span class="menu-icon"><i class="mdi mdi-city"></i></span>
                            <span class="menu-text"> Local City</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="local_city">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('local_city.index') }}" class="side-nav-link">
                                        <span class="menu-text">View Cities</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('local_city.create') }}" class="side-nav-link">
                                        <span class="menu-text">Add City</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item blogs">
                        <a data-bs-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs"
                            class="side-nav-link">
                            <span class="menu-icon"><i class="mdi mdi-file"></i></span>
                            <span class="menu-text"> Blogs</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="blogs">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('blogs.index') }}" class="side-nav-link">
                                        <span class="menu-text">View Blogs</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('blogs.create') }}" class="side-nav-link">
                                        <span class="menu-text">Add Blog</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item Pages">
                        <a data-bs-toggle="collapse" href="#Pages" aria-expanded="false" aria-controls="Pages"
                            class="side-nav-link">
                            <span class="menu-icon"><i class="ti ti-files"></i></span>
                            <span class="menu-text"> Pages</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="Pages">
                            <ul class="sub-menu">
                                <li class="side-nav-item">
                                    <a href="{{ route('pages.index') }}" class="side-nav-link">
                                        <span class="menu-text">View Pages</span>
                                    </a>
                                </li>
                                <li class="side-nav-item">
                                    <a href="{{ route('pages.create') }}" class="side-nav-link">
                                        <span class="menu-text">Add Pages</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>




                </ul>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Sidenav Menu End -->

        <!-- Topbar Start -->
        <header class="app-topbar">
            <div class="page-container topbar-menu">
                <div class="d-flex align-items-center gap-2">

                    <!-- Brand Logo -->
                    <a href="index.html" class="logo">
                        <span class="logo-light">
                            <span class="logo-lg"><img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg"
                                    alt="logo"></span>
                            <span class="logo-sm"><img src="{{ config('app.url') }}/assets/images/favicon.png"
                                    alt="small logo"></span>
                        </span>

                        <span class="logo-dark">
                            <span class="logo-lg"><img src="{{ config('app.url') }}/assets/images/Zaara-Logo.svg"
                                    alt="dark logo"></span>
                            <span class="logo-sm"><img src="{{ config('app.url') }}/assets/images/favicon.png"
                                    alt="small logo"></span>
                        </span>
                    </a>

                    <!-- Sidebar Menu Toggle Button -->
                    <button class="sidenav-toggle-button px-2">
                        <i class="mdi mdi-menu font-24"></i>
                    </button>

                    <!-- Horizontal Menu Toggle Button -->
                    <button class="topnav-toggle-button px-2" data-bs-toggle="collapse"
                        data-bs-target="#topnav-menu-content">
                        <i class="mdi mdi-menu font-22"></i>
                    </button>


                </div>

                <div class="d-flex align-items-center gap-2">
                    <!-- Light/Dark Toggle Button  -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" id="light-dark-mode" type="button">
                            <i class="ti ti-moon font-22"></i>
                        </button>
                    </div>




                    <!-- User Dropdown -->
                    <div class="topbar-item nav-user">
                        <div class="dropdown">
                            <a class="topbar-link dropdown-toggle drop-arrow-none px-2" data-bs-toggle="dropdown"
                                data-bs-offset="0,25" type="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ config('app.url') }}/assets/assets/images/users/avatar-1.jpg"
                                    width="32" class="rounded-circle me-lg-2 d-flex" alt="user-image">
                                <span class="d-lg-flex flex-column gap-1 d-none">
                                    <h6 class="my-0">{{ Auth::user()->name }}</h6>
                                </span>
                                <i class="mdi mdi-chevron-down d-none d-lg-block align-middle ms-2"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <div class="dropdown-header bg-primary mt-n3 rounded-top-2">
                                    <h6 class="text-overflow text-white m-0">Welcome ! {{ Auth::user()->name }}</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account-outline"></i>
                                    <span>Profile</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-cog"></i>
                                    <span>Settings</span>
                                </a>



                                <div class="dropdown-divider"></div>


                                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout-variant"></i>
                                    <span>Logout</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Button Trigger Customizer Offcanvas -->
                    <div class="topbar-item d-none d-sm-flex">
                        <button class="topbar-link" data-bs-toggle="offcanvas"
                            data-bs-target="#theme-settings-offcanvas" type="button">
                            <i class="mdi mdi-cog-outline font-22"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        <!-- Topbar End -->


        <div class="page-content">

            <div class="page-container">

                @yield('content')

                <footer class="footer">
                    <div class="page-container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> © Zaara Travels - By <span
                                    class="fw-semibold text-decoration-underline text-primary">SVT INDIA</span>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->


    <!-- Vendor js -->
    <script src="{{ config('app.url') }}/assets/assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="{{ config('app.url') }}/assets/assets/js/app.js"></script>

    <!--Morris Chart-->
    <script src="{{ config('app.url') }}/assets/assets/libs/morris.js/morris.min.js"></script>
    <script src="{{ config('app.url') }}/assets/assets/libs/raphael/raphael.min.js"></script>

    <!-- Projects Analytics Dashboard App js -->
    <script src="{{ config('app.url') }}/assets/assets/js/pages/dashboard-sales.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif
        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
    @yield('script')
</body>

</html>
