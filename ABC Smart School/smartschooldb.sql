-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 08:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartschooldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_materials`
--

CREATE TABLE `class_materials` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `File_Path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_materials`
--

INSERT INTO `class_materials` (`id`, `Name`, `Description`, `File_Path`) VALUES
(1, 'What is desolved oxygen', 'Please read this well', '../../File/Materials/dissolved_oxygen.pdf'),
(2, 'Software Project Book', 'Please read this well', '../../File/Materials/software_project_management.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(11) NOT NULL,
  `Notice` varchar(255) DEFAULT NULL,
  `Details` varchar(500) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `Notice`, `Details`, `Date`) VALUES
(1, '21st Convocation Consolidated Notices', 'Every graduating student who wants to be present in the 21st convocation ceremony MUST FILL UP this form. Otherwise, the invitation card for the student (and his/her guests) will not be issued and eventually the student will not be able to take part in the Convocation Ceremony. \'Convocation Ceremony Attendance Confirmation Form\' will be available online', 'Mar 05, 2023'),
(2, 'Revised Makeup Class Schedule', '2023\r\nJan 19 Freshman Students’ orientation\r\n22 First day of regular classes\r\n26 & 29 Adding/ Dropping\r\n26 Automatic conversion of UW, I, blank grades of Fall', 'Mar 12, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Answer` varchar(500) DEFAULT NULL,
  `Date` varchar(50) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `Subject`, `Description`, `Answer`, `Date`, `UserID`) VALUES
(4, 'kisu bujhina', 'Aro thi  korlamThik kore lekhlam', NULL, '2023/03/12', 1),
(5, 'asdasdasdasda asdasd', 'asd theke onno kisu', NULL, '2023/03/12', 2),
(9, 'Student Test', 'House 999sad99, Road 1, Block F', 'yujkfvikgikgi', '2023/03/12', 3),
(10, 'Student Test', 'House ', 'jkmyvjkvj', '2023/03/12', 2),
(12, 'asdasdasdasda asdasd', 'asda sdasd assd', NULL, '2023/03/12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Phone` text NOT NULL,
  `Address` varchar(255) NOT NULL,
  `DOB` text NOT NULL,
  `Gender` text NOT NULL,
  `User_Type` text NOT NULL,
  `File_Path` varchar(500) NOT NULL,
  `Validation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Username`, `Password`, `Phone`, `Address`, `DOB`, `Gender`, `User_Type`, `File_Path`, `Validation`) VALUES
(1, 'Xd Abd', 'ggwp@gmail.com', 'asdasd', '@1234567', '+8801702115000', '      House 99999, Road 1, Block F      ', '2010-12-26', 'Male', 'admin', '../../File/5eeea355389655.59822ff824b72.gif', 'True'),
(2, 'Student Test', 'vvamid@gg.com', 'student', '@1234567', '+8801702115666', 'House 234, Road 1, Block F', '2023-02-26', 'Male', 'student', '../../File/image.webp', 'True'),
(4, 'Teacher', 'teacher@gg.com', 'teacher12', '@1234567', '+8801465821425', 'ads', '2010-12-26', 'Male', 'teacher', '', 'False'),
(5, 'Accountant', 'accountant@gg.com', 'accountant12', '@1234567', '+8801465821425', 'ads', '2010-12-26', 'Male', 'accountant', '', ''),
(6, 'Student Test', 'ssttudent@gmail.com', 'abcd1234', '@1234567', '+8801702115000', ' House 999sad99, Road 1, Block F ', '2012-12-30', 'Male', 'student', '../../File/Rectangle 25.png', 'True');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_materials`
--
ALTER TABLE `class_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_materials`
--
ALTER TABLE `class_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
