<?php
include_once 'aksi.php';

$divisi = tampilDivisi("SELECT * FROM divisi");

if (isset($_POST["submit"])) {

    if (tambahPegawai() > 0) {
        header('location:index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Pegawai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <section class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="fs-2 fw-light d-flex justify-content-center">Tambah Data Pegawai</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-5">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control shadow" name="nama" id="nama" autofocus placeholder="type here...">
                    </div>
                    <div class="mb-5">
                        <label for="divisi" class="form-label">Divisi</label>
                        <select name="divisi" class="form-select shadow" id="divisi" style="width: 178px;">
                            <?php foreach ($divisi as $row) : ?>
                                <option name="divisi" id="divisi" value="<?= $row["id"]; ?>"><?= $row["nama_divisi"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control shadow" id="foto" name="foto" requirred>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-success shadow-lg" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>

</html>