<?php
include('config.php');
$koneksi = new config();

$action = $_GET['action'];
if ($action == "add") {
    $koneksi->tambah($_POST['no_id'], $_POST['jenis_id'], $_POST['fname'], $_POST['tgl_lahir'], $_POST['alamat'], $_POST['no_tlp'], $_POST['pekerjaan'], $_POST['jk'], $_POST['gambar']);
    header('location:../table-user.php?notif=success');
} elseif ($action == "update") {
    $koneksi->update_data($_POST['no_id'], $_POST['jenis_id'], $_POST['fname'], $_POST['tgl_lahir'], $_POST['alamat'], $_POST['no_tlp'], $_POST['pekerjaan'], $_POST['jk'], $_POST['gambar'], $_POST['id']);
    header('location:../table-user.php?edit=success');
} elseif ($action == "delete") {
    $id = $_GET['id'];
    $koneksi->delete_data($id);
    header('location:../table-user.php?remove=success');
}
