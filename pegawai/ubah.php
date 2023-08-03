<?php
include_once 'aksi.php';

$idPegawai = $_GET["id"];

$query = "SELECT divisi.id as 'divId', divisi.nama_divisi, divisi.id_ruangan, ruangan.nama_ruangan
             FROM divisi
             LEFT JOIN ruangan ON divisi.id_ruangan = ruangan.id";
$rows = tampilPegawai(NULL, NULL, $idPegawai)[0];

if (isset($_POST["submit"])) {
    if (ubahPegawai() > 0) {
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
    <title>Update Data Pegawai</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <section class="container mt-5">
        <div class="row mb-5">
            <h2 class="fs-2 fw-light d-flex justify-content-center">Update Data Pegawai</h2>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center">
                <!-- hidden item -->
                <input type="hidden" name="idPegawai" value="<?= $idPegawai; ?>">
                <input type="hidden" name="fotoLama" value="<?= $rows["foto"]; ?>">
                <!-- hidden item -->
                <div class="col-md-3 d-flex justify-content-center align-items-center me-2 rounded border">
                    <img src="img/<?= $rows["foto"]; ?>" alt="" style="max-width: 270px ;">
                </div>
                <div class="col-md-5">
                    <div class="mb-5">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control shadow" name="nama" id="nama" value="<?= $rows["nama_pegawai"]; ?>">
                    </div>
                    <div class="mb-5">
                        <label for="divisi" class="form-label">Divisi</label>
                        <select name="divisi" class="form-select shadow" id="divisi" style="width: 178px;">
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
                    </div>
                    <div class="mb-5">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control shadow" name="foto" id="foto">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>

</html>