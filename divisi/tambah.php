<?php
include 'aksi.php';

$ruangan = tampilRuangan("SELECT * FROM ruangan");

if (isset($_POST["submit"])) {
    if (tambahDivisi() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Divisi</title>
</head>

<body>
    <h1 align="center">Tambah Data Divisi</h1>
    <table cellpadding="15px">
        <form action="" method="post">
            <tr>
                <td><label for="divisi">Divisi</label></td>
                <td><input type="text" name="divisi" id="divisi"></td>
            </tr>
            <tr>
                <td><label for="ruangan">Ruangan</label></td>
                <td>
                    <select name="ruangan" id="ruangan">
                        <?php foreach ($ruangan as $row) : ?>
                            <option value="<?= $row["id"]; ?>"><?= $row["nama_ruangan"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </form>
    </table>


</body>

</html>