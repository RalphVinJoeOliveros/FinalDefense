-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 06:37 AM
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
-- Database: `capstone_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `ID` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cpnum` varchar(50) NOT NULL,
  `fb_name` varchar(500) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`ID`, `username`, `email`, `first_name`, `last_name`, `pass`, `address`, `cpnum`, `fb_name`, `picture`) VALUES
(2345678, 'admin', 'jerick@gmail.com', 'Jerick Carlo', 'Almeda', '$2y$10$XGZ5iJo8Ud450/7wXdLxuO0NQJyP.CLO0swExbdW6FUPfiGWikSEC', 'iligan city', '9358887520', 'Jerick Carlo Almeda', '645630e2984c91.29163419-jerick.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` bigint(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `department` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `address` varchar(255) NOT NULL,
  `number` varchar(500) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `username`, `department`, `email`, `pass`, `address`, `number`, `fb`, `picture`) VALUES
(181016, 'msu.naawan', 'MSU-NAAWAN', 'msu@gmail.com', 'ici-iligan', 'naawan', '222-3245', 'msu-naawan', 'silhouette.png'),
(233905, '', 'MSU-IIT', 'iit@gmail.com', 'ici-iligan', 'tibanga, Iligan City', '09358887520', 'MSU-IIT', '645638c292d986.82756481-images.png'),
(453916, '', '7-ELEVEN', 'seveneleven@gmail.com', 'ici-iligan', 'Kiwalan, Iligan City', '09358887520', '7-Eleven', 'silhouette.png'),
(487600, '', 'pnb', 'pnb@gmail.com', '1234', '', '09358887520', '', 'silhouette.png'),
(544567, '', '4JGraphics', '4j@gmail.com', 'ici-iligan', 'Villaverde, Iligan City', '222-3456', '4JGraphics', '4j.png'),
(567896, '', 'JCTGraphics', '', 'ici-iligan', '', '', '', ''),
(567897, '', 'Jcreation', '', '1234', '', '', '', ''),
(678234, 'zammi234', 'Zammi Tshirts & Prints', 'zammi@gmail.com', '$2y$10$nEaksW/MxPYcNqlyrTbeguAcMJAp897VjWxuVOQ.3tQnc5WNuXt.m', 'iligan city', '09358887520', 'Zammi Shirts & Prints', '645ba98915fc33.74215298-645ba9689c8084.23860339-zammi.png'),
(710067, '', 'printasia', 'printasia@gmail.com', 'ici-iligan', 'TAG-IBO', '09358887520', 'Print Asia', ''),
(858322, '', 'Gaisano', 'gaisano@gmail.com', 'ici-iligan', 'Villaverde', '09358887520', 'Gaisano Mall', '64562f7638baf8.85122805-IMG_0064-removebg-preview.png'),
(976370, '', 'CHOOKS TO GO', 'chooks@gmail.com', 'ici-iligan', 'tibanga, Iligan City', '09358887520', 'Chooks To Go Manok Ng Bayan', '6459b95e641564.96255929-');

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `lrn` varchar(12) NOT NULL,
  `id` int(11) NOT NULL,
  `date_` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `numofhrs` int(11) NOT NULL,
  `remarks` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dtr`
--

INSERT INTO `dtr` (`lrn`, `id`, `date_`, `time_in`, `time_out`, `numofhrs`, `remarks`) VALUES
('464364575675', 186342, '2023-02-01', '09:06:00', '22:06:00', 13, ''),
('463000011113', 350467, '2023-05-08', '06:35:00', '15:35:00', 9, 'Approved'),
('463000011113', 483141, '2023-05-07', '00:00:00', '17:00:00', 17, 'Approved'),
('922337203685', 580975, '2023-04-17', '09:00:00', '17:00:00', 8, ''),
('453453453453', 591347, '2023-03-05', '09:19:00', '22:19:00', 13, ''),
('463000011113', 705198, '2023-05-08', '09:23:00', '21:23:00', 12, ''),
('463000011113', 928115, '2023-05-07', '09:05:00', '20:00:00', 11, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `lrn` bigint(12) NOT NULL,
  `jobKnowledge` int(11) NOT NULL,
  `qualityOfWork` int(11) NOT NULL,
  `quantityOfWork` int(11) NOT NULL,
  `dependability` int(11) NOT NULL,
  `initiative` int(11) NOT NULL,
  `conduct` int(11) NOT NULL,
  `decisionMaking` int(11) NOT NULL,
  `interpersonalSkills` int(11) NOT NULL,
  `attendance` int(11) NOT NULL,
  `personalAppearance` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `recommend` text NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `designation` varchar(80) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`lrn`, `jobKnowledge`, `qualityOfWork`, `quantityOfWork`, `dependability`, `initiative`, `conduct`, `decisionMaking`, `interpersonalSkills`, `attendance`, `personalAppearance`, `feedback`, `recommend`, `supervisor`, `designation`, `total`) VALUES
(12345678, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(123456789, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(435345345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(1234567894, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4345345646, 15, 15, 13, 10, 10, 10, 10, 5, 4, 5, '', 'Need more space for improvement :) hehe', 'Ralph Vin Joe J. Oliveros', 'CEO', 97),
(4630000456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(5345345345, 10, 13, 15, 10, 10, 10, 10, 5, 5, 5, 'good', 'good', 'Ralph', 'CEO', 93),
(123456789012, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(324242525254, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(463000001245, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(463000011113, 13, 15, 15, 10, 8, 4, 9, 5, 4, 5, 'Goods', 'Goods', 'Ralph', 'CEO', 88),
(463000011132, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(468100000124, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(2242353453456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4345436456445, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4564576456456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4643645756756, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(34534645875689, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(34534647457567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(45464756788688, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(53453636363525, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(1234346457568755, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(3424242353354235, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4235437654876597, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(4357546464334535, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(45345345345345345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(123253464578569886, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(342424235325252523, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(2324543645764575687, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(9223372036854775807, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `fname` varchar(80) NOT NULL,
  `mname` varchar(80) NOT NULL,
  `lname` varchar(80) NOT NULL,
  `lrn` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpnum` bigint(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nschool` text NOT NULL,
  `department` text NOT NULL,
  `coordinator` varchar(255) NOT NULL,
  `block` varchar(80) NOT NULL,
  `schoolyear` varchar(9) NOT NULL,
  `hrs` int(11) NOT NULL,
  `homeaddress` text NOT NULL,
  `bdate` date NOT NULL,
  `placeofbirth` varchar(500) NOT NULL,
  `Gender` varchar(80) NOT NULL,
  `nationality` text NOT NULL,
  `marital_status` text NOT NULL,
  `religion` varchar(1000) NOT NULL,
  `height` varchar(10) NOT NULL,
  `skills` varchar(700) NOT NULL,
  `qualifications` varchar(700) NOT NULL,
  `picture` text NOT NULL,
  `objective` text NOT NULL,
  `cr1name` text NOT NULL,
  `cr1relation` text NOT NULL,
  `cr1info` varchar(255) NOT NULL,
  `cr2name` text NOT NULL,
  `cr2relation` text NOT NULL,
  `cr2info` varchar(255) NOT NULL,
  `schedule` text NOT NULL,
  `startdate` date NOT NULL,
  `remarks` varchar(80) NOT NULL,
  `status` varchar(80) NOT NULL,
  `dateRegistered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fname`, `mname`, `lname`, `lrn`, `email`, `cpnum`, `pass`, `nschool`, `department`, `coordinator`, `block`, `schoolyear`, `hrs`, `homeaddress`, `bdate`, `placeofbirth`, `Gender`, `nationality`, `marital_status`, `religion`, `height`, `skills`, `qualifications`, `picture`, `objective`, `cr1name`, `cr1relation`, `cr1info`, `cr2name`, `cr2relation`, `cr2info`, `schedule`, `startdate`, `remarks`, `status`, `dateRegistered`) VALUES
('Karl', 'Ivanne', 'Migrino', '123253464578', 'ivanne@gmail.com', 9335083463, '1234', 'Iligan Computer Institute', '', '2345678', 'G12.EIM1', '2022-2023', 80, '', '2013-01-02', 'Purok 1c tag-ibo, Dalipuga, Iligan City', 'Female', 'batswana', 'Separated', 'Roman Catholic', '123', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2020-10-10'),
('Ivann', 'Migrino', 'Sombol', '123456789012', 'vinjoeoliveros85@gmail.com', 9358887520, '1234', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS2', '2035-2036', 0, '', '2023-05-17', 'iligan City', 'Male', 'Filipino', 'Widowed', 'Jojo', '123.45', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-15'),
('Ralph Vin Joe', 'Sombol', 'Ivanne', '324242525254', 'karl@gmail.com', 934234524523, '1234', 'Iligan Computer Institute', '678234', '2345678', 'G12.IT1', '2022-2023', 80, '', '2023-03-30', 'Iligan City', 'Male', 'barbadian', 'Single', 'aswwqrfsfsa', '123', '', '', '', '', '', '', '', '', '', '', 'Mon, Tue, Wed, Thu, Fri, Sat, Sun', '2023-05-16', 'Pending', 'Approved', '2020-03-04'),
('Ivanne', 'Sombol', 'Karl', '342424235325', 'karl@gmail.com', 9435465663, '1234', 'Iligan Computer Institute', '', '2345678', 'G12.EIM1', '2023-2024', 80, '', '2003-02-01', 'Iligan City', 'Male', 'batswana', 'Single', '4234234234234', '125', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2020-10-19'),
('Chelsey', 'Mangubat', 'Canoy', '423543765487', 'jerick@gmail.com', 9345353454, '1234', 'Iligan Computer Institute', '567896', '2345678', 'G12.HMSS3', '2022-2023', 80, '', '2002-10-15', 'Iligan City', 'Male', 'filipino', 'Single', 'Jehovah\'s Witnesses', '123', '', '', '', '', '', '', '', '', '', '', '', '2023-05-09', 'On Going', 'Approved', '2020-10-02'),
('Ivanne Karl', 'Migriño', 'Sombol', '434534564601', '', 0, '$2y$10$S5DP6thS3yzTm4RlPLZycuKceVqCxvfxvsPuPajcntS3s4i182BjW', 'Iligan Computer Institute', '233905', '2345678', 'G12.IT1', '2022-2023', 80, '', '2023-02-01', 'Purok 1c tag-ibo, Dalipuga, Iligan City', '', 'barbudans', 'Single', 'Roman Catholic', '142', 'Coding', 'Web Developer', '317849253_478510670841452_1774724218073666332_n.jpg', '', '', '', '', '', '', '', 'Mon, Tue', '2023-05-09', 'Completed', 'Approved', '2020-03-02'),
('DULCE', 'JABAGAT', 'OLIVEROS', '434543645644', 'Dulce.oliveros54@gmail.com', 435436543646, '1234', 'DULCE JABAGAT OLIVEROS', '', '2345678', 'STEM1', '2022-2023', 123, '', '2023-04-27', 'iligan City', 'Male', 'albanian', 'Widowed', 'gfhfh', '123', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2020-03-23'),
('RALPH VIN JOE', 'JABAGAT', 'OLIVEROS', '454647567886', 'binjo@gmail.com', 9358887520, '1234', 'Iligan Computer Institute, Inc.', '678234', '2345678', 'G12.EIM1', '2023-2024', 0, '', '2003-12-12', 'iligan City', 'Male', 'afghan', 'Married', 'gfhfh', '123', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2020-03-08'),
('Jeff Michael', 'Lacang', 'Carbaquil', '456457645645', 'jeffmichael@gmail.com', 9345353454, '1234', 'Iligan Computer Institute', '678234', '2345678', 'STEM1', '2021-2022', 80, 'iligan city', '2003-02-05', 'Purok 1c tag-ibo, Dalipuga, Iligan City', 'Male', 'filipino', 'Single', 'Roman Catholic', '123', 'Graphic Design', 'Graphic Design', '', '', '', '', '', '', '', '', 'Mon, Tue', '0000-00-00', 'Completed', 'Approved', '2020-03-22'),
('Ralph Vin Joe', 'Jabagat', 'Oliveros', '463000011113', 'vinjoeoliveros85@gmail.com', 9358887520, '$2y$10$RPB6X3zUDKNeb57pDONfQuux5AkyWOD76yflDaH5U0nEV.ze/gUne', 'Iligan Computer Institute', '678234', '2345678', 'G12.IT1', '2022-2023', 80, 'Purok 1c tag-ibo, Dalipuga, Iligan City', '2023-02-28', 'Purok 1c tag-ibo, Dalipuga, Iligan City', 'Male', '', 'Married', 'Jehovah\\\\\\\'s Witnesses', '123.45', 'Coding, java, javascript', 'Coding, Web Developer, Project Designer', '6456785f40abc9.77155033-130096901_773621599915823_6525440605757007784_n.png', 'I am looking for a suitable On- the- Job Training and opportunity where I could practice my knowledge and develop my personality as a career person while utilizing my skills. To bring out and harness the best of my potentials for the Glory of God and for the benefit of my employer, the community and myself in preparation for my future’s job.', 'Clinton Butch Estudillo', 'Block IT3 Adviser/Iligan Computer Institute', '09356248673', 'Jerick Carlo Almeda', 'IT Specialized Subject Teacher/Iligan Computer Institute', 'jerick.almeda@ici.edu.ph', 'Mon, Tue', '2023-05-02', 'On Going', 'Approved', '2020-03-03'),
('Ralph Vin Joe', 'Carlo', 'Sombol', '463000011132', 'vinjoeoliveros85@gmail.com', 0, '1234', 'Iligan Computer Institute', '678234', '2345678', 'G12.IT1', '2021-2022', 80, '', '2023-02-19', 'Purok 1c tag-ibo, Dalipuga, Iligan City', '', 'bahamian', 'Single', 'Jehovah\'s Witnesses', '123', 'Graphic Design', 'Graphic Design', '', '', '', '', '', '', '', '', 'Mon, Tue', '2023-05-25', 'On Going', 'Approved', '2020-03-07'),
('Jerick carlo', 'Carlo', 'Almeda', '464364575675', '', 0, '1234', 'Iligan Computer Institute', '678234', '2345678', 'STEM1', '2021-2022', 80, '', '2023-02-20', 'Purok 1c tag-ibo, Dalipuga, Iligan City', '', 'bahraini', 'Single', 'Roman Catholic', '766', 'Coding', 'Web Developer', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2020-03-16'),
('Clinton Butch', 'Estudillo', 'Estudillo', '468100000124', 'clinton@gmail.com', 9358887520, '1234', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.ABM1', '2022-2023', 0, '', '1998-12-09', 'iligan City', 'Male', 'afghan', 'Married', 'None', '123.45', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', 'Pending', '2023-05-09'),
('Keith Russel', 'sdfsdfsd', 'Lacuna', '5345345345', '', 0, '$2y$10$nrr1lblUMiClKZvB0jOpC.teXeSS/kJDt/lyThhXA.OhladRHHG9W', 'Iligan Computer Institute', '678234', '2345678', 'G12.IT1', '2022-2023', 80, '', '2023-02-13', 'Purok 1c tag-ibo, Dalipuga, Iligan City', '', 'batswana', 'Single', 'Roman Catholic', '789', 'Graphic Design', 'Web Developer', '', '', '', '', '', '', '', '', 'Mon, Tue', '2023-05-11', 'Not Yet Started', 'Approved', '2020-03-03'),
('Ralph', 'Sombol', 'Karl', '534536363635', 'ralph@gmail.com', 9435465663, '1234', 'Iligan Computer Institute', '544567', '2345678', 'G12.EIM1', '2021-2022', 80, '', '2003-02-01', 'Iligan City', 'Male', 'batswana', 'Single', '4234234234234', '125', '', '', '', '', '', '', '', '', '', '', 'Mon, Tue', '2023-05-10', 'On Going', 'Approved', '2020-03-12'),
('Chelsey', 'Canoy', 'Sumalinog', '9223372036', 'ivanne@gmail.com', 9345353454, '$2y$10$kPk.AojDivyPJwwsZqfNNeXod3l3LOjR9W85/AFR5Ra4sPqJ1x.iK', 'Iligan Computer Institute', '858322', '2345678', 'G12.EIM1', '2023-2024', 80, '', '2023-04-19', 'Purok 1c tag-ibo, Dalipuga, Iligan City', 'Female', 'hungarian', 'Single', 'dsdsfsfsfsf', '123', '', '', '', '', '', '', '', '', '', '', 'Mon', '0000-00-00', 'On Going', 'Approved', '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `student_block`
--

CREATE TABLE `student_block` (
  `student_block` varchar(40) NOT NULL,
  `block_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_block`
--

INSERT INTO `student_block` (`student_block`, `block_desc`) VALUES
('G12.ABM2', 'G12.ABM2 '),
('G12.ABM3', 'G12.ABM3 '),
('G12.ABM4', 'G12.ABM4 '),
('G12.CA1', 'G12.CA1 '),
('G12.CA2', 'G12.CA2 '),
('G12.CE1', 'G12.CE1'),
('G12.CE2', 'G12.CE2'),
('G12.CE3', 'G12.CE3'),
('G12.EIM1', 'G12.EIM1'),
('G12.EIM3', 'G12.EIM3'),
('G12.EIM4', 'G12.EIM4'),
('G12.EIM5', 'G12.EIM5'),
('G12.EIM6', 'G12.EIM6'),
('G12.GAS1', 'G12.GAS1'),
('G12.HMSS1', 'G12.HMSS1'),
('G12.HMSS2', 'G12.HMSS2'),
('G12.HMSS3', 'G12.HMSS3'),
('G12.HMSS4', 'G12.HMSS4'),
('G12.HMSS5', 'G12.HMSS5'),
('G12.HMSS6', 'G12.HMSS6'),
('G12.HMSS7', 'G12.HMSS7'),
('G12.HMSS8', 'G12.HMSS8'),
('G12.HRM1', 'G12.HRM1'),
('G12.HRM2', 'G12.HRM2'),
('G12.HRM3', 'G12.HRM3'),
('G12.HRM4', 'G12.HRM4'),
('G12.HRM5', 'G12.HRM5'),
('G12.IT1', 'G12.IT1'),
('G12.IT2', 'G12.IT2'),
('G12.IT3', 'G12.IT3'),
('G12.it4', NULL),
('G12.OM1', 'G12.OM1'),
('G12.PN1', 'G12.PN1'),
('G12.PN2', 'G12.PN2'),
('G12.PN4', 'G12.PN4'),
('G12.STEM1', 'G12.STEM1'),
('G12.STEM2', 'G12.STEM2'),
('G12.STEM3', 'G12.STEM3'),
('G12.STEM4', 'G12.STEM4'),
('G12.STEM5', 'G12.STEM5'),
('G12.ABM1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `weeklyreport`
--

CREATE TABLE `weeklyreport` (
  `lrn` varchar(12) NOT NULL,
  `id` bigint(20) NOT NULL,
  `weeknum` varchar(15) NOT NULL,
  `date_` date NOT NULL,
  `hrs` int(80) NOT NULL,
  `descript_of_task` text NOT NULL,
  `Progress` text NOT NULL,
  `dateofcom` date DEFAULT NULL,
  `remarks` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weeklyreport`
--

INSERT INTO `weeklyreport` (`lrn`, `id`, `weeknum`, `date_`, `hrs`, `descript_of_task`, `Progress`, `dateofcom`, `remarks`) VALUES
('463000011113', 309764, 'Week 1', '2023-05-04', 8, 'fhfghfghf', ' ', NULL, 'Approved'),
('463000011113', 377864, 'Week 2', '2023-05-08', 7, 'fghgfh', ' ', NULL, ''),
('463000011113', 557434, 'Week 2', '2023-05-13', 8, 'fsdfdsfsdfsd', ' ', NULL, ''),
('463000011113', 715403, 'Week 2', '2023-05-07', 8, 'dgdfgdfg', 'DONE', NULL, ''),
('463000011113', 761718, 'Week 1', '2023-05-02', 8, 'dgfgfd', ' ', NULL, 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`lrn`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`lrn`);

--
-- Indexes for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=997157;

--
-- AUTO_INCREMENT for table `weeklyreport`
--
ALTER TABLE `weeklyreport`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=988205;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
