<?php
 include "koneksi.php";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

     $id = $_POST['id'];
     $username = $_POST['username'];
     $password = $_POST['password'];

     // Mengubah password menjadi hash
     $password_hash = password_hash($password, PASSWORD_DEFAULT);

     // Memperbarui data user
     $query = "UPDATE users SET username='$username', password='$password_hash' WHERE id='$id'";

     if (mysqli_query($koneksi, $query)) {
         echo "Data berhasil diperbarui!";
     } else {
         echo "Gagal memperbarui data: " . mysqli_error($koneksi);
     }
 }