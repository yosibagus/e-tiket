<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Administrator U-Fest</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Yosi Bagus Sadar Rasuli">
    <meta name="robots" content="">

    <meta name="keywords" content="UNIBA FESTIVAL 2024, KOTAK BAND">
    <meta name="description" content="">

    <meta property="og:title" content="Administrator U-Fest">
    <meta property="og:description" content="">
    <meta property="og:image" content="{{ asset('logo.png') }}">
    <meta name="format-detection" content="telephone=no">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo.png') }}">
    <link href="{{ asset('xhtml') }}/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('xhtml/css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="">
                                            <img src="{{ asset('logo.png') }}" width="150" alt="">
                                        </a>
                                    </div>
                                    <h4 class="text-center mb-4">Masuk ke akun anda</h4>

                                    @if (Session::has('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <form action="" method="POST" action="">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 form-label"> Username</label>
                                            <input type="text" name="username" class="form-control"
                                                placeholder="Username" value="">
                                            @error('username')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="mb-4 position-relative">
                                            <label class="mb-1 form-label">Password</label>
                                            <input type="password" name="password" id="dz-password" class="form-control"
                                                value="" placeholder="....">
                                            <span class="show-pass eye">
                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>
                                            </span>
                                            @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-primary light btn-block">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('xhtml') }}/vendor/global/global.min.js"></script>
    <script src="{{ asset('xhtml') }}/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('xhtml') }}/js/custom.min.js"></script>
    <script src="{{ asset('xhtml') }}/js/deznav-init.js"></script>
</body>

</html>
