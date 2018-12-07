-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: piu
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'direktur','Direktur'),(2,'wadir','Wakil Direktur'),(3,'asdir_keuangan','Asisten Direktur Keuangan'),(4,'staff_keuangan','Staff Asisten Direktur Keuangan');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `new` text,
  `staff_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(2,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(3,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(4,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(5,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(6,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(7,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(8,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(9,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(10,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(11,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(12,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(13,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(14,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(15,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(16,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(17,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(18,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(19,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(20,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(21,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(22,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(23,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(24,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(25,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(26,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(27,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(28,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(29,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(30,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(31,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(32,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','0'),(33,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(34,'::1','TRY LOGIN','FAILED','{\"id\":\"\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"<p>Isian Email\\/Username wajib diisi.<\\/p>\\n<p>Isian Kata Sandi wajib diisi.<\\/p>\\n\"}}','0'),(35,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(36,'::1','TRY LOGIN','FAILED','{\"id\":\"administrator\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(37,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(38,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(39,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(40,'::1','TRY LOGIN','FAILED','{\"id\":\"administrator\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(41,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(42,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(43,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(44,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"53CRE7P455WORLD\"}','1'),(45,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(46,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','1'),(47,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(48,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"53CRE7P455WORLD\"}','1'),(49,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(50,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":null}}','1'),(51,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(52,'::1','TRY LOGIN','FAILED','{\"id\":\"\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"<p>Isian Email\\/Username wajib diisi.<\\/p>\\n<p>Isian Kata Sandi wajib diisi.<\\/p>\\n\"}}','1'),(53,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(54,'::1','TRY LOGIN','FAILED','{\"id\":\"\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"<p>Isian Email\\/Username wajib diisi.<\\/p>\\n<p>Isian Kata Sandi wajib diisi.<\\/p>\\n\"}}','1'),(55,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(56,'::1','TRY LOGIN','FAILED','{\"id\":\"asda\",\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','1'),(57,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(58,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"53CRE7P455WORLD\",\"0\":{\"message\":\"Username atau password salah\"}}','1'),(59,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(60,'::1','TRY LOGIN','FAILED','{\"id\":\"\",\"password\":\"password\",\"0\":{\"message\":\"<p>Isian Email\\/Username wajib diisi.<\\/p>\\n<p>Isian Kata Sandi wajib diisi.<\\/p>\\n\"}}','1'),(61,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(62,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1'),(63,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(64,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','1'),(65,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(66,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1'),(67,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(68,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','1'),(69,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(70,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','1'),(71,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(72,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1'),(73,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(74,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','0'),(75,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(76,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','0'),(77,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(78,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1'),(79,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(80,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','0'),(81,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(82,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1'),(83,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(84,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','1'),(85,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(86,'::1','TRY LOGIN','FAILED','{\"id\":\"admin@admin.com\",\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','1'),(87,'::1','ACCESS LOGIN PAGE',NULL,NULL,'1'),(88,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','1'),(89,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(90,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":null}}','0'),(91,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(92,'::1','TRY LOGIN','FAILED','{\"id\":\"admin@admin.com\",\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(93,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(94,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(95,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(96,'::1','TRY LOGIN','FAILED','{\"id\":\"admin@admin.com\",\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(97,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(98,'::1','TRY LOGIN','FAILED','{\"id\":null,\"password\":\"password\",\"0\":{\"message\":\"Username atau password salah\"}}','0'),(99,'::1','ACCESS LOGIN PAGE',NULL,NULL,'0'),(100,'::1','TRY LOGIN','SUCCESS','{\"id\":\"admin@admin.com\",\"password\":\"password\"}','1');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','','admin@admin.com','',NULL,NULL,NULL,1268889823,1543892258,1,'Admin','istrator','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-07 13:41:32
