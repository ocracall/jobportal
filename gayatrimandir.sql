-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 08:14 AM
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
-- Database: `gayatrimandir`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(10) NOT NULL,
  `TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `TIME_STAMP`, `username`, `email`, `subject`, `message`) VALUES
(1, '2024-04-02 03:05:53', 'John', 'John@gmail.com', 'John\' s message', 'Hey, I would like to contribute to your organization.'),
(3, '2024-04-02 03:05:53', 'sdfgsdgsd', 'sgsdgs@gmail.com', 'sadsaf', 'fsdfsd'),
(9, '2024-04-02 03:05:53', 'William', 'William@abc.com', 'William', 'sxdwdsw'),
(10, '2024-04-02 03:05:53', 'William', 'William@abc.com', 'William', 'sxdwdsw'),
(11, '2024-04-02 03:05:53', 'William', 'William@abc.com', 'William', 'sxdwdsw'),
(12, '2024-04-02 03:05:53', 'saqdcff', 'dsgvfsd@dfrd', 'sdvsfd', 'vsfdgvsgv'),
(13, '2024-04-02 03:05:53', 'Aarav', 'Aarav@edef', 'dwff', 'fdsdgfvs'),
(14, '2024-04-02 03:13:09', 'angel', 'angle@gmail.com', 'ramnavami', 'decoretion');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `eventDate1` date NOT NULL DEFAULT current_timestamp(),
  `eventDate2` date NOT NULL DEFAULT current_timestamp(),
  `eventDate3` date NOT NULL DEFAULT current_timestamp(),
  `eventName1` varchar(30) NOT NULL,
  `eventName2` varchar(30) NOT NULL,
  `eventName3` varchar(30) NOT NULL,
  `eventDescription1` varchar(100) NOT NULL,
  `eventDescription2` varchar(100) NOT NULL,
  `eventDescription3` varchar(100) NOT NULL,
  `noticeDate` date NOT NULL DEFAULT current_timestamp(),
  `noticeSubject` varchar(100) NOT NULL,
  `noticeDescription` varchar(400) NOT NULL,
  `TIME_STAMP` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedBy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventDate1`, `eventDate2`, `eventDate3`, `eventName1`, `eventName2`, `eventName3`, `eventDescription1`, `eventDescription2`, `eventDescription3`, `noticeDate`, `noticeSubject`, `noticeDescription`, `TIME_STAMP`, `updatedBy`) VALUES
(1, '2024-04-09', '2024-04-17', '2024-04-23', 'Navratri Begins', 'Rama Navami', 'Hanuman Jayanti', '9 Am Yagya and puja.', '9 Am Yagya and puja.', '9 Am Yagya and puja.', '2024-04-02', 'Lorem Ipsum', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia', '2024-04-01 15:29:20', ''),
(2, '2024-04-09', '2024-04-17', '2024-04-23', 'Navratri Begins', 'Rama Navami', 'Hanuman Jayanti', '9 Am Yagya and puja.', '9 Am Yagya and puja.', '9 Am Yagya and puja.', '2024-04-02', 'छपाई', 'छपाई और अक्षर योजन उद्योग का एक साधारण डमी पाठ है. Lorem Ipsum सन १५०० के बाद से अभी तक इस उद्योग का मानक डमी पाठ मन गया, जब एक अज्ञात मुद्रक ने नमूना लेकर एक नमूना किताब बनाई. ', '2024-04-02 02:47:15', 'John');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `username`, `password`, `email`) VALUES
(1, 'John', '12345', 'John@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
