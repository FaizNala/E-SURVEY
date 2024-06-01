<?php 
if (session_status() === PHP_SESSION_NONE) 
session_start();
include_once('model/t_jawaban_mahasiswa_model.php');
include_once('model/t_responden_mahasiswa_model.php');
include_once('t_jawaban_mahasiswa_form.php');
include_once('koneksi.php');
 
$act = $_GET['act'];
$mahasiswa = new t_responden_mahasiswa($db);
$idRes =  $mahasiswa->getRespondenId();

if($act == 'simpan'){
    $data = [
        'responden_mahasiswa_id' => $idRes,
        'soal_id' => $soal_id,
        'jawaban' => $_POST['jawaban'],
    ];
    $insert = new t_jawaban_mahasiswa($db);
    $insert->insertData($data);
    echo 'berhasil';

}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_jawaban_mahasiswa($db);
    $hapus->deleteData($id);

    header('location: t_responden_alumni_form.php?');
}
?>