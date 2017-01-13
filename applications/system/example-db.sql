-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: soldier
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Not dumping tablespaces as no INFORMATION_SCHEMA.FILES table on this server
--

--
-- Table structure for table `diags`
--

DROP TABLE IF EXISTS `diags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diags` (
  `id` int(11) NOT NULL auto_increment,
  `name` text,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='โรคที่ตรวจพบ';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diags`
--

LOCK TABLES `diags` WRITE;
/*!40000 ALTER TABLE `diags` DISABLE KEYS */;
/*!40000 ALTER TABLE `diags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `hos_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctors`
--

LOCK TABLES `doctors` WRITE;
/*!40000 ALTER TABLE `doctors` DISABLE KEYS */;
/*!40000 ALTER TABLE `doctors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hospital`
--

DROP TABLE IF EXISTS `hospital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hospital` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `date` datetime default NULL,
  `author` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (1,'รพ.ค่ายสุรศักดิ์มนตรี','2017-01-13 10:21:03','I am super admin'),(2,'รพ.ค่ายกาวิละ','2017-01-13 10:21:23','I am super admin'),(3,'รพ.ค่ายจิรประวัติ','2017-01-13 10:21:33','I am super admin');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL auto_increment,
  `firstname` varchar(255) default NULL,
  `lastname` varchar(255) default NULL,
  `idcard` varchar(13) default NULL,
  `house_no` varchar(255) default NULL,
  `tambon` varchar(255) default NULL,
  `amphur` varchar(255) default NULL,
  `province` varchar(255) default NULL,
  `zipcode` varchar(5) default NULL,
  `diag` text COMMENT 'โรคที่ตรวจพบ',
  `regula` varchar(255) default NULL,
  `doctor` text,
  `date_add` date default NULL COMMENT 'วันที่ได้รับการตรวจ',
  `diag_etc` text,
  `hos_id` int(11) default NULL,
  `owner` varchar(45) default NULL,
  `date` datetime default NULL COMMENT 'วันที่บันทึกข้อมูล',
  `cert` text COMMENT 'ใบสำคัญความเห็นแพทย์',
  `status` tinyint(2) default NULL COMMENT 'สถานะ',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'กฤตนัย','ร่องบอน','1540300119554','86/4 ม.5','บ้านปิน','ลอง','แพร่','54150','โรคของต่อมไร้ท่อและภาวะผิดปกติของ เมตะบอลิสัม','๒ (๘) (ง)','[\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e19\\u0e20\\u0e2a\\u0e21\\u0e23 \\u0e18\\u0e23\\u0e23\\u0e21\\u0e25\\u0e31\\u0e01\\u0e29\\u0e21\\u0e35\",\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\"]','2016-10-05',NULL,1,'I am super admin','2017-01-13 11:36:49','ff5df0f75323c63493b9be37cd567702.pdf',1);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular`
--

DROP TABLE IF EXISTS `regular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(45) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ข้อกฏกระทรวง';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular`
--

LOCK TABLES `regular` WRITE;
/*!40000 ALTER TABLE `regular` DISABLE KEYS */;
/*!40000 ALTER TABLE `regular` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `fullname` varchar(255) default NULL,
  `username` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `email` varchar(255) default NULL,
  `level` varchar(255) default 'user',
  `status` tinyint(4) default '0',
  `hos_id` varchar(45) default NULL,
  `date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'I am super admin','admin','bd3e160ec6c29f825709a7b6024925ef6ae15b5b6b93e34f72d2217db7e90de8','i_am_super_admin@mail.com','super admin',1,'1','2016-12-31 15:00:05'),(2,'Admin ค่ายกาวิละ','kawila','dbfc765626ec440605a4ce10c15e8645adfef4eed5b0f707bf20447a9e9eed5c','kawila@mail.com','admin',1,'2','2017-01-13 10:44:05'),(3,'Admin ค่ายจิรประวัติ','chiraprawat','cf595fa91226326357a161b7ed7bdcdf3bf6be25137dccafeb64202ce884062f','chiraprawat@mail.com','admin',1,'3','2017-01-13 10:53:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-13 14:13:46
