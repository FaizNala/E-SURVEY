<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once('model/t_jawaban_ortu_model.php');
include_once('model/t_responden_ortu_model.php');
include_once('model/koneksi.php');

$act = $_GET['act'];
$ortu = new t_responden_ortu($db);
$idRes = $ortu->getRespondenId();

if ($act == 'simpan') {
    foreach ($_POST['jawaban'] as $soal_id => $jawaban) {
        $data = [
            'responden_ortu_id' => $idRes,
            'soal_id' => $soal_id,
            'jawaban' => $jawaban,
        ];
        $insert = new t_jawaban_ortu($db);
        $insert->insertData($data);
    }
    echo 'berhasil';
    // Redirect setelah sukses menyimpan data
    header('Location: layouts/terima_kasih.php');
    exit();
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new t_jawaban_ortu($db);
    $hapus->deleteData($id);

    header('Location: t_responden_ortu.php');
    exit();
}
?>
