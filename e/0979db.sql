-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2025 at 11:03 AM
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
-- Database: `0979db`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `a_position` varchar(255) NOT NULL,
  `a_prefix` varchar(255) NOT NULL,
  `a_firstname` varchar(255) NOT NULL,
  `a_lastname` varchar(255) NOT NULL,
  `a_birthday` date DEFAULT NULL,
  `a_phone` int(11) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_address` varchar(255) NOT NULL,
  `a_education` varchar(255) NOT NULL,
  `a_major` varchar(255) NOT NULL,
  `a_university` varchar(255) NOT NULL,
  `a_skills` text NOT NULL,
  `a_experience` text NOT NULL,
  `a_salary` int(11) NOT NULL,
  `a_startdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`a_position`, `a_prefix`, `a_firstname`, `a_lastname`, `a_birthday`, `a_phone`, `a_email`, `a_address`, `a_education`, `a_major`, `a_university`, `a_skills`, `a_experience`, `a_salary`, `a_startdate`) VALUES
('นักออกแบบ UX/UI', 'นาย', 'อาทิตย์', 'เจริญไม้เก่า', '2025-08-03', 891111111, 'xxxxxx@xxx.com', '888/99', 'ปริญญาตรี', 'คอมธุรกิจ', 'มหาสารคาม', 'โปรแกรม', '2ปี', 50000, '2025-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(7) NOT NULL,
  `r_name` varchar(255) NOT NULL,
  `r_phone` varchar(255) NOT NULL,
  `r_height` int(11) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_birthday` date DEFAULT NULL,
  `r_color` varchar(7) NOT NULL,
  `r_major` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `r_name`, `r_phone`, `r_height`, `r_address`, `r_birthday`, `r_color`, `r_major`) VALUES
(1, 'ณัฐสิทธิ์ พุฒธรรม', '', 0, '', NULL, '', ''),
(3, 'สมปอน คนหล่อ', '', 0, '', NULL, '', ''),
(4, 'ชาตรี ใจดี', '0891111111', 0, '', NULL, '', ''),
(5, 'อาทิตย์ เจริญไม้เก่า', '0983333333', 178, '127/99 ซอย4 มหาสารคาม', '2000-05-15', '#ff0000', 'คอมพิวเตอร์ธุรกิจ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`a_position`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
