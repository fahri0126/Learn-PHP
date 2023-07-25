<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_pegawai");
if (mysqli_connect_errno()) {
    die('Koneksi ke database gagal' .  mysqli_connect_error());
}

function tampilPegawai($field)
{
    global $koneksi;
    $result = mysqli_query($koneksi, "SELECT * FROM pegawai");
    $test = mysqli_fetch_assoc($result)[$field];
    echo $test;
}

function tambahPegawai()
{
    global $koneksi;
    $nama = $_POST["nama"];
    $foto = $_POST["foto"];

    mysqli_query($koneksi, "INSERT INTO pegawai VALUES
                ('','$nama', '$foto', '2')
                ");

    return mysqli_affected_rows($koneksi);
}
