-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jan 2023 pada 06.02
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoesclean`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `harga_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `deskripsi_paket`, `harga_paket`) VALUES
(1, 'Fast Clean', 'Cuci Bagian Luar Sepatu', 20000),
(4, 'Deep Clean', 'Cuci Bagian Luar dan Dalam Sepatu', 30000),
(5, 'Treatment Leather', 'Cuci dan Merawat Sepatu Kulit', 40000),
(6, 'Treatment Sepatu Putih', 'Cuci Dan Memutihkan Sepatu Putih', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `gender_pegawai` varchar(100) NOT NULL,
  `alamat_pegawai` varchar(200) NOT NULL,
  `phone_pegawai` varchar(150) NOT NULL,
  `photo_pegawai` varchar(225) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `gender_pegawai`, `alamat_pegawai`, `phone_pegawai`, `photo_pegawai`) VALUES
(11, 'Ridwan', 'Male', ' kircondet', ' 0087689', 'data.jpeg'),
(12, 'jihun', ' Female', ' kiara', ' 8759870', 'default.png'),
(13, 'Maul', 'Male', ' kiara', ' 8759870', 'default.png'),
(14, 'ay', ' Male', ' kiara', ' 8759870', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `merk_sepatu` varchar(255) NOT NULL,
  `type_sepatu` varchar(100) NOT NULL,
  `photo_sepatu` varchar(225) NOT NULL DEFAULT 'default.png',
  `userid` int(11) DEFAULT 7,
  `id_paket` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL DEFAULT 1,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alamat_pelanggan` text NOT NULL,
  `phone_pelanggan` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `konfirmasi` varchar(255) NOT NULL DEFAULT 'Belum Diterima',
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `merk_sepatu`, `type_sepatu`, `photo_sepatu`, `userid`, `id_paket`, `id_pegawai`, `tanggal`, `alamat_pelanggan`, `phone_pelanggan`, `metode_pembayaran`, `konfirmasi`, `status`) VALUES
(19, 'roup', 'Ventela', 'Sneakers', 'data.jpeg', 7, 4, 12, '2023-01-23 17:16:35', 'cikudapateuh', '0987667865', 'OVO', 'Belum Diterima', 1),
(20, 'bima', 'adidas', 'Sports', 'shoes.png', 11, 4, 12, '2023-01-24 02:39:17', 'cikudapateuh', '0987667865', 'DANA', 'Belum Diterima', 1),
(21, 'sel', 'Ventela', 'Sneakers', 'data.jpeg', 11, 6, 12, '2023-01-24 02:43:30', 'Soreang', '0932487426', 'GOPAY', 'Belum Diterima', 1),
(22, 'ryan', 'Nike', 'Sports', 'shoes.png', 11, 5, 13, '2023-01-24 03:10:11', 'majalaya', '0987667865', 'GOPAY', 'Belum Diterima', 1),
(23, 'ryan', 'Nike', 'Sports', 'shoes.png', 11, 5, 13, '2023-01-24 03:10:47', 'majalaya', '0987667865', 'GOPAY', 'Belum Diterima', 1),
(24, 'Selfandy', 'Ventela', 'Sneakers', 'data.jpeg', 11, 5, 12, '2023-01-24 03:11:27', 'majalaya', '0987667865', 'COD', 'Belum Diterima', 1),
(25, 'Ryan', 'Nike', 'Sneakers', 'data.jpeg', 11, 4, 14, '2023-01-24 03:14:26', 'majalaya', '0987667865', 'SHOPEEPAY', 'Belum Diterima', 1),
(26, 'raka', 'Ventela', 'Leathers', 'shoes.png', 7, 5, 13, '2023-01-24 04:10:58', 'kircon', '0987667865', 'BRI', 'Belum Diterima', 1),
(27, 'ryan', 'Nike', 'Sneakers', 'shoes.png', 7, 6, 11, '2023-01-24 04:07:35', 'majalaya', '0987667865', 'COD', 'Diterima', 0),
(28, 'fauzan', 'adidas', 'Sports', 'data.jpeg', 13, 1, 11, '2023-01-24 04:25:05', 'cikadut', '087663769', 'BRI', 'Diterima', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `userphoto` varchar(225) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password_user`, `usertype`, `fullname`, `userphoto`) VALUES
(7, 'Tes', '$2y$10$rHn9jNtqiHwhUI3uFQlp3e3Qeqd4naDF4IBDVaAgGsCY1po5pPxei', 'Pelanggan', ' tes', 'Gigachad - Imgur.jpg'),
(9, 'test', '$2y$10$A3ZDA5XF2eyCNCIzxiyeL.08AU7411EhslgeO1iThoDEnzh8vat.i', 'Admin', ' managertest', '𝐒𝐨𝐡𝐞𝐞 𝐢𝐜𝐨𝐧.jpeg'),
(10, 'bismilah', '$2y$10$otNvKW9ZP3Yc7mOA4Q4J2OenYzXMe9l/AWA..rUIqUCFFV74fOmDq', 'Admin', ' dasd', 'default.png'),
(11, 'kids', '$2y$10$zlxyhXJEwYAvenJxk6F76ukUm438rdQ/b0TgpNZTH9VijwOapQo1y', 'Pelanggan', ' fandy', 'default.png'),
(12, 'Selfandy', '$2y$10$xjegkkIPeaARmPyd3M.KMO/ZKVVwLhcziSrRCvF/Sw4HxiCPHIQkG', 'Admin', 'Selfandy Fajar', 'default.png'),
(13, 'ojan', '$2y$10$WHsQMaPeJwyueItXIuyGF.DvIwFL6cMu/2JXTAE/ur8dgbK/.mx0m', 'Pelanggan', 'memet codet', 'licensed-image (1).jpeg'),
(14, 'fandy', '$2y$10$4Aov7hyB7POwsiDqnXH8qeH47ydXHZACc2Yurs6VNKDkyd.6Dwyse', 'Admin', 'fandy fajar', 'images (1).jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `pelanggan_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pelanggan_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
