<?php

// Memulai session.
// Session digunakan untuk menyimpan informasi user setelah berhasil login.
session_start();

// Menghubungkan file ini dengan koneksi database.
// Jadi $koneksi berasal dari koneksi.php.
include "koneksi.php";


// Mengambil username yang dikirim dari form login.
$username = $_POST['username'];

// Mengambil password yang dikirim dari form login.
$password = $_POST['password'];


// Mencari data user berdasarkan username.
// Jadi database akan mencari apakah username tersebut ada di tabel users.
$query = "SELECT * FROM users WHERE username='$username'";

// Menjalankan query ke database.
$result = mysqli_query($koneksi, $query);


// Mengecek apakah username ditemukan.
// Kalau jumlah data lebih dari 0 berarti username ada.
if (mysqli_num_rows($result) > 0) {

    // Mengambil data user dari hasil query
    // dan mengubahnya menjadi array.
    $user = mysqli_fetch_assoc($result);


    // Mengecek password yang dimasukkan dengan password hash
    // yang tersimpan di database.
    //
    // password_verify() penting karena password di database
    // disimpan dalam bentuk hash, bukan password asli.
    if (password_verify($password, $user['password'])) {

        // Kalau password benar, data user disimpan ke session.
        $_SESSION['user'] = $user;


        // Kalau login berhasil, pindahkan user ke dashboard.
        header("Location: dashboard.php");

        // Menghentikan proses PHP setelah redirect.
        exit();

    } else {

        // Username ditemukan tetapi password salah.
        echo "Password salah.";
    }

} else {

    // Username tidak ditemukan di database.
    echo "Username tidak ditemukan.";
}

?>