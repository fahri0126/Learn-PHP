<?php
include 'aksi.php';

$idRuangan = $_GET["id"];

$rows = tampilRuangan("SELECT * FROM ruangan WHERE id = $idRuangan")[0];

if (isset($_POST["submit"])) {

    if (ubahRuangan() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Ruangan</title>
</head>

<body>
    <h1 align="center">Update Data Ruangan</h1>
    <table cellpadding="15">
        <form action="" method="post">
            <input type="hidden" name="idRuangan" value="<?= $idRuangan; ?>">
            <tr>
                <td><label for="ruangan">Ruangan</label></td>
                <td><input type="text" name="ruangan" id="ruangan" value="<?= $rows["nama_ruangan"]; ?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </form>
    </table>

</body>

</html>