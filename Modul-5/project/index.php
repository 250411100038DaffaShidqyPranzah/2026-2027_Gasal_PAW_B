<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Master Supplier</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #eee; }
        
        .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; }
        .btn-tambah { background: green; float: right; margin-bottom: 10px; }
        .btn-edit { background: orange; }
        .btn-hapus { background: red; }
    </style>
</head>
<body>

    <h2>Data Master Supplier</h2>
    
    <a href="tambah.php" class="btn btn-tambah">Tambah Data</a>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Tindakan</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM supplier");
        
        if (mysqli_num_rows($query) == 0) {
            mysqli_query($koneksi, "INSERT INTO supplier (nama, telp, alamat) VALUES 
                ('PT. Maju Bersama', '08123456', 'Surabaya'),
                ('PT. Senang Sekali', '081515563', 'Bangkalan'),
                ('PT. Segar Segar', '0845454663', 'Surabaya')");
            $query = mysqli_query($koneksi, "SELECT * FROM supplier");
        }

        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['telp']); ?></td>
            <td><?= htmlspecialchars($row['alamat']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-hapus" onclick="return confirm('Anda yakin akan menghapus supplier ini?');">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>