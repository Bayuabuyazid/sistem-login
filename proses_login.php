<?php

$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'bayu' && $password == '1234 ') {
    echo "Login berhasil!";
} else {
    echo "Login gagal. Silakan coba lagi.";
}
?>