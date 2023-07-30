<?php
include '../koneksi.php';


// functionn tampil
function tampilRuangan($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// functionn tampil
function tambahRuangan()
{
    global $koneksi;
    $ruangan = $_POST["ruangan"];

    mysqli_query($koneksi, "INSERT INTO ruangan VALUES
                    ('','$ruangan')
                    ");

    return mysqli_affected_rows($koneksi);
}

// function hapus
function hapusRuangan($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM ruangan WHERE id= $id ");

    $kembalian = mysqli_affected_rows($koneksi);

    if ($kembalian > 0) {
        header('location:index.php');
    }
}


// function UPDATE
function ubahRuangan()
{
    global $koneksi;
    $idRuangan = intval($_POST["idRuangan"]);
    $namaRuangan = $_POST["ruangan"];

    $query = mysqli_query($koneksi, "UPDATE ruangan SET 
                nama_ruangan = '$namaRuangan' WHERE id = $idRuangan
                ");

    return $query;
}


// function SEACHING
function cariRuangan($pencarian)
{
    $query = "SELECT *
                FROM ruangan
                WHERE 
                nama_ruangan LIKE '%$pencarian%' ORDER BY id desc
                ;";

    return tampilRuangan($query);
}
