-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2023 at 10:26 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indiastock`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitylog`
--

CREATE TABLE `activitylog` (
  `id` int(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `how` varchar(255) NOT NULL,
  `activityid` varchar(255) NOT NULL,
  `supportid` int(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `added_by` int(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(100) NOT NULL,
  `updated_on` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitylog`
--

INSERT INTO `activitylog` (`id`, `activity`, `remark`, `how`, `activityid`, `supportid`, `department`, `category`, `ip`, `city`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'Customer Approved/Reject', '', 'By Software', '25 ', 25, 'User', 'Customer Approved/Reject', '::1', '', 1, '2022-12-31 17:39:11', 1, '2022-12-31', 1),
(2, 'Customer Approved/Reject', '', 'By Software', '26 ', 26, 'User', 'Customer Approved/Reject', '::1', '', 1, '2023-01-02 23:19:58', 1, '2023-01-02', 1),
(3, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:36:17', 1, '2023-01-03', 1),
(4, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:36:42', 1, '2023-01-03', 1),
(5, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:37:11', 1, '2023-01-03', 1),
(6, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:39:16', 1, '2023-01-03', 1),
(7, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:46:16', 1, '2023-01-03', 1),
(8, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:55:32', 1, '2023-01-03', 1),
(9, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:55:59', 1, '2023-01-03', 1),
(10, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-03 23:56:06', 1, '2023-01-03', 1),
(11, 'Add Customer', '', 'By Software', '30', 30, 'User', 'Add Customer', '::1', '', 0, '2023-01-05 23:39:31', 0, '2023-01-05', 1),
(12, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-06 00:16:14', 1, '2023-01-06', 1),
(13, 'Withdrawal Request Approved/Disapprove', '', 'By Software', '2 ', 2, 'User', 'Withdrawal Request Approved/Disapprove', '::1', '', 1, '2023-01-06 00:16:22', 1, '2023-01-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccountchange`
--

CREATE TABLE `bankaccountchange` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `accountno` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankaccountchange`
--

INSERT INTO `bankaccountchange` (`id`, `userid`, `bankname`, `accountno`, `ifsc`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 26, 'Kotak Mahindra', '1254552252', 'KKBK44554', 26, '2023-01-11 22:40:55', 26, '2023-01-11 22:40:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `codegenerator`
--

CREATE TABLE `codegenerator` (
  `id` int(255) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `number` int(10) NOT NULL,
  `pattern` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `addedon` datetime NOT NULL,
  `addedby` int(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `codegenerator`
--

INSERT INTO `codegenerator` (`id`, `prefix`, `number`, `pattern`, `category`, `addedon`, `addedby`, `status`) VALUES
(18, 'USER', 7, '{prefix}{number}', 'usercode', '2022-07-21 17:39:12', 24, 1),
(19, 'PMSE', 57, '{prefix}{number}', 'employeecode', '2022-07-21 17:39:12', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `country_name` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `country_name`, `iso3`, `numcode`, `phonecode`, `status`) VALUES
(1, 'IN', 'INDIA', 'India', 'IND', 356, 91, 1),
(2, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1, 1),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213, 1),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684, 1),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376, 1),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244, 1),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264, 1),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0, 1),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268, 1),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54, 1),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374, 1),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297, 1),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61, 1),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43, 1),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994, 1),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242, 1),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973, 1),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880, 1),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246, 1),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375, 1),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32, 1),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501, 1),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229, 1),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441, 1),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975, 1),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591, 1),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387, 1),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267, 1),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0, 1),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55, 1),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246, 1),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673, 1),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359, 1),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226, 1),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257, 1),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855, 1),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237, 1),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238, 1),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345, 1),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236, 1),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235, 1),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56, 1),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86, 1),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61, 1),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672, 1),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57, 1),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269, 1),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242, 1),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242, 1),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682, 1),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506, 1),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', 'CIV', 384, 225, 1),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385, 1),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53, 1),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357, 1),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420, 1),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45, 1),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253, 1),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767, 1),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809, 1),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593, 1),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20, 1),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503, 1),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240, 1),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291, 1),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372, 1),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251, 1),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500, 1),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298, 1),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679, 1),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358, 1),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33, 1),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594, 1),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689, 1),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0, 1),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241, 1),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220, 1),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995, 1),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49, 1),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233, 1),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350, 1),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30, 1),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299, 1),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473, 1),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590, 1),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671, 1),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502, 1),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224, 1),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245, 1),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592, 1),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509, 1),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0, 1),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39, 1),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504, 1),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852, 1),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36, 1),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354, 1),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62, 1),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98, 1),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964, 1),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353, 1),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972, 1),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39, 1),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876, 1),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81, 1),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962, 1),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7, 1),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254, 1),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686, 1),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', 'PRK', 408, 850, 1),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82, 1),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965, 1),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996, 1),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', 'LAO', 418, 856, 1),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371, 1),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961, 1),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266, 1),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231, 1),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218, 1),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423, 1),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370, 1),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352, 1),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853, 1),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389, 1),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261, 1),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265, 1),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60, 1),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960, 1),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223, 1),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356, 1),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692, 1),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596, 1),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222, 1),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230, 1),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269, 1),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52, 1),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691, 1),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373, 1),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377, 1),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976, 1),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664, 1),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212, 1),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258, 1),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95, 1),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264, 1),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674, 1),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977, 1),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31, 1),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599, 1),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687, 1),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64, 1),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505, 1),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227, 1),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234, 1),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683, 1),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672, 1),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670, 1),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47, 1),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968, 1),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92, 1),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680, 1),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970, 1),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507, 1),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675, 1),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595, 1),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51, 1),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63, 1),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0, 1),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48, 1),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351, 1),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787, 1),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974, 1),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262, 1),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40, 1),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70, 1),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250, 1),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290, 1),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869, 1),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758, 1),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508, 1),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784, 1),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684, 1),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378, 1),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239, 1),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966, 1),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221, 1),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381, 1),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248, 1),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232, 1),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65, 1),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421, 1),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386, 1),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677, 1),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252, 1),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27, 1),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0, 1),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34, 1),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94, 1),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249, 1),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597, 1),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47, 1),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268, 1),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46, 1),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41, 1),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963, 1),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886, 1),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992, 1),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255, 1),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66, 1),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670, 1),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228, 1),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690, 1),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676, 1),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868, 1),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216, 1),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90, 1),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370, 1),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649, 1),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688, 1),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256, 1),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380, 1),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971, 1),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598, 1),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998, 1),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678, 1),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58, 1),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84, 1),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284, 1),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340, 1),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681, 1),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212, 1),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967, 1),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260, 1),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263, 1),
(240, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93, 1),
(241, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355, 1);

-- --------------------------------------------------------

--
-- Table structure for table `fundrequest`
--

CREATE TABLE `fundrequest` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `transactionid` varchar(255) NOT NULL,
  `paymentmethod` varchar(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fundrequest`
--

INSERT INTO `fundrequest` (`id`, `userid`, `amount`, `mobile`, `transactionid`, `paymentmethod`, `added_on`, `updated_on`, `status`) VALUES
(1, 26, 1000, '1222112222', 'dsad45a5d', 'GPAY', '2023-01-11 23:25:58', '2023-01-11 23:25:58', 1),
(2, 26, 400, '4525245587', 'TR45458', 'Phonepy', '2023-01-12 00:36:05', '2023-01-12 00:36:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `ipaddress` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`id`, `username`, `datetime`, `ipaddress`, `userid`, `status`) VALUES
(1, 'Admin', '2022-12-26 00:28:25', '::1', 1, 1),
(2, 'Admin', '2022-12-26 00:34:17', '::1', 1, 1),
(3, 'Admin', '2022-12-26 23:43:56', '::1', 1, 1),
(4, 'Admin', '2022-12-31 13:28:56', '::1', 1, 1),
(5, 'Admin', '2023-01-01 12:02:27', '::1', 1, 1),
(6, 'Husain', '2023-01-01 13:10:27', '::1', 20, 1),
(7, 'Admin', '2023-01-01 14:00:55', '::1', 1, 1),
(8, 'Admin', '2023-01-01 16:29:58', '::1', 1, 1),
(9, 'Admin', '2023-01-01 23:54:05', '::1', 1, 1),
(10, 'Admin', '2023-01-02 21:24:50', '::1', 1, 1),
(11, 'Admin', '2023-01-02 21:25:30', '::1', 1, 1),
(12, 'Admin', '2023-01-02 21:25:53', '::1', 1, 1),
(13, 'Admin', '2023-01-02 21:27:57', '::1', 1, 1),
(14, 'Admin', '2023-01-02 21:30:11', '::1', 1, 1),
(15, 'Admin', '2023-01-02 21:32:05', '::1', 1, 1),
(16, 'Admin', '2023-01-02 21:38:40', '::1', 1, 1),
(17, 'Admin', '2023-01-02 21:44:48', '::1', 1, 1),
(18, 'Singh', '2023-01-02 21:45:37', '::1', 29, 1),
(19, 'Singh', '2023-01-02 21:47:34', '::1', 29, 1),
(20, 'Admin', '2023-01-02 21:59:47', '::1', 1, 1),
(21, 'Admin', '2023-01-02 23:19:49', '::1', 1, 1),
(22, 'mohan', '2023-01-02 23:28:11', '::1', 26, 1),
(23, 'Admin', '2023-01-02 23:36:30', '::1', 1, 1),
(24, 'Admin', '2023-01-03 00:31:49', '::1', 1, 1),
(25, 'mohan', '2023-01-03 21:04:04', '::1', 26, 1),
(26, 'mohan', '2023-01-03 21:14:21', '::1', 26, 1),
(27, 'mohan', '2023-01-04 22:51:28', '::1', 26, 1),
(28, 'Admin', '2023-01-04 23:54:54', '::1', 1, 1),
(29, 'Admin', '2023-01-05 00:41:57', '::1', 1, 1),
(30, 'Admin', '2023-01-05 21:36:10', '::1', 1, 1),
(31, 'Admin', '2023-01-06 23:33:47', '::1', 1, 1),
(32, 'Admin', '2023-01-07 12:55:14', '::1', 1, 1),
(33, 'Admin', '2023-01-07 14:00:49', '::1', 1, 1),
(34, 'Admin', '2023-01-07 15:22:43', '::1', 1, 1),
(35, 'mohan', '2023-01-07 15:42:49', '::1', 26, 1),
(36, 'mohan', '2023-01-07 16:07:01', '::1', 26, 1),
(37, 'Admin', '2023-01-07 17:00:27', '::1', 1, 1),
(38, 'mohan', '2023-01-07 17:17:58', '::1', 26, 1),
(39, 'Admin', '2023-01-07 17:53:34', '::1', 1, 1),
(40, 'mohan', '2023-01-07 17:53:53', '::1', 26, 1),
(41, 'mohan', '2023-01-07 18:12:12', '::1', 26, 1),
(42, 'Admin', '2023-01-08 14:49:53', '::1', 1, 1),
(43, 'mohan', '2023-01-09 21:36:55', '::1', 26, 1),
(44, 'mohan', '2023-01-09 23:56:20', '::1', 26, 1),
(45, 'mohan', '2023-01-10 00:50:51', '::1', 26, 1),
(46, 'Admin', '2023-01-10 23:24:47', '::1', 1, 1),
(47, 'mohan', '2023-01-11 00:44:23', '::1', 26, 1),
(48, 'Admin', '2023-01-11 23:28:42', '::1', 1, 1),
(49, 'mohan', '2023-01-12 00:58:33', '::1', 26, 1),
(50, 'mohan', '2023-01-14 14:06:50', '::1', 26, 1),
(51, 'mohan', '2023-01-14 21:59:27', '::1', 26, 1),
(52, 'mohan', '2023-01-15 09:58:31', '::1', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `readstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `senderid`, `receiverid`, `subject`, `message`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`, `readstatus`) VALUES
(12, 26, 1, 'i have added money', '<p><span style=\"font-family: \'Century Gothic\'; font-size: 16px;\">money added</span></p>', '2023-01-07 20:44:12', 26, '2023-01-07 20:44:12', 26, 1, 1),
(13, 26, 1, 'Hay did you see my message', '<p><span style=\"font-family: \'Century Gothic\'; font-size: 16px;\">I have added mony</span></p>', '2023-01-07 20:45:18', 26, '2023-01-07 20:45:18', 26, 1, 1),
(15, 26, 1, 'Did you see it', '', '2023-01-07 21:14:04', 26, '2023-01-07 21:14:04', 26, 1, 1),
(16, 1, 26, 'Why you not seeing my message', '', '2023-01-07 22:24:10', 26, '2023-01-07 22:24:10', 26, 1, 1),
(17, 26, 1, 'hello', 'DND', '2023-01-10 22:33:34', 26, '2023-01-10 22:33:34', 26, 1, 0),
(18, 26, 0, '', '', '2023-01-10 23:40:31', 26, '2023-01-10 23:40:31', 26, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `maildocuments`
--

CREATE TABLE `maildocuments` (
  `id` int(11) NOT NULL,
  `path` int(11) NOT NULL,
  `mailid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maildocuments`
--

INSERT INTO `maildocuments` (`id`, `path`, `mailid`, `senderid`, `receiverid`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 1, 1, 1, 20, '2022-12-31 22:15:45', 1, '2022-12-31 22:15:45', 1, 1),
(2, 0, 1, 1, 20, '2022-12-31 22:15:45', 1, '2022-12-31 22:15:45', 1, 1),
(3, 2, 2, 1, 20, '2022-12-31 22:26:10', 1, '2022-12-31 22:26:10', 1, 1),
(4, 3, 2, 1, 20, '2022-12-31 22:26:10', 1, '2022-12-31 22:26:10', 1, 1),
(5, 4, 3, 1, 20, '2022-12-31 22:44:12', 1, '2022-12-31 22:44:12', 1, 1),
(6, 5, 4, 1, 20, '2022-12-31 22:46:34', 1, '2022-12-31 22:46:34', 1, 1),
(7, 6, 5, 1, 20, '2022-12-31 22:47:32', 1, '2022-12-31 22:47:32', 1, 1),
(8, 7, 5, 1, 20, '2022-12-31 22:47:32', 1, '2022-12-31 22:47:32', 1, 1),
(9, 8, 6, 1, 20, '2022-12-31 22:50:47', 1, '2022-12-31 22:50:47', 1, 1),
(10, 9, 6, 1, 20, '2022-12-31 22:50:47', 1, '2022-12-31 22:50:47', 1, 1),
(11, 10, 7, 1, 20, '2022-12-31 22:51:11', 1, '2022-12-31 22:51:11', 1, 1),
(12, 11, 8, 20, 1, '2023-01-01 14:00:27', 20, '2023-01-01 14:00:27', 20, 1),
(13, 14, 9, 1, 30, '2023-01-06 00:03:14', 1, '2023-01-06 00:03:14', 1, 1),
(14, 15, 10, 1, 30, '2023-01-06 00:05:41', 1, '2023-01-06 00:05:41', 1, 1),
(15, 16, 11, 26, 1, '2023-01-07 20:07:21', 26, '2023-01-07 20:07:21', 26, 1),
(16, 17, 12, 26, 1, '2023-01-07 20:44:12', 26, '2023-01-07 20:44:12', 26, 1),
(17, 0, 13, 26, 1, '2023-01-07 20:45:18', 26, '2023-01-07 20:45:18', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `department` int(100) NOT NULL,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(100) DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `updated_by` int(100) DEFAULT NULL,
  `status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `department`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Manage Employee', '', 0, '2022-05-19 14:39:46', 3, '2022-05-19 14:39:46', 3, 1),
(2, 'Manage Customer', '', 0, '2022-05-19 14:40:07', 3, '2022-05-19 14:40:07', 3, 1),
(3, 'Manage Stock', '', 0, '2022-05-19 14:40:28', 3, '2022-05-19 14:40:28', 3, 1),
(15, 'General ', '', 0, '2022-05-19 16:59:24', 3, '2022-05-19 16:59:24', 3, 1),
(17, 'Manage Permissions', '', 0, '2022-05-19 17:00:11', 3, '2022-05-19 17:00:11', 3, 1),
(18, 'Operations', '', 0, '2022-05-19 17:00:11', 3, '2022-05-19 17:00:11', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `module` int(100) NOT NULL,
  `department` int(100) NOT NULL,
  `added_on` datetime DEFAULT current_timestamp(),
  `added_by` int(100) DEFAULT NULL,
  `updated_on` datetime DEFAULT current_timestamp(),
  `updated_by` int(100) DEFAULT NULL,
  `status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `module`, `department`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Add User', '', 1, 0, '2022-05-19 14:53:02', 3, '2022-05-19 14:53:02', 3, 1),
(2, 'Edit User', '', 1, 0, '2022-05-19 14:53:31', 3, '2022-05-19 14:53:31', 3, 1),
(3, 'Delete User', '', 1, 0, '2022-05-19 14:53:49', 3, '2022-05-19 14:53:49', 3, 1),
(4, 'View User', '', 1, 0, '2022-05-19 14:54:06', 3, '2022-05-19 14:54:06', 3, 1),
(5, 'Add Role', '', 5, 0, '2022-05-19 15:12:45', 3, '2022-05-19 15:12:45', 3, 1),
(6, 'Edit Role', '', 5, 0, '2022-05-19 15:13:05', 3, '2022-05-19 15:13:05', 3, 1),
(7, 'Delete Role', '', 5, 0, '2022-05-19 15:13:27', 3, '2022-05-19 15:13:27', 3, 1),
(8, 'View Role', '', 5, 0, '2022-05-19 15:13:45', 3, '2022-05-19 15:13:45', 3, 1),
(9, 'Add Employee', '', 10, 0, '2022-05-19 15:27:14', 3, '2022-05-19 15:27:14', 3, 1),
(10, 'Edit Employee', '', 10, 0, '2022-05-19 15:27:27', 3, '2022-05-19 15:27:27', 3, 1),
(11, 'Delete Employee', '', 10, 0, '2022-05-19 15:27:39', 3, '2022-05-19 15:27:39', 3, 1),
(12, 'View Employee', '', 10, 0, '2022-05-19 15:27:58', 3, '2022-05-19 15:27:58', 3, 1),
(13, 'Demo Permission', '', 15, 0, '2022-12-23 00:44:13', 1, '2022-12-23 21:33:25', 1, 99),
(14, 'view login log', 'Log of Users Login', 2, 0, '2023-01-02 23:38:06', 1, '2023-01-02 23:38:06', 1, 1),
(15, 'compose mail', '', 18, 0, '2023-01-02 23:42:12', 1, '2023-01-02 23:42:12', 1, 1),
(16, 'view inbox', '', 18, 0, '2023-01-02 23:45:45', 1, '2023-01-02 23:45:45', 1, 1),
(17, 'view send mails', '', 18, 0, '2023-01-02 23:46:56', 1, '2023-01-02 23:46:56', 1, 1),
(18, 'view permission', '', 17, 0, '2023-01-02 23:50:42', 1, '2023-01-02 23:50:42', 1, 1),
(19, 'add permission', '', 17, 0, '2023-01-02 23:50:52', 1, '2023-01-02 23:50:52', 1, 1),
(20, 'edit permission', '', 17, 0, '2023-01-02 23:51:05', 1, '2023-01-02 23:51:05', 1, 1),
(21, 'delete permission', '', 17, 0, '2023-01-02 23:51:16', 1, '2023-01-02 23:51:16', 1, 1),
(22, 'view today transaction', '', 3, 0, '2023-01-02 23:53:28', 1, '2023-01-02 23:53:28', 1, 1),
(23, 'view all transaction', '', 3, 0, '2023-01-02 23:53:43', 1, '2023-01-02 23:53:43', 1, 1),
(24, 'view user pending for approval', '', 2, 0, '2023-01-02 23:59:14', 1, '2023-01-02 23:59:14', 1, 1),
(25, 'view all investment', '', 3, 0, '2023-01-03 00:00:25', 1, '2023-01-03 00:00:25', 1, 1),
(26, 'view pending investment', '', 3, 0, '2023-01-03 00:00:57', 1, '2023-01-03 00:00:57', 1, 1),
(27, 'view approved investment', '', 3, 0, '2023-01-03 00:01:18', 1, '2023-01-03 00:01:18', 1, 1),
(28, 'view disapproved investment', '', 3, 0, '2023-01-03 00:01:37', 1, '2023-01-03 00:01:37', 1, 1),
(29, 'view withdrawal requests', '', 3, 0, '2023-01-03 00:01:54', 1, '2023-01-03 00:01:54', 1, 1),
(30, 'view settings', '', 15, 0, '2023-01-03 00:06:14', 1, '2023-01-03 00:06:14', 1, 1),
(31, 'request Withdrawal', '', 2, 0, '2023-01-03 21:08:34', 1, '2023-01-03 21:08:34', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_detail`
--

CREATE TABLE `personal_detail` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `person_name` varchar(255) NOT NULL,
  `website` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gst_no` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `phone_2` varchar(20) NOT NULL,
  `indian_state` int(11) DEFAULT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `uploadfile_id` int(11) NOT NULL,
  `faviconicon` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `paymentqr` int(11) NOT NULL,
  `upiid` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_detail`
--

INSERT INTO `personal_detail` (`id`, `company_name`, `short_name`, `person_name`, `website`, `phone`, `gst_no`, `email`, `address_1`, `address_2`, `city`, `pincode`, `state`, `country_id`, `phone_2`, `indian_state`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `branch_name`, `uploadfile_id`, `faviconicon`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`, `paymentqr`, `upiid`) VALUES
(3, 'India Stock', 'IS', '', '', '0000000000', '', '', 'Rajbara', '', 'Indore', 452010, '', 1, '', 23, 'State Bank of India', 'Shankar Lal', '7878454578', 'SBIN125256', 'Sikhliya Main Road', 12, 13, '2022-05-12 11:05:29', 2, '2023-01-11 23:59:02', 1, 11, 21, 'sankar@ybl');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `permissions` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `permissions`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'admin', '', '195,192,193,194,1,2,3,4,5,6,7,8,9,10,11,12,136,137,151,175,35,36,37,38,47,48,90,95,96,97,98,99,100,102,103,104,105,114,115,131,133,134,135,140,29,30,31,32,33,34,39,40,41,42,43,44,45,46,110,111,112,113,116,117,25,26,27,28,17,18,19,20,13,14,15,16,161,162,21,22,23,24,49,50,51,52,64,65,66,67,68,69,120,53,54,55,56,57,58,59,60,61,62,63,70,71,91,92,93,94,118,119,126,127,128,130,132,141,142,143,144,145,146,147,148,149,150,152,153,154,158,159,163,72,73,74,138,75,76,77,106,107,108,109,86,87,89,101,165,166,167,176,177,178,180,181,182,183,184,185,186,187,188,189,78,79,80,81,82,83,84,85,88,121,139,155,156,157,160,164,168,169,170,171,172,173,174,179,122,123,124,125', 24, '2022-08-29 11:05:39', 1, '2022-12-22 22:54:48', 1),
(2, 'Customer', '', '31,15,16,17', 1, '2023-01-07 18:11:34', 1, '2023-01-07 18:11:34', 1),
(10, 'no role', '', '15,16,17', 1, '2023-01-05 23:53:01', 1, '2023-01-05 23:53:12', 99);

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `gst_code` varchar(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`, `gst_code`, `added_on`, `updated_on`, `status`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS', '35', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(2, 'ANDHRA PRADESH', '37', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(3, 'ARUNACHAL PRADESH', '12', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(4, 'ASSAM', '18', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(5, 'BIHAR', '10', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(6, 'CHATTISGARH', '22', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(7, 'CHANDIGARH', '04', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(9, 'DELHI', '07', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(10, 'DADRA AND NAGAR HAVELI ADN DAMAN AND DIU', '25', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(11, 'GOA', '30', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(12, 'GUJARAT', '24', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(13, 'HIMACHAL PRADESH', '02', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(14, 'HARYANA', '06', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(15, 'JAMMU AND KASHMIR', '01', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(16, 'JHARKHAND', '20', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(17, 'KERALA', '32', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(18, 'KARNATAKA', '29', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(19, 'LAKSHADWEEP', '31', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(20, 'MEGHALAYA', '17', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(21, 'MAHARASHTRA', '27', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(22, 'MANIPUR', '14', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(23, 'MADHYA PRADESH', '23', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(24, 'MIZORAM', '15', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(25, 'NAGALAND', '13', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(26, 'ORISSA', '21', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(27, 'PUNJAB', '03', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(28, 'PONDICHERRY', '34', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(29, 'RAJASTHAN', '08', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(30, 'SIKKIM', '11', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(31, 'TAMIL NADU', '33', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(32, 'TRIPURA', '16', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(33, 'UTTARAKHAND', '05', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(34, 'UTTAR PRADESH', '09', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(35, 'WEST BENGAL', '19', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(36, 'TELANGANA', '36', '2021-12-29 15:50:34', '2021-12-29 15:50:34', 1),
(37, 'LADDAKH', '38', '2021-12-30 08:32:19', '2021-12-30 08:32:19', 1),
(38, 'ANDHRA PRADESH (BEFORE DIVISION)', '28', '2021-12-30 08:34:43', '2021-12-30 08:34:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stocktransaction`
--

CREATE TABLE `stocktransaction` (
  `id` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `qty` double NOT NULL,
  `datetime` datetime NOT NULL,
  `userid` varchar(100) NOT NULL,
  `symbol` varchar(100) NOT NULL,
  `exchange` varchar(10) NOT NULL,
  `totalamount` double NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `stockid` int(11) NOT NULL,
  `buyprice` double NOT NULL,
  `sellprice` double NOT NULL,
  `userid` varchar(110) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uploadfile`
--

CREATE TABLE `uploadfile` (
  `id` int(11) NOT NULL,
  `filename` mediumtext NOT NULL,
  `orgname` varchar(100) NOT NULL,
  `path` mediumtext NOT NULL,
  `added_on` datetime DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploadfile`
--

INSERT INTO `uploadfile` (`id`, `filename`, `orgname`, `path`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, '1672505145VzR.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672505145VzR.jpg', NULL, 0, '2022-12-31 22:15:45', 1, 1),
(2, '1672505770TqT.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672505770TqT.jpg', NULL, 0, '2022-12-31 22:26:10', 1, 1),
(3, '1672505770ZvS.webp', 'wide.webp', 'main/mailfiles/1672505770ZvS.webp', NULL, 0, '2022-12-31 22:26:10', 1, 1),
(4, '1672506852LpL.jpg', '1200px-Shaqi_jrvej.jpg', 'main/mailfiles/1672506852LpL.jpg', NULL, 0, '2022-12-31 22:44:12', 1, 1),
(5, '1672506994BsN.jpg', '1200px-Shaqi_jrvej.jpg', 'main/mailfiles/1672506994BsN.jpg', NULL, 0, '2022-12-31 22:46:34', 1, 1),
(6, '1672507052PtE.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672507052PtE.jpg', NULL, 0, '2022-12-31 22:47:32', 1, 1),
(7, '1672507052MvW.jpg', '1200px-Shaqi_jrvej.jpg', 'main/mailfiles/1672507052MvW.jpg', NULL, 0, '2022-12-31 22:47:32', 1, 1),
(8, '1672507247OjH.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672507247OjH.jpg', NULL, 0, '2022-12-31 22:50:47', 1, 1),
(9, '1672507247TcZ.jpg', '1200px-Shaqi_jrvej.jpg', 'main/mailfiles/1672507247TcZ.jpg', NULL, 0, '2022-12-31 22:50:47', 1, 1),
(10, '1672507271MrX.pdf', 'mankind.pdf', 'main/mailfiles/1672507271MrX.pdf', NULL, 0, '2022-12-31 22:51:11', 1, 1),
(11, '1672561827HuJ.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672561827HuJ.jpg', NULL, 0, '2023-01-01 14:00:27', 20, 1),
(12, '1672577284HpK.jpg', 'tree-736885__480.jpg', 'uploads/logo/1672577284HpK.jpg', NULL, 0, '2023-01-01 18:18:04', 1, 1),
(13, '1672577284PzZ.jpg', 'tree-736885__480.jpg', 'uploads/logo/1672577284PzZ.jpg', NULL, 0, '2023-01-01 18:18:04', 1, 1),
(14, '1672943594HfH.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672943594HfH.jpg', NULL, 0, '2023-01-06 00:03:14', 1, 1),
(15, '1672943741KjQ.jpg', 'tree-736885__480.jpg', 'main/mailfiles/1672943741KjQ.jpg', NULL, 0, '2023-01-06 00:05:41', 1, 1),
(16, '1673102241SsV.pdf', 'Mohammad Nov 22.pdf', 'main/mailfiles/1673102241SsV.pdf', NULL, 0, '2023-01-07 20:07:21', 26, 1),
(17, '1673104452YaN.pdf', 'Mohammad Nov 22.pdf', 'main/mailfiles/1673104452YaN.pdf', NULL, 0, '2023-01-07 20:44:12', 26, 1),
(18, '1673452421EfQ.jpg', 'tree-736885__480.jpg', 'main/images/avatars/1673452421EfQ.jpg', NULL, 0, '2023-01-11 21:23:41', 26, 1),
(19, '1673460506DiY.jpg', 'qr.jpg', 'uploads/logo/1673460506DiY.jpg', NULL, 0, '2023-01-11 23:38:26', 1, 99),
(20, '1673460732MkE.jpg', 'qr.jpg', 'uploads/logo/1673460732MkE.jpg', NULL, 0, '2023-01-11 23:42:12', 1, 99),
(21, '1673460853WoU.jpg', 'qr.jpg', 'main/uploads/1673460853WoU.jpg', NULL, 0, '2023-01-11 23:44:13', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userinvestmentlog`
--

CREATE TABLE `userinvestmentlog` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `userid` int(11) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinvestmentlog`
--

INSERT INTO `userinvestmentlog` (`id`, `amount`, `userid`, `remark`, `date`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(2, 1500, 20, 'NA', NULL, '2022-12-26 23:19:30', 1, '2022-12-26 23:19:30', 1, 0),
(3, 100, 20, 'NA', NULL, '2022-12-26 23:20:12', 1, '2022-12-26 23:20:12', 1, 1),
(4, 1000, 20, 'New Fund', NULL, '2022-12-26 23:32:25', 1, '2022-12-26 23:32:25', 1, 1),
(5, 3000, 20, 'NAaaA', NULL, '2022-12-27 00:23:55', 1, '2022-12-27 00:23:55', 1, 1),
(6, 300, 20, 'NA', '2022-12-15', '2022-12-27 00:35:03', 1, '2022-12-27 00:35:03', 1, 1),
(7, 3000, 26, 'NA', '2023-01-03', '2023-01-03 22:18:09', 1, '2023-01-03 22:18:09', 1, 1),
(8, 3000, 26, 'NA', '2023-01-12', '2023-01-05 00:24:32', 1, '2023-01-05 00:24:32', 1, 1),
(9, 1000, 30, 'NA', '2023-01-05', '2023-01-05 23:45:53', 1, '2023-01-05 23:45:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usercode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fathername` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `phone` varchar(40) CHARACTER SET utf8 NOT NULL,
  `mobile` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `dob` date DEFAULT NULL,
  `adharno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `panno` varchar(20) CHARACTER SET utf8 NOT NULL,
  `bankname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `accountno` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ifsc` varchar(20) CHARACTER SET utf8 NOT NULL,
  `employeeref` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `password` varchar(70) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` int(100) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `limit` double NOT NULL,
  `role` int(11) NOT NULL,
  `investmentamount` double NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `policyread` varchar(11) DEFAULT NULL,
  `sms` enum('Yes','No') NOT NULL,
  `emailenabled` enum('Yes','No') NOT NULL,
  `activate` enum('Yes','No') NOT NULL,
  `approveon` datetime DEFAULT NULL,
  `approveby` int(11) NOT NULL,
  `accchangereq` int(11) NOT NULL,
  `trademode` enum('Intraday','Holding') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usercode`, `name`, `firstname`, `lastname`, `fathername`, `email`, `phone`, `mobile`, `address`, `username`, `dob`, `adharno`, `panno`, `bankname`, `accountno`, `ifsc`, `employeeref`, `password`, `avatar`, `type`, `limit`, `role`, `investmentamount`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`, `policyread`, `sms`, `emailenabled`, `activate`, `approveon`, `approveby`, `accchangereq`, `trademode`) VALUES
(1, 'IS01', 'Admin', '', '', NULL, 'mohammedhusain559@gmail.com', '', '9999999999', NULL, 'admin', NULL, '', '', '', '', '', NULL, 'password', NULL, 1, 0, 1, 0, '2022-12-17 12:51:55', 0, '2023-01-07 14:51:32', 1, 1, NULL, 'No', 'Yes', 'Yes', NULL, 0, 0, 'Intraday'),
(25, 'USER0005', 'mohammed', '', '', NULL, 'mohammedmaheswer112@gmail.com', '', '3333333333', 'ammar nagar', '', '2000-01-12', '343434343434', 'adsadas', 'NAN', '34234234', '3123213', 'PMSE0056', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 2, 6.6, 2, 0, '2023-01-01 18:44:00', 0, '2023-01-01 18:44:00', 0, 0, 'Yes', 'Yes', 'Yes', 'Yes', '2022-12-31 17:39:11', 1, 0, 'Intraday'),
(26, 'USER0006', 'mohan', '', '', NULL, 'mohammedmaheswer1@gmail.com', '', '9999999999', 'dsa', '', '2004-01-14', 'dasd', 'dsaa', 'dasd', 'asd', 'asdas', 'PMSE0056', 'password', 18, 2, 5, 2, 6000, '2023-01-01 18:42:43', 0, '2023-01-01 18:42:43', 0, 1, 'Yes', 'Yes', 'Yes', 'Yes', '2023-01-02 23:19:58', 1, 0, 'Intraday'),
(27, 'PMSE0056', 'Bheru Singh', '', '', NULL, '', '7858558858', NULL, NULL, '', NULL, '', '', '', '', '', NULL, NULL, NULL, 1, 0, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, NULL, 'Yes', 'Yes', 'Yes', NULL, 0, 0, 'Intraday'),
(28, 'PMSE0056', 'pankaj', '', '', NULL, 'pankaj@gmail.com', '4344545525', NULL, NULL, '', NULL, '', '', '', '', '', NULL, 'qwerty', NULL, 1, 0, 8, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 0, NULL, 'Yes', 'Yes', 'Yes', NULL, 0, 0, 'Intraday'),
(29, 'PMSE0056', 'Mahajan', '', '', NULL, 'Mahajan@gmail.com', '', '', NULL, '', NULL, '', '', '', '', '', NULL, 'qwerty', NULL, 1, 0, 1, 0, '2023-01-02 21:42:49', 1, '2023-01-07 14:09:06', 1, 1, NULL, 'Yes', 'Yes', 'Yes', NULL, 0, 0, 'Intraday'),
(30, 'USER0007', 'mohsin', '', '', NULL, 'mohammedmaheswer12@gmail.com', '', '1255455545', 'dsad', '', '2004-01-22', 'asdd', 'dasd', 'dasd', 'asdas', 'dasd', '', 'd41d8cd98f00b204e9800998ecf8427e', NULL, 2, 0, 2, 1032, '2023-01-05 23:39:31', 0, '2023-01-05 23:45:08', 1, 1, NULL, 'Yes', 'Yes', 'Yes', NULL, 0, 0, 'Intraday'),
(31, 'PMSE0057', 'shekhar', '', '', NULL, 'shekah@gmail.com', '', '4554588554', NULL, '', NULL, '', '', '', '', '', NULL, 'qwerty', NULL, 1, 0, 1, 0, '2023-01-07 14:08:48', 1, '2023-01-07 14:08:55', 1, 99, NULL, 'Yes', 'Yes', 'Yes', NULL, 0, 0, 'Intraday');

-- --------------------------------------------------------

--
-- Table structure for table `userstocks`
--

CREATE TABLE `userstocks` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Exch` varchar(10) NOT NULL,
  `ExchType` varchar(10) NOT NULL,
  `Symbol` varchar(50) NOT NULL,
  `Expiry` varchar(50) DEFAULT NULL,
  `StrikePrice` int(50) NOT NULL,
  `OptionType` varchar(50) DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userstocks`
--

INSERT INTO `userstocks` (`id`, `userid`, `Exch`, `ExchType`, `Symbol`, `Expiry`, `StrikePrice`, `OptionType`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(2, 26, 'N', 'C', 'TATAMOTORS', NULL, 0, NULL, '2023-01-14 16:33:46', 26, '2023-01-14 16:33:46', 26, 1),
(3, 26, 'N', 'C', 'KOTAKBANK', NULL, 0, NULL, '2023-01-14 16:36:19', 26, '2023-01-14 16:36:19', 26, 1),
(4, 26, 'B', 'C', 'KOTAKBANK', NULL, 0, NULL, '2023-01-14 16:39:39', 26, '2023-01-14 16:39:39', 26, 1),
(5, 26, 'N', 'C', 'TATASTEEL', NULL, 0, NULL, '2023-01-14 18:42:44', 26, '2023-01-14 18:42:44', 26, 1),
(6, 26, 'N', 'C', 'DRREDDY', NULL, 0, NULL, '2023-01-14 19:50:26', 26, '2023-01-14 19:50:26', 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`id`, `name`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(1, 'Admin', '2022-05-21 16:08:15', 1, '2022-05-21 16:08:15', 1, 1),
(2, 'Customer', '2022-04-27 17:40:10', 1, '2022-04-27 17:40:10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawalrequests`
--

CREATE TABLE `withdrawalrequests` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `remark` varchar(255) NOT NULL,
  `approvedby` int(11) DEFAULT NULL,
  `approvedon` datetime DEFAULT NULL,
  `added_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdrawalrequests`
--

INSERT INTO `withdrawalrequests` (`id`, `userid`, `amount`, `remark`, `approvedby`, `approvedon`, `added_on`, `added_by`, `updated_on`, `updated_by`, `status`) VALUES
(2, 26, 2000, 'NA', 1, '2023-01-06 00:16:22', '2023-01-03 22:56:44', 26, '2023-01-03 22:56:44', 26, 91),
(3, 26, 1000, '', NULL, NULL, '2023-01-12 00:21:24', 26, '2023-01-12 00:21:24', 26, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitylog`
--
ALTER TABLE `activitylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankaccountchange`
--
ALTER TABLE `bankaccountchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codegenerator`
--
ALTER TABLE `codegenerator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundrequest`
--
ALTER TABLE `fundrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maildocuments`
--
ALTER TABLE `maildocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `department` (`department`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `personal_detail`
--
ALTER TABLE `personal_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_detail_ibfk0` (`country_id`),
  ADD KEY `personal_detail_ibfk1` (`indian_state`),
  ADD KEY `personal_detail_ibfk2` (`added_by`),
  ADD KEY `personal_detail_ibfk3` (`updated_by`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocktransaction`
--
ALTER TABLE `stocktransaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadfile`
--
ALTER TABLE `uploadfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinvestmentlog`
--
ALTER TABLE `userinvestmentlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`,`role`);

--
-- Indexes for table `userstocks`
--
ALTER TABLE `userstocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawalrequests`
--
ALTER TABLE `withdrawalrequests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitylog`
--
ALTER TABLE `activitylog`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bankaccountchange`
--
ALTER TABLE `bankaccountchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `codegenerator`
--
ALTER TABLE `codegenerator`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `fundrequest`
--
ALTER TABLE `fundrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `maildocuments`
--
ALTER TABLE `maildocuments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_detail`
--
ALTER TABLE `personal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `stocktransaction`
--
ALTER TABLE `stocktransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploadfile`
--
ALTER TABLE `uploadfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `userinvestmentlog`
--
ALTER TABLE `userinvestmentlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `userstocks`
--
ALTER TABLE `userstocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `withdrawalrequests`
--
ALTER TABLE `withdrawalrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
