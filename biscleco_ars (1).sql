-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2016 at 04:50 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biscleco_ars`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `check_email`(IN `email` VARCHAR(100))
    NO SQL
BEGIN

SELECT `id`, `userId`, `firstname`, `lastname`, `email`, `password`, `status`, `loginType`, `ImageUrl`, `username`, `date`, `month`, `year`, `birthdate`, `lastping` 
	FROM `user` 
    WHERE 
    	`email` = email;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_login`(IN `username` VARCHAR(200), IN `email` VARCHAR(200), IN `password` VARCHAR(200))
    NO SQL
BEGIN


SELECT `id`, `userId`, `firstname`, `lastname`, `email`, `password`, `status`, `loginType`, `ImageUrl`, `username`, `date`, `month`, `year`, `birthdate`, `lastping` 
		FROM `user` 
		WHERE 
            `username`=username AND `password` = password 
                OR 
            `email`=username AND `password` = password;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_username`(INOUT `user_name` VARCHAR(500))
    NO SQL
BEGIN

SELECT `id`, `userId`, `firstname`, `lastname`, `email`, `password`, `status`, `loginType`, `ImageUrl`, `username`, `date`, `month`, `year`, `birthdate`, `lastping` 
	FROM `user` 
    WHERE ((@user_name is null) or (username = @user_name));

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_profile`(IN `userId` INT)
    NO SQL
BEGIN

INSERT INTO 
	profile 
    	(userId) 
    VALUES
    	(userId);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_settings`(IN `userId` INT, IN `blockedusers` LONGTEXT, IN `opentoSearch` INT, IN `opentoComment` INT, IN `emailtoMessage` INT, IN `emailtoFriend` INT, IN `openFnF` VARCHAR(255), IN `openBuypost` VARCHAR(255))
    NO SQL
BEGIN

INSERT INTO 
	settings
		 (userId, blockedusers, opentoSearch, opentoComment, emailtoMessage, 			emailtoFriend, openFnF, openBuypost)
         VALUES
         (userId, blockedusers, opentoSearch, opentoComment, emailtoMessage, 			emailtoFriend, openFnF, openBuypost);
         

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_user`(IN `email` VARCHAR(100), IN `firstname` VARCHAR(200), IN `lastname` VARCHAR(200), IN `password` VARCHAR(200), IN `date` VARCHAR(10), IN `month` VARCHAR(10), IN `year` VARCHAR(10), IN `username` VARCHAR(200))
    NO SQL
BEGIN

INSERT INTO
	user (email, firstname, lastname, password, username, date, month, year)
    VALUES
    	(email, firstname, lastname, password, username, date, month, year);
        SET @last_id = LAST_INSERT_ID();

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `create_userannouncement`(IN `userId` INT, IN `announcementId` INT)
    NO SQL
BEGIN

INSERT INTO userannouncement(userId, announcementId, status) 
	VALUES 
    	(userId, announcementId, 1);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_friendrequest`(IN `request_Sender` INT, IN `request_Receiver` INT)
    NO SQL
BEGIN

DELETE FROM friendrequest
	WHERE  
		requestSender=request_Sender 
        	AND 
        requestReceiver=request_Receiver;


END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_notification`(IN `notification_Receiver` INT, IN `notification_Sender` INT)
    NO SQL
BEGIN

DELETE FROM notification WHERE  

	notificationReceiver=notification_Receiver 
		AND
	notificationSender = notification_Sender;
    

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_announcement`()
    NO SQL
BEGIN

SELECT id, title, announcement FROM 
		announcement
    WHERE 
    	status= 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_buypostcomment`(IN `postId` INT)
    NO SQL
BEGIN

SELECT `id`, `userId`, `postId`, `date`, `content`, `month`, `day` FROM `buypostcomment` 
	WHERE 
    	`postId` = postId ORDER BY id DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_buypostlikes`(IN `userId` INT, IN `postId` INT)
    NO SQL
BEGIN

SELECT `id`, `userId`, `postId` FROM `buypostlikes` 
	WHERE 
    	`userId` = userId 
        	AND 
		`postId` = postId;
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_buyrequest`(IN `userId` INT, IN `startFrom` INT, IN `limitTo` INT)
    NO SQL
BEGIN

SELECT `id`, `title`, `description`, `industry`, `country`, `access`, `duration`, `anonymous`, `userId`, `date`, `month`, `day`, `status` FROM `buyrequest` 
	WHERE
    	`userId` = userId ORDER BY id DESC LIMIT startFrom, limitTo;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_countries`()
    NO SQL
BEGIN

SELECT `title` FROM `countries` WHERE 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_follower`(IN `userId1` INT)
    NO SQL
BEGIN

SELECT `id`, `userId1`, `userId2` FROM `follower` 
	WHERE 
    	`userId1` = userId1; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_friend`(IN `userId1` INT, IN `userId2` INT)
    NO SQL
BEGIN

SELECT `id`, `userId1`, `userId2` FROM `friend` 
	WHERE 
    	`userId1` =userId1
			OR 
		`userId2` = userId2 ;
        

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_industries`()
BEGIN

SELECT `title` FROM `industries` WHERE 1 ;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_messages`(IN `receiverId` INT, IN `isRead` INT)
    NO SQL
BEGIN


SELECT `id`, `senderId`, `receiverId`, `lasttime`, `message`, `attachment`, `isRead` FROM `messages`
	WHERE 
    `receiverId` = receiverId 
    	AND 
    `isRead` = isRead;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_notification`(IN `notificationReceiver` INT, IN `seen` INT)
    NO SQL
BEGIN


SELECT `id`, `notificationReceiver`, `notificationSender`, `notificationType`, `ntime`, `seen` FROM `notification` WHERE `notificationReceiver` = notificationReceiver AND `seen` = seen ORDER BY id DESC ; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_profile`(IN `userId` INT)
    NO SQL
BEGIN

SELECT `id`, `userId`, `company`, `position`, `country`, `state`, `city`, `businessType`, `product`, `industry`, `description`, `contact`, `access` FROM `profile` 	
	WHERE `userId` = userId;
    	

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_settings`(IN `userId` INT)
    NO SQL
BEGIN

SELECT `id`, `userId`, `blockedusers`, `opentoSearch`, `opentoComment`, `emailtoFriend`, `emailtoMessage`, `openFnF`, `openBuypost` FROM `settings` 	WHERE 
		`userId` = userId;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_single_product`(IN `id` INT)
    NO SQL
BEGIN

SELECT `id`, `title`, `description`, `access`, `imageUrl`, `date`, `userId` FROM `products` 
	WHERE 
		`id` = id;    	

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `show_single_user`(id int(11))
BEGIN

SELECT `id`, `userId`, `firstname`, `lastname`, `email`, `password`, `status`, `loginType`, `ImageUrl`, `username`, `date`, `month`, `year`, `birthdate`, `lastping` FROM `user` WHERE `id` = id;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `fullname`) VALUES
(1, 'admin', '$2y$10$VXgki8mltGsXXoVGCYx/CO5SWWBqjPDp1hT0oJ3eVMdd2XOJm7iMe', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `announcement` varchar(1000) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `announcement`, `status`) VALUES
(9, 'djkdjd', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(11) NOT NULL,
  `blocker` varchar(45) DEFAULT NULL,
  `blocked` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buypostcomment`
--

CREATE TABLE IF NOT EXISTS `buypostcomment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buypostcomment`
--

INSERT INTO `buypostcomment` (`id`, `userId`, `postId`, `date`, `content`, `month`, `day`) VALUES
(1, 2, 5, '2016-05-30', 'oo', 'May', '30'),
(2, 2, 5, '2016-05-30', 'oo', 'May', '30'),
(3, 2, 5, '2016-05-30', 'oo', 'May', '30'),
(4, 2, 5, '2016-05-30', 'po', 'May', '30'),
(5, 2, 5, '2016-06-01', 'u', 'June', '01'),
(6, 2, 5, '2016-06-01', 'oo', 'June', '01'),
(7, 2, 4, '2016-06-01', 'uu', 'June', '01'),
(8, 2, 2, '2016-06-01', '[p', 'June', '01'),
(9, 2, 31, '2016-06-25', 'e', 'June', '25'),
(10, 13, 29, '2016-06-25', 'ww', 'June', '25'),
(11, 13, 29, '2016-06-25', 'qwqe', 'June', '25'),
(15, 13, 25, '2016-06-25', 'sas', 'June', '25'),
(16, 14, 25, '2016-06-26', '22', 'June', '26'),
(17, 14, 25, '2016-06-26', 'ewe', 'June', '26'),
(18, 14, 25, '2016-06-26', '33', 'June', '26'),
(19, 14, 25, '2016-06-26', '23', 'June', '26'),
(22, 5, 42, '2016-07-03', '<script>alert("checking 3212")</script>', 'July', '03'),
(23, 5, 43, '2016-07-10', 'o', 'July', '10'),
(24, 2, 39, '2016-07-10', '', 'July', '10'),
(25, 47, 44, '2016-07-11', 'e', 'July', '11'),
(26, 51, 45, '2016-07-20', '', 'July', '20'),
(27, 51, 45, '2016-07-20', '', 'July', '20');

-- --------------------------------------------------------

--
-- Table structure for table `buypostlikes`
--

CREATE TABLE IF NOT EXISTS `buypostlikes` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buypostlikes`
--

INSERT INTO `buypostlikes` (`id`, `userId`, `postId`) VALUES
(2, 5, 1),
(3, 2, 12),
(4, 3, 21),
(5, 2, 22),
(6, 5, 3),
(8, 2, 24),
(9, 2, 2),
(10, 2, 25),
(12, 5, 30),
(13, 14, 34),
(15, 2, 35),
(16, 2, 36),
(17, 2, 39),
(18, 33, 25),
(19, 52, 45);

-- --------------------------------------------------------

--
-- Table structure for table `buyrequest`
--

CREATE TABLE IF NOT EXISTS `buyrequest` (
  `id` int(11) NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `industry` varchar(200) NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  `access` varchar(100) NOT NULL,
  `duration` varchar(300) NOT NULL,
  `anonymous` varchar(300) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyrequest`
--

INSERT INTO `buyrequest` (`id`, `title`, `description`, `industry`, `country`, `access`, `duration`, `anonymous`, `userId`, `date`, `month`, `day`, `status`) VALUES
(45, 'testing home feed....', 'testing home feed....testing home feed....testing home feed....', 'Architectural Services', 'Barbados', 'Public', '8 days', '', 52, '2016-07-13', 'July', '13', 1),
(46, 'checking posts', 'posting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting test for checking postsposting ', 'Building Materials & Equipment', 'Belgium', 'Public', '1 day', '', 56, '2016-07-22', 'July', '22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `title` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`title`) VALUES
('Afghanistan'),
('Albania'),
('Algeria'),
('Andorra'),
('Angola'),
('Antigua and Barbuda'),
('Argentina'),
('Armenia'),
('Aruba'),
('Australia'),
('Austria'),
('Azerbaijan'),
('Bahamas The'),
('Bahrain'),
('Bangladesh'),
('Barbados'),
('Belarus'),
('Belgium'),
('Belize'),
('Benin'),
('Bhutan'),
('Bolivia'),
('Bosnia and Herzegovina'),
('Botswana'),
('Brazil'),
('Brunei'),
('Bulgaria'),
('Burkina Faso'),
('Burma'),
('Burundi'),
('Cambodia'),
('Cameroon'),
('Canada'),
('Cape Verde'),
('Central African Republic'),
('Chad'),
('Chile'),
('China'),
('Colombia'),
('Comoros'),
('Congo Democratic Republic of the'),
('Congo Republic of the'),
('Costa Rica'),
('Cote d''Ivoire'),
('Croatia'),
('Cuba'),
('Curacao'),
('Cyprus'),
('Czech Republic'),
('Denmark'),
('Djibouti'),
('Dominica'),
('Dominican Republic'),
('East Timor'),
('Ecuador'),
('Egypt'),
('El Salvador'),
('Equatorial Guinea'),
('Eritrea'),
('Estonia'),
('Ethiopia'),
('Fiji'),
('Finland'),
('France'),
('Gabon'),
('Gambia The'),
('Georgia'),
('Germany'),
('Ghana'),
('Greece'),
('Grenada'),
('Guatemala'),
('Guinea'),
('Guinea-Bissau'),
('Guyana'),
('Haiti'),
('Holy See'),
('Honduras'),
('Hong Kong'),
('Hungary'),
('Iceland'),
('India'),
('Indonesia'),
('Iran'),
('Iraq'),
('Ireland'),
('Israel'),
('Italy'),
('Jamaica'),
('Japan'),
('Jordan'),
('Kazakhstan'),
('Kenya'),
('Kiribati'),
('Korea North'),
('Korea South'),
('Kosovo'),
('Kuwait'),
('Kyrgyzstan'),
('Laos'),
('Latvia'),
('Lebanon'),
('Lesotho'),
('Liberia'),
('Libya'),
('Liechtenstein'),
('Lithuania'),
('Luxembourg'),
('Macau'),
('Macedonia'),
('Madagascar'),
('Malawi'),
('Malaysia'),
('Maldives'),
('Mali'),
('Malta'),
('Marshall Islands'),
('Mauritania'),
('Mauritius'),
('Mexico'),
('Micronesia'),
('Moldova'),
('Monaco'),
('Mongolia'),
('Montenegro'),
('Morocco'),
('Mozambique'),
('Namibia'),
('Nauru'),
('Nepal'),
('Netherlands'),
('Netherlands Antilles'),
('New Zealand'),
('Nicaragua'),
('Niger'),
('Nigeria'),
('North Korea'),
('Norway'),
('Oman'),
('Pakistan'),
('Palau'),
('Palestinian Territories'),
('Panama'),
('Papua New Guinea'),
('Paraguay'),
('Peru'),
('Philippines'),
('Poland'),
('Portugal'),
('Qatar'),
('Romania'),
('Russia'),
('Rwanda'),
('Saint Kitts and Nevis'),
('Saint Lucia'),
('Saint Vincent and the Grenadines'),
('Samoa'),
('San Marino'),
('Sao Tome and Principe'),
('Saudi Arabia'),
('Senegal'),
('Serbia'),
('Seychelles'),
('Sierra Leone'),
('Singapore'),
('Sint Maarten'),
('Slovakia'),
('Slovenia'),
('Solomon Islands'),
('Somalia'),
('South Africa'),
('South Korea'),
('South Sudan'),
('Spain'),
('Sri Lanka'),
('Sudan'),
('Suriname'),
('Swaziland'),
('Sweden'),
('Switzerland'),
('Syria'),
('Taiwan'),
('Tajikistan'),
('Tanzania'),
('Thailand'),
('Timor-Leste'),
('Togo'),
('Tonga'),
('Trinidad and Tobago'),
('Tunisia'),
('Turkey'),
('Turkmenistan'),
('Tuvalu'),
('Uganda'),
('Ukraine'),
('United Arab Emirates'),
('United Kingdom'),
('Uruguay'),
('Uzbekistan'),
('Vanuatu'),
('Venezuela'),
('Vietnam'),
('Yemen'),
('Zambia'),
('Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `directcontact`
--

CREATE TABLE IF NOT EXISTS `directcontact` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `reciverid` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facebookloginrequest`
--

CREATE TABLE IF NOT EXISTS `facebookloginrequest` (
  `id` int(11) NOT NULL,
  `fbID` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `facebookloginrequest`
--

INSERT INTO `facebookloginrequest` (`id`, `fbID`, `email`, `code`, `status`, `userId`) VALUES
(1, '10153341176867984', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `follower`
--

CREATE TABLE IF NOT EXISTS `follower` (
  `id` int(11) NOT NULL,
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follower`
--

INSERT INTO `follower` (`id`, `userId1`, `userId2`) VALUES
(29, 8, 2),
(37, 10, 2),
(38, 5, 6),
(39, 6, 5),
(40, 4, 5),
(41, 5, 5),
(42, 13, 2),
(43, 5, 4),
(45, 5, 2),
(46, 5, 2),
(48, 47, 2),
(49, 47, 47),
(50, 47, 14),
(51, 6, 2),
(52, 2, 3),
(53, 53, 52);

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(11) NOT NULL,
  `userId1` int(11) NOT NULL,
  `userId2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend`
--

INSERT INTO `friend` (`id`, `userId1`, `userId2`) VALUES
(23, 4, 5),
(25, 6, 5),
(26, 5, 5),
(29, 47, 47);

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE IF NOT EXISTS `friendrequest` (
  `id` int(11) NOT NULL,
  `requestSender` int(11) NOT NULL,
  `requestReceiver` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friendrequest`
--

INSERT INTO `friendrequest` (`id`, `requestSender`, `requestReceiver`) VALUES
(65, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `googlelogin`
--

CREATE TABLE IF NOT EXISTS `googlelogin` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `userId` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `google_users`
--

CREATE TABLE IF NOT EXISTS `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(60) NOT NULL,
  `google_email` varchar(60) NOT NULL,
  `google_link` varchar(60) NOT NULL,
  `google_picture_link` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `historypost`
--

CREATE TABLE IF NOT EXISTS `historypost` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `buyPostId` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `historypost`
--

INSERT INTO `historypost` (`id`, `userId`, `buyPostId`) VALUES
(1, 5, 1),
(3, 4, 1),
(4, 2, 24),
(5, 6, 27),
(6, 2, 28),
(7, 2, 29),
(8, 2, 31),
(9, 13, 25),
(10, 2, 39),
(11, 2, 20),
(12, 2, 40),
(13, 5, 0),
(14, 47, 44);

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE IF NOT EXISTS `industries` (
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `industries`
--

INSERT INTO `industries` (`title`) VALUES
('Accessories'),
('Accountants'),
('Advertising/Public Relations'),
('Aerospace'),
('Agriculture'),
('Air Transport'),
('Airlines'),
('Alcoholic Beverages'),
('Alternative Energy'),
('Architectural Services'),
('Attorneys/Law Firms'),
('Auto Manufacturers'),
('Automotive'),
('Bars & Restaurants'),
('Beer Wine & Liquor'),
('Books Magazines & Newspapers'),
('Builders/General Contractors'),
('Building Materials & Equipment'),
('Chemical & Related Manufacturing'),
('Clothing Manufacturing'),
('Communications/Electronics'),
('Computer Software'),
('Construction'),
('Dairy'),
('Education'),
('Electric Utilities'),
('Electronics Equipment'),
('Energy & Natural Resources'),
('Entertainment'),
('Environment'),
('Farming'),
('Finance Insurance & Real Estate'),
('Food & Beverage'),
('Garbage Collection/Waste Management'),
('Gas & Oil'),
('Hospitals & Nursing Homes'),
('Hotels Motels & Tourism'),
('Law Firms'),
('Lightings'),
('Livestock'),
('Logging Timber & Paper Mills'),
('Machinery & Parts'),
('Marine Transport'),
('Meat processing & products'),
('Medical Supplies'),
('Metallurgy'),
('Mining'),
('Nursing Homes/Hospitals'),
('Nutritional & Dietary Supplements'),
('Oil & Gas'),
('Pharmaceutical'),
('Power Utilities'),
('Printing & Publishing'),
('Private Equity'),
('Real Estate'),
('Retail Sales'),
('Shoes & Bags'),
('Telecom Services'),
('Textiles'),
('Toys & Games'),
('Transportation'),
('Vegetables & Fruits'),
('Waste Management');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likedhistory`
--

CREATE TABLE IF NOT EXISTS `likedhistory` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `tblname` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likedhistory`
--

INSERT INTO `likedhistory` (`id`, `userId`, `postId`, `tblname`) VALUES
(1, 5, 1, 'buyrequest'),
(2, 5, 1, 'buyrequest'),
(3, 6, 8, 'post'),
(4, 6, 8, 'post'),
(5, 3, 3, 'post'),
(6, 3, 2, 'post'),
(7, 2, 12, 'buyrequest'),
(8, 3, 21, 'buyrequest'),
(9, 2, 20, 'post'),
(10, 2, 22, 'buyrequest'),
(11, 5, 3, 'buyrequest'),
(12, 5, 21, 'post'),
(13, 2, 2, 'buyrequest'),
(14, 2, 24, 'buyrequest'),
(15, 2, 2, 'buyrequest'),
(16, 2, 25, 'buyrequest'),
(17, 2, 26, 'post'),
(18, 2, 26, 'post'),
(19, 2, 26, 'post'),
(20, 6, 27, 'buyrequest'),
(21, 5, 30, 'buyrequest'),
(22, 14, 34, 'buyrequest'),
(23, 2, 35, 'buyrequest'),
(24, 2, 35, 'buyrequest'),
(25, 2, 36, 'buyrequest'),
(26, 2, 39, 'buyrequest'),
(28, 2, 53, 'post'),
(29, 2, 52, 'post'),
(30, 2, 51, 'post'),
(31, 2, 23, 'post'),
(32, 2, 7, 'post'),
(33, 52, 45, 'buyrequest');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `lasttime` varchar(200) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attachment` varchar(200) DEFAULT NULL,
  `isRead` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderId`, `receiverId`, `lasttime`, `message`, `attachment`, `isRead`) VALUES
(93, 5, 2, '2016-06-05 04:15:31am', 'testing ', '', 1),
(94, 5, 2, '2016-06-05 04:15:33am', ' 1', '', 1),
(95, 5, 2, '2016-06-05 04:15:37am', ' 234', '', 1),
(96, 5, 2, '2016-06-05 04:15:40am', ' 12', '', 1),
(97, 5, 2, '2016-06-05 04:15:43am', ' 1', '', 1),
(98, 5, 2, '2016-06-05 04:15:46am', ' 2', '', 1),
(99, 5, 2, '2016-06-05 04:15:49am', ' 44', '', 1),
(100, 5, 2, '2016-06-05 04:15:54am', ' 22', '', 1),
(101, 5, 2, '2016-06-05 04:15:57am', ' 3', '', 1),
(102, 5, 2, '2016-06-05 04:15:59am', ' 2', '', 1),
(103, 5, 2, '2016-06-05 04:16:01am', ' 23', '', 1),
(104, 5, 2, '2016-06-05 04:16:08am', ' 2', '', 1),
(105, 5, 2, '2016-06-05 04:16:14am', ' 323', '', 1),
(106, 5, 2, '2016-06-05 04:16:19am', ' 1', '', 1),
(107, 5, 2, '2016-06-05 04:16:21am', ' 45', '', 1),
(108, 5, 2, '2016-06-05 04:16:24am', ' 2', '', 1),
(109, 5, 2, '2016-06-05 04:16:26am', ' 33', '', 1),
(110, 5, 2, '2016-06-05 04:16:28am', ' 22', '', 1),
(111, 5, 2, '2016-06-05 04:16:36am', ' 2', '', 1),
(112, 5, 2, '2016-06-05 04:16:39am', ' 2', '', 1),
(113, 5, 2, '2016-06-05 04:16:50am', '2', '', 1),
(114, 5, 2, '2016-06-05 04:16:53am', ' 2', '', 1),
(115, 5, 2, '2016-06-05 04:16:55am', ' 323', '', 1),
(116, 5, 2, '2016-06-05 04:16:58am', ' 12', '', 1),
(117, 5, 2, '2016-06-05 04:17:01am', ' 1234', '', 1),
(118, 5, 2, '2016-06-05 04:17:04am', ' 12345', '', 1),
(119, 5, 2, '2016-06-05 04:17:08am', ' 123456', '', 1),
(120, 5, 2, '2016-06-05 04:17:10am', ' 1', '', 1),
(121, 5, 2, '2016-06-05 04:17:13am', ' 2', '', 1),
(122, 5, 2, '2016-06-05 04:17:16am', ' 3', '', 1),
(123, 5, 2, '2016-06-05 04:17:19am', ' 4', '', 1),
(124, 5, 2, '2016-06-05 04:17:31am', ' 123', '', 1),
(125, 5, 2, '2016-06-05 04:17:36am', ' 123', '', 1),
(126, 5, 2, '2016-06-05 04:17:40am', ' 43', '', 1),
(127, 5, 2, '2016-06-05 04:17:44am', ' 2', '', 1),
(128, 5, 2, '2016-06-05 04:17:46am', ' ', '', 1),
(129, 5, 2, '2016-06-05 04:17:51am', ' ', '', 1),
(130, 5, 2, '2016-06-05 04:17:53am', ' ', '', 1),
(131, 5, 2, '2016-06-05 04:17:54am', ' ', '', 1),
(132, 5, 2, '2016-06-05 04:17:56am', ' ', '', 1),
(133, 5, 2, '2016-06-05 04:17:57am', ' ', '', 1),
(134, 5, 2, '2016-06-05 04:17:58am', ' ', '', 1),
(135, 5, 2, '2016-06-05 04:17:58am', ' ', '', 1),
(136, 5, 2, '2016-06-05 04:17:59am', ' ', '', 1),
(137, 5, 2, '2016-06-05 04:17:59am', ' ', '', 1),
(138, 5, 2, '2016-06-05 04:18:00am', ' ', '', 1),
(139, 5, 2, '2016-06-05 04:18:00am', ' ', '', 1),
(140, 5, 2, '2016-06-05 04:18:01am', ' ', '', 1),
(141, 5, 2, '2016-06-05 04:18:01am', ' ', '', 1),
(142, 5, 2, '2016-06-05 04:18:01am', ' ', '', 1),
(143, 5, 2, '2016-06-05 04:18:02am', ' ', '', 1),
(144, 5, 2, '2016-06-05 04:18:02am', ' ', '', 1),
(145, 5, 2, '2016-06-05 04:18:04am', ' ', '', 1),
(146, 5, 2, '2016-06-05 04:18:04am', ' ', '', 1),
(147, 5, 2, '2016-06-05 04:18:04am', ' ', '', 1),
(148, 5, 2, '2016-06-05 04:18:05am', ' ', '', 1),
(149, 5, 2, '2016-06-05 04:18:06am', ' ', '', 1),
(150, 5, 2, '2016-06-05 04:18:07am', ' ', '', 1),
(151, 5, 2, '2016-06-05 04:18:07am', ' ', '', 1),
(152, 5, 2, '2016-06-05 04:18:07am', ' ', '', 1),
(153, 5, 2, '2016-06-05 04:18:11am', ' ', '', 1),
(154, 5, 2, '2016-06-05 04:18:12am', ' ', '', 1),
(155, 5, 2, '2016-06-05 04:18:13am', ' ', '', 1),
(156, 5, 2, '2016-06-05 04:18:13am', ' ', '', 1),
(157, 5, 2, '2016-06-05 04:18:14am', ' ', '', 1),
(158, 5, 2, '2016-06-05 04:18:28am', '123', '', 1),
(159, 5, 2, '2016-06-05 04:18:30am', ' 1223', '', 1),
(160, 5, 2, '2016-06-05 04:18:33am', ' 123', '', 1),
(161, 5, 2, '2016-06-05 04:18:35am', ' 123', '', 1),
(162, 5, 2, '2016-06-05 04:18:37am', ' ', '', 1),
(163, 5, 2, '2016-06-05 04:18:39am', ' ', '', 1),
(164, 5, 2, '2016-06-05 04:18:40am', ' ', '', 1),
(165, 5, 2, '2016-06-05 04:18:41am', ' ', '', 1),
(166, 5, 2, '2016-06-05 04:18:43am', ' ', '', 1),
(167, 5, 2, '2016-06-05 04:18:45am', ' ', '', 1),
(168, 5, 2, '2016-06-05 04:18:48am', ' ', '', 1),
(169, 5, 2, '2016-06-05 04:18:51am', ' ', '', 1),
(170, 5, 2, '2016-06-05 04:18:54am', ' ', '', 1),
(171, 5, 2, '2016-06-05 04:18:55am', ' ', '', 1),
(172, 5, 2, '2016-06-05 04:18:57am', ' ', '', 1),
(173, 5, 2, '2016-06-05 04:18:59am', ' ', '', 1),
(174, 5, 2, '2016-06-05 04:19:01am', ' ', '', 1),
(175, 5, 2, '2016-06-05 04:19:02am', ' ', '', 1),
(176, 5, 2, '2016-06-05 04:19:03am', ' ', '', 1),
(177, 5, 2, '2016-06-05 04:19:05am', ' ', '', 1),
(178, 5, 2, '2016-06-05 04:19:07am', ' ', '', 1),
(179, 5, 2, '2016-06-05 04:19:08am', ' ', '', 1),
(180, 5, 2, '2016-06-05 04:19:11am', ' ', '', 1),
(181, 5, 2, '2016-06-05 04:19:12am', ' ', '', 1),
(182, 5, 2, '2016-06-05 04:19:13am', ' ', '', 1),
(183, 5, 2, '2016-06-05 04:19:16am', ' ', '', 1),
(184, 5, 2, '2016-06-05 04:19:18am', ' ', '', 1),
(185, 5, 2, '2016-06-05 04:19:19am', ' ', '', 1),
(186, 5, 2, '2016-06-05 04:19:21am', ' ', '', 1),
(187, 5, 2, '2016-06-05 04:19:23am', ' ', '', 1),
(188, 5, 2, '2016-06-05 04:19:24am', ' ', '', 1),
(189, 5, 2, '2016-06-05 04:19:26am', ' ', '', 1),
(190, 5, 2, '2016-06-05 04:19:27am', ' ', '', 1),
(191, 5, 2, '2016-06-05 04:19:32am', ' ', '', 1),
(192, 5, 2, '2016-06-05 04:19:32am', ' ', '', 1),
(193, 5, 2, '2016-06-05 04:19:37am', ' ', '', 1),
(194, 5, 2, '2016-06-05 04:19:38am', ' ', '', 1),
(195, 5, 2, '2016-06-05 04:19:38am', ' ', '', 1),
(196, 5, 2, '2016-06-05 04:19:39am', ' ', '', 1),
(197, 5, 2, '2016-06-05 04:19:39am', ' ', '', 1),
(198, 5, 2, '2016-06-05 04:19:42am', ' ', '', 1),
(199, 5, 2, '2016-06-05 04:19:43am', ' ', '', 1),
(200, 5, 2, '2016-06-05 04:19:45am', ' ', '', 1),
(201, 5, 2, '2016-06-05 04:19:48am', ' ', '', 1),
(202, 2, 5, '2016-06-05 05:18:43pm', 'e', '', 1),
(206, 5, 2, '2016-06-28 11:07:58pm', 'ooo', '', 1),
(207, 2, 5, '2016-07-03 10:43:28am', '<script>alert(''hello'')</script>', '', 1),
(208, 47, 2, '2016-07-11 07:10:54pm', 'ivan do you receive email', '', 1),
(209, 32, 2, '2016-07-11 07:17:06pm', 'ddo you ge message', '', 1),
(210, 6, 2, '2016-07-12 05:41:43pm', 'eeecheck', '', 1),
(211, 32, 2, '2016-07-12 06:15:18pm', 'tes', '', 1),
(212, 49, 2, '2016-07-12 06:17:48pm', 'test', '', 1),
(213, 50, 2, '2016-07-12 06:20:31pm', 'eek', '', 1),
(214, 53, 52, '2016-07-13 06:22:39am', 'test', '', 0),
(215, 51, 52, '2016-07-20 11:05:02am', 's', '', 0),
(216, 51, 52, '2016-07-20 11:05:07am', ' a', '', 0),
(217, 51, 52, '2016-07-20 11:05:11am', ' qqq', '', 0),
(218, 51, 52, '2016-07-20 11:05:14am', ' weq', '', 0),
(219, 51, 52, '2016-07-20 11:05:18am', ' qq', '', 0),
(220, 51, 52, '2016-07-20 11:05:20am', ' qq', '', 0),
(221, 51, 52, '2016-07-20 11:05:22am', ' we', '', 0),
(222, 51, 52, '2016-07-20 11:05:25am', ' er', '', 0),
(223, 51, 52, '2016-07-20 11:05:29am', ' ee', '', 0),
(224, 51, 52, '2016-07-20 11:05:49am', ' re', '', 0),
(225, 51, 52, '2016-07-20 11:05:52am', ' qw', '', 0),
(226, 51, 52, '2016-07-20 11:05:57am', ' qw', '', 0),
(227, 51, 52, '2016-07-20 11:05:59am', ' dwq', '', 0),
(228, 51, 52, '2016-07-20 11:06:15am', ' qw', '', 0),
(229, 51, 52, '2016-07-20 11:06:20am', ' qw', '', 0),
(230, 51, 52, '2016-07-20 11:06:25am', ' 11', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `notificationReceiver` int(11) NOT NULL,
  `notificationSender` int(11) NOT NULL,
  `notificationType` varchar(200) DEFAULT NULL,
  `ntime` varchar(255) NOT NULL,
  `seen` varchar(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `notificationReceiver`, `notificationSender`, `notificationType`, `ntime`, `seen`) VALUES
(115, 9, 9, NULL, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL,
  `msg_remaining` varchar(255) NOT NULL,
  `today_remain_msg` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `userid`, `package`, `date`, `balance`, `msg_remaining`, `today_remain_msg`) VALUES
(1, 2, 'Basic', '2016-06-05', '$2', '1', '1'),
(2, 2, 'Premium', '2016-06-05', '$25', '4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgUrl` longtext NOT NULL,
  `access` varchar(100) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `userId`, `date`, `content`, `imgUrl`, `access`, `month`, `day`, `status`) VALUES
(65, 53, '2016-07-13', 'checking update. kumoda', '', 'Friends', 'July', '13', 1),
(66, 51, '2016-07-22', 'testig posts', '', 'Public', 'July', '22', 1),
(67, 51, '2016-07-22', 'deleting check', '', 'Public', 'July', '22', 1),
(68, 51, '2016-07-22', 'testing public posts\r\n', '', 'Public', 'July', '22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE IF NOT EXISTS `postcomment` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `content` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `postId` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`id`, `userId`, `date`, `content`, `postId`, `month`, `day`) VALUES
(1, 13, '2016-06-25', 'qw', 33, 'June', '25'),
(2, 13, '2016-06-25', 'wq', 33, 'June', '25'),
(3, 13, '2016-06-25', 's', 45, 'June', '25'),
(4, 2, '2016-06-29', 'q', 18, 'June', '29'),
(5, 4, '2016-07-10', 'hi tesing comment ', 63, 'July', '10'),
(6, 2, '2016-07-10', 'ee', 63, 'July', '10');

-- --------------------------------------------------------

--
-- Table structure for table `postlikes`
--

CREATE TABLE IF NOT EXISTS `postlikes` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postlikes`
--

INSERT INTO `postlikes` (`id`, `userId`, `postId`) VALUES
(2, 6, 8),
(3, 3, 3),
(4, 3, 2),
(5, 2, 20),
(6, 5, 21),
(7, 2, 26),
(8, 2, 26),
(9, 2, 26),
(10, 2, 53),
(11, 2, 52),
(12, 2, 51),
(13, 2, 23),
(14, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `access` varchar(100) NOT NULL,
  `imageUrl` longtext NOT NULL,
  `date` varchar(200) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `access`, `imageUrl`, `date`, `userId`) VALUES
(5, '', '', 'Friends', 'helmodify.jpg', '2016-06-21', 5),
(12, '', '', 'Public', '', '2016-06-26', 39),
(13, '', '', 'Public', '', '2016-06-26', 39),
(14, '', '', 'Public', '', '2016-06-26', 39),
(15, '', '', 'Public', '', '2016-06-26', 39),
(16, 'the best helmet on the market', '<p><span style="font-size:14px"><strong>the best helmet on the market</strong></span></p>\n', 'Public', '9.jpg', '2016-07-22', 51);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `company` varchar(200) DEFAULT NULL,
  `position` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `businessType` varchar(500) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `industry` varchar(500) DEFAULT NULL,
  `description` varchar(500) NOT NULL,
  `contact` varchar(200) DEFAULT NULL,
  `access` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userId`, `company`, `position`, `country`, `state`, `city`, `businessType`, `product`, `industry`, `description`, `contact`, `access`) VALUES
(1, 3, '', '', 'Pakistan', '', '', 'Broker, Supplier', '', 'Accessories', '', '', 'Public'),
(2, 5, 'name', '', 'Albania', '', '', '', '', '', '', '', 'Public'),
(3, 2, ' pwc', '', '', ' ', ' taichung', ' ', '', '', 'hello owen', '', 'Public'),
(4, 47, 'ICY Corperation', 'Boss', 'Egypt', 'ee', 'Carol', 'Manufacturer, Broker, Supplier, Carrier', 'food', 'Agriculture', 'this is the description for icy corperation. this is my this is the description for icy corperation. this is my this is the description for icy corperation. this is my this is the description for icy corperation. this is my this is the description for icy corperation. this is my ', 'no info', 'Public'),
(5, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(6, 49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(7, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(8, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(9, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(10, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(11, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(12, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(13, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(14, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(15, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(16, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(17, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(18, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(19, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(20, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(21, 63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(22, 64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(23, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(24, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(25, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(26, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(27, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(28, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(29, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(30, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, ''),
(31, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `searchhistory`
--

CREATE TABLE IF NOT EXISTS `searchhistory` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `lookingFor` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `industry` varchar(200) DEFAULT NULL,
  `keyword` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `blockedusers` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `opentoSearch` int(11) NOT NULL DEFAULT '1',
  `opentoComment` int(11) NOT NULL DEFAULT '1',
  `emailtoFriend` int(11) NOT NULL DEFAULT '0',
  `emailtoMessage` int(11) NOT NULL DEFAULT '0',
  `openFnF` varchar(255) NOT NULL DEFAULT 'Public',
  `openBuypost` varchar(255) NOT NULL DEFAULT 'Public'
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `userId`, `blockedusers`, `opentoSearch`, `opentoComment`, `emailtoFriend`, `emailtoMessage`, `openFnF`, `openBuypost`) VALUES
(1, 0, ' ', 1, 1, 1, 1, '1', '1'),
(2, 0, ' ', 1, 1, 1, 1, '1', '1'),
(3, 4, ' ', 0, 1, 1, 1, '', ''),
(4, 5, ' ', 1, 1, 1, 1, '1', '1'),
(5, 2, '', 1, 0, 1, 1, '', ''),
(6, 6, 'ivn.c.yu@gmail.com, ', 1, 1, 1, 1, '', ''),
(7, 7, ' ', 1, 1, 1, 1, '1', '1'),
(8, 8, ' ', 1, 1, 1, 1, '', ''),
(9, 9, ' ', 1, 1, 1, 1, '1', '1'),
(10, 10, ' ', 1, 1, 1, 1, '', ''),
(11, 11, ' ', 1, 1, 1, 1, '1', '1'),
(12, 12, ' ', 1, 1, 1, 1, '1', '1'),
(13, 13, '', 1, 1, 1, 1, '', ''),
(14, 14, ' ', 1, 1, 1, 1, '1', '1'),
(15, 15, ' ', 1, 1, 1, 1, '1', '1'),
(16, 16, ' ', 1, 1, 1, 1, '1', '1'),
(17, 17, ' ', 1, 1, 1, 1, '1', '1'),
(18, 18, ' ', 1, 1, 1, 1, '1', '1'),
(19, 19, ' ', 1, 1, 1, 1, '1', '1'),
(20, 20, ' ', 1, 1, 1, 1, '1', '1'),
(21, 21, ' ', 1, 1, 1, 1, '1', '1'),
(22, 22, ' ', 1, 1, 1, 1, '1', '1'),
(23, 23, ' ', 1, 1, 1, 1, '1', '1'),
(24, 24, ' ', 1, 1, 1, 1, '1', '1'),
(25, 25, ' ', 1, 1, 1, 1, '1', '1'),
(26, 26, ' ', 1, 1, 1, 1, '1', '1'),
(27, 27, ' ', 1, 1, 1, 1, '1', '1'),
(28, 28, ' ', 1, 1, 1, 1, '1', '1'),
(29, 29, ' ', 1, 1, 1, 1, '1', '1'),
(30, 30, ' ', 1, 1, 1, 1, '1', '1'),
(31, 31, ' ', 1, 1, 1, 1, '1', '1'),
(32, 32, ' ', 1, 1, 1, 1, '1', '1'),
(33, 33, ' ', 1, 1, 1, 1, '1', '1'),
(34, 34, ' ', 1, 1, 1, 1, '1', '1'),
(35, 35, ' ', 1, 1, 1, 1, '1', '1'),
(36, 36, ' ', 1, 1, 1, 1, '1', '1'),
(37, 37, ' ', 1, 1, 1, 1, '1', '1'),
(38, 38, ' ', 1, 1, 1, 1, '1', '1'),
(39, 39, ' ', 1, 1, 1, 1, '1', '1'),
(40, 40, ' ', 1, 1, 1, 1, '1', '1'),
(41, 41, ' ', 1, 1, 1, 1, '1', '1'),
(42, 42, ' ', 1, 1, 1, 1, '1', '1'),
(43, 43, ' ', 1, 1, 1, 1, '1', '1'),
(44, 44, ' ', 1, 1, 1, 1, '1', '1'),
(45, 45, ' ', 1, 1, 1, 1, '1', '1'),
(46, 46, ' ', 1, 1, 1, 1, '1', '1'),
(47, 47, ' ', 0, 0, 0, 0, '', ''),
(48, 48, ' ', 1, 1, 1, 1, '1', '1'),
(49, 49, ' ', 1, 1, 1, 1, '1', '1'),
(50, 50, ' ', 1, 1, 1, 1, '1', '1'),
(51, 51, ' ', 1, 1, 1, 1, '1', '1'),
(52, 52, ' ', 1, 1, 1, 1, '1', '1'),
(53, 53, ' ', 1, 1, 1, 1, '1', '1'),
(54, 54, ' ', 1, 1, 1, 1, '1', '1'),
(55, 55, ' ', 1, 1, 1, 1, '1', '1'),
(56, 56, ' ', 0, 0, 0, 0, '', ''),
(57, 0, ' ', 1, 1, 1, 1, '1', '1'),
(58, 0, ' ', 1, 1, 1, 1, '1', '1'),
(59, 0, ' ', 1, 1, 1, 1, '1', '1'),
(60, 0, ' ', 1, 1, 1, 1, '1', '1'),
(61, 0, ' ', 1, 1, 1, 1, '1', '1'),
(62, 0, ' ', 1, 1, 1, 1, '1', '1'),
(63, 0, ' ', 1, 1, 1, 1, '1', '1'),
(64, 63, ' ', 1, 1, 1, 1, '1', '1'),
(65, 64, ' ', 1, 1, 1, 1, '1', '1'),
(66, 65, ' ', 1, 1, 1, 1, '1', '1'),
(67, 66, ' ', 1, 1, 1, 1, '1', '1'),
(68, 67, ' ', 1, 1, 1, 1, '1', '1'),
(69, 68, ' ', 1, 1, 1, 1, '1', '1'),
(70, 69, ' ', 1, 1, 1, 1, '1', '1'),
(71, 70, ' ', 1, 1, 1, 1, '1', '1'),
(72, 71, ' ', 1, 1, 1, 1, '1', '1'),
(73, 72, ' ', 1, 1, 1, 1, '1', '1'),
(74, 73, ' ', 1, 1, 1, 1, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `loginType` varchar(50) NOT NULL DEFAULT 'default',
  `ImageUrl` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL DEFAULT '',
  `date` varchar(10) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `birthdate` varchar(255) NOT NULL,
  `lastping` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userId`, `firstname`, `lastname`, `email`, `password`, `status`, `loginType`, `ImageUrl`, `username`, `date`, `month`, `year`, `birthdate`, `lastping`) VALUES
(51, '', 'ivan', 'C', 'ivn.c.yu@gmail..com', '950d9f23fd53ddf6241840ae488703ba', 1, 'default', '', 'ivanivan', '2016-07-13', 'July', '2016', '', '2016-07-26 10:07:55'),
(52, '', 'ivan', 'C', 'ivn.c.yu@gmail.com', 'f69981bb1a47bc181b726a406de0d533', 1, 'default', '', 'ivanivan1', '2016-07-13', 'July', '2016', '', '2016-07-13 07:07:17'),
(53, '', 'kumo', 'dada', 'kumodada@gmail.com', 'ae661a5f4bb0dd53b49c2e6db7d5f422', 1, 'default', '', 'kumodada', '2016-07-13', 'July', '2016', '', '2016-07-13 06:07:44'),
(54, '', 'nirushan', 'krishnan', 'nirushan.11@cse.mrt.ac.lk', '60e13700807d23618b8d05677ae1a028', 1, 'default', '', 'nirushan', '2016-07-13', 'July', '2016', '', '2016-07-13 16:07:07'),
(55, '', 'jordan', 'jordan', 'fariche25@yahoo.com', 'ac7c9355399c82cdc0c41dc70603da7e', 1, 'default', '', 'fariche25', '2016-07-16', 'July', '2016', '', '2016-07-16 20:07:53'),
(56, '', 'check', 'king', 'check@ckeck.com', 'ce5fb8df125a4721d1df328bc6f2ddea', 1, 'default', '', 'checking', '2016-07-22', 'July', '2016', '', '2016-07-22 05:07:58'),
(57, '', '8888888888', '88888888', 'fjsajfsa@gmaiddssdsd.com', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(58, '', '8888888888', '88888888', 'fjsajfsa@gmaidddsd.com', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(59, '', '8888888888', '88888888', 'fjsajfsa@sds.com', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(60, '', '8888888888', '88888888', 'fjsajfsa@sds.comt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(61, '', '8888888888', '88888888', 'fjsajfssdsda@sds.comt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(62, '', '8888888888', '88888888', 'fjsajfssdsda@sds.cdomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(63, '', '8888888888', '88888888', 'fjsajfssdsssda@sds.cdomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(64, '', '8888888888', '88888888', 'fjsajfssdsssasasda@sds.cdomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(65, '', '8888888888', '88888888', 'fjsajfssdsssasasasassda@sds.cdomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(66, '', '8888888888', '88888888', 'dsdsdd@sds.cdomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(67, '', '8888888888', '88888888', 'dsdsdd@sds.omt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(68, '', '8888888888', '88888888', 'dsdsdsdsdd@sds.omt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(69, '', '8888888888', '88888888', 'dsdsdsdsdssdd@sds.omt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(70, '', '8888888888', '88888888', 'dsdsdssdd@sds.omt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(71, '', '8888888888', '88888888', 'dsdsdssdd@sads.omt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(72, '', '8888888888', '88888888', 'dsdsdssdd@sads.weomt', '4bfa5111887c94e2adaf74fa462f7aa5', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL),
(73, '', '8888888888', '88888888', 'hhh@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 1, 'default', '', '2016', '8888888', '2016-08-08', 'August', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userannouncement`
--

CREATE TABLE IF NOT EXISTS `userannouncement` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `announcementId` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userannouncement`
--

INSERT INTO `userannouncement` (`id`, `userId`, `announcementId`, `status`) VALUES
(17, 1, 4, 1),
(18, 2, 4, 0),
(19, 3, 4, 1),
(20, 4, 4, 0),
(21, 5, 4, 0),
(22, 6, 4, 0),
(23, 7, 4, 1),
(24, 8, 4, 1),
(25, 9, 4, 1),
(26, 10, 4, 1),
(27, 11, 4, 1),
(28, 12, 4, 1),
(29, 13, 4, 1),
(30, 14, 4, 1),
(31, 15, 4, 1),
(32, 16, 4, 1),
(33, 17, 4, 1),
(34, 18, 4, 1),
(35, 19, 4, 1),
(36, 20, 4, 1),
(37, 21, 4, 1),
(38, 22, 4, 1),
(39, 23, 4, 1),
(40, 24, 4, 1),
(41, 25, 4, 1),
(42, 26, 4, 1),
(43, 27, 4, 1),
(44, 28, 4, 1),
(45, 29, 4, 1),
(46, 30, 4, 1),
(47, 31, 4, 1),
(48, 32, 4, 0),
(49, 33, 4, 0),
(50, 34, 4, 1),
(51, 35, 4, 1),
(52, 36, 4, 1),
(53, 37, 4, 1),
(54, 38, 4, 1),
(55, 39, 4, 0),
(56, 40, 4, 1),
(57, 41, 4, 1),
(58, 42, 4, 1),
(59, 43, 4, 0),
(60, 1, 5, 1),
(61, 2, 5, 0),
(62, 3, 5, 1),
(63, 4, 5, 0),
(64, 5, 5, 0),
(65, 6, 5, 0),
(66, 7, 5, 1),
(67, 8, 5, 1),
(68, 9, 5, 1),
(69, 10, 5, 1),
(70, 11, 5, 1),
(71, 12, 5, 1),
(72, 13, 5, 1),
(73, 14, 5, 1),
(74, 15, 5, 1),
(75, 16, 5, 1),
(76, 17, 5, 1),
(77, 18, 5, 1),
(78, 19, 5, 1),
(79, 20, 5, 1),
(80, 21, 5, 1),
(81, 22, 5, 1),
(82, 23, 5, 1),
(83, 24, 5, 1),
(84, 25, 5, 1),
(85, 26, 5, 1),
(86, 27, 5, 1),
(87, 28, 5, 1),
(88, 29, 5, 1),
(89, 30, 5, 1),
(90, 31, 5, 1),
(91, 32, 5, 0),
(92, 33, 5, 0),
(93, 34, 5, 1),
(94, 35, 5, 1),
(95, 36, 5, 1),
(96, 37, 5, 1),
(97, 38, 5, 1),
(98, 39, 5, 0),
(99, 40, 5, 1),
(100, 41, 5, 1),
(101, 42, 5, 1),
(102, 43, 5, 1),
(103, 1, 6, 1),
(104, 2, 6, 0),
(105, 3, 6, 1),
(106, 4, 6, 0),
(107, 5, 6, 0),
(108, 6, 6, 0),
(109, 7, 6, 1),
(110, 8, 6, 1),
(111, 9, 6, 1),
(112, 10, 6, 1),
(113, 11, 6, 1),
(114, 12, 6, 1),
(115, 13, 6, 1),
(116, 14, 6, 1),
(117, 15, 6, 1),
(118, 16, 6, 1),
(119, 17, 6, 1),
(120, 18, 6, 1),
(121, 19, 6, 1),
(122, 20, 6, 1),
(123, 21, 6, 1),
(124, 22, 6, 1),
(125, 23, 6, 1),
(126, 24, 6, 1),
(127, 25, 6, 1),
(128, 26, 6, 1),
(129, 27, 6, 1),
(130, 28, 6, 1),
(131, 29, 6, 1),
(132, 30, 6, 1),
(133, 31, 6, 1),
(134, 32, 6, 0),
(135, 33, 6, 0),
(136, 34, 6, 1),
(137, 35, 6, 1),
(138, 36, 6, 1),
(139, 37, 6, 1),
(140, 38, 6, 1),
(141, 39, 6, 0),
(142, 40, 6, 1),
(143, 41, 6, 1),
(144, 42, 6, 1),
(145, 43, 6, 1),
(146, 1, 7, 1),
(147, 2, 7, 0),
(148, 3, 7, 1),
(149, 4, 7, 1),
(150, 5, 7, 1),
(151, 6, 7, 1),
(152, 7, 7, 1),
(153, 8, 7, 1),
(154, 9, 7, 1),
(155, 10, 7, 1),
(156, 11, 7, 1),
(157, 12, 7, 1),
(158, 13, 7, 1),
(159, 14, 7, 1),
(160, 15, 7, 1),
(161, 16, 7, 1),
(162, 17, 7, 1),
(163, 18, 7, 1),
(164, 19, 7, 1),
(165, 20, 7, 1),
(166, 21, 7, 1),
(167, 22, 7, 1),
(168, 23, 7, 1),
(169, 24, 7, 1),
(170, 25, 7, 1),
(171, 26, 7, 1),
(172, 27, 7, 1),
(173, 28, 7, 1),
(174, 29, 7, 1),
(175, 30, 7, 1),
(176, 31, 7, 1),
(177, 32, 7, 1),
(178, 33, 7, 1),
(179, 34, 7, 1),
(180, 35, 7, 1),
(181, 36, 7, 1),
(182, 37, 7, 1),
(183, 38, 7, 1),
(184, 39, 7, 1),
(185, 40, 7, 1),
(186, 41, 7, 1),
(187, 42, 7, 1),
(188, 43, 7, 1),
(189, 1, 8, 1),
(190, 2, 8, 0),
(191, 3, 8, 1),
(192, 4, 8, 0),
(193, 5, 8, 0),
(194, 6, 8, 0),
(195, 7, 8, 1),
(196, 8, 8, 1),
(197, 9, 8, 1),
(198, 10, 8, 1),
(199, 11, 8, 1),
(200, 12, 8, 1),
(201, 13, 8, 1),
(202, 14, 8, 1),
(203, 15, 8, 1),
(204, 16, 8, 1),
(205, 17, 8, 1),
(206, 18, 8, 1),
(207, 19, 8, 1),
(208, 20, 8, 1),
(209, 21, 8, 1),
(210, 22, 8, 1),
(211, 23, 8, 1),
(212, 24, 8, 1),
(213, 25, 8, 1),
(214, 26, 8, 1),
(215, 27, 8, 1),
(216, 28, 8, 1),
(217, 29, 8, 1),
(218, 30, 8, 1),
(219, 31, 8, 1),
(220, 32, 8, 0),
(221, 33, 8, 0),
(222, 34, 8, 1),
(223, 35, 8, 1),
(224, 36, 8, 1),
(225, 37, 8, 1),
(226, 38, 8, 1),
(227, 39, 8, 0),
(228, 40, 8, 1),
(229, 41, 8, 1),
(230, 42, 8, 1),
(231, 43, 8, 1),
(232, 44, 4, 0),
(233, 44, 5, 0),
(234, 44, 6, 0),
(235, 44, 8, 0),
(236, 45, 4, 0),
(237, 45, 5, 0),
(238, 45, 6, 0),
(239, 45, 8, 0),
(240, 46, 4, 1),
(241, 46, 5, 1),
(242, 46, 6, 1),
(243, 46, 8, 1),
(244, 47, 4, 0),
(245, 47, 5, 0),
(246, 47, 6, 0),
(247, 47, 8, 0),
(248, 48, 4, 1),
(249, 48, 5, 1),
(250, 48, 6, 1),
(251, 48, 8, 1),
(252, 49, 4, 0),
(253, 49, 5, 0),
(254, 49, 6, 0),
(255, 49, 8, 0),
(256, 50, 4, 0),
(257, 50, 5, 0),
(258, 50, 6, 0),
(259, 50, 8, 0),
(260, 68, 9, 1),
(261, 72, 9, 1),
(262, 73, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buypostcomment`
--
ALTER TABLE `buypostcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buypostlikes`
--
ALTER TABLE `buypostlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyrequest`
--
ALTER TABLE `buyrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `directcontact`
--
ALTER TABLE `directcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facebookloginrequest`
--
ALTER TABLE `facebookloginrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friendrequest`
--
ALTER TABLE `friendrequest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `googlelogin`
--
ALTER TABLE `googlelogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `google_users`
--
ALTER TABLE `google_users`
  ADD PRIMARY KEY (`google_id`);

--
-- Indexes for table `historypost`
--
ALTER TABLE `historypost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `likedhistory`
--
ALTER TABLE `likedhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postcomment`
--
ALTER TABLE `postcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postlikes`
--
ALTER TABLE `postlikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searchhistory`
--
ALTER TABLE `searchhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userannouncement`
--
ALTER TABLE `userannouncement`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buypostcomment`
--
ALTER TABLE `buypostcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `buypostlikes`
--
ALTER TABLE `buypostlikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `buyrequest`
--
ALTER TABLE `buyrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `directcontact`
--
ALTER TABLE `directcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facebookloginrequest`
--
ALTER TABLE `facebookloginrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `follower`
--
ALTER TABLE `follower`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `friendrequest`
--
ALTER TABLE `friendrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `googlelogin`
--
ALTER TABLE `googlelogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `historypost`
--
ALTER TABLE `historypost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likedhistory`
--
ALTER TABLE `likedhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `postcomment`
--
ALTER TABLE `postcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `postlikes`
--
ALTER TABLE `postlikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `searchhistory`
--
ALTER TABLE `searchhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `userannouncement`
--
ALTER TABLE `userannouncement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=263;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
