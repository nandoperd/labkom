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
                <h1>Data Pengajuan Barang</h1>
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
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                    <?php
                    if (session()->getFlashdata('pesan')) {
                        echo '<div class="alert alert-success" role="alert">';
                        echo session()->getFlashdata('pesan');
                        echo '</div>';
                    }
                    ?>
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
                        <th class="text-center">Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
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
                              <span class="badge bg-secondary">Menunggu Persetujuan Kepala Program</span>
                          <?php elseif ($value['status'] == 2): ?>
                              <span class="badge bg-info">Menunggu Persetujuan Kepala Sekolah</span>
                          <?php elseif ($value['status'] == 3): ?>
                              <span class="badge bg-danger">Pengajuan Ditolak Kepala Sekolah</span>
                          <?php elseif ($value['status'] == 4): ?>
                              <span class="badge bg-success">Pengajuan Disetujui</span>
                          <?php elseif ($value['status'] == 5): ?>
                              <span class="badge bg-success">Pengajuan Ditolak Kepala Program</span>
                          <?php elseif ($value['status'] == 6): ?>
                              <span class="badge bg-success">Data Sudah Diupdate</span>
                          <?php endif; ?>
                        </td>
                        <td class="text-center">
                        <!-- <a class="btn btn-warning btn-sm" href="<?= base_url('pengajuan/edit/' . $value['id'])?>"><i class="fa fa-edit"></i></a> -->
                        <?php if ($value['status'] == 4): ?>
                          <a class="btn btn-primary btn-sm" href="<?= base_url('pengajuan/verifData/' . $value['id']) ?>"><i class="fas fa-check-circle"></i></a>
                        <?php elseif ($value['status'] == 1 || $value['status'] == 2 ): ?>
                          <a class="btn btn-info btn-sm" href="#"><i class="fas fa-spinner"></i></a>
                        <?php elseif ($value['status'] == 3 || $value['status'] == 5 || $value['status'] == 6): ?>
                          <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id']  ?>"><i class="fa fa-trash"></i></a>
                        <?php else: ?>
                          <a class="btn btn-success btn-sm" href="<?= base_url('perbaikan/verifAdmin/' . $value['id']) ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                        <?php endif; ?>
                        <!-- <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?= $value['id']  ?>"><i class="fa fa-trash"></i></button> -->
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

<!-- Modal Add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h4 class="modal-title font-weight-bold ml-auto">Tambah Data Pengajuan Barang Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('pengajuan/add');
                ?>
                <div class="form-group">
                    <label>Labkom</label>
                    <select name="id_labkom" class="form-control select2" style="width: 100%;">
                        <option value="">--Pilih Labkom--</option>
                        <?php foreach ($labkom as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kategori Barang</label>
                    <select name="id_kategori_barang" class="form-control select2" style="width: 100%;">
                        <option value="">--Pilih kategori Barang--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama_kategori_barang'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input name="nama_barang" class="form-control" placeholder="Nama Barang.." required>
                </div>

                <div class="form-group">
                    <label>Kode Barang</label>
                    <input name="kode_barang" class="form-control" placeholder="Nama Barang.." required>
                </div>

                <div class="form-group">
                    <label>Tanggal Pengajuan</label>
                    <input name="tgl_barang_masuk" type="date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Sumber Pengadaan Barang</label>
                    <select class="form-control select2" style="width: 100%;" name="kd_perolehan_brg">
                      <option value="">--Pilih Sumber--</option>
                      <option value="BOS">BOS</option>
                      <option value="PCM">PCM</option>
                      <option value="Mandiri">Mandiri</option>
                      <span class="fa fa-user form-control-feedback"></span>
                    </select>
                </div>

                <div class="form-group">
                    <label>Catatan</label>
                    <input name="catatan" class="form-control" placeholder="Catatan.." required>
                </div>

                <input type="hidden" name="status" value = 1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal add -->

<!-- Modal Add Pengelolaan -->
<div class="modal fade" id="addPengelolaan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between align-items-center">
                <h4 class="modal-title font-weight-bold ml-auto">Tambah Data Pengajuan Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open('pengajuan/add'); ?>
                
                <div class="form-group">
                    <label for="barang">Pilih Barang</label>
                    <div class="table-responsive">
                        <table id="tableBarang" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataBarang as $barang) { ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $barang['nama_barang']; ?></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-primary btnPilihBarang" 
                                                    data-id="<?= $barang['id']; ?>" 
                                                    data-nama="<?= $barang['nama_barang']; ?>">
                                                Pilih
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- modal add pengelolaan -->

<!-- modal delete -->
<?php foreach ($d as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">

                        Apakah anda yakin ingin menghapus data <b><?= $value['nama_barang'] ?>?</b>

                    </div>
                    <div class="modal-footer">
                      <a href="<?= base_url('pengajuan/delete/' . $value['id']) ?>" class="btn btn-success">Hapus</a>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php } ?>

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