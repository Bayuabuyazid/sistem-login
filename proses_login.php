<?php

session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $user;
    header("Location: dashboard.php");
} else {
    echo "Login gagal. Silakan coba lagi.";
}
?>