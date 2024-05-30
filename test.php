<?php
    // Data pengguna yang akan dimasukkan
    $nama = 'admin';
    $user = 'admin';
    $password = 'admin';
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Menyertakan koneksi ke database
    include 'model/koneksi.php';

    // Query untuk menyisipkan data pengguna baru menggunakan prepared statement
    $query = "INSERT INTO m_user (username, nama, password) VALUES (?, ?, ?)";
    $stmt = $db->prepare($query);
    if ($stmt) {
        // Mengikat parameter ke dalam query
        $stmt->bind_param("sss", $user, $nama, $hashed_password);
        if ($stmt->execute()) {
            echo "Berhasil";
        } else {
            echo "Gagal: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Gagal menyiapkan statement: " . $db->error;
    }

    // Menutup koneksi database
    $db->close();
?>
