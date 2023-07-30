<?php
include 'aksi.php';

if (isset($_POST["submit"])) {

    if (tambahRuangan() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Ruangan</title>
</head>

<body>
    <h1 align="center">Tambah Data Ruangan</h1>
    <table cellpadding="15">
        <form action="" method="post">
            <tr>
                <td><label for="ruangan">Ruangan</label></td>
                <td><input type="text" name="ruangan" id="ruangan"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </form>
    </table>

</body>

</html>