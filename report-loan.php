<?php
session_start();
include "prosesPinjam/config.php";
$query = "SELECT peminjaman.*,peminjaman.id_pinjam as id_pinjama, tblbuku.no_pustaka, tblbuku.judulBuku, tblbuku.gambar, member.fname, (SELECT tgl_kembali from pengembalian JOIN peminjaman on pengembalian.id_pinjam = peminjaman.id_pinjam WHERE pengembalian.id_pinjam = id_pinjama) as tgl_kembali from peminjaman JOIN tblbuku on tblbuku.no_pustaka = peminjaman.no_pustaka JOIN member ON member.no_id = peminjaman.no_id"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
// session start
if (!empty($_SESSION)) {
} else {
    session_start();
}
if (!empty($_SESSION['ADMIN'])) {
} else {
    echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak Peminjaman</title>
    <link rel="icon" type="image/x-icon" href="page/img/favicon/favicon.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- bootstrap data tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <img src="page/img/favicon/android-chrome-192x192.png" width="54" heigth="54"> &nbsp; PUSTAKA SMKN 1 CIBINONG
                                    <small class="float-right mt-3">Date: <?= date('d/m/Y'); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- Table row -->
                        <div class="row mt-3">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Gambar</th>
                                            <th>ISBN</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Tnggal Pengembalian</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
                                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                                        if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                                            while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
                                                $tgl = date('d-m-Y', strtotime($data['id_pinjam']));
                                        ?>
                                                <tr>
                                                    <td><img src="page/img/buku/<?php echo $data['gambar']; ?>" alt="" width="70px" height="110px"></td>
                                                    <td><?php echo $data['no_pustaka']; ?></td>
                                                    <td><?php echo $data['judulBuku']; ?></td>
                                                    <td><?php echo $data['fname']; ?></td>
                                                    <td><?php echo $data['tgl_pinjam']; ?></td>
                                                    <td><?php echo $data['tgl_tempo']; ?></td>
                                                    <td><?php
                                                        if (empty($data['tgl_kembali'])) {
                                                            echo "-";
                                                        } else {
                                                            echo date('d-m-Y', strtotime($data['tgl_kembali']));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php $status = '' ?>
                                                        <?php if (empty($data['tgl_kembali'])) : ?>
                                                            Loaned
                                                            <?php $status = 'Loaned' ?>
                                                        <?php else : ?>
                                                            Returned
                                                            <?php $status = 'Returned' ?>
                                                        <?php endif ?>

                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        } else { // Jika data tidak ada
                                            echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>ISBN</th>
                                            <th>Judul Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jatuh Tempo</th>
                                            <th>Tnggal Pengembalian</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="table-loan.php" class="btn btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6caa588078.js" crossorigin="anonymous"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- data tables -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>