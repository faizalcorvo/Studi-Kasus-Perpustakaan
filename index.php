<?php
// session start
if (!empty($_SESSION)) {
} else {
  session_start();
}
require 'prosesLogin/conlog.php';
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
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
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
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <?php
      if (!empty($_GET['hal'])) {
        if (!empty($_SESSION['ADMIN'])) {
          if (!empty($_GET['file'])) {
            if (file_exists('views/' . strip_tags($_GET['hal']) . '/' . strip_tags($_GET['file']) . '.php')) {
              include 'views/' . strip_tags($_GET['hal']) . '/' . strip_tags($_GET['file']) . '.php';
            }
          } else {
            if (file_exists('views/' . strip_tags($_GET['hal']) . '/index.php')) {
              include 'views/' . strip_tags($_GET['hal']) . '/index.php';
            }
          }
        } else {
          echo '<script>alert("Maaf Login Dahulu !");window.location="login.php"</script>';
        }
      } else {
        include 'views/home/index.php';
      }
      ?>
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info bg-c-blue">
                <div class="inner">
                  <?php
                  require 'prosesPinjam/config.php';
                  $query = "SELECT id FROM member ORDER BY id";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h3>' . $row . '</h3>';
                  ?>
                  <p>User Count</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="table-user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success bg-c-green">
                <div class="inner">
                  <?php
                  require 'prosesPinjam/config.php';
                  $query = "SELECT id_buku FROM tblbuku ORDER BY id_buku";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h3>' . $row . '</h3>';
                  ?>
                  <p>Book Count</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="table-book.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning bg-c-yellow">
                <div class="inner">
                  <?php
                  require 'prosesPinjam/config.php';
                  $query = "SELECT id_pinjam FROM peminjaman ORDER BY id_pinjam";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h3>' . $row . '</h3>';
                  ?>
                  <p>Loan Count</p>
                </div>
                <div class="icon">
                  <i class="fa fa-refresh f-left"></i>
                </div>
                <a href="table-loan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger bg-c-pink">
                <div class="inner">
                  <?php
                  require 'prosesPinjam/config.php';
                  $query = "SELECT id_kembali FROM pengembalian ORDER BY id_kembali";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h3>' . $row . '</h3>';
                  ?>
                  <p>Returned Count</p>
                </div>
                <div class="icon">
                  <i class="fas fa-clipboard-check"></i>
                  <i class="fas fa-box-check    "></i>
                </div>
                <a href="table-return.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Report</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="m-0">Report</h5>
                </div>
                <div class="card-body">
                  <h6 class="card-title">Special title treatment</h6>

                  <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <!-- /.col-md-6 -->
          </div>
          <!-- /.row -->
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
  <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
  <script src="https://kit.fontawesome.com/6caa588078.js" crossorigin="anonymous"></script>
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>