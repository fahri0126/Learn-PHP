<?php
include 'aksi.php';

$idDivisi = $_GET["id"];

$query = "SELECT * FROM ruangan";
$rows = tampilDivisi("SELECT * FROM divisi WHERE id = $idDivisi ")[0];

if (isset($_POST["submit"])) {

    if (ubahDivisi() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Divisi</title>
</head>

<body>
    <h1 align="center">Update Data Divisi</h1>
    <table cellpadding="15px">
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $rows["id"]; ?>">
            <tr>
                <td><label for="divisi">Divisi</label></td>
                <td><input type="text" name="divisi" id="divisi" value="<?= $rows["nama_divisi"];  ?>"></td>
            </tr>
            <tr>
                <td><label for="ruangan">Ruangan</label></td>
                <td>
                    <select name="ruangan" id="ruangan">
                        <?php
                        $ruangan = tampilRuangan($query);
                        foreach ($ruangan as $row) : ?>
                            <?php if ($rows["id_ruangan"] == $row["id"]) : ?>
                                <option value="<?= $row["id"]; ?>" selected><?= $row["nama_ruangan"]; ?></option>
                            <?php else : ?>
                                <option value="<?= $row["id"]; ?>"><?= $row["nama_ruangan"]; ?></option>
                            <?php endif;; ?>
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