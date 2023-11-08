-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 06:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` varchar(20) NOT NULL,
  `adname` varchar(200) DEFAULT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `adname`, `password`) VALUES
('admin1', 'Isquareit', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `aid` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `DateOfAtt` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `att` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`aid`, `sid`, `sub_id`, `DateOfAtt`, `timeslot`, `att`) VALUES
(10, 'monik_r', 114, '2023-10-18', '3:00pm to 5:00pm', 'P'),
(11, 'sanjhari_s', 114, '2023-10-18', '3:00pm to 5:00pm', 'P'),
(12, 'anushka_s', 114, '2023-10-18', '3:00pm to 5:00pm', 'A'),
(16, 'sanjhari_s', 111, '2023-10-14', '3:00pm to 5:00pm', 'P'),
(17, 'anushka_s', 111, '2023-10-14', '3:00pm to 5:00pm', 'A'),
(18, 'monik_r', 111, '2023-10-14', '3:00pm to 5:00pm', 'A'),
(20, 'monik_r', 111, '2023-09-18', '9:30am to 10:30am', 'P'),
(21, 'anushka_s', 111, '2023-09-18', '9:30am to 10:30am', 'A'),
(22, 'sanjhari_s', 111, '2023-09-18', '9:30am to 10:30am', 'A'),
(23, 'Jane_d', 111, '2023-10-17', '10:45am to 12:45pm', 'P'),
(24, 'Jane_d', 111, '2023-10-17', '10:45am to 12:45pm', 'P'),
(25, 'joseph_39', 111, '2023-10-17', '10:45am to 12:45pm', 'P'),
(26, 'hrutvij_k', 111, '2023-10-17', '10:45am to 12:45pm', 'A'),
(27, 'vedant_c', 111, '2023-10-17', '10:45am to 12:45pm', 'A'),
(55, 'anushka_s', 111, '2023-10-03', '1:45pm to 2:45pm', 'P'),
(56, 'monik_r', 111, '2023-10-03', '1:45pm to 2:45pm', 'A'),
(57, 'sanjhari_s', 111, '2023-10-03', '1:45pm to 2:45pm', 'A'),
(59, 'monik_r', 111, '2023-10-17', '8:30am to 9:30am', 'P'),
(60, 'sanjhari_s', 111, '2023-10-17', '8:30am to 9:30am', 'A'),
(61, 'anushka_s', 111, '2023-10-17', '8:30am to 9:30am', 'A'),
(62, 'anushka_s', 113, '2023-10-18', '9:30am to 10:30am', 'P'),
(63, 'sanjhari_s', 113, '2023-10-18', '9:30am to 10:30am', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`c_name`) VALUES
('te-ce-a'),
('te-ce-b');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `fid` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fid`, `fname`, `password`) VALUES
('aradhya_s', 'Aradhya Sharma', 'aradhya123'),
('depti_c', 'Deptii Chaudhari', 'deptii1'),
('raksha_n', 'Raksha Naidu', 'raksha2'),
('shital_w', 'Shital Wadaganve', 'shital3');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `password`, `c_name`) VALUES
('anushka_s', 'Anushka Shrirao', 'anushka13', 'te-ce-b'),
('hrutvij_k', 'Hrutvij Kakade', 'hrutvij15', 'te-ce-a'),
('Jane_d', 'Jane Doe', 'JustChillin', 'te-ce-a'),
('joseph_39', 'fdfg', 'dgywy', 'te-ce-a'),
('monik_r', 'Monik Ramjiyani', 'monik11', 'te-ce-b'),
('sanjhari_s', 'Sanjhari Sharma', 'sanjhari12', 'te-ce-b'),
('vedant_c', 'Vedant Chaudari', 'justracist', 'te-ce-a'),
('vishi_g', 'Vishwas Gupta', 'vishi14', 'te-ce-a');

-- --------------------------------------------------------

--
-- Table structure for table `studies`
--

CREATE TABLE `studies` (
  `sid` varchar(20) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studies`
--

INSERT INTO `studies` (`sid`, `sub_id`) VALUES
('anushka_s', 111),
('anushka_s', 114),
('anushka_s', 112),
('anushka_s', 113),
('hrutvij_k', 111),
('hrutvij_k', 113),
('vishi_g', 114),
('vishi_g', 112),
('monik_r', 111),
('monik_r', 114),
('monik_r', 112),
('sanjhari_s', 111),
('sanjhari_s', 114),
('sanjhari_s', 113),
('sanjhari_s', 112),
('vedant_c', 111),
('vedant_c', 113),
('vedant_c', 112),
('Jane_d', 111),
('Jane_d', 114),
('Jane_d', 112),
('Jane_d', 111),
('Jane_d', 113),
('Jane_d', 112),
('joseph_39', 111),
('joseph_39', 114),
('joseph_39', 113);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`) VALUES
(111, 'DBMS'),
(114, 'IoT'),
(113, 'SPOS'),
(112, 'ToC');

-- --------------------------------------------------------

--
-- Table structure for table `takes_sub`
--

CREATE TABLE `takes_sub` (
  `fid` varchar(20) NOT NULL,
  `sub_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takes_sub`
--

INSERT INTO `takes_sub` (`fid`, `sub_id`) VALUES
('aradhya_s', 113),
('depti_c', 111),
('depti_c', 113),
('raksha_n', 112),
('shital_w', 114);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `c_name` varchar(20) NOT NULL,
  `fid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`c_name`, `fid`) VALUES
('te-ce-a', 'aradhya_s'),
('te-ce-a', 'depti_c'),
('te-ce-b', 'depti_c'),
('te-ce-b', 'raksha_n'),
('te-ce-b', 'shital_w'),
('te-ce-a', 'raksha_n');

-- --------------------------------------------------------

--
-- Table structure for table `temp_attendance`
--

CREATE TABLE `temp_attendance` (
  `aid` int(11) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `DateOfAtt` date NOT NULL,
  `timeslot` varchar(20) NOT NULL,
  `att` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_attendance`
--

INSERT INTO `temp_attendance` (`aid`, `sid`, `sub_id`, `DateOfAtt`, `timeslot`, `att`) VALUES
(55, 'sanjhari_s', 111, '2023-10-17', '8:30am to 9:30am', 'P'),
(56, 'monik_r', 111, '2023-10-17', '8:30am to 9:30am', 'P'),
(57, 'anushka_s', 111, '2023-10-17', '8:30am to 9:30am', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin1', 'admin123', 'A'),
('anushka_s', 'anushka13', 'S'),
('aradhya_s', 'aradhya123', 'F'),
('depti_c', 'deptii1', 'F'),
('hrutvij_k', 'hrutvij15', 'S'),
('Jane_d', 'JustChillin', 'S'),
('joseph_39', 'dgywy', 'S'),
('monik_r', 'monik11', 'S'),
('raksha_n', 'raksha2', 'F'),
('sanjhari_s', 'sanjhari12', 'S'),
('shital_w', 'shital3', 'F'),
('vedant_c', 'justracist', 'S'),
('vishi_g', 'vishi14', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`c_name`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`fid`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `c_name` (`c_name`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `studies`
--
ALTER TABLE `studies`
  ADD KEY `sid` (`sid`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`),
  ADD KEY `sub_name` (`sub_name`);

--
-- Indexes for table `takes_sub`
--
ALTER TABLE `takes_sub`
  ADD KEY `fid` (`fid`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD KEY `c_name` (`c_name`),
  ADD KEY `fid` (`fid`);

--
-- Indexes for table `temp_attendance`
--
ALTER TABLE `temp_attendance`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `temp_attendance`
--
ALTER TABLE `temp_attendance`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`password`) REFERENCES `users` (`password`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`adid`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`password`) REFERENCES `users` (`password`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`c_name`) REFERENCES `class` (`c_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`password`) REFERENCES `users` (`password`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studies`
--
ALTER TABLE `studies`
  ADD CONSTRAINT `studies_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studies_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `takes_sub`
--
ALTER TABLE `takes_sub`
  ADD CONSTRAINT `takes_sub_ibfk_1` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `takes_sub_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subject` (`sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`c_name`) REFERENCES `class` (`c_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`fid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
