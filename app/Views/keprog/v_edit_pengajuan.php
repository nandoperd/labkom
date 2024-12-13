<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pengajuan Barang</title>

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
      <a href="<?= base_url('keprog') ?>" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Beranda</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('keprog/labkom') ?>" class="nav-link">
        <i class="nav-icon fas fa-desktop"></i>
        <p>Data Labkom</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="<?= base_url('keprog/inventaris') ?>" class="nav-link">
        <i class="nav-icon fas fa-th-list"></i>
        <p>Data Inventaris Lab</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-file-import"></i>
        <p>Pengajuan Barang<i class="right fas fa-angle-right"></i></p>
      </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?= base_url('keprog/perbaikan') ?>" class="nav-link">
              <i class="nav-icon fas fa-tools"></i>
              <p>Perbaikan Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('keprog/pengajuan') ?>" class="nav-link">
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
              <a href="<?= base_url('keprog/laporan_perbaikan') ?>" class="nav-link">
                <i class="nav-icon far fa-file-alt"></i>
                <p>Perbaikan Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('keprog/laporan_pengajuan') ?>" class="nav-link">
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
            <h1>Data Pengajuan Barang Baru</h1>
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
                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success" role="alert">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        if (session()->getFlashdata('errors')) {
                            echo '<div class="alert alert-danger" role="alert">';
                            echo '<ul>';
                            foreach (session()->getFlashdata('errors') as $error) {
                                echo '<li>' . $error . '</li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        }
                        ?>
                        
                        <?php echo form_open('keprog/updatePengajuan/' . $d['id']); ?>

                        <div class="form-group">
                            <label>Persetujuan Pengajuan Barang Baru</label>
                            <select class="form-control select2" name="status" required>
                                <option value="">--Pilih Persetujuan Perbaikan Barang--</option>
                                <option value="2">Disetujui</option>
                                <option value="5">Ditolak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Catatan</label>
                            <input name="catatan" class="form-control" placeholder="Catatan.." value="<?= $d['catatan'] ?>" required>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="<?= base_url('keprog/pengajuan') ?>" class="btn btn-danger">Kembali</a>
                        </div>

                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
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