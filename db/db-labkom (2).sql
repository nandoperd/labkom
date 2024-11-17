-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 07:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-labkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'bedebah');

-- --------------------------------------------------------

--
-- Table structure for table `auth_keprog`
--

CREATE TABLE `auth_keprog` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_keprog`
--

INSERT INTO `auth_keprog` (`id`, `username`, `password`) VALUES
(1, 'keprog', 'bedebah2');

-- --------------------------------------------------------

--
-- Table structure for table `auth_kepsek`
--

CREATE TABLE `auth_kepsek` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_kepsek`
--

INSERT INTO `auth_kepsek` (`id`, `username`, `password`) VALUES
(1, 'kepsek', 'bedebah3');

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `id_labkom` int(11) DEFAULT NULL,
  `id_kategori_barang` int(11) DEFAULT NULL,
  `kd_invetaris` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl_barang_masuk` date DEFAULT NULL,
  `tgl_barang_keluar` date DEFAULT NULL,
  `kd_perolehan_brg` varchar(50) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_kategori_barang`
--

CREATE TABLE `data_kategori_barang` (
  `id` int(11) NOT NULL,
  `nama_kategori_barang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_kategori_barang`
--

INSERT INTO `data_kategori_barang` (`id`, `nama_kategori_barang`) VALUES
(1, 'PC/Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `data_labkom`
--

CREATE TABLE `data_labkom` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kepala_lab` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_labkom`
--

INSERT INTO `data_labkom` (`id`, `nama`, `kepala_lab`) VALUES
(1, 'Labkom 1', 'Wildan'),
(2, 'Labkom 2', 'Wildanto'),
(3, 'Labkom 3', 'Wil'),
(4, 'Labkom 4', 'Dan');

-- --------------------------------------------------------

--
-- Table structure for table `data_pengajuan_barang`
--

CREATE TABLE `data_pengajuan_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_labkom` int(11) DEFAULT NULL,
  `id_kategori_barang` int(11) DEFAULT NULL,
  `kd_invetaris` varchar(50) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `tgl_barang_masuk` date DEFAULT NULL,
  `tgl_barang_keluar` date DEFAULT NULL,
  `kd_perolehan_brg` varchar(50) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `verifikasi_keprog` int(11) DEFAULT NULL,
  `verifikasi_kepsek` int(11) DEFAULT NULL,
  `tgl_verfikasi_keprog` date DEFAULT NULL,
  `tgl_verfikasi_kepsek` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_keprog`
--
ALTER TABLE `auth_keprog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_kepsek`
--
ALTER TABLE `auth_kepsek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_kategori_barang`
--
ALTER TABLE `data_kategori_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_labkom`
--
ALTER TABLE `data_labkom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengajuan_barang`
--
ALTER TABLE `data_pengajuan_barang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_keprog`
--
ALTER TABLE `auth_keprog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_kepsek`
--
ALTER TABLE `auth_kepsek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_kategori_barang`
--
ALTER TABLE `data_kategori_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_labkom`
--
ALTER TABLE `data_labkom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_pengajuan_barang`
--
ALTER TABLE `data_pengajuan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
