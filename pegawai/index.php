<?php include 'aksi.php';

if (isset($_POST["cari"])) {
    $rows = cariPegawai($_POST["pencarian"], $_POST["halaman"]);
} else {
    $pencarian = isset($_GET["pencarian"]) ? $_GET["pencarian"] : NULL;
    $halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : '1';
    $rows = tampilPegawai($pencarian, $halaman);
    $jumlahHalaman = ceil(count(tampilPegawai($pencarian, NULL)) / 3);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Pegawai</title>
</head>

<body>
    <center>
        <button style="background-color: blue ; margin: 1rem ;" align="center"><a href="tambah.php" style="text-decoration:none ; color:white ;">Tambah data baru</a></button>
    </center>
    <table cellpadding="30" align="center">
        <form action="" method="post">
            <tr>
                <td>
                    <input type="text" name="pencarian" autofocus required autocomplete="off" placeholder="type here...">
                    <button type="submit" name="cari">Cari</button>
                </td>
            </tr>
        </form>
    </table>
    <center>
        <?php if ($jumlahHalaman <= 1) : ?>
        <?php else : ?>
            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <a href="?pencarian=<?= $pencarian; ?>&halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endfor; ?>
        <?php endif; ?>
    </center><br>
    <table border="1" cellspacing="0" cellpadding="30" align="center">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Divisi</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td>
                    <?= $i;
                    $i++; ?>
                </td>
                <td><?= $row["nama_pegawai"]; ?></td>
                <td><img src="img/<?= $row["foto"]; ?>" width="100px" alt="N/A"></td>
                <td><?= $row["nama_divisi"]; ?></td>
                <td><?= $row["nama_ruangan"]; ?></td>
                <td>
                    <button style="background-color: red ;"><a style="text-decoration:none ; color:white ;" href="hapus.php?id=<?= $row["mainId"] ?>">Hapus</a></button> |
                    <button style="background-color: green ;"><a style="text-decoration:none ; color:white ;" href="ubah.php?id=<?= $row["mainId"] ?>">Ubah</a></button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>