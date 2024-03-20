-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 10:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `AdminEmail` varchar(120) DEFAULT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `FullName`, `AdminEmail`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'Hout Ankeara', 'ankeara017@gmail.com', 'Ankeara', '68d9a998541d8e8e3fcdc7ee93207fc7', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblauthors`
--

CREATE TABLE `tblauthors` (
  `id` int(11) NOT NULL,
  `author_name` varchar(159) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblauthors`
--

INSERT INTO `tblauthors` (`id`, `author_name`, `gender`, `dob`, `profile`) VALUES
(81, 'ម៉ុង ម៉ានុត', 'Male', '1997-12-12', '65d5d8430986a1708513347.png'),
(82, 'ភីក ដាវ៉ាន់', 'Male', '1998-03-08', '65d63e1a95b811708539418.jpg'),
(85, 'ម៉ានិត', 'Male', '1989-11-25', '65d63df49a4341708539380.jpg'),
(86, 'លោក ជីម ទិត្យមករា និង លោកស្រី ហ៊ឹម រដ្ឋា', 'Default', '0000-00-00', '65f089f31647d1710262771.'),
(87, 'លោក សេង ម៉េងស្រុង', 'Male', '1982-10-12', '65f08a17e4ab51710262807.'),
(88, 'លោក ឡៅ ប៉ាក់សួន', 'Male', '1985-12-16', '65f08a2edfabd1710262830.'),
(89, 'លោក ជុន ស៊ីដា', 'Male', '1995-04-22', '65f08a4d7a1f71710262861.'),
(90, 'លោក សុខ សូជុន', 'Male', '1987-05-07', '65f08a6075c881710262880.'),
(91, 'លោកស្រី យឹម ហាណា', 'Female', '1996-06-21', '65f08a73178ce1710262899.'),
(92, 'លោក សឿន សោភ័ណ', 'Female', '1999-02-21', '65f08a85c2a141710262917.'),
(93, 'លោក ភុំ គឹមហ៊ន', 'Female', '1994-07-02', '65f08ac104bb91710262977.'),
(94, '. លោក​ ម៉ុក សាផានី', 'Male', '1999-04-05', '65f08acfd0d941710262991.'),
(95, 'លោក សុខ សុផានី', 'Male', '1993-05-06', '65f08ae1e98061710263009.'),
(96, 'លោក បឿន ច័ន្ទសុខា', 'Male', '1986-11-19', '65f08afb8a2261710263035.'),
(97, 'លោក ហម អរុណ', 'Male', '1993-07-03', '65f08b097dc7f1710263049.'),
(98, 'លោក ផុន សិរិរតន៏', 'Male', '1989-09-08', '65f08b174a80a1710263063.'),
(99, 'លោក ញឹមវ៉ាន់ សិខណាល់', 'Male', '1994-12-10', '65f08b2b6e76f1710263083.'),
(100, 'លោកស្រី យឺន ចាន់នី', 'Female', '1985-02-04', '65f08b3fbc05d1710263103.'),
(101, 'លោកស្រី ឌឹត សាវី', 'Default', '1996-05-06', '65f08bb1b36941710263217.'),
(102, 'Jim Rohn', 'Male', '1980-12-26', '65f08bdb25e991710263259.'),
(103, 'Cal Newport', 'Male', '1981-05-01', '65f08bf797dbc1710263287.'),
(104, 'Andrew Matthews', 'Male', '1978-08-09', '65f08c114cf351710263313.'),
(105, 'Ichiro and Fumitake Koga', 'Default', '0000-00-00', '65f08c18bc2b71710263320.'),
(106, 'Gary Keller and Jay Papasan', 'Default', '0000-00-00', '65f08c39bfabe1710263353.'),
(107, 'Ivan Misner and Rick Sapio and Stewart Emery', 'Default', '0000-00-00', '65f08c3e5ea241710263358.'),
(108, 'Leo tai', 'Default', '0000-00-00', '65f08c462393c1710263366.'),
(109, 'HENRIK FEXEUS', 'Male', '0000-00-00', '65f08c4cf36d11710263372.'),
(110, 'Ourn Sarath', 'Male', '0000-00-00', '65f08c54144411710263380.'),
(111, 'Ian Tuhovsky', 'male', '0000-00-00', ''),
(112, 'Sherry Argov', 'female', '0000-00-00', ''),
(113, 'Austin Kleon', 'male', '0000-00-00', ''),
(114, 'Anthony Robbins', 'male', '0000-00-00', ''),
(115, 'John C. Maxwell', 'male', '0000-00-00', ''),
(116, 'Heng Kimsu', 'male', '0000-00-00', ''),
(117, 'Chris Guillebeau', 'male', '0000-00-00', ''),
(118, 'Hal Elrod', 'male', '0000-00-00', ''),
(119, 'Kong Beng', 'male', '0000-00-00', ''),
(120, 'Jeffrey Gitomer', 'male', '0000-00-00', ''),
(121, 'Kim Channa', 'male', '0000-00-00', ''),
(122, 'Dale Carnegie', 'male', '0000-00-00', ''),
(123, 'Rus Sokleang', 'male', '0000-00-00', ''),
(124, 'Harvard Business Press', 'unknown', '0000-00-00', ''),
(125, 'Rus Sokleng', 'male', '0000-00-00', ''),
(126, 'The Chinese T.A.C.T.I.C in negotiation', 'unknown', '0000-00-00', ''),
(127, 'Dr. Marjorie Corman Aaron', 'female', '0000-00-00', ''),
(128, 'The Chinese art of Leadership', 'unknown', '0000-00-00', ''),
(129, 'Brach Vichea', 'male', '0000-00-00', ''),
(130, 'Michael Borkengheam and Donal O Klenton', 'unknown', '0000-00-00', ''),
(131, 'Billi Lim', 'male', '0000-00-00', ''),
(132, 'Stephen J. Harvill', 'male', '0000-00-00', ''),
(133, 'Adele Faber and Elaine Mazlish', 'unknown', '0000-00-00', ''),
(134, 'Khim Natjimon', 'male', '0000-00-00', ''),
(135, '[value-2]', '[value-', '0000-00-00', '[value-5]'),
(136, 'ម៉ានិត', '', '0000-00-00', ''),
(137, 'ម៉ូលីនណា និង រ៉េត សុដាវណ្ណ', '', '0000-00-00', ''),
(138, 'ម៉ានិត និង បូណា រ៉ូហ្សា', '', '0000-00-00', ''),
(139, 'ចាន់ វុត្ថា', '', '0000-00-00', ''),
(140, 'ហ៊ី ស្រីមាស', '', '0000-00-00', ''),
(141, 'ភីក ដាវ៉ាន់', '', '0000-00-00', ''),
(142, 'ម៉ានិត និង ម៉ាក់ ស្រីនាថ និង ម៉ុង ម៉ានុត', '', '0000-00-00', ''),
(143, 'ម៉ូលីនណា និង ឆោម សុពៅ', '', '0000-00-00', ''),
(144, 'ឡាតេ', '', '0000-00-00', ''),
(145, 'ពាន់ ភួងបុប្ផា និង រស់ ពិសិដ្ឋ', '', '0000-00-00', ''),
(146, 'ឆាំ ស្រីញឹប', '', '0000-00-00', ''),
(147, 'កែវ សេងរដ្ឋា', '', '0000-00-00', ''),
(148, 'លីម ស៊ីវលី', '', '0000-00-00', ''),
(149, 'ជា សេងអ៊ី', '', '0000-00-00', ''),
(150, 'ឈួន សុទ្ធាវី', '', '0000-00-00', ''),
(151, 'ឈឿយ សាផាត់', '', '0000-00-00', ''),
(152, 'គីម ឌីណា', '', '0000-00-00', ''),
(153, 'រ៉េត សុភ័ក្រ', '', '0000-00-00', ''),
(154, 'ម៉ូលីនណា និង សម្បត្តិ គឹមលក្ខ័ណ និង បូណា រ៉ូហ្សា', '', '0000-00-00', ''),
(155, 'លីម ប៊ុននីត', '', '0000-00-00', ''),
(156, 'ម៉ានិត និង ម៉ុង ម៉ានុត', '', '0000-00-00', ''),
(157, 'ប៊ុនចាន់ សុក្រសិរី', '', '0000-00-00', ''),
(158, 'លីហ័រ', '', '0000-00-00', ''),
(159, 'ប្រាជ្ញ ផិឡាង', '', '0000-00-00', ''),
(160, 'ម៉ានិត និរតិ', '', '0000-00-00', ''),
(161, 'ពេជ្រ ជិន្នា', '', '0000-00-00', ''),
(162, 'គង់ ច័ន្ទវ៉ាន់ណេង', '', '0000-00-00', ''),
(163, 'អួន សារ៉ាត់', 'Male', '0000-00-00', '65f15b5f0b7e51710316383.'),
(164, 'ប្រាជ្ញ វិជ័យ', 'Male', '0000-00-00', '65f15b7d8add61710316413.'),
(165, 'ប្រាជ្ញ វិជ័យ និង រស់ សុខឡាង', 'Default', '0000-00-00', '65f15b96ecc7c1710316438.'),
(166, 'Brian Tracy', 'Male', '0000-00-00', '65f15c1e172431710316574.'),
(167, 'គឹម ចាន់ណា', 'Male', '0000-00-00', '65f15c438e2211710316611.'),
(168, 'ប៊ួយ សុធន', 'Default', '0000-00-00', '65f15d18e00b01710316824.'),
(169, 'ខុនបេង', 'Male', '0000-00-00', '65f160bfb1e7c1710317759.'),
(171, 'ម៉ា​និត ម៉ុង ម៉ានុត និង ម៉ាក់ ស្រីនាថ', 'Default', '0000-00-00', '65f174f4320a21710322932.');

-- --------------------------------------------------------

--
-- Table structure for table `tblbooks`
--

CREATE TABLE `tblbooks` (
  `id` int(11) NOT NULL,
  `BookName` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorId` int(11) DEFAULT NULL,
  `ISBNNumber` varchar(255) DEFAULT NULL,
  `BookImg` text CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `Amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbooks`
--

INSERT INTO `tblbooks` (`id`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `BookImg`, `Amount`, `status`, `CreateDate`) VALUES
(11, 'កុមុទ', 3, 85, '11112222', '65ea92377cb0c1709871671.jpg', 4, 'Active', '2024-03-19 08:30:46'),
(19, 'កុសិនីមាត់ទិព្វ', 3, 85, '11112223', '65ec2831704741709975601.jpg', 2, 'Active', '2024-03-16 09:14:56'),
(20, 'កូនទី៦', 3, 85, '11112224', '65ec285e0ebd01709975646.jpg', 4, 'Active', '2024-03-19 08:30:51'),
(21, 'ចិត្តសាស្រ្តអប់រំក្មេងបែបឆ្លាតវៃ', 5, 133, '33336666', '65f1531c28cee1710314268.jpg', 5, 'Active', '2024-03-13 07:17:48'),
(22, 'វិធីចិញ្ចឹមអប់រំកូន', 5, 152, '33336667', '65f1537e68f431710314366.jpeg', 5, 'Active', '2024-03-20 08:06:31'),
(27, '7 យុទ្ធសាស្រ្តបង្កើតទ្រព្យសម្បត្តិ និងសេចក្តីសុខ', 1, 81, '33336668', '65f154f52785a1710314741.jpg', 5, 'Active', '2024-03-13 07:25:41'),
(28, 'Become a straight', 1, 103, '44445555', '65f155183d6f21710314776.jpeg', 5, 'Active', '2024-03-13 07:26:16'),
(29, 'Being happy', 1, 104, '44445556', '65f1553b1e6981710314811.jpg', 5, 'Active', '2024-03-13 07:26:51'),
(31, 'Conceptual thinking', 1, 159, '44445557', '65f155886e75f1710314888.jpeg', 5, 'Active', '2024-03-13 07:28:08'),
(32, 'Critical thinking', 1, 159, '44445558', '65f1561357dc91710315027.jpeg', 5, 'Active', '2024-03-13 07:30:27'),
(35, 'Goals', 1, 95, '44445559', '65f156b127f2b1710315185.jpg', 5, 'Active', '2024-03-13 07:33:05'),
(36, 'Klahan', 1, 105, '44446661', '65f156d4dc49e1710315220.jpeg', 7, 'Active', '2024-03-13 07:33:40'),
(37, 'Psychology of money', 1, 131, '55556662', '65f1571f66bb31710315295.jpeg', 5, 'Active', '2024-03-13 07:34:55'),
(38, 'The one thing', 1, 106, '55557345', '65f1574176a201710315329.jpg', 5, 'Active', '2024-03-13 07:35:29'),
(39, 'Think big and wail Ahead', 1, 99, '34534563', '65f1576c03bed1710315372.jpeg', 5, 'Active', '2024-03-13 07:36:12'),
(40, 'who in your room', 1, 99, '75434875', '65f157c1101ce1710315457.png', 5, 'Active', '2024-03-13 07:37:37'),
(41, 'ការគិតបែបបដិបត្តិ', 1, 159, '36345653', '65f15958724141710315864.jpeg', 5, 'Active', '2024-03-13 07:44:24'),
(42, 'ការគិតបែបយុទ្ឋសាស្រ្ត', 1, 159, '6854567', '65f159749db9d1710315892.jpeg', 5, 'Active', '2024-03-13 07:44:52'),
(43, 'ការគិតបែបវិភាគ', 1, 159, '97653346', '65f159927866f1710315922.jpeg', 5, 'Active', '2024-03-13 07:45:22'),
(44, 'ការគិតបែបសមាហរណកម្ម', 1, 159, '43654575', '65f159b0b29751710315952.jpeg', 5, 'Active', '2024-03-13 07:45:52'),
(45, 'ការគិតបែបសំយោគ', 1, 159, '54454658', '65f159c62da0c1710315974.jpeg', 5, 'Active', '2024-03-13 07:46:14'),
(46, 'កុំចុះចាញ់ខ្លួនឯង ង្នកនិងមិនចាញ់', 1, 108, '66453455', '65f159ea0cd701710316010.jpg', 5, 'Active', '2024-03-13 07:46:50'),
(47, 'ខ្លី ខ្លឹម ខ្លាំង គ្មានឃ្លាណាដែល គ្មានប្រយោជន៍', 1, 159, '74456654', '65f15a4c69b8a1710316108.png', 5, 'Active', '2024-03-13 07:48:28'),
(48, 'ខ្លី ខ្លឹម ខ្លាំង គ្មានឃ្លាណាដែល គ្មានប្រយោជន៍', 1, 159, '66453635', '65f15a67603601710316135.jpeg', 5, 'Active', '2024-03-13 07:48:55'),
(49, 'គន្លឹះការអភិវឌ្ឍជំនាញទំនាក់ទំនង', 1, 159, '435674565', '65f15a89b131e1710316169.jpg', 5, 'Active', '2024-03-13 07:49:29'),
(50, 'ចិត្ត​វិទ្យា​អាន​ចិត្ត​មនុស្ស', 1, 159, '534654564', '65f15aa68c8dd1710316198.jpeg', 4, 'Active', '2024-03-20 08:06:08'),
(51, 'ចិត្តវិទ្យាក្នុងការគ្រប់គ្រងពេលវេលា', 1, 151, '23564755', '65f15ad955bdc1710316249.jpeg', 5, 'Active', '2024-03-13 07:50:49'),
(52, 'ចិត្តសាស្ត្រក្នុងការដឹកនាំ', 1, 151, '43674356', '65f15af61ac2f1710316278.png', 5, 'Active', '2024-03-13 07:51:18'),
(53, 'ចិត្តសាស្ត្រនៃការលក់', 1, 166, '43565567', '65f15c5ecf5221710316638.jpg', 5, 'Active', '2024-03-13 07:57:18'),
(54, 'ចិត្តសាស្រ្តទំនាក់ទំនងប្រកបដោយប្រសិទ្ឋិភាព', 1, 153, '457465475', '65f15c9a21bbb1710316698.jpg', 5, 'Active', '2024-03-13 07:58:18'),
(55, 'ចិត្តសាស្រ្តនារីឆ្លាតវៃយកឈ្នះចិត្តបុរស', 1, 112, '456475675', '65f15cc2bc0571710316738.jpg', 5, 'Active', '2024-03-13 07:58:58'),
(56, 'ច្នៃឱ្យដូចសិល្បករ', 1, 113, '76576556', '65f15ce4492cb1710316772.jpeg', 5, 'Active', '2024-03-13 07:59:32'),
(57, 'ជំហានយក្ស', 1, 168, '54645645', '65f15d3191e361710316849.jpg', 5, 'Active', '2024-03-13 08:00:49'),
(58, 'ដើរតាមបេះដូង', 1, 104, '34657568', '65f15d5a96bd81710316890.jpg', 5, 'Active', '2024-03-13 08:01:30'),
(59, 'ត្រឹមត្រូវពូកែមិនគ្រប់គ្រាន', 1, 167, '54365645', '65f15e1654a1c1710317078.jpeg', 5, 'Active', '2024-03-13 08:04:38'),
(60, 'បាត់បង់​តែ​មិន​ចុះ​ចាញ់', 1, 167, '53645645', '65f15e4dcd6601710317133.jpg', 10, 'Active', '2024-03-13 08:05:33'),
(61, 'ផ្តើមធ្វើជំនួញពីលុយ 100$', 1, 117, '46756757', '65f15eea3b1441710317290.jpg', 5, 'Active', '2024-03-13 08:08:10'),
(62, 'ពេលព្រឹក', 1, 118, '54564565', '65f15f878ecf21710317447.jpg', 5, 'Active', '2024-03-13 08:10:47'),
(63, 'ពេលព្រឹកដ៏អស្ចារ្យភាគ២', 1, 118, '43564564', '65f15fa8e224f1710317480.jpg', 5, 'Active', '2024-03-13 08:11:20'),
(64, 'មេដឹកនាំអច្ឆរិយ', 1, 104, '64564566', '65f15ffd259b61710317565.jpeg', 5, 'Active', '2024-03-13 08:12:45'),
(65, 'យុទ្ឋសាស្រ្តដឹកនាំក្នុងពេលមានវិបត្តិ', 1, 169, '54564565', '65f160de1d35b1710317790.jpeg', 5, 'Active', '2024-03-13 08:16:30'),
(66, 'រសជាតិជីវិត', 1, 104, '45364565', '65f1610bbcf601710317835.jpg', 5, 'Active', '2024-03-13 08:17:15'),
(67, 'រស់ក្នុងការពិត', 1, 120, '76556888', '65f1613e474b91710317886.jpg', 5, 'Active', '2024-03-13 08:18:06'),
(68, 'រៀនគិត', 1, 167, '57587865', '65f1615b3f57c1710317915.jpeg', 5, 'Active', '2024-03-13 08:18:35'),
(69, 'រៀនអោយចេះប្រើចំណេះអោយមានប្រយោជន័', 1, 167, '94365475', '65f1617a71b221710317946.jpeg', 5, 'Active', '2024-03-13 08:19:06'),
(70, 'វិធីនិយាយក្នុងចំណោមមហាជន', 1, 167, '46356456', '65f162627a8cb1710318178.jpg', 5, 'Active', '2024-03-13 08:22:58'),
(71, 'វិធីសាងទំនុបចិត្តលើខ្លួនអែង', 1, 164, '46457456', '65f1628b9bf8a1710318219.jpeg', 5, 'Active', '2024-03-13 08:23:39'),
(72, 'វិធីសាស្រ្តប្រគល់ការងារ', 1, 124, '43745645', '65f162edafe8b1710318317.jpg', 5, 'Active', '2024-03-13 08:25:17'),
(73, 'វីធីសាស្រ្តរៀនបែបឆ្លាតវៃ', 1, 131, '95675546', '65f16346b1bce1710318406.jpg', 5, 'Active', '2024-03-13 08:26:46'),
(74, 'A lettle Hare and a Giant Elephant', 1, 94, '75453453', '65f1679c63b691710319516.jpg', 5, 'Active', '2024-03-13 08:45:16'),
(75, 'A Special Gift', 2, 86, '75689656', '65f167e0282d51710319584.jpg', 5, 'Active', '2024-03-13 08:46:24'),
(76, 'Faithfull Friend', 2, 86, '78645754', '65f1681705a091710319639.jpg', 5, 'Active', '2024-03-13 08:47:19'),
(77, 'Free At last', 2, 87, '75434386', '65f1687ab4d171710319738.jpg', 5, 'Active', '2024-03-13 08:48:58'),
(78, 'I want to go and Study overseas', 2, 88, '65646437', '65f16893aace61710319763.jpg', 5, 'Default select', '2024-03-13 08:49:23'),
(79, 'Ivory and Ebony', 2, 89, '98376553', '65f168ca4ba2e1710319818.jpg', 5, 'Active', '2024-03-13 08:50:18'),
(80, 'Khom and the Mongo Tree', 2, 90, '74546543', '65f169171d3591710319895.jpg', 5, 'Active', '2024-03-13 08:51:35'),
(81, 'Larry Wants To Go School', 2, 87, '64575465', '65f16940478351710319936.jpg', 5, 'Active', '2024-03-13 08:52:16'),
(82, 'Lina\'s Dream', 2, 91, '5356453', '65f1697ede87b1710319998.jpg', 5, 'Active', '2024-03-13 08:53:18'),
(83, 'Look out for the elephant', 2, 92, '47885643', '65f16a554a0e41710320213.jpg', 5, 'Active', '2024-03-13 08:56:53'),
(84, 'Minea\'s Wallet', 2, 87, '75684854', '65f16a8eda4ec1710320270.jpg', 5, 'Active', '2024-03-13 08:57:50'),
(85, 'Puppy Lala', 2, 91, '35474344', '65f16aaeb3d201710320302.jpg', 5, 'Active', '2024-03-13 08:58:22'),
(86, 'Sam and the Parrot', 2, 89, '89854554', '65f16ad279b381710320338.jpg', 5, 'Active', '2024-03-13 08:58:58'),
(87, 'Sngout and Water', 2, 93, '58854375', '65f16afa323f31710320378.jpg', 5, 'Active', '2024-03-13 08:59:38'),
(88, 'Sopha and Soben', 2, 91, '94543437', '65f16b252bd681710320421.jpg', 5, 'Default select', '2024-03-13 09:00:21'),
(89, 'Spade Hoe Shove', 2, 87, '23543463', '65f16b4d6bb351710320461.jpg', 5, 'Active', '2024-03-13 09:01:01'),
(90, 'Tev Want to eat Trang Fruit', 2, 93, '984322345', '65f16b9b348271710320539.jpg', 5, 'Active', '2024-03-13 09:02:19'),
(91, 'The Fash and the Ants', 2, 86, '83235435', '65f16bd237eb41710320594.jpg', 6, 'Active', '2024-03-13 09:03:14'),
(92, 'The Father\'s Gift', 2, 95, '932345564', '65f16c01322591710320641.png', 5, 'Active', '2024-03-13 09:04:01'),
(93, 'The Little Wolf', 2, 92, '23544322', '65f16c29361e21710320681.jpg', 5, 'Active', '2024-03-13 09:04:41'),
(94, 'The Nose and the eyes', 2, 96, '23665350', '65f16c5f38b821710320735.jpg', 5, 'Active', '2024-03-13 09:05:35'),
(95, 'The Scarecrow', 2, 87, '34743475', '65f16c7cabcd41710320764.jpg', 5, 'Active', '2024-03-13 09:06:04'),
(96, 'The vase', 2, 89, '57654333', '65f16c9e49ed01710320798.jpg', 5, 'Active', '2024-03-13 09:06:38'),
(97, 'The Wolf and the Stork', 2, 96, '57543454', '65f16cde2a8101710320862.jpg', 5, 'Active', '2024-03-13 09:07:42'),
(98, 'Tree Fighters', 2, 97, '12345432', '65f16d37231761710320951.jpg', 5, 'Active', '2024-03-13 09:09:11'),
(99, 'Two Flocks Ducks', 2, 92, '24365755', '65f16d54155981710320980.jpg', 5, 'Active', '2024-03-13 09:09:40'),
(100, 'Two Sons', 2, 96, '235436554', '65f16dbc28a0f1710321084.jpg', 5, 'Active', '2024-03-13 09:11:24'),
(101, 'Two Words', 2, 98, '46756776', '65f16e10e81e21710321168.jpg', 5, 'Active', '2024-03-13 09:12:48'),
(102, 'កូនអុកសម្ងាត', 3, 85, '75666333', '65f16ee107f381710321377.jpg', 5, 'Active', '2024-03-13 09:16:17'),
(103, 'កេសា', 3, 85, '2474345', '65f16f1c57bc01710321436.jpg', 5, 'Active', '2024-03-13 09:17:16'),
(104, 'ក្បាំងមុខព្រះម៉ែ', 3, 138, '9856675', '65f16f504953e1710321488.jpg', 5, 'Active', '2024-03-13 09:18:08'),
(105, 'គ្មានទេថ្ងៃស្អែកសម្រាប់យើង', 3, 141, '68738653', '65f16f887adeb1710321544.jpg', 5, 'Active', '2024-03-13 09:19:04'),
(106, 'គ្រាដែលយើងព្រាត់', 3, 140, '35654355', '65f16fc2387611710321602.jpg', 5, 'Active', '2024-03-13 09:20:02'),
(107, 'គ្រាមួយនៃបេះដូង', 3, 82, '5343445', '65f16fd968b8b1710321625.jpg', 5, 'Active', '2024-03-13 09:20:25'),
(108, 'ជួបគ្នា១៥ឆ្នាំក្រោយ', 3, 85, '545576654', '65f16fee546bc1710321646.jpg', 7, 'Active', '2024-03-13 09:20:46'),
(109, 'ជំនួញផ្កាស្លា', 3, 143, '54335343', '65f1711990b071710321945.jpg', 5, 'Active', '2024-03-13 09:25:45'),
(110, 'ដួងអាក្រោធន៍', 3, 144, '65434645', '65f1714a35acd1710321994.jpg', 5, 'Active', '2024-03-13 09:26:34'),
(111, 'ត្រកូលចម្លែក', 3, 85, '4547565', '65f1716151c9a1710322017.jpg', 5, 'Active', '2024-03-13 09:26:57'),
(112, 'ទឹកចិត្តឪពុក', 1, 167, '35234534', '65f171b32e7351710322099.jpg', 5, 'Active', '2024-03-13 09:28:19'),
(113, 'ទេវបុត្របញ្ចពណ៍', 3, 146, '45644343', '65f171d5cb9001710322133.jpg', 5, 'Active', '2024-03-13 09:28:53'),
(114, 'ធ្វើជាមនុស្សធំម្នាក់', 3, 147, '234567654', '65f171f6af4cf1710322166.jpg', 5, 'Active', '2024-03-13 09:29:26'),
(115, 'បណ្ដាសាព្រះចន្ទក្រហម', 3, 148, '35787897', '65f17261099631710322273.jpg', 5, 'Active', '2024-03-13 09:31:13'),
(116, 'បន្ទាត់ខណ្ឌ', 3, 149, '34675564', '65f17294e5e081710322324.jpg', 5, 'Active', '2024-03-13 09:32:04'),
(117, 'បើយើងចួបគ្នាម្ដងទៀត', 3, 150, '2784345', '65f172c3a32a01710322371.jpg', 5, 'Active', '2024-03-13 09:32:51'),
(118, 'បេសកកម្មមួយ ទាសករផ្លូវចិត្ត', 3, 85, '12312442', '65f172ee2a65d1710322414.jpg', 5, 'Active', '2024-03-13 09:33:34'),
(119, 'ផ្ទះកណ្ដាលបឹង វគ្គ២', 3, 156, '45676564', '65f173144c4be1710322452.jpg', 5, 'Active', '2024-03-13 09:34:12'),
(120, 'ពិការផ្លូវចិត្ត អរូប', 3, 144, '23253453', '65f17335947851710322485.jpg', 5, 'Active', '2024-03-13 09:34:45'),
(121, 'ពិការផ្លូវចិត្ត', 3, 144, '35564675', '65f173ac9c26b1710322604.jpg', 5, 'Active', '2024-03-13 09:36:44'),
(122, 'ពិណសាងស្នេហ៏', 3, 140, '564687675', '65f173c66564a1710322630.jpg', 5, 'Active', '2024-03-13 09:37:10'),
(123, 'ពិភពលោកសខ្មៅ', 3, 151, '45565668', '65f173f35b35f1710322675.jpg', 5, 'Active', '2024-03-13 09:37:55'),
(124, 'ពូអាយឡាវយូ', 3, 152, '776754467', '65f17427ea8e91710322727.jpg', 5, 'Active', '2024-03-13 09:38:47'),
(125, 'ព្រាយក្រឡាភ្លើង', 3, 85, '56786543', '65f17440579d71710322752.jpg', 5, 'Active', '2024-03-13 09:39:12'),
(126, 'ព្រោះគេគ្មានបេះដូង', 3, 153, '54764579', '65f17462b75411710322786.jpg', 5, 'Active', '2024-03-13 09:39:46'),
(128, 'ព្រះនាងមុន១០០០', 3, 171, '566543452', '65f1753024d561710322992.jpg', 5, 'Active', '2024-03-13 09:43:12'),
(129, 'ភពផែនវិនាស', 3, 85, '92135344', '65f175526a0d71710323026.jpg', 5, 'Active', '2024-03-13 09:43:46'),
(130, 'ភូមិគ្រឹះវិញ្ញាណស្នេហ៍', 3, 85, '483324343', '65f1756dd775a1710323053.jpg', 5, 'Active', '2024-03-13 09:44:13'),
(131, 'ភ្នែកឃើញខ្មោច', 3, 85, '678986543', '65f178258ccee1710323749.jpg', 5, 'Active', '2024-03-13 09:55:49'),
(132, 'មឈូសកូនបង', 3, 156, '534534645', '65f178458a1411710323781.jpg', 7, 'Active', '2024-03-13 09:56:21'),
(133, 'មនុស្សគល់ឈើ២', 3, 139, '54647354', '65f17866f2adf1710323814.jpg', 5, 'Active', '2024-03-13 09:56:54'),
(134, 'មន្រ្តានិងការវិលតហរឡប់របស់គីតូ', 3, 139, '987323453', '65f17887bb04d1710323847.jpg', 5, 'Active', '2024-03-13 09:57:27'),
(135, 'អ្នកស្នងជំនាន់ទី១៩៥', 3, 100, '345238967', '65f178abed7561710323883.jpg', 5, 'Active', '2024-03-13 09:58:03'),
(136, 'អារក្សខ្មៅបណ្តាសា', 3, 147, '66545345', '65f17902de1c91710323970.jpg', 5, 'Active', '2024-03-13 09:59:30'),
(137, 'អារក្សខ្មៅ', 3, 147, '5686567', '65f1791f49c211710323999.jpg', 5, 'Active', '2024-03-13 09:59:59'),
(138, 'អថ័នរូបចម្លាក់ក្រមួន', 3, 85, '6465757', '65f179360014d1710324022.jpg', 5, 'Active', '2024-03-13 10:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `tblborrow`
--

CREATE TABLE `tblborrow` (
  `borrow_id` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `PersonId` int(11) NOT NULL,
  `TotalBook` int(11) NOT NULL,
  `BorrowBook` date NOT NULL,
  `ReturnBook` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblborrow`
--

INSERT INTO `tblborrow` (`borrow_id`, `BookId`, `PersonId`, `TotalBook`, `BorrowBook`, `ReturnBook`, `status`) VALUES
(1, 11, 2, 1, '2024-03-19', '2024-03-21', 'Paid'),
(2, 20, 3, 1, '2024-03-19', '2024-03-21', 'Paid'),
(3, 22, 12, 1, '2024-03-20', '2024-03-27', 'Borrowing'),
(4, 50, 5, 1, '2024-03-20', '2024-03-22', 'Borrowing');

--
-- Triggers `tblborrow`
--
DELIMITER $$
CREATE TRIGGER `insert_book` AFTER INSERT ON `tblborrow` FOR EACH ROW BEGIN
    DECLARE current_amount INT;
    SET current_amount = NEW.TotalBook;
    UPDATE tblbooks SET Amount = Amount - current_amount
    WHERE id = NEW.BookID;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_book` AFTER UPDATE ON `tblborrow` FOR EACH ROW BEGIN
    DECLARE current_amount INT;
    SET current_amount = NEW.TotalBook;
    UPDATE tblbooks SET Amount = Amount - current_amount
    WHERE id = NEW.BookID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblbroken`
--

CREATE TABLE `tblbroken` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `broken_book` int(11) NOT NULL,
  `price` float NOT NULL,
  `detail_broken` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbroken`
--

INSERT INTO `tblbroken` (`id`, `person_id`, `book_id`, `broken_book`, `price`, `detail_broken`, `date`) VALUES
(1, 2, 11, 1, 10, 'Book wet ', '2024-03-20 06:07:35'),
(4, 3, 20, 1, 10, 'Torn', '2024-03-20 07:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`) VALUES
(1, 'Sefthelpe'),
(2, 'Story Book'),
(3, 'Novel'),
(5, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `tblperson`
--

CREATE TABLE `tblperson` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `MobileNumber` char(12) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblperson`
--

INSERT INTO `tblperson` (`id`, `FullName`, `Gender`, `EmailId`, `MobileNumber`, `Status`, `RegDate`, `UpdationDate`) VALUES
(2, 'Chhany', 'Male', 'frog12@gmail.com', '095345344', 'Active', '2024-03-13 16:19:32', NULL),
(3, 'Chhin Nalim', 'Male', 'lim@gmail.com', '023434534', 'Active', '2024-03-13 16:20:17', '2024-03-13 16:25:43'),
(4, 'Chhun Rosa', 'Female', 'rosa05@gmail.com', '098534564', 'Active', '2024-03-20 08:00:44', NULL),
(5, 'Liit Mino', 'Male', 'lit017@gmail.com', '098425545', 'Active', '2024-03-20 08:01:15', NULL),
(6, 'Chhu Mengleang', 'Male', 'leang@gmail.com', '0354645645', 'Active', '2024-03-20 08:01:44', NULL),
(7, 'Dalin Sor', 'Female', 'linlin@gmail.com', '012546789', 'Active', '2024-03-20 08:02:15', NULL),
(8, 'July nana', 'Female', 'lyly@gmail.com', '0823545464', 'Active', '2024-03-20 08:02:41', NULL),
(9, 'Vina Chhit', 'Male', 'chhit@gmail.com', '0234353534', 'Active', '2024-03-20 08:03:13', NULL),
(10, 'Pich Chinna', 'Female', 'pich01@gmail.com', '023423534', 'Active', '2024-03-20 08:03:50', NULL),
(11, 'Sok Chan', 'Male', 'jkeachan@gmail.com', '029354534', 'Active', '2024-03-20 08:04:14', NULL),
(12, 'Ty Sokhy', 'Male', 'sokhy@gmail.com', '0235534643', 'Active', '2024-03-20 08:05:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblreturn`
--

CREATE TABLE `tblreturn` (
  `id` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `returnDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreturn`
--

INSERT INTO `tblreturn` (`id`, `person_id`, `book_id`, `amount`, `returnDate`, `status`) VALUES
(1, 12, 22, 1, '2024-03-26 17:00:00', 'Paid');

--
-- Triggers `tblreturn`
--
DELIMITER $$
CREATE TRIGGER `returnBook` AFTER INSERT ON `tblreturn` FOR EACH ROW BEGIN
    DECLARE current_amount INT;
    SET current_amount = NEW.amount;
    UPDATE tblbooks SET Amount = Amount + current_amount
    WHERE id = NEW.book_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_borrow`
-- (See below for the actual view)
--
CREATE TABLE `v_borrow` (
`borrow_id` int(11)
,`BookName` varchar(255)
,`FullName` varchar(120)
,`TotalBook` int(11)
,`BorrowBook` date
,`ReturnBook` date
,`status` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `v_borrow`
--
DROP TABLE IF EXISTS `v_borrow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_borrow`  AS SELECT `bw`.`borrow_id` AS `borrow_id`, `bk`.`BookName` AS `BookName`, `p`.`FullName` AS `FullName`, `bw`.`TotalBook` AS `TotalBook`, `bw`.`BorrowBook` AS `BorrowBook`, `bw`.`ReturnBook` AS `ReturnBook`, `bw`.`status` AS `status` FROM ((`tblborrow` `bw` join `tblbooks` `bk` on(`bw`.`BookId` = `bk`.`id`)) join `tblperson` `p` on(`bw`.`PersonId` = `p`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblauthors`
--
ALTER TABLE `tblauthors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CatId` (`CatId`),
  ADD KEY `AuthorId` (`AuthorId`);

--
-- Indexes for table `tblborrow`
--
ALTER TABLE `tblborrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `BookId` (`BookId`) USING BTREE,
  ADD KEY `PersonId` (`PersonId`) USING BTREE;

--
-- Indexes for table `tblbroken`
--
ALTER TABLE `tblbroken`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `book_id` (`book_id`),
  ADD UNIQUE KEY `person_id` (`person_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblperson`
--
ALTER TABLE `tblperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreturn`
--
ALTER TABLE `tblreturn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblauthors`
--
ALTER TABLE `tblauthors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `tblbooks`
--
ALTER TABLE `tblbooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tblborrow`
--
ALTER TABLE `tblborrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblbroken`
--
ALTER TABLE `tblbroken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblperson`
--
ALTER TABLE `tblperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblreturn`
--
ALTER TABLE `tblreturn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbooks`
--
ALTER TABLE `tblbooks`
  ADD CONSTRAINT `tblbooks_ibfk_1` FOREIGN KEY (`AuthorId`) REFERENCES `tblauthors` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbooks_ibfk_2` FOREIGN KEY (`CatId`) REFERENCES `tblcategory` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblborrow`
--
ALTER TABLE `tblborrow`
  ADD CONSTRAINT `tblborrow_ibfk_1` FOREIGN KEY (`BookId`) REFERENCES `tblbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblborrow_ibfk_2` FOREIGN KEY (`PersonId`) REFERENCES `tblperson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblbroken`
--
ALTER TABLE `tblbroken`
  ADD CONSTRAINT `tblbroken_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tblperson` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tblbroken_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `tblbooks` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tblreturn`
--
ALTER TABLE `tblreturn`
  ADD CONSTRAINT `tblreturn_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tblperson` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblreturn_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `tblbooks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
