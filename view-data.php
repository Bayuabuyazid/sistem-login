<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view data</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "koneksi.php";
    ?>

    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($koneksi, $sql);
    ?>

    <div class="container">
    <!--- tombol kembali ke input --> 

    <a href="index.html"> <button>Kembali</button></a>
    </div>

    <?php
    if (mysqli_num_rows($result) > 0): ?>
        <div class="container">
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pengguna</th>
                            <th>Password</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['id']); ?></td>
                                <td><?= htmlspecialchars($row['usersname']); ?></td>
                                <td><?= htmlspecialchars($row['password']); ?></td>
                                <!-- tombol hapus data tanpa konfirmasi -->
                                <td>
                                    <a href="hapus.php?id=<?= urlencode($row['id']); ?>">Hapus</a>
                                    <a href="update.php?id=<?= urlencode($row['id']); ?>">Edit</a>


                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>



        <?php else: ?>

            <p>Data tidak ditemukan</p>

        <?php endif; ?>

</body>

</html>
