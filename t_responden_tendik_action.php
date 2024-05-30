<?php 
include_once('model/t_responden_tendik_model.php');
 
$act = $_GET['act'];

if($act == 'simpan'){
    $data = [
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nopeg' => $_POST['responden_nopeg'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit']
    ];

    $insert = new t_responden_tendik();
    $insert->insertData($data);

    header('location: t_responden_tendik_form.php');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_tendik();
    $hapus->deleteData($id);

    header('location: t_responden_tendik_form.php?');
}
?>