-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220616.7a6bd9eb57
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2022 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineclearancedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `id` int(11) NOT NULL,
  `studentsid` varchar(255) NOT NULL,
  `studentdepartment` varchar(255) NOT NULL,
  `officerid` int(11) NOT NULL,
  `officerfullname` varchar(255) NOT NULL,
  `accountant` int(11) NOT NULL,
  `librarian` int(11) NOT NULL,
  `computerlab` int(11) NOT NULL,
  `faslab` int(11) NOT NULL,
  `halltutor` int(11) NOT NULL,
  `deanincharge` int(11) NOT NULL,
  `sportscoach` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`id`, `studentsid`, `studentdepartment`, `officerid`, `officerfullname`, `accountant`, `librarian`, `computerlab`, `faslab`, `halltutor`, `deanincharge`, `sportscoach`, `status`) VALUES
(2, 'FMS/0075/17', '', 0, '', 1, 1, 1, 1, 1, 1, 1, 0),
(4, 'FMS/0034/18', '', 0, '', 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentname` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentname`, `faculty`, `datecreated`) VALUES
(1, 'Computer Science', 'scis', '2022-10-03 14:29:25'),
(2, 'Biochem', 'FAS', '2022-10-03 15:19:36');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `feesamount` double NOT NULL,
  `department` varchar(255) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `feesamount`, `department`, `createdat`) VALUES
(2, 500, 'Computer Science', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `officerid` varchar(255) NOT NULL,
  `officerpassword` varchar(255) NOT NULL,
  `officerfullname` varchar(255) NOT NULL,
  `officerdepartment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `officerid`, `officerpassword`, `officerfullname`, `officerdepartment`) VALUES
(1, '12345', '12345678', 'Mansah Musah', 'computerlab'),
(4, '123456', '12345678', 'Miss Rakiba', 'accountant'),
(5, '1234567', '12345678', 'Miss Rakiba', 'librarian'),
(6, '666111', '12345678', 'Miss Rakiba', 'laboratory'),
(7, '111666', '12345678', 'Miss Rakiba', 'deanincharge'),
(8, '111667', '12345678', 'Miss Rakiba', 'sportscoach'),
(9, '111668', '12345678', 'Miss Rakiba', 'halltutor');

-- --------------------------------------------------------

--
-- Table structure for table `studentfees`
--

CREATE TABLE `studentfees` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `studentfullname` varchar(255) NOT NULL,
  `feesid` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studentid` varchar(255) NOT NULL,
  `studentfullname` varchar(255) NOT NULL,
  `studentdepartment` varchar(255) NOT NULL,
  `studentprogramme` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `studentclearancestatus` varchar(11) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `computerlab` int(11) NOT NULL,
  `accountant` int(11) NOT NULL,
  `librarian` int(11) NOT NULL,
  `sportscoach` int(11) NOT NULL,
  `laboratory` int(11) NOT NULL,
  `deanincharge` int(11) NOT NULL,
  `halltutor` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentid`, `studentfullname`, `studentdepartment`, `studentprogramme`, `date`, `gender`, `password`, `studentclearancestatus`, `profilepic`, `computerlab`, `accountant`, `librarian`, `sportscoach`, `laboratory`, `deanincharge`, `halltutor`, `status`) VALUES
(4, 'FMS/0075/17', ' Ahmed Issah', 'Biochem', 'Computer Science', '2010-09-09', 'male', '12345678', '1', '', 1, 1, 1, 1, 1, 1, 1, 1),
(6, 'FMS/0034/18', ' Rakiba Sulemana', 'Computer Science', 'Computer Science', '2022-10-07', 'female', '12345678', '1', '', 1, 1, 1, 1, 1, 1, 1, 1),
(7, 'FMS/0034/19', ' Rakiba Sulemana', 'Computer Science', 'Computer Science', '2022-10-07', 'female', '12345678', '1', '', 1, 1, 1, 1, 1, 1, 1, 1),
(8, 'FMS/0034/19', ' Rakiba Sulemana', 'Computer Science', 'Computer Science', '2022-10-07', 'female', '12345678', '1', '', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joinedat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `joinedat`) VALUES
(1, 'Mansah Musah', 'mansahmusah@gmail.com', '$2y$10$U2MKZkqLGlbrcRpqadB4Fu6bJGRuUGA9mhkF/TYZagjnesGfyAEuC', '2022-10-03 01:11:49'),
(2, 'Mohammed Amin Ibrahim', 'mohammedaminibrahim10@gmail.com', '$2y$10$zahmT86O9H/GE.Tqsr9E1uSF3Udri98haG3KiiTBO7x05Jp4/H8ai', '2022-10-03 01:37:34'),
(3, 'rakiba', 'rakiba@gmail.com', '$2y$10$XAaxfFWwj8fvoRxlGgifCuDGbNvdReL30FjfCHtG9RPxB9Zgr8UJK', '2022-10-03 13:33:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officerid` (`officerid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feesid` (`feesid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studentfees`
--
ALTER TABLE `studentfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentfees`
--
ALTER TABLE `studentfees`
  ADD CONSTRAINT `studentfees_ibfk_1` FOREIGN KEY (`feesid`) REFERENCES `fees` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



