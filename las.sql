-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 10:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `las`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinment`
--

CREATE TABLE `appoinment` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `Title` varchar(55) NOT NULL,
  `case_discription` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoinment`
--

INSERT INTO `appoinment` (`id`, `cid`, `lid`, `date`, `time`, `Title`, `case_discription`, `created_at`, `status`) VALUES
(1, 1, 1, '2024-01-06', '15:19:00', 'divorse', 'faftwgs', '2024-01-01 15:18:11', 'Pending'),
(13, 1, 3, '2024-01-16', '05:54:00', 'Robory', 'dszvcv Adv a ve', '2024-01-04 02:54:35', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `clint`
--

CREATE TABLE `clint` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_count` int(11) DEFAULT 0,
  `Status` varchar(10) NOT NULL DEFAULT 'Activate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clint`
--

INSERT INTO `clint` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `password`, `last_login_time`, `login_count`, `Status`) VALUES
(1, 'Kevin', 'Jos', 'kevin@gmail.com', '7530123654', 'Kevin@123', '2024-01-01 11:59:44', 0, 'activate'),
(2, 'Sumy', 'Philip', 'sumy@gmail.com', '9512365478', 'sumy@123', '2024-01-01 18:36:30', 0, 'Activate');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Amalda Patrick', 'amalda@gmail.com', 'Good', '2024-01-04 01:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `lawyer_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `response` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `client_id`, `lawyer_id`, `subject`, `message`, `response`, `timestamp`) VALUES
(1, 1, 1, 'perfomance', 'good', 'Thankyou', '2024-01-04 01:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `lawers`
--

CREATE TABLE `lawers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `bar_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `Practicing_at` varchar(33) DEFAULT NULL,
  `consultation_time` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Deactivate'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawers`
--

INSERT INTO `lawers` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `bar_number`, `password`, `specialization`, `education`, `experience`, `Practicing_at`, `consultation_time`, `location`, `bio`, `profile_picture`, `status`) VALUES
(1, 'Ashima', 'Dominic', 'ashima@gmail.com', '7536985214', ' K/123DT12/2020', 'Ashima@123', 'Family Law', 'LLB from ARMS Delhi,2018', '5 year', 'High cort', '1.30 PM - 5.30 PM', 'Pala', 'I am an experienced lawyer specializing in Family Law. Practicing at District Court, Pala.', 'adv.jpg', 'activate'),
(2, 'Augustine', 'Patrick', 'augustine@gmail.com', '9512368745', ' K/123KLT05/2023', 'Augustine@123', 'Real Estate Lawyer', 'LLB from SRS Kolkata,2020', '2 Year', 'District cort', '1.30 PM - 5.30 PM', 'Rani', '\r\nWith a passion for real estate law and a commitment to client success, Augustine Patrick combines legal knowledge with a client-centric approach. Diligent, experienced, and driven, Augustine strives to provide effective legal solutions tailored to the unique needs of each client. Whether navigating property transactions, resolving disputes, or offering legal advice, Augustine is dedicated to upholding the highest standards of legal service.', '2.jpg', 'activate'),
(3, 'Joshen', 'John', 'joshen@gmail.com', '9512365478', ' K/123KK12/2010', 'Joshen@123', 'Criminal Lawyer', 'LLB from STAL Banglor ,2018', '3 Year', 'High cort', '1.30 PM - 4.30 PM', 'Kottayam', '\r\nJoshen John, a seasoned Criminal Lawyer, is committed to upholding the principles of justice and defending the rights of his clients. With a strong educational background from STAL Bangalore and three years of hands-on experience, he navigates the complexities of criminal law with precision.\r\n\r\nHis practice at the High Court reflects his dedication to handling cases at a higher jurisdiction. Clients can expect insightful legal advice and representation during the designated consultation hours. Joshes legal expertise extends to the Kottayam region, where he serves the community by addressing their legal needs.', 'download (4).jpg', 'activate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `appoinment_ibfk_1` (`lid`);

--
-- Indexes for table `clint`
--
ALTER TABLE `clint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `lawers`
--
ALTER TABLE `lawers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoinment`
--
ALTER TABLE `appoinment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clint`
--
ALTER TABLE `clint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lawers`
--
ALTER TABLE `lawers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoinment`
--
ALTER TABLE `appoinment`
  ADD CONSTRAINT `appoinment_ibfk_1` FOREIGN KEY (`lid`) REFERENCES `lawers` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clint` (`id`),
  ADD CONSTRAINT `feedbacks_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
