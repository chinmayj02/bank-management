-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2022 at 11:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_type` enum('SAVINGS','SALARY','CURRENT','FD','RD','NRI') NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `acc_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_type`, `ifsc`, `cin`, `acc_no`) VALUES
('SAVINGS', 'DBMB0001164', 101, 123412341),
('SAVINGS', 'DBMB0001164', 102, 123412342),
('SAVINGS', 'DBMB0001164', 103, 123412343),
('SAVINGS', 'DBMB0001164', 104, 123412344),
('SAVINGS', 'DBMB0001164', 105, 123412345),
('SAVINGS', 'DBMB0001164', 106, 123412346),
('SAVINGS', 'DBMB0001164', 107, 123412347),
('SAVINGS', 'DBMB0001164', 108, 123412348),
('SAVINGS', 'DBMB0001164', 109, 123412349),
('SAVINGS', 'DBMB0001164', 110, 123412350),
('SAVINGS', 'DBMB0001164', 111, 123412351),
('SAVINGS', 'DBMB0001164', 112, 123412352),
('SAVINGS', 'DBMB0001164', 113, 123412353),
('SAVINGS', 'DBMB0001164', 114, 123412354),
('SAVINGS', 'DBMB0001164', 115, 123412355),
('SAVINGS', 'DBMB0001164', 116, 123412356),
('SAVINGS', 'DBMB0001164', 117, 123412357),
('SAVINGS', 'DBMB0001164', 118, 123412358),
('SAVINGS', 'DBMB0001164', 119, 123412359),
('SAVINGS', 'DBMB0001164', 120, 123412360),
('SAVINGS', 'DBMB0001164', 121, 123412361),
('SAVINGS', 'DBMB0001164', 122, 123412362),
('SAVINGS', 'DBMB0001164', 123, 123412363),
('SAVINGS', 'DBMB0001164', 124, 123412364),
('SAVINGS', 'DBMB0001164', 125, 123412365),
('SAVINGS', 'DBMB0001164', 126, 123412366),
('SAVINGS', 'DBMB0001164', 127, 123412367),
('SAVINGS', 'DBMB0001164', 128, 123412368),
('SAVINGS', 'DBMB0001164', 129, 123412369),
('SAVINGS', 'DBMB0001164', 130, 123412370);

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `acc_no` int(11) NOT NULL,
  `balance` float NOT NULL DEFAULT 0,
  `acc_open_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`acc_no`, `balance`, `acc_open_date`) VALUES
(123412341, 700000, '2011-12-22'),
(123412342, 704000, '2011-12-22'),
(123412343, 708000, '2011-12-22'),
(123412344, 712000, '2011-12-22'),
(123412345, 716000, '2011-12-22'),
(123412346, 720000, '2011-12-22'),
(123412347, 724000, '2011-12-22'),
(123412348, 728000, '2011-12-22'),
(123412349, 732000, '2011-12-22'),
(123412350, 736000, '2011-12-22'),
(123412351, 740000, '2011-12-22'),
(123412352, 744000, '2011-12-22'),
(123412353, 748000, '2011-12-22'),
(123412354, 752000, '2011-12-22'),
(123412355, 756000, '2011-12-22'),
(123412356, 760000, '2011-12-22'),
(123412357, 764000, '2011-12-22'),
(123412358, 768000, '2011-12-22'),
(123412359, 772000, '2011-12-22'),
(123412360, 776000, '2011-12-22'),
(123412361, 780000, '2011-12-22'),
(123412362, 784000, '2011-12-22'),
(123412363, 788000, '2011-12-22'),
(123412364, 792000, '2011-12-22'),
(123412365, 796000, '2011-12-22'),
(123412366, 800000, '2011-12-22'),
(123412367, 804000, '2011-12-22'),
(123412368, 808000, '2011-12-22'),
(123412369, 812000, '2011-12-22'),
(123412370, 816000, '2011-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ifsc` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `manager_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ifsc`, `address`, `phone_number`, `email`, `manager_id`) VALUES
('00000000000', 'N/A', 'N/A', 'N/A', 0),
('DBMB0001164', 'Farooqui Mansion,Ponda Belgaum Road, Ponda 403401, Goa', '918322313224', 'dbms@ponda.com', 1),
('DBMB0001165', 'NEAR MUNCIPAL MARKET P B NO 143 GOA 403 802', '918322313224', 'dbms@vasco.com', 2),
('DBMB0001166', 'MATHIAS PLAZA, 18TH JUNE ROAD, PANAJI 403 001 GOA', '918322313225', 'dbms@panjim.com', 3),
('DBMB0001167', 'POST BOX NO 500 KAMATH HOUSE MARGAO GOA 403 601', '918322313226', 'dbms@margao.com', 4),
('DBMB0001168', 'CANARA BANK 167 3 WARD NO 10 SINAN COMPLEX THANA ROAD VOLPOI SATTERI VOLPOI GOA', '918322313227', 'dbms@valpoi.com', 5),
('DBMB0001169', 'MATHIAS PLAZA, 18TH JUNE ROAD, MIRAMAR 403 001 GOA', '918322313228', 'dbms@miramar.com', 6),
('DBMB0001170', '1ST FLOOR, THAWAR APARTMENT, OPP-HEENA BUILDING, MAIN CARTER ROAD, BORIVILI EAST, MUMBAI-400066', '918322313229', 'dbms@mumbai.com', 7),
('DBMB0001171', 'PLOT NO.15A, SECTOR-7, DWARKA, DELHI - 110075', '918322313230', 'dbms@delhi.com', 8),
('DBMB0001172', 'P.B.NO. 414, PLOT 35,, NEAR CIRCLE CINEMA, OLD AGRA ROAD, NASIK - 422002', '918322313231', 'dbms@nasik.com', 9),
('DBMB0001173', '1255 MAHATMA PHULE PATH TELI ALI 415612', '918322313232', 'dbms@ratnagiri.com', 10),
('DBMB0001174', 'CANARA BANK, SHAKUNTALA COMPLEX, OPPOSITE HIGH COURT ROAD, JANIPUR,JAMMU', '918322313233', 'dbms@j&k.com', 0),
('DBMB0001175', 'PB NO.4101, NARAYAN CHAMBERS NEAR NEHRUBRIDGE, ASHRAM RD AHMEDABAD-380009', '918322313234', 'dbms@ahemdabad.com', 12),
('DBMB0001176', 'CS NO 1446 C WARD NEAR SHAHU MAHARAJ STATUE DASARA CHOWK LAXMIPUR KOLHAPUR 416002', '918322313235', 'dbms@kolhapur.com', 13),
('DBMB0001177', 'DEVNIKAR NIWAS, 107123, , OLD KAPAD LANE, LATUR ,MAHARASHTRA - 413 512', '918322313236', 'dbms@latur.com', 14),
('DBMB0001178', 'SHOP NO 5 6 AND 7 NEELKANTH RESIDENCY DAMAN VAPI MAIN ROAD KHARIWAD DAMAN DAMAN AND DIU 396210', '918322313237', 'dbms@daman.com', 15),
('DBMB0001179', 'LOYA BUILDING, NEAR TREASURY OFFICE, ALONG, DIST WEST SIANG', '918322313238', 'dbms@arunachal.com', 16),
('DBMB0001180', 'CHANDRASEKHAR AZAD MARKET 1 FLOOR CIVIL LINES ALLAHABAD 211 001', '918322313239', 'dbms@up.com', 17),
('DBMB0001181', 'Sixth Avenue & 42nd Street,Manhattan, New York 10036', '918322313240', 'dbms@usa.com', 18),
('DBMB0001182', '525 Collins St, Melbourne VIC 3000, Australia', '918322313241', 'dbms@aus.com', 19),
('DBMB0001183', '525 Collins St, Queen street VIC 3000, London', '918322313242', 'dbms@uk.com', 20),
('DBMB0001184', 'Plot 37/43 Kampala Road, Kampala', '918322313243', 'dbms@uganda.com', 21),
('DBMB0001185', 'SM 02, The Atrium Centre, Bank Street,Dubai', '918322313244', 'dbms@uae.com', 22),
('DBMB0001186', 'SM 02, The Atrium Centre, Bank Street,Saudi Arabia', '918322313245', 'dbms@saudi.com', 23);

-- --------------------------------------------------------

--
-- Stand-in structure for view `branch_customers`
-- (See below for the actual view)
--
CREATE TABLE `branch_customers` (
`cin` int(11)
,`ifsc` varchar(11)
,`acc_no` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `acc_no` int(11) NOT NULL,
  `card_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `card_no` int(11) NOT NULL,
  `card_type` enum('CREDIT','DEBIT') NOT NULL DEFAULT 'DEBIT',
  `issue_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `pin` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_branches`
-- (See below for the actual view)
--
CREATE TABLE `count_branches` (
`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_customer`
-- (See below for the actual view)
--
CREATE TABLE `count_customer` (
`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `count_employee`
-- (See below for the actual view)
--
CREATE TABLE `count_employee` (
`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cin` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('F','M','O') DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pan` varchar(10) DEFAULT NULL,
  `aadhaar` varchar(12) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'uploads/images/profile-pic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cin`, `fname`, `mname`, `lname`, `dob`, `gender`, `address`, `phone_number`, `email`, `pan`, `aadhaar`, `profile_pic`) VALUES
(101, 'Mahdi', 'Riley', 'Melendez', '1983-12-26', 'M', 'Porthgain, St Andrews Road, Littlestone,TN28 8PD', '+919527014919', 'example@dbms.com', 'ABCTY1234D', '265385644663', 'uploads/images/profile-pic.png'),
(102, 'Bogdana', 'Nevin', 'Crawford', '1993-09-12', 'M', '36 Kirkwood Way, Leeds,LS16 7EX', '+919527014920', 'example@dbms.com', 'ABCTY1235D', '265485644664', 'uploads/images/profile-pic.png'),
(103, 'Gevorg', 'Noel', 'Cabrera', '1983-12-26', 'M', '33 Bridgewater House, Bridgewater Wharf, Droylsden,M43 7FW', '+919527014921', 'example@dbms.com', 'ABCTY1236D', '265585644665', 'uploads/images/profile-pic.png'),
(104, 'Kristina', 'Abe', 'Shannon', '1983-12-26', 'F', '23 Dale Park Avenue, Carshalton,SM5 2ES', '+919527014922', 'example@dbms.com', 'ABCTY1237D', '265685644666', 'uploads/images/profile-pic.png'),
(105, 'Timothea', 'Kate', 'Parker', '1995-07-09', 'M', '7 Pound Close, Burrington,EX37 9JD', '+919527014923', 'example@dbms.com', 'ABCTY1237E', '265785644667', 'uploads/images/profile-pic.png'),
(106, 'Jóhann', 'Rhett', 'Kirk', '1996-02-09', 'M', '29 Penningtons, Bishop\'s Stortford,CM23 4LE', '+919527014924', 'example@dbms.com', 'ABCTY1238D', '265885644668', 'uploads/images/profile-pic.png'),
(107, 'Nilo', 'Joanna', 'Combs', '1983-12-26', 'M', '1 Chapel Terrace, Criccieth,LL52 0AB', '+919527014925', 'example@dbms.com', 'ABCTY1239D', '265985644669', 'uploads/images/profile-pic.png'),
(108, 'Jadyn', 'Zane', 'Schmitt', '1983-12-26', 'M', 'Flat 6, Shirley Court, 1 Uxbridge Road, Hanwell,W7 3PS', '+919527014926', 'example@dbms.com', 'ABCTY1240D', '266085644670', 'uploads/images/profile-pic.png'),
(109, 'Lilianna', 'Vivian', 'Alvarez', '1998-08-02', 'F', '107 Ridgway Road, Luton,LU2 7RS', '+919527014927', 'example@dbms.com', 'ABCTY1241D', '266185644671', 'uploads/images/profile-pic.png'),
(110, 'Malia', 'Lydon', 'Cooper', '1983-12-26', 'F', '2 Rogerson Terrace, Newcastle Upon Tyne,NE5 5PN', '+919527014928', 'example@dbms.com', 'ABCTY1242D', '266285644672', 'uploads/images/profile-pic.png'),
(111, 'Martina', 'Oscar', 'Mcdowell', '1983-12-26', 'F', '6 Rhydlanfair, Llangybi,SA48 8NA', '+919527014929', 'example@dbms.com', 'ABCTY1243D', '266385644673', 'uploads/images/profile-pic.png'),
(112, 'Noyabrina', 'Grant', 'Walker', '2066-01-01', 'F', 'Ponda goa', '+919527014930', 'example@dbms.com', 'ABCTY1244D', '266485644674', 'uploads/images/profile-pic.png'),
(113, 'Higini', 'Mahdi', 'Melendez', '1983-12-26', 'F', 'Porthgain, St Andrews Road, Littlestone,TN28 8PD', '+919527014931', 'example@dbms.com', 'ABCTY1245D', '266585644675', 'uploads/images/profile-pic.png'),
(114, 'Quinten', 'Bogdana', 'Crawford', '1993-09-12', 'M', '36 Kirkwood Way, Leeds,LS16 7EX', '+919527014932', 'example@dbms.com', 'ABCTY1246D', '266685644676', 'uploads/images/profile-pic.png'),
(115, 'Irmina', 'Gevorg', 'Cabrera', '1983-12-26', 'F', '33 Bridgewater House, Bridgewater Wharf, Droylsden,M43 7FW', '+919527014933', 'example@dbms.com', 'ABCTY1247D', '266785644677', 'uploads/images/profile-pic.png'),
(116, 'Gargi', 'Kristina', 'Shannon', '1983-12-26', 'F', '23 Dale Park Avenue, Carshalton,SM5 2ES', '+919527014934', 'example@dbms.com', 'ABCTY1248D', '266885644678', 'uploads/images/profile-pic.png'),
(117, 'Lígia', 'Timothea', 'Parker', '1995-07-09', 'M', '7 Pound Close, Burrington,EX37 9JD', '+919527014935', 'example@dbms.com', 'ABCTY1249D', '266985644679', 'uploads/images/profile-pic.png'),
(118, 'Ilu', 'Jóhann', 'Kirk', '1996-02-09', 'M', '29 Penningtons, Bishop\'s Stortford,CM23 4LE', '+919527014936', 'example@dbms.com', 'ABCTY1250D', '267085644680', 'uploads/images/profile-pic.png'),
(119, 'Pelle', 'Nilo', 'Combs', '1983-12-26', 'M', '1 Chapel Terrace, Criccieth,LL52 0AB', '+919527014937', 'example@dbms.com', 'ABCTY1251D', '267185644681', 'uploads/images/profile-pic.png'),
(120, 'Sharif', 'Jadyn', 'Schmitt', '1983-12-26', 'M', 'Flat 6, Shirley Court, 1 Uxbridge Road, Hanwell,W7 3PS', '+919527014938', 'example@dbms.com', 'ABCTY1252D', '267285644682', 'uploads/images/profile-pic.png'),
(121, 'Hall', 'Lilianna', 'Alvarez', '1998-08-02', 'M', '107 Ridgway Road, Luton,LU2 7RS', '+919527014939', 'example@dbms.com', 'ABCTY1253D', '267385644683', 'uploads/images/profile-pic.png'),
(122, 'Gabby', 'Malia', 'Cooper', '1983-12-26', 'F', '2 Rogerson Terrace, Newcastle Upon Tyne,NE5 5PN', '+919527014940', 'example@dbms.com', 'ABCTY1254D', '267485644684', 'uploads/images/profile-pic.png'),
(123, 'Sara', 'Martina', 'Mcdowell', '1983-12-26', 'F', '6 Rhydlanfair, Llangybi,SA48 8NA', '+919527014941', 'example@dbms.com', 'ABCTY1255D', '267585644685', 'uploads/images/profile-pic.png'),
(124, 'Zuleima', 'Noyabrina', 'Walker', '1983-12-26', 'F', 'Ponda goa', '+919527014942', 'example@dbms.com', 'ABCTY1256D', '267685644686', 'uploads/images/profile-pic.png'),
(125, 'Efthimia', 'Riley', 'Melendez', '1993-09-12', 'F', 'Porthgain, St Andrews Road, Littlestone,TN28 8PD', '+919527014943', 'example@dbms.com', 'ABCTY1257D', '267785644687', 'uploads/images/profile-pic.png'),
(126, 'Dale', 'Nevin', 'Crawford', '1983-12-26', 'M', '36 Kirkwood Way, Leeds,LS16 7EX', '+919527014944', 'example@dbms.com', 'ABCTY1258D', '267885644688', 'uploads/images/profile-pic.png'),
(127, 'Madhuri', 'Noel', 'Cabrera', '1983-12-26', 'F', '33 Bridgewater House, Bridgewater Wharf, Droylsden,M43 7FW', '+919527014945', 'example@dbms.com', 'ABCTY1259D', '267985644689', 'uploads/images/profile-pic.png'),
(128, 'Ken\'ichi', 'Abe', 'Shannon', '1995-07-09', 'M', '23 Dale Park Avenue, Carshalton,SM5 2ES', '+919527014946', 'example@dbms.com', 'ABCTY1260D', '268085644690', 'uploads/images/profile-pic.png'),
(129, 'Tibor', 'Kate', 'Parker', '1996-02-09', 'M', '7 Pound Close, Burrington,EX37 9JD', '+919527014947', 'example@dbms.com', 'ABCTY1261D', '268185644691', 'uploads/images/profile-pic.png'),
(130, 'Aditya', 'Rhett', 'Kirk', '1983-12-26', 'M', '29 Penningtons, Bishop\'s Stortford,CM23 4LE', '+919527014948', 'example@dbms.com', 'ABCTY1262D', '268285644692', 'uploads/images/profile-pic.png');

-- --------------------------------------------------------

--
-- Table structure for table `cust_credentials`
--

CREATE TABLE `cust_credentials` (
  `cin` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cust_credentials`
--

INSERT INTO `cust_credentials` (`cin`, `password`) VALUES
(130, '34819d7beeabb9260a5c854bc85b3e44');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('F','M','O') DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `blood_grp` varchar(4) DEFAULT 'NA',
  `designation` varchar(20) NOT NULL,
  `salary` float NOT NULL,
  `doj` date DEFAULT NULL,
  `branch_id` varchar(11) NOT NULL,
  `profile_pic` varchar(255) DEFAULT 'uploads/images/profile-pic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `fname`, `mname`, `lname`, `dob`, `gender`, `address`, `phone_number`, `email`, `blood_grp`, `designation`, `salary`, `doj`, `branch_id`, `profile_pic`) VALUES
(0, 'super', NULL, 'admin', '2000-01-01', NULL, 'N/A', 'N/A', 'root@dbms.com', 'NA', 'superadmin', 0, NULL, '00000000000', 'uploads/images/profile-pic.png'),
(1, 'Chinmay', 'Umesh', 'Joshi', '2007-05-02', 'M', 'Flat RT6, Fonseca Arcade,Tisk, Ponda Goa,403401', '+919527014907', 'chinmayjoshi5702@gmail.com', 'NA', 'Manager', 70000, '2011-01-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(2, 'Dominique', 'Apollo', 'Hickman', '2067-12-03', 'F', '124 East Lea, Newbiggin-By-The-Sea,NE64 6BJ', '+919527014908', 'dominique@gmail.com', 'NA', 'Manager', 75000, '2011-02-22', 'DBMB0001165', 'uploads/images/profile-pic.png'),
(3, 'Miriam', 'Carlen', 'Hatfield', '2069-04-11', 'F', 'Rose Cottage, Kings Lane, Broom,B50 4HB', '+919527014909', 'miriam@gmail.com', 'NA', 'Manager', 80000, '2011-03-22', 'DBMB0001166', 'uploads/images/profile-pic.png'),
(4, 'Laci', 'Imogen', 'Skinner', '1974-05-01', 'F', 'Oak Ridge, Gardeners Lane, East Wellow,SO51 6AD', '+919527014910', 'laci@gmail.com', 'NA', 'Manager', 85000, '2011-04-22', 'DBMB0001167', 'uploads/images/profile-pic.png'),
(5, 'Madilyn', 'Berlynn', 'Spence', '1974-05-01', 'F', '41 Heath Green Road, Birmingham,B18 4ET', '+919527014911', 'madilyn@gmail.com', 'NA', 'Manager', 90000, '2011-05-22', 'DBMB0001168', 'uploads/images/profile-pic.png'),
(6, 'Natalia', 'Joseph', 'Castro', '1976-11-11', 'F', '9 Silks Way, Andover,SP11 6UU', '+919527014912', 'natalia@gmail.com', 'NA', 'Manager', 95000, '2011-06-22', 'DBMB0001169', 'uploads/images/profile-pic.png'),
(7, 'Quinn', 'Rose', 'Graves', '1978-04-13', 'F', 'Page Bank Lodge, Page Bank,DL16 7RD', '+919527014913', 'quinn@gmail.com', 'NA', 'Manager', 100000, '2011-07-22', 'DBMB0001170', 'uploads/images/profile-pic.png'),
(8, 'Rylie', 'Orlando', 'Ferguson', '1979-09-09', 'F', 'School House, Great Munden,SG11 1HQ', '+919527014914', 'rylie@gmail.com', 'NA', 'Manager', 105000, '2011-08-22', 'DBMB0001171', 'uploads/images/profile-pic.png'),
(9, 'Carleigh', 'Grant', 'Garcia', '1981-09-04', 'F', 'The Bungalow, Holloway Farm, Milton Common,OX33 1GX', '+919527014915', 'carleigh@gmail.com', 'NA', 'Manager', 110000, '2011-09-22', 'DBMB0001172', 'uploads/images/profile-pic.png'),
(12, 'Piper', 'Zion', 'Avery', '1983-12-26', 'F', '3 Dane Mews, Sale,M33 6HF', '+919527014918', 'piper@gmail.com', 'NA', 'Manager', 125000, '2011-12-22', 'DBMB0001175', 'uploads/images/profile-pic.png'),
(13, 'Zariah', 'Riley', 'Melendez', '1983-12-26', 'F', 'Porthgain, St Andrews Road, Littlestone,TN28 8PD', '+919527014919', 'zariah@gmail.com', 'NA', 'Manager', 130000, '2011-01-22', 'DBMB0001176', 'uploads/images/profile-pic.png'),
(14, 'Beau', 'Nevin', 'Crawford', '1993-09-12', 'M', '36 Kirkwood Way, Leeds,LS16 7EX', '+919527014920', 'beau@gmail.com', 'NA', 'Manager', 135000, '2011-02-22', 'DBMB0001177', 'uploads/images/profile-pic.png'),
(15, 'Alberto', 'Noel', 'Cabrera', '1983-12-26', 'M', '33 Bridgewater House, Bridgewater Wharf, Droylsden,M43 7FW', '+919527014921', 'alberto@gmail.com', 'NA', 'Manager', 140000, '2011-03-22', 'DBMB0001178', 'uploads/images/profile-pic.png'),
(16, 'Valentin', 'Abe', 'Shannon', '1983-12-26', 'M', '23 Dale Park Avenue, Carshalton,SM5 2ES', '+919527014922', 'valentin@gmail.com', 'NA', 'Manager', 145000, '2011-04-22', 'DBMB0001179', 'uploads/images/profile-pic.png'),
(17, 'Clay', 'Kate', 'Parker', '1995-07-09', 'M', '7 Pound Close, Burrington,EX37 9JD', '+919527014923', 'clay@gmail.com', 'NA', 'Manager', 150000, '2011-05-22', 'DBMB0001180', 'uploads/images/profile-pic.png'),
(18, 'Tristen', 'Rhett', 'Kirk', '1996-02-09', 'M', '29 Penningtons, Bishop\'s Stortford,CM23 4LE', '+919527014924', 'tristen@gmail.com', 'NA', 'Manager', 155000, '2011-06-22', 'DBMB0001181', 'uploads/images/profile-pic.png'),
(19, 'Milton', 'Joanna', 'Combs', '1983-12-26', 'M', '1 Chapel Terrace, Criccieth,LL52 0AB', '+919527014925', 'milton@gmail.com', 'NA', 'Manager', 160000, '2011-07-22', 'DBMB0001182', 'uploads/images/profile-pic.png'),
(20, 'Zayne', 'Zane', 'Schmitt', '1983-12-26', 'M', 'Flat 6, Shirley Court, 1 Uxbridge Road, Hanwell,W7 3PS', '+919527014926', 'zayne@gmail.com', 'NA', 'Manager', 165000, '2011-08-22', 'DBMB0001183', 'uploads/images/profile-pic.png'),
(21, 'Wyatt', 'Vivian', 'Alvarez', '1998-08-02', 'M', '107 Ridgway Road, Luton,LU2 7RS', '+919527014927', 'wyatt@gmail.com', 'NA', 'Manager', 170000, '2011-09-22', 'DBMB0001184', 'uploads/images/profile-pic.png'),
(22, 'Josh', 'Lydon', 'Cooper', '1983-12-26', 'M', '2 Rogerson Terrace, Newcastle Upon Tyne,NE5 5PN', '+919527014928', 'josh@gmail.com', 'NA', 'Manager', 175000, '2011-10-22', 'DBMB0001185', 'uploads/images/profile-pic.png'),
(23, 'Elliott', 'Oscar', 'Mcdowell', '1983-12-26', 'M', '6 Rhydlanfair, Llangybi,SA48 8NA', '+919527014929', 'elliott@gmail.com', 'NA', 'Manager', 180000, '2011-11-22', 'DBMB0001186', 'uploads/images/profile-pic.png'),
(24, 'Alex', 'Grant', 'Walker', '2066-01-01', 'M', 'Ponda goa', '+919527014930', 'alex@gmail.com', 'NA', 'Teller', 60000, '2011-12-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(25, 'Zariah', 'Riley', 'Melendez', '1983-12-26', 'F', 'Porthgain, St Andrews Road, Littlestone,TN28 8PD', '+919527014919', 'zariah.01@gmail.com', 'NA', 'Cashier', 130000, '2011-01-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(28, 'Valentin', 'Abe', 'Shannon', '1983-12-26', 'M', '23 Dale Park Avenue, Carshalton,SM5 2ES', '+919527014922', 'valentin.01@gmail.com', 'NA', 'Auditor', 145000, '2011-04-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(29, 'Clay', 'Kate', 'Parker', '1995-07-09', 'M', '7 Pound Close, Burrington,EX37 9JD', '+919527014923', 'clay.01@gmail.com', 'NA', 'Loan Officer', 150000, '2011-05-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(30, 'Tristen', 'Rhett', 'Kirk', '1996-02-09', 'M', '29 Penningtons, Bishop\'s Stortford,CM23 4LE', '+919527014924', 'tristen.01@gmail.com', 'NA', 'Cashier', 155000, '2011-06-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(31, 'Milton', 'Joanna', 'Combs', '1983-12-26', 'M', '1 Chapel Terrace, Criccieth,LL52 0AB', '+919527014925', 'milton.01@gmail.com', 'NA', 'Receptionist', 160000, '2011-07-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(32, 'Zayne', 'Zane', 'Schmitt', '1983-12-26', 'M', 'Flat 6, Shirley Court, 1 Uxbridge Road, Hanwell,W7 3PS', '+919527014926', 'zayne.01@gmail.com', 'NA', 'Marketing', 165000, '2011-08-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(34, 'Josh', 'Lydon', 'Cooper', '1983-12-26', 'M', '2 Rogerson Terrace, Newcastle Upon Tyne,NE5 5PN', '+919527014928', 'josh.01@gmail.com', 'NA', 'Loan Officer', 175000, '2011-10-22', 'DBMB0001164', 'uploads/images/profile-pic.png'),
(35, 'Elliott', 'Oscar', 'Mcdowell', '1983-12-26', 'M', '6 Rhydlanfair, Llangybi,SA48 8NA', '+919527014929', 'elliott.01@gmail.com', 'NA', 'Cashier', 180000, '2011-11-22', 'DBMB0001164', 'uploads/images/profile-pic.png');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `after_employee_removal` AFTER DELETE ON `employee` FOR EACH ROW BEGIN
INSERT INTO employee_deletion_history(emp_id,fname,mname,lname,dob,gender,address,phone_number,email,blood_grp,designation,salary,doj,branch_id)
VALUES(old.emp_id,old.fname,old.mname,old.lname,old.dob,old.gender,old.address,old.phone_number,old.email,old.blood_grp,old.designation,old.salary,old.doj,old.branch_id);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_deletion_history`
--

CREATE TABLE `employee_deletion_history` (
  `emp_id` int(11) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `mname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('F','M','O') DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `blood_grp` varchar(4) DEFAULT 'NA',
  `designation` varchar(20) NOT NULL,
  `salary` float NOT NULL,
  `doj` date DEFAULT NULL,
  `branch_id` varchar(11) CHARACTER SET utf8 NOT NULL,
  `delete_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_deletion_history`
--

INSERT INTO `employee_deletion_history` (`emp_id`, `fname`, `mname`, `lname`, `dob`, `gender`, `address`, `phone_number`, `email`, `blood_grp`, `designation`, `salary`, `doj`, `branch_id`, `delete_date`) VALUES
(11, 'Jordyn', 'Kai', 'Boyd', '1984-04-12', 'F', 'Bay Lodge Cottage, 99 Mill Lane, Danbury,CM3 4HX', '+919527014917', 'jordyn@gmail.com', 'NA', 'Manager', 120000, '2011-11-22', 'DBMB0001174', '2022-11-22'),
(26, 'Beau', 'Nevin', 'Crawford', '1993-09-12', 'M', '36 Kirkwood Way, Leeds,LS16 7EX', '+919527014920', 'beau.01@gmail.com', 'NA', 'Receptionist', 135000, '2011-02-22', 'DBMB0001164', '2022-11-23'),
(27, 'Alberto', 'Noel', 'Cabrera', '1983-12-26', 'M', '33 Bridgewater House, Bridgewater Wharf, Droylsden,M43 7FW', '+919527014921', 'alberto.01@gmail.com', 'NA', 'Marketing', 140000, '2011-03-22', 'DBMB0001164', '2022-12-13'),
(33, 'Wyatt', 'Vivian', 'Alvarez', '1998-08-02', 'M', '107 Ridgway Road, Luton,LU2 7RS', '+919527014927', 'wyatt.01@gmail.com', 'NA', 'Auditor', 170000, '2011-09-22', 'DBMB0001164', '2022-12-13'),
(36, 'Alex', 'Grant', 'Walker', '2066-01-01', 'M', 'Ponda goa', '+919527014930', 'alex.01@gmail.com', 'NA', 'Receptionist', 60000, '2011-12-22', 'DBMB0001164', '2022-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `emp_credentials`
--

CREATE TABLE `emp_credentials` (
  `emp_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emp_credentials`
--

INSERT INTO `emp_credentials` (`emp_id`, `password`) VALUES
(0, '63a9f0ea7bb98050796b649e85481845'),
(1, '34819d7beeabb9260a5c854bc85b3e44'),
(2, '34819d7beeabb9260a5c854bc85b3e44'),
(3, '34819d7beeabb9260a5c854bc85b3e44'),
(4, '34819d7beeabb9260a5c854bc85b3e44'),
(5, '34819d7beeabb9260a5c854bc85b3e44'),
(6, '34819d7beeabb9260a5c854bc85b3e44'),
(7, '34819d7beeabb9260a5c854bc85b3e44'),
(8, '34819d7beeabb9260a5c854bc85b3e44'),
(9, '34819d7beeabb9260a5c854bc85b3e44'),
(10, '34819d7beeabb9260a5c854bc85b3e44'),
(12, '34819d7beeabb9260a5c854bc85b3e44'),
(13, '34819d7beeabb9260a5c854bc85b3e44'),
(14, '34819d7beeabb9260a5c854bc85b3e44'),
(15, '34819d7beeabb9260a5c854bc85b3e44'),
(16, '34819d7beeabb9260a5c854bc85b3e44'),
(17, '34819d7beeabb9260a5c854bc85b3e44'),
(18, '34819d7beeabb9260a5c854bc85b3e44'),
(19, '34819d7beeabb9260a5c854bc85b3e44'),
(20, '34819d7beeabb9260a5c854bc85b3e44'),
(21, '34819d7beeabb9260a5c854bc85b3e44'),
(22, '34819d7beeabb9260a5c854bc85b3e44'),
(23, '34819d7beeabb9260a5c854bc85b3e44'),
(24, '34819d7beeabb9260a5c854bc85b3e44'),
(25, '34819d7beeabb9260a5c854bc85b3e44'),
(28, '34819d7beeabb9260a5c854bc85b3e44'),
(29, '34819d7beeabb9260a5c854bc85b3e44'),
(30, '34819d7beeabb9260a5c854bc85b3e44'),
(31, '34819d7beeabb9260a5c854bc85b3e44'),
(32, '34819d7beeabb9260a5c854bc85b3e44'),
(34, '34819d7beeabb9260a5c854bc85b3e44'),
(35, '34819d7beeabb9260a5c854bc85b3e44');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `loan_type` enum('HOME','PERSONAL','LAP','GOLD','VEHICLE','EDUCATION') NOT NULL,
  `issue_date` date NOT NULL,
  `amount` float NOT NULL,
  `cin` int(11) NOT NULL,
  `ifsc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `emp_id` int(11) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_history`
--

INSERT INTO `login_history` (`emp_id`, `time_stamp`) VALUES
(1, '2022-11-19 18:48:50'),
(1, '2022-11-19 18:49:23'),
(1, '2022-11-19 18:51:11'),
(1, '2022-11-19 18:52:26'),
(1, '2022-11-19 18:54:41'),
(1, '2022-11-19 18:55:21'),
(1, '2022-11-19 18:56:56'),
(1, '2022-11-19 18:58:03'),
(1, '2022-11-19 19:06:08'),
(1, '2022-11-20 05:40:03'),
(1, '2022-11-20 06:03:15'),
(1, '2022-11-20 06:03:35'),
(1, '2022-11-20 09:21:14'),
(1, '2022-11-20 09:44:36'),
(1, '2022-11-20 12:41:57'),
(1, '2022-11-20 12:44:04'),
(1, '2022-11-20 12:44:45'),
(1, '2022-11-20 12:45:56'),
(1, '2022-11-20 12:47:43'),
(1, '2022-11-20 12:48:21'),
(24, '2022-11-20 13:41:30'),
(24, '2022-11-20 13:42:40'),
(1, '2022-11-20 13:43:12'),
(1, '2022-11-20 13:43:22'),
(24, '2022-11-20 13:46:48'),
(1, '2022-11-20 13:47:12'),
(1, '2022-11-20 13:47:58'),
(1, '2022-11-20 13:48:25'),
(1, '2022-11-20 13:48:48'),
(1, '2022-11-20 13:49:37'),
(1, '2022-11-20 13:50:25'),
(1, '2022-11-20 13:50:54'),
(1, '2022-11-20 13:51:36'),
(1, '2022-11-20 13:51:57'),
(1, '2022-11-20 13:52:33'),
(1, '2022-11-20 13:52:54'),
(24, '2022-11-20 13:53:05'),
(1, '2022-11-20 13:53:25'),
(24, '2022-11-20 13:53:43'),
(24, '2022-11-20 13:56:02'),
(1, '2022-11-20 13:56:12'),
(1, '2022-11-20 14:43:00'),
(24, '2022-11-20 15:40:36'),
(1, '2022-11-20 15:41:08'),
(1, '2022-11-20 15:48:08'),
(1, '2022-11-20 18:38:32'),
(1, '2022-11-21 12:16:04'),
(1, '2022-11-21 14:10:21'),
(1, '2022-11-21 14:21:18'),
(1, '2022-11-21 14:37:00'),
(1, '2022-11-21 17:05:04'),
(1, '2022-11-21 17:09:50'),
(1, '2022-11-21 17:11:15'),
(1, '2022-11-21 17:12:06'),
(1, '2022-11-21 17:13:35'),
(1, '2022-11-21 17:16:31'),
(1, '2022-11-21 17:22:04'),
(1, '2022-11-22 08:44:29'),
(1, '2022-11-22 08:45:32'),
(1, '2022-11-22 12:15:59'),
(1, '2022-11-22 12:22:24'),
(1, '2022-11-22 12:29:18'),
(1, '2022-11-22 12:49:19'),
(1, '2022-11-22 14:16:32'),
(1, '2022-11-22 14:26:19'),
(1, '2022-11-22 15:02:50'),
(1, '2022-11-22 15:20:29'),
(1, '2022-11-22 15:26:38'),
(1, '2022-11-22 18:27:10'),
(1, '2022-11-22 18:51:55'),
(1, '2022-11-22 19:14:07'),
(1, '2022-11-23 05:24:13'),
(1, '2022-11-23 05:30:42'),
(1, '2022-11-23 06:01:50'),
(1, '2022-11-23 06:35:58'),
(1, '2022-11-23 07:56:16'),
(1, '2022-11-23 08:20:03'),
(1, '2022-11-23 09:45:56'),
(1, '2022-11-29 11:45:45'),
(1, '2022-11-29 14:41:19'),
(0, '2022-11-29 14:45:06'),
(0, '2022-11-29 14:48:25'),
(0, '2022-11-29 14:50:27'),
(0, '2022-11-29 14:50:43'),
(0, '2022-11-29 15:14:49'),
(0, '2022-11-29 15:18:50'),
(0, '2022-11-29 15:19:52'),
(0, '2022-11-29 15:27:13'),
(0, '2022-11-29 15:32:34'),
(0, '2022-11-29 15:33:43'),
(1, '2022-11-30 04:29:53'),
(1, '2022-11-30 04:35:23'),
(1, '2022-11-30 05:05:03'),
(1, '2022-11-30 08:06:08'),
(0, '2022-11-30 08:23:29'),
(1, '2022-11-30 08:44:09'),
(1, '2022-11-30 08:47:53'),
(1, '2022-11-30 09:43:03'),
(1, '2022-11-30 09:49:00'),
(1, '2022-11-30 10:49:57'),
(1, '2022-11-30 10:55:02'),
(1, '2022-11-30 12:38:59'),
(1, '2022-11-30 12:42:27'),
(1, '2022-12-13 04:26:07'),
(1, '2022-12-13 04:53:00'),
(1, '2022-12-13 05:19:05'),
(1, '2022-12-13 06:35:46'),
(1, '2022-11-19 18:48:50'),
(1, '2022-11-19 18:49:23'),
(1, '2022-11-19 18:51:11'),
(1, '2022-11-19 18:52:26'),
(1, '2022-11-19 18:54:41'),
(1, '2022-11-19 18:55:21'),
(1, '2022-11-19 18:56:56'),
(1, '2022-11-19 18:58:03'),
(1, '2022-11-19 19:06:08'),
(1, '2022-11-20 05:40:03'),
(1, '2022-11-20 06:03:15'),
(1, '2022-11-20 06:03:35'),
(1, '2022-11-20 09:21:14'),
(1, '2022-11-20 09:44:36'),
(1, '2022-11-20 12:41:57'),
(1, '2022-11-20 12:44:04'),
(1, '2022-11-20 12:44:45'),
(1, '2022-11-20 12:45:56'),
(1, '2022-11-20 12:47:43'),
(1, '2022-11-20 12:48:21'),
(24, '2022-11-20 13:41:30'),
(24, '2022-11-20 13:42:40'),
(1, '2022-11-20 13:43:12'),
(1, '2022-11-20 13:43:22'),
(24, '2022-11-20 13:46:48'),
(1, '2022-11-20 13:47:12'),
(1, '2022-11-20 13:47:58'),
(1, '2022-11-20 13:48:25'),
(1, '2022-11-20 13:48:48'),
(1, '2022-11-20 13:49:37'),
(1, '2022-11-20 13:50:25'),
(1, '2022-11-20 13:50:54'),
(1, '2022-11-20 13:51:36'),
(1, '2022-11-20 13:51:57'),
(1, '2022-11-20 13:52:33'),
(1, '2022-11-20 13:52:54'),
(24, '2022-11-20 13:53:05'),
(1, '2022-11-20 13:53:25'),
(24, '2022-11-20 13:53:43'),
(24, '2022-11-20 13:56:02'),
(1, '2022-11-20 13:56:12'),
(1, '2022-11-20 14:43:00'),
(24, '2022-11-20 15:40:36'),
(1, '2022-11-20 15:41:08'),
(1, '2022-11-20 15:48:08'),
(1, '2022-11-20 18:38:32'),
(1, '2022-11-21 12:16:04'),
(1, '2022-11-21 14:10:21'),
(1, '2022-11-21 14:21:18'),
(1, '2022-11-21 14:37:00'),
(1, '2022-11-21 17:05:04'),
(1, '2022-11-21 17:09:50'),
(1, '2022-11-21 17:11:15'),
(1, '2022-11-21 17:12:06'),
(1, '2022-11-21 17:13:35'),
(1, '2022-11-21 17:16:31'),
(1, '2022-11-21 17:22:04'),
(1, '2022-11-22 08:44:29'),
(1, '2022-11-22 08:45:32'),
(1, '2022-11-22 12:15:59'),
(1, '2022-11-22 12:22:24'),
(1, '2022-11-22 12:29:18'),
(1, '2022-11-22 12:49:19'),
(1, '2022-11-22 14:16:32'),
(1, '2022-11-22 14:26:19'),
(1, '2022-11-22 15:02:50'),
(1, '2022-11-22 15:20:29'),
(1, '2022-11-22 15:26:38'),
(1, '2022-11-22 18:27:10'),
(1, '2022-11-22 18:51:55'),
(1, '2022-11-22 19:14:07'),
(1, '2022-11-23 05:24:13'),
(1, '2022-11-23 05:30:42'),
(1, '2022-11-23 06:01:50'),
(1, '2022-11-23 06:35:58'),
(1, '2022-11-23 07:56:16'),
(1, '2022-11-23 08:20:03'),
(1, '2022-11-23 09:45:56'),
(1, '2022-11-29 11:45:45'),
(1, '2022-11-29 14:41:19'),
(0, '2022-11-29 14:45:06'),
(0, '2022-11-29 14:48:25'),
(0, '2022-11-29 14:50:27'),
(0, '2022-11-29 14:50:43'),
(0, '2022-11-29 15:14:49'),
(0, '2022-11-29 15:18:50'),
(0, '2022-11-29 15:19:52'),
(0, '2022-11-29 15:27:13'),
(0, '2022-11-29 15:32:34'),
(0, '2022-11-29 15:33:43'),
(1, '2022-11-30 04:29:53'),
(1, '2022-11-30 04:35:23'),
(1, '2022-11-30 05:05:03'),
(1, '2022-11-30 08:06:08'),
(0, '2022-11-30 08:23:29'),
(1, '2022-11-30 08:44:09'),
(1, '2022-11-30 08:47:53'),
(1, '2022-11-30 09:43:03'),
(1, '2022-11-30 09:49:00'),
(1, '2022-11-30 10:49:57'),
(1, '2022-11-30 10:55:02'),
(1, '2022-11-30 12:38:59'),
(1, '2022-11-30 12:42:27'),
(1, '2022-12-13 04:26:07'),
(1, '2022-12-13 04:53:00'),
(1, '2022-12-13 05:19:05'),
(1, '2022-12-13 06:35:46'),
(1, '2022-12-13 09:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `fname` varchar(10) NOT NULL,
  `maname` varchar(10) DEFAULT NULL,
  `lname` varchar(10) NOT NULL,
  `pan` varchar(10) DEFAULT NULL,
  `acc_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `type` enum('DEBIT','CREDIT') NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` float NOT NULL,
  `cin` int(11) NOT NULL,
  `ifsc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `type`, `time_stamp`, `amount`, `cin`, `ifsc`) VALUES
(1, 'CREDIT', '2022-01-01 07:00:10', 7070, 101, 'DBMB0001164'),
(2, 'DEBIT', '2022-02-02 07:00:10', 8080, 101, 'DBMB0001164'),
(3, 'CREDIT', '2022-03-03 07:00:10', 9090, 101, 'DBMB0001164'),
(4, 'DEBIT', '2022-01-04 07:00:10', 10100, 101, 'DBMB0001164'),
(5, 'CREDIT', '2022-03-05 07:00:10', 11110, 101, 'DBMB0001164'),
(6, 'DEBIT', '2022-12-06 07:00:10', 12120, 101, 'DBMB0001164'),
(7, 'CREDIT', '2022-06-07 07:00:10', 13130, 101, 'DBMB0001164'),
(8, 'DEBIT', '2022-06-08 07:00:10', 14140, 101, 'DBMB0001164'),
(9, 'CREDIT', '2022-07-09 07:00:10', 15150, 101, 'DBMB0001164'),
(10, 'DEBIT', '2022-10-10 07:00:10', 16160, 101, 'DBMB0001164'),
(11, 'CREDIT', '2022-10-11 07:00:10', 17170, 101, 'DBMB0001164'),
(12, 'DEBIT', '2022-09-12 07:00:10', 18180, 101, 'DBMB0001164'),
(13, 'CREDIT', '2022-09-13 07:00:10', 19190, 101, 'DBMB0001164'),
(14, 'DEBIT', '2022-01-14 07:00:10', 20200, 101, 'DBMB0001164'),
(15, 'CREDIT', '2022-01-15 07:00:10', 21210, 101, 'DBMB0001164'),
(16, 'DEBIT', '2022-01-16 07:00:10', 22220, 101, 'DBMB0001164'),
(17, 'CREDIT', '2022-01-17 07:00:10', 23230, 101, 'DBMB0001164'),
(18, 'DEBIT', '2022-01-18 07:00:10', 24240, 101, 'DBMB0001164'),
(19, 'CREDIT', '2022-01-19 07:00:10', 25250, 101, 'DBMB0001164'),
(20, 'DEBIT', '2022-01-20 07:00:10', 26260, 101, 'DBMB0001164'),
(21, 'CREDIT', '2022-01-01 07:00:10', 7070, 101, 'DBMB0001164'),
(22, 'DEBIT', '2022-02-02 07:00:10', 8080, 101, 'DBMB0001164'),
(23, 'CREDIT', '2022-03-03 07:00:10', 9090, 101, 'DBMB0001164'),
(24, 'DEBIT', '2022-01-04 07:00:10', 10100, 101, 'DBMB0001164'),
(25, 'CREDIT', '2022-03-05 07:00:10', 11110, 101, 'DBMB0001164'),
(26, 'DEBIT', '2022-12-06 07:00:10', 12120, 101, 'DBMB0001164'),
(27, 'CREDIT', '2022-06-07 07:00:10', 13130, 101, 'DBMB0001164'),
(28, 'DEBIT', '2022-06-08 07:00:10', 14140, 101, 'DBMB0001164'),
(29, 'CREDIT', '2022-07-09 07:00:10', 15150, 101, 'DBMB0001164'),
(30, 'DEBIT', '2022-10-10 07:00:10', 16160, 101, 'DBMB0001164'),
(31, 'CREDIT', '2022-10-11 07:00:10', 17170, 101, 'DBMB0001164'),
(32, 'DEBIT', '2022-09-12 07:00:10', 18180, 101, 'DBMB0001164'),
(33, 'CREDIT', '2022-09-13 07:00:10', 19190, 101, 'DBMB0001164'),
(34, 'DEBIT', '2022-01-14 07:00:10', 20200, 101, 'DBMB0001164'),
(35, 'CREDIT', '2022-01-15 07:00:10', 21210, 101, 'DBMB0001164'),
(36, 'DEBIT', '2022-01-16 07:00:10', 22220, 101, 'DBMB0001164'),
(37, 'CREDIT', '2022-01-17 07:00:10', 23230, 101, 'DBMB0001164'),
(38, 'DEBIT', '2022-01-18 07:00:10', 24240, 101, 'DBMB0001164'),
(39, 'CREDIT', '2022-01-19 07:00:10', 25250, 101, 'DBMB0001164'),
(40, 'DEBIT', '2022-01-20 07:00:10', 26260, 101, 'DBMB0001164'),
(41, 'DEBIT', '2022-01-21 07:00:10', 27270, 101, 'DBMB0001164'),
(42, 'CREDIT', '2022-01-22 07:00:10', 28280, 101, 'DBMB0001164'),
(43, 'DEBIT', '2022-01-23 07:00:10', 29290, 101, 'DBMB0001164'),
(44, 'DEBIT', '2022-01-24 07:00:10', 30300, 101, 'DBMB0001164'),
(45, 'CREDIT', '2022-01-25 07:00:10', 31310, 101, 'DBMB0001164'),
(46, 'DEBIT', '2022-01-26 07:00:10', 32320, 101, 'DBMB0001164'),
(47, 'DEBIT', '2022-01-27 07:00:10', 33330, 101, 'DBMB0001164'),
(48, 'CREDIT', '2022-01-28 07:00:10', 34340, 101, 'DBMB0001164'),
(49, 'DEBIT', '2022-01-29 07:00:10', 35350, 101, 'DBMB0001164'),
(50, 'DEBIT', '2022-01-30 07:00:10', 36360, 101, 'DBMB0001164'),
(51, 'CREDIT', '2022-01-31 07:00:10', 37370, 101, 'DBMB0001164'),
(52, 'DEBIT', '2022-02-01 07:00:10', 38380, 101, 'DBMB0001164'),
(53, 'DEBIT', '2022-02-02 07:00:10', 39390, 101, 'DBMB0001164'),
(54, 'CREDIT', '2022-02-03 07:00:10', 40400, 101, 'DBMB0001164'),
(55, 'DEBIT', '2022-02-04 07:00:10', 41410, 101, 'DBMB0001164'),
(56, 'DEBIT', '2022-02-05 07:00:10', 42420, 101, 'DBMB0001164'),
(57, 'CREDIT', '2022-02-06 07:00:10', 43430, 101, 'DBMB0001164'),
(58, 'DEBIT', '2022-02-07 07:00:10', 44440, 101, 'DBMB0001164'),
(59, 'DEBIT', '2022-02-08 07:00:10', 45450, 101, 'DBMB0001164'),
(60, 'CREDIT', '2022-02-09 07:00:10', 46460, 101, 'DBMB0001164'),
(61, 'DEBIT', '2022-02-10 07:00:10', 47470, 101, 'DBMB0001164'),
(62, 'DEBIT', '2022-02-11 07:00:10', 48480, 101, 'DBMB0001164'),
(63, 'CREDIT', '2022-02-12 07:00:10', 49490, 101, 'DBMB0001164'),
(64, 'DEBIT', '2022-02-13 07:00:10', 50500, 101, 'DBMB0001164'),
(65, 'DEBIT', '2022-02-14 07:00:10', 51510, 101, 'DBMB0001164'),
(66, 'CREDIT', '2022-02-15 07:00:10', 52520, 101, 'DBMB0001164'),
(67, 'DEBIT', '2022-02-16 07:00:10', 53530, 101, 'DBMB0001164'),
(68, 'DEBIT', '2022-02-17 07:00:10', 54540, 101, 'DBMB0001164'),
(69, 'CREDIT', '2022-02-18 07:00:10', 55550, 101, 'DBMB0001164'),
(70, 'DEBIT', '2022-02-19 07:00:10', 56560, 101, 'DBMB0001164'),
(71, 'DEBIT', '2022-02-20 07:00:10', 57570, 101, 'DBMB0001164'),
(72, 'CREDIT', '2022-02-21 07:00:10', 58580, 101, 'DBMB0001164'),
(73, 'DEBIT', '2022-02-22 07:00:10', 59590, 101, 'DBMB0001164'),
(74, 'DEBIT', '2022-02-23 07:00:10', 60600, 101, 'DBMB0001164'),
(75, 'CREDIT', '2022-02-24 07:00:10', 61610, 101, 'DBMB0001164'),
(76, 'DEBIT', '2022-02-25 07:00:10', 62620, 101, 'DBMB0001164'),
(77, 'DEBIT', '2022-02-26 07:00:10', 63630, 101, 'DBMB0001164'),
(78, 'CREDIT', '2022-02-27 07:00:10', 64640, 101, 'DBMB0001164'),
(79, 'DEBIT', '2022-02-28 07:00:10', 65650, 101, 'DBMB0001164'),
(80, 'DEBIT', '2022-03-01 07:00:10', 66660, 101, 'DBMB0001164'),
(81, 'CREDIT', '2022-03-02 07:00:10', 67670, 101, 'DBMB0001164'),
(82, 'DEBIT', '2022-03-03 07:00:10', 68680, 101, 'DBMB0001164'),
(83, 'DEBIT', '2022-03-04 07:00:10', 69690, 101, 'DBMB0001164'),
(84, 'CREDIT', '2022-03-05 07:00:10', 70700, 101, 'DBMB0001164'),
(85, 'DEBIT', '2022-03-06 07:00:10', 71710, 101, 'DBMB0001164'),
(86, 'DEBIT', '2022-03-07 07:00:10', 72720, 101, 'DBMB0001164'),
(87, 'CREDIT', '2022-03-08 07:00:10', 73730, 101, 'DBMB0001164'),
(88, 'DEBIT', '2022-03-09 07:00:10', 74740, 101, 'DBMB0001164'),
(89, 'DEBIT', '2022-03-10 07:00:10', 75750, 101, 'DBMB0001164'),
(90, 'CREDIT', '2022-03-11 07:00:10', 76760, 101, 'DBMB0001164'),
(91, 'DEBIT', '2022-03-12 07:00:10', 77770, 101, 'DBMB0001164'),
(92, 'DEBIT', '2022-03-13 07:00:10', 78780, 101, 'DBMB0001164'),
(93, 'CREDIT', '2022-03-14 07:00:10', 79790, 101, 'DBMB0001164'),
(94, 'DEBIT', '2022-03-15 07:00:10', 80800, 101, 'DBMB0001164'),
(95, 'DEBIT', '2022-03-16 07:00:10', 81810, 101, 'DBMB0001164'),
(96, 'CREDIT', '2022-03-17 07:00:10', 82820, 101, 'DBMB0001164'),
(97, 'DEBIT', '2022-03-18 07:00:10', 83830, 101, 'DBMB0001164'),
(98, 'DEBIT', '2022-03-19 07:00:10', 84840, 101, 'DBMB0001164'),
(99, 'CREDIT', '2022-03-20 07:00:10', 85850, 101, 'DBMB0001164'),
(100, 'DEBIT', '2022-03-21 07:00:10', 86860, 101, 'DBMB0001164'),
(101, 'DEBIT', '2022-03-22 07:00:10', 87870, 101, 'DBMB0001164'),
(102, 'CREDIT', '2022-03-23 07:00:10', 88880, 101, 'DBMB0001164'),
(103, 'DEBIT', '2022-03-24 07:00:10', 89890, 101, 'DBMB0001164'),
(104, 'DEBIT', '2022-03-25 07:00:10', 90900, 101, 'DBMB0001164'),
(105, 'CREDIT', '2022-03-26 07:00:10', 91910, 101, 'DBMB0001164'),
(106, 'DEBIT', '2022-03-27 07:00:10', 92920, 101, 'DBMB0001164'),
(107, 'DEBIT', '2022-03-28 07:00:10', 93930, 101, 'DBMB0001164'),
(108, 'CREDIT', '2022-03-29 07:00:10', 94940, 101, 'DBMB0001164'),
(109, 'DEBIT', '2022-03-30 07:00:10', 95950, 101, 'DBMB0001164'),
(110, 'DEBIT', '2022-03-31 07:00:10', 96960, 101, 'DBMB0001164'),
(111, 'CREDIT', '2022-04-01 07:00:10', 97970, 101, 'DBMB0001164'),
(112, 'DEBIT', '2022-04-02 07:00:10', 98980, 101, 'DBMB0001164'),
(113, 'DEBIT', '2022-04-03 07:00:10', 99990, 101, 'DBMB0001164'),
(114, 'CREDIT', '2022-04-04 07:00:10', 101000, 101, 'DBMB0001164'),
(115, 'DEBIT', '2022-04-05 07:00:10', 102010, 101, 'DBMB0001164'),
(116, 'DEBIT', '2022-04-06 07:00:10', 103020, 101, 'DBMB0001164'),
(117, 'CREDIT', '2022-04-07 07:00:10', 104030, 101, 'DBMB0001164'),
(118, 'DEBIT', '2022-04-08 07:00:10', 105040, 101, 'DBMB0001164'),
(119, 'DEBIT', '2022-04-09 07:00:10', 106050, 101, 'DBMB0001164'),
(120, 'CREDIT', '2022-04-10 07:00:10', 107060, 101, 'DBMB0001164'),
(121, 'DEBIT', '2022-04-11 07:00:10', 108070, 101, 'DBMB0001164'),
(122, 'DEBIT', '2022-04-12 07:00:10', 109080, 101, 'DBMB0001164'),
(123, 'CREDIT', '2022-04-13 07:00:10', 110090, 101, 'DBMB0001164'),
(124, 'DEBIT', '2022-04-14 07:00:10', 111100, 101, 'DBMB0001164'),
(125, 'DEBIT', '2022-04-15 07:00:10', 112110, 101, 'DBMB0001164'),
(126, 'CREDIT', '2022-04-16 07:00:10', 113120, 101, 'DBMB0001164'),
(127, 'DEBIT', '2022-04-17 07:00:10', 114130, 101, 'DBMB0001164'),
(128, 'DEBIT', '2022-04-18 07:00:10', 115140, 101, 'DBMB0001164'),
(129, 'CREDIT', '2022-04-19 07:00:10', 116150, 101, 'DBMB0001164'),
(130, 'DEBIT', '2022-04-20 07:00:10', 117160, 101, 'DBMB0001164'),
(131, 'DEBIT', '2022-04-21 07:00:10', 118170, 101, 'DBMB0001164'),
(132, 'CREDIT', '2022-04-22 07:00:10', 119180, 101, 'DBMB0001164'),
(133, 'DEBIT', '2022-04-23 07:00:10', 120190, 101, 'DBMB0001164'),
(134, 'DEBIT', '2022-04-24 07:00:10', 121200, 101, 'DBMB0001164'),
(135, 'CREDIT', '2022-04-25 07:00:10', 122210, 101, 'DBMB0001164'),
(136, 'DEBIT', '2022-04-26 07:00:10', 123220, 101, 'DBMB0001164'),
(137, 'DEBIT', '2022-04-27 07:00:10', 124230, 101, 'DBMB0001164'),
(138, 'CREDIT', '2022-04-28 07:00:10', 125240, 101, 'DBMB0001164'),
(139, 'DEBIT', '2022-04-29 07:00:10', 126250, 101, 'DBMB0001164'),
(140, 'DEBIT', '2022-04-30 07:00:10', 127260, 101, 'DBMB0001164'),
(141, 'CREDIT', '2022-05-01 07:00:10', 128270, 101, 'DBMB0001164'),
(142, 'DEBIT', '2022-05-02 07:00:10', 129280, 101, 'DBMB0001164'),
(143, 'DEBIT', '2022-05-03 07:00:10', 130290, 101, 'DBMB0001164'),
(144, 'CREDIT', '2022-05-04 07:00:10', 131300, 101, 'DBMB0001164'),
(145, 'DEBIT', '2022-05-05 07:00:10', 132310, 101, 'DBMB0001164'),
(146, 'DEBIT', '2022-05-06 07:00:10', 133320, 101, 'DBMB0001164'),
(147, 'CREDIT', '2022-05-07 07:00:10', 134330, 101, 'DBMB0001164'),
(148, 'DEBIT', '2022-05-08 07:00:10', 135340, 101, 'DBMB0001164'),
(149, 'DEBIT', '2022-05-09 07:00:10', 136350, 101, 'DBMB0001164'),
(150, 'CREDIT', '2022-05-10 07:00:10', 137360, 101, 'DBMB0001164'),
(151, 'DEBIT', '2022-05-11 07:00:10', 138370, 101, 'DBMB0001164'),
(152, 'DEBIT', '2022-05-12 07:00:10', 139380, 101, 'DBMB0001164'),
(153, 'CREDIT', '2022-05-13 07:00:10', 140390, 101, 'DBMB0001164'),
(154, 'DEBIT', '2022-05-14 07:00:10', 141400, 101, 'DBMB0001164'),
(155, 'DEBIT', '2022-05-15 07:00:10', 142410, 101, 'DBMB0001164'),
(156, 'CREDIT', '2022-05-16 07:00:10', 143420, 101, 'DBMB0001164'),
(157, 'DEBIT', '2022-05-17 07:00:10', 144430, 101, 'DBMB0001164'),
(158, 'DEBIT', '2022-05-18 07:00:10', 145440, 101, 'DBMB0001164'),
(159, 'CREDIT', '2022-05-19 07:00:10', 146450, 101, 'DBMB0001164'),
(160, 'DEBIT', '2022-05-20 07:00:10', 147460, 101, 'DBMB0001164'),
(161, 'DEBIT', '2022-05-21 07:00:10', 148470, 101, 'DBMB0001164'),
(162, 'CREDIT', '2022-05-22 07:00:10', 149480, 101, 'DBMB0001164'),
(163, 'DEBIT', '2022-05-23 07:00:10', 150490, 101, 'DBMB0001164'),
(164, 'DEBIT', '2022-05-24 07:00:10', 151500, 101, 'DBMB0001164'),
(165, 'CREDIT', '2022-05-25 07:00:10', 152510, 101, 'DBMB0001164'),
(166, 'DEBIT', '2022-05-26 07:00:10', 153520, 101, 'DBMB0001164'),
(167, 'DEBIT', '2022-05-27 07:00:10', 154530, 101, 'DBMB0001164'),
(168, 'CREDIT', '2022-05-28 07:00:10', 155540, 101, 'DBMB0001164'),
(169, 'DEBIT', '2022-05-29 07:00:10', 156550, 101, 'DBMB0001164'),
(170, 'DEBIT', '2022-05-30 07:00:10', 157560, 101, 'DBMB0001164'),
(171, 'CREDIT', '2022-05-31 07:00:10', 158570, 101, 'DBMB0001164'),
(172, 'DEBIT', '2022-06-01 07:00:10', 159580, 101, 'DBMB0001164'),
(173, 'DEBIT', '2022-06-02 07:00:10', 160590, 101, 'DBMB0001164'),
(174, 'CREDIT', '2022-06-03 07:00:10', 161600, 101, 'DBMB0001164'),
(175, 'DEBIT', '2022-06-04 07:00:10', 162610, 101, 'DBMB0001164'),
(176, 'DEBIT', '2022-06-05 07:00:10', 163620, 101, 'DBMB0001164'),
(177, 'CREDIT', '2022-06-06 07:00:10', 164630, 101, 'DBMB0001164'),
(178, 'DEBIT', '2022-06-07 07:00:10', 165640, 101, 'DBMB0001164'),
(179, 'DEBIT', '2022-06-08 07:00:10', 166650, 101, 'DBMB0001164'),
(180, 'CREDIT', '2022-06-09 07:00:10', 167660, 101, 'DBMB0001164'),
(181, 'DEBIT', '2022-06-10 07:00:10', 168670, 101, 'DBMB0001164'),
(182, 'DEBIT', '2022-06-11 07:00:10', 169680, 101, 'DBMB0001164'),
(183, 'CREDIT', '2022-06-12 07:00:10', 170690, 101, 'DBMB0001164'),
(184, 'DEBIT', '2022-06-13 07:00:10', 171700, 101, 'DBMB0001164'),
(185, 'DEBIT', '2022-06-14 07:00:10', 172710, 101, 'DBMB0001164'),
(186, 'CREDIT', '2022-06-15 07:00:10', 173720, 101, 'DBMB0001164'),
(187, 'DEBIT', '2022-06-16 07:00:10', 174730, 101, 'DBMB0001164'),
(188, 'DEBIT', '2022-06-17 07:00:10', 175740, 101, 'DBMB0001164'),
(189, 'CREDIT', '2022-06-18 07:00:10', 176750, 101, 'DBMB0001164'),
(190, 'DEBIT', '2022-06-19 07:00:10', 177760, 101, 'DBMB0001164'),
(191, 'DEBIT', '2022-06-20 07:00:10', 178770, 101, 'DBMB0001164'),
(192, 'CREDIT', '2022-06-21 07:00:10', 179780, 101, 'DBMB0001164'),
(193, 'DEBIT', '2022-06-22 07:00:10', 180790, 101, 'DBMB0001164'),
(194, 'DEBIT', '2022-06-23 07:00:10', 181800, 101, 'DBMB0001164'),
(195, 'CREDIT', '2022-06-24 07:00:10', 182810, 101, 'DBMB0001164'),
(196, 'DEBIT', '2022-06-25 07:00:10', 183820, 101, 'DBMB0001164'),
(197, 'DEBIT', '2022-06-26 07:00:10', 184830, 101, 'DBMB0001164'),
(198, 'CREDIT', '2022-06-27 07:00:10', 185840, 101, 'DBMB0001164'),
(199, 'DEBIT', '2022-06-28 07:00:10', 186850, 101, 'DBMB0001164'),
(200, 'DEBIT', '2022-06-29 07:00:10', 187860, 101, 'DBMB0001164'),
(201, 'CREDIT', '2022-09-01 07:00:10', 7070, 101, 'DBMB0001164'),
(202, 'DEBIT', '2022-09-02 07:00:10', 8080, 101, 'DBMB0001164'),
(203, 'CREDIT', '2022-09-03 07:00:10', 9090, 101, 'DBMB0001164'),
(204, 'DEBIT', '2022-09-04 07:00:10', 10100, 101, 'DBMB0001164'),
(205, 'CREDIT', '2022-09-05 07:00:10', 11110, 101, 'DBMB0001164'),
(206, 'DEBIT', '2022-09-06 07:00:10', 12120, 101, 'DBMB0001164'),
(207, 'CREDIT', '2022-09-07 07:00:10', 13130, 101, 'DBMB0001164'),
(208, 'DEBIT', '2022-09-08 07:00:10', 14140, 101, 'DBMB0001164'),
(209, 'CREDIT', '2022-09-09 07:00:10', 15150, 101, 'DBMB0001164'),
(210, 'DEBIT', '2022-10-10 07:00:10', 16160, 101, 'DBMB0001164'),
(211, 'CREDIT', '2022-10-11 07:00:10', 17170, 101, 'DBMB0001164'),
(212, 'DEBIT', '2022-09-12 07:00:10', 18180, 101, 'DBMB0001164'),
(213, 'CREDIT', '2022-09-13 07:00:10', 19190, 101, 'DBMB0001164'),
(214, 'DEBIT', '2022-08-14 07:00:10', 20200, 101, 'DBMB0001164'),
(215, 'CREDIT', '2022-08-15 07:00:10', 21210, 101, 'DBMB0001164'),
(216, 'DEBIT', '2022-08-16 07:00:10', 22220, 101, 'DBMB0001164'),
(217, 'CREDIT', '2022-08-17 07:00:10', 23230, 101, 'DBMB0001164'),
(218, 'DEBIT', '2022-08-18 07:00:10', 24240, 101, 'DBMB0001164'),
(219, 'CREDIT', '2022-08-19 07:00:10', 25250, 101, 'DBMB0001164'),
(220, 'DEBIT', '2022-10-20 07:00:10', 26260, 101, 'DBMB0001164');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `type` enum('RTGS','NEFT','IMPS') NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` float NOT NULL,
  `recipient_acc_no` int(11) NOT NULL,
  `recipient_ifsc` varchar(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `ifsc` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure for view `branch_customers`
--
DROP TABLE IF EXISTS `branch_customers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `branch_customers`  AS SELECT `c`.`cin` AS `cin`, `a`.`ifsc` AS `ifsc`, `a`.`acc_no` AS `acc_no` FROM (`customer` `c` join `account` `a` on(`c`.`cin` = `a`.`cin`)) ORDER BY `c`.`fname` ASC, `c`.`mname` ASC, `c`.`lname` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `count_branches`
--
DROP TABLE IF EXISTS `count_branches`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_branches`  AS SELECT count(`branch`.`ifsc`) AS `count` FROM `branch``branch`  ;

-- --------------------------------------------------------

--
-- Structure for view `count_customer`
--
DROP TABLE IF EXISTS `count_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_customer`  AS SELECT count(`customer`.`cin`) AS `count` FROM `customer``customer`  ;

-- --------------------------------------------------------

--
-- Structure for view `count_employee`
--
DROP TABLE IF EXISTS `count_employee`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `count_employee`  AS SELECT count(`employee`.`emp_id`) AS `count` FROM `employee``employee`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_type`,`ifsc`,`cin`),
  ADD UNIQUE KEY `acc_no` (`acc_no`),
  ADD KEY `ifsc` (`ifsc`),
  ADD KEY `cin` (`cin`);

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ifsc`),
  ADD KEY `manager_id` (`manager_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD KEY `acc_no` (`acc_no`),
  ADD KEY `card_no` (`card_no`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`card_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cin`),
  ADD UNIQUE KEY `pan` (`pan`),
  ADD UNIQUE KEY `aadhaar` (`aadhaar`);

--
-- Indexes for table `cust_credentials`
--
ALTER TABLE `cust_credentials`
  ADD KEY `cin` (`cin`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `employee_deletion_history`
--
ALTER TABLE `employee_deletion_history`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `emp_credentials`
--
ALTER TABLE `emp_credentials`
  ADD UNIQUE KEY `emp_id` (`emp_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ifsc` (`ifsc`),
  ADD KEY `cin` (`cin`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD KEY `emp_id` (`emp_id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD UNIQUE KEY `pan` (`pan`),
  ADD KEY `acc_no` (`acc_no`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ifsc` (`ifsc`),
  ADD KEY `cin` (`cin`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cin` (`cin`),
  ADD KEY `ifsc` (`ifsc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `employee_deletion_history`
--
ALTER TABLE `employee_deletion_history`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ifsc`) REFERENCES `branch` (`ifsc`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `customer` (`cin`);

--
-- Constraints for table `account_details`
--
ALTER TABLE `account_details`
  ADD CONSTRAINT `account_details_ibfk_1` FOREIGN KEY (`acc_no`) REFERENCES `account` (`acc_no`);

--
-- Constraints for table `branch`
--
ALTER TABLE `branch`
  ADD CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`manager_id`) REFERENCES `employee` (`emp_id`) ON DELETE NO ACTION;

--
-- Constraints for table `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `card_ibfk_1` FOREIGN KEY (`acc_no`) REFERENCES `account` (`acc_no`),
  ADD CONSTRAINT `card_ibfk_2` FOREIGN KEY (`card_no`) REFERENCES `card_details` (`card_no`);

--
-- Constraints for table `cust_credentials`
--
ALTER TABLE `cust_credentials`
  ADD CONSTRAINT `cust_credentials_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `customer` (`cin`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`ifsc`);

--
-- Constraints for table `employee_deletion_history`
--
ALTER TABLE `employee_deletion_history`
  ADD CONSTRAINT `employee_deletion_history_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`ifsc`);

--
-- Constraints for table `emp_credentials`
--
ALTER TABLE `emp_credentials`
  ADD CONSTRAINT `emp_credentials_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE;

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`ifsc`) REFERENCES `branch` (`ifsc`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `customer` (`cin`);

--
-- Constraints for table `login_history`
--
ALTER TABLE `login_history`
  ADD CONSTRAINT `login_history_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`);

--
-- Constraints for table `nominee`
--
ALTER TABLE `nominee`
  ADD CONSTRAINT `nominee_ibfk_1` FOREIGN KEY (`acc_no`) REFERENCES `account_details` (`acc_no`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`ifsc`) REFERENCES `branch` (`ifsc`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`cin`) REFERENCES `customer` (`cin`);

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `customer` (`cin`),
  ADD CONSTRAINT `transfers_ibfk_2` FOREIGN KEY (`ifsc`) REFERENCES `branch` (`ifsc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
