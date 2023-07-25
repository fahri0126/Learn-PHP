<?php include '../koneksi.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1" cellspacing="0" cellpadding="30">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Foto</th>
        </tr>

        <tr>
            <td><?= $i = 1; ?></td>
            <td>
                <?= tampilPegawai("nama") ?>
            </td>
            <td>
                <?= tampilPegawai("foto") ?>
            </td>
        </tr>
        <?php $i++ ?>
    </table>
</body>

</html>