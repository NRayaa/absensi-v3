  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">

      <title>Absensi Guru</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

      <!-- =======================================================
    * Template Name: NiceAdmin
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

  <body>

      <!-- ======= Header ======= -->
      <header id="header" class="header fixed-top d-flex align-items-center">

          <div class="d-flex align-items-center justify-content-between">
              <a href="index.html" class="logo d-flex align-items-center">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">ABSENSI</span>
              </a>
              <i class="bi bi-list toggle-sidebar-btn"></i>
          </div><!-- End Logo -->

          <nav class="header-nav ms-auto">
              <ul class="d-flex align-items-center">

                  <li class="nav-item dropdown pe-3">

                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                          data-bs-toggle="dropdown">
                          {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                          <span class="d-none d-md-block dropdown-toggle ps-2">@yield('name')</span>
                      </a><!-- End Profile Iamge Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li class="dropdown-header">
                              <h6>@yield('name')</h6>
                              <span>@yield('role')</span>
                          </li>

                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Sign Out</span>
                              </a>
                          </li>

                      </ul><!-- End Profile Dropdown Items -->
                  </li><!-- End Profile Nav -->

              </ul>
          </nav><!-- End Icons Navigation -->

      </header><!-- End Header -->

      <!-- ======= Sidebar ======= -->
      @yield('sidebar')

      <main id="main" class="main">

          <div class="pagetitle">
              <h1>@yield('crumb')</h1>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.html">@yield('crumb1')</a></li>
                      <li class="breadcrumb-item active">@yield('crumb')</li>
                  </ol>
              </nav>
          </div><!-- End Page Title -->

          <section class="section dashboard">
              @yield('content')
          </section>

      </main><!-- End #main -->

      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">
          <div class="copyright">
              &copy; Copyright <strong><span>AS</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
              Designed by <a href="https://instagram.com/an.syiha">AS</a>
          </div>
      </footer><!-- End Footer -->

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
      <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
      <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
      <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

      <!-- Template Main JS File -->
      <script src="{{ asset('assets/js/main.js') }}"></script>

  </body>

  </html>