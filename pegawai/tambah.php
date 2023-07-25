<?php
include '../koneksi.php';

if (isset($_POST["submit"])) {

    if (tambahPegawai() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tambah Pegawai</h1>
    <table cellpadding="15">
        <form action="" method="post" enctype="multipart/form-data">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama"></td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>
                    <input type="file" id="foto" name="foto">
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" name="submit">Submit</button>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>