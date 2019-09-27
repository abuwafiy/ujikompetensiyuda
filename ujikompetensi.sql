-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 08:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikompetensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_group`
--

CREATE TABLE `detail_group` (
  `id_parent` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_group`
--

INSERT INTO `detail_group` (`id_parent`, `id_jabatan`) VALUES
(1, 1),
(2, 1),
(3, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(14, 4),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 4),
(18, 1),
(18, 4),
(21, 1),
(22, 3),
(23, 3),
(24, 3),
(25, 1),
(25, 3),
(27, 1),
(27, 3),
(28, 1),
(28, 3),
(29, 1),
(29, 3);

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id_header` int(11) NOT NULL,
  `nama_header` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id_header`, `nama_header`) VALUES
(1, 'Navigasi'),
(2, 'Pengelolaan Asesmen'),
(3, 'Laporan'),
(4, 'Konfigurasi');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `status_jabatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `status_jabatan`) VALUES
(1, 'Bidang Keperawatan', 'Aktif'),
(3, 'Asesor', 'Aktif'),
(4, 'Asesi', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nik` varchar(20) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `alamat_karyawan` text DEFAULT NULL,
  `telepon_karyawan` varchar(16) DEFAULT NULL,
  `pin` varchar(100) DEFAULT NULL,
  `status_karyawan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nik`, `id_jabatan`, `nama_karyawan`, `alamat_karyawan`, `telepon_karyawan`, `pin`, `status_karyawan`) VALUES
('1234', 1, 'Diki', 'Mojokerto ', '12558', '81dc9bdb52d04dc20036dbd8313ed055', 'Aktif'),
('2222', 4, 'Asesi Lur', 'Kedung Baruk', '088888888', '934b535800b1cba8f96a5d72f72f1611', 'Aktif'),
('3333', 3, 'Asesor Gaes', 'Adoh', '08999999999', '2be9bd7a3434f7038ca27d1918de58bd', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_header`, `nama_menu`, `icon`) VALUES
(1, 4, 'Data Master', ''),
(5, 1, 'Dashboard', ''),
(6, 2, 'Aproval Permohonan', ''),
(7, 3, 'Hasil Uji Kompetensi', ''),
(8, 3, 'Kualitas Kompetensi', ''),
(9, 2, 'Banding', ''),
(10, 2, 'Pendaftaran Ujikom', ''),
(11, 2, 'Asesmen Mandiri', ''),
(12, 2, 'Rencana Asesmen', ''),
(13, 3, 'Hasil Asesmen', ''),
(18, 2, 'Verifikasi APL 2', ''),
(19, 2, 'Perencanaan Asesmen', ''),
(20, 2, 'Pelaksanaan', ''),
(21, 4, 'Master Skema', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_parent`
--

CREATE TABLE `menu_parent` (
  `id_parent` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_parent` varchar(100) NOT NULL,
  `id_parent_child` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_parent`
--

INSERT INTO `menu_parent` (`id_parent`, `id_menu`, `nama_parent`, `id_parent_child`) VALUES
(1, 1, 'Jabatan', 0),
(2, 1, 'Karyawan', 0),
(3, 1, 'Hak_Akses', 0),
(9, 10, 'Aproval_Permohonan', 0),
(10, 5, 'Dashboard', 0),
(11, 9, 'Aproval_Banding', 0),
(12, 7, 'Hasil_Uji_Kompetensi', 0),
(13, 8, 'Kualitas_Kompetensi', 0),
(14, 10, 'Pengajuan_Ujikom', 0),
(15, 11, 'Asesmen_Mandiri', 0),
(16, 12, 'Rencana_Asesmen', 0),
(17, 13, 'Hasil_Asesmen', 0),
(18, 9, 'Pengajuan_Banding', 0),
(21, 10, 'Permohonan_Ujikom', 0),
(22, 18, 'Verifikasi_APL2', 0),
(23, 19, 'Perencanaan_Asesmen', 0),
(24, 20, 'Pelaksanaan', 0),
(25, 21, 'Unit_Kompetensi', 0),
(27, 21, 'Elemen_Kompetensi', 0),
(28, 21, 'Kuk', 0),
(29, 9, 'Permohonan_Banding', 0);

-- --------------------------------------------------------

--
-- Table structure for table `persyaratan`
--

CREATE TABLE `persyaratan` (
  `id_persyaratan` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `nama_persyaratan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persyaratan`
--

INSERT INTO `persyaratan` (`id_persyaratan`, `id_unit`, `nama_persyaratan`) VALUES
(1, 1, 'Harus kuat'),
(2, 1, 'Panjang'),
(3, 1, 'Besar'),
(4, 1, 'Tahan Lama'),
(5, 2, 'Array'),
(6, 2, 'Array');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kompetensi`
--

CREATE TABLE `unit_kompetensi` (
  `id_unit` int(11) NOT NULL,
  `judul_unit` varchar(50) NOT NULL,
  `deskripsi_unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kompetensi`
--

INSERT INTO `unit_kompetensi` (`id_unit`, `judul_unit`, `deskripsi_unit`) VALUES
(1, 'Unit 1', 'merupakan ngewe'),
(2, 'fffff', 'wwww');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_group`
--
ALTER TABLE `detail_group`
  ADD PRIMARY KEY (`id_parent`,`id_jabatan`),
  ADD KEY `id_jabatan_fk` (`id_jabatan`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id_header`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `fk_karyawan_relations_jabatan` (`id_jabatan`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_header_fk` (`id_header`);

--
-- Indexes for table `menu_parent`
--
ALTER TABLE `menu_parent`
  ADD PRIMARY KEY (`id_parent`),
  ADD KEY `id_menu_fk` (`id_menu`);

--
-- Indexes for table `persyaratan`
--
ALTER TABLE `persyaratan`
  ADD PRIMARY KEY (`id_persyaratan`);

--
-- Indexes for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `menu_parent`
--
ALTER TABLE `menu_parent`
  MODIFY `id_parent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `persyaratan`
--
ALTER TABLE `persyaratan`
  MODIFY `id_persyaratan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit_kompetensi`
--
ALTER TABLE `unit_kompetensi`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_group`
--
ALTER TABLE `detail_group`
  ADD CONSTRAINT `id_jabatan_fk` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `id_parent_fk` FOREIGN KEY (`id_parent`) REFERENCES `menu_parent` (`id_parent`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan_relations_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `id_header_fk` FOREIGN KEY (`id_header`) REFERENCES `header` (`id_header`);

--
-- Constraints for table `menu_parent`
--
ALTER TABLE `menu_parent`
  ADD CONSTRAINT `id_menu_fk` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
