CREATE DATABASE  IF NOT EXISTS `site` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `site`;
-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: site
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','11','Павел'),(2,'mena','6556','Андрей'),(3,'afra','dsfdsaf','Сильвия'),(4,'hourleues','213321','Елена'),(5,'hourleues','dsafda','Харли'),(6,'mena','adfd','Сьюзан'),(7,'afra','dasfa','Питер'),(8,'test214','dsfdsaf','Николай'),(9,'mena','213322','Павел'),(10,'afra','dsafda','Андрей'),(11,'hourleues','adfd','Сильвия'),(12,'hourleues','dasfa','Елена'),(13,'mena','dsfdsaf','Харли'),(14,'afra','213323','Сьюзан'),(15,'test215','dsafda','Питер'),(16,'mena','adfd','Николай'),(17,'mena','dasfa','Павел'),(18,'afra','dsfdsaf','Андрей'),(19,'hourleues','213324','Сильвия'),(20,'hourleues','dsafda','Елена'),(21,'mena','adfd','Харли'),(22,'afra','dasfa','Сьюзан'),(23,'test216','dsfdsaf','Питер'),(24,'mena','213325','Николай'),(25,'mena','dsafda','Павел'),(26,'afra','adfd','Андрей'),(27,'hourleues','dasfa','Сильвия'),(28,'hourleues','dsfdsaf','Елена'),(29,'mena','213326','Харли'),(30,'test214','13068','Павел'),(31,'mena','19580','Андрей'),(32,'afra','dsfdsaf','Сильвия'),(33,'hourleues','213322','Елена'),(34,'hourleues','dsafda','Харли'),(35,'mena','adfd','Сьюзан'),(36,'afra','dasfa','Питер'),(37,'test215','dsfdsaf','Николай'),(38,'mena','213323','Павел'),(39,'afra','dsafda','Андрей'),(40,'hourleues','adfd','Сильвия'),(41,'hourleues','dasfa','Елена'),(42,'mena','dsfdsaf','Харли'),(43,'afra','213324','Сьюзан'),(44,'test216','dsafda','Питер'),(45,'mena','adfd','Николай'),(46,'mena','dasfa','Павел'),(47,'afra','dsfdsaf','Андрей'),(48,'hourleues','213325','Сильвия'),(49,'hourleues','dsafda','Елена'),(50,'mena','adfd','Харли'),(51,'afra','dasfa','Сьюзан'),(52,'test217','dsfdsaf','Питер'),(53,'mena','213326','Николай'),(54,'mena','dsafda','Павел'),(55,'afra','adfd','Андрей'),(56,'hourleues','dasfa','Сильвия'),(57,'hourleues','dsfdsaf','Елена'),(58,'mena','213327','Харли'),(59,'test215','26092','Павел'),(60,'mena','32604','Андрей'),(61,'afra','dsfdsaf','Сильвия'),(62,'hourleues','213323','Елена'),(63,'hourleues','dsafda','Харли'),(64,'mena','adfd','Сьюзан'),(65,'afra','dasfa','Питер'),(66,'test216','dsfdsaf','Николай'),(67,'mena','213324','Павел'),(68,'afra','dsafda','Андрей'),(69,'hourleues','adfd','Сильвия'),(70,'hourleues','dasfa','Елена'),(71,'mena','dsfdsaf','Харли'),(72,'afra','213325','Сьюзан'),(73,'test217','dsafda','Питер'),(74,'mena','adfd','Николай'),(75,'mena','dasfa','Павел'),(76,'afra','dsfdsaf','Андрей'),(77,'hourleues','213326','Сильвия'),(78,'hourleues','dsafda','Елена'),(79,'mena','adfd','Харли'),(80,'afra','dasfa','Сьюзан'),(81,'test218','dsfdsaf','Питер'),(82,'mena','213327','Николай'),(83,'mena','dsafda','Павел'),(84,'afra','adfd','Андрей'),(85,'hourleues','dasfa','Сильвия'),(86,'hourleues','dsfdsaf','Елена'),(87,'mena','213328','Харли'),(88,'test216','39116','Павел'),(89,'mena','45628','Андрей'),(90,'afra','dsfdsaf','Сильвия'),(91,'hourleues','213324','Елена'),(92,'hourleues','dsafda','Харли'),(93,'mena','adfd','Сьюзан'),(94,'afra','dasfa','Питер'),(95,'test217','dsfdsaf','Николай'),(96,'mena','213325','Павел'),(97,'afra','dsafda','Андрей'),(98,'hourleues','adfd','Сильвия'),(100,'vlad','2','vladik');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'site'
--

--
-- Dumping routines for database 'site'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-14 13:12:01