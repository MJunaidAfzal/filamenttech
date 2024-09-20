-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2024 at 03:46 PM
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
('laravel_cache_1b6453892473a467d07372d45eb05abc2031647a', 'i:1;', 1726839120),
('laravel_cache_1b6453892473a467d07372d45eb05abc2031647a:timer', 'i:1726839120;', 1726839120),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1726838305),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1726838305;', 1726838305),
('laravel_cache_a17961fa74e9275d529f489537f179c05d50c2f3', 'i:2;', 1726838697),
('laravel_cache_a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1726838697;', 1726838697),
('laravel_cache_jobahy@mailinator.com|127.0.0.1', 'i:1;', 1726235636),
('laravel_cache_jobahy@mailinator.com|127.0.0.1:timer', 'i:1726235636;', 1726235636),
('laravel_cache_mugi@mailinator.com|127.0.0.1', 'i:1;', 1726235762),
('laravel_cache_mugi@mailinator.com|127.0.0.1:timer', 'i:1726235762;', 1726235762),
('laravel_cache_qofecyhu@mailinator.com|127.0.0.1', 'i:1;', 1726235717),
('laravel_cache_qofecyhu@mailinator.com|127.0.0.1:timer', 'i:1726235717;', 1726235717);

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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Rafael Harper', 'dydu@mailinator.com', '0384935892', 'Animi est alias est', 'Malone and Coleman Traders', '2024-09-07 06:16:18', '2024-09-07 06:16:18'),
(2, 'Philip Burt', 'xytage@mailinator.com', '03789457936', 'Laborum Numquam aut', 'Barton and Meadows LLC', '2024-09-07 06:21:12', '2024-09-07 06:21:12'),
(3, 'Dai Arnold', 'fefymeki@mailinator.com', '0394589569', 'Doloribus omnis est ', 'Roman Juarez Associates', '2024-09-07 06:21:55', '2024-09-07 06:21:55'),
(4, 'Olivia Burns', 'jogogopi@mailinator.com', '0384695645', 'Culpa numquam et qu', 'Mcdaniel and Roman Co', '2024-09-07 06:23:02', '2024-09-07 06:23:02'),
(5, 'Candice Woodard', 'tewakyqok@mailinator.com', '038967946', 'Sint dolorem maxime ', 'Frank and Schneider Inc', '2024-09-07 06:23:22', '2024-09-07 06:23:22');

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` enum('In Progress','Completed') NOT NULL,
  `file` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designs`
--

INSERT INTO `designs` (`id`, `designer_id`, `title`, `category`, `status`, `file`, `feedback`, `deadline`, `description`, `created_at`, `updated_at`, `project_id`) VALUES
(5, 1, 'Id voluptas voluptat', 'Minus ut minus adipi', 'In Progress', '01J87J58EC50ZHHBFN9G836ER0.jpg', 'Omnis mollitia rerum', '2013-07-14', '<p>Ipsum exercitationem.</p>', '2024-09-20 06:13:00', '2024-09-20 07:15:11', 65),
(6, 1, 'Sunt eu reprehender', 'Deleniti dolore cill', 'Completed', '01J87R7THKMTCH1CJEEDF9C0SK.jpeg', 'Sunt nihil nostrud ', '1983-01-27', '<p>Tempore, obcaecati m.</p>', '2024-09-20 07:59:16', '2024-09-20 07:59:16', 75),
(7, 1, 'Dignissimos illum u', 'Adipisci nulla conse', 'Completed', '01J87SA1X4QS9FXRMATS1EF5HB.jpg', 'Quis et eius ut libe', '1980-07-12', '<p>Quos vel dolore volu.</p>', '2024-09-20 08:17:58', '2024-09-20 08:17:58', 76),
(8, 4, 'Velit ex recusandae', 'Logossfdasf', 'Completed', '01J87T2CR30MVCHBS04WSD9WEN.jpg', 'dsfsdafasfdafaf', '2024-10-02', '<p>asfasfdcasfasfd</p>', '2024-09-20 08:31:15', '2024-09-20 08:34:18', 77);

-- --------------------------------------------------------

--
-- Table structure for table `developments`
--

CREATE TABLE `developments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `developer_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` enum('In Progress','Completed') NOT NULL,
  `version` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `code_repository_url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developments`
--

INSERT INTO `developments` (`id`, `developer_id`, `project_id`, `title`, `status`, `version`, `file`, `feedback`, `deadline`, `code_repository_url`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 72, 'Deserunt qui nihil a', 'In Progress', 'Cillum esse enim ex ', '01J87JYXEQVCC3B8A3XB43XDHP.png', 'Saepe quasi error qu', '1989-11-14', 'Facere in sit veniam', '<p>Non sed itaque aut s.</p>', '2024-09-20 06:27:01', '2024-09-20 06:27:01'),
(3, 1, 74, 'Cumque facere dolore', 'In Progress', 'Eos doloribus repel', '01J87KMED0T6GZ1NJPAHG6J04F.jpg', 'Doloribus quo accusa', '2001-07-13', 'Ullamco nisi amet e', '<p>Et quibusdam volupta.</p>', '2024-09-20 06:38:47', '2024-09-20 06:38:47');

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
(4, '2024_08_09_074752_create_permission_table', 1),
(5, '2024_08_09_075453_create_roles_table', 1),
(6, '2024_08_09_105635_add_column_to_users_table', 1),
(7, '2024_08_09_115701_add_column_to_roles', 1),
(8, '2024_08_13_123536_create_project_types_table', 1),
(9, '2024_08_13_125506_create_projects_table', 1),
(10, '2024_08_13_140823_create_imports_table', 1),
(11, '2024_08_13_140824_create_exports_table', 1),
(12, '2024_08_13_140825_create_failed_import_rows_table', 1),
(13, '2024_08_14_083731_create_notifications_table', 1),
(15, '2024_08_29_111756_create_countries_table', 2),
(18, '2024_08_29_111941_add_columns_to_users_table', 3),
(19, '2024_08_29_134110_create_services_table', 4),
(20, '2024_08_30_080011_create_attachments_table', 5),
(24, '2024_09_04_133340_create_platforms_table', 6),
(26, '2024_09_05_114935_create_graphic_designs_table', 8),
(27, '2024_09_06_102358_create_designs_table', 9),
(29, '2024_09_06_154322_create_menus_table', 11),
(31, '2024_09_07_094539_create_permission_role_table', 13),
(32, '2024_09_07_105556_create_customers_table', 14),
(33, '2024_09_13_123701_create_project_assignees_table', 15),
(34, '2024_09_13_125105_create_project_assignees_table', 16),
(35, '2024_09_14_135614_create_services_table', 17),
(36, '2024_09_14_140703_add_columns_to_projects_table', 18),
(37, '2024_09_16_102349_create_orders_table', 19),
(38, '2024_09_16_121048_add_column_to_designs_table', 20),
(39, '2024_09_16_121111_add_column_to_developments_table', 20),
(40, '2024_09_06_115155_create_developments_table', 21),
(41, '2024_09_20_112524_create_developments_table', 22),
(42, '2024_09_20_113013_create_order_assignees_table', 23),
(43, '2024_09_20_113711_create_order_assignees_table', 24);

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
('679bd6e6-2ea9-463e-b534-7d1ddb0bfe6b', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View\",\"color\":\"primary\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/77\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"client create a new order.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-20 08:31:15', '2024-09-20 08:31:15'),
('8ec1aec4-d64a-4a78-bb04-df332f3fcf6d', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 1, '{\"actions\":[{\"name\":\"View\",\"color\":\"primary\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"after\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/admin\\/orders\\/76\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin create a new order.\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"New Order!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-20 08:17:58', '2024-09-20 08:17:58'),
('afb10c61-1db5-44a9-85f7-d51e51ea1026', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 19, '{\"actions\":[{\"name\":\"markAsUnread\",\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Mark as unread\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":true,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":null,\"view\":\"filament-actions::button-action\"}],\"body\":\"Admin asign you for this Project\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"You are Asign By admin\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-05 10:28:14', '2024-09-05 10:28:14'),
('bddf2cc9-a215-43ea-a877-8bebee6d0f3a', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 5, '{\"actions\":[{\"name\":\"View\",\"color\":\"primary\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/developer\\/orders\\/65\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin assigned a order to you\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Order assigned!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-20 08:21:44', '2024-09-20 08:21:44'),
('c80f687b-9c8b-43d6-86c4-37faabb5fb87', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 19, '{\"actions\":[{\"name\":\"markAsUnread\",\"color\":null,\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":null,\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"Mark as unread\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":true,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":null,\"view\":\"filament-actions::button-action\"}],\"body\":\"Admin asign you for this Project\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"You are Asign By admin\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-05 09:14:27', '2024-09-05 09:14:27'),
('dff3ff16-b735-4004-8546-760aa649b2ce', 'Filament\\Notifications\\DatabaseNotification', 'App\\Models\\User', 2, '{\"actions\":[{\"name\":\"View\",\"color\":\"primary\",\"event\":null,\"eventData\":[],\"dispatchDirection\":false,\"dispatchToComponent\":null,\"extraAttributes\":[],\"icon\":\"heroicon-s-folder\",\"iconPosition\":\"before\",\"iconSize\":null,\"isOutlined\":false,\"isDisabled\":false,\"label\":\"View Order\",\"shouldClose\":false,\"shouldMarkAsRead\":false,\"shouldMarkAsUnread\":false,\"shouldOpenUrlInNewTab\":false,\"size\":\"sm\",\"tooltip\":null,\"url\":\"http:\\/\\/127.0.0.1:8000\\/developer\\/orders\\/65\\/view\",\"view\":\"filament-actions::button-action\"}],\"body\":\"admin assigned a order to you\",\"color\":null,\"duration\":\"persistent\",\"icon\":null,\"iconColor\":null,\"status\":null,\"title\":\"Order assigned!\",\"view\":\"filament-notifications::notification\",\"viewData\":[],\"format\":\"filament\"}', NULL, '2024-09-20 08:21:44', '2024-09-20 08:21:44');

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
(65, 1, 'ODR-BR84SL', 1, 'App\\Models\\Design', NULL, '2024-09-20 06:13:00', '2024-09-20 08:21:44'),
(72, 1, 'ODR-PC5LVT', 2, 'App\\Models\\Development', '<p>Non sed itaque aut s.</p>', '2024-09-20 06:27:01', '2024-09-20 07:08:00'),
(73, 1, 'ODR-WTWRXN', 2, 'App\\Models\\Development', '<p>Quaerat ea quis dolo.</p>', '2024-09-20 06:35:59', '2024-09-20 06:35:59'),
(74, 1, 'ODR-N9MATF', 2, 'App\\Models\\Development', '<p>hjgkjhk</p>', '2024-09-20 06:38:47', '2024-09-20 08:12:56'),
(75, 1, 'ODR-BWHJNE', 1, 'App\\Models\\Design', '<p>Est est, quisquam es.</p>', '2024-09-20 07:59:16', '2024-09-20 07:59:16'),
(76, 1, 'ODR-LPUIV4', 1, 'App\\Models\\Design', '<p>Labore ea doloribus .</p>', '2024-09-20 08:17:58', '2024-09-20 08:17:58'),
(77, 4, 'ODR-FZPUAA', 1, 'App\\Models\\Design', NULL, '2024-09-20 08:31:15', '2024-09-20 08:34:18');

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
(65, 2),
(65, 5),
(74, 2),
(74, 5),
(75, 2);

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
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'view_users', 'Permission to view users', NULL, NULL),
(3, 'create_user', 'Permission to create a new user', NULL, NULL),
(4, 'edit_user', 'Permission to edit user details', NULL, NULL),
(5, 'delete_user', 'Permission to delete a user', NULL, NULL),
(6, 'assign_roles', 'Permission to assign roles to users', NULL, NULL),
(7, 'view_projects', 'Permission to view all projects', NULL, NULL),
(8, 'create_project', 'Permission to create a new project', NULL, NULL),
(9, 'edit_project', 'Permission to edit project details', NULL, NULL),
(10, 'delete_project', 'Permission to delete a project', NULL, NULL),
(11, 'assign_projects_to_developers', 'Permission to assign projects to developers', NULL, NULL),
(12, 'view_customers', 'Permission to view customer details', NULL, NULL),
(13, 'edit_customer', 'Permission to edit customer details', NULL, NULL),
(14, 'delete_customer', 'Permission to delete a customer', NULL, NULL),
(15, 'view_project_types', 'Permission to view project types', NULL, NULL),
(16, 'edit_project_types', 'Permission to edit project types', NULL, NULL),
(17, 'manage_roles', 'Permission to manage roles in the system', NULL, NULL),
(18, 'view_reports', 'Permission to view system reports', NULL, NULL),
(19, 'view_assigned_projects', 'Permission to view assigned projects (Developer)', NULL, NULL),
(20, 'edit_project_status', 'Permission to edit project status (Developer)', NULL, NULL),
(21, 'update_code_repository', 'Permission to update project code repository', NULL, NULL),
(22, 'view_project_details', 'Permission to view project details', NULL, NULL),
(23, 'view_designs', 'Permission to view design resources', NULL, NULL),
(24, 'view_own_projects', 'Permission for clients to view their own projects', NULL, NULL),
(25, 'edit_own_project', 'Permission for clients to edit their own projects', NULL, NULL),
(26, 'upload_files_to_project', 'Permission to upload files to a project (Client)', NULL, NULL),
(27, 'view_design_categories', 'Permission to view design categories in projects', NULL, NULL),
(28, 'update_project', 'Permission to update projects.', '2024-09-07 10:13:53', '2024-09-07 10:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 1, 13, NULL, NULL),
(4, 1, 25, NULL, NULL),
(5, 1, 14, NULL, NULL),
(6, 1, 9, NULL, NULL),
(8, 1, 3, NULL, NULL),
(9, 1, 16, NULL, NULL),
(10, 1, 4, NULL, NULL),
(11, 1, 17, NULL, NULL),
(12, 1, 26, NULL, NULL),
(15, 1, 12, NULL, NULL),
(16, 1, 8, NULL, NULL),
(17, 1, 27, NULL, NULL),
(18, 1, 24, NULL, NULL),
(20, 1, 15, NULL, NULL),
(21, 1, 7, NULL, NULL),
(23, 1, 18, NULL, NULL),
(24, 1, 2, NULL, NULL),
(25, 1, 6, NULL, NULL),
(26, 1, 11, NULL, NULL),
(27, 2, 20, NULL, NULL),
(28, 2, 21, NULL, NULL),
(29, 2, 19, NULL, NULL),
(30, 2, 22, NULL, NULL),
(31, 2, 23, NULL, NULL),
(32, 3, 19, NULL, NULL),
(33, 3, 12, NULL, NULL),
(34, 3, 7, NULL, NULL),
(35, 3, 22, NULL, NULL),
(36, 4, 8, NULL, NULL),
(37, 4, 24, NULL, NULL),
(38, 4, 28, NULL, NULL),
(39, 4, 22, NULL, NULL),
(40, 1, 28, NULL, NULL),
(41, 1, 22, NULL, NULL),
(42, 1, 23, NULL, NULL),
(43, 1, 19, NULL, NULL),
(44, 1, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `deadline` date NOT NULL,
  `file` varchar(255) NOT NULL,
  `no_of_pages` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `price` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` enum('pending','completed','failed','refunded') NOT NULL DEFAULT 'pending',
  `service_id` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_assignees`
--

CREATE TABLE `project_assignees` (
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_types`
--

CREATE TABLE `project_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `design` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_types`
--

INSERT INTO `project_types` (`id`, `name`, `status`, `design`, `website`, `created_at`, `updated_at`) VALUES
(1, 'Web Development:', 1, 'Web Development:', 'Web Development:', '2024-09-16 10:13:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, NULL),
(2, 'Developer', 'developer', NULL, NULL),
(3, 'Support', 'support', NULL, NULL),
(4, 'Client', 'client', NULL, NULL);

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
(1, 'design', 'App\\Models\\Design', '2024-09-14 13:58:26', '2024-09-14 13:58:26'),
(2, 'development', 'App\\Models\\Development', '2024-09-14 13:58:26', '2024-09-14 13:58:26');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mcZ5P3ZaP2Yi7hEAWHas1hKEcGoWuNTc85p6Dffj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoia3hJb3EwOU54RzJjSllrcDdOZ1hyeWh3V0pxV3NlekFxRk1rVnhCSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkd2FOekhFeGlCM2VRM0tjYnlWbHZHLmcxd0gzOFpKOGxxcVNUODEyWmxlbjRJd0xKMHVMSEciO30=', 1725523367);

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
(1, 'admin', 'admin@gmail.com', 1, 1, NULL, '$2y$12$waNzHExiB3eQ3KcbyVlvG.g1wH38ZJ8lqqST812Zlen4IwLJ0uLHG', NULL, NULL, '2024-08-27 08:52:28', 1, NULL, NULL, NULL),
(2, 'developer', 'developer@gmail.com', 0, 0, NULL, '$2y$12$IAgUGAFXqRhXO.oayUImY.i4tsfC2S7/HFhxybyS2wYBJ9.F22cuK', NULL, NULL, '2024-08-27 09:55:32', 2, NULL, NULL, NULL),
(3, 'support', 'support@gmail.com', 0, 0, NULL, '$2y$12$oxC6PphLOj2ZAQ8ReXmavOeZL3N3HTr7zRVJBPVrVSa/32qE5.fX2', NULL, NULL, '2024-08-27 10:11:41', 3, NULL, NULL, NULL),
(4, 'client', 'client@gmail.com', 0, 0, NULL, '$2y$12$66NeEGyFYmL/sYhlTAsg9O0z4ET9TlMchHZdJB7MGvQyk1VUUvUJK', '1n020Ss1ldPiqs7HDa4hCQ4UONwX1MungQQ9TbzKiJcIkOAIU6TgUxiSRfF0', NULL, '2024-08-27 09:40:02', 4, NULL, NULL, NULL),
(5, 'developer2', 'developer2@gmail.com', 0, 0, NULL, '$2y$12$3f2VzbKFHVcwCUnNUi8XoudFOA8uqVRQHbi.oeTX92qd4gKCX46Gq', 'u5fhp7NlUQE2PkIlByKRVGgieIB0bZ9ufUpTPs2eEsaGcQ3jGrLkzswd0WbX', '2024-09-05 09:12:20', '2024-09-14 04:04:16', 2, '03454645667', 15, 'vision tech'),
(20, 'Hilel Smith', 'cyfop@mailinator.com', 0, 0, NULL, '$2y$12$Q7oG1OL8vZcGuXc2MJ2f7.mV0aomHTEPPTxdeEPhTw5gRpW8M8Miy', NULL, '2024-09-14 02:55:34', '2024-09-14 02:55:34', 4, '442', 76, 'Barrera Marshall LLC');

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`description`) USING HASH;

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_assignees`
--
ALTER TABLE `project_assignees`
  ADD PRIMARY KEY (`project_id`,`user_id`),
  ADD KEY `project_assignees_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_types`
--
ALTER TABLE `project_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `developments`
--
ALTER TABLE `developments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `project_types`
--
ALTER TABLE `project_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_assignees`
--
ALTER TABLE `project_assignees`
  ADD CONSTRAINT `project_assignees_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_assignees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
