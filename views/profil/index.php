<?php
$id =  $_SESSION['ADMIN']['id_login'];
$sql = "SELECT * FROM admin WHERE id_login = ?";
$row = $koneksi->prepare($sql);
$row->execute(array($id));
$hasil = $row->fetch();
?>
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
                            <strong> Update Profil Berhasil !</strong>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-auto mb-3">
                                    <div class="mx-auto" style="width: 140px;">
                                        <div style="height: 140px; background-color: rgb(233, 236, 239);">
                                            <img src="page/img/avatars/<?php echo $hasil['gambar']; ?>" alt="" class=" img rounded" width="140" height="140">
                                        </div>
                                    </div>
                                </div>
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $hasil['nama_pengguna']; ?>
                                        </h4>
                                        <p class="mb-0"><?php echo $hasil['email']; ?></p>
                                        <div class="text-muted"><small><?php echo $hasil['role']; ?></small></div>
                                        <div class="mt-2">
                                            <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#modalViewData<?php echo $hasil['id_login']; ?>"><i class="bi bi-eye"></i>&nbsp;
                                                Details
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalViewData<?php echo $hasil['id_login']; ?>" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary">
                                                            <h5 class="modal-title fw-bold text-white" id="modalViewLabel">
                                                                <i class="fa fa-list"></i>&nbsp; VIEW PROFILE ADMIN
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <center align="center">
                                                                <td colspan="2"><img src="page/img/avatars/<?php echo $hasil['gambar']; ?>" width="40%" class="img-fluid rounded"></td>
                                                            </center>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    Nama <br />
                                                                    Username <br />
                                                                    Password <br />
                                                                    Role <br />
                                                                    No. Telepon <br />
                                                                    Email <br />
                                                                    Alamat
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    : &nbsp; <?php echo $hasil['nama_pengguna']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['username']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['password']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['role']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['telepon']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['email']; ?><br />
                                                                    : &nbsp; <?php echo $hasil['alamat']; ?>
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
                                    <form method="post" action="prosesLogin/profillog.php?aksi=update" class="form">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Nama </label>
                                                            <input type="text" value="<?php echo $hasil['nama_pengguna']; ?>" required class="form-control" name="nama_pengguna">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>Telepon</label>
                                                            <input type="number" value="<?php echo $hasil['telepon']; ?>" required class="form-control" name="telepon">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label>E-mail</label>
                                                            <input type="email" value="<?php echo $hasil['email']; ?>" required class="form-control" name="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="form-group">
                                                            <label>Alamat</label>
                                                            <textarea name="alamat" class="form-control" required><?php echo $hasil['alamat']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" value="<?php echo $hasil['username']; ?>" required class="form-control" name="username">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" value="" placeholder="ubah password" required class="form-control" name="password">
                                                    <input type="hidden" value="<?php echo $hasil['id_login']; ?>" class="form-control" name="id_login">
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
                                                <button class="btn btn-primary" type="submit">Save Changes</button>
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
                                <a href="prosesLogin/proseslog.php?aksi=logout" class="btn btn-block btn-secondary">
                                    <i class="fa fa-sign-out"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="px-xl-3">
                                <a href="index.php" class="btn btn-block btn-danger">
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