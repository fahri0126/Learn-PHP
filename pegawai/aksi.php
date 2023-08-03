<?php
include '../koneksi.php';
include_once '../divisi/aksi.php';

// function READ
function tampilPegawai($pencarian, $halaman, $idPegawai)
{
    global $koneksi;
    $search = "";
    if ($idPegawai !== NULL) {
        $search = "WHERE pegawai.id = $idPegawai";
    } elseif ($pencarian != NULL) {
        $search = "WHERE 
                nama_pegawai LIKE '%$pencarian%' OR
                nama_divisi LIKE '%$pencarian%' OR
                nama_ruangan LIKE '%$pencarian%'";
    }

    $query = "SELECT pegawai.id as 'mainId', pegawai.nama_pegawai, pegawai.foto, pegawai.id_divisi, divisi.id, divisi.nama_divisi,divisi.id_ruangan, ruangan.id, ruangan.nama_ruangan
                        FROM pegawai
                        LEFT JOIN  divisi ON pegawai.id_divisi = divisi.id
                        LEFT JOIN ruangan ON divisi.id_ruangan = ruangan.id " . $search;
    // "ORDER BY pegawai.id DESC";

    if ($halaman != NULL) {
        $pagination = setPagination($query, $halaman);
        $query .= $pagination;
    }

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die('Error executing query: ' . mysqli_error($koneksi));
    }

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function PAGINATION
function setPagination($query, $halaman)
{
    $jumlahDataPerHalaman = 3;
    $halamanAktif = (isset($halaman)) ? $halaman : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


    return " LIMIT $awalData, $jumlahDataPerHalaman";
}


// function SEARCHING
function cariPegawai($pencarian,)
{
    header('location:index.php?pencarian=' . $pencarian . '&halaman=1');
}


// function CREATE
function tambahPegawai()
{
    global $koneksi;
    $nama = $_POST["nama"];
    $divisi = $_POST["divisi"];

    $foto = upload();
    if (!$foto) {
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO pegawai VALUES
                ('','$nama', '$foto', '$divisi')
                ");

    return mysqli_affected_rows($koneksi);
}


function upload()
{
    $name = $_FILES["foto"]["name"];
    $tmp_name = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];
    if ($error === 4) {
        return false;
    }

    // $ekstensiFoto = ["jpg", "jpeg", "png"];
    $ekstensi = explode('.', $name);
    $ekstensi = strtolower(end($ekstensi));

    $namaFoto = uniqid();
    $namaFoto .= ".";
    $namaFoto .= "$ekstensi";
    move_uploaded_file($tmp_name, 'img/' . $namaFoto);

    return $namaFoto;
}

// function HAPUS
function hapusPegawai($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pegawai WHERE id= $id ");

    $kembalian = mysqli_affected_rows($koneksi);

    if ($kembalian > 0) {
        header('location:index.php');
    }
}


// function UPDATE
function ubahPegawai()
{
    global $koneksi;
    $idPegawai = $_POST["idPegawai"];
    $fotoLama = $_POST["fotoLama"];
    $nama = $_POST["nama"];
    $divisi = $_POST["divisi"];

    $foto = upload();

    if (!$foto) {
        $foto = $fotoLama;
    }

    $query = mysqli_query($koneksi, "UPDATE pegawai SET
                nama_pegawai = '$nama',
                id_divisi = '$divisi',
                foto = '$foto'
              WHERE id = $idPegawai");

    return $query;
}
