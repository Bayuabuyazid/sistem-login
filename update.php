<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if (!$id == null) {
    echo "ID tidak ditemukan.";
    exit();
}

$sql = "SELECT * FROM users WHERE id='$id'";    
$result = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_assoc($result);
?>

<form action="update_data.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <input type="id" name="id" value="<?php echo $row['username']; ?>" required>

    <input type="password" name="password" value="<?php echo $row['password']; ?>" required>

    <input type="submit" value="Update Data">
</form>