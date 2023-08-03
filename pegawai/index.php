<?php include 'aksi.php';

if (isset($_POST["cari"])) {
    $rows = cariPegawai($_POST["pencarian"], $_POST["halaman"]);
} else {
    $pencarian = isset($_GET["pencarian"]) ? $_GET["pencarian"] : NULL;
    $halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : '1';
    $rows = tampilPegawai($pencarian, $halaman, NULL);
    $jumlahHalaman = ceil(count(tampilPegawai($pencarian, NULL, NULL)) / 3);
}
$jumlahLink = 1;
if ($halaman > $jumlahLink) {
    $start = $halaman - $jumlahLink;
} else {
    $start = 1;
    $jumlahLink = 2;
}

if ($halaman <= ($jumlahHalaman - $jumlahLink)) {
    $end = $halaman + $jumlahLink;
} else {
    $start = $start - 1;
    $end = $jumlahHalaman;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Pegawai</title>

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
                            <a class="nav-link bg-success text-white rounded" aria-current="page" href="">Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../divisi/index.php">Divisi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ruangan/index.php">Ruangan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">other</a></li>
                                <li><a class="dropdown-item" href="#">Another other</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">more other</a></li>
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

    <!-- Pagination Start -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center pt-5">
            <?php if ($halaman <= 1) : ?>
                <li class="page-item disabled">
                    <a class="page-link text-success" href="?pencarian=<?= $pencarian; ?>&halaman=<?= $halaman - 1 ?>">Previous</a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a class="page-link text-success" href="?pencarian=<?= $pencarian; ?>&halaman=<?= $halaman - 1 ?>">Previous</a>
                </li>
            <?php endif; ?>

            <?php if ($jumlahHalaman <= 1) : ?>
            <?php else : ?>
                <?php for ($i = $start; $i <= $end; $i++) : ?>
                    <li class="page-item"><a class="page-link text-success" href="?pencarian=<?= $pencarian; ?>&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endfor; ?>
            <?php endif; ?>

            <?php if ($halaman >= $jumlahHalaman) : ?>
                <li class="page-item disabled">
                    <a class="page-link text-success" href="?pencarian=<?= $pencarian; ?>&halaman=<?= $halaman + 1 ?>">Next</a>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a class="page-link text-success" href="?pencarian=<?= $pencarian; ?>&halaman=<?= $halaman + 1 ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <!-- Pagination End -->

    <section class="container ">
        <table class="table table-success table-striped table-bordered ">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Foto</th>
                <th>Divisi</th>
                <th>Ruangan</th>
                <th>Aksi</th>
            </tr>
            <?php $i = (isset($_GET['halaman']) and $_GET['halaman'] > 1) ? ($_GET['halaman'] * 3) - 3 : 0; ?>
            <?php foreach ($rows as $row) : ?>
                <tr>
                    <td class="text-secondary">
                        <?= $i += 1; ?>
                    </td>
                    <td class="fw-normal"><?= $row["nama_pegawai"]; ?></td>
                    <td><img src=" img/<?= $row["foto"]; ?>" width="100px" alt="N/A">
                    </td>
                    <td><?= $row["nama_divisi"]; ?></td>
                    <td><?= $row["nama_ruangan"]; ?></td>
                    <td>
                        <button class="btn btn-outline-danger"><a style="text-decoration:none ; color:black ;" href="hapus.php?id=<?= $row["mainId"] ?>">Hapus</a></button>
                        <button class="btn btn-outline-success"><a style="text-decoration:none ; color:black ;" href="ubah.php?id=<?= $row["mainId"] ?>">Ubah</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>

    <!-- Js Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Js Bootstrap -->
</body>

</html>