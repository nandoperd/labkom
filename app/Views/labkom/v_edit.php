<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CG | Data Pegadaian</title>

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
    <img class="animation__shake" src="<?= base_url() ?>img/cg.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Data Pegadaian</a>
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
      <img src="<?= base_url() ?>img/cg.png" alt="CG Pegadaian" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CG | Pegadaian</span>
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
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('data') ?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Data Pegadaian</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fa fa-qrcode"></i>
              <p>Validasi QR</p>
            </a>
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
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>
              <?php } ?>
                <!-- notif berhasil -->
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-warning" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                } ?>

              <?php
              echo form_open_multipart('data/update/'. $d['id']);
              ?>
              <form method="post" id="regForm" enctype="multipart/form-data">   
              
              <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pegadaian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="no_urut" class="col-sm-2 col-form-label">Nomor Urut</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="no_urut" name="no_urut" value="<?= $d['no_urut'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_cif" class="col-sm-2 col-form-label">Nomor CIF</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="no_cif" name="no_cif" value="<?= $d['no_cif'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?= $d['nama'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="no_telpon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="no_telpon" name="no_telpon" value="<?= $d['no_telpon'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="email" name="email" value="<?= $d['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $d['alamat'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jaminan" class="col-sm-2 col-form-label">Jaminan</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jaminan" name="jaminan" value="<?= $d['jaminan'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="jaminan" class="col-sm-2 col-form-label">Taksiran</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="taksiran" name="taksiran" value="<?= $d['taksiran'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="pinjaman" class="col-sm-2 col-form-label">Pinjaman</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="pinjaman" name="pinjaman" value="<?= $d['pinjaman'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="terbilang" class="col-sm-2 col-form-label">Terbilang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="terbilang" name="terbilang" value="<?= $d['terbilang'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="fitur" class="col-sm-2 col-form-label">Fitur</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fitur" name="fitur" value="<?= $d['fitur'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_kredit" class="col-sm-2 col-form-label">Tanggal kredit</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="tgl_kredit" name="tgl_kredit" value="<?= $d['tgl_kredit'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="tgl_japo" class="col-sm-2 col-form-label">Tanggal Japo</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="tgl_japo" name="tgl_japo" value="<?= $d['tgl_japo'] ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="petugas" class="col-sm-2 col-form-label">Petugas</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="petugas" name="petugas" value="<?= $d['petugas'] ?>">
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <a href="<?= base_url('data') ?>" class="btn btn-default float-right">Batal</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          <?php echo form_close() ?>
        </form>
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
    <strong>Copyright &copy; Cashgampang.</strong>
    All rights reserved.
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
</body>
</html>