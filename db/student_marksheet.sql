-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 03:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_marksheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Ram', 'ramchandrakumawat365@gmail.com', 'admin', '402e679962724aa5f8ba96f57560a049eb6673f3'),
(3, 'Ram Kumawat', 'ramchandrakumawat365@gmail.com', 'ram kumawat', 'e17e5425a021224b63e91499ff8ac491c87567db'),
(4, 'Jarrod Moore', 'muwagubu@mailinator.com', 'qobidili', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(5, 'Vera Mullins', 'dyfu@mailinator.com', 'taqyd', 'ac748cb38ff28d1ea98458b16695739d7e90f22d'),
(6, 'Quin Berry', 'hebenyro@mailinator.com', 'bibysi', '92cf19e7d9c094c1dd5bcf181e3bb78fca6c7d70');

-- --------------------------------------------------------

--
-- Table structure for table `assign_stu_sub`
--

CREATE TABLE `assign_stu_sub` (
  `id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `class_id` varchar(100) NOT NULL,
  `subject_id` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_stu_sub`
--

INSERT INTO `assign_stu_sub` (`id`, `student_id`, `class_id`, `subject_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1', '1', '1', '2013-10-22 07:42:14', '2014-10-22 01:52:44', NULL),
(3, '1', '1', '2', '2014-10-22 01:52:51', '2014-10-22 01:52:51', NULL),
(4, '1', '1', '3', '2014-10-22 01:53:01', '2014-10-22 01:53:01', NULL),
(5, '1', '1', '5', '2014-10-22 01:53:11', '2014-10-22 01:53:11', NULL),
(6, '6', '2', '1', '2014-10-22 02:54:49', '2014-10-22 02:54:49', NULL),
(7, '6', '2', '2', '2014-10-22 02:55:04', '2014-10-22 02:55:04', NULL),
(8, '6', '2', '3', '2014-10-22 02:55:12', '2014-10-22 02:55:12', NULL),
(9, '6', '2', '4', '2014-10-22 02:55:20', '2014-10-22 02:55:20', NULL),
(10, '3', '3', '5', '2014-10-22 02:55:30', '2014-10-22 02:55:30', NULL),
(11, '5', '4', '1', '2014-10-22 02:55:38', '2014-10-22 02:55:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_sub_mark`
--

CREATE TABLE `assign_sub_mark` (
  `id` int(11) NOT NULL,
  `class_id` varchar(50) NOT NULL,
  `subject_id` varchar(200) NOT NULL,
  `max_marks` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assign_sub_mark`
--

INSERT INTO `assign_sub_mark` (`id`, `class_id`, `subject_id`, `max_marks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '1', '1,2,3,4,5', '100,100,100,100,100,', '2012-10-22 07:49:17', '2014-10-22 01:52:28', NULL),
(3, '2', '1,2,3,4,5', '100,100,100,100,100,', '2012-10-22 07:51:52', '2014-10-22 02:53:19', NULL),
(12, '3', '1,2,3', '100,100,100,', '2013-10-22 04:41:12', '2018-11-22 08:06:51', NULL),
(13, '4', '1,2,3,4,5', '100,100,100,100,100,', '2014-10-22 02:54:15', '2014-10-22 02:54:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `cname`, `deleted_at`) VALUES
(1, 'First', NULL),
(2, 'Second', NULL),
(3, 'Third', NULL),
(4, 'Fourth', NULL),
(5, 'Fifth', NULL),
(6, 'Sixth', NULL),
(7, 'Seventh', NULL),
(8, 'Eighth', NULL),
(9, 'Ninth', NULL),
(10, 'Tenth', NULL),
(11, 'Bca', NULL),
(12, 'Mca', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `marks` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`id`, `student_id`, `subject_id`, `class_id`, `marks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, 59, '2022-10-14 01:53:40', '2022-10-14 04:27:11', NULL),
(2, 4, 1, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(3, 7, 1, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(4, 1, 2, 1, 65, '2022-10-14 01:53:40', '2022-10-14 04:27:11', NULL),
(5, 4, 2, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(6, 7, 2, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(7, 1, 3, 1, 84, '2022-10-14 01:53:40', '2022-10-14 04:27:11', NULL),
(8, 4, 3, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(9, 7, 3, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(10, 1, 4, 1, 85, '2022-10-14 01:53:40', '2022-10-14 04:27:11', NULL),
(11, 4, 4, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(12, 7, 4, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(13, 1, 5, 1, 54, '2022-10-14 01:53:40', '2022-10-14 04:27:11', NULL),
(14, 4, 5, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(15, 7, 5, 1, 0, '2022-10-14 01:53:40', '2022-10-14 01:55:25', NULL),
(16, 6, 1, 2, 100, '2022-10-14 02:56:42', '2022-10-21 12:21:56', NULL),
(17, 6, 2, 2, 100, '2022-10-14 02:56:42', '2022-10-21 12:21:56', NULL),
(18, 6, 3, 2, 100, '2022-10-14 02:56:42', '2022-10-21 12:21:56', NULL),
(19, 6, 4, 2, 100, '2022-10-14 02:56:42', '2022-10-21 12:21:56', NULL),
(20, 6, 5, 2, 100, '2022-10-14 02:56:42', '2022-10-21 12:21:56', NULL),
(21, 3, 1, 3, 80, '2022-10-14 02:57:07', '2022-10-14 02:57:07', NULL),
(22, 3, 2, 3, 60, '2022-10-14 02:57:07', '2022-10-14 02:57:07', NULL),
(23, 3, 3, 3, 78, '2022-10-14 02:57:07', '2022-10-14 02:57:07', NULL),
(24, 3, 4, 3, 56, '2022-10-14 02:57:07', '2022-10-14 02:57:07', NULL),
(25, 3, 5, 3, 63, '2022-10-14 02:57:07', '2022-10-14 02:57:07', NULL),
(26, 5, 1, 4, 46, '2022-10-14 03:06:54', '2022-10-14 03:06:54', NULL),
(27, 5, 2, 4, 36, '2022-10-14 03:06:54', '2022-10-14 03:06:54', NULL),
(28, 5, 3, 4, 26, '2022-10-14 03:06:54', '2022-10-14 03:06:54', NULL),
(29, 5, 4, 4, 45, '2022-10-14 03:06:54', '2022-10-14 03:06:54', NULL),
(30, 5, 5, 4, 36, '2022-10-14 03:06:54', '2022-10-14 03:06:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_class` int(250) NOT NULL,
  `stu_rollno` varchar(50) NOT NULL,
  `stu_dob` varchar(250) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stu_id`, `stu_name`, `stu_class`, `stu_rollno`, `stu_dob`, `deleted_at`) VALUES
(1, 'Ulla Holden', 1, '21', '1970-01-01', NULL),
(3, 'Ezra Cooke', 3, '101', '1970-01-01', NULL),
(5, 'Astra Whitley', 4, '4644', '2006-06-26', NULL),
(6, 'Nicholas Spencer', 2, '7068', '2022-01-24', NULL),
(10, 'Arthur Fitzgerald', 7, '520', '2002-02-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `sub_id` int(11) NOT NULL,
  `sub_code` int(4) NOT NULL,
  `sub_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`sub_id`, `sub_code`, `sub_name`) VALUES
(1, 2873, 'Hindi'),
(2, 2875, 'Math'),
(3, 2870, 'Science'),
(4, 2876, 'English'),
(5, 2878, 'Sanskrit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_stu_sub`
--
ALTER TABLE `assign_stu_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_sub_mark`
--
ALTER TABLE `assign_sub_mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assign_stu_sub`
--
ALTER TABLE `assign_stu_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `assign_sub_mark`
--
ALTER TABLE `assign_sub_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
