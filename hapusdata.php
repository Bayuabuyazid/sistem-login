<?php
include "koneksi.php";

# menghapus data
$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");

header("Location: pageview.php");
exit;
?>