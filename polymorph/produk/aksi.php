<?php
include '../class-aksi.php';

class kategori extends tampil
{
    private $query, $result;
    public function tampil($tabel, $field, $join)
    {
        $this->query = "SELECT * FROM kategori";

        $this->result = mysqli_query($this->koneksi, $this->query);
    }
}

$tampilProduk = new Read();
$tambahProduk = new Create();
$hapusProduk = new Delete();
