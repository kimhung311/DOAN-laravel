<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'CMS - Dashboard')</title>

  @include('admin.layouts.css')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/admin_lte/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  @include('admin.layouts.navbar')

  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @include('admin.layouts.container_header')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @include('admin.layouts.footer')
</div>
<!-- ./wrapper -->

@include('admin.layouts.js')
</body>
</html>
