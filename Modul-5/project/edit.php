<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM supplier WHERE id = '$id'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
    $nama   = $_POST['nama'];
    $telp   = $_POST['telp'];
    $alamat = $_POST['alamat'];

    mysqli_query($koneksi, "UPDATE supplier SET nama='$nama', telp='$telp', alamat='$alamat' WHERE id='$id'");
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        .form-group { margin-bottom: 10px; }
        input { width: 250px; padding: 5px; }
        .btn { padding: 5px 10px; text-decoration: none; color: white; border: none; cursor: pointer; }
        .btn-update { background: green; }
        .btn-batal { background: red; }
    </style>
</head>
<body>

    <h3>Edit Data Master Supplier</h3>
    
    <form action="" method="POST">
        <div class="form-group">
            <label>Nama</label><br>
            <input type="text" name="nama" value="<?= $row['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label>Telp</label><br>
            <input type="text" name="telp" value="<?= $row['telp']; ?>" required>
        </div>
        <div class="form-group">
            <label>Alamat</label><br>
            <input type="text" name="alamat" value="<?= $row['alamat']; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-update">Update</button>
        <a href="index.php" class="btn btn-batal">Batal</a>
    </form>

</body>
</html>