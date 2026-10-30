<?php
$host = "localhost";
$user = "root";
$pass = "";

$koneksi = mysqli_connect($host, $user, $pass);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS db_supplier");
mysqli_select_db($koneksi, "db_supplier");

mysqli_query($koneksi, "CREATE TABLE IF NOT EXISTS supplier (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    telp VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL
)");
?>