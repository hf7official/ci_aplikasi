-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 04:11 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simp_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `kd_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`kd_customer`, `nama_customer`, `alamat`, `no_tlp`) VALUES
('CS001', 'Direktur PT. Graha Buana Cikarang', 'Cikarang, Movieland', '088906542313');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kd_pembayaran` varchar(10) NOT NULL,
  `kd_transaksi` varchar(10) NOT NULL,
  `kd_proyek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `kd_pegawai` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tim` varchar(10) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`kd_pegawai`, `nama`, `tim`, `alamat`, `no_telp`) VALUES
('PG001', 'Ahmad Sanusi', 'TIM 1', 'Cikarang Barat', '087834561209');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `kd_proyek` varchar(10) NOT NULL,
  `kd_pegawai` varchar(10) NOT NULL,
  `kd_customer` varchar(10) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal-selesai` date NOT NULL,
  `harga` varchar(10) NOT NULL,
  `status` enum('selesai','on progres') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`kd_proyek`, `kd_pegawai`, `kd_customer`, `nama_proyek`, `tanggal_mulai`, `tanggal-selesai`, `harga`, `status`) VALUES
('PR001', 'PG001', 'CS001', 'Pengadaan Genset Jababeka Center Hollywood Plaza', '2020-04-01', '2020-05-20', '468.564.80', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(10) NOT NULL,
  `kd_user` varchar(10) NOT NULL,
  `kd_proyek` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `kd_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto_user` varchar(50) NOT NULL,
  `level` enum('admin','manager','manager keuangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`kd_user`, `nama_user`, `username`, `password`, `foto_user`, `level`) VALUES
('US001', 'Billy Hafiddin', 'manager', 'bWFuYWdlcjEyMw==', '1538303665653.png', 'manager'),
('US002', 'Mahfuzh Hashby', 'managerkeuangan', 'mk123', '1537840377928.png', 'manager keuangan'),
('US003', 'Yuri Dillah', 'admin123', 'YWRtaW4xMjM=', '153777087384.png', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`kd_customer`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kd_pembayaran`),
  ADD KEY `kd_transaksi` (`kd_transaksi`,`kd_proyek`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`kd_proyek`),
  ADD KEY `kd_pegawai` (`kd_pegawai`,`kd_customer`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `kd_proyek` (`kd_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kd_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
