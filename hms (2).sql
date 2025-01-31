-- Volcado SQL de phpMyAdmin
-- versión 5.2.1
-- https://www.phpmyadmin.net/ (sitio oficial de phpMyAdmin)
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2025 a las 20:17:56
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hms`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 'Demo test', 7, 6, 600, '2019-06-29', '9:15 AM', '2019-06-23 18:31:28', 1, 0, '0000-00-00 00:00:00'),
(4, 'Ayurveda', 5, 5, 8050, '2019-11-08', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '0000-00-00 00:00:00'),
(5, 'Dermatologist', 9, 7, 500, '2019-11-30', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2019-11-10 18:48:30'),
(6, 'General Physician', 6, 2, 2500, '2022-07-22', '6:30 PM', '2022-07-15 21:24:38', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'Anuj', 'New Delhi', '500', 8285703354, 'anuj.lpu1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:25:37', '2019-06-30 12:11:05'),
(2, 'Homeopath', 'Sarita Pandey', 'Varanasi', '600', 2147483647, 'sarita@gmail.com', 'pablito', '2016-12-29 06:51:51', '2025-01-16 17:13:32'),
(3, 'General Physician', 'Nitesh Kumar', 'Ghaziabad', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35', '0000-00-00 00:00:00'),
(4, 'Homeopath', 'Vijay Verma', 'New Delhi', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09', '0000-00-00 00:00:00'),
(5, 'Ayurveda', 'Sanjeev', 'Gurugram', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07', '0000-00-00 00:00:00'),
(6, 'General Physician', 'Amrita', 'New Delhi India', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50', '0000-00-00 00:00:00'),
(7, 'Demo test', 'abc ', 'New Delhi India', '200', 852888888, 'test@demo.com', 'pablito123', '2017-01-07 08:08:58', '2025-01-16 17:14:28'),
(8, 'Ayurveda', 'Test Doctor', 'Xyz Abc New Delhi', '600', 1234567890, 'test@test.com', '202cb962ac59075b964b07152d234b70', '2019-06-23 17:57:43', '2019-06-23 18:06:06'),
(9, 'Dermatologist', 'Anuj kumar', 'New Delhi India 110001', '500', 1234567890, 'anujk@test.com', 'pablito', '2019-11-10 18:37:47', '2025-01-16 17:10:44'),
(10, 'dentista', 'pablo', 'abancay', 'dasdsada', 950477314, '212147@gmail.com', '08d73df56eabed0bb5dec9346fd8570b', '2025-01-17 14:52:18', '2025-01-17 14:54:37'),
(11, 'Dentist', 'pablo', 'santa teresita', '2000', 950477314, 'test@demo1.com', '08d73df56eabed0bb5dec9346fd8570b', '2025-01-17 14:57:25', NULL),
(12, 'Dermatologist', 'pablo1', 'santaterisita', '2000', 950477314, 'test@demo2.com', '08d73df56eabed0bb5dec9346fd8570b', '2025-01-17 20:36:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-07-15 20:59:57', '16-07-2022 02:30:39 AM', 1),
(21, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2022-07-15 21:25:47', '16-07-2022 02:56:57 AM', 1),
(22, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2025-01-15 23:22:49', NULL, 0),
(23, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2025-01-15 23:23:08', NULL, 0),
(24, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2025-01-15 23:24:17', NULL, 0),
(25, 7, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-15 23:25:35', '16-01-2025 04:56:22 AM', 1),
(26, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:33:56', NULL, 0),
(27, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:34:11', NULL, 0),
(28, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:36:44', NULL, 0),
(29, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:36:54', NULL, 0),
(30, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:37:06', NULL, 0),
(31, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:37:34', NULL, 0),
(32, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:37:45', NULL, 0),
(33, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:00:57', NULL, 0),
(34, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:01:05', NULL, 0),
(35, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:01:17', NULL, 0),
(36, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:01:40', NULL, 0),
(37, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:02:59', NULL, 0),
(38, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:03:08', NULL, 0),
(39, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:03:28', NULL, 0),
(40, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:03:38', NULL, 0),
(41, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:04:46', NULL, 0),
(42, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:07:37', NULL, 0),
(43, NULL, 'anujk@test.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:11:02', NULL, 0),
(44, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:11:42', NULL, 0),
(45, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:11:48', NULL, 0),
(46, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:12:03', NULL, 0),
(47, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:12:13', NULL, 0),
(48, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:12:24', NULL, 0),
(49, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:12:32', NULL, 0),
(50, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:12:44', NULL, 0),
(51, NULL, 'sarita@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:14:02', NULL, 0),
(52, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:14:42', NULL, 0),
(53, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:14:53', NULL, 0),
(54, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:01', NULL, 0),
(55, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:12', NULL, 0),
(56, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:20', NULL, 0),
(57, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:29', NULL, 0),
(58, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:37', NULL, 0),
(59, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:15:48', NULL, 0),
(60, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:16:30', NULL, 0),
(61, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:16:39', NULL, 0),
(62, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:16:55', NULL, 0),
(63, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:17:08', NULL, 0),
(64, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:17:36', NULL, 0),
(65, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:17:45', NULL, 0),
(66, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:18:03', NULL, 0),
(67, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:18:26', NULL, 0),
(68, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:19:02', NULL, 0),
(69, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:19:57', NULL, 0),
(70, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:42:33', NULL, 0),
(71, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:43:35', NULL, 0),
(72, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:49:21', NULL, 0),
(73, NULL, '212147@gmaill.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:53:08', NULL, 0),
(74, NULL, '212147@gmaill.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:54:50', NULL, 0),
(75, NULL, '212147@gmaill.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:55:04', NULL, 0),
(76, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:57:47', '17-01-2025 08:28:22 PM', 1),
(77, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-17 15:17:16', '17-01-2025 10:03:02 PM', 1),
(78, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-17 16:44:02', '17-01-2025 10:59:33 PM', 1),
(79, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-17 19:24:43', '18-01-2025 12:56:46 AM', 1),
(80, NULL, ' test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-17 20:44:28', NULL, 0),
(81, 12, 'test@demo2.com', 0x3a3a3100000000000000000000000000, '2025-01-17 20:44:40', '18-01-2025 02:27:05 AM', 1),
(82, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 16:08:05', NULL, 1),
(83, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 16:40:01', '20-01-2025 11:37:35 PM', 1),
(84, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 18:07:45', '20-01-2025 11:38:34 PM', 1),
(85, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 18:10:41', '21-01-2025 12:36:05 AM', 1),
(86, NULL, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 19:06:15', NULL, 0),
(87, NULL, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 19:06:24', NULL, 0),
(88, NULL, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 19:06:44', NULL, 0),
(89, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-20 19:07:22', NULL, 0),
(90, 11, 'test@demo1.com', 0x3a3a3100000000000000000000000000, '2025-01-20 19:07:27', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50'),
(13, '', '2025-01-16 01:48:28', NULL),
(14, '', '2025-01-16 01:50:20', NULL),
(15, '', '2025-01-16 01:50:34', NULL),
(16, 'dentista', '2025-01-17 20:33:23', NULL),
(17, '', '2025-01-17 20:34:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patient_status`
--

CREATE TABLE `patient_status` (
  `ID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `Status` enum('Activo','Inactivo') NOT NULL,
  `FechaAtencion` date DEFAULT NULL,
  `HoraAtencion` time DEFAULT NULL,
  `FechaFinalizacion` date DEFAULT NULL,
  `HoraFinalizacion` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Anuj kumar', 'test123@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', NULL, NULL, NULL),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(2, 3, '120/185', '80/120', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '2019-11-06 04:20:07'),
(3, 2, '90/120', '92/190', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '2019-11-06 04:31:24'),
(4, 1, '125/200', '86/120', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '2019-11-06 04:52:42'),
(5, 1, '96/120', '98/120', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '2019-11-06 04:56:55'),
(6, 4, '90/120', '120', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '2019-11-06 14:38:33'),
(7, 5, '80/120', '120', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '2019-11-10 18:50:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`, `Estado`) VALUES
(1, 1, 'Manisha Jha', 4558968789, 'test@gmail.com', 'Female', '\"\"J&K Block J-127, Laxmi Nagar New Delhi', 26, 'She is diabetic patient', '2019-11-04 21:38:06', '2019-11-06 06:48:05', 'activo'),
(2, 5, 'Raghu Yadav', 9797977979, 'raghu@gmail.com', 'Male', 'ABC Apartment Mayur Vihar Ph-1 New Delhi', 39, 'No', '2019-11-05 10:40:13', '2019-11-05 11:53:45', 'activo'),
(3, 7, 'Mansi', 9878978798, 'jk@gmail.com', 'Female', '\"fdghyj', 46, 'No', '2019-11-05 10:49:41', '2019-11-05 11:58:59', 'activo'),
(4, 7, 'Manav Sharma', 9888988989, 'sharma@gmail.com', 'Male', 'L-56,Ashok Nagar New Delhi-110096', 45, 'He is long suffered by asthma', '2019-11-06 14:33:54', '2019-11-06 14:34:31', 'activo'),
(5, 9, 'John', 1234567890, 'john@test.com', 'male', 'Test ', 25, 'THis is sample text for testing.', '2019-11-10 18:49:24', NULL, 'activo'),
(6, 11, 'pablo velazco serrano', 950477652, '212147@hotmail.com', 'male', 'las malvinas', 20, 'si aplica', '2025-01-17 17:05:13', '2025-01-20 19:00:42', 'inactivo'),
(7, 12, 'amilcar cahuana', 950477652, 'amilcar@hotmail.com', 'male', 'las malvinas', 25, 'si aplica', '2025-01-17 20:48:00', NULL, 'activo'),
(8, 11, 'Pablo Velazco', 987456321, 'pablo@gmail.com', 'male', 'av.chile', 20, 'si', '2025-01-20 18:23:11', NULL, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-07-15 20:57:20', NULL, 0),
(25, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-07-15 20:57:57', '16-07-2022 02:29:28 AM', 1),
(26, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2022-07-15 21:11:12', '16-07-2022 02:55:17 AM', 1),
(27, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:07:11', '16-01-2025 05:37:51 AM', 1),
(28, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:09:36', '16-01-2025 05:39:44 AM', 1),
(29, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:10:03', '16-01-2025 05:40:06 AM', 1),
(30, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:13:16', NULL, 0),
(31, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:13:25', '16-01-2025 06:03:16 AM', 1),
(32, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:33:29', NULL, 0),
(33, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:33:37', '16-01-2025 06:03:42 AM', 1),
(34, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 00:56:41', '16-01-2025 06:55:51 AM', 1),
(35, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 02:58:56', '16-01-2025 08:37:14 AM', 1),
(36, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 04:06:05', '16-01-2025 07:06:43 PM', 1),
(37, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 13:38:20', '16-01-2025 07:08:37 PM', 1),
(38, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 14:19:29', '16-01-2025 07:49:46 PM', 1),
(39, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 14:38:47', '16-01-2025 08:12:50 PM', 1),
(40, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 17:21:50', '16-01-2025 10:58:39 PM', 1),
(41, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-16 19:51:30', '17-01-2025 07:10:44 PM', 1),
(42, NULL, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:18:19', NULL, 0),
(43, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:18:38', '17-01-2025 07:49:14 PM', 1),
(44, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:39:03', '17-01-2025 08:09:22 PM', 1),
(45, 8, 'test@demo.com', 0x3a3a3100000000000000000000000000, '2025-01-17 14:46:59', '17-01-2025 08:17:08 PM', 1),
(46, 10, 'pablo@hotmail.com', 0x3a3a3100000000000000000000000000, '2025-01-17 20:40:48', '18-01-2025 02:14:12 AM', 1),
(47, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2025-01-20 18:08:53', '20-01-2025 11:39:28 PM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(2, 'Sarita pandey', 'New Delhi India', 'Delhi', 'female', 'test@gmail.com', '7719f1e81b76ef1409b07dbca07bff4d', '2016-12-30 05:34:39', '0000-00-00 00:00:00'),
(4, 'Rahul Singh', 'New Delhi', 'New delhi', 'male', 'rahul@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:41:14', '0000-00-00 00:00:00'),
(5, 'Amit kumar', 'New Delhi India', 'Delhi', 'male', 'amit12@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:00:26', '0000-00-00 00:00:00'),
(6, 'Test user', 'New Delhi', 'Delhi', 'male', 'tetuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-06-23 18:24:53', '2019-06-23 18:36:09'),
(7, 'John', 'USA', 'Newyork', 'male', 'john@test.com', 'f925916e2754e5e03f75dd58a5733251', '2019-11-10 18:40:21', '2019-11-10 18:40:51'),
(8, 'pablo velazco', 'jr.los reyes', 'abancay', 'masculino', 'test@demo.com', '7719f1e81b76ef1409b07dbca07bff4d', '2025-01-17 14:44:53', NULL),
(9, 'mijamin', 'jr.los reyes', 'abancay', 'masculino', 'mija@gmai.com', '25d55ad283aa400af464c76d713c07ad', '2025-01-17 14:48:01', NULL),
(10, 'pablo velazco serrano', 'jr.los reyes', 'abancay paurimac', 'masculino', 'pablo@hotmail.com', '08d73df56eabed0bb5dec9346fd8570b', '2025-01-17 20:40:30', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `patient_status`
--
ALTER TABLE `patient_status`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indices de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `patient_status`
--
ALTER TABLE `patient_status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `patient_status`
--
ALTER TABLE `patient_status`
  ADD CONSTRAINT `patient_status_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `tblpatient` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
