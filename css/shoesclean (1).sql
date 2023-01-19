-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 11:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

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
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `deskripsi_paket` text NOT NULL,
  `harga_paket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `gender_pegawai`, `alamat_pegawai`, `phone_pegawai`, `photo_pegawai`) VALUES
(11, 'dasd', ' Female', ' kircon', ' 0087689', ' '),
(12, 'jihun', ' Female', ' kiara', ' 8759870', 'default.png'),
(13, 'ay', ' Female', ' kiara', ' 8759870', 'default.png'),
(14, 'ay', ' Male', ' kiara', ' 8759870', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `merk_sepatu` varchar(255) NOT NULL,
  `type_sepatu` varchar(100) NOT NULL,
  `photo_sepatu` varchar(225) NOT NULL DEFAULT 'default.png',
  `paket` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `phone_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `merk_sepatu`, `type_sepatu`, `photo_sepatu`, `paket`, `harga`, `alamat_pelanggan`, `phone_pelanggan`) VALUES
(1, 'adit', '', '', '85b73cedfe31c958f2348f76d1cb31ba.jpg', '', '', 'sekeloa', '098976989');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password_user`, `usertype`, `fullname`, `userphoto`) VALUES
(7, 'Tes', '$2y$10$q.zd6Sl/hbLThoAwYXmiPucfmgpNYUBIntohlES6UQdN6YnzxN7m2', ' Staff', ' tes', 'default.png'),
(9, 'test', '$2y$10$mWsBlbnh7zj8cQi4JHbdfOXCKPlwgrB5neruLnGePgbIHSXD2.1AK', ' Manager', ' managertest', 'default.png'),
(10, 'bismilah', '$2y$10$6XHJaOigo1975HLMTlcPmOQxtBw3npfQFlrqf3vtBb2vw3vPemco2', ' Manager', ' dasd', 'default.png'),
(11, 'kids', '$2y$10$2NsP8.VKX5pq9RpZmTMAp.VXELjN5RWI66Jpaxprgst4t.q7quRvG', ' Staff', ' fandy', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
