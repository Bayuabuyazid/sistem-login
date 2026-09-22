<?php

// Memulai session
session_start();

// Menghubungkan ke database
include "koneksi.php";

// Mengambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Mencari username di database
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

// Mengecek apakah username ditemukan
if (mysqli_num_rows($result) > 0) {

    // Mengambil data user
    $user = mysqli_fetch_assoc($result);

    // Mengecek password yang diketik
    // dengan password hash yang tersimpan di database
    if (password_verify($password, $user['password'])) {

        // Password BENAR
        $_SESSION['user'] = $user;

        // Masuk ke dashboard
        header("Location: dashboard.php");
        exit();

    } else {

        // Password SALAH
        echo "Password salah.";
    }

} else {

    // Username tidak ditemukan
    echo "Username tidak ditemukan.";
}

?>