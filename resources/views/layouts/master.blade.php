<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

<title>{{ config('app.name') }} | @yield('page_name')</title>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<!-- Canonical SEO -->
{{-- <link rel="canonical" href="../../../../themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/233285990be9.html"> --}}

<!-- Favicon -->
{{-- <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" /> --}}
<link rel="icon" type="image/x-icon" href="/images/lagunaseal.png" />

<!-- Fonts -->
<link rel="preconnect" href="../../../../fonts.googleapis.com/index.html">
<link rel="preconnect" href="../../../../fonts.gstatic.com/index.html" crossorigin>
{{-- <link href="../../../../fonts.googleapis.com/css2ad73.css?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet"> --}}

<!-- Icons -->
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

<!-- Page CSS -->
<link rel="stylesheet" href="/vuexy/assets/vendor/css/pages/cards-advance.css" />

<!-- Helpers -->
<script src="/vuexy/assets/vendor/js/helpers.js"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
{{-- <script src="/vuexy/assets/vendor/js/template-customizer.js"></script> --}}
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="/vuexy/assets/js/config.js"></script>
<style>
.bg-menu-theme.menu-vertical .menu-item.active>.menu-link:not(.menu-toggle) {
    background: linear-gradient(72.47deg, #3b5998 22.16%, rgb(43 28 206 / 70%) 76.47%);
    box-shadow: 0px 2px 6px 0px rgb(32 15 216 / 48%);
    color: #fff !important;
}
</style>
@yield('page_css')
</head>

<body>


<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
<div class="layout-container">
<!-- Sidebar -->
@include('layouts.sidebar')
<!-- / Menu -->

<!-- Layout container -->
<div class="layout-page">





<!-- Navbar -->
@include('layouts.header')
<!-- / Navbar -->

<!-- Content wrapper -->
<div class="content-wrapper">

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4">
        {{-- <span class="text-muted fw-light">Logistics /</span> Dashboard --}}
        @include('layouts.crumb')
      </h4>

      @yield('content')
</div>
<!-- / Content -->


<!-- Footer -->
@if (!isset($page['footer']))
@include('layouts.footer')
@endif
<!-- / Footer -->


<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>



<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>


<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div>

</div>
<!-- / Layout wrapper -->


{{-- <div class="buy-now">
<a href="../../../../themeforest.net/item/vuexy-vuejs-html-laravel-admin-dashboard-template/233285990be9.html" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
</div> --}}




<!-- Core JS -->
<!-- build:js assets/js/core.js -->

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
<script src="/vuexy/assets/js/main.js"></script>


<!-- Page JS -->
<script src="/vuexy/assets/js/dashboards-analytics.js"></script>

<script src="/vuexy/assets/js/tables-datatables-advanced.js"></script>

@yield('page_script')
</body>
</html>

<!-- beautify ignore:end -->

