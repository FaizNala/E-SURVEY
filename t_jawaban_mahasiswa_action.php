<?php
include_once('model/koneksi.php');
include_once('model/t_jawaban_mahasiswa_model.php');

$act = $_GET['act'];

if ($act == 'simpan') {
    $data = $_POST['jawaban'];
    $insert = new t_jawaban_mahasiswa($db);
    $insert->insertData($data);
    header('Location: t_responden_mahasiswa.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];
    $hapus = new t_jawaban_mahasiswa($db);
    $hapus->deleteData($id);
    header('Location: #');
    exit();
}
?>