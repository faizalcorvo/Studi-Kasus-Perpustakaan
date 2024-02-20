<?php
include 'prosesMember/config.php';
$db = new config();
$data_member = $db->tampil_data();
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
                            <h1 class="m-0">Manage User Tables</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Manage User Tables</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Modal Add start-->
            <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-center text-white" id="myModalLabel">
                                <i class="fa fa-plus"></i> &nbsp; Create User Record
                            </h5>
                            <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Plese Insert Form.</p>
                            <form action="prosesMember/proses.php?action=add" method="post" class="row g-3">
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="no_id">ID Indetitas</label>
                                    <input class="form-control" id="no_id" type="number" name="no_id" placeholder="2022100" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <div>
                                        <label class="form-label">Membership</label>
                                    </div>
                                    <select class="form-select mb-3 " name="jenis_id" id="jenis_id" required>
                                        <option disabled selected value>Membership</option>
                                        <option value="Member">Member</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="fname">Nama Lengkap</label>
                                    <input class="form-control" id="fname" type="text" name="fname" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                                    <input class="form-control" id="tgl_lahir" type="date" name="tgl_lahir" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="no_tlp">No. Telepon</label>
                                    <input class="form-control" id="no_tlp" type="number" name="no_tlp" required>
                                </div>
                                <div class="form-group mb-3 col-md-6">
                                    <label class="form-label" for="pekerjaan">Pekerjaan</label>
                                    <input class="form-control" id="pekerjaan" type="text" name="pekerjaan" required>
                                </div>
                                <div class="form-group mb-3">
                                    <div>
                                        <label class="form-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="jk" value="Laki - Laki" class="form-check-input" required>
                                        <label class="form-check-label">Laki - Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline ms-3">
                                        <input type="radio" name="jk" value="Perempuan" class="form-check-input" required>
                                        <label class="form-check-label">Perempuan</label>
                                    </div>
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
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php if (!empty($_GET['remove'])) { ?>
                            <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>
                                <strong> Removed Success !</strong>
                            </div>
                        <?php } ?>
                        <?php if (!empty($_GET['notif'])) { ?>
                            <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>
                                <strong> Create Success !</strong>
                            </div>
                        <?php } ?>
                        <?php if (!empty($_GET['edit'])) { ?>
                            <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                                <i class="fa fa-check"></i>
                                <strong> Edit Success !</strong>
                            </div>
                        <?php } ?>
                        <div class="card mb-4">
                            <div class="card-body">
                                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-person-plus-fill"></i>&nbsp;Tambah Data</button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage User Tables</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID Membership</th>
                                            <th>Membership</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($db->tampil_data() as $data) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $data['no_id']; ?></td>
                                                <td><?php echo $data['jenis_id']; ?></td>
                                                <td><?php echo $data['fname']; ?></td>
                                                <td><?php echo $data['alamat']; ?></td>
                                                <td><?php echo $data['no_tlp']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalViewData<?php echo $data['id']; ?>"><i class="bi bi-info-circle-fill"></i>&nbsp;
                                                        View
                                                    </button>
                                                    <!-- Modal View-->
                                                    <div class="modal fade" id="modalViewData<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
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
                                                    <a href="edit-user.php?id=<?php echo $data['id']; ?>&aksi=edit" onclick="return confirm('Anda Yakin Mengedit Data Ini?');" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i>&nbsp;Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteuser<?php echo $data['id']; ?>"><i class="fa fa-trash"></i></a>
                                                    <!-- modal delete -->
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteuser<?php echo $data['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                                <div style="height: 160px; background-color: rgb(233, 236, 239);">
                                                                                    <img src="page/img/avatars/<?php echo $data['gambar']; ?>" alt="" class=" img rounded" width="140" height="160">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $data['fname']; ?>
                                                                                </h4>
                                                                                <p class="mb-0"><?php echo $data['no_id']; ?></p>
                                                                                <div class="text-muted"><small><?php echo $data['jenis_id']; ?></small></div>
                                                                            </div>
                                                                            <div class="text-center text-sm-right">
                                                                                <div class="text-muted"><small><?= date('d F Y'); ?></small></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                                                    <a href="prosesMember/proses.php?action=delete&id=<?php echo $data['id']; ?>" class="btn btn-primary">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="report-member.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>ID Membership</th>
                                            <th>Membership</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <th>No. Telepon</th>
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
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- data tables -->
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
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
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