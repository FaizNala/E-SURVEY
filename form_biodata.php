<?php
$menu = 'biodata';
include_once('model/m_survey_soal_model.php');
include_once('model/koneksi.php')
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
            $bio = isset($_GET['bio']) ? $_GET['bio'] : '';

            if ($bio == 'mahasiswa') {
            ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_mahasiswa_action.php?act=simpan" method="post" id="form-tambah">
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
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'dosen') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Dosen</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_dosen_action.php?act=simpan" method="post" id="form-tambah">
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
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'tendik') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header bg-blue">
                            <h3 class="card-title">Data Tendik</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_tendik_action.php?act=simpan" method="post" id="form-tambah">
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
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'ortu') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Orang Tua</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_ortu_action.php?act=simpan" method="post" id="form-tambah">
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
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_tendik.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'alumni') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Alumni</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_alumni_action.php?act=simpan" method="post" id="form-tambah">
                                <div class="form-group">
                                    <label for="responden_tanggal">Tanggal</label>
                                    <input type="text" name="responden_tanggal" id="responden_tanggal" class="form-control">
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
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            <?php } else if ($bio == 'industri') { ?>
                <section class="content">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Data Industri</h3>
                            <div class="card-tools"></div>
                        </div>
                        <div class="card-body">
                            <form action="t_responden_industri_action.php?act=simpan" method="post" id="form-tambah">
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
                                    <input required type="number" name="responden_kota" id="responden_kota" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="simpan" class="btn btn-primary" value="simpan yoyoy">Simpan</button>
                                    <a href="t_responden_mahasiswa.php" class="btn btn-warning">Kembali</a>
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