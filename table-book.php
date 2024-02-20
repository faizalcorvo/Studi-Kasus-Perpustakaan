<?php
include 'prosesBuku/config.php';
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
    <link rel="icon" type="image/x-icon" href="page/img/favicon/favicon.ico" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                    <div class="image">

                        <img src="page/img/avatars/<?php echo $_SESSION['ADMIN']['gambar']; ?>" class="img-circle elevation-2" alt="User Image">
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
                            <h1 class="m-0">Manage Book Tables</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage Book Tables</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php if (!empty($_GET['create'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <i class="fa fa-check"></i>
                                <strong> Create Success !</strong>
                            </div>
                        <?php } ?>
                        <?php if (!empty($_GET['edit'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <i class="fa fa-check"></i>
                                <strong> Update Success !</strong>
                            </div>
                        <?php } ?>
                        <?php if (!empty($_GET['remove'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <i class="fa fa-check"></i>
                                <strong> Remove Success !</strong>
                            </div>
                        <?php } ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</button>
                            </div>
                            <!-- Modal Add start-->
                            <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title text-center text-white" id="myModalLabel">
                                                <i class="fa fa-plus"></i> &nbsp; Create Book Record
                                            </h5>
                                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Plese Insert Form.</p>
                                            <form action="prosesBuku/proses.php?act=tambahuser" method="post" class="row g-3">
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="no_pustaka">ISBN</label>
                                                    <input class="form-control" id="no_pustaka" type="number" name="no_pustaka" placeholder="2022000" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <div>
                                                        <label class="form-label">Category</label>
                                                    </div>
                                                    <select class="form-select mb-3" name="kategori" id="kategori" required>
                                                        <option disabled selected value>Select Category</option>
                                                        <option value="Biography">Biography</option>
                                                        <option value="Computers & Tech">Computer & Tech</option>
                                                        <option value="Fiction">Fiction</option>
                                                        <option value="Geography">Geography</option>
                                                        <option value="History">History</option>
                                                        <option value="Horror">Horror</option>
                                                        <option value="Language">Language</option>
                                                        <option value="Magazine">Magazine</option>
                                                        <option value="Manga">Manga</option>
                                                        <option value="Mystery">Mystery</option>
                                                        <option value="Novel">Novel</option>
                                                        <option value="Nonfiction">Nonfiction</option>
                                                        <option value="Philosophy & Psychology">Philosophy & Psychology</option>
                                                        <option value="Religion">Religion</option>
                                                        <option value="Romance">Romance</option>
                                                        <option value="Literature">Literature</option>
                                                        <option value="Science">Science</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="no_rak">No. Rak</label>
                                                    <input class="form-control" id="no_rak" type="number" name="no_rak" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="stok">Stok Buku</label>
                                                    <input class="form-control" id="stok" type="number" name="stok" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="judulBuku">Judul Buku</label>
                                                    <input class="form-control" id="judulBuku" type="text" name="judulBuku" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="author">Author</label>
                                                    <input class="form-control" id="author" type="text" name="author" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="penerbit">Publishier</label>
                                                    <input class="form-control" id="penerbit" type="text" name="penerbit" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="thn_terbit">Tahun Terbit</label>
                                                    <input class="form-control" id="thn_terbit" type="date" name="thn_terbit" required>
                                                </div>
                                                <div class="form-group mb-3 col-md-6">
                                                    <label class="form-label" for="tgl_masuk">Tanggal Masuk</label>
                                                    <input class="form-control" id="tgl_masuk" type="date" name="tgl_masuk" required>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <div class="form-group mb-3">
                                                        <label for="gambar" class="form-label">Gambar</label>
                                                        <input class="form-control form-control" id="gambar" name="gambar" type="file">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger" type="submit" data-bs-dismiss="modal">Close</button>
                                                    <input class="btn btn-primary" type="submit" name="simpan" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Book</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ISBN</th>
                                            <th>Rak</th>
                                            <th>Judul</th>
                                            <th>Category</th>
                                            <th>Tahun Terbit</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $queryview = mysqli_query($koneksi, "SELECT * FROM tblbuku");
                                        while ($data = mysqli_fetch_assoc($queryview)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['no_pustaka']; ?></td>
                                                <td><?php echo $data['no_rak']; ?></td>
                                                <td><?php echo $data['judulBuku']; ?></td>
                                                <td><?php echo $data['kategori']; ?></td>
                                                <td><?php echo $data['thn_terbit']; ?></td>
                                                <td><?php echo $data['tgl_masuk']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalViewData<?php echo $data['id_buku']; ?>"><i class="bi bi-info-circle-fill"></i>
                                                    </button>
                                                    <!-- Modal View-->
                                                    <div class="modal fade" id="modalViewData<?php echo $data['id_buku']; ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h5 class="modal-title fw-bold text-white" id="modalViewLabel">
                                                                        <i class="fa fa-book"></i> &nbsp; DETAIL BUKU
                                                                    </h5>
                                                                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <tr align="center">
                                                                                    <td colspan="2"><img src="page/img/buku/<?php echo $data['gambar']; ?>" width="50%"></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">ISBN</th>
                                                                                    <td width="60%"><?php echo $data['no_pustaka']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">No. Rak</th>
                                                                                    <td width="60%"><?php echo $data['no_rak']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Judul Buku</th>
                                                                                    <td width="60%"><?php echo $data['judulBuku']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Category</th>
                                                                                    <td width="60%"><?php echo $data['kategori']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Author</th>
                                                                                    <td width="60%"><?php echo $data['author']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Publisher</th>
                                                                                    <td width="60%"><?php echo $data['penerbit']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Tahun Terbit</th>
                                                                                    <td width="60%"><?php echo $data['thn_terbit']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Tanggal Masuk</th>
                                                                                    <td width="60%"><?php echo $data['tgl_masuk']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th width="40%">Stok</th>
                                                                                    <td width="60%"><?php echo $data['stok']; ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updateuser<?php echo $data['id_buku']; ?>"><i class="fa fa-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser<?php echo $data['id_buku']; ?>"><i class="fa fa-trash"></i></a>
                                                    <!-- modal delete -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteuser<?php echo $data['id_buku']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i> Apakah anda yakin ingin menghapus data ini<strong><span class="grt"></span></strong> ?
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-auto mb-3">
                                                                            <div class="mx-auto" style="width: 140px;">
                                                                                <div style="height: 200px; background-color: rgb(233, 236, 239);">
                                                                                    <img src="page/img/buku/<?php echo $data['gambar']; ?>" alt="" class=" img rounded" width="140" height="200">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                                <h5 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $data['judulBuku']; ?>
                                                                                </h5>
                                                                                <p class="mb-0"><?php echo $data['author']; ?></p>
                                                                                <p class="mb-0"><?php echo $data['penerbit']; ?></p>
                                                                                <p class="mb-0"><?php echo $data['kategori']; ?></p>
                                                                                <div class="text-muted"><small><?php echo $data['thn_terbit']; ?></small></div>
                                                                            </div>
                                                                            <div class="text-center text-sm-right">
                                                                                <div class="text-muted"><small><?= date('d F Y'); ?></small></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                                                    <a href="prosesBuku/proses.php?act=deleteuser&id=<?php echo $data['id_buku']; ?>" class="btn btn-primary">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- modal delete -->
                                                    <!-- Modal edit start-->
                                                    <div class="modal fade" role="dialog" tabindex="-1" id="updateuser<?php echo $data['id_buku']; ?>">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"><i class="fa fa-book"></i> Edit Book</h5>
                                                                    <button type="button" class="close" data-dismiss="modal">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="py-1">
                                                                        <div class="row">
                                                                            <div class="container">
                                                                                <div class="row flex-lg-nowrap">
                                                                                    <div class="col">
                                                                                        <div class="row">
                                                                                            <div class="col mb-3">
                                                                                                <div class="card">
                                                                                                    <div class="card-body">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 col-sm-auto mb-3">
                                                                                                                <div class="mx-auto" style="width: 140px;">
                                                                                                                    <div style="height: 200px; background-color: rgb(233, 236, 239);">
                                                                                                                        <img src="page/img/buku/<?php echo $data['gambar']; ?>" alt="" class=" img rounded" width="140" height="200">
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                                                                                <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                                                                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $data['judulBuku']; ?>
                                                                                                                    </h4>
                                                                                                                    <p class="mb-0"><?php echo $data['author']; ?></p>
                                                                                                                    <p class="mb-0"><?php echo $data['penerbit']; ?></p>
                                                                                                                    <p class="mb-0"><?php echo $data['kategori']; ?></p>
                                                                                                                    <div class="text-muted"><small><?php echo $data['thn_terbit']; ?></small></div>
                                                                                                                </div>
                                                                                                                <div class="text-center text-sm-right">
                                                                                                                    <div class="text-muted"><small><?= date('d F Y'); ?></small></div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <ul class="nav nav-tabs">
                                                                                                            <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                                                                                        </ul>
                                                                                                        <div class="tab-content pt-3">
                                                                                                            <div class="tab-pane active">
                                                                                                                <form method="post" action="prosesBuku/proses.php?act=updateuser" class="form">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col">
                                                                                                                            <div class="row">
                                                                                                                                <div class="col">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>ISBN</label>
                                                                                                                                        <input type="number" value="<?php echo $data['no_pustaka']; ?>" required class="form-control" name="no_pustaka">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col">
                                                                                                                                    <div>
                                                                                                                                        <label class="form-label">Category</label>
                                                                                                                                    </div>
                                                                                                                                    <select class="form-select select2 mb-3 " name="kategori" id="kategori" required>
                                                                                                                                        <option disabled selected value>Select Category</option>
                                                                                                                                        <option value="Biography" <?php if ($data['kategori'] == 'Biography') { ?> selected='' <?php } ?>>Biography</option>
                                                                                                                                        <option value="Computers & Tech" <?php if ($data['kategori'] == 'Computers & Tech') { ?> selected='' <?php } ?>>Computer & Tech</option>
                                                                                                                                        <option value="Fiction" <?php if ($data['kategori'] == 'Fiction') { ?> selected='' <?php } ?>>Fiction</option>
                                                                                                                                        <option value="Geography" <?php if ($data['kategori'] == 'Geography') { ?> selected='' <?php } ?>>Geography</option>
                                                                                                                                        <option value="History" <?php if ($data['kategori'] == 'History') { ?> selected='' <?php } ?>>History</option>
                                                                                                                                        <option value="Horror" <?php if ($data['kategori'] == 'Horror') { ?> selected='' <?php } ?>>Horror</option>
                                                                                                                                        <option value="Language" <?php if ($data['kategori'] == 'Language') { ?> selected='' <?php } ?>>Language</option>
                                                                                                                                        <option value="Magazine" <?php if ($data['kategori'] == 'Magazine') { ?> selected='' <?php } ?>>Magazine</option>
                                                                                                                                        <option value="Manga" <?php if ($data['kategori'] == 'Manga') { ?> selected='' <?php } ?>>Manga</option>
                                                                                                                                        <option value="Mystery" <?php if ($data['kategori'] == 'Mystery') { ?> selected='' <?php } ?>>Mystery</option>
                                                                                                                                        <option value="Novel" <?php if ($data['kategori'] == 'Novel') { ?> selected='' <?php } ?>>Novel</option>
                                                                                                                                        <option value="Nonfiction" <?php if ($data['kategori'] == 'Nonfiction') { ?> selected='' <?php } ?>>Nonfiction</option>
                                                                                                                                        <option value="Philosophy & Psychology" <?php if ($data['kategori'] == 'Philosophy & Psychology') { ?> selected='' <?php } ?>>Philosophy & Psychology</option>
                                                                                                                                        <option value="Religion" <?php if ($data['kategori'] == 'Religion') { ?> selected='' <?php } ?>>Religion</option>
                                                                                                                                        <option value="Romance" <?php if ($data['kategori'] == 'Romance') { ?> selected='' <?php } ?>>Romance</option>
                                                                                                                                        <option value="Literature" <?php if ($data['kategori'] == 'Literature') { ?> selected='' <?php } ?>>Literature</option>
                                                                                                                                        <option value="Science" <?php if ($data['kategori'] == 'Science') { ?> selected='' <?php } ?>>Science</option>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>No. Rak</label>
                                                                                                                                        <input type="number" value="<?php echo $data['no_rak']; ?>" required class="form-control" name="no_rak">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>Stok</label>
                                                                                                                                        <input type="number" value="<?php echo $data['stok']; ?>" required class="form-control" name="stok">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>Judul Buku</label>
                                                                                                                                        <input type="text" value="<?php echo $data['judulBuku']; ?>" required class="form-control" name="judulBuku">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-6">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>Author</label>
                                                                                                                                        <input type="text" value="<?php echo $data['author']; ?>" required class="form-control" name="author">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-6">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>Publisher</label>
                                                                                                                                        <input type="text" value="<?php echo $data['penerbit'] ?>" required class="form-control" name="penerbit">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <div class="col-sm-6">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <label>Tahun Terbit</label>
                                                                                                                                        <input type="date" value="<?php echo $data['thn_terbit']; ?>" required class="form-control" name="thn_terbit">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="col-sm-6">
                                                                                                                                    <div class="form-group">
                                                                                                                                        <div class="form-group">
                                                                                                                                            <label>Tanggal Masuk</label>
                                                                                                                                            <input type="date" value="<?php echo $data['tgl_masuk']; ?>" required class="form-control" name="tgl_masuk">
                                                                                                                                            <input type="hidden" value="<?php echo $data['id_buku']; ?>" class="form-control" name="id_buku">
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col mb-3">
                                                                                                                            <div class="form-group">
                                                                                                                                <label></label>
                                                                                                                                <input type="file" name="gambar" class="form-control" required>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="row">
                                                                                                                        <div class="col d-flex justify-content-end">
                                                                                                                            <button id="noedit" type="button" class="btn btn-danger me-2" data-dismiss="modal">Batal</button>
                                                                                                                            <input class="btn btn-primary" type="submit" name="submit" value="Save Changes">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end edit modal  -->
                                                    <a href="report-buku.php" rel="noopener" target="_blank" class="btn btn-default btn-sm"><i class="fas fa-print"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ISBN</th>
                                            <th>Rak</th>
                                            <th>Judul</th>
                                            <th>Category</th>
                                            <th>Tahun Terbit</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/6caa588078.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- Datatables  -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.min.js"></script>
    <script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "excel", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>