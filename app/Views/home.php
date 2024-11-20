<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Labkom | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="login-logo">
    <h1></h1>
    <img src="<?= base_url() ?>/img/labkom.png" alt="Labkom" style="width: 150px; height: 100px;">
    <br>
    <a href=""><b>Labkom</b></a>
    <a href="">System</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan masuk menggunakan akun anda</p>

    <!-- validasi login -->
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

    <!-- pesan password salah -->
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }

    // pesan berhasil logout
    if (session()->getFlashdata('sukses')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getFlashdata('sukses');
        echo '</div>';
    }

    ?>

    <?php
    echo form_open('auth/cek_login')
    ?>

      <!-- <form action="../../index3.html" method="post"> -->
        <div class="input-group mb-3">
          <input type="hidden" name="level" value="1">
          <input name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <select class="form-control select2" style="width: 100%;" name="level">
            <option value="">--Pilih Level Pengguna--</option>
            <option value="3">Kepala Sekolah</option>
            <option value="2">Kepala Program</option>
            <option value="1">Staf Lab Komputer</option>
            <span class="fa fa-user form-control-feedback"></span>
          </select>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      <!-- </form> -->
    </div>
    <!-- /.login-card-body -->
  </div>
  <?php echo form_close() ?>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url() ?>template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>template/dist/js/adminlte.min.js"></script>

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