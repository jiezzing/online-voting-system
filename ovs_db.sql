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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_detail_file`
--

LOCK TABLES `poll_detail_file` WRITE;
/*!40000 ALTER TABLE `poll_detail_file` DISABLE KEYS */;
INSERT INTO `poll_detail_file` VALUES (1,1,60,1,1,4),(2,1,61,1,0,4),(3,1,62,1,0,4),(4,1,63,2,0,4),(5,1,64,2,0,4),(6,1,65,3,0,4),(7,1,66,3,0,4),(8,1,67,3,0,4),(9,1,68,4,0,4),(10,1,69,4,123,4);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poll_file`
--

LOCK TABLES `poll_file` WRITE;
/*!40000 ALTER TABLE `poll_file` DISABLE KEYS */;
INSERT INTO `poll_file` VALUES (1,'2021-07-13 11:03:28','2021-07-13 13:58:41','2021-07-13 14:29:07',4),(2,'2021-07-13 14:31:27',NULL,NULL,3);
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
  `status_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions_file`
--

LOCK TABLES `positions_file` WRITE;
/*!40000 ALTER TABLE `positions_file` DISABLE KEYS */;
INSERT INTO `positions_file` VALUES (1,'President','1'),(2,'Vice President','1'),(3,'Secretary','1'),(4,'Treasurer','1'),(5,'P.I.O','2'),(6,'Auditor','2'),(7,'Sergeant at Arms','2'),(8,'Department Represetatives','1');
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_account_file`
--

LOCK TABLES `users_account_file` WRITE;
/*!40000 ALTER TABLE `users_account_file` DISABLE KEYS */;
INSERT INTO `users_account_file` VALUES (1,'admin','YWRtaW4=',1),(2,NULL,NULL,1),(3,NULL,NULL,1),(4,'relisa','cmVsaXNh',1),(5,NULL,NULL,1),(6,NULL,NULL,1),(7,NULL,NULL,1),(8,NULL,NULL,1),(9,NULL,NULL,1),(10,NULL,NULL,1),(11,NULL,NULL,1),(12,NULL,NULL,1),(13,NULL,NULL,1),(14,NULL,NULL,1),(15,NULL,NULL,1),(16,NULL,NULL,1),(17,NULL,NULL,1),(18,NULL,NULL,1),(19,NULL,NULL,1),(20,NULL,NULL,1),(21,NULL,NULL,1),(22,NULL,NULL,1),(23,NULL,NULL,1),(24,NULL,NULL,1),(25,NULL,NULL,1),(26,NULL,NULL,1),(27,NULL,NULL,1),(28,NULL,NULL,1),(29,NULL,NULL,1),(30,NULL,NULL,1),(31,NULL,NULL,1),(32,NULL,NULL,1),(33,NULL,NULL,1),(34,NULL,NULL,1),(35,NULL,NULL,1),(36,NULL,NULL,1),(37,NULL,NULL,1),(38,NULL,NULL,1),(39,NULL,NULL,1),(40,NULL,NULL,1),(41,NULL,NULL,1),(42,NULL,NULL,1),(43,NULL,NULL,1),(44,NULL,NULL,1),(45,NULL,NULL,1),(46,NULL,NULL,1),(47,NULL,NULL,1),(48,NULL,NULL,1),(49,NULL,NULL,1),(50,NULL,NULL,1),(51,NULL,NULL,1),(52,NULL,NULL,1),(53,NULL,NULL,1),(54,NULL,NULL,1),(55,NULL,NULL,1),(56,NULL,NULL,1),(57,NULL,NULL,1),(58,NULL,NULL,1),(59,NULL,NULL,1),(60,NULL,NULL,1),(61,NULL,NULL,1),(62,NULL,NULL,1),(63,NULL,NULL,1),(64,NULL,NULL,1),(65,NULL,NULL,1),(66,NULL,NULL,1),(67,NULL,NULL,1),(68,NULL,NULL,1),(69,NULL,NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_profile`
--

LOCK TABLES `users_profile` WRITE;
/*!40000 ALTER TABLE `users_profile` DISABLE KEYS */;
INSERT INTO `users_profile` VALUES (1,NULL,1,'Admin',NULL,NULL,NULL,NULL,NULL,1),(2,1,3,'Fritz Gerald',22,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(3,1,3,'Shammah Casumpang',22,'Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(4,NULL,2,'relisa',NULL,NULL,NULL,NULL,NULL,1),(5,1,3,'Fritz Gerald',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(6,1,3,'Fritz Gerald 2',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(7,1,3,'Fritz Gerald 3',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(8,1,3,'Fritz Gerald 4',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(9,2,3,'Shammah',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(10,2,3,'Shammah 2',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(11,2,3,'Shammah 3',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(12,2,3,'Shammah 4',20,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','Fuck you',NULL,1),(13,1,3,'David',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(14,1,3,'Fritz',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(15,1,3,'Relisa',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(16,1,3,'Joyce',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(17,2,3,'Shamma',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(18,2,3,'His Friend',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(19,2,3,'Axie Community',20,'Nasipit, Talamban, Cebu City','Vote me because vote lang','Vote me because vote lang',NULL,1),(20,1,3,'Test',12,'Test','Test','Test',NULL,1),(21,1,3,'Shammah',12,'Shammah','Shammah','Shammah',NULL,1),(22,1,3,'Shammah 2',12,'Shammah','Shammah','Shammah',NULL,1),(23,1,3,'Fritz Gerald',12,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City',NULL,1),(24,1,3,'Fritz Gerald 2',12,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City',NULL,1),(25,1,3,'Fritz Gerald',12,'Fritz Gerald','Fritz Gerald','Fritz Gerald',NULL,1),(26,1,3,'Fritz Gerald 2',12,'Fritz Gerald','Fritz Gerald','Fritz Gerald',NULL,1),(27,1,3,'Fritz Gerald 3',12,'Fritz Gerald','Fritz Gerald','Fritz Gerald',NULL,1),(28,1,3,'Fritz Gerald 4',12,'Fritz Gerald','Fritz Gerald','Fritz Gerald',NULL,1),(29,1,3,'Fritz Gerald',12,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Slice of life','Top 1 Nasaktan',NULL,1),(30,1,3,'Fritz Gerald',12,'Fritz Gerald','Fritz Gerald','Fritz Gerald',NULL,1),(31,1,3,'Fritz Gerald 2',12,'Nasipit, Talamban, Cebu City','Nasipit, Talamban, Cebu City','Nasipit, Talamban, Cebu City',NULL,1),(32,1,3,'xxx',2,'xx','xx','xx',NULL,1),(33,1,3,'qqq',12,'qq','qq','qq',NULL,1),(34,1,3,'test',12,'test','test','test',NULL,1),(35,2,3,'a',12,'a','a','a',NULL,1),(36,2,3,'b',2,'b','b','b',NULL,1),(37,2,3,'c',2,'c','c','c',NULL,1),(38,3,3,'a',12,'a','a','a',NULL,1),(39,3,3,'b',3,'b','b','b',NULL,1),(40,3,3,'c',12,'c','c','c',NULL,1),(41,4,3,'a',12,'a','a','a',NULL,1),(42,4,3,'b',2,'b','b','b',NULL,1),(43,4,3,'c',2,'c','c','c',NULL,1),(44,5,3,'a',2,'a','a','a',NULL,1),(45,5,3,'b',2,'b','b','b',NULL,1),(46,5,3,'c',2,'c','c','c',NULL,1),(47,6,3,'a',2,'a','a','a',NULL,1),(48,6,3,'b',2,'b','b','b',NULL,1),(49,6,3,'c',2,'c','c','c',NULL,1),(50,7,3,'a',2,'a','a','a',NULL,1),(51,7,3,'b',2,'b','b','b',NULL,1),(52,7,3,'c',2,'c','c','c',NULL,1),(53,2,3,'Fritz Gerald',2,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','ll',NULL,1),(54,1,3,'test',12,'test','test','test',NULL,1),(55,3,3,'a',12,'a','a','a',NULL,1),(56,3,3,'b',2,'b','b','b',NULL,1),(57,3,3,'c',2,'c','c','c',NULL,1),(58,3,3,'d',12,'d','d','d',NULL,1),(59,4,3,'e',2,'e','e','e',NULL,1),(60,1,3,'Fritz Gerald',12,'835-4 Gavino Leyson CPD., Nasipit, Talamban, Cebu City','Fuck you','                                print_r($query2->fetch(PDO::FETCH_ASSOC));\n',NULL,1),(61,1,3,'A',2,'A','A','A',NULL,1),(62,1,3,'B',2,'B','B','B',NULL,1),(63,2,3,'A',2,'A','A','A',NULL,1),(64,2,3,'B',2,'B','B','B',NULL,1),(65,3,3,'A',2,'A','A','A',NULL,1),(66,3,3,'B',2,'B','B','B',NULL,1),(67,3,3,'C',2,'C','C','C',NULL,1),(68,4,3,'A',2,'A','A','A',NULL,1),(69,4,3,'B',2,'B','B','B',NULL,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `votes_file`
--

LOCK TABLES `votes_file` WRITE;
/*!40000 ALTER TABLE `votes_file` DISABLE KEYS */;
INSERT INTO `votes_file` VALUES (1,1,4,1,60,'2021-07-13 14:17:40','2021-07-13 14:17:40');
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

-- Dump completed on 2021-07-13 20:18:35
