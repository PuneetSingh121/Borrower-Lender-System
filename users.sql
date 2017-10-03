-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 07:02 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `credit_limit` int(11) NOT NULL DEFAULT '100000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower`
--

INSERT INTO `borrower` (`id`, `name`, `email`, `password`, `credit_limit`) VALUES
(1, 'rahl', 'seg@gmail.com', '$2y$10$s3zc0E7P2Ov01x1P06V/z.EESSqEpKmSN0X1cVkvwdJd7RRNDOEMi', 100000),
(2, 'pun', 'pun@gmail.com', '$2y$10$kS6vTHVc1.TDbDl9Qxl9I.xpNibEfphgNXHsYA7hpqWFlnsrKKg7e', 100000),
(3, 'mandy', 'mandy@gmail.com', '$2y$10$PzdGyOqXv/lKGPo5SvWfLeGiDanxN7OR5WG.ywAmpOVJcPdDj9kDG', 94500),
(5, 'rahul', 'rl@gmail.com', '$2y$10$JURoaSmh2zmiMnHrRYja7eYzUhTTWNIlWw1A0k7nXWQ/WUsmENuIu', 100000),
(6, 'Puneet', 'puneetkaka121@gmail.com', '$2y$10$CuCf4C9DXj5rCoFHtyAcQup5m/DP8DsyQABW9Hp9s8eLh7lfq04ty', 100000),
(7, 'abc', 'abc@gmail.com', '$2y$10$3WBe3qjhzK49PusVPnEieukpSY8tDLbs.CsR6st.tYA/q49dGbJNi', 99000);

-- --------------------------------------------------------

--
-- Table structure for table `borrower_credit`
--

CREATE TABLE `borrower_credit` (
  `id` int(11) NOT NULL,
  `b_id` int(11) NOT NULL,
  `payment_done` tinyint(1) NOT NULL DEFAULT '0',
  `amount` int(11) NOT NULL,
  `replacement_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrower_credit`
--

INSERT INTO `borrower_credit` (`id`, `b_id`, `payment_done`, `amount`, `replacement_date`) VALUES
(5, 3, 1, 0, '2017-10-18'),
(6, 3, 0, 5000, '2017-10-20'),
(7, 3, 1, 0, '2017-10-19'),
(8, 6, 1, 0, '2017-10-12'),
(9, 7, 0, 1000, '2017-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `lender`
--

CREATE TABLE `lender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lender`
--

INSERT INTO `lender` (`id`, `name`, `email`, `password`) VALUES
(1, 'rahul', 'rl@gmail.com', '$2y$10$Tpt00Smd/8NPVhvFAtr74eJerkbT//HN1PQW4ceO2yTrwvswPkHtO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `borrower_credit`
--
ALTER TABLE `borrower_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lender`
--
ALTER TABLE `lender`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `borrower_credit`
--
ALTER TABLE `borrower_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `lender`
--
ALTER TABLE `lender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
