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
            header("Location: form_biodata.php?bio=mahasiswa");
            exit();
        } else if ($user == 'dosen') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: form_biodata.php?bio=dosen");
        } else if ($user == 'tendik') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: form_biodata.php?bio=tendik");
        } else if ($user == 'ortu') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: form_biodata.php?bio=ortu");
        } else if ($user == 'alumni') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: form_biodata.php?bio=alumni");
        }else if ($user == 'industri') {
            // Simpan data user ke dalam session
            $_SESSION['user'] = $user;
            $_SESSION['nama'] = $nama;
            header("Location: form_biodata.php?bio=industri");
        }else {
            $error_message = "Jenis pengguna tidak valid.";
        }
    }
?>