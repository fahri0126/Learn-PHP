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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Data Divisi</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <h2 class="fw-light fs-2 d-flex justify-content-center">Update Data Divisi</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="" method="post">
                    <!-- hidden item -->
                    <input type="hidden" name="id" value="<?= $rows["id"]; ?>">
                    <!-- hidden item -->
                    <div class="mb-5 ">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input type="text" class="form-control shadow" name="divisi" id="divisi" value="<?= $rows["nama_divisi"];  ?>" autofocus>
                    </div>
                    <div class="mb-5">
                        <label for="ruangan" class="form-label">Ruangan</label>
                        <select name="ruangan" class="form-select shadow" id="ruangan" style="width: 18rem;">
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
                    </div>
                    <div class="mt-3">
                        <td><button type="submit" class="btn btn-success" name="submit">Submit</button></td>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>

</html>