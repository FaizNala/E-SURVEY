<?php 
session_start();
include_once('model/t_responden_mahasiswa_model.php');
include_once('model/m_survey_model.php');
include_once('model/koneksi.php');

$survey = new Survey($db);
$idSur = $survey->getSurveyId();

$act = isset($_GET['act']) ? $_GET['act'] : '';
if ($act == 'simpan') {
    $data = [
        'survey_id' => $idSur,
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

    header('Location: form_soal.php?pages=mahasiswa');
    exit;
}

if ($act == 'hapus') {
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $hapus = new t_responden_mahasiswa($db);
    $hapus->deleteData($id);

    header('Location: t_responden_mahasiswa.php');
    exit;
}
?>
