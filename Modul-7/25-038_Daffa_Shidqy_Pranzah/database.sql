DROP DATABASE IF EXISTS penjualan;
CREATE DATABASE penjualan CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE penjualan;

CREATE TABLE supplier (
  id     INT NOT NULL AUTO_INCREMENT,
  nama   VARCHAR(100) NOT NULL,
  telp   VARCHAR(12),
  alamat TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE barang (
  id          INT NOT NULL AUTO_INCREMENT,
  kode_barang VARCHAR(10) NOT NULL,
  nama_barang VARCHAR(100) NOT NULL,
  harga       INT NOT NULL,
  stok        INT NOT NULL DEFAULT 0,
  supplier_id INT NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uk_kode_barang (kode_barang),
  CONSTRAINT fk_barang_supplier FOREIGN KEY (supplier_id)
    REFERENCES supplier (id)
);

CREATE TABLE pelanggan (
  id            VARCHAR(20) NOT NULL,
  nama          VARCHAR(100) NOT NULL,
  jenis_kelamin ENUM('L','P') NOT NULL,
  telp          VARCHAR(12),
  alamat        TEXT,
  PRIMARY KEY (id)
);

CREATE TABLE transaksi (
  id              INT NOT NULL AUTO_INCREMENT,
  waktu_transaksi DATE NOT NULL,
  keterangan      TEXT,
  total           INT NOT NULL DEFAULT 0,
  pelanggan_id    VARCHAR(20) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_transaksi_pelanggan FOREIGN KEY (pelanggan_id)
    REFERENCES pelanggan (id)
);

CREATE TABLE transaksi_detail (
  transaksi_id INT NOT NULL,
  barang_id    INT NOT NULL,
  harga        INT NOT NULL,
  qty          INT NOT NULL,
  PRIMARY KEY (transaksi_id, barang_id),
  CONSTRAINT fk_detail_transaksi FOREIGN KEY (transaksi_id)
    REFERENCES transaksi (id),
  CONSTRAINT fk_detail_barang FOREIGN KEY (barang_id)
    REFERENCES barang (id)
);

CREATE TABLE pembayaran (
  id           INT NOT NULL AUTO_INCREMENT,
  waktu_bayar  DATETIME NOT NULL,
  total        INT NOT NULL,
  metode       ENUM('TUNAI','TRANSFER','EDC') NOT NULL,
  transaksi_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_pembayaran_transaksi FOREIGN KEY (transaksi_id)
    REFERENCES transaksi (id)
);

CREATE TABLE `user` (
  id_user  TINYINT NOT NULL AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(35) NOT NULL,
  nama     VARCHAR(50),
  alamat   VARCHAR(150),
  hp       VARCHAR(20),
  level    TINYINT(1) NOT NULL DEFAULT 2,
  PRIMARY KEY (id_user),
  UNIQUE KEY uk_username (username)
);


INSERT INTO supplier (nama, telp, alamat) VALUES
('PT Sumber Pangan Makmur', '031555101', 'Jl. Rungkut Industri No. 12, Surabaya'),
('CV Tani Jaya',            '031555102', 'Jl. Raya Bangkalan No. 45, Bangkalan'),
('UD Kopi Nusantara',       '031555103', 'Jl. Pahlawan No. 8, Sidoarjo'),
('PT Bersih Sejahtera',     '031555104', 'Jl. Ahmad Yani No. 77, Surabaya'),
('CV Mitra Boga',           '031555105', 'Jl. Diponegoro No. 20, Gresik');

INSERT INTO barang (kode_barang, nama_barang, harga, stok, supplier_id) VALUES
('BRG001', 'Beras Premium 5kg',    65000,  50, 1),
('BRG002', 'Minyak Goreng 2L',     38000,  40, 1),
('BRG003', 'Gula Pasir 1kg',       16000, 100, 2),
('BRG004', 'Telur Ayam 1kg',       28000,  60, 2),
('BRG005', 'Kopi Bubuk 200g',      22000,  30, 3),
('BRG006', 'Sabun Mandi',           4500,  80, 4),
('BRG007', 'Deterjen Bubuk 1kg',   21000,  45, 4),
('BRG008', 'Mie Instan',            3500, 200, 5),
('BRG009', 'Teh Celup 25 pcs',     12000,  70, 3);  -- belum dipakai transaksi (untuk uji hapus)

INSERT INTO pelanggan (id, nama, jenis_kelamin, telp, alamat) VALUES
('PLG001', 'Budi Santoso',   'L', '081234560001', 'Jl. Merdeka No. 1, Bangkalan'),
('PLG002', 'Siti Aminah',    'P', '081234560002', 'Jl. Sudirman No. 14, Bangkalan'),
('PLG003', 'Agus Wijaya',    'L', '081234560003', 'Jl. Kenanga No. 5, Surabaya'),
('PLG004', 'Dewi Lestari',   'P', '081234560004', 'Jl. Melati No. 22, Sampang'),
('PLG005', 'Rizky Pratama',  'L', '081234560005', 'Jl. Mawar No. 9, Pamekasan');

INSERT INTO `user` (username, password, nama, alamat, hp, level) VALUES
('admin',  '0192023a7bbd73250516f069df18b500',  'Administrator', 'Jl. Kampus No. 1',  '081200000001', 1),
('kasir1', 'de28f8f7998f23ab4194b51a6029416f',  'Kasir Satu',    'Jl. Kampus No. 2',  '081200000002', 2),
('kasir2', 'de28f8f7998f23ab4194b51a6029416f',  'Kasir Dua',     'Jl. Kampus No. 3',  '081200000003', 2),
('gudang', 'cbb7449d78314665f9e7c7dd0a18a68a', 'Staf Gudang',   'Jl. Kampus No. 4',  '081200000004', 2),
('owner',  '5be057accb25758101fa5eadbbd79503',  'Pemilik Toko',  'Jl. Kampus No. 5',  '081200000005', 1);


INSERT INTO transaksi (id, waktu_transaksi, keterangan, total, pelanggan_id) VALUES
(1,  '2026-10-01', 'Belanja bulanan',        141000, 'PLG001'),
(2,  '2026-10-02', 'Kebutuhan dapur',         67000, 'PLG002'),
(3,  '2026-10-03', 'Belanja harian',          50000, 'PLG003'),
(4,  '2026-10-05', 'Perlengkapan mandi',      34500, 'PLG004'),
(5,  '2026-10-07', 'Stok warung',            146000, 'PLG005'),
(6,  '2026-10-09', 'Belanja mingguan',        55500, 'PLG001'),
(7,  '2026-10-12', 'Pesanan acara',          100000, 'PLG002'),
(8,  '2026-10-15', 'Kebutuhan cuci',          72000, 'PLG003'),
(9,  '2026-10-20', 'Beli mie partai',         70000, 'PLG004'),
(10, '2026-10-25', 'Belanja akhir bulan',    119000, 'PLG005');

INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) VALUES
(1, 1, 65000, 1), (1, 2, 38000, 2),
(2, 3, 16000, 2), (2, 8,  3500, 10),
(3, 4, 28000, 1), (3, 5, 22000, 1),
(4, 6,  4500, 3), (4, 7, 21000, 1),
(5, 1, 65000, 2), (5, 3, 16000, 1),
(6, 2, 38000, 1), (6, 8,  3500, 5),
(7, 5, 22000, 2), (7, 4, 28000, 2),
(8, 7, 21000, 3), (8, 6,  4500, 2),
(9, 8,  3500, 20),
(10, 1, 65000, 1), (10, 2, 38000, 1), (10, 3, 16000, 1);

INSERT INTO pembayaran (waktu_bayar, total, metode, transaksi_id) VALUES
('2026-10-01 10:15:00', 141000, 'TUNAI',    1),
('2026-10-02 11:20:00',  67000, 'TRANSFER', 2),
('2026-10-03 09:05:00',  50000, 'EDC',      3),
('2026-10-05 14:40:00',  34500, 'TUNAI',    4),
('2026-10-07 16:10:00', 146000, 'TRANSFER', 5);

ALTER TABLE transaksi AUTO_INCREMENT = 11;
