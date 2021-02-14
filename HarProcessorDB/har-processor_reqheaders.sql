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
-- Table structure for table `reqheaders`
--

DROP TABLE IF EXISTS `reqheaders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reqheaders` (
  `id_head` int(11) NOT NULL AUTO_INCREMENT,
  `host_field` text,
  `id_request` int(11) NOT NULL,
  PRIMARY KEY (`id_head`),
  KEY `FK_req` (`id_request`),
  CONSTRAINT `FK_req` FOREIGN KEY (`id_request`) REFERENCES `requests` (`id_req`)
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reqheaders`
--

LOCK TABLES `reqheaders` WRITE;
/*!40000 ALTER TABLE `reqheaders` DISABLE KEYS */;
INSERT INTO `reqheaders` VALUES (1,'eclass.upatras.gr',14454),(2,'eclass.upatras.gr',14455),(3,'eclass.upatras.gr',14456),(4,'eclass.upatras.gr',14457),(5,'eclass.upatras.gr',14458),(6,'eclass.upatras.gr',14489),(7,'eclass.upatras.gr',14490),(8,'eclass.upatras.gr',14521),(9,'eclass.upatras.gr',14533),(10,'eclass.upatras.gr',14534),(11,'eclass.upatras.gr',14535),(12,'eclass.upatras.gr',14617),(13,'eclass.upatras.gr',14618),(14,'eclass.upatras.gr',14619),(15,'eclass.upatras.gr',14620),(16,'eclass.upatras.gr',14621),(17,'eclass.upatras.gr',14622),(18,'www.upnet.gr',14653),(19,'eclass.upatras.gr',14703),(20,'eclass.upatras.gr',14736),(21,'eclass.upatras.gr',14741),(22,'ib.adnxs.com',14983),(23,'ib.adnxs.com',14984),(24,'tag.1rx.io',14985),(25,'fastlane.rubiconproject.com',14989),(26,'hb.undertone.com',14990),(27,'ap.lijit.com',15057),(28,'ssum-sec.casalemedia.com',15061),(29,'ib.adnxs.com',15064),(30,'ib.adnxs.com',15065),(31,'pixel.rubiconproject.com',15069),(32,'cs.admanmedia.com',15070),(33,'dpm.demdex.net',15073),(34,'tags.bluekai.com',15074),(35,'sync.alphonso.tv',15077),(36,'usr.undertone.com',15080),(37,'ups.analytics.yahoo.com',15081),(38,'usr.undertone.com',15082),(39,'usr.undertone.com',15083),(40,'usr.undertone.com',15088),(41,'usr.undertone.com',15089),(42,'usr.undertone.com',15090),(43,'ib.adnxs.com',15091),(44,'t.a3cloud.net',15092),(45,'px.owneriq.net',15094),(46,'ad.sxp.smartclip.net',15097),(47,'sync.ipredictive.com',15098),(48,'dsp.adfarm1.adition.com',15099),(49,'sync.adotmob.com',15100),(50,'bttrack.com',15102),(51,'secure.adnxs.com',15104),(52,'ib.adnxs.com',15105),(53,'ib.adnxs.com',15119),(54,'www.ceid.upatras.gr',15123),(55,'www.ceid.upatras.gr',15124),(56,'www.ceid.upatras.gr',15137),(57,'www.ceid.upatras.gr',15138),(58,'www.ceid.upatras.gr',15139),(59,'www.ceid.upatras.gr',15142),(60,'www.ceid.upatras.gr',15143),(61,'www.ceid.upatras.gr',15144),(62,'www.ceid.upatras.gr',15145),(63,'www.ceid.upatras.gr',15146),(64,'www.ceid.upatras.gr',15147),(65,'www.ceid.upatras.gr',15148),(66,'www.ceid.upatras.gr',15149),(67,'www.ceid.upatras.gr',15150),(68,'www.ceid.upatras.gr',15151),(69,'www.ceid.upatras.gr',15153),(70,'www.ceid.upatras.gr',15155),(71,'www.ceid.upatras.gr',15156),(72,'www.ceid.upatras.gr',15157),(73,'www.ceid.upatras.gr',15158),(74,'www.ceid.upatras.gr',15159),(75,'www.ceid.upatras.gr',15160),(76,'www.ceid.upatras.gr',15161),(77,'www.ceid.upatras.gr',15162),(78,'www.ceid.upatras.gr',15163),(79,'www.ceid.upatras.gr',15164),(80,'www.ceid.upatras.gr',15165),(81,'www.ceid.upatras.gr',15166),(82,'www.ceid.upatras.gr',15167),(83,'www.ceid.upatras.gr',15168),(84,'www.ceid.upatras.gr',15169),(85,'www.ceid.upatras.gr',15170),(86,'www.ceid.upatras.gr',15174),(87,'www.ceid.upatras.gr',15178),(88,'www.ceid.upatras.gr',15180),(89,'www.ceid.upatras.gr',15181),(90,'www.ceid.upatras.gr',15182),(91,'www.ceid.upatras.gr',15230),(92,'platform.twitter.com',15522),(93,'platform.twitter.com',15548),(94,'platform.twitter.com',15550),(95,'platform.twitter.com',15551),(96,'platform.twitter.com',15559),(97,'platform.twitter.com',15587),(98,'platform.twitter.com',15682),(99,'platform.twitter.com',15768),(100,'platform.twitter.com',15794),(101,'platform.twitter.com',15795),(102,'platform.twitter.com',15814),(103,'d.pub.network',15955),(104,'grid.bidswitch.net',15964),(105,'ib.adnxs.com',15975),(106,'fastlane.rubiconproject.com',15979),(107,'fastlane.rubiconproject.com',15980),(108,'fastlane.rubiconproject.com',15981),(109,'fastlane.rubiconproject.com',15982),(110,'fastlane.rubiconproject.com',15983),(111,'c2shb.ssp.yahoo.com',15984),(112,'c2shb.ssp.yahoo.com',15985),(113,'c2shb.ssp.yahoo.com',15986),(114,'c2shb.ssp.yahoo.com',15987),(115,'c2shb.ssp.yahoo.com',15988),(116,'c2shb.ssp.yahoo.com',15989),(117,'c2shb.ssp.yahoo.com',15990),(118,'c2shb.ssp.yahoo.com',15991),(119,'c2shb.ssp.yahoo.com',15992),(120,'ib.adnxs.com',15995),(121,'ap.lijit.com',15996),(122,'sb.scorecardresearch.com',16012),(123,'c.pub.network',16016),(124,'coderrocketfuel.com',16069),(125,'m.servedby-buysellads.com',16109),(126,'cdn.carbonads.com',16111),(127,'srv.buysellads.com',16113),(128,'srv.buysellads.com',16114),(129,'srv.carbonads.net',16116),(130,'coderrocketfuel.com',16157),(131,'coderrocketfuel.com',16158),(132,'coderrocketfuel.com',16159),(133,'coderrocketfuel.com',16160),(134,'coderrocketfuel.com',16161),(135,'coderrocketfuel.com',16162),(136,'coderrocketfuel.com',16163),(137,'coderrocketfuel.com',16164),(138,'coderrocketfuel.com',16165),(139,'coderrocketfuel.com',16166),(140,'assets.coderrocketfuel.com',16168),(141,'assets.coderrocketfuel.com',16169),(142,'assets.coderrocketfuel.com',16170),(143,'assets.coderrocketfuel.com',16171),(144,'cdn.carbonads.com',16172),(145,'coderrocketfuel.com',16173),(146,'coderrocketfuel.com',16174),(147,'srv.carbonads.net',16175),(148,'coderrocketfuel.com',16177),(149,'assets.coderrocketfuel.com',16180),(150,'pro.ip-api.com',16297),(151,'prg.smartadserver.com',16326),(152,'prg.smartadserver.com',16327),(153,'prg.smartadserver.com',16328),(154,'prg.smartadserver.com',16329),(155,'prg.smartadserver.com',16330),(156,'prg.smartadserver.com',16331),(157,'prg.smartadserver.com',16332),(158,'hb.emxdgt.com',16335),(159,'c2shb.ssp.yahoo.com',16336),(160,'c2shb.ssp.yahoo.com',16337),(161,'c2shb.ssp.yahoo.com',16338),(162,'c2shb.ssp.yahoo.com',16339),(163,'fastlane.rubiconproject.com',16340),(164,'fastlane.rubiconproject.com',16341),(165,'fastlane.rubiconproject.com',16342),(166,'fastlane.rubiconproject.com',16343),(167,'ap.lijit.com',16345),(168,'ib.adnxs.com',16346),(169,'aax-eu.amazon-adsystem.com',16355),(170,'aax-eu.amazon-adsystem.com',16356),(171,'ads.pubmatic.com',16362),(172,'eus.rubiconproject.com',16363),(173,'sync.go.sonobi.com',16364),(174,'aax-eu.amazon-adsystem.com',16365),(175,'ib.adnxs.com',16366),(176,'eus.rubiconproject.com',16368),(177,'aax-eu.amazon-adsystem.com',16370),(178,'pixel-eu.rubiconproject.com',16371),(179,'sync.mathtag.com',16374),(180,'sync.1rx.io',16375),(181,'aax-eu.amazon-adsystem.com',16376),(182,'sync.go.sonobi.com',16379),(183,'sync.targeting.unrulymedia.com',16380),(184,'aax-eu.amazon-adsystem.com',16381),(185,'sync.go.sonobi.com',16407),(186,'ssum-sec.casalemedia.com',16440),(187,'ib.adnxs.com',16441),(188,'sync.mathtag.com',16447),(189,'s.thebrighttag.com',16450),(190,'sync.bumlam.com',16453),(191,'bid.socdm.com',16454),(192,'ib.adnxs.com',16455),(193,'ib.adnxs.com',16456),(194,'m.adnxs.com',16457),(195,'rtb.adentifi.com',16458),(196,'sync.adotmob.com',16460),(197,'gu.dyntrk.com',16461),(198,'ib.adnxs.com',16462),(199,'js-sec.indexww.com',16464),(200,'dsum.casalemedia.com',16466),(201,'ib.adnxs.com',16467),(202,'secure.adnxs.com',16468),(203,'pixel.onaudience.com',16469),(204,'m.adnxs.com',16470),(205,'dsum-sec.casalemedia.com',16471),(206,'dsum-sec.casalemedia.com',16472),(207,'m.adnxs.com',16473),(208,'ib.adnxs.com',16475),(209,'pixel.onaudience.com',16476),(210,'secure.adnxs.com',16478),(211,'cdn.segment.com',16642),(212,'static.ads-twitter.com',16643),(213,'q.quora.com',16647),(214,'t.co',16649),(215,'qa.sockets.stackexchange.com',16740);
/*!40000 ALTER TABLE `reqheaders` ENABLE KEYS */;
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
