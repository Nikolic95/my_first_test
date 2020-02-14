-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2019 at 12:20 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(250) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `category`) VALUES
(1, 'ekonomija'),
(2, 'politika'),
(3, 'biznis'),
(4, 'drustvo'),
(5, 'hronika');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `fk_users` (`id_user`),
  KEY `fk_posts` (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `comment`, `id_user`, `id_post`) VALUES
(2, 'Pedro Almodovar new movie in domestic cinemas.', 3, 2),
(3, 'WELL MY LITTLE THANK YOU FOR YOUR SMILE AND ANGLE', 2, 1),
(4, 'Interesting!', 2, 3),
(5, 'Let s play', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `post` text NOT NULL,
  `time` datetime NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `fk_category` (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post`, `time`, `id_category`) VALUES
(1, 'Compared to EU countries, Croatia is significantly rebounding on VAT revenues, which in 2017 amounted to as much as 13.2 percent of GDP, which is significantly higher than the EU average of seven percent of GDP. VAT revenues are growing strongly, exceeding HRK 51 billion (EUR 8.6 billion) last year, and in 2017 they were higher than HRK 47 billion (EUR 6.3 billion), writes Index.', '2019-10-23 03:16:12', 1),
(2, 'With the appointment of US Presidential Special Envoy for the Dialogue of Belgrade and Pristina Richard Grenel, otherwise the current US ambassador to Germany, two topics were raised in the domestic public - that America wants a solution for Kosovo as soon as possible and that the border could be restored again. Although the demarcation is not officially discussed, it seems that the thesis, at least in the eyes of experts and connoisseurs of the Balkans, is not without cover, all the more so given the fact that Grenel was appointed as an envoy directly with And, Berlin has, from the very mention of the idea of ​​demarcation as a possible solution to the Kosovo issue, its fierce opponent.Unlike German officials, Americans have lately been much softer in their views, saying that a viable solution to them is acceptable to them. who come to Belgrade and Pristina, not excluding in their statements the possibility of changing borders', '2019-10-10 06:34:05', 2),
(3, 'Croatia has one of the highest VAT rates in the European Union, which stands at 25 percent, Index.hr writes. Compared to EU countries, Croatia is significantly rebounding in VAT revenues, which in 2017 amounted to as much as 13 , 2 percent of GDP, well above the EU average of seven percent of GDP. VAT revenues are growing strongly, exceeding last year s HRK 51 billion (EUR 8.6 billion), and in 2017. were in excess of HRK 47 billion (EUR 6.3 billion)', '2019-10-17 04:25:40', 3),
(4, 'Screaming, chaos, selfies, but also book burning, Chetnik propaganda and good old tent bangers - maybe this looks more like a fair than a Book Fair. The truth is a little different. While the halls bear the names of our greatest writers they also discuss current literary happenings, and in parallel at the Fair appear personalities that provoke sharp controversy in the public. half - to those who elbow to be first in line for their new editions and signatures, to those who are baptized and disgusted with the estradication of one of the most important cultural events in the country.At the time fashion book blogger Zorannah first appeared at is already well known in these circles, at least among the young teenage girls whom she represents as the biggest fashion role model. She first appeared at the 2015 Book Fair with her guide \"Zo rannah life & style \"and that s when it causes a huge public outcry.', '2019-10-10 11:44:31', 4),
(5, 'new post', '2019-09-08 04:11:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'mare', 'maric'),
(3, 'maja', 'cerovina'),
(4, 'jana', 'jameson'),
(5, 'lexi', 'pantera');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_posts` FOREIGN KEY (`id_post`) REFERENCES `posts` (`id_post`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
