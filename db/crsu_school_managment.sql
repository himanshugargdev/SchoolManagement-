-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 05:56 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_psw`, `role`, `status`, `isdeleted`, `insert_by`, `update_by`, `insert_at`, `update_at`, `isVerified`) VALUES
(1, 'AJAY PANCHAL', 'developer@gmail.com', '8570091377', 'developer@gmail.com', 'admin', 'active', 'NO', NULL, NULL, '2022-12-17 19:59:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_time` varchar(11) NOT NULL,
  `date` date DEFAULT NULL,
  `attendance` varchar(40) NOT NULL,
  `insert_by` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `insert_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `class_id`, `subject_id`, `teacher_id`, `class_time`, `date`, `attendance`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(15, 1001, 3, 3, 1, '22:42', '2023-01-25', 'Present', 1, 0, '2023-01-25 18:03:47', '2023-01-25 18:03:47'),
(16, 1001, 3, 3, 1, '22:42', '2023-01-25', 'Present', 1, 0, '2023-01-25 18:05:27', '2023-01-25 18:05:27'),
(17, 1001, 3, 3, 1, '23:40', '2023-01-25', 'Present', 1, 0, '2023-01-25 18:15:38', '2023-01-25 18:15:38'),
(18, 1002, 3, 3, 1, '23:40', '2023-01-25', 'Absent', 1, 0, '2023-01-25 18:19:31', '2023-01-25 18:19:31'),
(19, 1002, 3, 3, 1, '23:40', '2023-01-25', 'leave', 1, 0, '2023-01-25 18:19:37', '2023-01-25 18:19:37'),
(20, 1001, 3, 3, 1, '00:04', '2023-01-26', 'Absent', 1, 1, '2023-01-25 18:34:17', '2023-01-26 16:53:02'),
(21, 1002, 3, 3, 1, '00:04', '2023-01-26', 'leave', 1, 1, '2023-01-25 18:38:01', '2023-01-26 16:53:14'),
(22, 1001, 3, 3, 1, '21:46', '2023-01-25', 'Parsent', 1, 0, '2023-01-26 06:00:27', '2023-01-26 06:00:27'),
(23, 1001, 3, 3, 1, '11:30', '2023-01-26', 'Present', 1, 1, '2023-01-26 06:16:31', '2023-01-26 06:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `incharge_id` int(11) DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  `update_by` timestamp NULL DEFAULT current_timestamp(),
  `insert_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `incharge_id`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(3, 'MCA', 1, 1, '2023-01-24 17:42:33', '2023-01-24 17:42:33', NULL),
(4, 'MBA', 3, 1, '2023-01-24 17:44:20', '2023-01-24 17:44:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'Test',
  `title` varchar(200) DEFAULT NULL,
  `obtained_marks` int(11) DEFAULT NULL,
  `total_marks` int(11) DEFAULT NULL,
  `result` varchar(155) DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `insert_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `subject_id`, `class_id`, `student_id`, `type`, `title`, `obtained_marks`, `total_marks`, `result`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(1, 3, 3, 1001, 'Pre-Exam', 'sdf', 33, 333, 'Re-apper', 1, 1, '2023-01-26 11:27:43', '2023-01-26 16:42:25'),
(2, 3, 3, 1001, 'Pre-Exam', 'sdf', 200, 333, 'Qualified', 1, 1, '2023-01-26 12:09:12', '2023-01-26 16:41:55'),
(3, 3, 3, 1001, 'UNIT TEST', 'JAVA 1ST UNIT TEST', 20, 30, 'Qualified', 1, NULL, '2023-01-26 12:14:05', '2023-01-26 12:14:05'),
(4, 3, 3, 1001, '33', 'sdf', 333, 33, 'Qualified', 1, 1, '2023-01-26 12:22:02', '2023-01-26 12:25:28'),
(5, 3, 3, 1002, 'ddd', 'sddf', 333, 33, 'Re-apper', 1, NULL, '2023-01-26 12:58:02', '2023-01-26 12:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(80) DEFAULT NULL,
  `staff_email` varchar(100) DEFAULT NULL,
  `staff_phone` int(13) DEFAULT NULL,
  `staff_psw` varchar(255) DEFAULT NULL,
  `staff_role` varchar(200) DEFAULT NULL,
  `specialization` varchar(200) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'in-active',
  `insert_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `insert_at` int(11) DEFAULT NULL,
  `update_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_email`, `staff_phone`, `staff_psw`, `staff_role`, `specialization`, `subject`, `status`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(1, 'Parmod', 'parmod@gmail.com', 1234567890, '123456', 'Professor', 'Java and Database', NULL, 'active', 1, 1, NULL, 2023),
(2, 'Swati', 'swati@gmail.com', 123456789, '123456', 'Professor', 'Networking and IT Technology', NULL, 'active', 1, NULL, NULL, NULL),
(3, 'Sunny', 'sunny@gmail.com', 1234567890, '123456', 'Teacher', 'Hostal Management', NULL, 'active', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_roll_no` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_phone` varchar(13) DEFAULT NULL,
  `student_psw` varchar(255) DEFAULT NULL,
  `insert_by` int(11) NOT NULL,
  `insert_at` int(11) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_at` int(11) NOT NULL,
  `status` enum('active','in-active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_roll_no`, `class_id`, `student_name`, `student_email`, `student_phone`, `student_psw`, `insert_by`, `insert_at`, `update_by`, `update_at`, `status`) VALUES
(1001, 20221703, 3, 'kapil', 'kapil@gmail.com', '1234567890', '123456', 1, 0, 1, 2023, 'active'),
(1002, 20221729, 3, 'himanshu', 'himanshu@gmail.com', '1234567891', '123456', 1, 0, 0, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(500) DEFAULT NULL,
  `subject_title` mediumtext DEFAULT NULL,
  `discription` longtext DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `insert_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `subject_title`, `discription`, `class_id`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(2, 'Hostal Managment', 'Hostal Managment ', 'Hostel management system is designed to manage all hostel activities like hostel admissions, fees, room, mess allotment, hostel stores & generates related reports for smooth transactions. It is also used to manage monthly mess bill calculation, hostel staff payroll, student certificates, etc.', 4, 1, NULL, '2023-01-24 18:00:06', '2023-01-24 18:00:06'),
(3, 'Java', 'Java is a programming language and a platform. Java is a high level, robust, object-oriented and secure programming language.', 'Java was developed by Sun Microsystems (which is now the subsidiary of Oracle) in the year 1995. James Gosling is known as the father of Java. Before Java, its name was Oak. Since Oak was already a registered company, so James Gosling and his team changed the name from Oak to Java.\r\n\r\nPlatform: Any hardware or software environment in which a program runs, is known as a platform. Since Java has a runtime environment (JRE) and API, it is called a platform.', 3, 1, NULL, '2023-01-24 18:34:13', '2023-01-24 18:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `topic_title` mediumtext DEFAULT NULL,
  `topic_content` longtext DEFAULT NULL,
  `insert_by` int(11) DEFAULT NULL,
  `update_by` int(11) DEFAULT NULL,
  `insert_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `class_id`, `subject_id`, `topic_title`, `topic_content`, `insert_by`, `update_by`, `insert_at`, `update_at`) VALUES
(3, 3, 3, 'What is Java?', '<h2 class=\"h2\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(97, 11, 56);font-family:erdana, helvetica, arial, sans-serif;font-size:25px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.3em;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\" id=\"what-is-java\">What is Java?</h2><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Java is a <strong style=\"font-family:inter-bold, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">programming language</strong> and a <strong style=\"font-family:inter-bold, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">platform</strong>. Java is a high level, robust, object-oriented and secure programming language.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Java was developed by <i>Sun Microsystems</i> (which is now the subsidiary of Oracle) in the year 1995. <i>James Gosling</i> is known as the father of Java. Before Java, its name was <i>Oak</i>. Since Oak was already a registered company, so James Gosling and his team changed the name from Oak to Java.</p><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"font-family:inter-bold, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">Platform</strong>: Any hardware or software environment in which a program runs, is known as a platform. Since Java has a runtime environment (JRE) and API, it is called a platform.</p><h2 class=\"h2\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(97, 11, 56);font-family:erdana, helvetica, arial, sans-serif;font-size:25px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;line-height:1.3em;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\" id=\"wjiu\">Application</h2><p style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">According to Sun, 3 billion devices run Java. There are many devices where Java is currently used. Some of them are as follows:</p><ol><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Desktop Applications such as acrobat reader, media player, antivirus, etc.</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Web Applications such as irctc.co.in, javatpoint.com, etc.</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Enterprise Applications such as banking applications.</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Mobile</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Embedded System</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Smart Card</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Robotics</li><li class=\"points\" style=\"-webkit-text-stroke-width:0px;background-color:rgb(255, 255, 255);color:rgb(51, 51, 51);font-family:inter-regular, system-ui, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:400;letter-spacing:normal;orphans:2;text-align:justify;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Games, etc.</li></ol>', NULL, NULL, '2023-01-24 18:39:04', '2023-01-24 18:39:04');

-- --------------------------------------------------------

--
-- Table structure for table `work`
--

CREATE TABLE `work` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `due_date` varchar(50) DEFAULT 'Not mention.',
  `title` text DEFAULT 'Not mention.',
  `description` text DEFAULT 'Not mention.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`,`admin_phone`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_email` (`staff_email`,`staff_phone`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_email` (`student_email`,`student_phone`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `work`
--
ALTER TABLE `work`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
