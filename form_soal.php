<?php
$menu = 'survey';
include_once('model/m_survey_soal_model.php');
include_once('model/koneksi.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Survey</title>

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

        .error-card {
            border-color: #dc3545;
        }

        .error-card .card-header {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
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
                            <h1>Survey</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <?php
            $pages = isset($_GET['pages']) ? $_GET['pages'] : '';

            if ($pages == 'mahasiswa') {
            ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_mahasiswa_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToMahasiswa($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'dosen') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_dosen_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToDosen($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'tendik') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_tendik_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToTendik($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'ortu') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_ortu_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToOrtu($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'alumni') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_alumni_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToAlumni($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'industri') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_industri_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                include_once('model/koneksi.php');
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionToIndusti($_GET['id']);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                        if ($row['soal_jenis'] == 'rating') {
                                ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="1" required class="form-check-input">
                                                            <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="2" required class="form-check-input">
                                                            <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="3" required class="form-check-input">
                                                            <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="4" required class="form-check-input">
                                                            <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                        <?php
                                        } else if ($row['soal_jenis'] == 'esai') {
                                        ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>
                                                            <h4><?php echo $row['soal_nama'] ?></h4>
                                                        </label><br><br>
                                                        <textarea class="form-control" name="jawaban[<?php echo $soal_id; ?>]" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="question-divider"></div>
                                <?php
                                        }
                                    }
                                    $result->close();
                                } else {
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                ?>
                                <div class="form-group">
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</body>

<script>
    $(document).ready(function() {
        $('#form-tambah').validate({
            rules: {
                // Aturan validasi untuk setiap input pada form
                'jawaban[]': {
                    required: true
                }
            },
            messages: {
                // Pesan error yang ditampilkan jika aturan validasi tidak terpenuhi
                'jawaban[]': {
                    required: "Jawaban ini harus diisi"
                }
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                if (element.attr("type") == "radio") {
                    error.insertAfter(element.closest('.card-body'));
                } else {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                var isValid = true;
                var radioGroupErrors = {};

                $('input[type="radio"]').each(function() {
                    var name = $(this).attr('name');
                    if ($('input[name="' + name + '"]:checked').length === 0) {
                        if (!radioGroupErrors[name]) {
                            $(this).closest('.card-body').append('<span class="error text-danger">Pilih salah satu pilihan.</span>');
                            radioGroupErrors[name] = true;
                        }
                        isValid = false;
                    }
                });

                if (isValid) {
                    form.submit();
                }
            }
        });
    });
</script>

</html>