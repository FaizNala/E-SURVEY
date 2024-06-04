<?php 
include_once('model/t_responden_dosen_model.php');
include_once('model/koneksi.php');
 
$act = $_GET['act'];

if($act == 'simpan'){
    $data = [
        'responden_tanggal' => $_POST['responden_tanggal'],
        'responden_nip' => $_POST['responden_nip'],
        'responden_nama' => $_POST['responden_nama'],
        'responden_unit' => $_POST['responden_unit']
    ];

    $insert = new t_responden_dosen($db);
    $insert->insertData($data);

    header('location: t_responden_dosen_form.php');
}

if($act == 'hapus'){
    $id = $_GET['id'];

    $hapus = new t_responden_dosen($db);
    $hapus->deleteData($id);

    header('location: t_responden_dosen.php?status=sukses&message=Data berhasil dihapus');
}
?>