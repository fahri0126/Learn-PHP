<?php

class Koneksi
{
    protected $koneksi;

    public function __construct()
    {
        $this->koneksi =  mysqli_connect("localhost", "root", "", "polymorph");
        if (mysqli_connect_errno()) die('Koneksi ke Database Gagal : ' . mysqli_connect_error());

        return $this->koneksi;
    }
}
