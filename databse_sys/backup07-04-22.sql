


CREATE TABLE `Staff` (
  `StaffID` int(10) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `Roles` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`StaffID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;


INSERT INTO Staff VALUES
("46","asda","q","Receptionist","q","q"),
("47","asda","aa","Mechanic","aaaaa","asqawaaa"),
("48","asda","sss","Franchisee","sss","ss"),
("49","asda","asdsa","Administrator","as","asad");




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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






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


INSERT INTO parts_garits VALUES
("as-zx","asda","asda","asda","asda","23.00","23","2022-04-07 02:01:46","2"),
("qwe","asda","asda","asda","1231","43.00","34","2022-04-07 02:11:49","3"),
("xc-cv","asda","asda","asda","12","12.00","12","2022-04-07 02:01:46","3");




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






CREATE TABLE `staff_garits` (
  `staffID` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `bayArea` int(10) DEFAULT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






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






CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stockreport` AS select `T1`.`partName` AS `Part Name`,`T1`.`partCode` AS `Code`,`T1`.`manufacture` AS `Manufacturer`,`T1`.`vechileType` AS `Vehicle Type`,`T1`.`years` AS `Year(s)`,`T1`.`price` AS `Price`,`T1`.`stockLevel` AS `Initial Stock Level`,`T1`.`price` * `T1`.`stockLevel` AS `Initial Cost`,`T2`.`used` AS `Used`,`T2`.`delivery` AS `Delivery`,`T1`.`stockLevel` + `T2`.`delivery` - `T2`.`used` AS `New Stock Level`,(`T1`.`stockLevel` + `T2`.`delivery` - `T2`.`used`) * `T1`.`price` AS `Stock Cost`,`T1`.`threshold` AS `Threshold Level`,`T2`.`dateReported` AS `Month` from (`parts_garits` `T1` join `stockledger_garits` `T2` on(`T1`.`partCode` = `T2`.`code`));






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




