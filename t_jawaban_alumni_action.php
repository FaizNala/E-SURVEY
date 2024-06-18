<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('model/t_jawaban_alumni_model.php');
include_once('model/t_responden_alumni_model.php');
include_once('model/koneksi.php');

$act = $_GET['act'];
$alumni = new t_responden_alumni();
$idRes = $alumni->getRespondenId();

if ($act == 'simpan') {
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        $data = [
            'responden_alumni_id' => $idRes,
            'soal_id' => $soal_id,
            'jawaban' => $jawaban,
        ];
        $insert = new t_jawaban_alumni();
        $insert->insertData($data);
    }
    header('Location: layouts/terima_kasih.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new t_jawaban_alumni();
    $hapus->deleteData($id);

    header('Location: t_responden_alumni.php');
    exit();
}