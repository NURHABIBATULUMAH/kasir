-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Feb 2024 pada 09.35
-- Versi server: 10.3.39-MariaDB-0ubuntu0.20.04.2
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_kasir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(2, 7, 5, 14, 70000.00),
(5, 8, 6, 7, 14000.00),
(9, 18, 5, 2, 10000.00),
(10, 13, 6, 10, 20000.00),
(68, 19, 11, 10, 500000.00),
(69, 19, 7, 8, 16000.00),
(79, 13, 5, 25, 125000.00),
(80, 15, 5, 5, 25000.00),
(81, 7, 11, 8, 400000.00),
(82, 7, 12, 3, 27000.00),
(114, 20, 5, 1, 5000.00),
(115, 17, 14, 1, 20000000.00),
(120, 7, 10, 2, 3000.00),
(121, 22, 10, 6, 9000.00),
(122, 22, 6, 5, 10000.00),
(123, 23, 17, 1, 54000.00),
(124, 23, 10, 6, 9000.00),
(125, 23, 6, 9, 18000.00),
(127, 24, 20, 1, 2000.00),
(131, 24, 22, 1, 10000.00),
(132, 25, 19, 1, 3000.00),
(137, 27, 24, 1, 2500.00),
(138, 27, 20, 1, 2000.00),
(139, 28, 24, 2, 2500.00),
(140, 28, 19, 1, 3000.00),
(142, 28, 21, 1, 38000.00),
(151, 31, 26, 2, 24000.00),
(152, 31, 29, 25, 125000.00),
(153, 32, 24, 3, 7500.00);

--
-- Trigger `detailpenjualan`
--
DELIMITER $$
CREATE TRIGGER `kurangi_stok` AFTER INSERT ON `detailpenjualan` FOR EACH ROW BEGIN
UPDATE produk SET produk.Stok = produk.Stok - NEW.JumlahProduk WHERE produk.ProdukID = NEW.ProdukID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` varchar(20) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES
('1302234944', 'Andini ', 'Kerek ', '085837729514'),
('1602123948', 'Assoki', 'Merakurak', '085847730295'),
('1802025658', 'Habiba', 'Kerek', '085847730295'),
('1902054756', 'Wahyu', 'Kerek', '085847730295'),
('2102022355', 'Nisa', 'Kerek', '085847730295'),
('2102064738', 'Fina', 'Kerek', '085847730295');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL DEFAULT 0.00,
  `PelangganID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(24, '2024-02-13', 12000.00, '1302234944'),
(25, '2024-02-16', 6000.00, '1602123948'),
(27, '2024-02-18', 4500.00, '1802025658'),
(28, '2024-02-19', 43500.00, '1902054756'),
(31, '2024-02-21', 149000.00, '2102022355'),
(32, '2024-02-21', 7500.00, '2102064738');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'Petugas', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 2),
(14, 'habiba', 'habiba', '5b91e7de95d0972d00ef0cb8321b1ec3', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`) VALUES
(12, 'Pensil', 2000.00, 30),
(17, 'Tas punggung', 110000.00, 20),
(18, 'Bolpoin merah', 3000.00, 25),
(19, 'Bolpoin hitam', 3000.00, 25),
(20, 'Penghapus', 2000.00, 22),
(21, 'Buku tulis (1 lusin)', 38000.00, 12),
(22, 'Buku gambar A3', 10000.00, 14),
(23, 'Buku gambar A4', 4000.00, 25),
(24, 'Penggaris plastik', 2500.00, 13),
(26, 'Krayon', 12000.00, 23),
(28, 'Tempat pensil', 15000.00, 15),
(29, 'Rautan ', 5000.00, 25);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`DetailID`),
  ADD KEY `PenjualanID` (`PenjualanID`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `PelangganID` (`PelangganID`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `DetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`PelangganID`) REFERENCES `pelanggan` (`PelangganID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
