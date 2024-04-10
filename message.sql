-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mydb:3306
-- Generation Time: Apr 10, 2024 at 05:51 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db3322`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msgid` int NOT NULL,
  `time` bigint NOT NULL,
  `message` varchar(250) NOT NULL,
  `person` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msgid`, `time`, `message`, `person`) VALUES
(1, 1712743346, 'test1', 'test@connect.hku.hk'),
(2, 1712743350, 'test2', 'test@connect.hku.hk'),
(3, 1712743350, 'test3', 'test@connect.hku.hk'),
(4, 1712763568, 'test3', 'test@connect.hku.hk'),
(5, 1712765439, '123', 'test@connect.hku.hk'),
(6, 1712765517, '13323221', 'test@connect.hku.hk'),
(7, 1712765570, 'ajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(8, 1712765776, 'sajdkhdak123', 'test@connect.hku.hk'),
(9, 1712765803, 'hjgjhfhgf678', 'test@connect.hku.hk'),
(10, 1712765816, 'ajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(11, 1712765820, 'ajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(12, 1712766009, 'ajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(13, 1712766013, 'ajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(14, 1712766015, 'ajksdhdakjnckjbakjsdhjanwkajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(15, 1712766019, 'ajksdhdakjnckjbakjsdhjanwk', 'test@connect.hku.hk'),
(16, 1712766524, 'sdjkald', 'test@connect.hku.hk'),
(17, 1712767343, 'test', 'test@connect.hku.hk'),
(18, 1712767528, 'Hello I am your friend', 'penglaishan@connect.hku.hk'),
(19, 1712767643, 'hello 憂鬱的烏龜as', 'test@connect.hku.hk'),
(20, 1712768236, 'hhhh', 'test@connect.hku.hk'),
(21, 1712769003, '忧郁的乌龟mipe', 'mipe@connect.hku.hk'),
(22, 1712769052, 'hello momosadhis', 'test@connect.hku.hk'),
(23, 1712769146, 'hello sdakldjksandlksa', 'mipe@connect.hku.hk'),
(24, 1712769271, 'my health is bad', 'test@connect.hku.hk'),
(25, 1712769278, 'I have a cold now', 'test@connect.hku.hk'),
(26, 1712770575, 'good morning', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msgid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
