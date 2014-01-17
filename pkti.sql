-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 13, 2014 at 09:10 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `latihan` (`id_latihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `isian`
--

INSERT INTO `isian` (`id`, `id_latihan`, `soal`, `aktif`) VALUES
(5, 1, 'Berapa banyak sisi dari persegi ?', 1),
(6, 1, 'Berapa akar dari 25 ?', 1),
(7, 1, 'yeryt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_isian`
--

CREATE TABLE IF NOT EXISTS `jawaban_isian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(30) CHARACTER SET utf8 NOT NULL,
  `id_latihan` int(11) NOT NULL,
  `jawaban` varchar(100) CHARACTER SET utf8 NOT NULL,
  `poin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`id_user`),
  KEY `latihan` (`id_latihan`)
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
  `jawaban` enum('A','B','C','D','E','F') CHARACTER SET utf8 NOT NULL,
  `hasil` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`id_user`),
  KEY `latihan` (`id_latihan`),
  KEY `pilgan` (`id_pilgan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `jawaban_pilgan`
--

INSERT INTO `jawaban_pilgan` (`id`, `id_user`, `id_latihan`, `id_pilgan`, `jawaban`, `hasil`) VALUES
(33, 'david', 2, 3, 'D', 1),
(34, 'david', 2, 4, 'A', 1),
(35, 'david', 2, 3, 'E', 0);

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
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_tipe` (`id_tipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `latihan`
--

INSERT INTO `latihan` (`id`, `judul`, `id_tipe`, `aktif`) VALUES
(1, 'test', 2, 1),
(2, 'try out', 1, 1),
(4, 'qwertyuiop', 1, 0),
(5, 'ol', 2, 0),
(8, 'testing', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `judul`, `id_kategori`, `isi`) VALUES
(8, 'qwert', 1, 'qwert'),
(9, 'qwertyui', 2, 'qwertzzz'),
(10, 'alkali', 2, 'ali'),
(11, 'x dan y', 1, 'x dan y');

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
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `latihan` (`id_latihan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pilihan_ganda`
--

INSERT INTO `pilihan_ganda` (`id`, `id_latihan`, `soal`, `jawaban`, `pilihan_1`, `pilihan_2`, `pilihan_3`, `pilihan_4`, `pilihan_5`, `aktif`) VALUES
(3, 2, '12 - 9 = ...', 'C', '2', '4', '3', '1', '5', 0),
(4, 2, '6 * 3 = ...', 'A', '18', '6', '9', '12', '10', 1),
(5, 2, '5 - 3 = ...', 'B', '6', '2', '4', '1', '3', 1),
(6, 8, '456+465=...', 'D', '354', '456', '756', '921', '847', 1);

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
  ADD CONSTRAINT `jawaban_isian_ibfk_2` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`);

--
-- Constraints for table `jawaban_pilgan`
--
ALTER TABLE `jawaban_pilgan`
  ADD CONSTRAINT `jawaban_pilgan_ibfk_1` FOREIGN KEY (`id_latihan`) REFERENCES `latihan` (`id`),
  ADD CONSTRAINT `jawaban_pilgan_ibfk_2` FOREIGN KEY (`id_pilgan`) REFERENCES `pilihan_ganda` (`id`),
  ADD CONSTRAINT `jawaban_pilgan_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`username`);

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
