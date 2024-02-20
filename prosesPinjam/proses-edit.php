<?php
include 'config.php';
include 'function.php';

$id_pinjam  = $_POST['id_pinjam'];
$tblbuku    = $_POST['tblbuku'];
$member     = $_POST['member'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_tempo  = $_POST['tgl_tempo'];

$stok = cek_stok($conn, $tblbuku);

if ($stok < 1) {
    $_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses edit gagal!</font>';

    header('Location: ../table-loan.php?id_pinjam=' . $id_pinjam);
    exit();
}

$q = "SELECT tblbuku.judulBuku, tblbuku.id_buku, peminjaman.id_pinjam, peminjaman.no_id FROM peminjaman JOIN tblbuku ON tblbuku.id_buku = peminjaman.id_buku WHERE (peminjaman.id_buku = $tblbuku AND peminjaman.no_id = '$member')";

$hasil_check = mysqli_query($conn, $q);
$data = mysqli_fetch_assoc($hasil_check);



$query = "UPDATE peminjaman SET id_buku = '$tblbuku', no_id = '$member', tgl_pinjam = '$tgl_pinjam', tgl_tempo = '$tgl_tempo' WHERE id_pinjam = '$id_pinjam'";

$hasil = mysqli_query($conn, $query);

if ($hasil == true) {

    kurangi_stok($conn, $tblbuku);

    $_SESSION['messages'] = '<font color="green">Proses edit data sukses!</font>';
    header('Location: ../table-loan.php?edit=success');
} else {
    $_SESSION['messages'] = '<font color="red">Proses edit gagal!</font>';
    header('Location: ../table-loan.php.php?id_pinjam=' . $id_pinjam);
}
