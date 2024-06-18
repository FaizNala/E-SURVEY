<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('model/t_jawaban_industri_model.php');
include_once('model/t_responden_industri_model.php');
include_once('model/koneksi.php');

$act = $_GET['act'];
$industri = new t_responden_industri();
$idRes = $industri->getRespondenId();

if ($act == 'simpan') {
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        $data = [
            'responden_industri_id' => $idRes,
            'soal_id' => $soal_id,
            'jawaban' => $jawaban,
        ];
        $insert = new t_jawaban_industri();
        $insert->insertData($data);
    }
    header('Location: layouts/terima_kasih.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new t_jawaban_industri();
    $hapus->deleteData($id);

    header('Location: t_responden_industri.php');
    exit();
}