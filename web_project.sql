-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 07:35 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AID` int(11) NOT NULL,
  `TIME` time NOT NULL,
  `DATE` date NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `REVIEW` varchar(200) DEFAULT NULL,
  `NOTE` varchar(200) DEFAULT NULL,
  `SERVICE_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AID`, `TIME`, `DATE`, `STATUS`, `REVIEW`, `NOTE`, `SERVICE_NAME`) VALUES
(1, '10:00:00', '2022-02-02', 'AVAILABLE', NULL, NULL, 'GROOMING'),
(2, '02:00:00', '2022-02-02', 'UPCOMING', NULL, NULL, 'Grooming');

-- --------------------------------------------------------

--
-- Table structure for table `book_appointment`
--

CREATE TABLE `book_appointment` (
  `PET_OWNER_EMAIL` varchar(40) NOT NULL,
  `PID` int(11) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_appointment`
--

INSERT INTO `book_appointment` (`PET_OWNER_EMAIL`, `PID`, `AID`) VALUES
('A@GAMIL.COM', 3, 0),
('A@GAMIL.COM', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_manager`
--

CREATE TABLE `clinic_manager` (
  `MANAGER_EMAIL` varchar(40) NOT NULL,
  `MANAGER_PASSWORD` varchar(40) NOT NULL,
  `CLINIC_EMAIL` varchar(40) NOT NULL,
  `CLINIC_DESCRIPTION` varchar(300) NOT NULL,
  `CLINIC_LOCATION` point DEFAULT NULL COMMENT 'NULL?',
  `CLINIC_PHONE_NUMBER` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_manager`
--

INSERT INTO `clinic_manager` (`MANAGER_EMAIL`, `MANAGER_PASSWORD`, `CLINIC_EMAIL`, `CLINIC_DESCRIPTION`, `CLINIC_LOCATION`, `CLINIC_PHONE_NUMBER`) VALUES
('MANAGER@GMAIL.COM', 'PASSWORD', 'CLINIC@GMAIL.COM', 'DESC', NULL, '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_pictures`
--

CREATE TABLE `clinic_pictures` (
  `MANAGER_EMAIL` varchar(40) NOT NULL,
  `PICTURES` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic_service`
--

CREATE TABLE `clinic_service` (
  `SERVICE_NAME` varchar(40) NOT NULL,
  `SERVICE_PHOTO` varchar(255) DEFAULT NULL,
  `SERVICE_DESCRIPTION` varchar(100) NOT NULL,
  `SERVICE_PRICE` double NOT NULL,
  `CLINIC_MANAGER_EMAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic_service`
--

INSERT INTO `clinic_service` (`SERVICE_NAME`, `SERVICE_PHOTO`, `SERVICE_DESCRIPTION`, `SERVICE_PRICE`, `CLINIC_MANAGER_EMAIL`) VALUES
('GROOMING', NULL, 'DESC', 100, 'MANAGER@GMAIL.COM'),
('Vaccination', NULL, 'dexc', 100, 'MANAGER@GMAIL.COM');

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `PID` int(11) NOT NULL,
  `PET_NAME` varchar(20) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `PET_GENDER` char(1) NOT NULL,
  `BREED` varchar(20) NOT NULL,
  `SPAYED_OR_NEUTERED_STATUS` tinyint(1) NOT NULL,
  `PET_PHOTO` varchar(255) DEFAULT NULL,
  `PET_OWNER_EMAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet`
--

INSERT INTO `pet` (`PID`, `PET_NAME`, `DATE_OF_BIRTH`, `PET_GENDER`, `BREED`, `SPAYED_OR_NEUTERED_STATUS`, `PET_PHOTO`, `PET_OWNER_EMAIL`) VALUES
(1, 'KITTY', '0000-00-00', 'F', 'BREDD', 0, NULL, 'A@GAMIL.COM'),
(3, 'KITTYTWO', '2022-01-01', 'F', 'BREDD', 0, NULL, 'A@GAMIL.COM');

-- --------------------------------------------------------

--
-- Table structure for table `pet_medical_history`
--

CREATE TABLE `pet_medical_history` (
  `MEDICAL_HISTORY` varchar(100) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `OWNER_EMAIL` varchar(40) NOT NULL,
  `OWNER_PHONE_NUMBER` char(10) NOT NULL,
  `OWNER_PASSWORD` varchar(40) NOT NULL,
  `FIRST_NAME` varchar(20) NOT NULL,
  `LAST_NAME` varchar(20) NOT NULL,
  `OWNER_GENDER` char(1) NOT NULL,
  `OWNER_PHOTO` varchar(255) DEFAULT NULL COMMENT '255 enough?',
  `CLINIC_MANAGER_EMAIL` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_owner`
--

INSERT INTO `pet_owner` (`OWNER_EMAIL`, `OWNER_PHONE_NUMBER`, `OWNER_PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `OWNER_GENDER`, `OWNER_PHOTO`, `CLINIC_MANAGER_EMAIL`) VALUES
('A@GAMIL.COM', '1234567890', 'PASSWORD', 'FIRST', 'LAST', 'F', NULL, 'MANAGER@GMAIL.COM');

-- --------------------------------------------------------

--
-- Table structure for table `pet_vaccination_list`
--

CREATE TABLE `pet_vaccination_list` (
  `VACCINATION_LIST` varchar(100) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `FK4` (`SERVICE_NAME`);

--
-- Indexes for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `FK7` (`PET_OWNER_EMAIL`),
  ADD KEY `FK8` (`PID`);

--
-- Indexes for table `clinic_manager`
--
ALTER TABLE `clinic_manager`
  ADD PRIMARY KEY (`MANAGER_EMAIL`);

--
-- Indexes for table `clinic_pictures`
--
ALTER TABLE `clinic_pictures`
  ADD PRIMARY KEY (`MANAGER_EMAIL`,`PICTURES`);

--
-- Indexes for table `clinic_service`
--
ALTER TABLE `clinic_service`
  ADD PRIMARY KEY (`SERVICE_NAME`),
  ADD KEY `FK3` (`CLINIC_MANAGER_EMAIL`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `FK2` (`PET_OWNER_EMAIL`);

--
-- Indexes for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  ADD PRIMARY KEY (`MEDICAL_HISTORY`,`PID`),
  ADD KEY `FK5` (`PID`);

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`OWNER_EMAIL`),
  ADD KEY `FK` (`CLINIC_MANAGER_EMAIL`);

--
-- Indexes for table `pet_vaccination_list`
--
ALTER TABLE `pet_vaccination_list`
  ADD PRIMARY KEY (`VACCINATION_LIST`,`PID`),
  ADD KEY `FK6` (`PID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK4` FOREIGN KEY (`SERVICE_NAME`) REFERENCES `clinic_service` (`SERVICE_NAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_appointment`
--
ALTER TABLE `book_appointment`
  ADD CONSTRAINT `FK7` FOREIGN KEY (`PET_OWNER_EMAIL`) REFERENCES `pet_owner` (`OWNER_EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK8` FOREIGN KEY (`PID`) REFERENCES `pet` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinic_pictures`
--
ALTER TABLE `clinic_pictures`
  ADD CONSTRAINT `FK0` FOREIGN KEY (`MANAGER_EMAIL`) REFERENCES `clinic_manager` (`MANAGER_EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinic_service`
--
ALTER TABLE `clinic_service`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`CLINIC_MANAGER_EMAIL`) REFERENCES `clinic_manager` (`MANAGER_EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`PET_OWNER_EMAIL`) REFERENCES `pet_owner` (`OWNER_EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_medical_history`
--
ALTER TABLE `pet_medical_history`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`PID`) REFERENCES `pet` (`PID`);

--
-- Constraints for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD CONSTRAINT `FK` FOREIGN KEY (`CLINIC_MANAGER_EMAIL`) REFERENCES `clinic_manager` (`MANAGER_EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pet_vaccination_list`
--
ALTER TABLE `pet_vaccination_list`
  ADD CONSTRAINT `FK6` FOREIGN KEY (`PID`) REFERENCES `pet` (`PID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
