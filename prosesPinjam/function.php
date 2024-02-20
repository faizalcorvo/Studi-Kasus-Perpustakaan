<?php

function hitung_denda($tgl_kembali, $tgl_tempo)
{
    if (strtotime($tgl_kembali) > strtotime($tgl_tempo)) {
        $kembali = new DateTime($tgl_kembali);
        $jatuh_tempo   = new DateTime($tgl_tempo);

        $selisih = $kembali->diff($jatuh_tempo);
        $selisih = $selisih->format('%d');

        $denda = 2000 * $selisih;
    } else {
        $denda = 0;
    }

    return $denda;
}

function cek_stok($conn, $no_pustaka)
{
    $q = "SELECT stok FROM tblbuku WHERE no_pustaka = $no_pustaka";
    $hasil = mysqli_query($conn, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $stok = $hasil['stok'];

    return $stok;
}

function kurangi_stok($conn, $no_pustaka)
{
    $q = "UPDATE tblbuku SET stok = stok - 1 WHERE no_pustaka = $no_pustaka";
    mysqli_query($conn, $q);
}

function tambah_stok($conn, $no_pustaka)
{
    $q = "UPDATE tblbuku SET stok = stok + 1 WHERE no_pustaka = $no_pustaka";
    mysqli_query($conn, $q);
}
