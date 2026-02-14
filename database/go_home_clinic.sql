-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 15, 2026 at 12:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `go_home_clinic`
--
CREATE DATABASE IF NOT EXISTS `go_home_clinic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `go_home_clinic`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `a_email` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `f_name`, `l_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `app_location` varchar(500) NOT NULL,
  `app_time` varchar(100) NOT NULL,
  `cost` double NOT NULL,
  `card_number` bigint(20) DEFAULT NULL,
  `name_in_card` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `p_id` int(10) DEFAULT NULL,
  `dr_id` int(10) DEFAULT NULL,
  `app_state` enum('Active','Complete','Canceled') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `date`, `app_location`, `app_time`, `cost`, `card_number`, `name_in_card`, `created_date`, `p_id`, `dr_id`, `app_state`) VALUES
(4, '2023-10-25', 'Al Hofuf', '04:30 PM - 05:30 PM', 110, 978676756565, 'jnhjhyugytgt', '2023-10-23 05:35:23', 37, 2, 'Complete'),
(5, '2023-10-25', 'Al Hofuf', '03:00 PM - 04:00 PM', 110, 3232332323, 'dsdsdsdsdsd', '2023-10-11 09:19:44', 32, 2, 'Complete'),
(6, '2023-10-27', 'Al Mubarraz', '10:30 AM - 11:00 AM', 110, 222222222222222222, 'ththththttyhtthhthth', '2023-10-25 03:28:02', 38, 2, 'Canceled'),
(7, '2023-11-07', 'Al Hofuf', '12:00 PM - 01:00 PM', 110, 1111111111111111111, 'ththththttyhtthhthth', '2023-11-05 04:04:25', 36, 1, 'Canceled'),
(8, '2023-11-08', 'Al Mubarraz', '10:30 AM - 11:00 AM', 110, 222222222222222222, 'frfefefe', '2023-11-05 04:05:25', 36, 1, 'Active'),
(9, '2023-11-10', 'Al Mubarraz', '01:30 PM - 02:30 PM', 110, 3333333333333, 'jnhjhyugytgt', '2023-11-05 04:06:01', 36, 2, 'Complete'),
(10, '2023-11-10', 'Al Mubarraz', '03:00 PM - 04:00 PM', 110, 154145151, 'dhssteh kwejrnjng nf gdd', '2023-11-05 04:07:25', 36, 2, 'Complete'),
(11, '2023-11-09', 'Al Hofuf', '12:00 PM - 01:00 PM', 110, 0, 'dsafs', '2023-11-05 21:54:52', 36, 2, 'Complete'),
(12, '2023-11-09', 'Al Mubarraz', '10:30 AM - 11:00 AM', 110, 55848858541, 'FSFSDF', '2023-11-05 23:25:25', 36, 2, 'Canceled'),
(13, '2023-11-23', 'Al Mubarraz', '12:00 PM - 01:00 PM', 110, 0, 'dhssteh kwejrnjng nf gdd', '2023-11-20 22:50:42', 36, 1, 'Canceled'),
(14, '2023-11-24', 'Al Hofuf', '03:00 PM - 04:00 PM', 110, 0, 'dasd', '2023-11-21 00:33:01', 36, 1, 'Complete'),
(15, '2023-11-25', 'Al Mubarraz', '12:00 PM - 01:00 PM', 110, 0, 'dsaddqwre', '2023-11-21 00:33:21', 36, 4, 'Complete'),
(16, '2024-05-24', 'Al Mubarraz', '01:30 PM - 02:30 PM', 110, 215561223225, 'dasd', '2024-05-22 00:46:08', 39, 2, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dr_id` int(10) NOT NULL,
  `f_name` char(100) DEFAULT NULL,
  `l_name` char(100) DEFAULT NULL,
  `dr_email` varchar(100) NOT NULL,
  `dr_password` varchar(100) NOT NULL,
  `IsAvailable` tinyint(1) NOT NULL DEFAULT 1,
  `job` varchar(100) DEFAULT NULL,
  `job_details` text DEFAULT NULL,
  `dr_location` varchar(100) NOT NULL,
  `dr_phoneNo` bigint(10) NOT NULL,
  `v_id` int(10) DEFAULT NULL,
  `a_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`dr_id`, `f_name`, `l_name`, `dr_email`, `dr_password`, `IsAvailable`, `job`, `job_details`, `dr_location`, `dr_phoneNo`, `v_id`, `a_id`) VALUES
(1, 'Dr.Ali', 'Mohammed', 'Ali123@gmail.com', '5e1789c7eb33bfc807ee194f25c32882', 1, 'General Pysician', 'A general practitioner treats a commoon medical phd conditions and perform routine exams, got an ABIM, AOBFP, and ACP.', 'Al Mubarraz', 364987561, 1, 1),
(2, 'Dr.Sara', 'Ali', 'SaraAli@gmail.com', '11', 1, 'General Pysician', 'A general practitioner treats a commoon medical phd conditions and perform routine exams, got an ABIM, AOBFP, and ACP.', 'fdsasdas', 85755255, 2, 1),
(3, 'Dr.Khalid', 'Salah', 'wqw7das84@gmail.com', '8ee1e30a502f929dcef1a27b1d65e401', 0, 'asddas', 'adasdas', 'sdasdas', 211111111, 2, 1),
(4, 'Dr.Asma', 'Ahmed', 'wqw78554@gmail.com', '82b711e417890e07bf2a5bdda262d52a', 1, 'erte', 'A general practitioner treats a commoon medical phd conditions and perform routine exams, got an ABIM, AOBFP, and ACP.', '345345', 3453, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `med_id` int(10) NOT NULL,
  `app_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `dr_id` int(10) NOT NULL,
  `med_rec_details` text NOT NULL,
  `treat_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `medical_record`
--

INSERT INTO `medical_record` (`med_id`, `app_id`, `p_id`, `dr_id`, `med_rec_details`, `treat_date`) VALUES
(1, 4, 37, 2, 'errtertrte ttret\r\ntetete\r\nkuilkjj\r\njljkljkss', '2023-10-27 00:31:25'),
(3, 5, 32, 2, 'jhhj', '2023-10-29 22:58:12'),
(4, 9, 36, 2, 'fdfdfdfdsd', '2023-11-05 20:05:18'),
(5, 10, 36, 2, 'vfdfdfdfdf', '2023-11-05 23:27:36'),
(6, 14, 36, 1, 'jgvgvgucvijkgv', '2023-11-21 00:35:25'),
(7, 15, 36, 4, 'fzhxcbzcxv', '2023-11-21 00:36:03'),
(8, 11, 36, 2, 'sdfrwgaw', '2023-11-21 03:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(10) NOT NULL,
  `f_name` char(100) DEFAULT NULL,
  `l_name` char(100) DEFAULT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_date` date DEFAULT NULL,
  `p_password` varchar(100) NOT NULL,
  `p_phoneNo` bigint(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `f_name`, `l_name`, `p_email`, `p_date`, `p_password`, `p_phoneNo`) VALUES
(10, 'kadi', 'abdullah', 'akade.741@gmail.com', '0000-00-00', '$2y$10$TWvYK7zh', 0),
(12, 'ali', 'mohammad', 'akww@gmail.com', '0000-00-00', '$2y$10$dCJjpy5R', 0),
(16, 'ali', 'mohammad', 'akwww@gmail.com', '0000-00-00', '$2y$10$9uBLBaXu', 0),
(21, 'mumu', 'lsmsss', 'lak@gmail.com', '0000-00-00', '0123', 532949141),
(22, 'mumu', 'lsmsss', 'lak2@gmail.com', '0000-00-00', '$2y$10$jS56jEsN', 532949141),
(23, 'uuu', 'wwwww', 'kha@gmail.com', '0000-00-00', '$2y$10$Pt8jIoKt', 532949141),
(32, 'dddd333', 'ffddd', 'Ali1234@gmail.com', '2023-09-19', 'AA123a', 3),
(34, 'sadasd', 'asdad', 'Ali123@gmail.com', '2023-10-05', 'AA1212a', 3432),
(36, 'qrerqr', 'rqerqerqe', 'wqw784@gmail.com', '2010-10-12', '8ee1e30a502f929dcef1a27b1d65e401', 575785875),
(37, 'jhjhu', 'jihjjklkl', 'lak5874@gmail.com', '2023-10-11', '8b95433b3549985e9a08456a60eb3b0c', 6546565),
(38, 'jhjhkj', 'ghgjhg', 'wqw789564@gmail.com', '2023-10-12', '8b95433b3549985e9a08456a60eb3b0c', 65455),
(39, 'fgff', 'ffrrd', 'wqwderr@gmail.com', '2023-09-06', 'Aaa123', 241564542);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(10) NOT NULL,
  `num_stars` int(11) NOT NULL,
  `p_id` int(10) DEFAULT NULL,
  `dr_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `num_stars`, `p_id`, `dr_id`) VALUES
(1, 5, 36, 2),
(2, 5, 36, 2),
(3, 2, 36, 2),
(4, 5, 36, 2),
(5, 3, 36, 4),
(6, 2, 36, 1),
(7, 5, 36, 1),
(8, 5, 36, 4),
(9, 2, 36, 4),
(10, 5, 36, 2),
(11, 5, 37, 2),
(12, 1, 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `v_id` int(10) NOT NULL,
  `v_name` varchar(100) NOT NULL,
  `car_plate` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`v_id`, `v_name`, `car_plate`, `location`) VALUES
(1, 'sejehrn', 's65wer5', 'jaddah'),
(2, 'rwersdfs', 'adas858', 'makkah'),
(3, 'rtgr4554', 'trtreee5', 'sdwee'),
(4, 'errj', '5t3d', 'refer'),
(5, 'gfdg', 'g55', 'dfgfgd'),
(6, 'gfdg', 'dfgg', 'dfgfgd66');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `dr_id` (`dr_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`dr_id`),
  ADD UNIQUE KEY `dr_email` (`dr_email`),
  ADD KEY `v_id` (`v_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`med_id`),
  ADD UNIQUE KEY `app_id_2` (`app_id`),
  ADD KEY `app_id` (`app_id`),
  ADD KEY `dr_id` (`dr_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `dr_id` (`dr_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `dr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `med_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `v_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`a_id`),
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`v_id`) REFERENCES `vehicle` (`v_id`);

--
-- Constraints for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD CONSTRAINT `medical_record_ibfk_1` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_record_ibfk_2` FOREIGN KEY (`app_id`) REFERENCES `appointment` (`app_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `medical_record_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`dr_id`) REFERENCES `doctor` (`dr_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
