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
    <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">

    {{-- cdn toastr --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function() {
            $(".preloader").fadeOut();
        })
    </script>
    <style type="text/css">
        .hover-effect:hover {
            transform: scale(1.1);
            transition: 0.5s;
            border-radius: 5px;
            cursor: pointer;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <div class="loading">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p>Loading Data, Harap tunggu..</p>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ url('dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
                <span class="d-none d-lg-block">HardwareMon</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        {{-- profil navigation --}}
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                {{-- profil image --}}
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a>
                    {{-- End Profile Iamge  --}}

                    {{-- menu profil --}}
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="height:15rem">
                        <li class="d-flex flex-column">
                            @if (Auth::user()->avatar == '')
                                <img src="{{ asset('admin/assets/img/avatar/avatar.png') }}" alt="Profile"
                                    class="rounded m-auto" style="width:100px; height:100px">
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
                {{-- end menu profil --}}
            </ul>
        </nav>
        {{-- end profil navigation --}}
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}"
                    href="{{ url('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->
            @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')
                <li class="nav-heading">Pages</li>

                <li class="nav-item">
                    <a class="nav-link collapsed " data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-file-richtext"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="data-nav"
                        class="nav-content 
                        {{ request()->routeIs(['products-setting', 'categories-setting', 'carousels']) ? '' : 'collapse' }}
                        "
                        data-bs-parent="#sidebar-nav">
                        <li class="{{ request()->routeIs('products-setting') ? 'nav-link' : 'collapsed' }} ">
                            <a href="{{ url('products-setting') }}">
                                <i class="bi bi-circle"></i><span>Products</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('categories-setting') ? 'nav-link' : 'collapsed' }} ">
                            <a href="{{ url('categories-setting') }}">
                                <i class="bi bi-circle"></i><span>Categories</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('carousels') ? 'nav-link' : 'collapsed' }} ">
                            <a href="{{ url('carousels') }}">
                                <i class="bi bi-circle"></i><span>Carousels</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Categories Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#system-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-database-gear"></i><span>System</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="system-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ url('users-setting') }}">
                                <i class="bi bi-circle"></i><span>Master Status</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('users-setting') }}">
                                <i class="bi bi-circle"></i><span>User List</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('users-group') }}">
                                <i class="bi bi-circle"></i><span>Role</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Setting Nav -->

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('carousels') ? '' : 'collapsed' }}"
                        href="{{ url('carousels') }}">
                        <i class="bi bi-gear-wide-connected"></i>
                        <span>Setting</span>
                    </a>
                </li>
            @endif
        </ul>
    </aside><!-- End Sidebar-->
    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            <strong><span>HardwareMon</span></strong>. By Andri Elistiawan
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/forms/datatables-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

</body>

</html>
