<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HardwareMon</title>

    <!-- logo -->
    <link href="{{ asset('assets/img/icon/LOGO.png') }}" rel="icon">
    <!-- /logo -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet"> --}}

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

    {{-- cdn toastr --}}
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
                <span class="d-none d-lg-block">HardwareMon</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">
                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">
                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="height:15rem">
                        <li class="d-flex flex-column">
                            @if (Auth::user()->avatar == '')
                                <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                                    class="rounded-circle m-auto" style="width:100px; height:100px">
                            @else
                                <img src="{{ asset('storage/avatars/') }}/{{ Auth::user()->avatar }}" alt="Profile"
                                    class="rounded m-auto" style="width:70px; height:100px">
                            @endif
                            <h6 class="m-auto mt-2">{{ Auth::user()->email }}</h6>
                            <small class="m-auto mb-1" style="font-size: 12px">Logged as :
                                {{ Auth::user()->role }}</small>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="/users-profil/{{ Auth::user()->id }}">
                                <i class="bi bi-gear"></i>
                                <small>Account Settings</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="post" action="{{ url('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link  text-decoration-none text-dark"><i
                                        class="bi bi-box-arrow-right bi-10x ms-1 hover"></i>
                                    <small class="ms-1">Logout</small>
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ url('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')
                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-person-square"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="users-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ url('users-setting') }}">
                                <i class="bi bi-circle"></i><span>Users List</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('users-group') }}">
                                <i class="bi bi-circle"></i><span>Role Group</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Categories Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#setting-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="ri-list-settings-fill"></i><span>System Setup</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="setting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ url('categories-setting') }}">
                                <i class="bi bi-circle"></i><span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('products-setting') }}">
                                <i class="bi bi-circle"></i><span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('carousels') }}">
                                <i class="bi bi-circle"></i><span>Carousels</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Setting Nav -->
            @endif
        </ul>
    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            <strong><span>HardwareMon</span></strong>. All Reserved By Andri Elistiawan&copy;2023
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="{{ asset('admin/forms/datatables-demo.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/quill/quill.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script> --}}

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

</body>

</html>
