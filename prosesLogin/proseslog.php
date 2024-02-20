<?php
require 'conlog.php';

// proses login
if (!empty($_GET['aksi'] == 'login')) {
    $user = strip_tags($_POST['user']);
    $pass = strip_tags($_POST['pass']);

    $row = $koneksi->prepare('SELECT * FROM admin WHERE username = ? AND password = md5(?)');
    $row->execute(array($user, $pass));
    $count = $row->rowCount();
    if ($count > 0) {
        session_start();

        $result = $row->fetch();
        $_SESSION['ADMIN'] = $result;
        echo "<script>window.location='../index.php';</script>";
    } else {
        echo "<script>window.location='../login.php?get=failed';</script>";
    }
}

if (!empty($_GET['aksi'] == 'logout')) {
    session_start();
    session_destroy();
    echo "<script>window.location='../login.php?signout=success';</script>";
}
