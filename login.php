<?php
// session start();
if (!empty($_SESSION)) {
} else {
    session_start();
}
?>
<!doctype html>
<html>

<head>
    <title>Library Management System SMKN 1 Cibinong</title>
    <link rel="icon" type="image/x-icon" href="page/img/favicon/favicon.ico" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>
    <style>
        body {
            background-image: url("page/img/bg-1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 pt-5 mx-auto">
                <center>
                    <img src="page/img/favicon/android-chrome-192x192.png" alt="">
                </center>
                <h1 class="text-center text-white">WELCOME</h1>
                <h6 class="text-center text-white">PUSTAKA SMKN 1 CIBINONG</h6>
                <div id="logout">
                    <?php if (isset($_GET['signout'])) { ?>
                        <div class="alert alert-success">
                            <strong>Anda Berhasil Logout</strong>
                        </div>
                    <?php } ?>
                </div>
                <div id="notifikasi">
                    <div class="alert alert-danger">
                        <strong>Login Anda Gagal, Periksa Kembali Username dan Password</strong>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="fa fa-sign-in pt-2"></i> SIGN IN AS ADMIN
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="prosesLogin/proseslog.php?aksi=login" id="formlogin">
                            <div class="form-group">
                                <label>Username</label>
                                <input name="user" class="form-control" autofocus placeholder="Input Username Anda" type="text" required="required" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input name="pass" class="form-control" placeholder="Input Password Anda" type="password" required="required" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="proses_login" class="btn btn-primary btn-block"> Login
                                </button>
                            </div>
                        </form>
                        <div class="form-group">
                            <a href="index.php"> Kembali ke Home </a>
                        </div> <!-- form-group-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // notifikasi gagal di hide
        <?php if (empty($_GET['get'])) { ?>
            $("#notifikasi").hide();
        <?php } ?>
        var logingagal = function() {
            $("#logout").fadeOut('slow');
            $("#notifikasi").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script>
</body>

</html>