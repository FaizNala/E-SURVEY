<?php
session_start();
include "model/koneksi.php";

// Ambil username dan password dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mendapatkan data user berdasarkan username
$query = "SELECT user_id, username, password, nama FROM m_user WHERE username = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if ($row) {
    $hashed_password = $row['password'];

    // Verifikasi password
    if (password_verify($password, $hashed_password)) {
        if (isset($_POST["remember"])) {
            setcookie('username', $username, time() + 3600 * 24 * 7);
            setcookie('password', $password, time() + 3600 * 24 * 7);
        }
        // Password valid, set session
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['user_id'] = $row['user_id'];
        header("Location: index.php");
        exit;
    } else {
        // Password tidak valid
        header("Location: login2.php?error=invalidPass");
        exit;
    }
} else {
    // Username tidak ditemukan
    header("Location: login2.php?error=invalidUser");
    exit;
}
?>
