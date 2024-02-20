<?php
include 'prosesMember/config.php';
$db = new config();
$id = $_GET['id'];
if (!is_null($id)) {
    $data = $db->get_by_id($id);
} else {
    header('location:table-user.php');
}
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
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0.0/css/all.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
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
                            <h1 class="m-0">Member Edit Settings</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Member Edit Settings</li>
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
                        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
                        <div class="container">
                            <div class="row flex-lg-nowrap">
                                <div class="col">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <?php if (!empty($_GET['notif'])) { ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <i class="fa fa-check"></i>
                                                    <strong> Update Member Success !</strong>
                                                </div>
                                            <?php } ?>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 col-sm-auto mb-3">
                                                            <div class="mx-auto" style="width: 140px;">
                                                                <div style="height: 140px; background-color: rgb(233, 236, 239);">
                                                                    <img src="page/img/avatars/<?php echo $data['gambar']; ?>" alt="" class=" img rounded" width="140" height="140">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $data['fname']; ?>
                                                                </h4>
                                                                <p class="mb-0"><?php echo $data['tgl_lahir']; ?></p>
                                                                <div class="text-muted"><small><?php echo $data['jenis_id']; ?></small></div>
                                                                <div class="mt-2">
                                                                    <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalViewData<?php echo $data['id']; ?>"><i class="bi bi-eye"></i>&nbsp;
                                                                        Details
                                                                    </button>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="modalViewData<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
                                                                        <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header bg-primary">
                                                                                    <h5 class="modal-title fw-bold text-white" id="modalViewLabel">
                                                                                        <i class="fas fa-id-card-alt"></i>&nbsp; VIEW MEMBER CARD
                                                                                    </h5>
                                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <center align="center">
                                                                                        <td colspan="2"><img src="page/img/avatars/<?php echo $data['gambar']; ?>" width="40%" class="img-fluid rounded"></td>
                                                                                    </center>
                                                                                    <hr>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            ID Membership <br />
                                                                                            Membership <br />
                                                                                            Nama Lengkap <br />
                                                                                            Tanggal Lahir <br />
                                                                                            Alamat <br />
                                                                                            No. Telepon <br />
                                                                                            Pekerjaan <br />
                                                                                            Jenis Kelamin
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            : &nbsp; <?php echo $data['no_id']; ?><br />
                                                                                            : &nbsp; <?php echo $data['jenis_id']; ?><br />
                                                                                            : &nbsp; <?php echo $data['fname']; ?><br />
                                                                                            : &nbsp; <?php echo $data['tgl_lahir']; ?><br />
                                                                                            : &nbsp; <?php echo $data['alamat']; ?><br />
                                                                                            : &nbsp; <?php echo $data['no_tlp']; ?><br />
                                                                                            : &nbsp; <?php echo $data['pekerjaan']; ?><br />
                                                                                            : &nbsp; <?php echo $data['jk']; ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Close</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
                                                            <form method="post" action="prosesMember/prosesedit.php?action=update" class="form">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>ID Indetitas</label>
                                                                                    <input type="number" value="<?php echo $data['no_id']; ?>" required class="form-control" name="no_id">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div>
                                                                                    <label class="form-label">Membership</label>
                                                                                </div>
                                                                                <select class="form-select mb-3 " name="jenis_id" id="jenis_id" required>
                                                                                    <option disabled selected value>Membership</option>
                                                                                    <option value="Member" <?php if ($data['jenis_id'] == 'Member') { ?> selected='' <?php } ?>>Member</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label>Nama Lengkap</label>
                                                                                    <input type="text" value="<?php echo $data['fname']; ?>" required class="form-control" name="fname">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label>Tanggal Lahir</label>
                                                                                    <input type="date" value="<?php echo $data['tgl_lahir']; ?>" required class="form-control" name="tgl_lahir">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <div class="mt-2 me-2">
                                                                                        <label class="form-label">Jenis Kelamin</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline">
                                                                                        <input type="radio" name="jk" value="Laki - Laki" class="form-check-input" <?php if ($data['jk'] == 'Laki - Laki') echo 'checked' ?> required>
                                                                                        <label class="form-check-label">Laki - Laki</label>
                                                                                    </div>
                                                                                    <div class="form-check form-check-inline ms-3">
                                                                                        <input type="radio" name="jk" value="Perempuan" class="form-check-input" <?php if ($data['jk'] == 'Perempuan') echo 'checked' ?> required>
                                                                                        <label class="form-check-label">Perempuan</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <div class="form-group">
                                                                                    <label>Alamat</label>
                                                                                    <textarea name="alamat" class="form-control" required><?php echo $data['alamat']; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>No. Telepon</label>
                                                                            <input type="text" value="<?php echo $data['no_tlp']; ?>" required class="form-control" name="no_tlp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label>Pekerjaan</label>
                                                                            <input type="text" value="<?php echo $data['pekerjaan'] ?>" required class="form-control" name="pekerjaan">
                                                                            <input type="hidden" value="<?php echo $data['id']; ?>" class="form-control" name="id">
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
                                                                        <input class="btn btn-primary" type="submit" name="simpan" value="Save Changes">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 mb-3">
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="px-xl-3">
                                                        <button type="button" class="btn btn-success btn-block" data-bs-toggle="modal" data-bs-target="#modalViewCardData<?php echo $data['id']; ?>"><i class="bi bi-info-circle-fill"></i>&nbsp;
                                                            View Card
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal View-->
                                            <div class="modal fade" id="modalViewCardData<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title fw-bold text-white" id="modalViewLabel">
                                                                <i class="fas fa-id-card-alt"></i>&nbsp; VIEW MEMBER CARD
                                                            </h5>
                                                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
                                                                        <tr align="center">
                                                                            <td colspan="2"><img src="page/img/avatars/<?php echo $data['gambar']; ?>" width="50%"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">ID Membership</th>
                                                                            <td width="60%"><?php echo $data['no_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Membership</th>
                                                                            <td width="60%"><?php echo $data['jenis_id']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Nama Lengkap</th>
                                                                            <td width="60%"><?php echo $data['fname']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Tanggal Lahir</th>
                                                                            <td width="60%"><?php echo $data['tgl_lahir']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Alamat</th>
                                                                            <td width="60%"><?php echo $data['alamat']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">No. Telepon</th>
                                                                            <td width="60%"><?php echo $data['no_tlp']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Pekerjaan</th>
                                                                            <td width="60%"><?php echo $data['pekerjaan']; ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%">Jenis Kelamin</th>
                                                                            <td width="60%"><?php echo $data['jk']; ?></td>
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
                                            <div class="card mb-3">
                                                <div class="card-body">
                                                    <div class="px-xl-3">
                                                        <a href="table-user.php" class="btn btn-block btn-danger">
                                                            <i class="fa fa-arrow-circle-left"></i>
                                                            <span>Back</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>