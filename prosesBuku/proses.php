<?php
include 'config.php';

if ($_GET['act'] == 'tambahuser') {
    $id_buku = $_POST['id_buku'];
    $no_pustaka = $_POST['no_pustaka'];
    $no_rak = $_POST['no_rak'];
    $judulBuku = $_POST['judulBuku'];
    $kategori = $_POST['kategori'];
    $author = $_POST['author'];
    $penerbit = $_POST['penerbit'];
    $thn_terbit = $_POST['thn_terbit'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tblbuku VALUES('$id_buku' , '$no_pustaka' , '$no_rak' , '$judulBuku', '$kategori', '$author', '$penerbit', '$thn_terbit', '$tgl_masuk', '$stok', '$gambar')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../table-book.php?create=success");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateuser') {
    $no_pustaka = $_POST['no_pustaka'];
    $no_rak = $_POST['no_rak'];
    $judulBuku = $_POST['judulBuku'];
    $kategori = $_POST['kategori'];
    $author = $_POST['author'];
    $penerbit = $_POST['penerbit'];
    $thn_terbit = $_POST['thn_terbit'];
    $tgl_masuk = $_POST['tgl_masuk'];
    $stok = $_POST['stok'];
    $gambar = $_POST['gambar'];
    $id_buku = $_POST['id_buku'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tblbuku SET no_pustaka='$no_pustaka' , no_rak='$no_rak' , judulBuku='$judulBuku', kategori='$kategori', author='$author', penerbit='$penerbit', thn_terbit='$thn_terbit', tgl_masuk='$tgl_masuk', stok='$stok', gambar='$gambar' WHERE id_buku='$id_buku' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../table-book.php?edit=success");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $id_buku = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tblbuku WHERE id_buku = '$id_buku'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../table-book.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
