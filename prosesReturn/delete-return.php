<?php

include '../prosesPinjam/config.php';

$id_kembali = $_GET['id_kembali'];

$query = "DELETE FROM pengembalian WHERE id_kembali = $id_kembali";
$hasil = mysqli_query($conn, $query);

header('location: ../table-return.php?remove=success');
