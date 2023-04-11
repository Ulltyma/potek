-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `Id_Log` int(50) NOT NULL,
  `Waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Aktifitas` varchar(50) NOT NULL,
  `Id_User` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`Id_Log`, `Waktu`, `Aktifitas`, `Id_User`) VALUES
(89, '2023-04-11 04:02:44', 'Logout', 1),
(90, '2023-04-11 04:02:50', 'Login', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `Id_Obat` int(50) NOT NULL,
  `Kode_Obat` varchar(50) NOT NULL,
  `Nama_Obat` varchar(50) NOT NULL,
  `Expired_Date` date NOT NULL,
  `Jumlah` bigint(20) NOT NULL,
  `Harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`Id_Obat`, `Kode_Obat`, `Nama_Obat`, `Expired_Date`, `Jumlah`, `Harga`) VALUES
(2, 'PR1', 'Plagas', '2024-11-28', 127, 15000),
(3, 'PR2', 'Cordyceps', '2025-02-24', 150, 500000),
(5, 'PR3', 'Nevirapine', '2098-02-04', 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `Id_Resep` int(50) NOT NULL,
  `No_Resep` varchar(50) NOT NULL,
  `Tgl_Resep` date NOT NULL,
  `Nama_Dokter` varchar(50) NOT NULL,
  `Nama_Pasien` varchar(50) NOT NULL,
  `Nama_ObatDibeli` varchar(50) NOT NULL,
  `Jumlah_ObatDibeli` bigint(20) NOT NULL,
  `Id_Pasien` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `Id_Transaksi` int(50) NOT NULL,
  `No_Transaksi` varchar(50) NOT NULL,
  `Tgl_Transaksi` date NOT NULL,
  `Total_Bayar` bigint(20) NOT NULL,
  `Id_User` int(50) NOT NULL,
  `Id_Obat` int(50) NOT NULL,
  `Id_Resep` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `Id_User` int(50) NOT NULL,
  `Tipe_User` varchar(50) NOT NULL,
  `Nama_User` varchar(50) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`Id_User`, `Tipe_User`, `Nama_User`, `Alamat`, `Telepon`, `Username`, `Password`) VALUES
(1, 'admin', 'Rival', 'Bandung', '087642345', 'admin', 'admin'),
(2, 'apoteker', 'apoteker', 'Bandung', '093456789', 'apoteker', 'apoteker'),
(8, 'admin', 'Alya', 'Bekasi', '088644665', 'admin1', 'admin1'),
(9, 'kasir', 'kasir', 'Jambi', '0987659', 'kasir', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`Id_Log`),
  ADD KEY `tbl_log_ibfk_1` (`Id_User`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`Id_Obat`);

--
-- Indexes for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  ADD PRIMARY KEY (`Id_Resep`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`Id_Transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `Id_Log` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  MODIFY `Id_Obat` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_resep`
--
ALTER TABLE `tbl_resep`
  MODIFY `Id_Resep` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `Id_Transaksi` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `Id_User` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `tbl_user` (`id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
