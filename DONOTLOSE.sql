-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: garit_system
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Staff`
--

DROP TABLE IF EXISTS `Staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Staff` (
  `StaffID` int(10) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `Roles` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `hourlyRate` float NOT NULL DEFAULT 0,
  PRIMARY KEY (`StaffID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Staff`
--

LOCK TABLES `Staff` WRITE;
/*!40000 ALTER TABLE `Staff` DISABLE KEYS */;
INSERT INTO `Staff` VALUES (46,'a','qasda','Receptionist','a','as',0),(47,'asda','aa','Mechanic','aaaaa','asqawaaa',0),(48,'asda','sss','Franchisee','sss','ss',0),(49,'asdaaa','aaaasdsa','Franchisee','asas','asadas',0),(50,'Hell','Is','Mechanic','hot','pk',0),(51,'asda','asda','Mechanic','asda','asda',6),(52,'one','all','Mechanic','are','we',0),(53,'we','are','Mechanic','thw','as',31),(54,'habi','bi','Mechanic','dubai','soon',123),(55,'fsaf','afaf','Mechanic','fafafa','afaf',12.45),(56,'ripa','ripa','Foreperson','asadaaas','j',100);
/*!40000 ALTER TABLE `Staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_garits`
--

DROP TABLE IF EXISTS `customer_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_garits` (
  `cardNo` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `dateIssued` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `faxNo` varchar(255) DEFAULT NULL,
  `invoiceNo` int(10) DEFAULT NULL,
  `paid` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`cardNo`),
  KEY `invoiceNo` (`invoiceNo`),
  CONSTRAINT `customer_garits_ibfk_1` FOREIGN KEY (`invoiceNo`) REFERENCES `invoice_garits` (`invoiceNo`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_garits`
--

LOCK TABLES `customer_garits` WRITE;
/*!40000 ALTER TABLE `customer_garits` DISABLE KEYS */;
INSERT INTO `customer_garits` VALUES (1,'hj','dx','2022-04-08 22:19:45','abcs road','ig11 123','0535','1231',NULL,NULL);
/*!40000 ALTER TABLE `customer_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_garits`
--

DROP TABLE IF EXISTS `job_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_garits` (
  `jobNo` int(10) NOT NULL AUTO_INCREMENT,
  `jobType` varchar(255) NOT NULL,
  `jobDescription` varchar(255) NOT NULL,
  `estimateTime` varchar(255) NOT NULL,
  `jobStatus` varchar(255) DEFAULT NULL,
  `carRegistration` varchar(255) NOT NULL,
  PRIMARY KEY (`jobNo`),
  KEY `carRegistration` (`carRegistration`),
  CONSTRAINT `job_garits_ibfk_1` FOREIGN KEY (`carRegistration`) REFERENCES `vehicle_garits` (`registrationNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_garits`
--

LOCK TABLES `job_garits` WRITE;
/*!40000 ALTER TABLE `job_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts_garits`
--

DROP TABLE IF EXISTS `parts_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parts_garits` (
  `partCode` varchar(255) NOT NULL,
  `partName` varchar(255) NOT NULL,
  `manufacture` varchar(255) NOT NULL,
  `vechileType` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stockLevel` int(10) NOT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `threshold` int(10) NOT NULL,
  PRIMARY KEY (`partCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts_garits`
--

LOCK TABLES `parts_garits` WRITE;
/*!40000 ALTER TABLE `parts_garits` DISABLE KEYS */;
INSERT INTO `parts_garits` VALUES ('as-zx','asda','asda','asda','asda',23.00,23,'2022-04-07 01:01:46',2),('qwe','asda','asda','asda','1231',43.00,34,'2022-04-07 01:11:49',3),('xc-cv','asda','asda','asda','12',12.00,12,'2022-04-07 01:01:46',3);
/*!40000 ALTER TABLE `parts_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_garits`
--

DROP TABLE IF EXISTS `sale_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_garits` (
  `numberItems` int(10) NOT NULL AUTO_INCREMENT,
  `receiptReference` varchar(255) DEFAULT NULL,
  `receiptDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `item` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `partNo` varchar(255) NOT NULL,
  PRIMARY KEY (`numberItems`),
  KEY `partNo` (`partNo`),
  CONSTRAINT `sale_garits_ibfk_1` FOREIGN KEY (`partNo`) REFERENCES `parts_garits` (`partCode`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_garits`
--

LOCK TABLES `sale_garits` WRITE;
/*!40000 ALTER TABLE `sale_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `sale_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_garits`
--

DROP TABLE IF EXISTS `staff_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_garits` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `bayArea` int(10) DEFAULT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_garits`
--

LOCK TABLES `staff_garits` WRITE;
/*!40000 ALTER TABLE `staff_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stockLedger_garits`
--

DROP TABLE IF EXISTS `stockLedger_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stockLedger_garits` (
  `stockID` int(11) NOT NULL AUTO_INCREMENT,
  `used` int(10) NOT NULL DEFAULT 0,
  `delivery` int(10) NOT NULL DEFAULT 0,
  `code` varchar(255) NOT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`stockID`),
  KEY `code` (`code`),
  CONSTRAINT `stockledger_garits_ibfk_1` FOREIGN KEY (`code`) REFERENCES `parts_garits` (`partCode`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stockLedger_garits`
--

LOCK TABLES `stockLedger_garits` WRITE;
/*!40000 ALTER TABLE `stockLedger_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `stockLedger_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `stockreport`
--

DROP TABLE IF EXISTS `stockreport`;
/*!50001 DROP VIEW IF EXISTS `stockreport`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `stockreport` (
  `Part Name` tinyint NOT NULL,
  `Code` tinyint NOT NULL,
  `Manufacturer` tinyint NOT NULL,
  `Vehicle Type` tinyint NOT NULL,
  `Year(s)` tinyint NOT NULL,
  `Price` tinyint NOT NULL,
  `Initial Stock Level` tinyint NOT NULL,
  `Initial Cost` tinyint NOT NULL,
  `Used` tinyint NOT NULL,
  `Delivery` tinyint NOT NULL,
  `New Stock Level` tinyint NOT NULL,
  `Stock Cost` tinyint NOT NULL,
  `Threshold Level` tinyint NOT NULL,
  `Month` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `task_garits`
--

DROP TABLE IF EXISTS `task_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_garits` (
  `taskNo` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle` varchar(255) DEFAULT NULL,
  `taskDescription` varchar(255) NOT NULL,
  `timeTaken` int(10) DEFAULT NULL,
  `mechanicID` int(11) DEFAULT NULL,
  `parts` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taskNo`),
  KEY `mechanicID` (`mechanicID`),
  KEY `vehicle` (`vehicle`),
  CONSTRAINT `task_garits_ibfk_1` FOREIGN KEY (`mechanicID`) REFERENCES `staff_garits` (`staffID`),
  CONSTRAINT `task_garits_ibfk_2` FOREIGN KEY (`vehicle`) REFERENCES `vehicle_garits` (`registrationNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_garits`
--

LOCK TABLES `task_garits` WRITE;
/*!40000 ALTER TABLE `task_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `task_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_garits`
--

DROP TABLE IF EXISTS `vehicle_garits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_garits` (
  `registrationNo` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `colour` varchar(255) NOT NULL,
  `customerCardNo` int(10) DEFAULT NULL,
  PRIMARY KEY (`registrationNo`),
  KEY `customerCardNo` (`customerCardNo`),
  CONSTRAINT `vehicle_garits_ibfk_1` FOREIGN KEY (`customerCardNo`) REFERENCES `customer_garits` (`cardNo`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_garits`
--

LOCK TABLES `vehicle_garits` WRITE;
/*!40000 ALTER TABLE `vehicle_garits` DISABLE KEYS */;
/*!40000 ALTER TABLE `vehicle_garits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `stockreport`
--

/*!50001 DROP TABLE IF EXISTS `stockreport`*/;
/*!50001 DROP VIEW IF EXISTS `stockreport`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stockreport` AS select `T1`.`partName` AS `Part Name`,`T1`.`partCode` AS `Code`,`T1`.`manufacture` AS `Manufacturer`,`T1`.`vechileType` AS `Vehicle Type`,`T1`.`years` AS `Year(s)`,`T1`.`price` AS `Price`,`T1`.`stockLevel` AS `Initial Stock Level`,`T1`.`price` * `T1`.`stockLevel` AS `Initial Cost`,`T2`.`used` AS `Used`,`T2`.`delivery` AS `Delivery`,`T1`.`stockLevel` + `T2`.`delivery` - `T2`.`used` AS `New Stock Level`,(`T1`.`stockLevel` + `T2`.`delivery` - `T2`.`used`) * `T1`.`price` AS `Stock Cost`,`T1`.`threshold` AS `Threshold Level`,`T2`.`dateReported` AS `Month` from (`parts_garits` `T1` join `stockledger_garits` `T2` on(`T1`.`partCode` = `T2`.`code`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-09 17:02:41
