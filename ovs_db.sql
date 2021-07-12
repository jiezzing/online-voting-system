-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: ovs_db
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `poll_detail_file`
--

DROP TABLE IF EXISTS `poll_detail_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poll_detail_file` (
  `poll_id` int NOT NULL AUTO_INCREMENT,
  `poll_no` int NOT NULL,
  `user_id` int NOT NULL,
  `pos_id` int NOT NULL,
  `total_votes` int NOT NULL,
  `poll_status` int NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_detail_file`
--

LOCK TABLES `poll_detail_file` WRITE;
/*!40000 ALTER TABLE `poll_detail_file` DISABLE KEYS */;
INSERT INTO `poll_detail_file` VALUES (1,1,2,1,1,4),(2,1,3,1,8,4),(3,2,5,1,0,4),(4,2,6,1,0,4),(5,2,7,1,0,4),(6,2,8,1,0,4),(7,2,9,2,0,4),(8,2,10,2,0,4),(9,2,11,2,0,4),(10,2,12,2,0,4),(11,4,13,1,0,4),(12,4,14,1,0,4),(13,4,15,1,3,4),(14,4,16,1,1,4),(15,4,17,2,0,4),(16,4,18,2,0,4),(17,4,19,2,1,4),(18,5,20,1,0,4);
/*!40000 ALTER TABLE `poll_detail_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poll_file`
--

DROP TABLE IF EXISTS `poll_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `poll_file` (
  `poll_id` int NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `poll_status` int NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_file`
--

LOCK TABLES `poll_file` WRITE;
/*!40000 ALTER TABLE `poll_file` DISABLE KEYS */;
INSERT INTO `poll_file` VALUES (1,'2021-07-11 17:23:03','2021-07-11 17:29:46','2021-07-11 20:01:51',4),(2,'2021-07-11 19:08:21','2021-07-11 19:09:43','2021-07-11 20:01:49',4),(3,'2021-07-11 20:13:41','2021-07-11 20:17:13','2021-07-11 20:23:43',4),(4,'2021-07-11 20:29:48','2021-07-11 20:31:12','2021-07-11 21:56:19',4),(5,'2021-07-11 22:38:39','2021-07-11 23:03:36','2021-07-11 23:13:20',4),(6,'2021-07-11 23:13:30',NULL,NULL,3);
/*!40000 ALTER TABLE `poll_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions_file`
--

DROP TABLE IF EXISTS `positions_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `positions_file` (
  `pos_id` int NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(30) NOT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions_file`
--

LOCK TABLES `positions_file` WRITE;
/*!40000 ALTER TABLE `positions_file` DISABLE KEYS */;
INSERT INTO `positions_file` VALUES (1,'President'),(2,'Vice President'),(3,'Secretary'),(4,'Treasurer'),(5,'P.I.O'),(6,'Auditor'),(7,'Sergeant at Arms'),(8,'Department Represetatives');
/*!40000 ALTER TABLE `positions_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_file`
--

DROP TABLE IF EXISTS `status_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_file` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_file`
--

LOCK TABLES `status_file` WRITE;
/*!40000 ALTER TABLE `status_file` DISABLE KEYS */;
INSERT INTO `status_file` VALUES (1,'Active'),(2,'Inactive'),(3,'To be decided (TBD)'),(4,'Voting has been Closed'),(5,'Open for Voting'),(6,'Voted');
/*!40000 ALTER TABLE `status_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type_file`
--

DROP TABLE IF EXISTS `user_type_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type_file` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type_file`
--

LOCK TABLES `user_type_file` WRITE;
/*!40000 ALTER TABLE `user_type_file` DISABLE KEYS */;
INSERT INTO `user_type_file` VALUES (1,'Administrator'),(2,'Voter'),(3,'Candidate');
/*!40000 ALTER TABLE `user_type_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_account_file`
--

DROP TABLE IF EXISTS `users_account_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_account_file` (
  `voters_id` int NOT NULL AUTO_INCREMENT,
  `voters_username` varchar(30) DEFAULT NULL,
  `voters_password` varchar(50) DEFAULT NULL,
  `voters_status` int NOT NULL,
  PRIMARY KEY (`voters_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_account_file`
--

LOCK TABLES `users_account_file` WRITE;
/*!40000 ALTER TABLE `users_account_file` DISABLE KEYS */;
INSERT INTO `users_account_file` VALUES (1,'admin','YWRtaW4=',1),(2,NULL,NULL,1),(3,NULL,NULL,1),(4,'relisa','cmVsaXNh',1),(5,NULL,NULL,1),(6,NULL,NULL,1),(7,NULL,NULL,1),(8,NULL,NULL,1),(9,NULL,NULL,1),(10,NULL,NULL,1),(11,NULL,NULL,1),(12,NULL,NULL,1),(13,NULL,NULL,1),(14,NULL,NULL,1),(15,NULL,NULL,1),(16,NULL,NULL,1),(17,NULL,NULL,1),(18,NULL,NULL,1),(19,NULL,NULL,1),(20,NULL,NULL,1);
/*!40000 ALTER TABLE `users_account_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_profile`
--

DROP TABLE IF EXISTS `users_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_profile` (
  `voters_id` int NOT NULL AUTO_INCREMENT,
  `pos_id` int DEFAULT NULL,
  `type_id` int NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_age` int DEFAULT NULL,
  `user_address` varchar(150) DEFAULT NULL,
  `user_motto` varchar(150) DEFAULT NULL,
  `user_achievements` varchar(500) DEFAULT NULL,
  `user_image` varchar(500) DEFAULT NULL,
  `user_status` int NOT NULL,
  PRIMARY KEY (`voters_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_profile`
--

LOCK TABLES `users_profile` WRITE;
/*!40000 ALTER TABLE `users_profile` DISABLE KEYS */;
INSERT INTO `users_profile` VALUES (1,NULL,1,'Admin',NULL,NULL,NULL,NULL,NULL,1),(2,1,3,'Fritz Gerald',22,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(3,1,3,'Shammah Casumpang',22,'Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(4,NULL,2,'relisa',NULL,NULL,NULL,NULL,NULL,1),(5,1,3,'Fritz Gerald',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(6,1,3,'Fritz Gerald 2',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(7,1,3,'Fritz Gerald 3',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(8,1,3,'Fritz Gerald 4',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(9,2,3,'Shammah',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(10,2,3,'Shammah 2',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(11,2,3,'Shammah 3',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(12,2,3,'Shammah 4',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(13,1,3,'David',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(14,1,3,'Fritz',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(15,1,3,'Relisa',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(16,1,3,'Joyce',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(17,2,3,'Shamma',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(18,2,3,'His Friend',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(19,2,3,'Axie Community',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(20,1,3,'Test',12,'Test','Test','Test',NULL,1);
/*!40000 ALTER TABLE `users_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `votes_file`
--

DROP TABLE IF EXISTS `votes_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `votes_file` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pos_id` int DEFAULT NULL,
  `voters_id` int DEFAULT NULL,
  `poll_no` int DEFAULT NULL,
  `rep_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes_file`
--

LOCK TABLES `votes_file` WRITE;
/*!40000 ALTER TABLE `votes_file` DISABLE KEYS */;
INSERT INTO `votes_file` VALUES (1,1,4,1,3,'2021-07-11 18:33:07','2021-07-11 18:33:07'),(2,1,4,2,8,'2021-07-11 19:16:06','2021-07-11 19:16:06'),(6,1,4,4,15,'2021-07-11 20:58:52','2021-07-11 20:58:52'),(7,2,4,4,19,'2021-07-11 21:10:02','2021-07-11 21:10:02');
/*!40000 ALTER TABLE `votes_file` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-11 23:35:41
