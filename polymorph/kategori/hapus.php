<?php
include 'aksi.php';

$id = $_GET['id'];

if (isset($id)) {
    $objek = new aksi();
    $objek->hapus('kategori', 'id_kategori', $id);
}
