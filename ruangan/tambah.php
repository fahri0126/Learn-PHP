<?php
include 'aksi.php';

if (isset($_POST["submit"])) {

    if (tambahRuangan() > 0) {
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
    <title>Tambah Data Ruangan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <section class="container mt-5">
        <div class="row">
            <h2 class="fw-light fs-2 d-flex justify-content-center">Tambah Data Ruangan</h2>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <form action="" method="post">
                    <div class="d-flex justify-content-center">
                        <!-- <label for="ruangan" class="form-label fs-5 pr-3">Ruangan</label> -->
                        <input type="text" class="form-control form-control-sm shadow rounded-pill" name="ruangan" id="ruangan" placeholder="&nbsp;&nbsp;&nbsp;type here..." autofocus style="width: 25rem;" autocomplete="off">
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button type="submit" class="btn btn-success rounded-pill" name="submit">Submit</button>
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