<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class= "p-4 fonst-sans bg-gray-100">
   <?php
   include "koneksi.php";
   ?>

   <div class="mb-4">
    <a href="index.html" class="px-4 py-2 bg-blue-500 text white rounded">+menambah data
    </a>
   </div>

   <?php 
   $sql = "SELECT * FROM users";
   $result = mysqli_query($koneksi, $sql);

   if (mysqli_num_rows($result) > 0) {
       echo "<table class='w-full border-collapse border border-gray-300'>";
       echo "<thead>";
       echo "<tr>";
       echo "<th class='border border-gray-300 px-4 py-2'>ID</th>";
       echo "<th class='border border-gray-300 px-4 py-2'>Username</th>";
       echo "<th class='border border-gray-300 px-4 py-2'>Password</th>";
       echo "<th class='border border-gray-300 px-4 py-2'>Aksi</th>";
       echo "</tr>";
       echo "</thead>";
       echo "<tbody>";

       while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           echo "<td class='border border-gray-300 px-4 py-2'>" . $row['id'] . "</td>";
           echo "<td class='border border-gray-300 px-4 py-2'>" . $row['username'] . "</td>";
           echo "<td class='border border-gray-300 px-4 py-2'>" . $row['password'] . "</td>";
           echo "<td class='border border-gray-300 px-4 py-2'>";
           echo "<a href='edit.php?id=" . $row['id'] . "' class='px-2 py-1 bg-yellow-500 text-white rounded'>Edit</a> ";
           echo "<a href='hapus.php?id=" . $row['id'] . "' class='px-2 py-1 bg-red-500 text-white rounded' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>";
           echo "</td>";
           echo "</tr>";
       }

       echo "</tbody>";
       echo "</table>";

   } else {
       echo "Tidak ada data.";
   }
?>
</body>
</html>