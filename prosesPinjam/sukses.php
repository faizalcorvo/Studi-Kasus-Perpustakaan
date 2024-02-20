<?php
include 'config.php';
include 'function.php';
$id_pinjama = $_GET['id_pinjama'];

$q = "SELECT member.fname, tblbuku.*, peminjaman.* FROM peminjaman LEFT JOIN tblbuku ON peminjaman.no_pustaka = tblbuku.no_pustaka LEFT JOIN member ON peminjaman.no_id = member.no_id WHERE peminjaman.id_pinjam = $id_pinjama";

$hasil = mysqli_query($conn, $q);
$data_pinjam = mysqli_fetch_assoc($hasil);
$tgl_kembali = date('Y-m-d');

$denda = hitung_denda($tgl_kembali, $data_pinjam['tgl_tempo']);
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
    <title>Library Management System SMKN 1 Cibinong</title>
    <link rel="icon" type="image/x-icon" href="../page/img/favicon/favicon.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- User Account Menu -->
                <li class="nav-item dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="../page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <!-- <span class="hidden-xs"><?php echo $_SESSION['ADMIN']['nama_pengguna']; ?></span> -->
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header bg-dark mb-2">
                            <img src="../page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION['ADMIN']['nama_pengguna']; ?><br>
                                <small class="hidden-xs"><?php echo $_SESSION['ADMIN']['role']; ?></small>
                                <small>Today Login : <?= date("d F Y"); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer mt-3">
                            <div class="float-start">
                                <a href="../profil.php?hal=profil" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="float-end">
                                <a href="../prosesLogin/proseslog.php?aksi=logout" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../prosesLogin/proseslog.php?aksi=logout" role="button">
                        <i class="fas fa-solid fa-arrow-right-from-bracket"></i>&nbsp; Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="../page/img/smk.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMKN 1 CIBINONG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">

                        <img src="../page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?php echo $_SESSION['ADMIN']['nama_pengguna']; ?>
                            <small class="d-block"><?php echo $_SESSION['ADMIN']['role']; ?></small>
                        </a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../index.php" class="nav-link">
                                        <i class="fas fa-tachometer-alt nav-icon"></i>
                                        <p>Dashboard</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-id-card nav-icon"></i>
                                <p>
                                    Manage User Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="../table-user.php" class="nav-link">
                                        <i class="fa-solid fa-id-card nav-icon"></i>
                                        <p>Manage User</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="../table-book.php" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>
                                    Manage Book
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../table-loan.php" class="nav-link">
                                <i class="nav-icon fas fa-book-reader"></i>
                                <p>
                                    Loan Book
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../table-return.php" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>
                                    Returned Book
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../profil.php?hal=profil" class="nav-link">
                                <i class="nav-icon fa fa-user-circle"></i>
                                <p>
                                    Profile
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Manage Returned Tables</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Returned Tables</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Return Process</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <h5>Pengembalian Data Peminjaman</h5>
                                <form action="proses-loan.php" method="POST">
                                    <input type="hidden" name="id_pinjam" value="<?php echo $data_pinjam['id_pinjam'] ?>">
                                    <input type="hidden" name="tgl_kembali" value="<?php echo $tgl_kembali ?>">
                                    <input type="hidden" name="denda" value="<?php echo $denda ?>">

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Judul Buku</span>
                                        <input type="text" value="<?php echo $data_pinjam['judulBuku'] ?>" disabled name="tblbuku" required class="form-control" placeholder="Domisili" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Peminjam</span>
                                        <input type="text" value="<?php echo $data_pinjam['fname'] ?>" disabled name="member" required class="form-control" placeholder="Domisili" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Tanggal Peminjaman</span>
                                        <input type="date" value="<?php echo $data_pinjam['tgl_pinjam'] ?>" disabled name="tgl_pinjam" required class="form-control" placeholder="Usia" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Tanggal Harus Kembali</span>
                                        <input type="date" value="<?php echo $data_pinjam['tgl_tempo'] ?>" disabled name="tgl_tempo" required class="form-control" placeholder="Usia" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Tanggal Kembali</span>
                                        <input type="date" value="<?php echo $tgl_kembali ?>" disabled required class="form-control" placeholder="Usia" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">Denda</span>
                                        <input type="text" value="<?php echo $denda ?>" disabled required class="form-control" placeholder="denda" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-3">
                                            <input class="btn btn-primary me-2" type="submit" value="Selesai">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <strong>Copyright &copy; <?= date('Y'); ?> <a href="">PerpusSMKN</a>.</strong> All rights reserved.
                        </div>
                    </div>
                    <!-- /.card -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y'); ?> <a href="">PerpusSMKN</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6caa588078.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../assets/dist/js/adminlte.min.js"></script>
</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah peminjaman</title>
</head>

<body>


</body>

</html>