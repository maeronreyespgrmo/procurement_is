<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name') }}</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/images/lagunaseal.png" />

    <link rel="stylesheet" href="/vuexy/assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="/vuexy/assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/vuexy/assets/vendor/css/rtl/core.css"  />
    <link rel="stylesheet" href="/vuexy/assets/vendor/css/rtl/theme-default.css"/>
    <link rel="stylesheet" href="/vuexy/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="/vuexy/assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <style>
        .btn-primary {
    color: #fff;
    background-color: #2b61e0;
    border-color: #7367f0;
}
a.app-brand-link{

    color: #000000;


}

    </style>

    <!-- Page CSS -->
    <link rel="stylesheet" href="/vuexy/assets/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="/vuexy/assets/vendor/js/helpers.js"></script>


<!-- Navbar: Start -->
<nav class="layout-navbar shadow-none py-0">
  <div class="container">
    <div class="navbar navbar-expand-lg landing-navbar px-3 px-md-4">
      <!-- Menu logo wrapper: Start -->
      <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
        <!-- Mobile menu toggle: Start-->
        <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="ti ti-menu-2 ti-sm align-middle"></i>
        </button>
        <!-- Mobile menu toggle: End-->
        <a href="landing-page.html" class="app-brand-link">

            <img src="/images/lagunaseal.png" width="50" height="50"/>

          <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Procurement System</span>
        </a>
      </div>
      <!-- Menu logo wrapper: End -->
      <!-- Menu wrapper: Start -->
      <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
        <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="ti ti-x ti-sm"></i>
        </button>
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link fw-medium" id="procurement" aria-current="page" href="#ProcurementActivities">Public Bidding</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" id="alternative" aria-current="page" href="#AlternativeMode">Alternative Mode Procurement</a>
          </li>
        </ul>
      </div>
      <div class="landing-menu-overlay d-lg-none"></div>
      <!-- Menu wrapper: End -->
      <!-- Toolbar: Start -->
      <ul class="navbar-nav flex-row align-items-center ms-auto">

        <!-- Style Switcher -->
        <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <i class='ti ti-sm'></i>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                <span class="align-middle"><i class='ti ti-sun me-2'></i>Light</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
              </a>
            </li>
          </ul>
        </li>
        <!-- / Style Switcher-->

        <!-- navbar button: Start -->
        <li>
          <a href="{{ route('login') }}" class="btn btn-primary"><span class="tf-icons ti ti-login scaleX-n1-rtl me-md-1"></span><span class="d-none d-md-block">{{ __('Login') }}</span></a>
        </li>
        <!-- navbar button: End -->
      </ul>
      <!-- Toolbar: End -->
    </div>
  </div>
</nav>
<!-- Navbar: End -->


<!-- Sections:Start -->

<section class="section-py bg-body first-section-pt">
  <div class="container mt-2">
    <div class="card px-3">
      <div class="row">

        <div class="col-lg-7 card-body">
            <div>
            <h4 class="mb-2" id="header-text">Procurement Activities</h4>
            {{-- <table class="table dataTable no-footer" id="landing">
            <thead>
            <tr>
            <th class="sorting">Name</th>
            <th class="sorting">File</th>
            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 124px;" aria-label="Actions">Actions</th>
            </thead>

            </table> --}}
            <table id="tbl-users" class="table table-bordered" style="width: 100%;">
                <thead>
                    <tr>
                        <th width="50%">Category</th>
                        <th width="30%">Name</th>
                      <th><center>Action</center></th>
                    </tr>
                </thead>

          </table>

            </div>

        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
  <div class="footer-top">
    <div class="container">

  <div class="footer-bottom py-3">
    <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
      <div class="mb-2 mb-md-0">
        <span class="footer-text">©
          <script>
          document.write(new Date().getFullYear());
          </script>
        </span>
        <a href="https://pixinvent.com/" target="_blank" class="fw-medium text-white footer-link">Pixinvent,</a>
        <span class="footer-text"> Procurement Systemv2 <a hre="http://www.laguna.gov.ph">http://www.laguna.gov.ph</a> </span>
      </div>
      <div>

      </div>
    </div>
  </div>
</footer>
<!-- Footer: End -->


  <script src="/vuexy/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="/vuexy/assets/vendor/libs/popper/popper.js"></script>
  <script src="/vuexy/assets/vendor/js/bootstrap.js"></script>
  <script src="/vuexy/assets/vendor/libs/node-waves/node-waves.js"></script>
  <script src="/vuexy/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="/vuexy/assets/vendor/libs/hammer/hammer.js"></script>
  <script src="/vuexy/assets/vendor/libs/i18n/i18n.js"></script>
  <script src="/vuexy/assets/vendor/libs/typeahead-js/typeahead.js"></script>
  <script src="/vuexy/assets/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="/vuexy/assets/vendor/libs/apex-charts/apexcharts.js"></script>
  <script src="/vuexy/assets/vendor/libs/swiper/swiper.js"></script>
  <script src="/vuexy/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>

  <!-- Main JS -->
  {{-- <script src="/vuexy/assets/js/main.js"></script> --}}


  <!-- Page JS -->
  {{-- <script src="/vuexy/assets/js/dashboards-analytics.js"></script> --}}

<script src="/vuexy/assets/js/tables-datatables-advanced.js"></script>
<script src="/js/landing.js"></script>


</body>
</html>

