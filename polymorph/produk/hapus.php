<?php
include 'aksi.php';

$id = $_GET['id'];

if (isset($id)) {
    $hapusProduk->hapus('produk', 'id_produk', $id);
}
