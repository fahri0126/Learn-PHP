<?php
include_once 'aksi.php';

$idPegawai = $_GET["id"];

$query = "SELECT divisi.id as 'divId', divisi.nama_divisi, divisi.id_ruangan, ruangan.nama_ruangan
             FROM divisi
             LEFT JOIN ruangan ON divisi.id_ruangan = ruangan.id
             ";
$rows = tampilPegawai(NULL, NULL)[0];

if (isset($_POST["submit"])) {

    var_dump($_POST);
    var_dump($_FILES);

    if (ubahPegawai() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pegawai</title>
</head>

<body>
    <h1 align="center">Update Data Pegawai</h1>
    <table cellpadding="15">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idPegawai" value="<?= $idPegawai; ?>">
            <input type="hidden" name="fotoLama" value="<?= $rows["foto"]; ?>">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td><input type="text" name="nama" id="nama" value="<?= $rows["nama_pegawai"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="divisi">Divisi</label></td>
                <td>
                    <select name="divisi" id="divisi" style="width: 178px;">
                        <?php
                        $divisi = tampilDivisi($query);
                        foreach ($divisi as $row) : ?>
                            <?php if ($rows["id_divisi"] == $row["divId"]) : ?>
                                <option value="<?= $row["divId"]; ?>" selected><?= $row["nama_divisi"]; ?></option>
                            <?php else : ?>
                                <option value="<?= $row["divId"]; ?>"><?= $row["nama_divisi"]; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="foto">Foto</label></td>
                <td>
                    <img src="img/<?= $rows["foto"]; ?>" alt="" width="90">
                    <input type="file" name="foto" id="foto">
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