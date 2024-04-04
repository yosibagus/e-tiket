<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>{{ $title }} - UNIBA FESTIVAL</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="Yosi Bagus Sadar Rasuli">
    <meta name="og:devlopment_site" content="https://yosibagus.github.io/p/">

    <meta name="keywords" content="uniba, madura, pengajuan skripsi, t2s">
    <meta name="description" content="Sistem Pengajuan Judul Skripsi Uniba Madura">

    <meta property="og:title" content="T2S - Title Thesis Submision System">
    <meta property="og:description" content="Sistem Pengajuan Judul Skripsi Uniba Madura">
    <meta property="og:image" content="social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('t2s.svg') }}">
    <link href="{{ asset('xhtml') }}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('xhtml/vendor/select2/css/select2.min.css') }}">
    <link href="{{ asset('xhtml') }}/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('xhtml/vendor/animate/animate.min.css') }}">
    <link href="{{ asset('xhtml') }}/vendor/sweetalert2/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('xhtml') }}/css/style.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <style>
        .nav-header .brand-title {
            margin-left: 10px;
            max-width: 145px;
            margin-top: 0px;
        }
    </style>
    <script src="{{ asset('jquery-3.7.1.min.js') }}"></script>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->




    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo" aria-label="U-FEST">
                {{-- <img class="logo-abbr" src="{{ asset('logo.png') }}" alt=""> --}}
                <img class="logo-compact" src="{{ asset('logo.png') }}" alt="">
                <img class="brand-title" src="{{ asset('logo.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->


        <!--**********************************
            Header start
        ***********************************-->
        <header class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                                {{ $title }}
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">

                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
                                    <img src="https://static.vecteezy.com/system/resources/previews/024/983/914/original/simple-user-default-icon-free-png.png"
                                        width="20" alt="">
                                    <div class="header-info">
                                        <span class="text-black"><strong>Yosi Bagus</strong></span>
                                        <p class="fs-12 mb-0">Admin</p>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="{{ url('logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                            width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12">
                                            </line>
                                        </svg>
                                        <span class="ms-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ url('') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="@active('transaksi/*')"><a class="has-arrow ai-icon" href="javascript:void()"
                            aria-expanded="false">
                            <i class="flaticon-381-notepad"></i>
                            <span class="nav-text">Transaksi</span>
                        </a>
                        <ul aria-expanded="false">
                            <li class="">
                                <a class="" href="{{ url('transaksi/mhs') }}">Mahasiswa</a>
                            </li>
                            <li><a href="{{ url('transaksi/non') }}">Non Mahasiswa</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('rekapitulasi-transaksi') }}" class="ai-icon" aria-expanded="false">
                            <i class="flaticon-381-layer-1"></i>
                            <span class="nav-text">Rekapitulasi Transaksi</span>
                        </a>
                    </li>
                    <li class="@active('petugas/*')"><a href="{{ url('setting') }}" class="ai-icon"
                            aria-expanded="false">
                            <i class="flaticon-381-user"></i>
                            <span class="nav-text">Akses</span>
                        </a>
                    </li>
                    <li class="@active('setting/*')"><a href="{{ url('setting') }}" class="ai-icon"
                            aria-expanded="false">
                            <i class="flaticon-381-settings-2"></i>
                            <span class="nav-text">Setting Tiket</span>
                        </a>
                    </li>
                </ul>
                <div class="copyright">
                    <img src="{{ asset('bem.png') }}" width="150" alt="">
                    <p class="mt-3"><strong>E-Tiket System</strong> © 2024 All Rights Reserved</p>
                    <p>Powered by Yosi Bagus</p>
                </div>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body default-height">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
            Footer start
        ***********************************-->
        <footer class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="https://yosibagus.github.io/p/"
                        target="_blank">Yosi
                        Bagus</a> 2024</p>
            </div>
        </footer>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end

        ***********************************-->

    @include('script.script')

    @yield('script')

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                footer: '<img src="{{ asset('logo.png') }}" width="100">',
            })
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'Gagal',
                text: '{{ session('error') }}',
                icon: 'error',
                footer: '<img src="{{ asset('logo.png') }}" width="100">',
            })
        </script>
    @endif

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
