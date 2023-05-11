-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 07:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointmentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE `appointment_tbl` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `trainer` varchar(50) NOT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `dateSubmitted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_tbl`
--

INSERT INTO `appointment_tbl` (`id`, `email`, `title`, `trainer`, `start_datetime`, `end_datetime`, `status`, `dateSubmitted`) VALUES
(8, ' user1@gmail.com', 'workoit', '', '2023-04-24 12:00:00', '2023-04-24 12:00:00', '', '2023-04-18 04:22:58'),
(10, ' bogart.pedring@gmail.com', 'yoga', '', '2023-04-19 22:21:00', '2023-04-27 21:21:00', '', '2023-04-18 04:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `contacttbl`
--

CREATE TABLE `contacttbl` (
  `ContactID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `dateSubmitted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacttbl`
--

INSERT INTO `contacttbl` (`ContactID`, `AccountID`, `Message`, `Subject`, `dateSubmitted`) VALUES
(1, 0, 'ddsadasdsadasdasdasd', 'dasdas', '2023-04-18 04:21:05'),
(2, 0, 'gagagsdgffasdfgafgeasda123', 'test123', '2023-04-18 04:26:17'),
(3, 0, 'dasdadasagasdgsafdddddddddddddd', 'dasdasdsadastest123', '2023-04-18 04:27:51'),
(4, 0, 'dasddddddddddddddddddddddddddddddddd', 'dddddddddddddddddddddddddddddd', '2023-04-18 04:28:51'),
(5, 0, 'ddddddddddsdaddddddddddddddddddddddddd', 'ddddddddddddddddd', '2023-04-18 04:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `logintbl`
--

CREATE TABLE `logintbl` (
  `AccountID` int(100) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Username` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 0,
  `Fname` varchar(100) DEFAULT NULL,
  `Lname` varchar(100) DEFAULT NULL,
  `Contact_Num` varchar(100) DEFAULT NULL,
  `Email_Add` varchar(100) DEFAULT NULL,
  `Street` varchar(100) DEFAULT NULL,
  `Barangay` varchar(100) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Zip_Code` varchar(100) DEFAULT NULL,
  `Account_Image` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logintbl`
--

INSERT INTO `logintbl` (`AccountID`, `Name`, `Username`, `Password`, `Status`, `Fname`, `Lname`, `Contact_Num`, `Email_Add`, `Street`, `Barangay`, `City`, `Zip_Code`, `Account_Image`) VALUES
(0, 'Aliena Abano', 'aliena', 'try', 0, 'Aliena', 'Abano', NULL, 'aliena.abano113@gmail.com', NULL, NULL, NULL, NULL, 0),
(1, 'Alarcon Rosebert', 'bogart', 'test123', 0, 'Rosebert', 'Alar', '09219046613', 'rosebert.alarcon18@gmail.com', '73 P Florentino St.', 'Sto.D', 'Quezon CIty', '1114', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membertbl`
--

CREATE TABLE `membertbl` (
  `memberID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `AccountID` int(100) NOT NULL,
  `joinDate` datetime DEFAULT NULL,
  `Expiration` datetime DEFAULT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membertbl`
--

INSERT INTO `membertbl` (`memberID`, `serviceID`, `AccountID`, `joinDate`, `Expiration`, `Message`) VALUES
(9, 2, 1, NULL, NULL, 'test'),
(10, 1, 1, NULL, NULL, 'i would love to inquire sht'),
(11, 2, 1, NULL, NULL, 'test test'),
(12, 2, 1, NULL, NULL, 'test test'),
(13, 2, 1, NULL, NULL, 'test test'),
(14, 2, 1, NULL, NULL, 'test test'),
(15, 2, 1, NULL, NULL, 'test test'),
(16, 2, 1, NULL, NULL, 'test test'),
(17, 1, 1, NULL, NULL, 'try ulit'),
(18, 2, 0, NULL, NULL, 'try');

-- --------------------------------------------------------

--
-- Table structure for table `servicetypetbl`
--

CREATE TABLE `servicetypetbl` (
  `serviceID` int(11) NOT NULL,
  `serviceType` varchar(60) NOT NULL,
  `serviceDescription` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `servicetypetbl`
--

INSERT INTO `servicetypetbl` (`serviceID`, `serviceType`, `serviceDescription`) VALUES
(1, 'Yoga', 'Good for health!'),
(2, 'Workout', 'Good for body building!');

-- --------------------------------------------------------

--
-- Table structure for table `staffreviewtbl`
--

CREATE TABLE `staffreviewtbl` (
  `staffReviewID` int(11) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `Reviews` varchar(100) NOT NULL,
  `dateSubmitted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stafftbl`
--

CREATE TABLE `stafftbl` (
  `staffID` int(11) NOT NULL,
  `serviceID` int(11) NOT NULL,
  `staffName` varchar(150) NOT NULL,
  `staffPosition` varchar(150) NOT NULL,
  `staffImage` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacttbl`
--
ALTER TABLE `contacttbl`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Indexes for table `logintbl`
--
ALTER TABLE `logintbl`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `membertbl`
--
ALTER TABLE `membertbl`
  ADD PRIMARY KEY (`memberID`),
  ADD KEY `serviceID` (`serviceID`),
  ADD KEY `try` (`AccountID`);

--
-- Indexes for table `servicetypetbl`
--
ALTER TABLE `servicetypetbl`
  ADD PRIMARY KEY (`serviceID`);

--
-- Indexes for table `staffreviewtbl`
--
ALTER TABLE `staffreviewtbl`
  ADD PRIMARY KEY (`staffReviewID`),
  ADD KEY `AccountID` (`AccountID`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `stafftbl`
--
ALTER TABLE `stafftbl`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `serviceID` (`serviceID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_tbl`
--
ALTER TABLE `appointment_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacttbl`
--
ALTER TABLE `contacttbl`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `membertbl`
--
ALTER TABLE `membertbl`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `servicetypetbl`
--
ALTER TABLE `servicetypetbl`
  MODIFY `serviceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffreviewtbl`
--
ALTER TABLE `staffreviewtbl`
  MODIFY `staffReviewID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stafftbl`
--
ALTER TABLE `stafftbl`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacttbl`
--
ALTER TABLE `contacttbl`
  ADD CONSTRAINT `contacttbl_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `logintbl` (`AccountID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `membertbl`
--
ALTER TABLE `membertbl`
  ADD CONSTRAINT `membertbl_ibfk_1` FOREIGN KEY (`serviceID`) REFERENCES `servicetypetbl` (`serviceID`) ON DELETE CASCADE,
  ADD CONSTRAINT `try` FOREIGN KEY (`AccountID`) REFERENCES `logintbl` (`AccountID`) ON DELETE CASCADE;

--
-- Constraints for table `staffreviewtbl`
--
ALTER TABLE `staffreviewtbl`
  ADD CONSTRAINT `staffreviewtbl_ibfk_1` FOREIGN KEY (`AccountID`) REFERENCES `logintbl` (`AccountID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staffreviewtbl_ibfk_2` FOREIGN KEY (`staffID`) REFERENCES `stafftbl` (`staffID`) ON DELETE CASCADE;

--
-- Constraints for table `stafftbl`
--
ALTER TABLE `stafftbl`
  ADD CONSTRAINT `stafftbl_ibfk_1` FOREIGN KEY (`serviceID`) REFERENCES `servicetypetbl` (`serviceID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
