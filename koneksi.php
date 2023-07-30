<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_pegawai");
if (mysqli_connect_errno()) {
    die('Koneksi ke database gagal' .  mysqli_connect_error());
}
