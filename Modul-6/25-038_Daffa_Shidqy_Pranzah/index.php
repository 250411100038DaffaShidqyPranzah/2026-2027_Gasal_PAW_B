<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Transaksi</title>
</head>
<body>
    <h1>Data Transaksi (Master)</h1>
    <p><a href="barang.php">Data Barang</a></p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Tanggal</th>
            <th>Pelanggan</th>
            <th>Keterangan</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = "SELECT t.id, t.waktu_transaksi, t.keterangan, t.total, p.nama
                  FROM transaksi t
                  JOIN pelanggan p ON p.id = t.pelanggan_id
                  ORDER BY t.id";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['waktu_transaksi'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['keterangan'] . "</td>";
            echo "<td>" . number_format($row['total'], 0, ',', '.') . "</td>";
            echo "<td><a href='detail.php?id=" . $row['id'] . "'>Detail</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
