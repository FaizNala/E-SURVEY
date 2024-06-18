<?php
include_once('model/m_kategori_model.php');

$act = $_GET['act'];

if ($act == 'simpan') {
   echo '<pre>';
   $data = [
      'kategori_nama' => $_POST['kategori_nama']
   ];

   $insert = new m_kategori();
   $insert->insertData($data);

   header('location: m_kategori.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
   $id = $_GET['id'];

   $data = [
      'kategori_nama' => $_POST['kategori_nama']
   ];

   $update = new m_kategori();
   $update->updateData($id, $data);

   header('location: m_kategori.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
   $id = $_GET['id'];

   $hapus = new m_kategori();
   $hapus->deleteData($id);

   header('location: m_kategori.php?status=sukses&message=Data berhasil dihapus');
}