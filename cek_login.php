<?php
    if (session_status() === PHP_SESSION_NONE)
        session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['user'];
        $nama = $_POST['nama'];
        // Contoh sederhana validasi login
        if ($user == 'mahasiswa') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: t_responden_mahasiswa_form.php");
            exit();
        } else if ($user == 'dosen') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            header("Location: t_responden_dosen_form.php");
        } else if ($user == 'tendik') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            header("Location: t_responden_tendik_form.php");
        } else if ($user == 'ortu') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            header("Location: t_responden_ortu_form.php");
        } else if ($user == 'alumni') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            header("Location: t_responden_alumni_form.php");
        }else if ($user == 'industri') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            header("Location: t_responden_industri_form.php");
        }else {
            $error_message = "Jenis pengguna tidak valid.";
        }
    }
?>