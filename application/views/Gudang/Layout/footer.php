  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>RMPAIRCSTOM</strong>


  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
    console.log = function() {}
    $("#produk_a").on('change', function() {

      $(".nama").html($(this).find(':selected').attr('data-nama'));
      $(".nama").val($(this).find(':selected').attr('data-nama'));

      $(".harga").html($(this).find(':selected').attr('data-harga'));
      $(".harga").val($(this).find(':selected').attr('data-harga'));

      $(".stok").html($(this).find(':selected').attr('data-stok'));
      $(".stok").val($(this).find(':selected').attr('data-stok'));

    });
  </script>
  <script>
    console.log = function() {}
    $("#sablon").on('change', function() {

      $(".jenis").html($(this).find(':selected').attr('data-jenis'));
      $(".jenis").val($(this).find(':selected').attr('data-jenis'));


      $(".harga").html($(this).find(':selected').attr('data-harga'));
      $(".harga").val($(this).find(':selected').attr('data-harga'));

      $(".warna").html($(this).find(':selected').attr('data-warna'));
      $(".warna").val($(this).find(':selected').attr('data-warna'));

      $(".stok").html($(this).find(':selected').attr('data-stok'));
      $(".stok").val($(this).find(':selected').attr('data-stok'));

    });
  </script>

  <script>
    console.log = function() {}
    $("#produk").on('change', function() {

      $(".nama").html($(this).find(':selected').attr('data-nama'));
      $(".nama").val($(this).find(':selected').attr('data-nama'));


      $(".size").html($(this).find(':selected').attr('data-size'));
      $(".size").val($(this).find(':selected').attr('data-size'));

      $(".harga").html($(this).find(':selected').attr('data-harga'));
      $(".harga").val($(this).find(':selected').attr('data-harga'));

      $(".stok").html($(this).find(':selected').attr('data-stok'));
      $(".stok").val($(this).find(':selected').attr('data-stok'));

    });
  </script>

  <script>
    console.log = function() {}
    $("#produk_bb").on('change', function() {

      $(".stok").html($(this).find(':selected').attr('data-stok'));
      $(".stok").val($(this).find(':selected').attr('data-stok'))

    });
  </script>
  <script>
    console.log = function() {}
    $("#produk_jadi").on('change', function() {

      $(".stok_produk").html($(this).find(':selected').attr('data-stok-produk'));
      $(".stok_produk").val($(this).find(':selected').attr('data-stok-produk'))

    });
  </script>
  </body>

  </html>