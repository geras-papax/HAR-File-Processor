-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: har-processor
-- ------------------------------------------------------
-- Server version	8.0.18

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `har_files`
--

DROP TABLE IF EXISTS `har_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `har_files` (
  `id_H` int(11) NOT NULL AUTO_INCREMENT,
  `file_url` text NOT NULL,
  `up_date` date NOT NULL,
  `user_email` varchar(35) NOT NULL,
  PRIMARY KEY (`id_H`),
  KEY `FK_user` (`user_email`),
  CONSTRAINT `FK_user` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `har_files`
--

LOCK TABLES `har_files` WRITE;
/*!40000 ALTER TABLE `har_files` DISABLE KEYS */;
INSERT INTO `har_files` VALUES (36,'har_files/eclass.upatras.gr.har','2021-01-21','mike@gmail.com'),(37,'har_files/eclass.upatras.gr2.har','2021-01-21','mike@gmail.com'),(38,'har_files/webtv.ert.gr.har','2021-01-21','mike@gmail.com'),(39,'har_files/www.insomnia.gr.har','2021-01-21','mike@gmail.com'),(40,'har_files/www.ceid.upatras.gr.har','2021-01-21','mike@gmail.com'),(41,'har_files/www.cia.gov.har','2021-01-21','koutsos@gmail.com'),(42,'har_files/www.nasa.gov.har','2021-01-21','koutsos@gmail.com'),(43,'har_files/toolbox.googleapps.com.har','2021-01-21','koutsos@gmail.com'),(44,'har_files/www.fbi.gov.har','2021-01-21','koutsos@gmail.com'),(45,'har_files/www.google.com.har','2021-01-21','koutsos@gmail.com'),(46,'har_files/www.w3schools.com.har','2021-01-21','koutsos@gmail.com'),(47,'har_files/coderrocketfuel.com.har','2021-01-21','koutsos@gmail.com'),(48,'har_files/www.w3schools.com.har','2021-01-21','koutsos@gmail.com'),(49,'har_files/www.youtube.com.har','2021-01-21','koutsos@gmail.com'),(50,'har_files/dba.stackexchange.com.har','2021-01-25','mike@gmail.com');
/*!40000 ALTER TABLE `har_files` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-14 12:13:08
