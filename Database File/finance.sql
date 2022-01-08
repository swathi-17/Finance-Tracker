-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 07:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--
-- Error reading structure for table finance.transaction: #1932 - Table 'finance.transaction' doesn't exist in engine
-- Error reading data for table finance.transaction: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `finance`.`transaction`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `Transaction_ID` int(11) NOT NULL,
  `Date_of_Transaction` date NOT NULL,
  `Transaction_Amount` float NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Mode_of_Transaction` varchar(255) NOT NULL,
  `Remark` varchar(255) NOT NULL,
  `Balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`Transaction_ID`, `Date_of_Transaction`, `Transaction_Amount`, `Type`, `Mode_of_Transaction`, `Remark`, `Balance`) VALUES
(1, '2021-02-02', 500, 'credit', 'cash', '  ok', 500),
(2, '2021-03-25', 6000, 'credit', 'cash', '  good', 6000),
(3, '2021-03-23', 500, 'debit', 'cash', '  nice', -500),
(4, '2021-04-03', 400, 'debit', 'cheque', '  abc', -400),
(5, '2021-04-25', 6500, 'credit', 'cheque', '  good', 6500),
(6, '2021-05-27', 600, 'credit', 'cheque', '  good', 600),
(7, '2021-05-29', 1000, 'credit', 'cheque', '  good', 1000),
(12, '2021-09-11', 1000, 'credit', 'cheque', 'ok', 1000),
(13, '2021-09-24', 10000, 'debit', 'cheque', 'abc', -10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`Transaction_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
