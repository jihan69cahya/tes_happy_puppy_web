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
    <title>Happy Puppy - @yield('title')</title><!-- Favicon icon-->
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
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/datatable-extension.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/vendors/slick-theme.css"><!-- App css -->
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

    @yield('css')
</head>

<body> <!-- page-wrapper Start--><!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div><!-- tap on tap ends--><!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">

        @include('layouts.navbar')

        <div class="page-body-wrapper"> <!-- Page sidebar start-->

            @include('layouts.sidebar')

            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-sm-6 col-12">
                                <h2>@yield('page-title')</h2>
                            </div>
                            <div class="col-sm-6 col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}"><i
                                                class="iconly-Home icli svg-color"></i></a></li>
                                    @foreach ($data['breadcrumbs'] as $breadcrumb)
                                        @if ($loop->last)
                                            <li class="breadcrumb-item active">
                                                {{ $breadcrumb['title'] }}
                                            </li>
                                        @else
                                            <li class="breadcrumb-item">
                                                <a href="{{ $breadcrumb['url'] }}">
                                                    {{ $breadcrumb['title'] }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div><!-- Container-fluid starts-->
                <div class="container-fluid">

                    @yield('content')

                </div><!-- Container-fluid Ends-->
            </div>

            @include('layouts.footer')

        </div>
    </div><!-- jquery-->
    <script src="{{ asset('assets') }}/js/vendors/jquery/jquery.min.js"></script><!-- bootstrap js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="{{ asset('assets') }}/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer=""></script>
    <script src="{{ asset('assets') }}/js/vendors/bootstrap/dist/js/popper.min.js" defer=""></script><!--fontawesome-->
    <script src="{{ asset('assets') }}/js/vendors/font-awesome/fontawesome-min.js"></script><!-- sidebar -->
    <script src="{{ asset('assets') }}/js/sidebar.js"></script><!-- scrollbar-->
    <script src="{{ asset('assets') }}/js/scrollbar/simplebar.js"></script>
    <script src="{{ asset('assets') }}/js/scrollbar/custom.js"></script><!-- slick-->
    <script src="{{ asset('assets') }}/js/slick/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/slick/slick.js"></script><!-- theme_customizer-->
    <script src="{{ asset('assets') }}/js/datatable/datatables/jquery.dataTables.min.js"></script><!-- datatable_extension-->
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.autoFill.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.select.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
    <script src="{{ asset('assets') }}/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
    <script src="{{ asset('assets') }}/js/theme-customizer/customizer.js"></script><!-- custom script -->
    <script src="{{ asset('assets') }}/js/script.js"></script>
    <script src="{{ asset('assets') }}/js/sweetalert/sweetalert2.min.js"></script>
    <script>
        function delete_error() {
            $("[id^=error-]").hide();
        }

        function delete_form() {
            let form = $('#formData');
            form.find('input:not([type=button]):not([type=submit])').val('').prop('checked', false);
            form.find('textarea').val('');
            form.find('select').each(function() {
                $(this).val('').change();
            });
        }

        $('.number-only').keypress(function(e) {
            var txt = String.fromCharCode(e.which);
            if (!txt.match(/[0-9.,]/)) {
                return false;
            }
        });

        $('.maskRupiah').maskMoney({
            prefix: 'Rp. ',
            thousands: '.',
            decimal: ',',
            precision: 0
        });

        function formatMaskMoney(selector, value) {
            let clean = value ? value.toString().replace(/\D/g, '') : 0;
            $(selector).val(clean);
            $(selector).maskMoney('mask');
        }

        function formatRupiah(number) {
            if (!number) number = 0;

            let value = number.toString().replace(/[^0-9]/g, '');

            let reverse = value.split('').reverse().join('');
            let ribuan = reverse.match(/\d{1,3}/g);
            let formatted = ribuan.join('.').split('').reverse().join('');

            return 'Rp. ' + formatted;
        }

        function formatNumber(value) {
            if (value == null || value === "") return "";

            value = value.toString();

            let parts = value.split(',');
            let number = parts[0].replace(/\D/g, '');
            let decimal = parts[1] ? ',' + parts[1] : '';

            let formatted = number.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return formatted + decimal;
        }

        function showLoader() {
            if ($(".loader-wrapper").length === 0) {
                $("body").append(`
              <div class="loader-wrapper">
                  <div class="loader">
                      <span></span><span></span><span></span><span></span><span></span>
                  </div>
              </div>
          `);
            }
            $(".loader-wrapper").show();
        }

        function hideLoader() {
            $(".loader-wrapper").fadeOut("slow", function() {
                $(this).remove();
            });
        }

        document.getElementById('btn_logout').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari sistem!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2e8e87',
                cancelButtonColor: '#C42A02',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        });
    </script>
    @yield('js')
</body>

</html>
