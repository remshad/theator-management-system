/*
SQLyog Ultimate v8.55 
MySQL - 5.1.57-community : Database - theatre
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`theatre` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `theatre`;

/*Table structure for table `films` */

DROP TABLE IF EXISTS `films`;

CREATE TABLE `films` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `language` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `films` */

insert  into `films`(`id`,`name`,`language`,`category`,`image`) values (4,'Chanks','Malayalam','Comedy','poster5.jpg'),(5,'Divanjimoola','Malayalam','Comedy','poster11.jpg'),(3,'Ramaleela','Malayalam','Suspence Thriller','poster1.jpg');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`id`,`email`,`password`) values (1,'',''),(5,'admin@gmail.com','admin'),(6,'chippynv67@gmail.com','chippy'),(4,'johnyjoykalathil@gmail.com','johny');

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `moviename` varchar(100) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `review` varchar(1000) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `review` */

insert  into `review`(`id`,`moviename`,`language`,`review`,`rating`,`category`,`username`) values (5,'Ramaleela','Malayalam','superr moviee',5,'Suspence Thriller','johny'),(6,'Chanks','Malayalam','it is an average film',3,'Comedy','chippy nv'),(7,'Ramaleela','Malayalam','nice one',4,'Suspence Thriller','chippy nv');

/*Table structure for table `signup` */

DROP TABLE IF EXISTS `signup`;

CREATE TABLE `signup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `phoneno` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `signup` */

insert  into `signup`(`id`,`name`,`age`,`phoneno`,`email`,`password`) values (1,'admin','','','admin@gmail.com','admin'),(5,'chippy nv','20','9946553284','chippynv67@gmail.com','chippy'),(4,'johny','23','9946553284','johnyjoykalathil@gmail.com','johny');

/*Table structure for table `theatre` */

DROP TABLE IF EXISTS `theatre`;

CREATE TABLE `theatre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `theatrename` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `screen1` varchar(100) DEFAULT NULL,
  `showtime1` varchar(50) DEFAULT NULL,
  `screen2` varchar(100) DEFAULT NULL,
  `showtime2` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `theatre` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
