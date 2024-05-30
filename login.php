<?php
if (session_status() === PHP_SESSION_NONE) 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- messages_id -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h2"><b>Survey</b></a><br>
      <a href="#" class="h3">Kepuasan Pelanggan</a>
    </div>
    <div class="card-body">
      <p align="center"><img src="dist/img/LogoPolinema.png" alt="LogoPolinema" width="180"></p>
      <p class="login-box-msg">Sign in to start your session</p>

      <!-- Error Message Container -->
      <div id="error-message"></div>

      <form action="cek_login.php" method="post">
        <div class="input-group mb-3">
          <select name="user" class="form-control" required>
            <option value="" disabled selected>Pilih Jenis Pengguna</option>
            <option value="mahasiswa">Mahasiswa</option>
            <option value="dosen">Dosen</option>
            <option value="tendik">Tendik</option>
            <option value="ortu">Orang Tua</option>
            <option value="alumni">Alumni</option>
            <option value="industri">Industri</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" name="nama" class="form-control" placeholder="nama"  value="<?php if (isset($_COOKIE["nama"])) { echo $_COOKIE['nama']; }?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <p align="center"><a href="login2.php">Login Sebagai Admin</a></p>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
