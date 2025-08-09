<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>KELAPAH - Kelola Sampah</title>
    <meta name="description" content="Kelola Sampah" />
    <meta name="keywords" content="Kelapah" />

    <!-- Favicons -->
    <link href="frontend/asset/recycle.svg" rel="icon" />
    <link href="frontend/asset/recycle.svg" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="template/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="template/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="template/assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="template/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" />
    <link href="template/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="template/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="template/assets/css/main.css" rel="stylesheet" />
    <link href="template/assets/css/stepper.css" rel="stylesheet" />
</head>

<body class="index-page" data-bs-spy="scroll" data-bs-target="#navmenu" data-bs-offset="80" tabindex="0">
    <x-navbar></x-navbar>

    <main class="main">
        @if(Route::currentRouteName() != 'home')
        <div class="py-5" style="background-color: #19335c;">
        </div>
        @endif
        @yield('content')
    </main>

    <x-public-footer></x-public-footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="d-flex align-items-center justify-content-center scroll-top"><i
          class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="template/assets/vendor/php-email-form/validate.js"></script>
    <script src="template/assets/vendor/aos/aos.js"></script>
    <script src="template/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="template/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="template/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="template/assets/js/main.js"></script>

     <!-- custom script file -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var message = '{{ session('success') }}';
        function setMessage() {
            var message = message.replace(/"/g, "'");
        }

        @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 3000
        })
        @endif
    </script>
    @stack('script')
</body>

</html>