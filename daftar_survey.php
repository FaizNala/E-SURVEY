<?php
include_once('model/m_survey_model.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Survey</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition layout-top-nav">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <!-- /.navbar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="card" style="max-width: 1000px; margin: 0 auto">
          <div class="card-header bg-blue">
            <h3 class="card-title">Daftar Survey Mahasiswa</h3>
            <div class="card-tools"></div>
          </div>
          <div class="card-body">
            <table class="table table-sm table-bordered">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Survey</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $survey = new survey();
                $bio = isset($_GET['bio']) ? $_GET['bio'] : '';

                $list = $survey->getDataMahasiswa();
                if ($bio == 'mahasiswa') {
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                      <td>' . $i . '</td>
                      <td>' . $row['survey_nama'] . '</td>
                      <td>
                        <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                      </td>
                    </tr>';

                    $i++;
                  }
                } else if ($bio == 'dosen') {
                  $list = $survey->getDataDosen();
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['survey_nama'] . '</td>
                        <td>
                          <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                        </td>
                      </tr>';

                    $i++;
                  }
                } else if ($bio == 'tendik') {
                  $list = $survey->getDataTendik();
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['survey_nama'] . '</td>
                        <td>
                          <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                        </td>
                      </tr>';

                    $i++;
                  }
                } else if ($bio == 'ortu') {
                  $list = $survey->getDataOrtu();
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['survey_nama'] . '</td>
                        <td>
                          <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                        </td>
                      </tr>';

                    $i++;
                  }
                } else if ($bio == 'alumni') {
                  $list = $survey->getDataAlumni();
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['survey_nama'] . '</td>
                        <td>
                          <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                        </td>
                      </tr>';

                    $i++;
                  }
                } else if ($bio == 'industri') {
                  $list = $survey->getDataIndustri();
                  $i = 1;
                  while ($row = $list->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['survey_nama'] . '</td>
                        <td>
                          <a title="Pilih survey" href="form_biodata.php?bio=mahasiswa&id=' . $row['survey_id'] . '" class="btn btn-warning btn-sm">Kerjakan</a>
                        </td>
                      </tr>';

                    $i++;
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
</body>

</html>