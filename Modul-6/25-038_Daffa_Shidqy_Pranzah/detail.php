<?php
include 'koneksi.php';

$id = intval($_GET['id']);
$pesan = "";

$query_master = "SELECT t.id, t.waktu_transaksi, t.keterangan, t.total, p.nama
                 FROM transaksi t
                 JOIN pelanggan p ON p.id = t.pelanggan_id
                 WHERE t.id = $id";
$master = mysqli_fetch_assoc(mysqli_query($koneksi, $query_master));

if (!$master) {
    die("Transaksi tidak ditemukan. <a href='index.php'>Kembali</a>");
}

// ===== Simpan detail transaksi =====
if (isset($_POST['simpan'])) {
    $barang_id = intval($_POST['barang_id']);
    $qty = intval($_POST['qty']);

    if ($barang_id < 1 || $qty < 1) {
        $pesan = "Pilih barang dan isi qty minimal 1.";
    } else {
        // cek barang belum ada di transaksi ini
        $cek = mysqli_fetch_assoc(mysqli_query($koneksi,
            "SELECT COUNT(*) AS n FROM transaksi_detail
             WHERE transaksi_id = $id AND barang_id = $barang_id"));

        // ambil harga dari tabel barang
        $barang = mysqli_fetch_assoc(mysqli_query($koneksi,
            "SELECT harga FROM barang WHERE id = $barang_id"));

        if ($cek['n'] > 0) {
            $pesan = "Barang tersebut sudah ada di transaksi ini.";
        } elseif (!$barang) {
            $pesan = "Barang tidak ditemukan.";
        } else {
            $harga = $barang['harga'];

            // simpan detail
            mysqli_query($koneksi,
                "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty)
                 VALUES ($id, $barang_id, $harga, $qty)");

            // hitung ulang total transaksi: SUM(harga * qty)
            mysqli_query($koneksi,
                "UPDATE transaksi
                 SET total = (SELECT SUM(harga * qty) FROM transaksi_detail
                              WHERE transaksi_id = $id)
                 WHERE id = $id");

            $pesan = "Detail transaksi disimpan, total transaksi diperbarui.";
        }
    }
    // ambil ulang master agar total terbaru tampil
    $master = mysqli_fetch_assoc(mysqli_query($koneksi, $query_master));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Master Detail Transaksi</title>
</head>
<body>
    <p><a href="index.php">&laquo; Kembali</a></p>
    <h1>Master Detail Transaksi</h1>

    <?php if ($pesan != "") echo "<p><b>$pesan</b></p>"; ?>

    <!-- MASTER -->
    <h2>Data Transaksi</h2>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><td><?php echo $master['id']; ?></td></tr>
        <tr><th>Tanggal</th><td><?php echo $master['waktu_transaksi']; ?></td></tr>
        <tr><th>Pelanggan</th><td><?php echo $master['nama']; ?></td></tr>
        <tr><th>Keterangan</th><td><?php echo $master['keterangan']; ?></td></tr>
        <tr><th>Total</th><td><?php echo number_format($master['total'], 0, ',', '.'); ?></td></tr>
    </table>

    <!-- FORM INPUT DETAIL -->
    <h2>Input Detail Transaksi</h2>
    <form method="post">
        Barang:
        <select name="barang_id" required>
            <option value="">-- Pilih Barang --</option>
            <?php
            // hanya barang yang belum ada di detail transaksi ini
            $q_barang = "SELECT id, nama_barang, harga FROM barang
                         WHERE id NOT IN (SELECT barang_id FROM transaksi_detail
                                          WHERE transaksi_id = $id)
                         ORDER BY nama_barang";
            $r_barang = mysqli_query($koneksi, $q_barang);
            while ($b = mysqli_fetch_assoc($r_barang)) {
                echo "<option value='" . $b['id'] . "'>" . $b['nama_barang'] .
                     " (" . number_format($b['harga'], 0, ',', '.') . ")</option>";
            }
            ?>
        </select>
        Qty: <input type="number" name="qty" min="1" value="1" required>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <!-- DETAIL -->
    <h2>Detail Transaksi</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
        <?php
        $q_detail = "SELECT b.kode_barang, b.nama_barang, d.harga, d.qty
                     FROM transaksi_detail d
                     JOIN barang b ON b.id = d.barang_id
                     WHERE d.transaksi_id = $id";
        $r_detail = mysqli_query($koneksi, $q_detail);

        while ($d = mysqli_fetch_assoc($r_detail)) {
            echo "<tr>";
            echo "<td>" . $d['kode_barang'] . "</td>";
            echo "<td>" . $d['nama_barang'] . "</td>";
            echo "<td>" . number_format($d['harga'], 0, ',', '.') . "</td>";
            echo "<td>" . $d['qty'] . "</td>";
            echo "<td>" . number_format($d['harga'] * $d['qty'], 0, ',', '.') . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
