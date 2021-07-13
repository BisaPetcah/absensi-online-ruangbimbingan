-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 12, 2021 at 10:13 PM
-- Server version: 8.0.23
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-07-12-074716', 'App\\Database\\Migrations\\Role', 'default', 'App', 1626076448, 1),
(2, '2021-07-12-074723', 'App\\Database\\Migrations\\User', 'default', 'App', 1626076448, 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_aktivitas`
--

CREATE TABLE `m_aktivitas` (
  `aktivitas_id` int NOT NULL,
  `aktivitas_nama` varchar(100) NOT NULL,
  `aktivitas_tanggal` date NOT NULL,
  `aktivitas_waktumulai` time NOT NULL,
  `aktivitas_waktuselesai` time NOT NULL,
  `aktivitas_keterangan` text NOT NULL,
  `aktivitas_fotobukti` varchar(200) NOT NULL,
  `aktivitas_programid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_pertanyaan`
--

CREATE TABLE `m_pertanyaan` (
  `pertanyaan_id` int NOT NULL,
  `pertanyaan_kritik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pertanyaan_saran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_profile`
--

CREATE TABLE `m_profile` (
  `profile_id` int NOT NULL,
  `profile_nama` varchar(100) NOT NULL,
  `profile_jenisKelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `profile_noHp` varchar(15) DEFAULT NULL,
  `profile_alamat` varchar(100) NOT NULL,
  `profile_foto` varchar(100) DEFAULT NULL,
  `profile_userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_profile`
--

INSERT INTO `m_profile` (`profile_id`, `profile_nama`, `profile_jenisKelamin`, `profile_noHp`, `profile_alamat`, `profile_foto`, `profile_userid`) VALUES
(10, 'Ma\'isy Yazid I', 'Laki-laki', '089530050567', 'Banjar', '/images/faces/face1.jpg', 22),
(12, 'asdfa', 'Laki-laki', '081241125112', 'asdagsag', '', 25),
(13, 'afasf', 'Laki-laki', '0812412414125', 'vadfag', '', 26),
(14, 'afasd', 'Laki-laki', '0812412511124', 'saa', '', 28);

-- --------------------------------------------------------

--
-- Table structure for table `m_program`
--

CREATE TABLE `m_program` (
  `program_id` int NOT NULL,
  `program_nama` varchar(100) NOT NULL,
  `program_deskripsi` text,
  `program_pembimbingid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_program`
--

INSERT INTO `m_program` (`program_id`, `program_nama`, `program_deskripsi`, `program_pembimbingid`) VALUES
(5, 'asdgadsa', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad alias aliquam architecto, asperiores at atque corporis cupiditate deleniti dicta distinctio enim iusto laborum libero minus placeat praesentium quae quas quos sunt unde vel veniam. Accusantium, amet, dolorem doloribus iste iure iusto maxime molestias natus odio optio, pariatur provident repudiandae.', 22),
(6, 'asfa', 'asfagasga', 22);

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE `m_role` (
  `role_id` int NOT NULL,
  `role_nama` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_role`
--

INSERT INTO `m_role` (`role_id`, `role_nama`) VALUES
(1, 'admin'),
(2, 'pembimbing'),
(3, 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int NOT NULL,
  `user_username` varchar(126) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_isActive` tinyint(1) NOT NULL,
  `user_roleid` int NOT NULL,
  `user_addedby` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_isActive`, `user_roleid`, `user_addedby`) VALUES
(22, 'yazid', 'yazid@gmail.com', '$2y$10$d.pdk4WMQEDV86zOOANgpOwWQuSFx4AfDwRCdQZbSupP/PKomD826', 1, 2, NULL),
(25, 'asfaf', 'afs@aaga.asda', '$2y$10$d4jCxEi6HAcMzd3PgxYGButYau2VR903iRXIPJmmec0mB//dfxJjq', 1, 3, 22),
(26, 'asdf', 'masfa@asfa.fas', '$2y$10$3cP8aHtV6tE86xM0vkpiW.0njNCpOrK.FE9ZuxW9sMnlM0HTw/Cle', 1, 3, 22),
(28, 'asdgadsga', 'adfs@fdafa.casd', '$2y$10$Fgp.NGFPWe/ZMR8BIoWzW.0ssiimhA8tXSwfvi/m.owtJto4GMOWW', 1, 3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `m_waktu`
--

CREATE TABLE `m_waktu` (
  `waktu_id` int NOT NULL,
  `waktu_programId` int DEFAULT NULL,
  `waktu_hari` varchar(32) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_waktu`
--

INSERT INTO `m_waktu` (`waktu_id`, `waktu_programId`, `waktu_hari`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 5, 'Senin', '10:00:00', '11:00:00'),
(2, 5, 'Selasa', '10:00:00', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_absen`
--

CREATE TABLE `t_absen` (
  `absen_id` int NOT NULL,
  `absen_userid` int NOT NULL,
  `absen_aktivitasid` int NOT NULL,
  `absen_status` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_feedback`
--

CREATE TABLE `t_feedback` (
  `feedback_id` int NOT NULL,
  `feedback_kritik` text NOT NULL,
  `feedback_saran` text NOT NULL,
  `feedback_rating` int NOT NULL,
  `feedback_pertanyaan` int NOT NULL,
  `feedback_aktivitasid` int NOT NULL,
  `feedback_siswaid` int NOT NULL,
  `feedback_pembimbingid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_userprogram`
--

CREATE TABLE `t_userprogram` (
  `userprogram_id` int NOT NULL,
  `userprogram_siswaid` int NOT NULL,
  `userprogram_programid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_userprogram`
--

INSERT INTO `t_userprogram` (`userprogram_id`, `userprogram_siswaid`, `userprogram_programid`) VALUES
(1, 25, 5),
(2, 26, 5),
(3, 28, 5),
(4, 25, 6),
(5, 26, 6),
(6, 28, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_aktivitas`
--
ALTER TABLE `m_aktivitas`
  ADD PRIMARY KEY (`aktivitas_id`),
  ADD KEY `m_program to m_aktivitas` (`aktivitas_programid`);

--
-- Indexes for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  ADD PRIMARY KEY (`pertanyaan_id`);

--
-- Indexes for table `m_profile`
--
ALTER TABLE `m_profile`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `m_profile to m_user` (`profile_userid`);

--
-- Indexes for table `m_program`
--
ALTER TABLE `m_program`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `m_program to m_user` (`program_pembimbingid`);

--
-- Indexes for table `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `m_role to m_user` (`user_roleid`),
  ADD KEY `m_user to m_user_user_id` (`user_addedby`);

--
-- Indexes for table `m_waktu`
--
ALTER TABLE `m_waktu`
  ADD PRIMARY KEY (`waktu_id`),
  ADD KEY `t_waktu_m_program_program_id_fk` (`waktu_programId`);

--
-- Indexes for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`absen_id`),
  ADD KEY `m_user to m_absen` (`absen_userid`),
  ADD KEY `m_aktivitas to m_absen` (`absen_aktivitasid`);

--
-- Indexes for table `t_feedback`
--
ALTER TABLE `t_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `m_user(siswa) to t_feedback` (`feedback_siswaid`),
  ADD KEY `m_user(pembiming) to t_feedback` (`feedback_pembimbingid`),
  ADD KEY `m_aktivitas to t_feedback` (`feedback_aktivitasid`),
  ADD KEY `m_pertanyaan to t_feedback` (`feedback_pertanyaan`);

--
-- Indexes for table `t_userprogram`
--
ALTER TABLE `t_userprogram`
  ADD PRIMARY KEY (`userprogram_id`),
  ADD KEY `m_program to t_userprogram` (`userprogram_programid`),
  ADD KEY `m_user to t_userprogram` (`userprogram_siswaid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_aktivitas`
--
ALTER TABLE `m_aktivitas`
  MODIFY `aktivitas_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  MODIFY `pertanyaan_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_profile`
--
ALTER TABLE `m_profile`
  MODIFY `profile_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `m_program`
--
ALTER TABLE `m_program`
  MODIFY `program_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_role`
--
ALTER TABLE `m_role`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `m_waktu`
--
ALTER TABLE `m_waktu`
  MODIFY `waktu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `absen_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_feedback`
--
ALTER TABLE `t_feedback`
  MODIFY `feedback_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_userprogram`
--
ALTER TABLE `t_userprogram`
  MODIFY `userprogram_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_aktivitas`
--
ALTER TABLE `m_aktivitas`
  ADD CONSTRAINT `m_program to m_aktivitas` FOREIGN KEY (`aktivitas_programid`) REFERENCES `m_program` (`program_id`) ON UPDATE CASCADE;

--
-- Constraints for table `m_profile`
--
ALTER TABLE `m_profile`
  ADD CONSTRAINT `m_profile to m_user` FOREIGN KEY (`profile_userid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `m_program`
--
ALTER TABLE `m_program`
  ADD CONSTRAINT `m_program to m_user` FOREIGN KEY (`program_pembimbingid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_role to m_user` FOREIGN KEY (`user_roleid`) REFERENCES `m_role` (`role_id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `m_user to m_user_user_id` FOREIGN KEY (`user_addedby`) REFERENCES `m_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_waktu`
--
ALTER TABLE `m_waktu`
  ADD CONSTRAINT `t_waktu_m_program_program_id_fk` FOREIGN KEY (`waktu_programId`) REFERENCES `m_program` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_absen`
--
ALTER TABLE `t_absen`
  ADD CONSTRAINT `m_aktivitas to m_absen` FOREIGN KEY (`absen_aktivitasid`) REFERENCES `m_aktivitas` (`aktivitas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `m_user to m_absen` FOREIGN KEY (`absen_userid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `t_feedback`
--
ALTER TABLE `t_feedback`
  ADD CONSTRAINT `m_aktivitas to t_feedback` FOREIGN KEY (`feedback_aktivitasid`) REFERENCES `m_aktivitas` (`aktivitas_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `m_pertanyaan to t_feedback` FOREIGN KEY (`feedback_pertanyaan`) REFERENCES `m_pertanyaan` (`pertanyaan_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `m_user(pembiming) to t_feedback` FOREIGN KEY (`feedback_pembimbingid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `m_user(siswa) to t_feedback` FOREIGN KEY (`feedback_siswaid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `t_userprogram`
--
ALTER TABLE `t_userprogram`
  ADD CONSTRAINT `m_program to t_userprogram` FOREIGN KEY (`userprogram_programid`) REFERENCES `m_program` (`program_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `m_user to t_userprogram` FOREIGN KEY (`userprogram_siswaid`) REFERENCES `m_user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
