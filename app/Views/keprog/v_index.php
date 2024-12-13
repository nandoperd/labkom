<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Labkom</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.css">

  <style>
    /* .small-box {
    position: relative;
    border-radius: 5px;
    padding: 20px;
    color: #fff;
}

.inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
} */

.approved, .not-approved {
    flex: 1;
}

.approved {
    text-align: left;
}

.not-approved {
    text-align: right;
}

.icon {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 50px;
    opacity: 0.15;
}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
        <a href="#" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar -->
      <li class="nav-item">
        <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat"><i class="fas fa-sign-out-alt"></i> Keluar</a>
      </li>
    </ul>
  </nav> <!-- tutup navbar -->

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
      <a href="<?= base_url('keprog/pengelolaan') ?>" class="nav-link">
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

</div> <!--tutup wrapper -->

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?= $jmlLabkom;?></h3>
              <p>Data Labkom</p>
            </div>
            <div class="icon">
              <i class="fas fa-desktop"></i>
            </div>
            <a href="<?= base_url('keprog/labkom') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3><?= $jmlPengelolaan;?></h3>
              <p>Data Inventaris Lab</p>
            </div>
            <div class="icon">
              <i class="fas fa-th-list"></i>
            </div>
            <a href="<?= base_url('keprog/pengelolaan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jmlPengajuan;?></h3>
              <p>Pengajuan Perbaikan Barang</p>
            </div>
            <div class="icon">
              <i class="fas fa-tasks"></i>
            </div>
            <a href="<?= base_url('keprog/pengajuan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jmlPengajuan;?></h3>
              <p>Pengajuan Barang Baru</p>
            </div>
            <div class="icon">
              <i class="fas fa-tasks"></i>
            </div>
            <a href="<?= base_url('keprog/pengajuan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $jmlPengajuan;?></h3>
              <p>Pengajuan Perbaikan Barang</p>
            </div>
            <div class="icon">
              <i class="fas fa-tasks"></i>
            </div>
            <a href="<?= base_url('keprog/pengajuan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner d-flex justify-content-between align-items-center">
                <div class="approved">
                    <h3 class="text-center"><?= $jmlPengajuan;?></h3>
                    <p class="text-center">Disetujui</p>
                </div>
                <div class="not-approved text-right">
                    <h3><?= $jmlPengajuan;?></h3>
                    <p class="text-center">Belum Disetujui</p>
                </div>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
            <a href="<?= base_url('keprog/pengajuan') ?>" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
      </div>
    </div>
  </section>
</div>

<footer class="main-footer">
    <strong>SMK Muhammadiyah 2 Cileungsi</strong>
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.2.0 -->
    </div>
</footer>

<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>template/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>template/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>template/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>template/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>template/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url() ?>template/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url() ?>template/dist/js/pages/dashboard.js"></script> -->

</body>
</html>