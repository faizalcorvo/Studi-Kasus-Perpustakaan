<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'perpustakaan';
try {
    $koneksi = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    return 'Connection failed: ' . $e->getMessage();
}
