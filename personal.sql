-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 09:28 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `online_status` varchar(55) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `username`,`online_status`,`Lastname`,`FirstName`, `MiddleName`, `email`, `contact`,`photo`, `password`) VALUES
(1, 103971822, 'admin','Active Now','Mendoza', 'Hazel', 'Diaz','ann@gmail.com', '8654751259','IMG-6142dd6578fb24.30923100.jpeg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_offpayments`
--

CREATE TABLE `admin_offpayments` (
  `pay_id` int(11) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `ref_num` varchar(55) NOT NULL,
  `Ddate` date DEFAULT current_timestamp(),
  `Ttime` time DEFAULT current_timestamp(),
  `other` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `off_amount` float(10,2) NOT NULL,
  `image_url` text NOT NULL,
  `CollegeDepartment` varchar(150) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_payments`
--

CREATE TABLE `admin_payments` (
  `pay_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `Ddate` date DEFAULT current_timestamp(),
  `Ttime` time DEFAULT current_timestamp(),
  `other` varchar(255) NOT NULL,
  `CollegeDepartment` varchar(150) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `CollegeDepartment` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `CollegeDepartment`, `password`) VALUES
(1, 'College of Business Administration', 'department'),
(2, 'College of Computer Studies', 'department'),
(3, 'College of Accountancy', 'department'),
(4, 'College of Arts and Sciences', 'department'),
(5, 'College of Communication', 'department'),
(6, 'College of Education', 'department'),
(7, 'College of Criminology', 'department'),
(8, 'College of Law', 'department'),
(9, 'College of Medical Technology ', 'department'),
(10, 'College of Midwifery', 'department'),
(11, 'College of Music', 'department'),
(12, 'College of Nursing', 'department');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `pay_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `Ddate` date DEFAULT current_timestamp(),
  `Ttime` time DEFAULT current_timestamp(),
  `reason` varchar(255) NOT NULL,
  `CollegeDepartment` varchar(150) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `file_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `unique_id` int(100) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `SubjectCode` varchar(50) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `LecLab_Units` int(50) NOT NULL,
  `Price` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `stud_id`, `unique_id`, `subj_id`, `SubjectCode`, `SubjectName`, `LecLab_Units`, `Price`, `total`, `status`) VALUES
(1, 1, 203971822, 1, 'CIT322-18', 'Integrative Programming and Technologies', 3, 750, 2250, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `personal`
--

CREATE TABLE `personal` (
  `stud_id` int(7) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `online_status` varchar(55) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(11) NOT NULL,
  `Birthday` date NOT NULL,
  `Religion` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `CollegeDepartment` varchar(50) NOT NULL,
  `Course` varchar(50) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `reason`
--

CREATE TABLE `reason` (
  `r_id` int(11) NOT NULL,
  `reasons` varchar(255) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reason`
--

INSERT INTO `reason` (`r_id`, `reasons`, `amount`) VALUES
(1, 'Payment Upon Enrollment', 100),
(2, 'Payment for Balance', 500),
(3, 'F-137', 500),
(4, 'COG', 500),
(5, 'Certification', 500);

-- --------------------------------------------------------

--
-- Table structure for table `student_offpayments`
--

CREATE TABLE `student_offpayments` (
  `pay_id` int(11) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `ref_num` varchar(55) NOT NULL,
  `Ddate` date DEFAULT current_timestamp(),
  `Ttime` time DEFAULT current_timestamp(),
  `other` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `off_amount` float(10,2) NOT NULL,
  `image_url` text NOT NULL,
  `CollegeDepartment` varchar(150) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `pay_id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `unique_id` int(10) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `Ddate` date DEFAULT current_timestamp(),
  `Ttime` time DEFAULT current_timestamp(),
  `other` varchar(255) NOT NULL,
  `CollegeDepartment` varchar(150) NOT NULL,
  `StudentNumber` varchar(100) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `Status` varchar(100) NOT NULL DEFAULT 'Processing'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subj_id` int(11) NOT NULL,
  `SubjectCode` varchar(50) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `LecLab_Units` int(50) NOT NULL,
  `Price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subj_id`, `SubjectCode`, `SubjectName`, `LecLab_Units`, `Price`) VALUES
(1, 'CIT322-18', 'Integrative Programming and Technologies', 3, 750),
(2, 'CIT324-18', 'Network Management', 3, 750),
(3, 'CIT323-18', ' Information Assurance and Security 2', 3, 750),
(4, 'CIT321-18', ' Capstone Project 1', 3, 750),
(5, 'CIT325-18', 'Multimedia Systems', 3, 750),
(6, 'CITEL4-18', 'IT Elective 4', 3, 750);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_offpayments`
--
ALTER TABLE `admin_offpayments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `admin_payments`
--
ALTER TABLE `admin_payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subj_id` (`subj_id`);

--
-- Indexes for table `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_offpayments`
--
ALTER TABLE `student_offpayments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_offpayments`
--
ALTER TABLE `admin_offpayments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_payments`
--
ALTER TABLE `admin_payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal`
--
ALTER TABLE `personal`
  MODIFY `stud_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_offpayments`
--
ALTER TABLE `student_offpayments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
