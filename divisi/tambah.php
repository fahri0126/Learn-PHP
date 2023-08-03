<?php
include 'aksi.php';

$ruangan = tampilRuangan("SELECT * FROM ruangan");

if (isset($_POST["submit"])) {
    if (tambahDivisi() > 0) {
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
    <title>Tambah Data Divisi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <section class="container mt-5">
        <div class="row">
            <h2 class="fw-light fs-2 d-flex justify-content-center">Tambah Data Divisi</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="mb-5">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control shadow" name="divisi" id="divisi" placeholder="type here..." autofocus>
                    </div>
                    <div class="mb-5">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <select name="ruangan" class="form-select shadow" id="ruangan" style="width: 178px;">
                            <?php foreach ($ruangan as $row) : ?>
                                <option value="<?= $row["id"]; ?>"><?= $row["nama_ruangan"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-success shadow" name="submit">Submit</button>
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