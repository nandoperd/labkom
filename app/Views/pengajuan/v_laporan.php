<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laporan Pengajuan Barang</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Animasi Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?= base_url() ?>img/labkom.png" alt="Labkom" height="100" width="150">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">SMK Muhammadiyah 2 Cileungsi</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar -->
      <li class="nav-item">
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat"><i class="fas fa-sign-out-alt"></i> Keluar</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?= base_url() ?>img/labkom.png" alt="Labkom" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Labkom System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('labkom') ?>" class="nav-link">
              <i class="nav-icon fas fa-desktop"></i>
              <p>Data Labkom</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>Master Data<i class="right fas fa-angle-right"></i></p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('kategori') ?>" class="nav-link">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>Data Kategori Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('barang') ?>" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>Data Barang</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pengelolaan') ?>" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>Pengelolaan Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-import"></i>
              <p>Pengajuan Barang<i class="right fas fa-angle-right"></i></p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('perbaikan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Perbaikan Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('pengajuan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-cart-plus"></i>
                    <p>Pengajuan Barang Baru</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-invoice"></i>
              <p>Laporan<i class="right fas fa-angle-right"></i></p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('perbaikan/laporan') ?>" class="nav-link">
                    <i class="nav-icon far fa-file-alt"></i>
                    <p>Perbaikan Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('pengajuan/laporan') ?>" class="nav-link">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Pengajuan Barang</p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('auth/logout') ?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Laporan Pengajuan Barang</h1>
              </div>
              <div class="col-sm-6 text-right">
                  <button class="btn bg-gradient-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Data</button>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <!-- Input Tanggal -->
                    <div class="row mb-3">
                      <div class="col-md-5">
                        <label for="startDate">Tanggal Mulai:</label>
                        <input type="date" id="startDate" class="form-control">
                      </div>
                      <div class="col-md-5">
                        <label for="endDate">Tanggal Akhir:</label>
                        <input type="date" id="endDate" class="form-control">
                      </div>
                      <div class="col-md-2">
                        <label>&nbsp;</label>
                        <button id="filterBtn" class="btn btn-primary btn-block">Filter</button>
                      </div>
                    </div>
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th>Labkom</th>
                        <th>Kategori Barang</th>
                        <th>Nama Barang</th>
                        <th>Sumber</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Catatan</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody id="tableBody">
                        <?php
                        $no = 1;
                        foreach ($d as $key => $value) { ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $value['labkom_nama'] ?></td>
                        <td><?= $value['nama_kategori_barang'] ?></td>
                        <td><?= $value['nama_barang'] ?></td>
                        <td><?= $value['kd_perolehan_brg'] ?></td>
                        <td><?= $value['tgl_barang_masuk'] ?></td>
                        <td><?= $value['catatan'] ?></td>
                        <td>
                          <?php if ($value['status'] == 1): ?>
                            Menunggu Persetujuan Kepala Program
                          <?php elseif ($value['status'] == 2): ?>
                            Menunggu Persetujuan Kepala Sekolah
                          <?php elseif ($value['status'] == 3): ?>
                            Pengajuan Ditolak Kepala Sekolah
                          <?php elseif ($value['status'] == 4): ?>
                            Pengajuan Disetujui
                          <?php elseif ($value['status'] == 5): ?>
                            Pengajuan Ditolak Kepala Program
                          <?php elseif ($value['status'] == 6): ?>
                            Data Sudah Diupdate
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php } ?>
                      </tfoot>
                    </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer">
        <!-- <div class="float-right d-none d-sm-block">
          <b>Version</b> 3.2.0
        </div> -->
        <strong>SMK Muhammadiyah 2 Cileungsi</strong>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
<!-- ./wrapper -->

<!-- scripts -->
<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#filterBtn').click(function() {
      var startDate = $('#startDate').val();
      var endDate = $('#endDate').val();

      $('#tableBody tr').filter(function() {
        var rowDate = $(this).find('td:nth-child(5)').text().split(' / ')[0]; // Ambil tanggal masuk
        return (rowDate < startDate || rowDate > endDate) ? $(this).hide() : $(this).show();
      });
    });
  });
</script>

<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

<!-- membuat tampilan agar bisa hilang hitungan detik -->
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $($this).remove();
        });
    }, 3000);
</script>

</body>
</html>