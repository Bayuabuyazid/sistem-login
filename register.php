<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mengamankan password sebelum disimpan
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password)
              VALUES ('$username', '$password_hash')";

    if (mysqli_query($koneksi, $query)) {
        echo "Registrasi berhasil! <a href='index.html'>Login sekarang</a>";
    } else {
        echo "Registrasi gagal: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form action="register.php" method="post">

    <label>Username</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" required>

    <br><br>

    <button type="submit">Daftar</button>

</form>

</body>
</html>