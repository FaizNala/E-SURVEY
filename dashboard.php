<?php
if (session_status() === PHP_SESSION_NONE) 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page</title>

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
    <?php include_once("layouts/admin/header.php") ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once("layouts/admin/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dasboard</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

        <!-- Main content -->
        <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- Title for the section -->
        <div class="row">
        <div class="col-12">
            <h5 class="my-0">Responden</h5>
            <br>
        </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <?php
            $koneksi = mysqli_connect("localhost", "root", "", "db_survey_polinema");
            
            $query_mahasiswa = "SELECT count(responden_mahasiswa_id) as jml FROM t_responden_mahasiswa";
            $result_mahasiswa = mysqli_query($koneksi, $query_mahasiswa);
            $row_mahasiswa = mysqli_fetch_assoc($result_mahasiswa);
            
            $query_dosen = "SELECT count(responden_dosen_id) as jml FROM t_responden_dosen";
            $result_dosen = mysqli_query($koneksi, $query_dosen);
            $row_dosen = mysqli_fetch_assoc($result_dosen);

            $query_tendik = "SELECT count(responden_tendik_id) as jml FROM t_responden_tendik";
            $result_tendik = mysqli_query($koneksi, $query_tendik);
            $row_tendik = mysqli_fetch_assoc($result_tendik);

            $query_ortu = "SELECT count(responden_ortu_id) as jml FROM t_responden_ortu";
            $result_ortu = mysqli_query($koneksi, $query_ortu);
            $row_ortu = mysqli_fetch_assoc($result_ortu);

            $query_alumni = "SELECT count(responden_alumni_id) as jml FROM t_responden_alumni";
            $result_alumni = mysqli_query($koneksi, $query_alumni);
            $row_alumni = mysqli_fetch_assoc($result_alumni);

            $query_industri = "SELECT count(responden_industri_id) as jml FROM t_responden_industri";
            $result_industri = mysqli_query($koneksi, $query_industri);
            $row_industri = mysqli_fetch_assoc($result_industri);
        ?>
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-danger">
            <div class="inner">
                <h3><?= $row_mahasiswa['jml'] ?></h3>
                <p>Data Mahasiswa</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-warning">
            <div class="inner">
                <h3><?= $row_dosen['jml'] ?></h3>
                <p>Data Dosen</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-success">
            <div class="inner">
                <h3><?= $row_tendik['jml'] ?></h3>
                <p>Data Tendik</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-primary">
            <div class="inner">
                <h3><?= $row_ortu['jml'] ?></h3>
                <p>Data Orang Tua</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $row_alumni['jml'] ?></h3>
                <p>Data Alumni</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-4">
            <!-- small box -->
            <div class="small-box bg-indigo">
            <div class="inner">
                <h3><?= $row_industri['jml'] ?></h3>
                <p>Data Industri</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        </div>
        <!-- /.row -->
    </div>
    </section>


    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
          <div class="card-body">
            Start creating your amazing application!
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once("layouts/admin/footer.php") ?>

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