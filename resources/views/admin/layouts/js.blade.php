{{-- declare all file script use global --}}
<!-- jQuery -->
<script src="/admin_lte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admin_lte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/admin_lte/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/admin_lte/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/admin_lte/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/admin_lte/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admin_lte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admin_lte/plugins/moment/moment.min.js"></script>
<script src="/admin_lte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/admin_lte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin_lte/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin_lte/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admin_lte/dist/js/pages/dashboard.js"></script>

{{-- declare other file script use private --}}
@stack('js')