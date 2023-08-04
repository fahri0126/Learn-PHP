<?php
include 'aksi.php';
$field = "produk.id_produk, produk.nama_produk, produk.idKategori, produk.harga, kategori.id_kategori, kategori.kategori_produk";
$join = "LEFT JOIN kategori ON produk.idKategori = kategori.id_kategori";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Produk</title>
</head>

<body>
    <center>
        <button style="margin-bottom: 1rem; margin-top: 15px ;"><a href="tambah.php" style="text-decoration: none;">Tambah Data Produk</a></button>
    </center>
    <table cellspacing="0" cellpadding="15" border="1" align="center">
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Kategori</th>
            <!-- <th>Ulasan</th> -->
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($tampilProduk->tampil('produk', $field, $join) as $row) : ?>
            <tr>
                <td><?= $i++ ?>.</td>
                <td><?= $row["nama_produk"] ?? '-' ?></td>
                <td>Rp. <?= $row["harga"] ?? '-' ?></td>
                <td><?= $row["kategori_produk"]; ?></td>
                <td>
                    <button><a href="hapus.php?id=<?= $row["id_produk"]; ?>">Hapus</a></button>
                    <!-- <button><a href="">Update</a></button> -->
                </td>
            </tr>
        <?php endforeach; ?>


    </table>
</body>

</html>