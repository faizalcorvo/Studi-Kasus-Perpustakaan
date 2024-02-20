<?php
include 'config.php';
include 'function.php';

$id_pinjam = $_POST['id_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$denda = $_POST['denda'];


$query = "INSERT INTO pengembalian (id_pinjam, tgl_kembali, denda) VALUES ($id_pinjam, '$tgl_kembali', $denda)";

$hasil = mysqli_query($conn, $query);
if ($hasil == true) {
    // ambil buku_id berdasarkan pinjam_id
    $q = "SELECT tblbuku.no_pustaka FROM tblbuku JOIN peminjaman ON tblbuku.no_pustaka = peminjaman.no_pustaka WHERE peminjaman.id_pinjam = $id_pinjam";
    $hasil = mysqli_query($conn, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $id_buku = $hasil['no_pustaka'];

    tambah_stok($conn, $id_buku);
    // tambah stok

    $_SESSION['messages'] = '<font color="green">Pengembalian buku sukses!</font>';
    header('Location: ../table-loan.php?notif=success');
} else {
    header('Location: ../table-book.php' . $id_pinjaman);
}
