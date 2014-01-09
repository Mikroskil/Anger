-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2014 at 02:38 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pkti`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nama_sekolah` varchar(100) CHARACTER SET utf8 NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8 NOT NULL,
  `no_handphone` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `isian`
--

CREATE TABLE IF NOT EXISTS `isian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_latihan` int(11) NOT NULL,
  `soal` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `latihan` (`id_latihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `isian`
--

INSERT INTO `isian` (`id`, `id_latihan`, `soal`) VALUES
(5, 1, 'dcdcdcdvsdvcsdcvsd'),
(6, 1, 'dfvssdvfdsfvdsvcsd');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_isian`
--

CREATE TABLE IF NOT EXISTS `jawaban_isian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_isian` int(11) NOT NULL,
  `jawaban` varchar(500) CHARACTER SET utf8 NOT NULL,
  `poin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`id_user`),
  KEY `latihan` (`id_latihan`),
  KEY `isian` (`id_isian`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_pilgan`
--

CREATE TABLE IF NOT EXISTS `jawaban_pilgan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `id_pilgan` int(11) NOT NULL,
  `jawaban` enum('A','B','C','D','E') CHARACTER SET utf8 NOT NULL,
  `hasil` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`id_user`),
  KEY `latihan` (`id_latihan`),
  KEY `pilgan` (`id_pilgan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Aljabar'),
(2, 'Trigonometri');

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE IF NOT EXISTS `latihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_tipe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipe` (`id_tipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id`, `judul`, `id_tipe`) VALUES
(1, 'testing', 2),
(2, 'ujian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE IF NOT EXISTS `materi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isi` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kategori` (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul`, `id_kategori`, `isi`) VALUES
(5, 'asas', 1, 'lololol'),
(7, 'asd', 2, 'sadsddsad'),
(8, 'qwert', 1, 'qwert'),
(9, 'qwertyui', 2, 'qwertzzz'),
(10, 'alkali', 2, 'ali');

-- --------------------------------------------------------

--
-- Table structure for table `pilihan_ganda`
--

CREATE TABLE IF NOT EXISTS `pilihan_ganda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_latihan` int(11) NOT NULL,
  `soal` varchar(500) CHARACTER SET utf8 NOT NULL,
  `jawaban` enum('A','B','C','D','E') CHARACTER SET utf8 NOT NULL,
  `pilihan_1` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pilihan_2` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pilihan_3` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pilihan_4` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pilihan_5` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `latihan` (`id_latihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pilihan_ganda`
--

INSERT INTO `pilihan_ganda` (`id`, `id_latihan`, `soal`, `jawaban`, `pilihan_1`, `pilihan_2`, `pilihan_3`, `pilihan_4`, `pilihan_5`) VALUES
(3, 2, 'sjknckdsnvkdsnvksndkvlnsdkncvsd', 'D', 'dsvcsdcsd', 'dscsdcsdc', 'dscsdcsd', 'dscsxvcsdd', 'sdcvdsvcds'),
(4, 2, 'dsvcnkdsnvlkdsnmlvmdslcmvlsdnmvclsd', 'A', 'dscvdscvsd', 'dscvdsvcds', 'dvdsvsd', 'dsvdsv', 'dvdsvsd');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'siswa'),
(2, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tempat_lahir` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_sekolah` varchar(100) CHARACTER SET utf8 NOT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8 NOT NULL,
  `agama` enum('ISLAM','KRISTEN','BUDDHA','HINDU') CHARACTER SET utf8 NOT NULL,
  `alamat` varchar(100) CHARACTER SET utf8 NOT NULL,
  `no_telepon` varchar(15) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_latihan`
--

CREATE TABLE IF NOT EXISTS `tipe_latihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tipe_latihan`
--

INSERT INTO `tipe_latihan` (`id`, `tipe`) VALUES
(1, 'Pilihan Ganda'),
(2, 'Isian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('david', 'a'),
('tes', 'tes');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id_role` (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `username`, `id_role`) VALUES
(1, 'david', 2),
(2, 'tes', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `isian`
--
ALTER TABLE `isian`
  ADD CONSTRAINT `isian_ibfk_1` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`);

--
-- Constraints for table `jawaban_isian`
--
ALTER TABLE `jawaban_isian`
  ADD CONSTRAINT `jawaban_isian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `jawaban_isian_ibfk_2` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`),
  ADD CONSTRAINT `jawaban_isian_ibfk_3` FOREIGN KEY (`id_isian`) REFERENCES `isian` (`id`);

--
-- Constraints for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  ADD CONSTRAINT `jawaban_pilgan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `jawaban_pilgan_ibfk_1` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`),
  ADD CONSTRAINT `jawaban_pilgan_ibfk_2` FOREIGN KEY (`id_pilgan`) REFERENCES `pilihan_ganda` (`id`);

--
-- Constraints for table `latihan`
--
ALTER TABLE `latihan`
  ADD CONSTRAINT `latihan_ibfk_1` FOREIGN KEY (`id_tipe`) REFERENCES `tipe_latihan` (`id`);

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `pilihan_ganda`
--
ALTER TABLE `pilihan_ganda`
  ADD CONSTRAINT `pilihan_ganda_ibfk_1` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
