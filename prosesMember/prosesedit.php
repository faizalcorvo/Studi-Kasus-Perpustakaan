<?php
require '../prosesLogin/conlog.php';

// proses login
if (!empty($_GET['action'] == 'update')) {
    $id =  (int)$_POST["id"]; // should be integer (id)
    $data[] =  htmlspecialchars($_POST["no_id"]);
    $data[] =  htmlspecialchars($_POST["jenis_id"]);
    $data[] =  htmlspecialchars($_POST["fname"]);
    $data[] =  htmlspecialchars($_POST["tgl_lahir"]);
    $data[] =  htmlspecialchars($_POST["alamat"]);
    $data[] =  htmlspecialchars($_POST["no_tlp"]);
    $data[] =  htmlspecialchars($_POST["pekerjaan"]);
    $data[] =  htmlspecialchars($_POST["jk"]);
    $data[] =  htmlspecialchars($_POST["gambar"]);
    $data[] =  $id;

    $sql = "UPDATE member SET 
                    no_id = ?, 
                    jenis_id = ?, 
                    fname = ?, 
                    tgl_lahir = ?, 
                    alamat = ?, 
                    no_tlp = ?,
                    pekerjaan = ?,  
                    jk = ?,  
                    gambar = ?  
                    WHERE id = ?";

    $row = $koneksi->prepare($sql);
    $row->execute($data);
    echo "<script>window.location='../table-user.php';</script>";
}
