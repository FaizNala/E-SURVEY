<?php 

include_once('model/t_jawaban_mahasiswa_model.php');
include_once('t_jawaban_mahasiswa_form.php');
include_once('model/t_responden_mahasiswa_model.php');
 
$act = $_GET['act'];

if($act == 'simpan'){
    $mahasiswa = new t_responden_mahasiswa();
    $data = [
        'responden_mahasiswa_id' => $mahasiswa->getRespondenId(),
        'soal_id' => $soal_id,
        'jawaban' => $_POST['jawaban'],
    ];
    $insert = new t_jawaban_mahasiswa();
    $insert->insertData($data);
    header('location: #');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_jawaban_mahasiswa();
    $hapus->deleteData($id);

    header('location: #');
}
?>