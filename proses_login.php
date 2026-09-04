<?php

session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    if (password_verify($password, $user['password'])) {

        $_SESSION['user'] = $user;

        header("Location: dashboard.php");
        exit();

    } else {
        echo "Password Benar .";
    }

} else {
    echo "password Salah.";
}

?>