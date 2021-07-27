-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 03:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_absen`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_form` int(11) DEFAULT NULL,
  `nis` char(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `waktu_absen` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `id_form`, `nis`, `nama_siswa`, `kelas`, `waktu_absen`) VALUES
(4, 4, '1234560001', 'Bejo', 'X-IPS-5', '2021-07-25 12:33:50'),
(5, 4, '1234560002', 'Tejo', 'X-IPS-5', '2021-07-25 12:34:02');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nip` char(18) DEFAULT NULL,
  `nama_form` varchar(100) NOT NULL,
  `tahun_pelajaran` char(9) NOT NULL,
  `semester` char(1) NOT NULL,
  `batas_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id_form`, `nip`, `nama_form`, `tahun_pelajaran`, `semester`, `batas_waktu`) VALUES
(3, '198503302003121001', 'Matematika Pertemuan ke-1', '2020/2021', '1', '2021-07-25 16:00:00'),
(4, '198503302003122002', 'Matematika Pertemuan ke-1', '2020/2021', '1', '2021-07-26 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` char(18) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `username`, `password`, `jenis_kelamin`, `tanggal_lahir`) VALUES
('198503302003121001', 'Riki Putra', 'riki', '$2y$10$SmMFHv0c7DsLP1iVvGZqm.ywhnsZfY6yBLXvSKy9wVV/4k8BKhhdK', 'L', '1985-03-30'),
('198503302003122002', 'Rini Putri', 'rini', '$2y$10$vKPaWQMfYSNAuRebW4zTDOjBINQAM4yuYhsWT99GCf.Ik.CwEffwu', 'P', '1985-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `id_form` (`id_form`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
