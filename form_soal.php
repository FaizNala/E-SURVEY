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
            ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_mahasiswa_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'dosen') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_dosen_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'tendik') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_tendik_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'ortu') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_ortu_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'alumni') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_alumni_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($pages == 'industri') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Soal Survey</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body" align="center">
                            <form action="t_jawaban_industri_action.php?act=simpan" method="post" id="form-tambah">
                                <?php
                                $survey = new SurveySoal();
                                $result = $survey->getQuestionTypeRatingToMahasiswa();

                                if ($result->num_rows > 0) {
                                    $display = '';
                                    while ($row = $result->fetch_assoc()) {
                                        $soal_id = $row['soal_id'];
                                ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label>
                                                        <h4><?php echo htmlspecialchars($row['soal_nama']); ?></h4>
                                                    </label><br><br>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="tidak_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Tidak Puas" required class="form-check-input">
                                                        <label for="tidak_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-frown fa-3x"></i><br>1</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="kurang_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Kurang Puas" required class="form-check-input">
                                                        <label for="kurang_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-meh fa-3x"></i><br>2</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Puas" required class="form-check-input">
                                                        <label for="puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-smile fa-3x"></i><br>3</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-laugh-beam fa-3x"></i><br>4</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="sangat_sangat_puas_<?php echo $soal_id; ?>" name="jawaban[<?php echo $soal_id; ?>]" value="Sangat Sangat Puas" required class="form-check-input">
                                                        <label for="sangat_sangat_puas_<?php echo $soal_id; ?>" class="form-check-label"><i class="far fa-grin-stars fa-3x"></i><br>5</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="question-divider"></div>
                                <?php
                                    }
                                } else {
                                    $display = 'none';
                                    echo "<p>Tidak ada pertanyaan survey yang tersedia.</p>";
                                }
                                $result->close();
                                ?>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan" style="display:<?php echo $display;?>">Simpan</button>
                                    <a href="#" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>
</body>

</html>