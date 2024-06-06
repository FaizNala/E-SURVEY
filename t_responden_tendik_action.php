<?php
session_start();
include_once('model/t_responden_tendik_model.php');
include_once('model/m_survey_model.php');
include_once('model/koneksi.php');

$survey = new Survey($db);
$idSur = $survey->getSurveyId();
$nama;

$act = $_GET['act'];

if($act == 'simpan'){
    $data = [
        'survey_id' => $idSur,
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit']
    ];
    
    $nama = $_POST['responden_nama'];
    $_SESSION['nama'] = $nama;
    $insert = new t_responden_tendik($db);
    $insert->insertData($data);

    header('Location: form_soal.php?pages=tendik');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_tendik($db);
    $hapus->deleteData($id);

    header('location: t_responden_tendik_form.php?status=sukses&message=Data berhasil dihapus');
}
?>