-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2012 at 01:27 AM
-- Server version: 5.1.61
-- PHP Version: 5.3.6-13ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sri_conference`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_places`
--

CREATE TABLE IF NOT EXISTS `accommodation_places` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accommodation_places`
--

INSERT INTO `accommodation_places` (`id`, `title`, `description`) VALUES
(1, 'some ftp', 'No living rooms but you can try'),
(2, 'binary heap', 'memorial places');

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_places_rooms_types`
--

CREATE TABLE IF NOT EXISTS `accommodation_places_rooms_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `accommodation_places_rooms_types`
--

INSERT INTO `accommodation_places_rooms_types` (`id`, `title`) VALUES
(1, 'ingo'),
(2, 'pingo');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `countries_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `countries_id` (`countries_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `countries_id`, `name`, `approved`) VALUES
(1, 228, 'Kiev', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `conferences_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `contacts` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conferences_id` (`conferences_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=245 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `approved`) VALUES
(1, 'Afghanistan', 1),
(2, 'Aland Islands', 1),
(3, 'Albania', 1),
(4, 'Algeria', 1),
(5, 'American Samoa', 1),
(6, 'Andorra', 1),
(7, 'Angola', 1),
(8, 'Anguilla', 1),
(9, 'Antarctica', 1),
(10, 'Antigua and Barbuda', 1),
(11, 'Argentina', 1),
(12, 'Armenia', 1),
(13, 'Aruba', 1),
(14, 'Australia', 1),
(15, 'Austria', 1),
(16, 'Azerbaijan', 1),
(17, 'Bahamas', 1),
(18, 'Bahrain', 1),
(19, 'Bangladesh', 1),
(20, 'Barbados', 1),
(21, 'Belarus', 1),
(22, 'Belgium', 1),
(23, 'Belize', 1),
(24, 'Benin', 1),
(25, 'Bermuda', 1),
(26, 'Bhutan', 1),
(27, 'Bolivia', 1),
(28, 'Bosnia and Herzegovina', 1),
(29, 'Botswana', 1),
(31, 'Brazil', 1),
(32, 'British Indian Ocean Territory', 1),
(33, 'Brunei Darussalam', 1),
(34, 'Bulgaria', 1),
(35, 'Burkina Faso', 1),
(36, 'Burundi', 1),
(37, 'Cambodia', 1),
(38, 'Cameroon', 1),
(39, 'Canada', 1),
(40, 'Cape Verde', 1),
(41, 'Cayman Islands', 1),
(42, 'Central African Republic', 1),
(43, 'Chad', 1),
(44, 'Chile', 1),
(45, 'China', 1),
(46, 'Christmas Island', 1),
(47, 'Cocos (Keeling) Islands', 1),
(48, 'Colombia', 1),
(49, 'Comoros', 1),
(50, 'Congo', 1),
(51, 'Congo, The Democratic Republic of the', 1),
(52, 'Cook Islands', 1),
(53, 'Costa Rica', 1),
(54, 'Cote Ivoire', 1),
(55, 'Croatia', 1),
(56, 'Cuba', 1),
(57, 'Cyprus', 1),
(58, 'Czech Republic', 1),
(59, 'Denmark', 1),
(60, 'Djibouti', 1),
(61, 'Dominica', 1),
(62, 'Dominican Republic', 1),
(63, 'Ecuador', 1),
(64, 'Egypt', 1),
(65, 'El Salvador', 1),
(66, 'Equatorial Guinea', 1),
(67, 'Eritrea', 1),
(68, 'Estonia', 1),
(69, 'Ethiopia', 1),
(70, 'Falkland Islands (Malvinas)', 1),
(71, 'Faroe Islands', 1),
(72, 'Fiji', 1),
(73, 'Finland', 1),
(74, 'France', 1),
(75, 'French Guiana', 1),
(76, 'French Polynesia', 1),
(77, 'French Southern Territories', 1),
(78, 'Gabon', 1),
(79, 'Gambia', 1),
(80, 'Georgia', 1),
(81, 'Germany', 1),
(82, 'Ghana', 1),
(83, 'Gibraltar', 1),
(84, 'Greece', 1),
(85, 'Greenland', 1),
(86, 'Grenada', 1),
(87, 'Guadeloupe', 1),
(88, 'Guam', 1),
(89, 'Guatemala', 1),
(90, 'Guernsey', 1),
(91, 'Guinea', 1),
(92, 'Guinea-Bissau', 1),
(93, 'Guyana', 1),
(94, 'Haiti', 1),
(95, 'Heard Island and McDonald Islands', 1),
(96, 'Holy See (Vatican City State)', 1),
(97, 'Honduras', 1),
(98, 'Hong Kong', 1),
(99, 'Hungary', 1),
(100, 'Iceland', 1),
(101, 'India', 1),
(102, 'Indonesia', 1),
(103, 'Iran, Islamic Republic of', 1),
(104, 'Iraq', 1),
(105, 'Ireland', 1),
(106, 'Isle of Man', 1),
(107, 'Israel', 1),
(108, 'Italy', 1),
(109, 'Jamaica', 1),
(110, 'Japan', 1),
(111, 'Jersey', 1),
(112, 'Jordan', 1),
(113, 'Kazakhstan', 1),
(114, 'Kenya', 1),
(115, 'Kiribati', 1),
(116, 'Korea, Democratic Peoples Republic of', 1),
(117, 'Korea, Republic of', 1),
(118, 'Kuwait', 1),
(119, 'Kyrgyzstan', 1),
(120, 'Lao Peoples Democratic Republic', 1),
(121, 'Latvia', 1),
(122, 'Lebanon', 1),
(123, 'Lesotho', 1),
(124, 'Liberia', 1),
(125, 'Libyan Arab Jamahiriya', 1),
(126, 'Liechtenstein', 1),
(127, 'Lithuania', 1),
(128, 'Luxembourg', 1),
(129, 'Macao', 1),
(130, 'Macedonia', 1),
(131, 'Madagascar', 1),
(132, 'Malawi', 1),
(133, 'Malaysia', 1),
(134, 'Maldives', 1),
(135, 'Mali', 1),
(136, 'Malta', 1),
(137, 'Marshall Islands', 1),
(138, 'Martinique', 1),
(139, 'Mauritania', 1),
(140, 'Mauritius', 1),
(141, 'Mayotte', 1),
(142, 'Mexico', 1),
(143, 'Micronesia, Federated States of', 1),
(144, 'Moldova, Republic of', 1),
(145, 'Monaco', 1),
(146, 'Mongolia', 1),
(147, 'Montenegro', 1),
(148, 'Montserrat', 1),
(149, 'Morocco', 1),
(150, 'Mozambique', 1),
(151, 'Myanmar', 1),
(152, 'Namibia', 1),
(153, 'Nauru', 1),
(154, 'Nepal', 1),
(155, 'Netherlands', 1),
(156, 'Netherlands Antilles', 1),
(157, 'New Caledonia', 1),
(158, 'New Zealand', 1),
(159, 'Nicaragua', 1),
(160, 'Niger', 1),
(161, 'Nigeria', 1),
(162, 'Niue', 1),
(163, 'Norfolk Island', 1),
(164, 'Northern Mariana Islands', 1),
(165, 'Norway', 1),
(166, 'Oman', 1),
(167, 'Pakistan', 1),
(168, 'Palau', 1),
(169, 'Palestinian Territory', 1),
(170, 'Panama', 1),
(171, 'Papua New Guinea', 1),
(172, 'Paraguay', 1),
(173, 'Peru', 1),
(174, 'Philippines', 1),
(175, 'Pitcairn', 1),
(176, 'Poland', 1),
(177, 'Portugal', 1),
(178, 'Puerto Rico', 1),
(179, 'Qatar', 1),
(180, 'Reunion', 1),
(181, 'Romania', 1),
(182, 'Russian Federation', 1),
(183, 'Rwanda', 1),
(184, 'Saint Helena', 1),
(185, 'Saint Kitts and Nevis', 1),
(186, 'Saint Lucia', 1),
(187, 'Saint Pierre and Miquelon', 1),
(188, 'Saint Vincent and the Grenadines', 1),
(189, 'Samoa', 1),
(190, 'San Marino', 1),
(191, 'Sao Tome and Principe', 1),
(192, 'Saudi Arabia', 1),
(193, 'Senegal', 1),
(194, 'Serbia', 1),
(195, 'Seychelles', 1),
(196, 'Sierra Leone', 1),
(197, 'Singapore', 1),
(198, 'Slovakia', 1),
(199, 'Slovenia', 1),
(200, 'Solomon Islands', 1),
(201, 'Somalia', 1),
(202, 'South Africa', 1),
(203, 'South Georgia and the South Sandwich Islands', 1),
(204, 'Spain', 1),
(205, 'Sri Lanka', 1),
(206, 'Sudan', 1),
(207, 'Suriname', 1),
(208, 'Svalbard and Jan Mayen', 1),
(209, 'Swaziland', 1),
(210, 'Sweden', 1),
(211, 'Switzerland', 1),
(212, 'Syrian Arab Republic', 1),
(213, 'Taiwan', 1),
(214, 'Tajikistan', 1),
(215, 'Tanzania, United Republic of', 1),
(216, 'Thailand', 1),
(217, 'Timor-Leste', 1),
(218, 'Togo', 1),
(219, 'Tokelau', 1),
(220, 'Tonga', 1),
(221, 'Trinidad and Tobago', 1),
(222, 'Tunisia', 1),
(223, 'Turkey', 1),
(224, 'Turkmenistan', 1),
(225, 'Turks and Caicos Islands', 1),
(226, 'Tuvalu', 1),
(227, 'Uganda', 1),
(228, 'Ukraine', 1),
(229, 'United Arab Emirates', 1),
(230, 'United Kingdom', 1),
(231, 'United States', 1),
(232, 'United States Minor Outlying Islands', 1),
(233, 'Uruguay', 1),
(234, 'Uzbekistan', 1),
(235, 'Vanuatu', 1),
(236, 'Venezuela', 1),
(237, 'Vietnam', 1),
(238, 'Virgin Islands, British', 1),
(239, 'Virgin Islands, U.S.', 1),
(240, 'Wallis and Futuna', 1),
(241, 'Western Sahara', 1),
(242, 'Yemen', 1),
(243, 'Zambia', 1),
(244, 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8_bin NOT NULL,
  `mimetype` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Message`
--

CREATE TABLE IF NOT EXISTS `Message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '',
  `translation` text COLLATE utf8_bin,
  PRIMARY KEY (`id`,`language`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Message`
--

INSERT INTO `Message` (`id`, `language`, `translation`) VALUES
(1, 'ua', 'Про нас'),
(3, 'ua', 'Content info content'),
(1, 'ru', 'Про нас'),
(1, 'en', 'About us'),
(2, 'ua', ' конференція'),
(2, 'ru', ' конференция'),
(2, 'en', 'th conferenc'),
(3, 'ru', 'Content info content'),
(3, 'en', 'Content info content'),
(4, 'ua', 'Інфо'),
(4, 'ru', 'Инфо'),
(4, 'en', 'Info'),
(5, 'ua', 'Content info content'),
(5, 'ru', 'Content info content'),
(5, 'en', 'Content info content'),
(6, 'ua', 'Інфо'),
(6, 'ru', 'Инфо'),
(6, 'en', 'Info'),
(7, 'ua', '<font face="Arial, Verdana" size="2">registration</font>'),
(7, 'ru', '<font face="Arial, Verdana" size="2">registration</font>'),
(7, 'en', '<font face="Arial, Verdana" size="2">registration</font>'),
(8, 'ua', 'registration'),
(8, 'ru', 'registration'),
(8, 'en', 'registration'),
(9, 'ua', 'Ssalkjlkj'),
(9, 'ru', 'asdfshkkj'),
(9, 'en', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cities_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `cities_id` (`cities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `cities_id`, `title`, `approved`) VALUES
(1, 1, 'SRI KHU NANNU', 1),
(2, 1, 'Kiev National University', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_sm_id` int(11) unsigned NOT NULL,
  `order` int(11) unsigned NOT NULL,
  `content_sm_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conferences_id` (`content_sm_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title_sm_id`, `order`, `content_sm_id`) VALUES
(1, 6, 0, 5),
(2, 8, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `contries_id` int(10) unsigned NOT NULL,
  `cities_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `second_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `birthdate` date NOT NULL,
  `organizations_id` int(10) unsigned NOT NULL,
  `post` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `phone` varchar(255) COLLATE utf8_bin NOT NULL,
  `participation_type` enum('lecturer','listner') COLLATE utf8_bin NOT NULL,
  `report_type` enum('plenary','sessional','poster') COLLATE utf8_bin DEFAULT NULL,
  `sections_id` int(10) unsigned DEFAULT NULL,
  `accommodation_places_id` int(10) unsigned DEFAULT NULL,
  `accommodation_places_rooms_types_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `conferences_id` (`contries_id`,`cities_id`,`organizations_id`,`sections_id`),
  KEY `accommodation_places_id` (`accommodation_places_id`,`accommodation_places_rooms_types_id`),
  KEY `accommodation_places_rooms_types_id` (`accommodation_places_rooms_types_id`),
  KEY `cities_id` (`cities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `approved`, `contries_id`, `cities_id`, `name`, `second_name`, `last_name`, `gender`, `birthdate`, `organizations_id`, `post`, `email`, `phone`, `participation_type`, `report_type`, `sections_id`, `accommodation_places_id`, `accommodation_places_rooms_types_id`) VALUES
(1, 0, 228, 1, 'Anatolii', 'Volodymyrovych', 'Koval', 1, '0000-00-00', 2, 'Student', 'weralwolf@gmail.com', '+380632413879', 'lecturer', 'plenary', 0, 0, 0),
(2, 0, 233, 1, 'Tanya', 'blahivna', 'Gratko', 1, '0000-00-00', 2, 'Cleaner', 'gmail@gmail.com', '+380632413879', 'lecturer', 'plenary', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `participants_id` int(10) unsigned NOT NULL,
  `sections_id` int(10) unsigned NOT NULL,
  `files_id` int(10) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `autors` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_id` (`participants_id`,`sections_id`,`files_id`),
  KEY `sections_id` (`sections_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `subtitle` tinytext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `subtitle`) VALUES
(1, 'sect1', '---'),
(2, 'sect2', '---');

-- --------------------------------------------------------

--
-- Table structure for table `SourceMessage`
--

CREATE TABLE IF NOT EXISTS `SourceMessage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `message` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `SourceMessage`
--

INSERT INTO `SourceMessage` (`id`, `category`, `message`) VALUES
(1, 'MenuLinks', 'about_us'),
(2, 'MenuLinks', 'th_conference'),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, 'Pages', 'registration_content'),
(8, 'Pages', 'registration_title'),
(9, 'DDDD', 'dsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role_id`) VALUES
(1, 'root', '00eeb913b1bd46c5169add82fe6120cf', 'tayna_83@ukr.net ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `YiiSession`
--

CREATE TABLE IF NOT EXISTS `YiiSession` (
  `id` char(32) COLLATE utf8_bin NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` text COLLATE utf8_bin,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `YiiSession`
--

INSERT INTO `YiiSession` (`id`, `expire`, `data`) VALUES
('vnqjjb39lh4paldgkv391cd021', 1332888513, '834abe956272111ec003057c637bb04f__returnUrl|s:40:"/sri_conference/index.php?r=pages/create";834abe956272111ec003057c637bb04f__id|s:1:"1";834abe956272111ec003057c637bb04f__name|s:4:"root";834abe956272111ec003057c637bb04f__states|a:0:{}');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`countries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`contries_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`cities_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
