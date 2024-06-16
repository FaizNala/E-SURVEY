<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('model/t_jawaban_tendik_model.php');
include_once('model/t_responden_tendik_model.php');
include_once('model/koneksi.php');

$act = $_GET['act'];
$tendik = new t_responden_tendik();
$idRes = $tendik->getRespondenId();

if ($act == 'simpan') {
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        $data = [
            'responden_tendik_id' => $idRes,
            'soal_id' => $soal_id,
            'jawaban' => $jawaban,
        ];
        $insert = new t_jawaban_tendik();
        $insert->insertData($data);
    }
    echo 'berhasil';
    // Redirect setelah sukses menyimpan data
    header('Location: layouts/terima_kasih.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new t_jawaban_tendik();
    $hapus->deleteData($id);

    header('Location: t_responden_tendik.php');
    exit();
}
?>
