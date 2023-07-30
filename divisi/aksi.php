<?php
include '../koneksi.php';
include_once '../ruangan/aksi.php';


// function tampil
function tampilDivisi($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// function tambah
function tambahDivisi()
{
    global $koneksi;
    $divisi = $_POST["divisi"];
    $ruangan = $_POST["ruangan"];

    mysqli_query($koneksi, "INSERT INTO divisi VALUES
                                ('', '$divisi', '$ruangan')");
    return mysqli_affected_rows($koneksi);
}

// function hapus
function hapusDivisi($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM divisi WHERE id= $id ");
    $kembalian = mysqli_affected_rows($koneksi);
    if ($kembalian > 0) {
        header('location:index.php');
    }
}

// function UPDATE
function ubahDivisi()
{
    global $koneksi;
    $idDivisi = intval($_POST["id"]);
    $namaDivisi = $_POST["divisi"];
    $idRuangan = intval($_POST["ruangan"]);

    $query = mysqli_query($koneksi, "UPDATE divisi SET nama_divisi = '$namaDivisi', id_ruangan = '$idRuangan' WHERE id = $idDivisi");
    return $query;
}

// function SEARCHING
function cariDivisi($pencarian)
{
    $query = "SELECT divisi.id as 'mainId', divisi.nama_divisi, divisi.id_ruangan, ruangan.nama_ruangan
            FROM divisi
            LEFT JOIN ruangan ON divisi.id_ruangan = ruangan.id 
            WHERE 
            nama_divisi LIKE '%$pencarian%' OR
            nama_ruangan LIKE '%$pencarian%';
            ";

    return tampilDivisi($query);
}
