<?php 
session_start();
include_once('model/t_responden_ortu_model.php');
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
        'responden_nama' => $_POST['responden_nama'],
        'responden_jk' => $_POST['responden_jk'],
        'responden_umur' => $_POST['responden_umur'],
        'responden_hp' => $_POST['responden_hp'],
        'responden_pendidikan' => $_POST['responden_pendidikan'],
        'responden_pekerjaan' => $_POST['responden_pekerjaan'],
        'responden_penghasilan' => $_POST['responden_penghasilan'],
        'mahasiswa_nim' => $_POST['mahasiswa_nim'],
        'mahasiswa_nama' => $_POST['mahasiswa_nama'],
        'mahasiswa_prodi' => $_POST['mahasiswa_prodi']
    ];
    
    $nama = $_POST['responden_nama'];
    $_SESSION['nama'] = $nama;
    $insert = new t_responden_ortu($db);
    $insert->insertData($data);

    header('Location: form_soal.php?pages=ortu');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_ortu($db);
    $hapus->deleteData($id);

    header('location: t_responden_ortu_form.php?');
}
?>