<?php
include 'aksi.php';


if (isset($_POST["submit"])) {

    $nama_produk = $_POST["nama_produk"];
    $harga = $_POST["harga"];
    $kategori = $_POST["kategori"];

    $values = "'', '$nama_produk', '$kategori', '$harga'";
    $tambah = $tambahProduk->tambah('produk', $values);
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
    <h2>Tambah Data</h2>

    <table>
        <form action="" method="post">
            <tr>
                <td><label for="produk">Nama Produk : </label></td>
                <td><input type="text" name="nama_produk" id="produk"></td>
            </tr>
            <tr>

                <td>
                    <label for="kategori">Kategori : </label>
                </td>
                <td>
                    <select name="kategori" id="kategori">
                        <?php foreach ($tampilProduk->tampil('kategori', '*', NULL) as $rows) : ?>
                            <option value="<?= $rows["id_kategori"]; ?>"><?= $rows["Kategori_produk"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="harga">Harga : </label></td>
                <td><input type="number" name="harga" id="harga"></td>
            </tr>
            <tr>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </form>
    </table>

</body>

</html>