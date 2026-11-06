<?php
$koneksi = mysqli_connect("localhost", "root", "Daffa@512", "penjualan");

if (mysqli_connect_error()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
