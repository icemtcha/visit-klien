-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2026 at 05:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_klien`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `kode_klien` varchar(10) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id`, `tanggal`, `kegiatan`, `kode_klien`, `keterangan`) VALUES
(8, '2026-02-01', 'Presentasi produk ke SD Nusantara  (Budi & Agus)', 'K101', 'Jam 09:00'),
(9, '2026-02-02', 'Pendampingan audit', 'K102', 'pertemuan pertama'),
(10, '2026-02-04', 'pendampian laporan keuangan', 'K103', 'Bahas coa'),
(11, '2026-02-04', 'instalasi ac', 'K103', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_klien`
--

CREATE TABLE `tbl_klien` (
  `id_klien` int(11) NOT NULL,
  `kode_klien` varchar(20) NOT NULL,
  `nama_klien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_klien`
--

INSERT INTO `tbl_klien` (`id_klien`, `kode_klien`, `nama_klien`) VALUES
(3, 'K101', 'yys albukhari'),
(4, 'K102', 'yys al-azhar'),
(5, 'K103', 'yys citra mulia'),
(6, 'K104', 'yayasan nurul imam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_klien` (`kode_klien`);

--
-- Indexes for table `tbl_klien`
--
ALTER TABLE `tbl_klien`
  ADD PRIMARY KEY (`id_klien`),
  ADD UNIQUE KEY `kode_klien` (`kode_klien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_klien`
--
ALTER TABLE `tbl_klien`
  MODIFY `id_klien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD CONSTRAINT `tbl_agenda_ibfk_1` FOREIGN KEY (`kode_klien`) REFERENCES `tbl_klien` (`kode_klien`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
