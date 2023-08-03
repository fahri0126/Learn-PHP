<?php
include 'aksi.php';

$idRuangan = $_GET["id"];

$rows = tampilRuangan("SELECT * FROM ruangan WHERE id = $idRuangan")[0];

if (isset($_POST["submit"])) {

    if (ubahRuangan() > 0) {
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
    <title>Update Data Ruangan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <div class="container mt-5">
        <div class="row mb-5">
            <h2 class="fw-light fs-2 d-flex justify-content-center">Update Data Ruangan</h2>
        </div>

        <form action="" method="post">
            <!-- hidden item -->
            <input type="hidden" name="idRuangan" value="<?= $idRuangan; ?>">
            <!-- hidden item -->
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="mb-5">
                        <!-- <label for="ruangan">Ruangan</label> -->
                        <input type="text" class="form-control shadow" name="ruangan" id="ruangan" value="<?= $rows["nama_ruangan"]; ?>" autofocus>
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-success rounded-end" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>

</html>