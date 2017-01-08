-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 192.168.99.100    Database: soldier
-- ------------------------------------------------------
-- Server version	5.5.53

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
-- Table structure for table `departs`
--

DROP TABLE IF EXISTS `departs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `latest_date` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departs`
--

LOCK TABLES `departs` WRITE;
/*!40000 ALTER TABLE `departs` DISABLE KEYS */;
INSERT INTO `departs` VALUES (14,'รพ.ค่ายสุรศักดิ์','2016-09-01 14:10:44','I am admin',1),(15,'รพ.ค่ายนเรศวร','2016-09-01 14:13:48','I am admin',2);
/*!40000 ALTER TABLE `departs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diags`
--

DROP TABLE IF EXISTS `diags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `hos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (1,'dummy 001','2017-01-04 10:19:45','I am admin'),(2,'dummy 002','2017-01-04 10:19:47','I am admin'),(3,'dummy 003','2017-01-04 10:19:49','I am admin');
/*!40000 ALTER TABLE `hospital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'gallerys/9/d29189efe2a0c7f26f9874c8eaff3dba.jpg',1,'2016-08-19 14:33:08','I am admin');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `data` longtext,
  `category` int(11) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `idcard` varchar(13) DEFAULT NULL,
  `house_no` varchar(255) DEFAULT NULL,
  `tambon` varchar(255) DEFAULT NULL,
  `amphur` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL,
  `diag` text COMMENT 'โรคที่ตรวจพบ',
  `regula` varchar(255) DEFAULT NULL,
  `doctor` text,
  `date_add` date DEFAULT NULL COMMENT 'วันที่ได้รับการตรวจ',
  `diag_etc` text,
  `hos_id` int(11) DEFAULT NULL,
  `owner` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL COMMENT 'วันที่บันทึกข้อมูล',
  `cert` text COMMENT 'ใบสำคัญความเห็นแพทย์',
  `status` tinyint(2) DEFAULT NULL COMMENT 'สถานะ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'ทดสอบ','ทดลอง','1509900230000','102/3','ทดสอบตำบล','ทดสอบอำเภอ','ทดสอบจังหวัด','50000','ทดสอบ Diag','2(9)(ค)','[\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e481\",\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e482\",\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e483\"]','2017-01-06',NULL,1,'I am admin','2017-01-06 15:25:23','4dddc8848e478f19614b14cc4339db95.pdf',1),(2,'ทดสอบ','ทดลอง','1509900230000','102/3','ทดสอบตำบล','ทดสอบอำเภอ','ทดสอบจังหวัด','50000','ทดสอบ Diag','2(9)(ค)','[\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e481\",\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e482\",\"\\u0e2b\\u0e21\\u0e2d\\u0e04\\u0e19\\u0e17\\u0e35\\u0e483\"]','2017-01-06',NULL,1,'I am admin','2017-01-06 15:29:42','89f158ec0dd88e4fa185f013ef1b7691.pdf',0);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular`
--

DROP TABLE IF EXISTS `regular`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT 'user',
  `status` tinyint(4) DEFAULT '0',
  `hos_id` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'I am admin','admin','15c0249e5d926ff74ec114e9c477b0a1f04965b3ed4503a08ec129c27114b27c','admin@mail.com','super admin',1,'1','2016-12-31 15:00:05'),(5,'admin สุรศักดิ์','adminsurasak','9982ead73bc3b53618731285ba708f3194bab4a9fadf1a46812b64461230ea9e','adminsurasak@mi.th','admin',1,'1','2016-12-31 15:04:47'),(6,'ผู้ดูแล ระบบ2','admin2','786d789bd900e5558be7fc004841bbf5eede57cf0e37f9decda8454dd0cbc9f9','admin2@mail.com','admin',1,'2','2017-01-07 08:13:43');
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

-- Dump completed on 2017-01-08 12:06:53
