-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
  `pass` varchar(80) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cpnum` varchar(50) NOT NULL,
  `fb_name` varchar(500) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`ID`, `username`, `email`, `first_name`, `last_name`, `pass`, `address`, `cpnum`, `fb_name`, `picture`) VALUES
(2345678, 'admin', 'jerick@gmail.com', 'Marnielle', 'Salig', '$2y$10$kAICCDAgSyrGwiv0vTzYSOcbzoYWZzJSbVBXdaSywJyIjyekfsJYS', 'Iligan City', '09000000000', 'Marnielle Salig', '646b690e598b18.30283481-mammarnielle.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `username`, `department`, `email`, `pass`, `address`, `number`, `fb`, `picture`) VALUES
(173304, 'fourj.graphics', '4J GRAPHIC PRINTS', '4jgraphicprints@gmail.com', '$2y$10$Q5liqRfTx7y82vAdSVEote3276Jqmx0MQi.AOqQilOlc8F0xodfBC', 'Ground floor tita fannies Bldg. Beside Gaisano Mall, Brgy. Villaverde, Iligan City, Philippines', '09751250862', '4J Graphic Prints', '646af2569cfb32.37066140-328523506_1207100056571775_8920395577726256447_n.jpg'),
(523136, 'j.creation', 'JCREATIONS DIGIPRINTS & ADVERTISING WORKS', 'jcreationsdesign@gmail.com', '$2y$10$eIuMn0ElQyA.TtA4VdmRWOifeO2HbsDU2hPw9qm5vAzl4nozhJU16', 'G/F B & B Bldg., Mahayahay, Iligan City, Philippines', '(063) 223-0198', 'JCreations Digiprints & Advertising Works', '646af356aa5656.53544377-305324792_571114594805440_2880110427524241246_n.png'),
(548792, 'asia.printstation', 'ASIA PRINTSTATION & INTERNET BAR', 'asia_printstation@yahoo.com', '$2y$10$aikWX7eYyrWTlaFuC1ZjCO.uKnjfrtcr0I3X99BN8.NM4eHI2XbbG', 'Quezon Avenue Extension, Iligan City, Iligan City, Philippines', '09176549777', 'ASIA Printstation & Internet Bar', '646af118de62a5.53453823-294696559_418531730295417_7360014160341807364_n.jpg'),
(678234, 'zammi234', 'Zammi Tshirts & Prints', 'zammi@gmail.com', '$2y$10$nEaksW/MxPYcNqlyrTbeguAcMJAp897VjWxuVOQ.3tQnc5WNuXt.m', 'iligan city', '09358887520', 'Zammi Shirts & Prints', '645ba98915fc33.74215298-645ba9689c8084.23860339-zammi.png'),
(904804, 'prime.wood', 'PRIMEWOOD INDUSTRIES', '', '$2y$10$obsgSlD8Vqrf6FHUdoFPfe96XOlZMsXtzIsnooi5JlNjazpTL0.mi', '', '', '', 'silhouette.png'),
(918061, 'derama.prints', 'DERAMA PRINTSTOP', 'dprintstop@yahoo.com', '$2y$10$E4pY0Aa/0yU7sSraBhPfvei11xd3Kl4J12b745CWiDw5VKyNLbJSe', 'Plaza Cinema Building, Aguinaldo St, Palao, Iligan City, 9200 Lanao del Norte', '221-0090', 'Derama Printstop', '646af6fef37bf8.88948941-335206597_108742945497802_1738174912192272231_n.jpg');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`lrn`, `jobKnowledge`, `qualityOfWork`, `quantityOfWork`, `dependability`, `initiative`, `conduct`, `decisionMaking`, `interpersonalSkills`, `attendance`, `personalAppearance`, `feedback`, `recommend`, `supervisor`, `designation`, `total`) VALUES
(124546454136, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(127084100280, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(127097100025, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128000019874, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128092112370, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128093111248, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128094100270, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128094120067, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128095133250, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128104100036, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128111100021, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128112100016, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128495640956, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128563454653, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128668415633, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128790014567, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128790098848, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(128904200560, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(129765123456, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(305300110683, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(434565436365, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(463000011113, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(463009150259, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(463900012345, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0),
(546478435322, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '', '', '', 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`fname`, `mname`, `lname`, `lrn`, `email`, `cpnum`, `pass`, `nschool`, `department`, `coordinator`, `block`, `schoolyear`, `hrs`, `homeaddress`, `bdate`, `placeofbirth`, `Gender`, `nationality`, `marital_status`, `religion`, `height`, `skills`, `qualifications`, `picture`, `objective`, `cr1name`, `cr1relation`, `cr1info`, `cr2name`, `cr2relation`, `cr2info`, `schedule`, `startdate`, `remarks`, `status`, `dateRegistered`) VALUES
('Rolly', 'Lopez', 'Paganpan', '124546454136', 'rolly.lopez@gmail.com', 9768832540, '$2y$10$9PdjEHA2/wdmsOsW13/VJuzK6evufNqBH11mtG/BvRiw4EZ4fZjie', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.EIM1', '2022-2023', 0, 'Tambo, Iligan CIty', '2004-05-16', 'City Hospital', 'Male', 'Filipino', 'Single', 'Pentecostal', '5.5', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Andrei justine', 'Semblante', 'Ocampo', '127084100280', 'ocampo.andreijustine@ici.edu.ph', 9207655404, '$2y$10$ug9MFNQjqZTDd4nERukPVOb38vQVsN8Ly1sJNhG9HMmkWWnEFneQC', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS1', '2022-2023', 0, 'Pala-o, Iligan City', '2004-05-25', 'Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '165', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Charish', 'Genovisa', 'Enterone', '127097100025', 'enterone.charish@ici.edu.ph', 9556712234, '$2y$10$LhpKcT5PkVPJTrsTeLpGseldq3BWRCBGQJ//7qr8BayFiUZSkikTu', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.EIM1', '2022-2023', 0, 'Linamon, Iligan City', '2005-08-03', 'Linamon, Iligan City', 'Female', 'Filipino', 'Single', 'Roman catholic', '158', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Sherwin keith', 'Daug', 'Abong', '128000019874', 'abong.sherwin@gmail.com', 9456781256, '$2y$10$WAML6DylQ3twcHfDrahiqOkLaSRhcXA2b0wb1u6OxKl2fHEQOXGOq', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS1', '2022-2023', 0, 'Villaverde, Iligan City', '2005-05-22', 'Villaverde, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '167.54', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Justine clark', 'Tombo', 'Echavez', '128092112370', 'clark_echavez00@gmail.com', 9108533204, '$2y$10$NfaoSP/Yvx7ihLzOru0pe.ynePAv0rB2sJ6pxTVr8YmgUYDrPIh9y', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.STEM1', '2022-2023', 0, 'Pala-o, Iligan City', '2005-12-25', 'Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '156', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Shiela mae', 'Bohol', 'Catipay', '128093111248', 'shielacatipay18@gmail.com', 9657723406, '$2y$10$fCgsZc/bWf9ozZ1hPnOn2.W2qYZZuWz0i1s6l8Pft4c6km7U7IDyW', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.STEM1', '2021-2022', 0, 'Santiago, Iligan City', '2005-01-04', 'Tibanga, Iligan City', 'Female', 'Filipino', 'Single', 'Jehovah\\\'s witnesses', '5.0', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Yisha', 'Jabagat', 'Villarin', '128094100270', 'villarin.yisha@ici.edu.ph', 9558569853, '$2y$10$95rkk8G2vZxu7oeTqLVZjuFBNfFMtJ0QoK7fuCd.Y892AFRN2wyAe', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.EIM1', '2022-2023', 0, 'Tag-ibo, Dalipuga, Iligan City', '2004-08-01', 'Tag-ibo, Dalipuga, Iligan City', 'Female', 'Filipino', 'Single', 'Jehova\\\'s witnesses', '152', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Lorjessabelle', 'Clavido', 'Lacuna', '128094120067', 'clavido.lorjessabelle@ici.edu.ph', 9408644207, '$2y$10$/MKhJrs5P21XCw40k1Xsh.vQ7Q6fwkyaQR9bKssb.n/WGP1KKaXJO', 'Iligan Computer Institute, Inc.', '523136', '2345678', 'G12.ABM2', '2022-2023', 80, 'Saray, Iligan City', '2004-07-22', 'Iligan City', 'Female', 'Filipino', 'Single', 'Roman catholic', '155', '', '', '', '', '', '', '', '', '', '', 'Mon, Tue', '2023-05-29', 'Not Yet Started', 'Approved', '2023-05-22'),
('Khent maverick', 'Macalisang', 'Conato', '128095133250', 'conato.khentmaverick@ici.edu.ph', 9108733406, '$2y$10$DUF/5vvNv4E.zAcPV0rvLe9et84oDSrRWRQ5ELrefNAErn7gvUmEW', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.STEM1', '2022-2023', 0, 'Tambacan, Iligan City', '2003-09-10', 'Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '165', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Keith Russel', 'Bagsican', 'Lacuna', '128104100036', 'lacuna.keithrussel@ici.edu.ph', 9519674839, '$2y$10$Uh4rSe0CRV3KvT4z.xAKIu1W9mWciL8kmcg6fA68Ss7kTUMKaSOUW', 'Iligan Computer Institute, Inc.', '678234', '2345678', 'G12.IT3', '2022-2023', 80, 'Iligan City', '2005-01-13', 'Dapitan City', 'Male', '', 'Single', 'Roman catholic', '167.64', '', '', '646b2024646029.30652847-keith.jpg', '', '', '', '', '', '', '', 'Mon, Tue, Wed', '2023-05-22', 'Not Yet Started', 'Approved', '2023-05-22'),
('Asleah rustel', 'Semblante', 'Sumalinog', '128111100021', 'sumalinog.asleahrustel@ici.edu.ph', 9558409599, '$2y$10$EgZfHzu1clt6FQb7U.NBi.y5nfWEB9G9hRbhru6.647XA95lqqPIe', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.IT3', '2022-2023', 0, 'Kiwalan, Iligan City', '2004-02-13', 'Linanot, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '152.4', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Ivanne Karl', 'Migriño', 'Sombol', '128112100016', 'sombol.ivannekarl@ici.edu.ph', 9631360901, '$2y$10$zUOShdASRWpiDewo5lDA1uN1wwP9v0QXCvDECfok5QVvSPttzJYyy', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.IT3', '2022-2023', 0, 'Paitan, Dalipuga, Iligan City', '2005-02-14', 'Baslayan, Iligan City', 'Female', 'Others', 'Divorced', 'Roman catholic', '172.72', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Jeff michael', 'Lacang', 'Carbaquil', '128495640956', 'lacang.jeffmichael@ici.edu.ph', 9354956654, '$2y$10$4lR/L9Np0bEbF.yH2lygK.Hf6gywUYCQvr5DatzebiN38wgi6/pti', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.STEM1', '2022-2023', 0, 'Paitan, Dalipuga, Iligan City', '2004-05-04', 'Dalipuga, Iligan City', 'Male', 'Filipino', 'Single', 'Born again', '163.2', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Chelsey', 'Mangubat', 'Canoy', '128563454653', 'canoy.chelsey@ici.edu.ph', 9565856402, '$2y$10$hbYEt8Grpt.T6YNhUWUlgeKWCOhzakFTDpj4vPd2SmdFi0Hi6qzuW', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.ABM2', '2021-2022', 0, 'Santa Filoma, Iligan City', '2005-03-04', 'Santa Filomena, Valderrama, Iligan City', 'Female', 'Filipino', 'Single', 'Jehova\\\'s witnesses', '155.1', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Neo eric', '', 'Juarez', '128668415633', 'juarez.neoeric@ici.edu.ph', 9568581456, '$2y$10$BGY.Kz9aVbjNIuUWEpPuyOtGZyKhljOnymx/W3mboI5T1Gr10pGlu', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.IT3', '2021-2022', 0, 'Santa Elena, Iligan City', '2006-05-09', 'Santa Elena, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '168.23', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('John Kerby', '', 'Cerda', '128790014567', 'cerda.johnkerby@ici.edu.ph', 9956712354, '$2y$10$u08VPf.2qwoU8ttf.XCZ/ugjxMZgbzpn40sv3bqgTEJAPyttNkJ/G', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS1', '2022-2023', 0, 'Tambo, Iligan City', '2004-02-14', 'Tambo, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '156.45', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Jessa', '', 'Mabao', '128790098848', 'mabao.jessa@gmail.com', 9676586997, '$2y$10$uYe5jDzRz3FKwjW3IExVOeYotg3Z6.ac699ziKeMr7btAEDrY2a56', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.ABM2', '2022-2023', 0, 'Abuno, Iligan City', '2005-07-08', 'Abuno, Iligan City', 'Female', 'Others', 'Divorced', 'Roman catholic', '147.78', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Desiree Jane', 'Lopez', 'Sombol', '128904200560', 'sombol.desireejane@ici.edu.ph', 9307622904, '$2y$10$6uT1BsrPRtTqaNC.3dhdeOjsAGOpDp901862jIvNCUdL1w/jBLMki', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS1', '2022-2023', 0, 'Hinaplanon, Iligan City', '2005-12-31', 'Iligan City', 'Female', 'Filipino', 'Single', 'Roman caatholic', '150', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Approved', '2023-05-22'),
('Jhemel', '', 'Cabtalan', '129765123456', 'cabtalan.jhemel@gmail.com', 9678675448, '$2y$10$QlgGKfICJlNLzWpLCoCkYe7Q7vs3WXD0JPL8B2SOZJVLbh9LBL7Bu', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.EIM1', '2022-2023', 0, 'Villaverde, Iligan City', '2003-01-04', 'Villaverde, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '157.87', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Chrisronan', 'Chavez', 'Lucea', '305300110683', 'lucea.chrisronan@ici.edu.ph', 9558005795, '$2y$10$7Eq3yiDp/IOOkIvPCyTOkOdtz1yJ2pEnqUTsws42eaH7NjjIq5rlC', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.STEM1', '2022-2023', 0, 'Acmac, Iligan City', '1998-07-15', 'Acmac, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '152.4', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Lynn Joza', 'Bangot', 'Bangquiao', '434565436365', 'banquiao.lynnjoza@ici.edu.ph', 9354753131, '$2y$10$lQmda34NK8WtudHmuOJxveG2bWbzDvw2pQ9AKJjW0wmbJywlBFzye', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.ABM2', '2021-2022', 0, 'Dalipuga, Iligan City', '2005-06-09', 'Saray, Iligan City', 'Female', 'Filipino', 'Single', 'Roman catholic', '165.11', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Jay', 'Bohol', 'Catipay', '463000011113', 'catipay.jay@gmail.com', 9678563456, '$2y$10$PE8KVCjH9rXsbthls0QHWO7xMwSQx7ajvvUg17Ota.SVPSv94s9UW', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.ABM2', '2021-2022', 0, 'Tibanga, Iligan City', '2003-05-23', 'Tibanga, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '154.34', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('Ralph Vin Joe', 'Jabagat', 'Oliveros', '463009150259', 'oliveros.ralphvinjoe@ici.edu.ph', 9358887520, '$2y$10$LLzkwKcH2//DvrGKHmOh/eFzczQGix9NKmiRUWaAgnyvXBc0Eo0fa', 'Iligan Computer Institute, Inc.', '678234', '2345678', 'G12.IT3', '2022-2023', 80, 'Tag-ibo, Iligan City', '2005-02-03', 'Tag-ibo, Iligan City', 'Male', '', 'Single', 'Roman catholic', '172', '', '', '', '', '', '', '', '', '', '', 'Mon, Tue, Wed', '2023-05-29', 'Not Yet Started', 'Approved', '2023-05-22'),
('Matt', '', 'Leyson', '463900012345', 'leyson.matt@gmail.com', 9356789657, '$2y$10$q7ihp2WBvcv5rRnIHBzW7ekM4M38DSCvv52.32u1jf7QbNE7PPznq', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.HMSS1', '2022-2023', 0, 'Tibanga, Iligan City', '2003-09-10', 'Tibanga, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '156.10', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22'),
('John Kerby', '', 'Cerda', '546478435322', 'cerda.kerby@ici.edu.ph', 9454665465, '$2y$10$bBaFR7mmPVlQTqw66Eb3wOjNd.B99Qt6vtV3IPIgZp8gO0luUapOG', 'Iligan Computer Institute, Inc.', '', '2345678', 'G12.EIM1', '2021-2022', 0, 'Tambo, Iligan City', '2005-09-05', 'Tambo, Iligan City', 'Male', 'Filipino', 'Single', 'Roman catholic', '165.12', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', 'Not Yet Started', 'Pending', '2023-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_block`
--

CREATE TABLE `student_block` (
  `student_block` varchar(40) NOT NULL,
  `block_desc` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
