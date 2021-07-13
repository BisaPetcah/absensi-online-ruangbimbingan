-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2021 at 02:46 AM
-- Server version: 5.7.24
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruang_bimbingan`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_admin`
--

INSERT INTO `akun_admin` (`id_akun`, `username`, `password`) VALUES
(25, '13', '$2y$10$V5b3PUDX63S1x.NVI4M/xOltaSCUOvuKE7wb7nSGQHWhiqcTZcBsq');

-- --------------------------------------------------------

--
-- Table structure for table `akun_guru`
--

CREATE TABLE `akun_guru` (
  `id_akun` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_guru`
--

INSERT INTO `akun_guru` (`id_akun`, `username`, `password`) VALUES
(8, '12', '$2y$10$e3lZlYIiSu.BSndayS.voOhi45UHpQiPvEWFvOgTYguLbboDdzg5e'),
(10, '14', '$2y$10$ZPcWkN7U17c7P3tNCBF.yuX3Mgb2FLk0qHP7INVGETmFCMxjD3OE.'),
(11, '15', '$2y$10$ktIp7f2V0Ny3tduKd8DMD.xZg6oODxiRX.bsGRHrFVJafp/7mpyeS');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id_bukti` int(11) NOT NULL,
  `id_absen` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `foto_bukti` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_catatan` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id_catatan`, `id_akun`, `tanggal`, `isi`) VALUES
(2, 8, '2012-12-19', '1121');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_akun`, `nama_kelas`) VALUES
(1, 8, '12'),
(2, 8, '13'),
(3, 8, '15'),
(4, 8, '16'),
(5, 8, '17'),
(6, 8, '17'),
(8, 8, '11'),
(9, 8, '17'),
(10, 10, '11');

-- --------------------------------------------------------

--
-- Table structure for table `profile_admin`
--

CREATE TABLE `profile_admin` (
  `id_profile` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto_profile` varchar(200) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_admin`
--

INSERT INTO `profile_admin` (`id_profile`, `id_akun`, `nama`, `alamat`, `foto_profile`, `level`) VALUES
(14, 25, '13', '13', 'images/foto-profile/admin/face2.jpg', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `profile_guru`
--

CREATE TABLE `profile_guru` (
  `id_profile` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `foto_profile` varchar(200) NOT NULL,
  `level` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_guru`
--

INSERT INTO `profile_guru` (`id_profile`, `id_akun`, `nama`, `alamat`, `noHp`, `foto_profile`, `level`) VALUES
(6, 8, '12', '12', '12', 'images/foto-profile/guru/face9.jpg', 'Guru'),
(8, 10, '14', '14', '14', 'images/foto-profile/guru/face2.jpg', 'Guru'),
(9, 11, '15', '15', '15', 'images/foto-profile/guru/face16.jpg', 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat_siswa` varchar(200) NOT NULL,
  `noHp` varchar(20) NOT NULL,
  `foto_profile` varchar(100) NOT NULL,
  `catatan_khusus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_kelas`, `nama_siswa`, `jenis_kelamin`, `alamat_siswa`, `noHp`, `foto_profile`, `catatan_khusus`) VALUES
(1, 1, '132', 'Perempuan', '132', '3123', 'images/foto-profile/siswa/face10.jpg', '3123123'),
(2, 1, '132', 'Perempuan', '132', '3123', 'images/foto-profile/siswa/face10.jpg', '3123123'),
(3, 1, 'Yazid', 'Perempuan', '312', '321', 'images/foto-profile/siswa/face19.jpg', '321'),
(4, 3, 'Wanda', 'Perempuan', '4123', '4312', 'images/foto-profile/siswa/face10.jpg', '4132');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`),
  ADD KEY `absen to kegiatan` (`id_kegiatan`),
  ADD KEY `absen to siswa` (`id_siswa`);

--
-- Indexes for table `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `akun_guru`
--
ALTER TABLE `akun_guru`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bukti`),
  ADD KEY `bukti to kelas` (`id_kelas`),
  ADD KEY `bukti to absen` (`id_absen`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `catatan to akun_guru` (`id_akun`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `kegiatan to kelas` (`id_kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas to akun_guru` (`id_akun`);

--
-- Indexes for table `profile_admin`
--
ALTER TABLE `profile_admin`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `profile_admin to akun_admin` (`id_akun`);

--
-- Indexes for table `profile_guru`
--
ALTER TABLE `profile_guru`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `profile_guru to akun_guru` (`id_akun`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `murid to kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `akun_guru`
--
ALTER TABLE `akun_guru`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile_admin`
--
ALTER TABLE `profile_admin`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile_guru`
--
ALTER TABLE `profile_guru`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen to kegiatan` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `absen to siswa` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `bukti to absen` FOREIGN KEY (`id_absen`) REFERENCES `absen` (`id_absen`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bukti to kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `catatan`
--
ALTER TABLE `catatan`
  ADD CONSTRAINT `catatan to akun_guru` FOREIGN KEY (`id_akun`) REFERENCES `akun_guru` (`id_akun`) ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan to kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas to akun_guru` FOREIGN KEY (`id_akun`) REFERENCES `akun_guru` (`id_akun`) ON UPDATE CASCADE;

--
-- Constraints for table `profile_admin`
--
ALTER TABLE `profile_admin`
  ADD CONSTRAINT `profile_admin to akun_admin` FOREIGN KEY (`id_akun`) REFERENCES `akun_admin` (`id_akun`) ON UPDATE CASCADE;

--
-- Constraints for table `profile_guru`
--
ALTER TABLE `profile_guru`
  ADD CONSTRAINT `profile_guru to akun_guru` FOREIGN KEY (`id_akun`) REFERENCES `akun_guru` (`id_akun`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `murid to kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
