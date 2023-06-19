-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 06:53 PM
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
-- Database: `art_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ANAME` varchar(31) NOT NULL,
  `BIRTH_PLACE` varchar(31) DEFAULT NULL,
  `STYLE_OF_ART` varchar(31) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`ANAME`, `BIRTH_PLACE`, `STYLE_OF_ART`, `AGE`) VALUES
('Debjyoti', 'Garia', 'Lithograph', 22),
('Raihan', 'Baruipur', 'Painting', 23),
('Shounak', 'Dumdum', 'Painting', 23),
('Suman', 'Baruipur', 'Sculpture', 23),
('Swarup', 'Sonarpur', 'Photograph', 23);

-- --------------------------------------------------------

--
-- Table structure for table `art_group`
--

CREATE TABLE `art_group` (
  `GROUP_NAME` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_group`
--

INSERT INTO `art_group` (`GROUP_NAME`) VALUES
('Landscape'),
('Portrait'),
('Sketch'),
('Stilllife');

-- --------------------------------------------------------

--
-- Table structure for table `art_work`
--

CREATE TABLE `art_work` (
  `TITLE` varchar(31) NOT NULL,
  `YEAR` int(11) DEFAULT NULL,
  `PRICE` float DEFAULT NULL,
  `TYPE` varchar(31) DEFAULT NULL,
  `ANAME` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `art_work`
--

INSERT INTO `art_work` (`TITLE`, `YEAR`, `PRICE`, `TYPE`, `ANAME`) VALUES
('De1', 2015, 2300, 'Lithograph', 'Debjyoti'),
('De2', 2016, 5500, 'Lithograph', 'Debjyoti'),
('De3', 2018, 1658, 'Lithograph', 'Debjyoti'),
('R2', 2022, 1565, 'Painting', 'Raihan'),
('R3', 2021, 1500, 'Painting', 'Raihan'),
('Ra1', 2022, 2500, 'Painting', 'Raihan'),
('S2', 2019, 4500, 'Photograph', 'Swarup'),
('S3', 2017, 2056, 'Sculpture', 'Suman'),
('Sh1', 2021, 2500, 'Painting', 'Shounak'),
('Su1', 2015, 2300, 'Sculpture', 'Suman'),
('Su2', 2017, 5465, 'Sculpture', 'Suman'),
('Sw1', 2020, 2300, 'Photograph', 'Swarup'),
('Sw3', 2022, 2065, 'Photograph', 'Swarup');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `tan_id` int(11) NOT NULL,
  `TITLE` varchar(31) DEFAULT NULL,
  `CNAME` varchar(31) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `REMARK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`tan_id`, `TITLE`, `CNAME`, `DATE`, `REMARK`) VALUES
(1, 'De1', 'Pritam', '2022-01-06', 'Paid'),
(2, 'De2', 'Pritam', '2022-03-08', 'Paid'),
(3, 'De3', 'Tom', '2022-07-07', 'Paid'),
(4, 'R2', 'Shyam', '2022-07-06', 'Paid'),
(5, 'R3', 'Shyam', '2022-09-06', 'Paid'),
(6, 'Ra1', 'Pritam', '2022-12-16', 'Paid'),
(7, 'S2', 'Tom', '2021-12-06', 'Paid'),
(8, 'S3', 'Pritam', '2021-02-16', 'Paid'),
(9, 'Sh1', 'Shyam', '2021-06-08', 'Paid'),
(10, 'Su1', 'Tom', '2021-10-06', 'Paid'),
(11, 'Su2', 'Pritam', '2021-08-06', 'Paid'),
(12, 'Sw1', 'Tom', '2020-06-06', 'Paid'),
(13, 'Sw3', 'Tom', '2020-07-06', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CNAME` varchar(31) NOT NULL,
  `TOTAL_AMOUNT_SPENT` float DEFAULT 0,
  `ADDRESS` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CNAME`, `TOTAL_AMOUNT_SPENT`, `ADDRESS`) VALUES
('Pritam', 18821, 'Kalyanpur'),
('Samuel', 0, 'York'),
('Shyam', 6065, 'Bagbazar'),
('Tom', 22823, 'Saltlake');

-- --------------------------------------------------------

--
-- Table structure for table `like_artist`
--

CREATE TABLE `like_artist` (
  `ANAME` varchar(31) DEFAULT NULL,
  `CNAME` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `like_group`
--

CREATE TABLE `like_group` (
  `CNAME` varchar(31) DEFAULT NULL,
  `GROUP_NAME` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `of_group`
--

CREATE TABLE `of_group` (
  `TITLE` varchar(31) DEFAULT NULL,
  `GROUP_NAME` varchar(31) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `of_group`
--

INSERT INTO `of_group` (`TITLE`, `GROUP_NAME`) VALUES
('Ra1', 'Portrait'),
('De1', 'Stilllife'),
('Su1', 'Landscape'),
('Sw1', 'Sketch'),
('R3', 'Landscape'),
('R2', 'Stilllife'),
('De2', 'Portrait'),
('De3', 'Landscape'),
('Su2', 'Landscape'),
('S3', 'Stilllife'),
('S2', 'Portrait'),
('Sw3', 'Stilllife');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ANAME`);

--
-- Indexes for table `art_group`
--
ALTER TABLE `art_group`
  ADD PRIMARY KEY (`GROUP_NAME`);

--
-- Indexes for table `art_work`
--
ALTER TABLE `art_work`
  ADD PRIMARY KEY (`TITLE`),
  ADD KEY `ANAME` (`ANAME`);

--
-- Indexes for table `buy`
--
ALTER TABLE `buy`
  ADD PRIMARY KEY (`tan_id`),
  ADD KEY `TITLE` (`TITLE`),
  ADD KEY `CNAME` (`CNAME`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CNAME`);

--
-- Indexes for table `like_artist`
--
ALTER TABLE `like_artist`
  ADD KEY `ANAME` (`ANAME`),
  ADD KEY `CNAME` (`CNAME`);

--
-- Indexes for table `like_group`
--
ALTER TABLE `like_group`
  ADD KEY `CNAME` (`CNAME`),
  ADD KEY `GROUP_NAME` (`GROUP_NAME`);

--
-- Indexes for table `of_group`
--
ALTER TABLE `of_group`
  ADD KEY `TITLE` (`TITLE`),
  ADD KEY `GROUP_NAME` (`GROUP_NAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy`
--
ALTER TABLE `buy`
  MODIFY `tan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `art_work`
--
ALTER TABLE `art_work`
  ADD CONSTRAINT `ART_WORK_ibfk_1` FOREIGN KEY (`ANAME`) REFERENCES `artist` (`ANAME`);

--
-- Constraints for table `buy`
--
ALTER TABLE `buy`
  ADD CONSTRAINT `BUY_ibfk_1` FOREIGN KEY (`TITLE`) REFERENCES `art_work` (`TITLE`),
  ADD CONSTRAINT `BUY_ibfk_2` FOREIGN KEY (`CNAME`) REFERENCES `customer` (`CNAME`);

--
-- Constraints for table `like_artist`
--
ALTER TABLE `like_artist`
  ADD CONSTRAINT `LIKE_ARTIST_ibfk_1` FOREIGN KEY (`ANAME`) REFERENCES `artist` (`ANAME`),
  ADD CONSTRAINT `LIKE_ARTIST_ibfk_2` FOREIGN KEY (`CNAME`) REFERENCES `customer` (`CNAME`);

--
-- Constraints for table `like_group`
--
ALTER TABLE `like_group`
  ADD CONSTRAINT `LIKE_GROUP_ibfk_1` FOREIGN KEY (`CNAME`) REFERENCES `customer` (`CNAME`),
  ADD CONSTRAINT `LIKE_GROUP_ibfk_2` FOREIGN KEY (`GROUP_NAME`) REFERENCES `art_group` (`GROUP_NAME`);

--
-- Constraints for table `of_group`
--
ALTER TABLE `of_group`
  ADD CONSTRAINT `OF_GROUP_ibfk_1` FOREIGN KEY (`TITLE`) REFERENCES `art_work` (`TITLE`),
  ADD CONSTRAINT `OF_GROUP_ibfk_2` FOREIGN KEY (`GROUP_NAME`) REFERENCES `art_group` (`GROUP_NAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
