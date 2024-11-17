<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ILW</title>

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
<body class="hold-transition sidebar-mini d-flex align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-body text-center">
            <!-- Profile Image -->
            <!-- <div class="card card-primary card-outline"> -->
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url() ?>img/user.png"
                       alt="CS">
                </div>

                <h3 class="profile-username text-center"><?= $d['nama'] ?></h3>

                <p class="text-muted text-center"><?= $d['divisi'] ?></p>

                <div class="post">
                  <label style="float: left;" for="">Kritik</label>
                  <textarea class="form-control form-control-sm" readonly><?= $d['isi'] ?></textarea>
                  <br>
                  <label style="float: left;" for="">Saran</label>
                  <textarea class="form-control form-control-sm" readonly><?= $d['saran'] ?></textarea>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- scripts -->
  <!-- jQuery -->
  <script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>
</body>
</html>