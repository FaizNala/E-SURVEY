<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

include_once('model/m_survey_model.php');
include_once('model/koneksi.php');

$act = isset($_GET['act']) ? $_GET['act'] : '';

if ($act == 'simpan') {
    $data = [
        'user_id' => $_SESSION['user_id'],
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal']
    ];

    $insert = new Survey();
    $insert->insertData($data);

    header('location: m_survey.php?status=sukses&message=Data berhasil disimpan');
}

if ($act == 'edit') {
    $id = $_GET['id'];

    $data = [
        'survey_jenis' => $_POST['survey_jenis'],
        'survey_kode' => $_POST['survey_kode'],
        'survey_nama' => $_POST['survey_nama'],
        'survey_deskripsi' => $_POST['survey_deskripsi'],
        'survey_tanggal' => $_POST['survey_tanggal']
    ];

    $update = new Survey();
    $update->updateData($id, $data);

    header('location: m_survey.php?status=sukses&message=Data berhasil diubah');
}

if ($act == 'hapus') {
    $id = $_GET['id'];

    $hapus = new Survey();
    $hapus->deleteData($id);

    header('location: m_survey.php?status=sukses&message=Data berhasil dihapus');
}