<?php
if (session_status() === PHP_SESSION_NONE)
  session_start();
$menu = 'm_kategori';
include_once('model/m_kategori_model.php')
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
              <h1>Kategori</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
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
              <h3 class="card-title">Tambah Kategori</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">
              <form action="m_kategori_action.php?act=simpan" method="post" id="form-tambah">
                <div class="form-group">
                  <label for="kategori_nama">Kategori Nama</label>
                  <input type="text" required name="kategori_nama" id="kategori_nama" class="form-control">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary" value="simpan">Simpan</button>
                  <a href="m_kategori.php" class="btn btn-warning">Kembali</a>
                </div>
              </form>
            </div>
          </div>

        <?php  } else if ($action == 'edit') { ?>
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Kategori</h3>
              <div class="card-tools"></div>
            </div>
            <div class="card-body">

              <?php
              $id = $_GET['id'];

              $kategori = new m_kategori();
              $data = $kategori->getDataById($id);

              $data = $data->fetch_assoc();
              ?>

              <form action="m_kategori_action.php?act=edit&id=<?php echo $id ?>" method="post" id="form-edit">
                <div class="form-group">
                  <label for="kategori_nama">Kategori Nama</label>
                  <input type="text" required name="kategori_nama" id="kategori_nama" class="form-control" value="<?php echo $data['kategori_nama'] ?>">
                </div>
                <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                  <a href="m_kategori.php" class="btn btn-warning">Kembali</a>
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
      // Inisialisasi validasi form tambah
      $('#form-tambah').validate({
        rules: {
          kategori_nama: {
            required: true
          }
        },
        messages: {
          kategori_nama: {
            required: "Nama kategori tidak boleh kosong"
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

      // Inisialisasi validasi form edit
      $('#form-edit').validate({
        rules: {
          kategori_nama: {
            required: true
          }
        },
        messages: {
          kategori_nama: {
            required: "Nama kategori tidak boleh kosong"
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