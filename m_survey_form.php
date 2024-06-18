<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
include_once('model/m_survey_model.php');
include_once('model/koneksi.php');
$menu = 'm_survey';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bank Soal</title>

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
    <?php include_once('layouts/admin/header.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include_once('layouts/admin/sidebar.php'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Survey</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Survey</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <?php
        $action = isset($_GET['act']) ? $_GET['act'] : '';

        if ($action == 'tambah') {
        ?>

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tambah Data Survey</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">
              <form action="m_survey_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="survey_jenis">Jenis Survey</label>
                  <select required name="survey_jenis" id="survey_jenis" class="form-control">
                    <option value="" disabled selected>Pilih Jenis Survey</option>
                    <option value="mahasiswa">Mahasiswa</option>
                    <option value="dosen">Dosen</option>
                    <option value="tendik">Tendik</option>
                    <option value="ortu">Orang Tua</option>
                    <option value="alumni">Alumni</option>
                    <option value="industri">Industri</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="survey_kode">Kode Survey</label>
                  <input required type="text" name="survey_kode" id="survey_kode" class="form-control">
                </div>
                <div class="form-group">
                  <label for="survey_nama">Nama Survey</label>
                  <input required type="text" name="survey_nama" id="survey_nama" class="form-control">
                </div>
                <div class="form-group">
                  <label for="survey_deskripsi">Deskripsi Survey</label>
                  <input required type="text" name="survey_deskripsi" id="survey_deskripsi" class="form-control">
                </div>
                <div class="form-group">
                  <label for="survey_tanggal">Tanggal Survey</label>
                  <input required type="date" name="survey_tanggal" id="survey_tanggal" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  <a href="m_survey.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>

        <?php } else if ($action == 'edit') { ?>
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Data Survey</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">

              <?php
              $id = $_GET['id'];

              $survey = new Survey();
              $data = $survey->getDataById($id);

              $data = $data->fetch_assoc();
              ?>

              <form action="m_survey_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-edit">
                <div class="form-group">
                  <label for="survey_jenis">Jenis Survey</label>
                  <select required name="survey_jenis" id="survey_jenis" class="form-control">
                    <option value="" disabled>Pilih Jenis Survey</option>
                    <option value="mahasiswa" <?php echo $data['survey_jenis'] == 'mahasiswa' ? 'selected' : ''; ?>>Mahasiswa</option>
                    <option value="dosen" <?php echo $data['survey_jenis'] == 'dosen' ? 'selected' : ''; ?>>Dosen</option>
                    <option value="tendik" <?php echo $data['survey_jenis'] == 'tendik' ? 'selected' : ''; ?>>Tendik</option>
                    <option value="ortu" <?php echo $data['survey_jenis'] == 'ortu' ? 'selected' : ''; ?>>Orang Tua</option>
                    <option value="alumni" <?php echo $data['survey_jenis'] == 'alumni' ? 'selected' : ''; ?>>Alumni</option>
                    <option value="industri" <?php echo $data['survey_jenis'] == 'industri' ? 'selected' : ''; ?>>Industri</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="survey_kode">Kode Survey</label>
                  <input required type="text" name="survey_kode" id="survey_kode" class="form-control" value="<?php echo $data['survey_kode'] ?>">
                </div>
                <div class="form-group">
                  <label for="survey_nama">Nama Survey</label>
                  <input required type="text" name="survey_nama" id="survey_nama" class="form-control" value="<?php echo $data['survey_nama'] ?>">
                </div>
                <div class="form-group">
                  <label for="survey_deskripsi">Deskripsi Survey</label>
                  <input required type="text" name="survey_deskripsi" id="survey_deskripsi" class="form-control" value="<?php echo $data['survey_deskripsi'] ?>">
                </div>
                <div class="form-group">
                  <label for="survey_tanggal">Tanggal Survey</label>
                  <input required type="date" name="survey_tanggal" id="survey_tanggal" class="form-control" value="<?php echo $data['survey_tanggal'] ?>">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  <a href="m_survey.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>
        <?php } ?>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include_once('layouts/admin/footer.php'); ?>

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
  <!-- jQuery Validation -->
  <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>

  <script>
    $(document).ready(function() {
      // Validasi form tambah
      $('#form-tambah').validate({
        rules: {
          survey_jenis: {
            required: true
          },
          survey_kode: {
            required: true
          },
          survey_nama: {
            required: true
          },
          survey_deskripsi: {
            required: true
          },
          survey_tanggal: {
            required: true
          }
        },
        messages: {
          survey_jenis: {
            required: "Jenis survey harus dipilih"
          },
          survey_kode: {
            required: "Kode survey harus diisi"
          },
          survey_nama: {
            required: "Nama survey harus diisi"
          },
          survey_deskripsi: {
            required: "Deskripsi survey harus diisi"
          },
          survey_tanggal: {
            required: "Tanggal survey harus diisi"
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      // Validasi form edit
      $('#form-edit').validate({
        rules: {
          survey_jenis: {
            required: true
          },
          survey_kode: {
            required: true
          },
          survey_nama: {
            required: true
          },
          survey_deskripsi: {
            required: true
          },
          survey_tanggal: {
            required: true
          }
        },
        messages: {
          survey_jenis: {
            required: "Jenis survey harus dipilih"
          },
          survey_kode: {
            required: "Kode survey harus diisi"
          },
          survey_nama: {
            required: "Nama survey harus diisi"
          },
          survey_deskripsi: {
            required: "Deskripsi survey harus diisi"
          },
          survey_tanggal: {
            required: "Tanggal survey harus diisi"
          }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>