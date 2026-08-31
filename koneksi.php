<?php
$koneksi = mysqli_connect("localhost", "root", "", "sistem-login");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

echo "Koneksi berhasil!";
?>