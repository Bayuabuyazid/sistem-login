<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if ($id === null) {
    echo "ID tidak ditemukan.";
    exit;
}

// Ambil data lama
$sql = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'"); 
$siswa = mysqli_fetch_assoc($sql);

if (!$siswa) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses update
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Update data
    mysqli_query($koneksi, "UPDATE users SET 
        username='$username',
        password='$password'
        WHERE id='$id'
    ");

    header("Location: pageview.php");
    exit;
}
?>

<div class="container">

    <h2>Update Data User</h2>

    <form method="post">

        <!-- ID -->
        <label>ID</label>
        <input 
            type="text" 
            name="id" 
            value="<?= htmlspecialchars($siswa['id']); ?>" 
            readonly
        >

        <!-- Username -->
        <label>Username</label>
        <input 
            type="text" 
            name="username" 
            value="<?= htmlspecialchars($siswa['username']); ?>" 
            required
        >

        <!-- Password -->
        <label>Password</label>
        <input 
            type="password" 
            name="password" 
            value="<?= htmlspecialchars($siswa['password']); ?>" 
            required
        >

        <input type="submit" name="update" value="Update">

    </form>

    <br>

    <a href="pageview.php">
        <button type="button">Kembali</button>
    </a>

</div>

</body>
</html>