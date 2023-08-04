<?php
include 'koneksi.php';


abstract class tampil extends Koneksi
{
    abstract public function tampil($tabel, $field, $join);
}

interface tambah
{
    public function tambah($table, $values);
}

interface hapus
{
    public function hapus($table, $idTable, $field);
}



class Read extends tampil
{
    private $query;
    public function tampil($tabel, $field, $join)
    {
        $this->query = "SELECT $field FROM $tabel " . $join;

        $result = mysqli_query($this->koneksi, $this->query);

        if (!$result) {
            die('Error executing query: ' . mysqli_error($this->koneksi));
        }

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }
}

class Create extends Koneksi implements tambah
{
    private $query;
    public function tambah($table, $values)
    {
        $this->query = "INSERT INTO $table VALUES ($values)";

        $result = mysqli_query($this->koneksi, $this->query);

        if ($result) {
            header('location:index.php');
        } else {
            die('Error executing query: ' . mysqli_error($this->koneksi));
            return;
        }
    }
}

class Delete extends Koneksi implements hapus
{
    private $query;
    public function hapus($table, $idTable, $id)
    {
        $this->query = "DELETE FROM $table WHERE $idTable = $id";

        $result = mysqli_query($this->koneksi, $this->query);

        if ($result) {
            header('location:index.php');
        } else {
            die('Error executing query : ' . mysqli_error($this->koneksi));
        }
    }
}
