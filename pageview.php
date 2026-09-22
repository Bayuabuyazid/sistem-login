<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
</head>

<body class="p-4 font-sans bg-gray-100">

<?php
include "koneksi.php";
?>

<div class="mb-4">
    <a href="index.html" class="px-4 py-2 bg-blue-500 text-white rounded">
        + Menambah Data
    </a>
</div>

<?php

$sql = "SELECT * FROM users";
$result = mysqli_query($koneksi, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<ul class='bg-white p-3 rounded shadow'>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<li class='border-b py-2'>";

        echo "<span class='font-bold'>" . $row["username"] . "</span> - ";
        echo "<span>" . $row["password"] . "</span> ";

        echo "<a href='hapus.php?id=" . $row["id"] . "' class='ml-3 text-red-500'>Hapus</a>";

        echo "<a href='update.php?id=" . $row["id"] . "' class='ml-3 text-green-500'>Update</a>";

        echo "</li>";
    }

    echo "</ul>";

} else {

    echo "<p class='text-gray-600'>Tidak ada data</p>";
}

mysqli_close($koneksi);

?>

</body>
</html>