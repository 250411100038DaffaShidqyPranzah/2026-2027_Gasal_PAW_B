<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES ('$nama', '$telp', '$alamat')");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 10px; }
        input { width: 250px; padding: 5px; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border: none; cursor: pointer; }
        .btn-simpan { background: green; }
        .btn-batal { background: red; }
    </style>
</head>
<body>

    <h3>Tambah Data Master Supplier Baru</h3>
    
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="nama" placeholder="Nama" required>
        </div>
        <div class="form-group">
            <label>Telp</label><br>
            <input type="text" name="telp" placeholder="telp" required>
        </div>
        <div class="form-group">
            <label>Alamat</label><br>
            <input type="text" name="alamat" placeholder="alamat" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-simpan">Simpan</button>
        <a href="index.php" class="btn btn-batal">Batal</a>
    </form>

</body>
</html>