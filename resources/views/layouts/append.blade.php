<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $title }}</title>
  <meta content="{{ $description }}" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset(env('THEME')) }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset(env('THEME')) }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset(env('THEME')) }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset(env('THEME')) }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset(env('THEME')) }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset(env('THEME')) }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{ asset(env('THEME')) }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset(env('THEME')) }}/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Append
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/append-bootstrap-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="@if(Route::currentRouteName() == 'index') index-page @else services-details-page @endif" data-bs-spy="scroll" data-bs-target="#navmenu">

  <!-- ======= Header ======= -->
  @yield('header')
  <!-- End Header -->

  <main id="main">
    @yield('content')

    <!-- Hero Section - Home Page -->
    @yield('home')
    <!-- End Hero Section -->

    <!-- Clients Section - Home Page -->
    @yield('clients')
    <!-- End Clients Section -->

    <!-- About Section - Home Page -->
    @yield('about_us')
    <!-- End About Section -->

    <!-- Stats Section - Home Page -->
    @yield('stats')
    <!-- End Stats Section -->

    <!-- Services Section - Home Page -->
    @yield('services')
    <!-- End Services Section -->

    <!-- Features Section - Home Page -->
    @yield('features')
    <!-- End Features Section -->

    <!-- Portfolio Section - Home Page -->
    {{-- @yield('portfolio') --}}
    <!-- End Portfolio Section -->

    <!-- Pricing Section - Home Page -->
    {{-- @yield('pricing') --}}
    <!-- End Pricing Section -->

    <!-- Faq Section - Home Page -->
    @yield('faq')
    <!-- End Faq Section -->

    <!-- Team Section - Home Page -->
    @yield('team')
    <!-- End Team Section -->

    <!-- Call-to-action Section - Home Page -->
    @yield('call_to_action')
    <!-- End Call-to-action Section -->

    <!-- Testimonials Section - Home Page -->
    @yield('testimonials')
    <!-- End Testimonials Section -->

    <!-- Recent-posts Section - Home Page -->
    @yield('recent_posts')
    <!-- End Recent-posts Section -->

    <!-- Contact Section - Home Page -->
    @yield('contact')
    <!-- End Contact Section -->

  </main>

  <!-- ======= Footer ======= -->
  @yield('footer')
  <!-- End Footer -->

  <!-- Scroll Top Button -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset(env('THEME')) }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset(env('THEME')) }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset(env('THEME')) }}/assets/js/main.js"></script>

</body>

</html>