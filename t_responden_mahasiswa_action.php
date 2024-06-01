<?php 
include_once('model/t_responden_mahasiswa_model.php');
include_once('model/koneksi.php');
 $act = $_GET['act'];

 if($act == 'simpan'){
    echo '<pre>';
    $data = [
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nim' => $_POST['responden_nim'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_prodi' => $_POST['responden_prodi'],
        'responden_email' => $_POST['responden_email'],
        'responden_hp' => $_POST['responden_hp'],
        'tahun_masuk' => $_POST['tahun_masuk']
    ];

    $insert = new t_responden_mahasiswa($db);
    $insert->insertData($data);

    header('location: t_jawaban_mahasiswa_form.php');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_mahasiswa($db);
    $hapus->deleteData($id);

    header('location: t_responden_mahasiswa.php');
 }
?>
