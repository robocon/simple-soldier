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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hospital`
--

LOCK TABLES `hospital` WRITE;
/*!40000 ALTER TABLE `hospital` DISABLE KEYS */;
INSERT INTO `hospital` VALUES (1,'รพ.ค่ายสุรศักดิ์มนตรี','2017-01-13 10:21:03','I am super admin'),(2,'รพ.ค่ายกาวิละ','2017-01-13 10:21:23','I am super admin'),(3,'รพ.ค่ายจิรประวัติ','2017-01-13 10:21:33','I am super admin'),(4,'รพ.ค่ายสมเด็จฯ','2017-01-17 02:24:07','I am super admin'),(5,'รพ.ค่ายเม็งรายมหาราช','2017-01-17 02:24:16','I am super admin'),(6,'รพ.ค่ายพิชัยดาบหัก','2017-01-17 02:24:28','I am super admin'),(7,'รพ.ค่ายพ่อขุนผาเมือง','2017-01-17 02:24:48','I am super admin'),(8,'รพ.ค่ายสุริยพงษ์','2017-01-17 02:25:21','I am super admin'),(9,'รพ.ค่ายวชิรปราการ','2017-01-17 02:25:32','I am super admin'),(10,'รพ.ค่ายขุนเจืองธรรมมิกราช','2017-01-17 02:25:49','I am super admin');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patients`
--

LOCK TABLES `patients` WRITE;
/*!40000 ALTER TABLE `patients` DISABLE KEYS */;
INSERT INTO `patients` VALUES (1,'กฤตนัย','ร่องบอน','1540300119554','86/4 ม.5','บ้านปิน','ลอง','แพร่','','โรคของต่อมไร้ท่อและภาวะผิดปกติของ เมตะบอลิสัม','2 (8) (ง)','[\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e19\\u0e20\\u0e2a\\u0e21\\u0e23 \\u0e18\\u0e23\\u0e23\\u0e21\\u0e25\\u0e31\\u0e01\\u0e29\\u0e21\\u0e35\",\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\"]','2016-10-05',NULL,1,'I am super admin','2017-01-13 11:36:49','7e252b4f56261b4aeef407334893dc44.pdf',1),(2,'อภิชาติ','จ่าปัน','1529900812950','519 ถ.ไฮเวย์ลำปาง-งาว','หัวเวียง','เมือง','ลำปาง','','ตาข้างซ้ายบอด','2 (1) (ก) ','[\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e19\\u0e20\\u0e2a\\u0e21\\u0e23 \\u0e18\\u0e23\\u0e23\\u0e21\\u0e25\\u0e31\\u0e01\\u0e29\\u0e21\\u0e35\"]','2016-10-15',NULL,1,'I am super admin','2017-01-16 07:09:52','b88aa1be309bb33cc742f74294200813.pdf',1),(3,'กาเว็ง','ชาย','5959800042680','124/1 ม.9','น้ำโจ้','แม่ทะ','ลำปาง','','ค่าสายตาเฉลี่ยต่ำกว่า 3/60','2 (1) (ก) ','[\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e4c\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\"]','2016-10-15',NULL,1,'I am super admin','2017-01-16 07:12:37','c3920dad639948e1590625595dc0a288.pdf',1),(4,'ดุลยฤทธิ์','บุญทวี','1520800125430','47 ม.11','แม่สุก','แจ้ห่ม','ลำปาง','','มีความผิดปกติในทางพัฒนาการทางสังคมและภาษา','2 (11) (ค)(2)','[\"\\u0e19\\u0e20\\u0e2a\\u0e21\\u0e23 \\u0e18\\u0e23\\u0e23\\u0e21\\u0e25\\u0e31\\u0e01\\u0e29\\u0e21\\u0e35\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e27\\u0e23\\u0e27\\u0e34\\u0e17\\u0e22\\u0e4c \\u0e27\\u0e07\\u0e29\\u0e4c\\u0e21\\u0e13\\u0e35\"]','2016-10-11',NULL,1,'I am super admin','2017-01-16 07:15:39','4d1cdfa6c678ae3ad9dee691ced80e4e.pdf',1),(5,'พงศกร','ประกิจ','1640700112521','98 ม.8','บ้านใหม่','ทุ่งเสลี่ยม','สุโขทัย','','สายตาไม่ปกติเมื่อแก้ด้วยแว่นแล้ว','2 (1) (ข) ','[\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\"]','2016-10-18',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:33:02','a4a67e0dda3ce83595efa786552c911f.pdf',1),(6,'จักนรินทร์','จิตมานะ','1520500107274','38 ม.7','หลวงใต้','งาว','ลำปาง','','ลิ้นหัวใจพิการ','2 (3) (ข) ','[\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e28\\u0e38\\u0e20\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e4c \\u0e04\\u0e07\\u0e21\\u0e35\\u0e1c\\u0e25\"]','2016-10-28',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:35:12','81641f4d3efff8818208232c7a6deb43.pdf',1),(7,'ทรงพล','ยาวิชัยป้อง','1600100499425','94 ม.12','ร่องเคาะ','วังเหนือ','ลำปาง','','โรคถุงน้ำในปอด(Lung Cust)','2 (5) (ง) ','[\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e28\\u0e38\\u0e20\\u0e2a\\u0e34\\u0e17\\u0e18\\u0e34\\u0e4c \\u0e04\\u0e07\\u0e21\\u0e35\\u0e1c\\u0e25\"]','2016-11-01',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:37:40','4555581ad4b0ea6088494896e1a4a809.pdf',1),(8,'ลักษฎา','ขัติศรี','1520700104449','66/1 ม.2','ทุ่งฮั้ว','วังเหนือ','ลำปาง','','หัวใจและหลอดเลือดผิดปกติอย่างถาวร','2 (3) (ค)','[\"\\u0e40\\u0e0a\\u0e32\\u0e27\\u0e23\\u0e34\\u0e19\\u0e17\\u0e23\\u0e4c \\u0e2d\\u0e38\\u0e48\\u0e19\\u0e40\\u0e04\\u0e23\\u0e37\\u0e2d\",\"\\u0e1e\\u0e23\\u0e2a\\u0e38\\u0e14\\u0e32 \\u0e08\\u0e31\\u0e19\\u0e17\\u0e23\\u0e4c\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c\",\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\"]','2016-11-03',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:39:52','777a2f1f2f33a11dafb0adf93d03ed75.pdf',1),(9,'จิรายุทธ','อิ่นคำ','1579900546281','1116/24','เวียง','เมือง','เชียงราย','','สายตาไม่ปกติแม้แก้ด้วยแว่นแล้ว','(1) (ข)','[\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\",\"\\u0e19\\u0e20\\u0e2a\\u0e21\\u0e23 \\u0e18\\u0e23\\u0e23\\u0e21\\u0e25\\u0e31\\u0e01\\u0e29\\u0e21\\u0e35\",\"\\u0e1e\\u0e23\\u0e2a\\u0e38\\u0e14\\u0e32 \\u0e08\\u0e31\\u0e19\\u0e17\\u0e23\\u0e4c\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c\"]','2016-11-08',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:42:06','84b3c7c963fd28bce365de287ce676e6.pdf',1),(10,'ธนกานต์','บวรชัย','1579900648823','194 ม.6 ถ.ป่าแดด','ริมกก','เมือง','เชียงราย','','ตาข้างซ้ายบอด','2 (1) (ก)','[\"\\u0e1e\\u0e34\\u0e28\\u0e32\\u0e25 \\u0e28\\u0e34\\u0e23\\u0e34\\u0e0a\\u0e35\\u0e1e\\u0e0a\\u0e31\\u0e22\\u0e22\\u0e31\\u0e19\\u0e15\\u0e4c\",\"\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c \\u0e1b\\u0e23\\u0e35\\u0e14\\u0e32\\u0e2d\\u0e19\\u0e31\\u0e19\\u0e17\\u0e2a\\u0e38\\u0e02\",\"\\u0e1e\\u0e23\\u0e2a\\u0e38\\u0e14\\u0e32 \\u0e08\\u0e31\\u0e19\\u0e17\\u0e23\\u0e4c\\u0e13\\u0e23\\u0e07\\u0e04\\u0e4c\"]','2016-11-11',NULL,1,'Admin ค่ายสุรศักดิ์','2017-01-17 03:43:56','86550e151d66a616195dd6251f65d3e9.pdf',1);
/*!40000 ALTER TABLE `patients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `id` int(5) NOT NULL,
  `code` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `geography_id` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'10','กรุงเทพมหานคร','Bangkok',2),(2,'11','สมุทรปราการ','Samut Prakan',2),(3,'12','นนทบุรี','Nonthaburi',2),(4,'13','ปทุมธานี','Pathum Thani',2),(5,'14','พระนครศรีอยุธยา','Phra Nakhon Si Ayutthaya',2),(6,'15','อ่างทอง','Ang Thong',2),(7,'16','ลพบุรี','Loburi',2),(8,'17','สิงห์บุรี','Sing Buri',2),(9,'18','ชัยนาท','Chai Nat',2),(10,'19','สระบุรี','Saraburi',2),(11,'20','ชลบุรี','Chon Buri',5),(12,'21','ระยอง','Rayong',5),(13,'22','จันทบุรี','Chanthaburi',5),(14,'23','ตราด','Trat',5),(15,'24','ฉะเชิงเทรา','Chachoengsao',5),(16,'25','ปราจีนบุรี','Prachin Buri',5),(17,'26','นครนายก','Nakhon Nayok',2),(18,'27','สระแก้ว','Sa Kaeo',5),(19,'30','นครราชสีมา','Nakhon Ratchasima',3),(20,'31','บุรีรัมย์','Buri Ram',3),(21,'32','สุรินทร์','Surin',3),(22,'33','ศรีสะเกษ','Si Sa Ket',3),(23,'34','อุบลราชธานี','Ubon Ratchathani',3),(24,'35','ยโสธร','Yasothon',3),(25,'36','ชัยภูมิ','Chaiyaphum',3),(26,'37','อำนาจเจริญ','Amnat Charoen',3),(27,'39','หนองบัวลำภู','Nong Bua Lam Phu',3),(28,'40','ขอนแก่น','Khon Kaen',3),(29,'41','อุดรธานี','Udon Thani',3),(30,'42','เลย','Loei',3),(31,'43','หนองคาย','Nong Khai',3),(32,'44','มหาสารคาม','Maha Sarakham',3),(33,'45','ร้อยเอ็ด','Roi Et',3),(34,'46','กาฬสินธุ์','Kalasin',3),(35,'47','สกลนคร','Sakon Nakhon',3),(36,'48','นครพนม','Nakhon Phanom',3),(37,'49','มุกดาหาร','Mukdahan',3),(38,'50','เชียงใหม่','Chiang Mai',1),(39,'51','ลำพูน','Lamphun',1),(40,'52','ลำปาง','Lampang',1),(41,'53','อุตรดิตถ์','Uttaradit',1),(42,'54','แพร่','Phrae',1),(43,'55','น่าน','Nan',1),(44,'56','พะเยา','Phayao',1),(45,'57','เชียงราย','Chiang Rai',1),(46,'58','แม่ฮ่องสอน','Mae Hong Son',1),(47,'60','นครสวรรค์','Nakhon Sawan',2),(48,'61','อุทัยธานี','Uthai Thani',2),(49,'62','กำแพงเพชร','Kamphaeng Phet',2),(50,'63','ตาก','Tak',4),(51,'64','สุโขทัย','Sukhothai',2),(52,'65','พิษณุโลก','Phitsanulok',2),(53,'66','พิจิตร','Phichit',2),(54,'67','เพชรบูรณ์','Phetchabun',2),(55,'70','ราชบุรี','Ratchaburi',4),(56,'71','กาญจนบุรี','Kanchanaburi',4),(57,'72','สุพรรณบุรี','Suphan Buri',2),(58,'73','นครปฐม','Nakhon Pathom',2),(59,'74','สมุทรสาคร','Samut Sakhon',2),(60,'75','สมุทรสงคราม','Samut Songkhram',2),(61,'76','เพชรบุรี','Phetchaburi',4),(62,'77','ประจวบคีรีขันธ์','Prachuap Khiri Khan',4),(63,'80','นครศรีธรรมราช','Nakhon Si Thammarat',6),(64,'81','กระบี่','Krabi',6),(65,'82','พังงา','Phangnga',6),(66,'83','ภูเก็ต','Phuket',6),(67,'84','สุราษฎร์ธานี','Surat Thani',6),(68,'85','ระนอง','Ranong',6),(69,'86','ชุมพร','Chumphon',6),(70,'90','สงขลา','Songkhla',6),(71,'91','สตูล','Satun',6),(72,'92','ตรัง','Trang',6),(73,'93','พัทลุง','Phatthalung',6),(74,'94','ปัตตานี','Pattani',6),(75,'95','ยะลา','Yala',6),(76,'96','นราธิวาส','Narathiwat',6),(77,'97','บึงกาฬ','buogkan',3);
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'I am super admin','administrator','f1b3cb9fdae7a7a53a91e78c7488913ae1782cf19c9dc7d22f2e4a4543886d6c','i_am_super_admin@mail.com','super admin',1,'1','2016-12-31 15:00:05'),(2,'Admin ค่ายกาวิละ','kawila','dbfc765626ec440605a4ce10c15e8645adfef4eed5b0f707bf20447a9e9eed5c','kawila@mail.com','admin',1,'2','2017-01-13 10:44:05'),(3,'Admin ค่ายจิรประวัติ','chiraprawat','cf595fa91226326357a161b7ed7bdcdf3bf6be25137dccafeb64202ce884062f','chiraprawat@mail.com','admin',1,'3','2017-01-13 10:53:03'),(4,'Admin ค่ายสุรศักดิ์','admin','bd3e160ec6c29f825709a7b6024925ef6ae15b5b6b93e34f72d2217db7e90de8','adminsurasak@mail.com','admin',1,'1','2017-01-17 03:10:09');
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

-- Dump completed on 2017-01-27 20:18:45
