-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 03:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` tinyint(9) NOT NULL,
  `apname` varchar(10) NOT NULL,
  `afname` varchar(50) NOT NULL,
  `alname` varchar(50) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `upass` varchar(25) NOT NULL,
  `cls` varchar(25) NOT NULL,
  `chk` tinyint(1) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `createdate` datetime DEFAULT NULL,
  `updatedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `apname`, `afname`, `alname`, `uname`, `upass`, `cls`, `chk`, `ip`, `createdate`, `updatedate`) VALUES
(1, 'นาย', 'ดูแล', 'ระบบ', 'admin', '123456', 'ผู้ดูแลหลัก', 1, '127.0.0.1', '2022-09-01 05:38:07', '2023-08-09 10:36:51'),
(2, 'นาง', 'ดูแล', 'ไอที', 'admin3', '121212', 'ผู้ดูแลรอง', 0, '127.0.0.1', '2023-08-09 09:15:41', '2023-08-09 03:22:15'),
(3, 'นางสาว', 'ทดสอบ', 'อย่างดี', 'admin2', '222222', 'ผู้ดูแลรอง', 0, '127.0.0.1', '2023-08-09 09:19:30', '2023-08-09 09:39:06'),
(4, 'นาย', 'ทดสอบ', 'อย่างดี', 'admin1', '111111', 'ผู้ดูแลรอง', 0, '127.0.0.1', '2023-08-09 16:44:28', '2023-08-09 09:44:50'),
(5, 'นาย', 'ผดุง', 'นิธิพานิชย์', 'Pdung', '111111', 'ผู้ดูแลรอง', 0, '183.89.81.224', '2023-09-19 17:13:40', '2023-09-24 07:06:50'),
(6, 'นาย', 'ผดุง', 'นิธิพานิชย์', 'ooadd', '111111', 'ผู้ดูแลรอง', 0, '49.228.43.185', '2023-09-20 20:47:56', '2024-02-17 13:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` int(11) NOT NULL,
  `mid` mediumint(9) NOT NULL,
  `calid` smallint(6) NOT NULL,
  `start_time` smallint(6) NOT NULL,
  `end_time` smallint(6) NOT NULL,
  `topic` varchar(300) NOT NULL,
  `bookdate` date NOT NULL,
  `ip` varchar(60) NOT NULL,
  `chk` tinyint(4) NOT NULL,
  `up_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cal`
--

CREATE TABLE `cal` (
  `calid` smallint(6) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `calcode` varchar(20) NOT NULL,
  `calname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(20) NOT NULL,
  `chk` tinyint(4) NOT NULL,
  `daterecord` datetime NOT NULL,
  `dateupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cal`
--

INSERT INTO `cal` (`calid`, `categoryid`, `calcode`, `calname`, `size`, `chk`, `daterecord`, `dateupdate`) VALUES
(1, 1, 'h01', 'ปทุมมาศ', 'กลาง', 0, '2023-09-24 12:31:30', '2023-09-24 05:31:30'),
(2, 1, 'h02', 'ปทุมทิพย์', 'เล็ก', 0, '2023-09-24 12:31:56', '2023-09-24 05:31:56'),
(3, 1, 'h03', 'ปทุมทอง', 'เล็ก', 0, '2023-09-24 12:33:21', '2023-09-24 05:33:21'),
(4, 2, 'i01', 'notebook acer', 'เล็ก', 0, '2023-09-24 12:35:03', '2023-09-24 05:35:03'),
(5, 2, 'i02', 'notebook hp', 'เล็ก', 0, '2023-09-24 12:35:25', '2023-09-24 05:35:25'),
(6, 3, 'c01', 'จักรยานยนต์ yamaha', '2 ล้อ', 0, '2023-09-24 12:36:04', '2023-09-24 05:36:04'),
(7, 3, 'c02', 'เก๋ง honda', '4 ล้อ', 0, '2023-09-24 12:36:36', '2023-09-24 05:36:36'),
(8, 3, 'c03', 'รถตู้ toyota ข 8311', '4 ล้อ', 0, '2023-09-24 12:37:27', '2023-09-24 05:37:27'),
(9, 4, 'm01', 'นายสวาท สีแดง', 'ผอม', 0, '2023-09-24 12:38:10', '2023-09-24 05:38:10'),
(10, 4, 'm02', 'นายเขียว ใจดี', 'สันทัด', 0, '2023-09-24 12:38:48', '2023-09-24 05:38:48'),
(11, 4, 'm03', 'นายแสง สว่าง', 'อ้วน', 0, '2023-09-24 12:40:12', '2023-09-24 05:40:12'),
(12, 5, 'j01', 'นางสมสวย ดีใจ', 'อ้วน', 0, '2023-09-24 12:40:50', '2023-09-24 05:40:50'),
(13, 5, 'j02', 'นางสาวอารี มีมาก', 'เล็ก', 1, '2023-09-24 12:41:20', '2023-09-24 05:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) NOT NULL,
  `categoryck` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `categoryname`, `categoryck`) VALUES
(1, 'ห้องเรียน+ห้องประชุม', 1),
(2, 'อุปกรณ์ไอที', 1),
(3, 'รถยนต์', 1),
(4, 'พนักงานขับรถ', 1),
(5, 'คนงาน+แม่บ้าน', 1);

-- --------------------------------------------------------

--
-- Table structure for table `endtime`
--

CREATE TABLE `endtime` (
  `eid` tinyint(4) NOT NULL,
  `sid` smallint(6) NOT NULL,
  `etime` varchar(5) NOT NULL,
  `numend` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `endtime`
--

INSERT INTO `endtime` (`eid`, `sid`, `etime`, `numend`) VALUES
(1, 8, '09.00', 9),
(2, 8, '10.00', 10),
(3, 8, '11.00', 11),
(4, 8, '12.00', 12),
(5, 8, '13.00', 13),
(6, 8, '14.00', 14),
(7, 8, '15.00', 15),
(8, 8, '16.00', 16),
(9, 8, '17.00', 17),
(10, 8, '18.00', 18),
(11, 9, '10.00', 10),
(12, 9, '11.00', 11),
(13, 9, '12.00', 12),
(14, 9, '13.00', 13),
(15, 9, '14.00', 14),
(16, 9, '15.00', 15),
(17, 9, '16.00', 16),
(18, 9, '17.00', 17),
(19, 9, '18.00', 18),
(20, 10, '11.00', 11),
(21, 10, '12.00', 12),
(22, 10, '13.00', 13),
(23, 10, '14.00', 14),
(24, 10, '15.00', 15),
(25, 10, '16.00', 16),
(26, 10, '17.00', 17),
(27, 10, '18.00', 18),
(28, 11, '12.00', 12),
(29, 11, '13.00', 13),
(30, 11, '14.00', 14),
(31, 11, '15.00', 15),
(32, 11, '16.00', 16),
(33, 11, '17.00', 17),
(34, 11, '18.00', 18),
(35, 12, '13.00', 13),
(36, 12, '14.00', 14),
(37, 12, '15.00', 15),
(38, 12, '16.00', 16),
(39, 12, '17.00', 17),
(40, 12, '18.00', 18),
(41, 13, '14.00', 14),
(42, 13, '15.00', 15),
(43, 13, '16.00', 16),
(44, 13, '17.00', 17),
(45, 13, '18.00', 18),
(46, 14, '15.00', 15),
(47, 14, '16.00', 16),
(48, 14, '17.00', 17),
(49, 14, '18.00', 18),
(50, 15, '16.00', 16),
(51, 15, '17.00', 17),
(52, 15, '18.00', 18),
(53, 16, '17.00', 17),
(54, 16, '18.00', 18),
(55, 17, '18.00', 18);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mid` int(11) NOT NULL,
  `randomid` varchar(60) NOT NULL,
  `pname` varchar(12) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `chk` tinyint(4) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `daterecord` datetime DEFAULT NULL,
  `dateupdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setupdata`
--

CREATE TABLE `setupdata` (
  `sdid` tinyint(4) NOT NULL,
  `office` varchar(300) NOT NULL,
  `title` varchar(300) NOT NULL,
  `img` varchar(50) NOT NULL,
  `admin` varchar(150) NOT NULL,
  `rootmail` varchar(100) NOT NULL,
  `rootpass` varchar(100) NOT NULL,
  `hostmail` varchar(100) NOT NULL,
  `durl` varchar(200) NOT NULL,
  `footer1` varchar(200) NOT NULL,
  `footer2` varchar(300) NOT NULL,
  `num` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setupdata`
--

INSERT INTO `setupdata` (`sdid`, `office`, `title`, `img`, `admin`, `rootmail`, `rootpass`, `hostmail`, `durl`, `footer1`, `footer2`, `num`) VALUES
(1, 'ฝึกฝนดอทคอม', 'ระบบจองภายในหน่วยงาน', '106970971520240218_090029.png', '1JffM67TpQiqt07g7ajZFD9WkklzQNRV4jecVEmzO1r', 'reserve@bcnsp.org', 'pdung', 'mail.bcnsp.org', 'https://www.bcnsp.org/rsvuse/', 'ขอแสดงความนับถือ', 'นายผดุง นิธิพานิชย์ โทร.0825725180 ผู้พัฒนาระบบ', '2');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `sizeid` tinyint(4) NOT NULL,
  `sizename` varchar(50) NOT NULL,
  `sizeck` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`sizeid`, `sizename`, `sizeck`) VALUES
(1, 'กว้าง', 1),
(2, 'ใหญ่', 1),
(3, 'สูง', 1),
(4, 'เล็ก', 1),
(5, 'กลาง', 1),
(6, '2 ล้อ', 1),
(7, '4 ล้อ', 1),
(8, '6 ล้อ', 1),
(9, 'สันทัด', 1),
(10, 'อ้วน', 1),
(11, 'ผอม', 1),
(12, 'เตี้ย', 1);

-- --------------------------------------------------------

--
-- Table structure for table `start`
--

CREATE TABLE `start` (
  `sid` smallint(6) NOT NULL,
  `stime` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `start`
--

INSERT INTO `start` (`sid`, `stime`) VALUES
(8, '08.00'),
(9, '09.00'),
(10, '10.00'),
(11, '11.00'),
(12, '12.00'),
(13, '13.00'),
(14, '14.00'),
(15, '15.00'),
(16, '16.00'),
(17, '17.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `cal`
--
ALTER TABLE `cal`
  ADD PRIMARY KEY (`calid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `endtime`
--
ALTER TABLE `endtime`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `setupdata`
--
ALTER TABLE `setupdata`
  ADD PRIMARY KEY (`sdid`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeid`);

--
-- Indexes for table `start`
--
ALTER TABLE `start`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` tinyint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cal`
--
ALTER TABLE `cal`
  MODIFY `calid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `endtime`
--
ALTER TABLE `endtime`
  MODIFY `eid` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setupdata`
--
ALTER TABLE `setupdata`
  MODIFY `sdid` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `sizeid` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
