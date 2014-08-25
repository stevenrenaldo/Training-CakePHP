-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2014 at 07:18 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dabdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `prodis`
--

CREATE TABLE IF NOT EXISTS `prodis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`id`, `kode`, `nama`) VALUES
(1, '71', 'Teknik Informatika'),
(3, '72', 'Sistem Informasi'),
(4, '11', 'Manajemen'),
(5, '12', 'Akuntansi'),
(6, '41', 'Kedokteran');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` char(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `filename` varchar(512) NOT NULL,
  `filepath` varchar(512) NOT NULL,
  `mime_type` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nim`, `nama`, `prodi_id`, `filename`, `filepath`, `mime_type`) VALUES
(1, '71110001', 'Budi', 1, 'logo ukdw.jpg', 'C:/xampp/htdocs/day1\\files\\photos\\students\\', 'image/jpeg'),
(2, '71110002', 'Robert', 1, '', '', ''),
(3, '71110003', 'Hendy', 1, 'shin_chan_by_troglod.jpg', 'C:/xampp/htdocs/day1\\files\\photos\\students\\', 'image/jpeg'),
(4, '72110001', 'Lidau', 3, 'reborn.jpg', 'C:/xampp/htdocs/day1\\files\\photos\\students\\', 'image/jpeg'),
(5, '72110002', 'Hagios', 3, '_chibi_habashira_hiruma_.JPG', 'C:/xampp/htdocs/day1\\files\\photos\\students\\', 'image/jpeg'),
(6, '11110001', 'Metals', 4, '', '', ''),
(7, '11110002', 'Adi', 4, '', '', ''),
(8, '12110001', 'Andika', 5, '', '', ''),
(9, '12110002', 'Susan', 5, '', '', ''),
(10, '41110001', 'Steve', 6, '', '', ''),
(11, '41110002', 'Dea', 6, '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
