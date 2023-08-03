<?php include 'aksi.php';

if (isset($_POST["cari"])) {
    $rows = cariRuangan($_POST["pencarian"]);
} else {
    $rows = tampilRuangan("SELECT *FROM ruangan ORDER BY id DESC");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Ruangan</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap -->

</head>

<body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light pt-4 shadow-sm">
        <div class="container">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link " href="../pegawai/index.php">Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../divisi/index.php">Divisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-success text-white rounded" aria-current="page" href="">Ruangan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-5">
                            <button type="button" class="btn btn-success"><a href="tambah.php" style="text-decoration:none ; color:white ;">Tambah data baru</a></button>
                        </div>
                        <div class="col d-flex align-items-center">
                            <form class="d-flex" action="" method="post" role="search">
                                <input class="form-control me-2" type="search" name="pencarian" placeholder="Search" aria-label="Search" autofocus>
                                <button class="btn btn-outline-success" type="submit" name="cari">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <div class="container">
        <table class="mt-5 table table-success table-striped table-bordered">
            <tr>
                <th>No</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row["nama_ruangan"]; ?></td>
                    <td>
                        <button class="btn btn-outline-danger"><a style="text-decoration:none ; color:black ;" href="hapus.php?id=<?= $row["id"] ?>">Hapus</a></button>
                        <button class="btn btn-outline-success"><a style="text-decoration:none ; color:black ;" href="ubah.php?id=<?= $row["id"] ?>">Ubah</a></button>
                    </td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </table>
    </div>

    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>


</html>