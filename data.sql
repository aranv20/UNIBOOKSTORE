-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 06:31 PM
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
-- Database: `unibookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `id_buku` varchar(50) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `penerbit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `id_buku`, `kategori`, `nama_buku`, `harga`, `stok`, `penerbit_id`) VALUES
(1, 'K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', '50000.00', 60, 1),
(2, 'K1002', 'Keilmuan', 'Artifical Intelligence', '45000.00', 60, 1),
(3, 'K2003', 'Keilmuan', 'Autocad 3 Dimensi', '40000.00', 25, 1),
(4, 'B1001', 'Bisnis', 'Bisnis Online', '75000.00', 9, 1),
(5, 'K3004', 'Keilmuan ', 'Cloud Computing Technology', '85000.00', 15, 1),
(6, 'B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', '67500.00', 20, 1),
(7, 'N1001', 'Novel ', 'Cahaya Di Penjuru Hati', '68000.00', 10, 2),
(8, 'N1002', 'Novel', 'Aku Ingin Cerita', '48000.00', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `id` int(11) NOT NULL,
  `id_penerbit` varchar(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`id`, `id_penerbit`, `nama_penerbit`, `alamat`, `kota`, `telepon`) VALUES
(1, 'SP01', 'Penerbit Informatika', 'Jl. Buah Batu No.121', 'Bandung', '0813-2220-1946'),
(2, 'SP02', 'Andi Offset', 'Jl. Suryalaya IX No.3', 'Bandungg', '0878-3903-0688'),
(3, 'SP03', 'Danendra', 'Jl. Moch. Toha 44', 'Bandung', '022-5201215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penerbit_id` (`penerbit_id`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `tb_buku_ibfk_1` FOREIGN KEY (`penerbit_id`) REFERENCES `tb_penerbit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
