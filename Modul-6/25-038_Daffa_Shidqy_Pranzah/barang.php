<?php
include 'koneksi.php';

$pesan = "";

if (isset($_POST['hapus'])) {
    $id = intval($_POST['id']);

    // cek apakah barang sudah dipakai di transaksi_detail
    $cek = mysqli_fetch_assoc(mysqli_query($koneksi,
        "SELECT COUNT(*) AS n FROM transaksi_detail WHERE barang_id = $id"));

    if ($cek['n'] > 0) {
        $pesan = "Barang tidak dapat dihapus karena masih digunakan pada transaksi.";
    } else {
        mysqli_query($koneksi, "DELETE FROM barang WHERE id = $id");
        $pesan = "Barang berhasil dihapus.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
</head>
<body>
    <h1>Data Barang</h1>
    <p><a href="index.php">Data Transaksi</a></p>

    <?php if ($pesan != "") echo "<p><b>$pesan</b></p>"; ?>

    <table border="1" cellpadding="5">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Supplier</th>
            <th>Aksi</th>
        </tr>
        <?php
        $query = "SELECT b.id, b.kode_barang, b.nama_barang, b.harga, b.stok, s.nama AS supplier
                  FROM barang b
                  JOIN supplier s ON s.id = b.supplier_id
                  ORDER BY b.id";
        $result = mysqli_query($koneksi, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['kode_barang'] . "</td>";
            echo "<td>" . $row['nama_barang'] . "</td>";
            echo "<td>" . number_format($row['harga'], 0, ',', '.') . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            echo "<td>" . $row['supplier'] . "</td>";
            echo "<td>
                    <form method='post' onsubmit=\"return confirm('Hapus barang ini?');\">
                        <input type='hidden' name='id' value='" . $row['id'] . "'>
                        <button type='submit' name='hapus'>Hapus</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
