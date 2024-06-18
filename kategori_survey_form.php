<?php
$menu = 'survey';
include_once('model/koneksi.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Mahasiswa</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <style>
        .form-check {
            display: inline-block;
            margin-right: 15px;
        }

        .form-check-input {
            display: none;
        }

        .form-check-label {
            cursor: pointer;
            font-size: 20px;
        }

        .form-check-input:checked+.form-check-label {
            color: blue;
        }

        .question-divider {
            border-top: 2px solid transparent;
            margin: 20px 0;
        }
    </style>
</head>

<body class="hold-transition layout-top-nav">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include_once('layouts/responden/header.php'); ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Survey</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <?php
            $pages = isset($_GET['pages']) ? $_GET['pages'] : '';

            if ($pages == 'mahasiswa') {
                include_once('kategori_survey.php');
            } else if ($pages == 'dosen') {
                include_once('kategori_survey.php');
            } else if ($pages == 'tendik') {
                include_once('kategori_survey.php');
            } else if ($pages == 'ortu') {
                include_once('kategori_survey.php');
            } else if ($pages == 'alumni') {
                include_once('kategori_survey.php');
            } else if ($pages == 'industri') {
                include_once('kategori_survey.php');
            } ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once('layouts/responden/footer.php'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</body>

</html>