<?php
$menu = 'survey';
include_once('model/m_survey_soal_model.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey Tendik</title>

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
                            <h1>Survey</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Biodata</a></li>
                                <li class="breadcrumb-item active">Form Survey</li>
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
                        <h3 class="card-title">Form Survey</h3>
                        <div class="card-tools"></div>
                    </div>
                    <div class="card-body">
                        <form action="t_jawaban_tendik_action.php?act=simpan" method="post" id="form-tambah">
                            <?php
                            include_once('model/koneksi.php');
                            $survey = new SurveySoal($db);
                            $result = $survey->getQuestionTypeRating();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $soal_id = $row['soal_id'];
                            ?>
                                    <div class="form-group">
                                        <label><?php echo $row['soal_nama']?></label><br>
                                        <div>
                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required>
                                            <label for="tidak_puas_<?php echo $soal_id; ?>">Tidak Puas</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required>
                                            <label for="kurang_puas_<?php echo $soal_id; ?>">Kurang Puas</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required>
                                            <label for="puas_<?php echo $soal_id; ?>">Puas</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required>
                                            <label for="sangat_puas_<?php echo $soal_id; ?>">Sangat Puas</label>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                            }
                            $result->close();
                            ?>
                            <div class="form-group">
                                <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                <a href="t_responden_tendik_action.php" class="btn btn-warning">Kembali</a>
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
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</body>

</html>
