/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.19-MariaDB : Database - ci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ci` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `ci`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT 0,
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

/*Table structure for table `tbl_last_login` */

DROP TABLE IF EXISTS `tbl_last_login`;

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_last_login` */

insert  into `tbl_last_login`(`id`,`userId`,`sessionData`,`machineIp`,`userAgent`,`agentString`,`platform`,`createdDtm`) values (1,1,'{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}','::1','Chrome 91.0.4472.77','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36','Windows 10','2021-06-04 13:38:38'),(2,3,'{\"role\":\"3\",\"roleText\":\"Employee\",\"name\":\"Employee\"}','::1','Chrome 91.0.4472.77','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36','Windows 10','2021-06-05 00:33:13'),(3,1,'{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}','::1','Chrome 91.0.4472.77','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.77 Safari/537.36','Windows 10','2021-06-05 00:34:47');

/*Table structure for table `tbl_reset_password` */

DROP TABLE IF EXISTS `tbl_reset_password`;

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` bigint(20) NOT NULL DEFAULT 1,
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_reset_password` */

/*Table structure for table `tbl_roles` */

DROP TABLE IF EXISTS `tbl_roles`;

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text',
  PRIMARY KEY (`roleId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_roles` */

insert  into `tbl_roles`(`roleId`,`role`) values (1,'System Administrator'),(2,'Manager'),(3,'Employee');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT 0,
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`userId`,`email`,`password`,`name`,`mobile`,`roleId`,`isDeleted`,`createdBy`,`createdDtm`,`updatedBy`,`updatedDtm`) values (1,'admin@example.com','$2y$10$6NOKhXKiR2SAgpFF2WpCkuRgYKlSqFJaqM0NgIM3PT1gKHEM5/SM6','System Administrator','9890098900',1,0,0,'2015-07-01 18:56:49',1,'2018-01-05 05:56:34'),(2,'manager@example.com','$2y$10$quODe6vkNma30rcxbAHbYuKYAZQqUaflBgc4YpV9/90ywd.5Koklm','Manager','9890098900',2,0,1,'2016-12-09 17:49:56',1,'2018-01-12 07:22:11'),(3,'employee@example.com','$2y$10$UYsH1G7MkDg1cutOdgl2Q.ZbXjyX.CSjsdgQKvGzAgl60RXZxpB5u','Employee','9890098900',3,0,1,'2016-12-09 17:50:22',3,'2018-01-04 07:58:28');

/*Table structure for table `userdata` */

DROP TABLE IF EXISTS `userdata`;

CREATE TABLE `userdata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `userdata` */

insert  into `userdata`(`id`,`name`,`email`,`mobile`,`state`,`city`,`address`,`zipcode`,`comments`,`created_at`,`updated_at`) values (1,'ganesh yadav','test@gmail.com',2147483647,'1','bhilai','ruabandha sector bhilai','490006',NULL,'2021-06-05 00:17:55',NULL),(2,'ganesh yadav','test@gmail.com',2147483647,'1','bhilai','ruabandha sector bhilai','490006',NULL,'2021-06-05 00:18:42',NULL),(3,'ganesh yadav','test@gmail.com',2147483647,'1','bhilai','ruabandha sector bhilai','490006','$comments','2021-06-05 00:20:58',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
