-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2011 at 01:27 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scrummasterdb`
--
CREATE DATABASE `scrummasterdb` DEFAULT CHARACTER SET swe7 COLLATE swe7_bin;
USE `scrummasterdb`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id key',
  `post` longtext COLLATE utf8_swedish_ci NOT NULL COMMENT 'post inlägget',
  `namn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `post`, `namn`) VALUES
(5, 'test 111', 'Anonym'),
(6, 'test 111', 'Anonym'),
(7, 'test 333', 'Anonym'),
(11, 'test 7777', 'Anonym'),
(12, 'noughsndfog hseÃ¶gsnhvnseoghsogvuish gsoghsogsheg oshgshosgg odfhgofghfÃ¶gÃ¶sdfggsgsdÃ¶fg sdgsgkfgjsfjksfvskfksdvÃ¶skjd vfkvsvsjkvsjkfsvvsvks nbfknbjfkgbfÃ¶gbngÃ¶jfdfÃ¶gf gÃ¶dfjÃ¶dgfbdjdgÃ¶', 'Anonym'),
(14, 'sdfghsdfoghsdoghd', 'Anonym');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
