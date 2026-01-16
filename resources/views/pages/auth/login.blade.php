<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Happy Puppy - Login</title><!-- Favicon icon-->
    <link rel="icon" href="{{ asset('assets') }}/images/logo/favicon.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/logo/favicon.jpg" type="image/x-icon">
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet"><!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/vendors/flag-icon.css"><!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/iconly-icon.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/bulk-style.css"><!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/themify.css"><!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/fontawesome-min.css"><!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/weather-icons/weather-icons.min.css">
    <!-- App css -->
    <link id="color" rel="stylesheet" href="{{ asset('assets') }}/css/color-6.css" media="screen">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <script defer src="{{ asset('assets') }}/css/color-1.js"></script>
    <script defer src="{{ asset('assets') }}/css/color-2.js"></script>
    <script defer src="{{ asset('assets') }}/css/color-3.js"></script>
    <script defer src="{{ asset('assets') }}/css/color-4.js"></script>
    <script defer src="{{ asset('assets') }}/css/color-5.js"></script>
    <script defer src="{{ asset('assets') }}/css/color-6.js"></script>
    <script defer src="{{ asset('assets') }}/css/style.js"></script>
    <link href="{{ asset('assets') }}/css/color-1.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/color-2.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/color-3.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/color-4.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/color-5.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/color-6.css" rel="stylesheet">
    <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
</head>

<body><!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div><!-- tap on tap ends--><!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div><!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 login_one_image"><img class="bg-img-cover bg-center"
                    src="{{ asset('assets') }}/images/login/bg.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark login-bg">
                    <div>
                        <div><a class="logo" href="index.html"><img class="img-fluid for-light m-auto"
                                    src="{{ asset('assets') }}/images/login/icon.png" alt="looginpage">
                                <img class="for-dark" src="{{ asset('assets') }}/images/login/icon.png" alt="logo"
                                    style="max-width: 150px; height: auto;"></a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form login-form" action="{{ route('doLogin') }}" method="POST"
                                onsubmit="submitPostLogin(event, $(this))">
                                @csrf
                                <h2 class="text-center">Login</h2>
                                <p class="text-center">Masukkan email &amp; password untuk masuk ke sistem</p>
                                <div class="form-group"><label class="col-form-label">Email</label><input
                                        class="form-control" type="text" name="email" id="email"
                                        placeholder="example@gmail.com">
                                </div>
                                <div class="form-group"><label class="col-form-label">Password</label>
                                    <div class="form-input position-relative"><input class="form-control"
                                            type="password" name="password" id="password" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0 checkbox-checked">
                                    <div class="text-end mt-3"><button class="btn btn-primary btn-block w-100"
                                            type="submit" id="btn_login">Sign in </button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- jquery-->
        <script src="{{ asset('assets') }}/js/vendors/jquery/jquery.min.js"></script><!-- bootstrap js-->
        <script src="{{ asset('assets') }}/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
        <script src="{{ asset('assets') }}/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script><!--fontawesome-->
        <script src="{{ asset('assets') }}/js/vendors/font-awesome/fontawesome-min.js"></script><!-- password_show-->
        <script src="{{ asset('assets') }}/js/password.js"></script><!-- custom script -->
        <script src="{{ asset('assets') }}/js/sweetalert/sweetalert2.min.js"></script>
        <script src="{{ asset('assets') }}/js/theme-customizer/customizer.js"></script><!-- custom script -->
        <script src="{{ asset('assets') }}/js/script.js"></script>

        <script>
            // fungsi menghandle submit dari halaman login
            function submitPostLogin(event, this_) {
                event.preventDefault();
                const email = $('#email').val().trim();
                const password = $('#password').val().trim();

                if (!email || !password) {
                    Swal.fire(
                        'Gagal!',
                        'Email dan password wajib diisi',
                        'error'
                    )
                    return;
                }

                $.ajax({
                    url: "{{ route('doLogin') }}",
                    type: this_.attr('method'),
                    beforeSend: () => {
                        $("#btn_login").prop("disabled", true).html(
                            "<div class='spinner-border spinner-border-sm text-light' role='status'></div> Loading..."
                        );
                    },
                    data: this_.serialize(),
                    success: (response) => {
                        Swal.fire(
                            'Berhasil!',
                            'Selamat datang ke sistem',
                            'success'
                        )
                        window.location.href = response['route'];
                    },
                    error: ({
                        responseText
                    }) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: responseText,
                        })
                    },
                    complete: () => {
                        $("#btn_login").prop("disabled", false).html('<i class="mdi mdi-login"></i> Log In');
                    }
                });
            }
        </script>
    </div>
</body>

</html>
