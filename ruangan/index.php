<?php include 'aksi.php';

if (isset($_POST["cari"])) {
    $rows = cariRuangan($_POST["pencarian"]);
} else {
    $rows = tampilRuangan("SELECT *FROM ruangan ORDER BY id DESC");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Ruangan</title>
</head>

<body>
    <center>
        <button style="background-color: blue ; margin: 1rem ;" align="center"><a href="tambah.php" style="text-decoration:none ; color:white ;">Tambah data baru</a></button>
    </center>
    <table cellpadding="30" align="center">
        <form action="" method="post">
            <tr>
                <td>
                    <input type="text" name="pencarian" autofocus>
                    <button trpe="submit" name="cari">Cari</button>
                </td>
            </tr>
        </form>
    </table>
    <table border="1" cellspacing="0" cellpadding="30" align="center">
        <tr>
            <th>No</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row["nama_ruangan"]; ?></td>
                <td>
                    <button style="background-color: red ;"><a style="text-decoration:none ; color:white ;" href="hapus.php?id=<?= $row["id"] ?>">Hapus</a></button> |
                    <button style="background-color: green ;"><a style="text-decoration:none ; color:white ;" href="ubah.php?id=<?= $row["id"] ?>">Ubah</a></button>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </table>
</body>


</html>