-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jan 2023 pada 19.15
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
(11, 'Ridwan', 'Male', ' kircon', ' 0087689', ' default.png'),
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
(2, 'Selfandy', 'Nike', 'Sneakers', 'whatsapp.png', 7, 1, 11, '2023-01-23 16:14:15', 'Jakarta', '0828973426', '', 'Diterima', 0),
(3, 'Selfandy', 'Nike', 'Sneakers', 'whatsapp.png', 11, 1, 11, '2023-01-23 14:33:24', 'Jakarta', '0828973426', '', 'Diterima', 0),
(8, 'roup', 'aerostreet', 'Sports', 'whatsapp.png', 11, 6, 13, '2023-01-23 13:05:40', 'bojong kenyot', '0812446363', '', 'Belum Diterima', 1),
(15, 'sel', 'Abibas', 'Sneakers', 'data.jpeg', 7, 1, 14, '2023-01-23 17:06:45', 'cikudapateuh', '0987667865', '', 'Diterima', 0),
(16, 'Selfandy', 'Ventela', 'Sneakers', 'data.jpeg', 7, 1, 12, '2023-01-23 17:16:08', 'Soreang', '0932487426', '', 'Diterima', 0),
(17, 'roup', 'Ventela', 'Leathers', 'data.jpeg', 7, 1, 14, '2023-01-23 17:13:31', 'cikudapateuh', '0987667865', '', 'Diterima', 0),
(18, 'sel', 'Ventela', 'Sneakers', 'data.jpeg', 7, 5, 13, '2023-01-23 17:16:02', 'cikudapateuh', '0987667865', 'Leathers', 'Diterima', 0),
(19, 'roup', 'Ventela', 'Sneakers', 'data.jpeg', 7, 4, 12, '2023-01-23 17:16:35', 'cikudapateuh', '0987667865', 'OVO', 'Belum Diterima', 1);

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
(12, 'Selfandy', '$2y$10$xjegkkIPeaARmPyd3M.KMO/ZKVVwLhcziSrRCvF/Sw4HxiCPHIQkG', 'Admin', 'Selfandy Fajar', 'default.png');

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
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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