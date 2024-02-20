<?php
session_start();
include('prosesBuku/config.php');

require 'prosesPinjam/config.php';
$query = "SELECT * FROM tblbuku";
$query_run = mysqli_query($conn, $query);
$row = mysqli_num_rows($query_run);
// ambil data peminjaman 
$query = "SELECT * FROM peminjaman";
$query_run = mysqli_query($conn, $query);
$row1 = mysqli_num_rows($query_run);
// ambil data pengembalian 
$query = "SELECT * FROM pengembalian";
$query_run = mysqli_query($conn, $query);
$row2 = mysqli_num_rows($query_run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Library Management System SMKN 1 Cibinong</title>
    <link rel="icon" type="image/x-icon" href="page/img/favicon/favicon.ico" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="page/css/card.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <?php if (!empty($_SESSION['ADMIN'])) { ?>
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
                            <img src="page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <!-- <span class="hidden-xs"><?php echo $_SESSION['ADMIN']['nama_pengguna']; ?></span> -->
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header bg-dark mb-2">
                                <img src="page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $_SESSION['ADMIN']['nama_pengguna']; ?><br>
                                    <small class="hidden-xs"><?php echo $_SESSION['ADMIN']['role']; ?></small>
                                    <small>Today Login : <?= date("d F Y"); ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer mt-3">
                                <div class="float-start">
                                    <a href="profil.php?hal=profil" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="float-end">
                                    <a href="prosesLogin/proseslog.php?aksi=logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="prosesLogin/proseslog.php?aksi=logout" role="button">
                            <i class="fas fa-solid fa-arrow-right-from-bracket"></i>&nbsp; Logout
                        </a>
                    </li>
                <?php } else { ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index.php" class="nav-link">Home</a>
                        </li>
                    </ul>
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
                        <li class="nav-item">
                            <a class="nav-link" href="login.php" role="button">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp; Login Here
                            </a>
                        </li>
                    </ul>
                <?php } ?>
                </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="page/img/smk.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMKN 1 CIBINONG</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <?php if (!empty($_SESSION['ADMIN'])) { ?>
                        <div class="image">

                            <img src="page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block"> <?php echo $_SESSION['ADMIN']['nama_pengguna']; ?>
                                <small class="d-block"><?php echo $_SESSION['ADMIN']['role']; ?></small>
                            </a>
                        </div>
                    <?php } else { ?>
                        <div class="image">
                            <img src="page/img/smk.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">SELAMAT DATANG
                                <small class="d-block">DI PUSTAKA SMKN 1 CIBINONG</small>
                            </a>
                        </div>
                    <?php } ?>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                        <?php if (!empty($_SESSION['ADMIN'])) { ?>
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
                                        <a href="index.php" class="nav-link">
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
                                        <a href="table-user.php" class="nav-link">
                                            <i class="fa-solid fa-id-card nav-icon"></i>
                                            <p>Manage User</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="table-book.php" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>
                                        Manage Book
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="table-loan.php" class="nav-link">
                                    <i class="nav-icon fas fa-book-reader"></i>
                                    <p>
                                        Loan Book
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="table-return.php" class="nav-link">
                                    <i class="nav-icon fas fa-clipboard-check"></i>
                                    <p>
                                        Returned Book
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="profil.php?hal=profil" class="nav-link">
                                    <i class="nav-icon fa fa-user-circle"></i>
                                    <p>
                                        Profile
                                    </p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="index.php" class="nav-link">
                                    <i class="fas fa-tachometer-alt nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="data-buku.php" class="nav-link">
                                    <i class="fas fa-book nav-icon"></i>
                                    <p>
                                        Listed Book
                                    </p>
                                </a>
                            </li>
                        <?php } ?>

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
                            <h1 class="m-0">Library Listed</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Library Listed</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="card bg-primary text-center p-2">
                            <h3>Total Buku: <?= $row; ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-info text-center p-2">
                            <h3>Total Dipinjam: <?= $row1; ?></h3>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card bg-success text-center p-2">
                            <h3>Total Kembali: <?= $row2; ?></h3>
                        </div>
                    </div>
                </div>
                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body pb-0">
                        <div class="row">
                            <?php
                            $no = 1;
                            $queryview = mysqli_query($koneksi, "SELECT * FROM tblbuku");
                            while ($data = mysqli_fetch_assoc($queryview)) {
                            ?>
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">
                                            Listed Books <?php echo $data['no_rak']; ?>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b><?php echo $data['judulBuku']; ?></b></h2>
                                                    <p class="text-muted text-sm">
                                                        <b>Category: </b> <?php echo $data['kategori']; ?><br>
                                                        <b>Author: </b> <?php echo $data['author']; ?>
                                                    </p>
                                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                                        <li class="small"><span class="fa-li"><i class="fa fa-list-alt"></i> </span> Library: <?php echo $data['no_pustaka']; ?></li>
                                                        <li class="small"><span class="fa-li"><i class="fa fa-pencil"></i></span> Publisher: <?php echo $data['penerbit']; ?></li>
                                                        <li class="small"><span class="fa-li"><i class="fa fa-calendar"></i> </span> Publication: <?php echo $data['thn_terbit']; ?></li>
                                                    </ul>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="page/img/buku/<?php echo $data['gambar']; ?>" alt="user-avatar" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
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
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
    <script src="https://kit.fontawesome.com/6caa588078.js" crossorigin="anonymous"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>