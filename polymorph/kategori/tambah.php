<?php
include 'aksi.php';

if (isset($_POST["submit"])) {
    $kategori = $_POST["kategori"];

    $values = "'', '$kategori'";
    $tambahKategori->tambah('kategori', $values);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Kategpri</title>
</head>

<body>

    <h2>Tambah Kategori</h2>

    <table>
        <form action="" method="post">
            <tr>
                <td><label for="kategori">Kategori :</label></td>
                <td><input type="text" name="kategori" id="kategori"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </form>
    </table>

</body>

</html>