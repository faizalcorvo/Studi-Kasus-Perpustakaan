<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php if (!empty($_SESSION['ADMIN'])) { ?>
                    <div class="alert alert-success mt-1 alert-dismissible fade show" role="alert">
                        <strong>
                            <i class="fa fa-check"></i>
                            &nbsp; WELCOME BACK <?php echo $_SESSION['ADMIN']['role']; ?> ,
                            <?php echo $_SESSION['ADMIN']['nama_pengguna']; ?>
                        </strong>
                    </div>
                <?php } else { ?>
                    <div class="card mt-1">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger mt-2">
                                <h5> <i class="fa fa-ban"></i>
                                    &nbsp; Maaf Anda Belum Dapat Akses Website,
                                    Silahkan Login Terlebih Dahulu !
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>