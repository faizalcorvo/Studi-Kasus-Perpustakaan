<?php
session_start();

include 'config.php';
include 'function.php';

$id_pinjam = $_GET['id_pinjam'];
$status   = $_GET['status'];
$id_buku   = $_GET['no_pustaka'];


$stok_buku = cek_stok($conn, $id_buku);

if ($stok_buku < 1) {
    $_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('Location: ../table-loan.php');
    exit();
}

if ($status == 'Loaned') {
    tambah_stok($conn, $id_buku);
}

$query = "DELETE FROM peminjaman WHERE id_pinjam = $id_pinjam";
$hasil = mysqli_query($conn, $query);

if ($hasil == true) {
    $_SESSION['messages'] = '<font color="green">Hapus data sukses!</font>';
    header('location: ../table-loan.php?remove=success');
} else {
    $_SESSION['messages'] = '<font color="red">Hapus data gagal!</font>';
    header('location: ../table-loan.php');
}
