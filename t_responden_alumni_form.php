<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Biodata Alumni</title>

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
              <h1>Biodata Alumni</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Biodata Alumni</li>
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
              <h3 class="card-title">Tambah Data Alumni</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">
              <form action="t_responden_mahasiswa_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="responden_tanggal">Tanggal</label>
                  <input type="text" name="responden_tanggal" id="responden_tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nim">NIM</label>
                  <input required type="text" name="responden_nim" id="responden_nim" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_nama">Nama</label>
                  <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_prodi">Prodi</label>
                  <input required type="text" name="responden_prodi" id="responden_prodi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_email">Email</label>
                  <input required type="email" name="responden_email" id="responden_email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="responden_hp">No HP</label>
                  <input required type="text" name="responden_hp" id="responden_hp" class="form-control">
                </div>
                <div class="form-group">
                  <label for="tahun_lulus">Tahun Lulus</label>
                  <input required type="number" name="tahun_lulus" id="tahun_lulus" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                  <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
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
