<?php

class config
{
    var $host = "localhost";
    var $user = "root";
    var $pass = "";
    var $database = "perpustakaan";
    var $koneksi = "";
    function __construct()
    {
        $this->koneksi = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        if (mysqli_connect_errno()) {
            echo "Koneksi DataBase Gagal : " . mysqli_connect_error();
        }
    }
    function tampil_data()
    {
        $data = mysqli_query($this->koneksi, "SELECT * FROM member");
        while ($row = mysqli_fetch_array($data)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
    function tambah($no_id, $jenis_id, $fname, $tgl_lahir, $alamat, $no_tlp, $pekerjaan, $jk, $gambar)
    {
        mysqli_query($this->koneksi, "INSERT INTO member values ('','$no_id','$jenis_id','$fname','$tgl_lahir','$alamat','$no_tlp','$pekerjaan','$jk','$gambar')");
    }
    function get_by_id($id)
    {
        $query = mysqli_query($this->koneksi, "SELECT * FROM member WHERE id='$id'");
        return $query->fetch_array();
    }
    function update_data($no_id, $jenis_id, $fname, $tgl_lahir, $alamat, $no_tlp, $pekerjaan, $jk, $gambar, $id)
    {
        $query = mysqli_query($this->koneksi, "UPDATE member SET no_id='$no_id',jenis_id='$jenis_id',fname='$fname',tgl_lahir='$tgl_lahir',alamat='$alamat',no_tlp='$no_tlp',pekerjaan='$pekerjaan',jk='$jk',gambar='$gambar' WHERE id='$id'");
    }
    function delete_data($id)
    {
        $query = mysqli_query($this->koneksi, "DELETE FROM member WHERE id='$id'");
    }
}
