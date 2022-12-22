-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2022 at 09:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crsu_school_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `admin_email` varchar(128) DEFAULT NULL,
  `admin_phone` varchar(13) DEFAULT '0',
  `admin_psw` varchar(255) DEFAULT NULL,
  `role` enum('admin','sub-admin','anonmous') DEFAULT 'anonmous',
  `status` enum('active','in-active','de-active','blocked') NOT NULL DEFAULT 'de-active',
  `isdeleted` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `insert_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `insert_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  `isVerified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_psw`, `role`, `status`, `isdeleted`, `insert_by`, `update_by`, `insert_at`, `update_at`, `isVerified`) VALUES
(1, 'AJAY PANCHAL', 'developer@gmail.com', '8570091377', 'developer@gmail.com', 'admin', 'active', 'NO', NULL, NULL, '2022-12-17 19:59:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_name` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_phone` varchar(13) DEFAULT NULL,
  `student_psw` varchar(255) DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_at` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `status` enum('active','in-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
