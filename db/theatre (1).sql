-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2018 at 06:29 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `filmname` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `bookedseats` varbinary(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `totalamount` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `name`, `price`, `quantity`, `totalamount`) VALUES
(2, 'popcorn', '30', '5', '150'),
(3, 'Ice cream', '15', '3', '45'),
(4, 'chips', '', '5', '0'),
(5, 'Ice cream', '15', '5', '75'),
(6, 'Ice cream', '15', '5', '75'),
(7, 'pups', '10', '5', '50');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `language`, `category`, `image`) VALUES
(4, 'Chanks', 'Malayalam', 'Comedy', 'poster5.jpg'),
(5, 'Divanjimoola', 'Malayalam', 'Comedy', 'poster11.jpg'),
(3, 'Ramaleela', 'Malayalam', 'Suspence Thriller', 'poster1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, '', ''),
(5, 'admin@gmail.com', 'admin'),
(6, 'chippynv67@gmail.com', 'chippy'),
(4, 'johnyjoykalathil@gmail.com', 'johny'),
(7, 'shameem@gmail.com', 'shameem');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moviename` varchar(100) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `moviename`, `language`, `review`, `rating`, `category`, `username`) VALUES
(5, 'Ramaleela', 'Malayalam', 'superr moviee', 5, 'Suspence Thriller', 'johny'),
(6, 'Chanks', 'Malayalam', 'it is an average film', 3, 'Comedy', 'chippy nv'),
(7, 'Ramaleela', 'Malayalam', 'nice one', 4, 'Suspence Thriller', 'chippy nv'),
(8, 'Divanjimoola', 'Malayalam', 'nys movie not bad', 4, 'Comedy', 'shameem'),
(9, 'Divanjimoola', 'Malayalam', 'superr movuieee', 3, 'Comedy', 'johny');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `phoneno` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `age`, `phoneno`, `email`, `password`) VALUES
(1, 'admin', '', '', 'admin@gmail.com', 'admin'),
(5, 'chippy nv', '20', '9946553284', 'chippynv67@gmail.com', 'chippy'),
(4, 'johny', '23', '9946553284', 'johnyjoykalathil@gmail.com', 'johny'),
(6, 'shameem', '23', '9876543125', 'shameem@gmail.com', 'shameem');

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE IF NOT EXISTS `snacks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`id`, `name`, `price`) VALUES
(1, 'popcorn', '30'),
(2, 'Ice cream', '15'),
(3, 'chips', '50'),
(4, 'pups', '10');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE IF NOT EXISTS `theatre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `theatrename` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `screen1` varchar(100) DEFAULT NULL,
  `screen2` varchar(20) NOT NULL,
  `morningshow` varchar(50) NOT NULL,
  `matinee` varchar(20) NOT NULL,
  `firstshow` varchar(20) NOT NULL,
  `secondshow` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`id`, `theatrename`, `district`, `screen1`, `screen2`, `morningshow`, `matinee`, `firstshow`, `secondshow`) VALUES
(1, 'kairali ', 'Alappuzha', 'chanks', 'ramaleela', ' 11:00', '02:00', '18:00', '21:00'),
(2, 'Sree', 'Ernakulam', 'AADHI', 'MASTERPIESE', '10:00', '14:00', '18:00', '21:00'),
(3, 'saritha', 'Ernakulam', 'Divanjimoola', 'Ramaleela', '10:00', '14:00', '18:00', '21:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
