-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2022 at 02:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `garit_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `completed_tasks`
--

CREATE TABLE `completed_tasks` (
  `jobID` int(10) DEFAULT NULL,
  `taskNo` int(10) DEFAULT NULL,
  `empID` int(10) DEFAULT NULL,
  `duration` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `completed_tasks`
--

INSERT INTO `completed_tasks` (`jobID`, `taskNo`, `empID`, `duration`) VALUES
(2, 1, 6, '2.00'),
(2, 2, 6, '3.00'),
(3, 1, 6, '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_garits`
--

CREATE TABLE `customer_garits` (
  `cardNo` int(10) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `dateIssued` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) NOT NULL,
  `pcode` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `faxNo` varchar(255) DEFAULT NULL,
  `invoiceNo` int(10) DEFAULT NULL,
  `paid` varchar(3) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `customerType` varchar(255) NOT NULL,
  `payLate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_garits`
--

INSERT INTO `customer_garits` (`cardNo`, `fname`, `sname`, `dateIssued`, `address`, `pcode`, `telephone`, `faxNo`, `invoiceNo`, `paid`, `discount`, `customerType`, `payLate`) VALUES
(4, 'John', 'Doherty', '2022-04-08 14:46:21', 'Miscellaneous House,  Unknown Street,  Whichville,  Nowhereshire,', 'MT1 2UP', '07070070707', '01010100101', NULL, NULL, '', 'Casual', ''),
(5, 'William', 'Gates', '2022-04-08 14:47:45', 'World Domination House,  Enormous Street,  Richville', 'World Domination House,  Enormous Street,  Richville', '0666666666', '02074773333', NULL, NULL, '', 'Account Holder', ''),
(6, 'asda', 'asda', '2022-04-11 22:44:28', 'asda', 'asda', '1212121', '12121', NULL, NULL, NULL, 'Casual', NULL),
(7, 'sadaafef', 'fefefewff', '2022-04-11 23:52:48', 'wefwefewf', 'fwff', '1314', '424', NULL, NULL, NULL, 'Casual', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expected_tasks`
--

CREATE TABLE `expected_tasks` (
  `jobID` int(10) DEFAULT NULL,
  `taskNo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expected_tasks`
--

INSERT INTO `expected_tasks` (`jobID`, `taskNo`) VALUES
(2, 1),
(2, 2),
(3, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoicereportcustomer`
-- (See below for the actual view)
--
CREATE TABLE `invoicereportcustomer` (
`fname` varchar(255)
,`sname` varchar(255)
,`address` varchar(255)
,`pcode` varchar(255)
,`carRegistration` varchar(255)
,`make` varchar(255)
,`model` varchar(255)
,`jobNo` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoicereportpartsused`
-- (See below for the actual view)
--
CREATE TABLE `invoicereportpartsused` (
`jobNo` int(10)
,`carRegistration` varchar(255)
,`partName` varchar(255)
,`partCode` varchar(255)
,`quantity` int(10)
,`price` decimal(5,2)
,`total` decimal(15,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `invoicetask`
-- (See below for the actual view)
--
CREATE TABLE `invoicetask` (
`carRegistration` varchar(255)
,`jobID` int(10)
,`taskDescription` varchar(255)
,`empID` int(10)
,`duration` decimal(5,2)
,`hourlyRate` float
);

-- --------------------------------------------------------

--
-- Table structure for table `job_garits`
--

CREATE TABLE `job_garits` (
  `jobNo` int(10) NOT NULL,
  `jobType` varchar(255) NOT NULL,
  `mechanicID` int(100) DEFAULT NULL,
  `estimateTime` varchar(255) NOT NULL,
  `jobStatus` varchar(255) DEFAULT NULL,
  `carRegistration` varchar(255) NOT NULL,
  `dateCaptured` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `serviceDate` date NOT NULL,
  `totalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_garits`
--

INSERT INTO `job_garits` (`jobNo`, `jobType`, `mechanicID`, `estimateTime`, `jobStatus`, `carRegistration`, `dateCaptured`, `serviceDate`, `totalPrice`) VALUES
(1, 'Annual Service', NULL, '12', NULL, 'AA69 CPG', '2022-04-11 21:59:19', '2022-04-11', NULL),
(2, 'Vehicle Repair', NULL, '12', NULL, 'asda', '2022-04-11 23:53:49', '2022-04-09', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `labourtask`
-- (See below for the actual view)
--
CREATE TABLE `labourtask` (
`carRegistration` varchar(255)
,`jobID` int(10)
,`taskDescription` varchar(255)
,`empID` int(10)
,`duration` decimal(5,2)
,`hourlyRate` float
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `numberofvehicles`
-- (See below for the actual view)
--
CREATE TABLE `numberofvehicles` (
`jobNo` int(10)
,`jobType` varchar(255)
,`serviceDate` date
,`customerType` varchar(255)
,`registrationNo` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `parts_garits`
--

CREATE TABLE `parts_garits` (
  `partCode` varchar(255) NOT NULL,
  `partName` varchar(255) NOT NULL,
  `manufacture` varchar(255) NOT NULL,
  `vechileType` varchar(255) NOT NULL,
  `years` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `stockLevel` int(10) NOT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `threshold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parts_garits`
--

INSERT INTO `parts_garits` (`partCode`, `partName`, `manufacture`, `vechileType`, `years`, `price`, `stockLevel`, `dateReported`, `threshold`) VALUES
('as-cv', 'pipe', 'adsd', 'ford', '2003 ', '6.00', 60, '2022-04-11 23:37:11', 50),
('qwe', 'pipe', 'adsd', 'ford', '2003 ', '12.00', 40, '2022-04-12 00:08:40', 1);

-- --------------------------------------------------------

--
-- Table structure for table `part_used`
--

CREATE TABLE `part_used` (
  `jobID` int(10) DEFAULT NULL,
  `partCode` varchar(255) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `part_used`
--

INSERT INTO `part_used` (`jobID`, `partCode`, `quantity`) VALUES
(3, 'XQC-123', 4),
(3, 'YTGH-UY8', 2),
(5, 'XQC-123', 2),
(5, 'YTGH-UY8', 1),
(2, 'XQC-123', 4),
(2, 'YTGH-UY8', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salehistory_garits`
--

CREATE TABLE `salehistory_garits` (
  `saleId` int(10) NOT NULL,
  `receiptReference` varchar(255) DEFAULT NULL,
  `total` varchar(255) NOT NULL,
  `dateAquired` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salehistory_garits`
--

INSERT INTO `salehistory_garits` (`saleId`, `receiptReference`, `total`, `dateAquired`) VALUES
(25, 'Chelsea', '251.96', '2022-04-08 16:18:45'),
(26, 'Chelsea', '671.90', '2022-04-08 17:44:33'),
(27, 'Chelsea', '731.96', '2022-04-09 13:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `sale_garits`
--

CREATE TABLE `sale_garits` (
  `saleId` int(10) NOT NULL,
  `receiptReference` varchar(255) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `partNo` varchar(255) NOT NULL,
  `total` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale_garits`
--

INSERT INTO `sale_garits` (`saleId`, `receiptReference`, `quantity`, `partNo`, `total`) VALUES
(31, 'Chelsea', 2, 'YTGH-UY8', '139.98'),
(32, 'Chelsea', 2, 'YTGH-UY8', '139.98'),
(33, 'Chelsea', 2, 'YTGH-UY8', '139.98'),
(34, 'Chelsea', 4, 'RTQR', '279.96'),
(35, 'Chelsea', 2, 'YTGH-UY8', '139.98');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `StaffID` int(10) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Sname` varchar(255) NOT NULL,
  `Roles` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `hourlyRate` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`StaffID`, `Fname`, `Sname`, `Roles`, `Username`, `Password`, `hourlyRate`) VALUES
(46, 'a', 'qasda', 'Receptionist', 'a', 'as', 0),
(47, 'asda', 'aa', 'Mechanic', 'aaaaa', 'asqawaaa', 0),
(48, 'asda', 'sss', 'Franchisee', 'sss', 'ss', 0),
(49, 'asdaaa', 'aaaasdsa', 'Franchisee', 'asas', 'asadas', 0),
(50, 'Hell', 'Is', 'Mechanic', 'hot', 'pk', 0),
(51, 'asda', 'asda', 'Mechanic', 'asda', 'asda', 6),
(52, 'one', 'all', 'Mechanic', 'are', 'we', 0),
(53, 'we', 'are', 'Mechanic', 'thw', 'as', 31),
(54, 'habi', 'bi', 'Mechanic', 'dubai', 'soon', 123),
(55, 'fsaf', 'afaf', 'Mechanic', 'fafafa', 'afaf', 12.45),
(56, 'ripa', 'ripa', 'Foreperson', 'asadaaas', 'j', 100),
(57, 'xxxx', 'xxxx', 'Mechanic', 'xxxxxxx', 'xxxxxx', 105),
(58, 'dfdfefefef', 'efefefef', 'Mechanic', 'eef', 'fefef', 105);

-- --------------------------------------------------------

--
-- Table structure for table `stockledger_garits`
--

CREATE TABLE `stockledger_garits` (
  `stockID` int(11) DEFAULT NULL,
  `used` int(10) DEFAULT 0,
  `delivery` int(10) DEFAULT 0,
  `code` varchar(255) DEFAULT NULL,
  `dateReported` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stockledger_garits`
--

INSERT INTO `stockledger_garits` (`stockID`, `used`, `delivery`, `code`, `dateReported`) VALUES
(1, 0, 60, 'YTGH-UY8', '2022-04-08 18:06:20'),
(2, 0, 5, 'XQC-123', '2022-04-08 18:06:36'),
(14, 0, 15, 'YTGH-UY8', '2022-05-08 19:20:57'),
(15, 0, 5, 'YTGH-UY8', '2022-07-08 19:22:37'),
(17, 0, 0, '', '2022-04-10 11:17:08'),
(18, 0, 0, 'RTQR', '2022-04-10 11:26:22'),
(NULL, NULL, NULL, 'as-cv', '2022-04-11 23:34:31'),
(NULL, 0, 0, 'qwe', '2022-04-12 00:08:40');

-- --------------------------------------------------------

--
-- Stand-in structure for view `stockreport`
-- (See below for the actual view)
--
CREATE TABLE `stockreport` (
`Part Name` varchar(255)
,`Code` varchar(255)
,`Manufacturer` varchar(255)
,`Vehicle Type` varchar(255)
,`Year(s)` varchar(255)
,`Price` decimal(5,2)
,`Initial Stock Level` int(10)
,`Initial Cost` decimal(15,2)
,`Used` int(10)
,`Delivery` int(10)
,`New Stock Level` bigint(13)
,`Stock Cost` decimal(17,2)
,`Threshold Level` int(10)
,`Month` timestamp
);

-- --------------------------------------------------------

--
-- Table structure for table `task_garits`
--

CREATE TABLE `task_garits` (
  `taskNo` int(10) NOT NULL,
  `taskDescription` varchar(255) NOT NULL,
  `timeDuration` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_garits`
--

INSERT INTO `task_garits` (`taskNo`, `taskDescription`, `timeDuration`) VALUES
(1, 'Comprehensive Service', '2.00'),
(2, 'Bodywork/respray', '3.00');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_garits`
--

CREATE TABLE `vehicle_garits` (
  `registrationNo` varchar(255) NOT NULL,
  `make` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` varchar(255) DEFAULT NULL,
  `colour` varchar(255) NOT NULL,
  `customerCardNo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_garits`
--

INSERT INTO `vehicle_garits` (`registrationNo`, `make`, `model`, `year`, `colour`, `customerCardNo`) VALUES
('asda', 'sad', 'wqewe', '213', 'red', 7);

-- --------------------------------------------------------

--
-- Structure for view `invoicereportcustomer`
--
DROP TABLE IF EXISTS `invoicereportcustomer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoicereportcustomer`  AS SELECT `t1`.`fname` AS `fname`, `t1`.`sname` AS `sname`, `t1`.`address` AS `address`, `t1`.`pcode` AS `pcode`, `t3`.`carRegistration` AS `carRegistration`, `t2`.`make` AS `make`, `t2`.`model` AS `model`, `t3`.`jobNo` AS `jobNo` FROM ((`customer_garits` `t1` join `vehicle_garits` `t2`) join `job_garits` `t3`) WHERE `t1`.`cardNo` = `t2`.`customerCardNo` AND `t2`.`registrationNo` = `t3`.`carRegistration` GROUP BY `t1`.`cardNo` ;

-- --------------------------------------------------------

--
-- Structure for view `invoicereportpartsused`
--
DROP TABLE IF EXISTS `invoicereportpartsused`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoicereportpartsused`  AS SELECT `t2`.`jobNo` AS `jobNo`, `t2`.`carRegistration` AS `carRegistration`, `t3`.`partName` AS `partName`, `t1`.`partCode` AS `partCode`, `t1`.`quantity` AS `quantity`, `t3`.`price` AS `price`, `t3`.`price`* `t1`.`quantity` AS `total` FROM ((`part_used` `t1` join `job_garits` `t2` on(`t1`.`jobID` = `t2`.`jobNo`)) join `parts_garits` `t3` on(`t1`.`partCode` = `t3`.`partCode`)) ;

-- --------------------------------------------------------

--
-- Structure for view `invoicetask`
--
DROP TABLE IF EXISTS `invoicetask`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `invoicetask`  AS SELECT `t1`.`carRegistration` AS `carRegistration`, `t2`.`jobID` AS `jobID`, `t3`.`taskDescription` AS `taskDescription`, `t2`.`empID` AS `empID`, `t2`.`duration` AS `duration`, `t4`.`hourlyRate` AS `hourlyRate` FROM (((`job_garits` `t1` join `completed_tasks` `t2` on(`t1`.`jobNo` = `t2`.`jobID`)) join `task_garits` `t3` on(`t2`.`taskNo` = `t3`.`taskNo`)) join `staff` `t4` on(`t2`.`empID` = `t4`.`StaffID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `labourtask`
--
DROP TABLE IF EXISTS `labourtask`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `labourtask`  AS SELECT `T1`.`carRegistration` AS `carRegistration`, `T2`.`jobID` AS `jobID`, `T3`.`taskDescription` AS `taskDescription`, `T2`.`empID` AS `empID`, `T2`.`duration` AS `duration`, `T4`.`hourlyRate` AS `hourlyRate` FROM (((`job_garits` `T1` join `completed_tasks` `T2` on(`T1`.`jobNo` = `T2`.`jobID`)) join `task_garits` `T3` on(`T2`.`taskNo` = `T3`.`taskNo`)) join `staff` `T4` on(`T2`.`empID` = `T4`.`StaffID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `numberofvehicles`
--
DROP TABLE IF EXISTS `numberofvehicles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `numberofvehicles`  AS SELECT `t1`.`jobNo` AS `jobNo`, `t1`.`jobType` AS `jobType`, `t1`.`serviceDate` AS `serviceDate`, `t2`.`customerType` AS `customerType`, `t3`.`registrationNo` AS `registrationNo` FROM ((`job_garits` `t1` join `customer_garits` `t2`) join `vehicle_garits` `t3`) WHERE `t1`.`carRegistration` = `t3`.`registrationNo` AND `t3`.`customerCardNo` = `t2`.`cardNo` GROUP BY `t1`.`jobNo` ;

-- --------------------------------------------------------

--
-- Structure for view `stockreport`
--
DROP TABLE IF EXISTS `stockreport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stockreport`  AS SELECT `t1`.`partName` AS `Part Name`, `t1`.`partCode` AS `Code`, `t1`.`manufacture` AS `Manufacturer`, `t1`.`vechileType` AS `Vehicle Type`, `t1`.`years` AS `Year(s)`, `t1`.`price` AS `Price`, `t1`.`stockLevel` AS `Initial Stock Level`, `t1`.`price`* `t1`.`stockLevel` AS `Initial Cost`, `t2`.`used` AS `Used`, `t2`.`delivery` AS `Delivery`, `t1`.`stockLevel`+ `t2`.`delivery` - `t2`.`used` AS `New Stock Level`, (`t1`.`stockLevel` + `t2`.`delivery` - `t2`.`used`) * `t1`.`price` AS `Stock Cost`, `t1`.`threshold` AS `Threshold Level`, `t2`.`dateReported` AS `Month` FROM (`parts_garits` `t1` join `stockledger_garits` `t2` on(`t1`.`partCode` = `t2`.`code`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_garits`
--
ALTER TABLE `customer_garits`
  ADD PRIMARY KEY (`cardNo`);

--
-- Indexes for table `job_garits`
--
ALTER TABLE `job_garits`
  ADD PRIMARY KEY (`jobNo`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`StaffID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `vehicle_garits`
--
ALTER TABLE `vehicle_garits`
  ADD PRIMARY KEY (`registrationNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_garits`
--
ALTER TABLE `customer_garits`
  MODIFY `cardNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_garits`
--
ALTER TABLE `job_garits`
  MODIFY `jobNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `StaffID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
