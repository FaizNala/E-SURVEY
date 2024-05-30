<?php 
include_once('model/m_survey_soal_model.php');
 
 $act = $_GET['act'];

 if($act == 'simpan'){
    echo '<pre>';
    $data = [
        'no_urut' => $_POST['no_urut'],
        'soal_jenis' => $_POST['soal_jenis'],
        'soal_nama' => $_POST['soal_nama']
    ];

    $insert = new SurveySoal();
    $insert->insertData($data);

    header('location: m_survey_soal.php?status=sukses&message=Data berhasil disimpan');
 }

 if($act == 'edit'){
    $id = $_GET['id'];

    $data = [
      'no_urut' => $_POST['no_urut'],
      'soal_jenis' => $_POST['soal_jenis'],
      'soal_nama' => $_POST['soal_nama']
    ];

    $update = new SurveySoal();
    $update->updateData($id, $data);

    header('location: m_survey_soal.php?status=sukses&message=Data berhasil diubah');
 }

 if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new SurveySoal();
    $hapus->deleteData($id);

    header('location: m_survey_soal.php?status=sukses&message=Data berhasil dihapus');
 }