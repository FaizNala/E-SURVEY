<?php
  $menu = 'biodata';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biodata Orang Tua</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once('layouts/responden/header.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once('layouts/responden/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Biodata Tendik</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">biodata Tendik</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Tendik</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">
              <form action="t_responden_ortu_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="responden_tanggal">Tanggal</label>
                  <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_jk">Jenis Kelamin</label>
                  <input required type="text" name="responden_jk" id="responden_jk" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_umur">Umur</label>
                  <input required type="text" name="responden_umur" id="responden_umur" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">No HP</label>
                  <input required type="text" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_pendidikan">Pendidikan</label>
                  <input required type="text" name="responden_pendidikan" id="responden_pendidikan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_pekerjaan">Pekerjaan</label>
                  <input required type="text" name="responden_pekerjaan" id="responden_pekerjaan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_penghasilan">Penghasilan</label>
                  <input required type="text" name="responden_penghasilan" id="responden_penghasilan" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_nim">NIM</label>
                  <input required type="text" name="mahasiswa_nim" id="mahasiswa_nim" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_nama">Nama Mahasiswa</label>
                  <input required type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="mahasiswa_prodi">Prodi Mahasiswa</label>
                  <input required type="text" name="mahasiswa_prodi" id="mahasiswa_prodi" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="t_responden_tendik.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once('layouts/responden/footer.php'); ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>
</html>
