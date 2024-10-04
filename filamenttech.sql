-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2024 at 02:47 PM
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
-- Database: `filamenttech`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1728045646),
('laravel_cache_a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1728045646;', 1728045646),
('laravel_cache_ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4', 'i:1;', 1728040353),
('laravel_cache_ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4:timer', 'i:1728040353;', 1728040353),
('laravel_cache_spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:21:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"order-all\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:12:\"create-order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:10:\"view-order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:10:\"edit-order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"delete-order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:27:\"assign_orders_to_developers\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:23:\"manage-order-quotations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:20:\"view-order-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:20:\"edit-order-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:22:\"create-order-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:21:\"can-approve-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:30:\"can-comment-on-order-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:2:{i:0;i:1;i:1;i:4;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:23:\"manage-order-deliveries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:21:\"view-order-deliveries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:21:\"edit-order-deliveries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:23:\"create-order-deliveries\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:29:\"can-comment-on-order-delivery\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:20:\"can-comment-on-order\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:3:{i:0;i:1;i:1;i:2;i:2;i:4;}}i:18;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:19:\"start-order-payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:19;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:23:\"approve-order-quotation\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}i:20;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:15:\"view-own-orders\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:4;}}}s:5:\"roles\";a:3:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"admin\";s:1:\"c\";s:3:\"web\";}i:1;a:3:{s:1:\"a\";i:2;s:1:\"b\";s:9:\"developer\";s:1:\"c\";s:3:\"web\";}i:2;a:3:{s:1:\"a\";i:4;s:1:\"b\";s:6:\"client\";s:1:\"c\";s:3:\"web\";}}}', 1728126232);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Innovation Hub', NULL, NULL),
(2, 'Sustainability Solutions', NULL, NULL),
(3, 'Community Connect', NULL, NULL),
(4, 'Artistry & Expression', NULL, NULL),
(5, 'Tech Trends', NULL, NULL),
(6, 'Health & Wellness', NULL, NULL),
(7, 'Education Evolution', NULL, NULL),
(8, 'Cultural Heritage', NULL, NULL),
(9, 'Business & Entrepreneurship', NULL, NULL),
(10, 'Lifestyle & Leisure', NULL, NULL),
(11, 'Digital Transformation', NULL, NULL),
(12, 'Social Impact', NULL, NULL),
(13, 'Urban Development', NULL, NULL),
(14, 'Research & Discovery', NULL, NULL),
(15, 'Youth Empowerment', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', NULL, NULL),
(2, 'AX', 'Aland Islands', NULL, NULL),
(3, 'AL', 'Albania', NULL, NULL),
(4, 'DZ', 'Algeria', NULL, NULL),
(5, 'AS', 'American Samoa', NULL, NULL),
(6, 'AD', 'Andorra', NULL, NULL),
(7, 'AO', 'Angola', NULL, NULL),
(8, 'AI', 'Anguilla', NULL, NULL),
(9, 'AQ', 'Antarctica', NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', NULL, NULL),
(11, 'AR', 'Argentina', NULL, NULL),
(12, 'AM', 'Armenia', NULL, NULL),
(13, 'AW', 'Aruba', NULL, NULL),
(14, 'AU', 'Australia', NULL, NULL),
(15, 'AT', 'Austria', NULL, NULL),
(16, 'AZ', 'Azerbaijan', NULL, NULL),
(17, 'BS', 'Bahamas', NULL, NULL),
(18, 'BH', 'Bahrain', NULL, NULL),
(19, 'BD', 'Bangladesh', NULL, NULL),
(20, 'BB', 'Barbados', NULL, NULL),
(21, 'BY', 'Belarus', NULL, NULL),
(22, 'BE', 'Belgium', NULL, NULL),
(23, 'BZ', 'Belize', NULL, NULL),
(24, 'BJ', 'Benin', NULL, NULL),
(25, 'BM', 'Bermuda', NULL, NULL),
(26, 'BT', 'Bhutan', NULL, NULL),
(27, 'BO', 'Bolivia', NULL, NULL),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', NULL, NULL),
(30, 'BW', 'Botswana', NULL, NULL),
(31, 'BV', 'Bouvet Island', NULL, NULL),
(32, 'BR', 'Brazil', NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', NULL, NULL),
(34, 'BN', 'Brunei Darussalam', NULL, NULL),
(35, 'BG', 'Bulgaria', NULL, NULL),
(36, 'BF', 'Burkina Faso', NULL, NULL),
(37, 'BI', 'Burundi', NULL, NULL),
(38, 'KH', 'Cambodia', NULL, NULL),
(39, 'CM', 'Cameroon', NULL, NULL),
(40, 'CA', 'Canada', NULL, NULL),
(41, 'CV', 'Cape Verde', NULL, NULL),
(42, 'KY', 'Cayman Islands', NULL, NULL),
(43, 'CF', 'Central African Republic', NULL, NULL),
(44, 'TD', 'Chad', NULL, NULL),
(45, 'CL', 'Chile', NULL, NULL),
(46, 'CN', 'China', NULL, NULL),
(47, 'CX', 'Christmas Island', NULL, NULL),
(48, 'CC', 'Cocos (Keeling) Islands', NULL, NULL),
(49, 'CO', 'Colombia', NULL, NULL),
(50, 'KM', 'Comoros', NULL, NULL),
(51, 'CG', 'Congo', NULL, NULL),
(52, 'CD', 'Congo, Democratic Republic of the Congo', NULL, NULL),
(53, 'CK', 'Cook Islands', NULL, NULL),
(54, 'CR', 'Costa Rica', NULL, NULL),
(55, 'CI', 'Cote D\'Ivoire', NULL, NULL),
(56, 'HR', 'Croatia', NULL, NULL),
(57, 'CU', 'Cuba', NULL, NULL),
(58, 'CW', 'Curacao', NULL, NULL),
(59, 'CY', 'Cyprus', NULL, NULL),
(60, 'CZ', 'Czech Republic', NULL, NULL),
(61, 'DK', 'Denmark', NULL, NULL),
(62, 'DJ', 'Djibouti', NULL, NULL),
(63, 'DM', 'Dominica', NULL, NULL),
(64, 'DO', 'Dominican Republic', NULL, NULL),
(65, 'EC', 'Ecuador', NULL, NULL),
(66, 'EG', 'Egypt', NULL, NULL),
(67, 'SV', 'El Salvador', NULL, NULL),
(68, 'GQ', 'Equatorial Guinea', NULL, NULL),
(69, 'ER', 'Eritrea', NULL, NULL),
(70, 'EE', 'Estonia', NULL, NULL),
(71, 'ET', 'Ethiopia', NULL, NULL),
(72, 'FK', 'Falkland Islands (Malvinas)', NULL, NULL),
(73, 'FO', 'Faroe Islands', NULL, NULL),
(74, 'FJ', 'Fiji', NULL, NULL),
(75, 'FI', 'Finland', NULL, NULL),
(76, 'FR', 'France', NULL, NULL),
(77, 'GF', 'French Guiana', NULL, NULL),
(78, 'PF', 'French Polynesia', NULL, NULL),
(79, 'TF', 'French Southern Territories', NULL, NULL),
(80, 'GA', 'Gabon', NULL, NULL),
(81, 'GM', 'Gambia', NULL, NULL),
(82, 'GE', 'Georgia', NULL, NULL),
(83, 'DE', 'Germany', NULL, NULL),
(84, 'GH', 'Ghana', NULL, NULL),
(85, 'GI', 'Gibraltar', NULL, NULL),
(86, 'GR', 'Greece', NULL, NULL),
(87, 'GL', 'Greenland', NULL, NULL),
(88, 'GD', 'Grenada', NULL, NULL),
(89, 'GP', 'Guadeloupe', NULL, NULL),
(90, 'GU', 'Guam', NULL, NULL),
(91, 'GT', 'Guatemala', NULL, NULL),
(92, 'GG', 'Guernsey', NULL, NULL),
(93, 'GN', 'Guinea', NULL, NULL),
(94, 'GW', 'Guinea-Bissau', NULL, NULL),
(95, 'GY', 'Guyana', NULL, NULL),
(96, 'HT', 'Haiti', NULL, NULL),
(97, 'HM', 'Heard Island and Mcdonald Islands', NULL, NULL),
(98, 'VA', 'Holy See (Vatican City State)', NULL, NULL),
(99, 'HN', 'Honduras', NULL, NULL),
(100, 'HK', 'Hong Kong', NULL, NULL),
(101, 'HU', 'Hungary', NULL, NULL),
(102, 'IS', 'Iceland', NULL, NULL),
(103, 'IN', 'India', NULL, NULL),
(104, 'ID', 'Indonesia', NULL, NULL),
(105, 'IR', 'Iran, Islamic Republic of', NULL, NULL),
(106, 'IQ', 'Iraq', NULL, NULL),
(107, 'IE', 'Ireland', NULL, NULL),
(108, 'IM', 'Isle of Man', NULL, NULL),
(109, 'IL', 'Israel', NULL, NULL),
(110, 'IT', 'Italy', NULL, NULL),
(111, 'JM', 'Jamaica', NULL, NULL),
(112, 'JP', 'Japan', NULL, NULL),
(113, 'JE', 'Jersey', NULL, NULL),
(114, 'JO', 'Jordan', NULL, NULL),
(115, 'KZ', 'Kazakhstan', NULL, NULL),
(116, 'KE', 'Kenya', NULL, NULL),
(117, 'KI', 'Kiribati', NULL, NULL),
(118, 'KP', 'Korea, Democratic People\'s Republic of', NULL, NULL),
(119, 'KR', 'Korea, Republic of', NULL, NULL),
(120, 'XK', 'Kosovo', NULL, NULL),
(121, 'KW', 'Kuwait', NULL, NULL),
(122, 'KG', 'Kyrgyzstan', NULL, NULL),
(123, 'LA', 'Lao People\'s Democratic Republic', NULL, NULL),
(124, 'LV', 'Latvia', NULL, NULL),
(125, 'LB', 'Lebanon', NULL, NULL),
(126, 'LS', 'Lesotho', NULL, NULL),
(127, 'LR', 'Liberia', NULL, NULL),
(128, 'LY', 'Libyan Arab Jamahiriya', NULL, NULL),
(129, 'LI', 'Liechtenstein', NULL, NULL),
(130, 'LT', 'Lithuania', NULL, NULL),
(131, 'LU', 'Luxembourg', NULL, NULL),
(132, 'MO', 'Macao', NULL, NULL),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of', NULL, NULL),
(134, 'MG', 'Madagascar', NULL, NULL),
(135, 'MW', 'Malawi', NULL, NULL),
(136, 'MY', 'Malaysia', NULL, NULL),
(137, 'MV', 'Maldives', NULL, NULL),
(138, 'ML', 'Mali', NULL, NULL),
(139, 'MT', 'Malta', NULL, NULL),
(140, 'MH', 'Marshall Islands', NULL, NULL),
(141, 'MQ', 'Martinique', NULL, NULL),
(142, 'MR', 'Mauritania', NULL, NULL),
(143, 'MU', 'Mauritius', NULL, NULL),
(144, 'YT', 'Mayotte', NULL, NULL),
(145, 'MX', 'Mexico', NULL, NULL),
(146, 'FM', 'Micronesia, Federated States of', NULL, NULL),
(147, 'MD', 'Moldova, Republic of', NULL, NULL),
(148, 'MC', 'Monaco', NULL, NULL),
(149, 'MN', 'Mongolia', NULL, NULL),
(150, 'ME', 'Montenegro', NULL, NULL),
(151, 'MS', 'Montserrat', NULL, NULL),
(152, 'MA', 'Morocco', NULL, NULL),
(153, 'MZ', 'Mozambique', NULL, NULL),
(154, 'MM', 'Myanmar', NULL, NULL),
(155, 'NA', 'Namibia', NULL, NULL),
(156, 'NR', 'Nauru', NULL, NULL),
(157, 'NP', 'Nepal', NULL, NULL),
(158, 'NL', 'Netherlands', NULL, NULL),
(159, 'AN', 'Netherlands Antilles', NULL, NULL),
(160, 'NC', 'New Caledonia', NULL, NULL),
(161, 'NZ', 'New Zealand', NULL, NULL),
(162, 'NI', 'Nicaragua', NULL, NULL),
(163, 'NE', 'Niger', NULL, NULL),
(164, 'NG', 'Nigeria', NULL, NULL),
(165, 'NU', 'Niue', NULL, NULL),
(166, 'NF', 'Norfolk Island', NULL, NULL),
(167, 'MP', 'Northern Mariana Islands', NULL, NULL),
(168, 'NO', 'Norway', NULL, NULL),
(169, 'OM', 'Oman', NULL, NULL),
(170, 'PK', 'Pakistan', NULL, NULL),
(171, 'PW', 'Palau', NULL, NULL),
(172, 'PS', 'Palestinian Territory, Occupied', NULL, NULL),
(173, 'PA', 'Panama', NULL, NULL),
(174, 'PG', 'Papua New Guinea', NULL, NULL),
(175, 'PY', 'Paraguay', NULL, NULL),
(176, 'PE', 'Peru', NULL, NULL),
(177, 'PH', 'Philippines', NULL, NULL),
(178, 'PN', 'Pitcairn', NULL, NULL),
(179, 'PL', 'Poland', NULL, NULL),
(180, 'PT', 'Portugal', NULL, NULL),
(181, 'PR', 'Puerto Rico', NULL, NULL),
(182, 'QA', 'Qatar', NULL, NULL),
(183, 'RE', 'Reunion', NULL, NULL),
(184, 'RO', 'Romania', NULL, NULL),
(185, 'RU', 'Russian Federation', NULL, NULL),
(186, 'RW', 'Rwanda', NULL, NULL),
(187, 'BL', 'Saint Barthelemy', NULL, NULL),
(188, 'SH', 'Saint Helena', NULL, NULL),
(189, 'KN', 'Saint Kitts and Nevis', NULL, NULL),
(190, 'LC', 'Saint Lucia', NULL, NULL),
(191, 'MF', 'Saint Martin', NULL, NULL),
(192, 'PM', 'Saint Pierre and Miquelon', NULL, NULL),
(193, 'VC', 'Saint Vincent and the Grenadines', NULL, NULL),
(194, 'WS', 'Samoa', NULL, NULL),
(195, 'SM', 'San Marino', NULL, NULL),
(196, 'ST', 'Sao Tome and Principe', NULL, NULL),
(197, 'SA', 'Saudi Arabia', NULL, NULL),
(198, 'SN', 'Senegal', NULL, NULL),
(199, 'RS', 'Serbia', NULL, NULL),
(200, 'CS', 'Serbia and Montenegro', NULL, NULL),
(201, 'SC', 'Seychelles', NULL, NULL),
(202, 'SL', 'Sierra Leone', NULL, NULL),
(203, 'SG', 'Singapore', NULL, NULL),
(204, 'SX', 'Sint Maarten', NULL, NULL),
(205, 'SK', 'Slovakia', NULL, NULL),
(206, 'SI', 'Slovenia', NULL, NULL),
(207, 'SB', 'Solomon Islands', NULL, NULL),
(208, 'SO', 'Somalia', NULL, NULL),
(209, 'ZA', 'South Africa', NULL, NULL),
(210, 'GS', 'South Georgia and the South Sandwich Islands', NULL, NULL),
(211, 'SS', 'South Sudan', NULL, NULL),
(212, 'ES', 'Spain', NULL, NULL),
(213, 'LK', 'Sri Lanka', NULL, NULL),
(214, 'SD', 'Sudan', NULL, NULL),
(215, 'SR', 'Suriname', NULL, NULL),
(216, 'SJ', 'Svalbard and Jan Mayen', NULL, NULL),
(217, 'SZ', 'Swaziland', NULL, NULL),
(218, 'SE', 'Sweden', NULL, NULL),
(219, 'CH', 'Switzerland', NULL, NULL),
(220, 'SY', 'Syrian Arab Republic', NULL, NULL),
(221, 'TW', 'Taiwan, Province of China', NULL, NULL),
(222, 'TJ', 'Tajikistan', NULL, NULL),
(223, 'TZ', 'Tanzania, United Republic of', NULL, NULL),
(224, 'TH', 'Thailand', NULL, NULL),
(225, 'TL', 'Timor-Leste', NULL, NULL),
(226, 'TG', 'Togo', NULL, NULL),
(227, 'TK', 'Tokelau', NULL, NULL),
(228, 'TO', 'Tonga', NULL, NULL),
(229, 'TT', 'Trinidad and Tobago', NULL, NULL),
(230, 'TN', 'Tunisia', NULL, NULL),
(231, 'TR', 'Turkey', NULL, NULL),
(232, 'TM', 'Turkmenistan', NULL, NULL),
(233, 'TC', 'Turks and Caicos Islands', NULL, NULL),
(234, 'TV', 'Tuvalu', NULL, NULL),
(235, 'UG', 'Uganda', NULL, NULL),
(236, 'UA', 'Ukraine', NULL, NULL),
(237, 'AE', 'United Arab Emirates', NULL, NULL),
(238, 'GB', 'United Kingdom', NULL, NULL),
(239, 'US', 'United States', NULL, NULL),
(240, 'UM', 'United States Minor Outlying Islands', NULL, NULL),
(241, 'UY', 'Uruguay', NULL, NULL),
(242, 'UZ', 'Uzbekistan', NULL, NULL),
(243, 'VU', 'Vanuatu', NULL, NULL),
(244, 'VE', 'Venezuela', NULL, NULL),
(245, 'VN', 'Viet Nam', NULL, NULL),
(246, 'VG', 'Virgin Islands, British', NULL, NULL),
(247, 'VI', 'Virgin Islands, U.s.', NULL, NULL),
(248, 'WF', 'Wallis and Futuna', NULL, NULL),
(249, 'EH', 'Western Sahara', NULL, NULL),
(250, 'YE', 'Yemen', NULL, NULL),
(251, 'ZM', 'Zambia', NULL, NULL),
(252, 'ZW', 'Zimbabwe', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `status` enum('Pending','In Progress','Completed') NOT NULL DEFAULT 'Pending',
  `file` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `designer_id`, `project_id`, `title`, `category_id`, `status`, `file`, `deadline`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 'Aliquid nihil tempor', '11', 'In Progress', '01J9B92R1E126M79Z3762VJ7FN.png', '1980-05-28', '<p>Tempore, quasi simil.</p>', '2024-10-04 03:07:00', '2024-10-04 04:02:26');

-- --------------------------------------------------------

--
-- Table structure for table `developments`
--

CREATE TABLE `developments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `server_credential` varchar(255) NOT NULL,
  `status` enum('Pending','In Progress','Completed') NOT NULL DEFAULT 'Pending',
  `file` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `code_repository_url` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developments`
--

INSERT INTO `developments` (`id`, `developer_id`, `project_id`, `title`, `server_credential`, `status`, `file`, `deadline`, `code_repository_url`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'Totam incididunt mol', 'server credential', 'Pending', '01J9BD9J36D8GFKZDNQ1NJTS2V.png', '2024-10-25', 'https://github.com/example/project-api-integration', '<p>fggggggggggggggggggggfg</p>', '2024-10-04 04:20:38', '2024-10-04 04:20:38'),
(2, 5, 8, 'Iusto aliquid dolore', 'Id et eum ipsum inci', 'In Progress', '01J9BKN196YBE4BSGJY6VX4CW6.jpg', '1983-10-06', 'Explicabo Sed proid', '<p>Vel explicabo. Eu ac.</p>', '2024-10-04 06:11:45', '2024-10-04 06:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `exports`
--

CREATE TABLE `exports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `file_disk` varchar(255) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `exporter` varchar(255) NOT NULL,
  `processed_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_rows` int(10) UNSIGNED NOT NULL,
  `successful_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_import_rows`
--

CREATE TABLE `failed_import_rows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`data`)),
  `import_id` bigint(20) UNSIGNED NOT NULL,
  `validation_error` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filament_comments`
--

CREATE TABLE `filament_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_type` varchar(255) NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filament_comments`
--

INSERT INTO `filament_comments` (`id`, `user_id`, `subject_type`, `subject_id`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'App\\Models\\OrderQuotation', 1, '<p>hi users</p>', '2024-10-03 07:27:33', '2024-10-03 07:27:33', NULL),
(2, 1, 'App\\Models\\Order', 2, 'ODR-YGKN5R order has been delivered', '2024-09-02 10:14:00', '2024-09-02 10:14:00', NULL),
(3, 1, 'App\\Models\\OrderDelivery', 1, '<p>hey users</p>', '2024-10-03 07:42:53', '2024-10-03 07:42:53', NULL),
(4, 1, 'App\\Models\\Order', 2, 'ODR-YGKN5R order delivery has been updated', '2024-09-02 10:14:00', '2024-09-02 10:14:00', NULL),
(5, 1, 'App\\Models\\Order', 4, '<p>nice order</p>', '2024-10-03 08:01:52', '2024-10-03 08:01:52', NULL),
(6, 1, 'App\\Models\\Order', 2, 'ODR-E30YA7 order has been delivered', '2024-09-02 10:14:00', '2024-09-02 10:14:00', NULL),
(7, 1, 'App\\Models\\Order', 2, 'ODR-E30YA7 order delivery has been updated', '2024-09-02 10:14:00', '2024-09-02 10:14:00', NULL),
(8, 1, 'App\\Models\\Order', 2, 'ODR-7G79XX order has been delivered', '2024-09-02 10:14:00', '2024-09-02 10:14:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `imports`
--

CREATE TABLE `imports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `completed_at` timestamp NULL DEFAULT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `importer` varchar(255) NOT NULL,
  `processed_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_rows` int(10) UNSIGNED NOT NULL,
  `successful_rows` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_09_105635_add_column_to_users_table', 1),
(5, '2024_08_13_140823_create_imports_table', 1),
(6, '2024_08_13_140824_create_exports_table', 1),
(7, '2024_08_13_140825_create_failed_import_rows_table', 1),
(8, '2024_08_14_083731_create_notifications_table', 1),
(9, '2024_08_29_111756_create_countries_table', 1),
(10, '2024_08_29_111941_add_columns_to_users_table', 1),
(11, '2024_09_07_105556_create_customers_table', 1),
(12, '2024_09_14_135614_create_services_table', 1),
(13, '2024_09_16_102349_create_orders_table', 1),
(14, '2024_09_20_113711_create_order_assignees_table', 1),
(15, '2024_09_24_081504_create_order_quotations_table', 1),
(16, '2024_09_06_102358_create_designs_table', 2),
(17, '2024_09_20_112524_create_developments_table', 2),
(18, '2024_09_27_110803_create_categories_table', 3),
(19, '2024_09_27_132108_create_filament_comments_table', 3),
(20, '2024_09_27_132109_add_index_to_subject', 3),
(21, '2024_09_28_133955_create_order_deliveries_table', 3),
(22, '2024_09_24_091115_create_permission_tables', 4),
(23, '2024_10_04_075712_create_developments_table', 5),
(24, '2024_10_04_075740_create_designs_table', 5),
(25, '2024_10_04_094139_create_permission_tables', 6);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0d7c54cb-74c0-492e-8c0d-39f317b55720', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 5, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Quotation\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/8\\/order-quotations\\/4\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"super admin create a new quotation for this order ODR-LHELPY.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Quotation Created!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 06:42:26', '2024-10-04 06:42:26'),
('0f83d03c-437a-4878-9bb8-79351abf1d1d', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View Order\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/6\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin has updated your order ODR-7G79XX\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Your Order updated! ODR-7G79XX\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 04:14:02', '2024-10-04 04:14:02'),
('22bae37a-1a8c-4d44-9117-bd5b64673044', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 5, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/8\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"Alexa client create a new order ODR-LHELPY\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 06:11:46', '2024-10-04 06:11:46'),
('2f1bf708-a0fa-4059-bf4c-539b9dcc7071', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Quotation\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/6\\/order-quotations\\/3\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin create a new quotation for this order ODR-7G79XX.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Quotation Created!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 03:09:54', '2024-10-04 03:09:54'),
('3818911e-b1e9-420c-ab89-06e13f1a3653', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/8\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"Alexa client create a new order ODR-LHELPY\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 06:11:46', '2024-10-04 06:11:46'),
('6ee36c42-eaa0-4e91-86fa-30defe262aa1', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View Order\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/7\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin has updated order ODR-OFQQCU\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\" Order updated! ODR-OFQQCU\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 04:22:24', '2024-10-04 04:22:24'),
('861e3429-e777-4581-aa3d-c66d1db75ac9', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/6\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"client create a new order ODR-7G79XX\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 03:07:01', '2024-10-04 03:07:01'),
('861f09da-ce42-450f-8197-4f59e0f0dbf6', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 3, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/developer\\/orders\\/5\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"Admin assigned a order to you\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Order assigned!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-03 09:40:53', '2024-10-03 09:40:53'),
('8e439811-9d3f-4488-bff8-e2cd5ff5e88d', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[{\"name\":\"View Order\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/6\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin has updated your order ODR-7G79XX\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Your Order updated! ODR-7G79XX\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 04:14:02', '2024-10-04 04:14:02'),
('90ac2c7d-5c62-47cc-8aec-eeeb925069da', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/7\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin create a new order ODR-OFQQCU\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 04:20:38', '2024-10-04 04:20:38'),
('c3e74f81-f071-4ee0-bac4-e0f7c512513e', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Quotation\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/8\\/order-quotations\\/4\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"super admin create a new quotation for this order ODR-LHELPY.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Quotation Created!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 06:42:26', '2024-10-04 06:42:26'),
('d1a2feff-27c5-4450-b144-12bb2550dc94', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View Order Quotation\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order Quotation\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/8\\/order-quotations\\/4\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"Payment was successfully completed for Quotation #QUO-OMBBFS.\",\"color\":null,\"duration\":\"persistent\",\"icon\":\"heroicon-o-check-circle\",\"iconColor\":\"success\",\"status\":\"success\",\"title\":\"Payment received for Order #ODR-LHELPY\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 06:45:56', '2024-10-04 06:45:56'),
('d2ec4971-0c91-4dfe-b82a-dfc48e1b04b3', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[{\"name\":\"View Order Delivery\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order Delivery\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/6\\/order-deliveries\\/3\",\"view\":\"filament-actions::button-action\"}],\"body\":\"client has delivered order ODR-7G79XX\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Order delivery! ODR-7G79XX\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 03:07:49', '2024-10-04 03:07:49'),
('e452e18c-fba6-4404-a295-d26bc3de2615', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 4, '{\"actions\":[{\"name\":\"View\",\"color\":\"brown\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Quotation\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/client\\/orders\\/6\\/order-quotations\\/3\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"Quotation #QUO-CXY4X6 has been approved by admin.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Quotation Approved!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-10-04 03:10:21', '2024-10-04 03:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_id`, `service_id`, `service_type`, `notes`, `created_at`, `updated_at`) VALUES
(6, 4, 'ODR-7G79XX', 1, 'App\\Models\\Design', NULL, '2024-10-04 03:07:00', '2024-10-04 04:02:26'),
(7, 1, 'ODR-OFQQCU', 2, 'App\\Models\\Development', NULL, '2024-10-04 04:20:38', '2024-10-04 04:22:24'),
(8, 5, 'ODR-LHELPY', 2, 'App\\Models\\Development', '<p>Dolores esse sunt, e.</p>', '2024-10-04 06:11:45', '2024-10-04 06:11:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_assignees`
--

CREATE TABLE `order_assignees` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_assignees`
--

INSERT INTO `order_assignees` (`order_id`, `user_id`) VALUES
(6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_deliveries`
--

CREATE TABLE `order_deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`delivery_files`)),
  `delivery_note` text NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_deliveries`
--

INSERT INTO `order_deliveries` (`id`, `delivery_files`, `delivery_note`, `status`, `user_id`, `order_id`, `created_at`, `updated_at`) VALUES
(3, '[\"01J9B946Z30MR8B6TJ065FJGAY.png\"]', '<p>first delivery</p>', 'Pending', 4, 6, '2024-10-04 03:07:48', '2024-10-04 03:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_quotations`
--

CREATE TABLE `order_quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_number` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `estimated_cost` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `notes` text DEFAULT NULL,
  `approved_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_quotations`
--

INSERT INTO `order_quotations` (`id`, `quotation_number`, `created_by`, `order_id`, `estimated_cost`, `description`, `deadline`, `status`, `notes`, `approved_by`, `created_at`, `updated_at`) VALUES
(3, 'QUO-CXY4X6', 1, 6, 500.00, '<p>sdafsdfsdfasdfasd</p>', '2024-10-19', 'Approved', '<p>asdfasdfasdf</p>', 4, '2024-10-04 03:09:54', '2024-10-04 03:14:45'),
(4, 'QUO-OMBBFS', 1, 8, 45.00, '<p>Et est esse, reprehe.</p>', '2004-06-24', 'Approved', '<p>In dolore distinctio.</p>', 5, '2024-10-04 06:42:26', '2024-10-04 06:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'order-all', 'web', '2024-10-03 02:00:20', '2024-10-03 02:00:20'),
(2, 'create-order', 'web', '2024-10-03 02:01:42', '2024-10-03 02:01:42'),
(3, 'view-order', 'web', '2024-10-03 02:02:07', '2024-10-03 02:02:07'),
(4, 'edit-order', 'web', '2024-10-03 02:02:15', '2024-10-03 02:02:15'),
(5, 'delete-order', 'web', '2024-10-03 02:02:23', '2024-10-03 02:02:23'),
(6, 'assign_orders_to_developers', 'web', '2024-10-03 02:11:03', '2024-10-03 02:11:03'),
(7, 'manage-order-quotations', 'web', '2024-10-03 02:22:22', '2024-10-03 02:22:22'),
(8, 'view-order-quotation', 'web', '2024-10-03 02:22:45', '2024-10-03 02:22:45'),
(9, 'edit-order-quotation', 'web', '2024-10-03 02:22:55', '2024-10-03 02:22:55'),
(10, 'create-order-quotation', 'web', '2024-10-03 02:23:18', '2024-10-03 02:23:18'),
(11, 'can-approve-quotation', 'web', '2024-10-03 02:24:46', '2024-10-03 02:24:46'),
(12, 'can-comment-on-order-quotation', 'web', '2024-10-03 02:26:42', '2024-10-03 02:26:42'),
(13, 'manage-order-deliveries', 'web', '2024-10-03 02:37:15', '2024-10-03 02:37:15'),
(14, 'view-order-deliveries', 'web', '2024-10-03 02:37:34', '2024-10-03 02:37:34'),
(15, 'edit-order-deliveries', 'web', '2024-10-03 02:37:46', '2024-10-03 02:37:46'),
(16, 'create-order-deliveries', 'web', '2024-10-03 02:38:04', '2024-10-03 02:38:04'),
(17, 'can-comment-on-order-delivery', 'web', '2024-10-03 02:38:16', '2024-10-03 02:38:16'),
(18, 'can-comment-on-order', 'web', '2024-10-03 02:59:56', '2024-10-03 02:59:56'),
(23, 'start-order-payment', 'web', '2024-10-03 03:27:11', '2024-10-03 03:27:11'),
(24, 'approve-order-quotation', 'web', '2024-10-03 03:29:21', '2024-10-03 03:29:21'),
(25, 'view-own-orders', 'web', '2024-10-04 04:49:06', '2024-10-04 04:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-10-04 04:51:28', '2024-10-04 04:51:28'),
(2, 'developer', 'web', '2024-10-04 04:56:42', '2024-10-04 04:56:42'),
(3, 'support', 'web', '2024-10-04 05:12:54', '2024-10-04 05:12:54'),
(4, 'client', 'web', '2024-10-04 10:17:23', '2024-10-04 10:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(12, 4),
(13, 1),
(13, 2),
(13, 4),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(16, 4),
(17, 1),
(17, 2),
(17, 4),
(18, 1),
(18, 2),
(18, 4),
(23, 4),
(24, 4),
(25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'design', 'App\\Models\\Design', '2024-10-04 07:52:50', '2024-10-05 07:52:50'),
(2, 'development', 'App\\Models\\Development', '2024-10-04 07:52:50', '2024-10-05 07:52:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_system_admin` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 4,
  `phone_number` varchar(255) DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `is_admin`, `is_system_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `phone_number`, `country_id`, `company_name`) VALUES
(1, 'super admin', 'admin@gmail.com', 1, 1, NULL, '$2y$12$iAr47MzCV9obODVVgAKzPu0ySt5uQeKGH4UBM5Ds8zMPsbkVV3rDS', NULL, '2024-10-04 07:54:15', '2024-10-04 02:56:05', 1, NULL, NULL, NULL),
(2, 'joe  developer', 'developer@gmail.com', 0, 0, NULL, '$2y$12$Y/iId6vbddWEES7aTRlw9uLnF7/Pwgx5lMjFtPHdf8mYqgHPZcMIy', NULL, '2024-10-04 08:00:03', '2024-10-04 03:01:14', 2, NULL, NULL, NULL),
(3, 'elsa support', 'support@gmail.com', 0, 0, NULL, '$2y$10$bKdadIHndN34.eshF1oaS.XZM3ZlPeE6M6gw/Ce6L61VWMkbqr3Sq', NULL, '2024-10-04 08:02:49', '2024-10-04 08:02:49', 3, NULL, NULL, NULL),
(4, 'harry client', 'client@gmail.com', 0, 0, NULL, '$2y$12$2Tw0cUgn9p5UiR4M3DndY.UxazjFn1GInYDpGs5xEM/YOXhUUX316', NULL, '2024-10-04 08:03:46', '2024-10-04 03:04:45', 4, NULL, NULL, NULL),
(5, 'Alexa client', 'alexa@gmail.com', 0, 0, NULL, '$2y$12$Nc/EK/TYq7d3H.9hWXe1kuu1vxHCVzgxREegDH9ue4aQ4fI0/ses6', NULL, '2024-10-04 10:21:09', '2024-10-04 05:22:34', 4, NULL, NULL, NULL),
(6, 'david developer', 'david@gmail.com', 0, 0, NULL, '$2y$12$vMzZO7kfTLuWjRjuAV4F.u2G8qMs4ZfU8pB5NMS.hVf4VpMIT8k0O', NULL, '2024-10-04 11:31:50', '2024-10-04 06:33:35', 2, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designs_designer_id_foreign` (`designer_id`),
  ADD KEY `designs_project_id_foreign` (`project_id`);

--
-- Indexes for table `developments`
--
ALTER TABLE `developments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developments_developer_id_foreign` (`developer_id`),
  ADD KEY `developments_project_id_foreign` (`project_id`);

--
-- Indexes for table `exports`
--
ALTER TABLE `exports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exports_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `failed_import_rows_import_id_foreign` (`import_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `filament_comments`
--
ALTER TABLE `filament_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `filament_comments_subject_type_subject_id_index` (`subject_type`,`subject_id`);

--
-- Indexes for table `imports`
--
ALTER TABLE `imports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imports_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_service_id_foreign` (`service_id`);

--
-- Indexes for table `order_assignees`
--
ALTER TABLE `order_assignees`
  ADD PRIMARY KEY (`order_id`,`user_id`),
  ADD KEY `order_assignees_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_deliveries_user_id_foreign` (`user_id`),
  ADD KEY `order_deliveries_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_quotations`
--
ALTER TABLE `order_quotations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_quotations_quotation_number_unique` (`quotation_number`),
  ADD KEY `order_quotations_created_by_foreign` (`created_by`),
  ADD KEY `order_quotations_order_id_foreign` (`order_id`),
  ADD KEY `order_quotations_approved_by_foreign` (`approved_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `developments`
--
ALTER TABLE `developments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exports`
--
ALTER TABLE `exports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filament_comments`
--
ALTER TABLE `filament_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `imports`
--
ALTER TABLE `imports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_quotations`
--
ALTER TABLE `order_quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `designs`
--
ALTER TABLE `designs`
  ADD CONSTRAINT `designs_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `designs_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `developments`
--
ALTER TABLE `developments`
  ADD CONSTRAINT `developments_developer_id_foreign` FOREIGN KEY (`developer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `developments_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exports`
--
ALTER TABLE `exports`
  ADD CONSTRAINT `exports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `failed_import_rows`
--
ALTER TABLE `failed_import_rows`
  ADD CONSTRAINT `failed_import_rows_import_id_foreign` FOREIGN KEY (`import_id`) REFERENCES `imports` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `imports`
--
ALTER TABLE `imports`
  ADD CONSTRAINT `imports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_assignees`
--
ALTER TABLE `order_assignees`
  ADD CONSTRAINT `order_assignees_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_assignees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_deliveries`
--
ALTER TABLE `order_deliveries`
  ADD CONSTRAINT `order_deliveries_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_deliveries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_quotations`
--
ALTER TABLE `order_quotations`
  ADD CONSTRAINT `order_quotations_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_quotations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_quotations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
