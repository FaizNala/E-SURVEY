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
                            <form action="t_responden_mahasiswa_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
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
                                    <a href="layouts/linktree/link_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
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
                        <form action="t_responden_dosen_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
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
                                    <a href="layouts/linktree/link_dosen.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
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
                        <form action="t_responden_tendik_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
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
                                    <label for="responden_unit">Unit</label>
                                    <input required type="text" name="responden_unit" id="responden_unit" class="form-control">
                                </div>
                                <div class="form-group">
                                    <a href="layouts/linktree/link_tendik.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'ortu') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Orang Tua</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="t_responden_ortu_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_nama">Nama</label>
                                    <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_jk">Jenis Kelamin</label>
                                    <input required type="text" name="responden_jk" id="responden_jk" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_umur">Umur</label>
                                    <input required type="text" name="responden_umur" id="responden_umur" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_hp">No HP</label>
                                    <input required type="text" name="responden_hp" id="responden_hp" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_pendidikan">Pendidikan</label>
                                    <input required type="text" name="responden_pendidikan" id="responden_pendidikan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_pekerjaan">Pekerjaan</label>
                                    <input required type="text" name="responden_pekerjaan" id="responden_pekerjaan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_penghasilan">Penghasilan</label>
                                    <input required type="text" name="responden_penghasilan" id="responden_penghasilan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mahasiswa_nim">NIM</label>
                                    <input required type="text" name="mahasiswa_nim" id="mahasiswa_nim" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mahasiswa_nama">Nama Mahasiswa</label>
                                    <input required type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="mahasiswa_prodi">Prodi Mahasiswa</label>
                                    <input required type="text" name="mahasiswa_prodi" id="mahasiswa_prodi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <a href="layouts/linktree/link_ortu.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'alumni') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Alumni</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="t_responden_alumni_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
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
                                    <label for="tahun_lulus">Tahun Lulus</label>
                                    <input required type="number" name="tahun_lulus" id="tahun_lulus" class="form-control">
                                </div>
                                <div class="form-group">
                                    <a href="layouts/linktree/link_alumni.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'industri') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card" style="max-width: 1000px; margin: 0 auto">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Industri</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="t_responden_industri_action.php?act=simpan&id=<?php echo $_GET['id'];?>" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="date" name="responden_tanggal" id="responden_tanggal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_nama">Nama</label>
                                    <input required type="text" name="responden_nama" id="responden_nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_jabatan">Jabatan</label>
                                    <input required type="text" name="responden_jabatan" id="responden_jabatan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="responden_perusahaan">Perusahaan</label>
                                    <input required type="text" name="responden_perusahaan" id="responden_perusahaan" class="form-control">
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
                                    <label for="responden_kota">Kota</label>
                                    <input required type="text" name="responden_kota" id="responden_kota" class="form-control">
                                </div>
                                <div class="form-group">
                                    <a href="layouts/linktree/link_industri.php" class="btn btn-warning">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Berikutnya</button>
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
<script>
$(document).ready(function() {
    $('#form-tambah').validate({
        rules: {
            // Aturan validasi untuk setiap input pada form
            'responden_nim': {
                required: true
            },
            'responden_nama': {
                required: true
            },
            'responden_prodi': {
                required: true
            },
            'responden_email': {
                required: true,
                email: true
            },
            'responden_hp': {
                required: true
            },
            'tahun_masuk': {
                required: true,
                number: true
            },
            'tahun_lulus': {
                required: true,
                number: true
            },
            'responden_nip': {
                required: true
            },
            'responden_unit': {
                required: true
            },
            'responden_nopeg': {
                required: true
            },
            'responden_jk': {
                required: true
            },
            'responden_umur': {
                required: true
            },
            'responden_pendidikan': {
                required: true
            },
            'responden_pekerjaan': {
                required: true
            },
            'responden_penghasilan': {
                required: true
            },
            'mahasiswa_nim': {
                required: true
            },
            'mahasiswa_nama': {
                required: true
            },
            'mahasiswa_prodi': {
                required: true
            },
            'responden_jabatan': {
                required: true
            },
            'responden_perusahaan': {
                required: true
            },
            'responden_kota': {
                required: true
            }
        },
        messages: {
            // Pesan error yang ditampilkan jika aturan validasi tidak terpenuhi
            'responden_nim': {
                required: "NIM harus diisi"
            },
            'responden_nama': {
                required: "Nama harus diisi"
            },
            'responden_prodi': {
                required: "Prodi harus diisi"
            },
            'responden_email': {
                required: "Email harus diisi",
                email: "Format email tidak valid"
            },
            'responden_hp': {
                required: "No HP harus diisi"
            },
            'tahun_masuk': {
                required: "Tahun Masuk harus diisi",
                number: "Tahun Masuk harus berupa angka"
            },
            'tahun_lulus': {
                required: "Tahun Lulus harus diisi",
                number: "Tahun Lulus harus berupa angka"
            },
            'responden_nip': {
                required: "NIP harus diisi"
            },
            'responden_unit': {
                required: "Unit harus diisi"
            },
            'responden_nopeg': {
                required: "No Peg harus diisi"
            },
            'responden_jk': {
                required: "Jenis Kelamin harus diisi"
            },
            'responden_umur': {
                required: "Umur harus diisi"
            },
            'responden_pendidikan': {
                required: "Pendidikan harus diisi"
            },
            'responden_pekerjaan': {
                required: "Pekerjaan harus diisi"
            },
            'responden_penghasilan': {
                required: "Penghasilan harus diisi"
            },
            'mahasiswa_nim': {
                required: "NIM Mahasiswa harus diisi"
            },
            'mahasiswa_nama': {
                required: "Nama Mahasiswa harus diisi"
            },
            'mahasiswa_prodi': {
                required: "Prodi Mahasiswa harus diisi"
            },
            'responden_jabatan': {
                required: "Jabatan harus diisi"
            },
            'responden_perusahaan': {
                required: "Perusahaan harus diisi"
            },
            'responden_kota': {
                required: "Kota harus diisi"
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
</html>