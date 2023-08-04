<?php
include 'aksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Kategori</title>
</head>

<body>
    <center>
        <button style="margin-bottom: 1rem; margin-top: 15px ;"><a href="tambah.php" style="text-decoration: none;">Tambah Kategori</a></button>
    </center>
    <table cellspacing="0" cellpadding="15" border="1" align="center">
        <tr>
            <th>No</th>
            <th>kategori</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($tampilKategori->tampil('kategori', '*', NULL) as $row) : ?>
            <tr>
                <td><?= $i++ ?>.</td>
                <td><?= $row["Kategori_produk"] ?? "-" ?></td>
                <td>
                    <button><a href="hapus.php?id=<?= $row['id_kategori']; ?>">Hapus</a></button>
                    <button><a href="">Update</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>