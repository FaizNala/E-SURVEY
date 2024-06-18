<?php
include_once('model/m_user_model.php');

$act = $_GET['act'];

if ($act == 'simpan') {
   echo '<pre>';
   $data = [
      'username' => $_POST['username'],
      'nama' => $_POST['nama'],
      'password' => $_POST['password']
   ];

   $insert = new m_user();
   $insert->insertData($data);

   header('location: m_user.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'username' => $_POST['username'],
      'nama' => $_POST['nama'],
      'password' => $_POST['password']
   ];

   $update = new m_user();
   $update->updateData($id, $data);

   header('location: m_user.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new m_user();
   $hapus->deleteData($id);

   header('location: m_user.php?status=sukses&message=Data berhasil dihapus');
}