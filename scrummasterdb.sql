-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 10 nov 2011 kl 14:45
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `scrummasterdb`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `blog_post`
--

CREATE TABLE IF NOT EXISTS `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id key',
  `title` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `post` longtext COLLATE utf8_swedish_ci NOT NULL COMMENT 'post inlägget',
  `idnamn` int(11) NOT NULL,
  `category` int(4) NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `public` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=21 ;

--
-- Dumpning av Data i tabell `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `post`, `idnamn`, `category`, `datum`, `public`) VALUES
(17, 'Lorem ipsum', 'Nullam viverra, metus non vulputate imperdiet, nulla sem dignissim metus, id pharetra nulla ligula venenatis sapien. Nulla facilisi. Etiam velit diam, porta sed blandit sit amet, fermentum sed libero. Duis commodo metus non massa viverra pulvinar ultrices eros pharetra. Aliquam pulvinar neque sed lectus adipiscing pretium. Aenean ultrices metus a arcu vulputate ultricies. Aenean lobortis hendrerit bibendum. Etiam leo libero, commodo a elementum vel, malesuada vitae mauris.', 0, 4, '2011-11-10 13:40:41', 0),
(18, 'Lorem ipsum', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nam rutrum porttitor mauris nec aliquam. Sed sed ante eu libero pulvinar dapibus. Aliquam est sem, scelerisque ac faucibus in, lacinia sit amet felis. Proin auctor diam egestas diam laoreet congue. In quis odio non dolor placerat viverra. Sed vitae quam tellus. Nunc sed lacinia erat. Maecenas erat sapien, interdum ut fermentum eu, sollicitudin in dolor. Fusce in dolor nec sapien sodales ornare in nec mauris. Nullam rutrum, justo eu tincidunt condimentum, neque nisi imperdiet quam, ut cursus urna arcu id nisi. Mauris bibendum, dui ut fermentum lacinia, massa erat tincidunt arcu, vel fermentum augue risus ac ante. Maecenas tincidunt, mi eu accumsan accumsan, eros nisi cursus dolor, et venenatis enim ipsum at augue. Aliquam erat volutpat. Aenean vel ligula eget augue interdum porttitor eget at lectus.', 6, 1, '2011-11-10 13:41:33', 0),
(19, 'Lorem ipsum', 'Suspendisse dignissim, tortor in pretium ullamcorper, turpis lectus condimentum dolor, in molestie nibh dui nec libero. Maecenas eget augue dui, vulputate viverra lacus. Curabitur pulvinar mi a ligula tincidunt venenatis. Vivamus justo leo, cursus eget facilisis ac, condimentum a massa. Praesent non nunc erat, sit amet gravida felis. Nam tellus libero, vestibulum non pharetra ut, mollis at nisi. Fusce viverra mollis urna in scelerisque. Vestibulum fermentum posuere enim, dignissim hendrerit eros mattis a. Quisque semper velit non purus commodo rutrum. Phasellus a tellus ac diam pellentesque convallis. Proin suscipit dolor ac tortor semper quis elementum neque vehicula. Mauris scelerisque nulla turpis, non placerat dolor.', 7, 3, '2011-11-10 13:42:37', 0),
(20, 'Lorem ipsum', 'Vivamus ultricies volutpat vestibulum. Integer aliquam varius laoreet. Cras nec augue massa, et vestibulum metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent magna velit, mollis quis dapibus nec, sagittis ac sapien. Nunc interdum dictum nulla ac luctus. In hac habitasse platea dictumst. Sed non enim quis purus bibendum pretium.', 8, 1, '2011-11-10 13:43:30', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categori` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `categories`
--

INSERT INTO `categories` (`id`, `categori`) VALUES
(1, 'Klagom&aring;l'),
(2, 'Ber&ouml;m'),
(3, '&Ouml;nskem&aring;l'),
(4, 'Snick-snack');

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `body` text COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `website` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=swe7 COLLATE=swe7_bin AUTO_INCREMENT=9 ;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `website`) VALUES
(0, 'Anonym', '-', '-', '-'),
(6, 'Christoffer', 'pass', 'christoffer@christoffer.se', 'www.christoffer.se'),
(7, 'Rasmus', 'pass', 'rasmus@rasmus.se', 'www.rasmus.se'),
(8, 'Palle', 'pass', 'palle@palle.com', 'www.palle.se');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
