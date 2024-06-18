<?php
session_start();
$menu = 'biodata';
include_once('model/m_survey_soal_model.php');
include_once('model/koneksi.php');

$user = $_GET['bio'];
$_SESSION['user'] = $user;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biodata</title>

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
                            <h1>Survey</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <?php
            $bio = $_GET['bio'];
            if ($bio == 'mahasiswa') {
            ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_mahasiswa_action.php?act=simpan&id=<?php echo $_GET['id']; ?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control" required>
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
                                    <label for="tahun_masuk">Tahun Masuk</label>
                                    <input required type="number" name="tahun_masuk" id="tahun_masuk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                    <a href="layouts/linktree/link_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'dosen') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Dosen</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_dosen_action.php?act=simpan&id=<?php echo $_GET['id']; ?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="responden_nip">NIP</label>
                                    <input required type="text" name="responden_nip" id="responden_nip" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_nama">Nama</label>
                                    <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_unit">UNIT</label>
                                    <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                    <a href="layouts/linktree/link_dosen.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'tendik') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Tendik</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_tendik_action.php?act=simpan&id=<?php echo $_GET['id']; ?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="responden_nopeg">No Peg</label>
                                    <input required type="text" name="responden_nopeg" id="responden_nopeg" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_nama">Nama</label>
                                    <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_unit">UNIT</label>
                                    <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                    <a href="layouts/linktree/link_tendik.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'mitra') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Mitra</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_mitra_action.php?act=simpan&id=<?php echo $_GET['id']; ?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="responden_perusahaan">Nama Perusahaan</label>
                                    <input required type="text" name="responden_perusahaan" id="responden_perusahaan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_nama">Nama Responden</label>
                                    <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_jabatan">Jabatan</label>
                                    <input required type="text" name="responden_jabatan" id="responden_jabatan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                    <a href="layouts/linktree/link_mitra.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
    <!-- jQuery Validation -->
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script src="plugins/jquery-validation/localization/messages_id.min.js"></script>

    <!-- Form Validation -->
    <script>
        $(document).ready(function() {
            $('#form-tambah').validate({
                rules: {
                    responden_tanggal: {
                        required: true,
                    },
                    responden_nim: {
                        required: true,
                    },
                    responden_nama: {
                        required: true,
                    },
                    responden_prodi: {
                        required: true,
                    },
                    responden_email: {
                        required: true,
                        email: true,
                    },
                    responden_hp: {
                        required: true,
                    },
                    tahun_masuk: {
                        required: true,
                        number: true,
                    },
                    responden_nip: {
                        required: true,
                    },
                    responden_unit: {
                        required: true,
                    },
                    responden_nopeg: {
                        required: true,
                    },
                    responden_perusahaan: {
                        required: true,
                    },
                    responden_jabatan: {
                        required: true,
                    }
                },
                messages: {
                    responden_tanggal: {
                        required: "Harus diisi.",
                    },
                    responden_nim: {
                        required: "Harus diisi.",
                    },
                    responden_nama: {
                        required: "Harus diisi.",
                    },
                    responden_prodi: {
                        required: "Harus diisi.",
                    },
                    responden_email: {
                        required: "Harus diisi.",
                        email: "Harus berupa email yang valid.",
                    },
                    responden_hp: {
                        required: "Harus diisi.",
                    },
                    tahun_masuk: {
                        required: "Harus diisi.",
                        number: "Harus berupa angka.",
                    },
                    responden_nip: {
                        required: "Harus diisi.",
                    },
                    responden_unit: {
                        required: "Harus diisi.",
                    },
                    responden_nopeg: {
                        required: "Harus diisi.",
                    },
                    responden_perusahaan: {
                        required: "Harus diisi.",
                    },
                    responden_jabatan: {
                        required: "Harus diisi.",
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