<?php
  if (session_status() === PHP_SESSION_NONE) 
  session_start();
  $menu = 'ortu';

  include_once('model/t_responden_ortu_model.php');

  $status = isset($_GET['status'])? strtolower($_GET['status']) : null;
  $message= isset($_GET['message'])? strtolower($_GET['message']) : null;
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Respon Orang Tua</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
    /* CSS untuk mengubah warna sidebar menjadi abu-abu saat menu "tendik" aktif */
    .nav-sidebar.ortu .nav-treeview {
        background-color: #f0f0f0; /* Warna abu-abu */
    }
  </style>
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php include_once('layouts/admin/header.php') ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once('layouts/admin/sidebar.php') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Responden Orang Tua</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Responden Orang Tua</li>
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
            <h3 class="card-title">Respon Orang Tua</h3>

            <div class="card-tools">
            </div>
          </div>

          <div class="card-body">
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Umur</th>
                  <th>No HP</th>
                  <th>Pendidikan</th>
                  <th>Pekerjaan</th>
                  <th>Penghasilan</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Prodi Mahasiswa</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                include_once('model/koneksi.php');
                $ortu = new t_responden_ortu($db);
                $list = $ortu->getData();

                $i = 1;
                while($row = $list->fetch_assoc()){
                  echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$row['responden_tanggal'].'</td>
                      <td>'.$row['responden_nama'].'</td>
                      <td>'.$row['responden_jk'].'</td>
                      <td>'.$row['responden_umur'].'</td>
                      <td>'.$row['responden_hp'].'</td>
                      <td>'.$row['responden_pendidikan'].'</td>
                      <td>'.$row['responden_pekerjaan'].'</td>
                      <td>'.$row['responden_penghasilan'].'</td>
                      <td>'.$row['mahasiswa_nim'].'</td>
                      <td>'.$row['mahasiswa_nama'].'</td>
                      <td>'.$row['mahasiswa_prodi'].'</td>
                      <td>
                        <a title="Jawaban" href="jawaban_responden.php?show=ortu&id='.$row['responden_ortu_id'].'" class="btn btn-primary btn-sm"><i class="fas fa-poll"></i></a>
                        <a onclick="return confirm(\'Apakah anda yakin menghapus data ini?\')" title="Hapus Data" href="t_responden_ortu_action.php?act=hapus&id='.$row['responden_ortu_id'].'" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                      </td>
      
                    </tr>';

                    $i++;
                }
              ?>
            </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once('layouts/admin/footer.php') ?>

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