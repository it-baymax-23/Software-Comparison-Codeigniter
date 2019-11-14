-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 02:01 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `feature` text NOT NULL,
  `category_type` text NOT NULL,
  `rootcategoryid` int(11) NOT NULL,
  `popular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `feature`, `category_type`, `rootcategoryid`, `popular`) VALUES
(6, 'Accounting Software', 'This is For Accounting Software', '', 'main', 0, 0),
(7, 'Business Intelligence Tools', 'This is For Business Intelligence Tools', '', 'main', 0, 0),
(8, 'Business Phone System', 'This is For Business Phone System', '', 'main', 0, 0),
(9, 'Call Center Software', 'This is For Call Center Software', '', 'main', 0, 0),
(10, 'CMMS Software', 'This is For CMMS Software', '', 'main', 0, 0),
(11, 'Construction Software', 'This is For Construction Software', '', 'main', 0, 0),
(12, 'Content Management Software', 'This is For Construction Software', '', 'main', 0, 0),
(13, 'CPQ Software', 'This is For CPQ', '', 'main', 0, 0),
(14, 'CRM Software', 'This is For CRM', '', 'main', 0, 0),
(15, 'DENTAL Software', 'This is For DENTAL Software', '', 'main', 0, 0),
(16, 'Distribution Software', 'This is For Distribution Software', '', 'main', 0, 0),
(17, 'ERP Software', 'This is For ERP Software', '', 'main', 0, 0),
(18, 'Facility Management Software', 'This is For Facility Management Software', '', 'main', 0, 0),
(19, 'Field Service Sofware', 'This is For Field Service Sofware', '', 'main', 0, 0),
(20, 'Fleet Management Software', 'This is For Fleet Management Software', '', 'main', 0, 0),
(21, 'Help Desk Software', 'This is For Help Desk Software', '', 'main', 0, 0),
(22, 'Home Health Software', 'This is For Home Health Software', '', 'main', 0, 0),
(23, 'Hotel Management Software', 'Hotel Management Software', '', 'main', 0, 0),
(24, 'Human Resources Software', 'Human Resources Software', '', 'main', 0, 0),
(25, 'Insurance Software', 'Insurance Software', '', 'main', 0, 0),
(26, 'Inventory Management Software', 'Inventory Management Software', '', 'main', 0, 0),
(27, 'Learning Management Systems', 'Learning Management Systems', '', 'main', 0, 0),
(28, 'Legal Software', 'Legal Software', '', 'main', 0, 0),
(29, 'Manufacturing Software', 'Manufacturing Software', '', 'main', 0, 0),
(30, 'Marketing Software', 'Marketing Software', '', 'main', 0, 0),
(31, 'Medical Software', 'Medical Software', '', 'main', 0, 0),
(32, 'Mental Health Software', 'Mental Health Software', '', 'main', 0, 0),
(33, 'Nonprofit Software', 'Nonprofit Software', '', 'main', 0, 0),
(34, 'Accounting Software for Consultants', '6', 'a:6:{i:0;s:2:\"17\";i:1;s:2:\"10\";i:2;s:2:\"22\";i:3;s:2:\"18\";i:4;s:2:\"30\";i:5;s:2:\"29\";}', 'sub', 6, 1),
(35, 'Accounts Payable Software', ' Accounts Payable Software', 'a:6:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"7\";i:3;s:1:\"8\";i:4;s:2:\"11\";i:5;s:2:\"18\";}', 'sub', 6, 1),
(36, 'Accounts Receivable Software', 'Accounts Receivable Software', 'a:6:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"7\";i:3;s:1:\"8\";i:4;s:2:\"11\";i:5;s:2:\"18\";}', 'sub', 7, 1),
(37, ' Architecture Accounting Software', '\nArchitecture Accounting Software', 'a:6:{i:0;s:1:\"4\";i:1;s:1:\"5\";i:2;s:1:\"7\";i:3;s:1:\"8\";i:4;s:2:\"11\";i:5;s:2:\"18\";}', 'sub', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feature`
--

CREATE TABLE `feature` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `name`, `type`, `description`) VALUES
(1, 'API', 'checkbox', ' You can use this api for data api'),
(2, 'Access Control', 'checkbox', ' You can use this feature to control the access'),
(3, 'Activity Dashboard', 'checkbox', ' You can use this feature for activity dashboard'),
(4, 'Activity Tracking', 'checkbox', ' You can use this feature for activity tracking'),
(5, 'Application Integration', 'checkbox', ' You can use this feature for application integration'),
(6, 'Assignment Management', 'checkbox', ' You can use this feature for Assignment Management'),
(7, 'Authentication', 'checkbox', ' You can use this feature for Authentication'),
(8, 'Auto-Responders', 'checkbox', ' You can use this feature for Auto-Responders'),
(9, 'Automatic Notification', 'checkbox', ' You can use this feature for Automatic Notification'),
(10, 'CRM Integration', 'checkbox', ' You can use this feature for CRM Integration'),
(11, 'Chat', 'checkbox', ' You can use this feature for Chat'),
(12, 'Chat Transcript', 'checkbox', ' You can use this feature for Chat Transcript'),
(13, 'Collaboration Tools', 'checkbox', ' You can use this feature for Collaboration Tools'),
(14, 'Collaboration WorkSpace', 'checkbox', ' You can use this feature for Collaboration WorkSpace'),
(15, 'Commenting', 'checkbox', ' You can use this feature for Commenting'),
(16, 'Configration WorkFlow', 'checkbox', ' You can use this feature for Configration WorkFlow'),
(17, 'Contact History', 'checkbox', ' You can use this feature for Contact History'),
(18, 'Custom Fields', 'checkbox', ' You can use this feature for Custom Fields'),
(19, 'Custom Forms', 'checkbox', ' You can use this feature for Custom Forms'),
(20, 'Custom User Interface', 'checkbox', ' You can use this feature for Custom User Interface'),
(21, 'Custom Activity Reporting', 'checkbox', ' You can use this feature for Custom Activity Reporting'),
(22, 'Custom Analysis', 'checkbox', ' You can use this feature for Custom Analysis'),
(23, 'Customer Database', 'checkbox', ' You can use this feature for Customer Database'),
(24, 'Customer Experiece Management', 'checkbox', ' You can use this feature for Customer Experiece Management'),
(25, 'Customer History', 'checkbox', ' You can use this feature for Customer History'),
(26, 'Customer Service Analytics', 'checkbox', ' You can use this feature for Customer Service Analytics'),
(27, 'Customer Support Tracking', 'checkbox', ' You can use this feature for Customer Support Tracking'),
(28, 'Customizable Branding', 'checkbox', ' You can use this feature for Customizable Branding'),
(29, 'Data Import/Export', 'checkbox', ' Data Import/Export'),
(30, 'Email Archieving', 'checkbox', 'You can use this feature for Email Archieving'),
(31, 'Email Integration', 'checkbox', 'You can use this feature for Email Integration'),
(32, 'Email Notification', 'checkbox', 'You can use this feature for Email Notification'),
(33, 'Email Templates', 'checkbox', 'You can use this feature for Email Templates'),
(34, 'Email Tracking', 'checkbox', 'You can use this feature for Email Tracking'),
(35, 'Escalation Management', 'checkbox', 'You can use this feature for Escalation Management'),
(36, 'Event Triggered Action', 'checkbox', 'You can use this feature for Event Triggered Action'),
(37, 'Feedback Collection', 'checkbox', 'You can use this feature for Feedback Collection'),
(38, 'Feedback Management', 'checkbox', 'You can use this feature for Feedback Management'),
(39, 'Filtered Views', 'checkbox', 'You can use this feature for Filtered Views'),
(40, 'Help Desk ', 'checkbox', 'You can use this feature for Filtered Views'),
(41, 'Help Desk Management', 'checkbox', 'You can use this feature for Filtered Views'),
(42, 'Instand Messaging', 'checkbox', 'You can use this feature for Instand Messaging'),
(43, 'Issue Management', 'checkbox', 'You can use this feature for Issue Management'),
(44, 'Issue Tracking', 'checkbox', 'You can use this feature for Issue Tracking'),
(45, 'Knowledge Manage', 'checkbox', 'You can use this feature for Knowledge Manage'),
(46, 'Multi Chanel Communication', 'checkbox', 'You can use this feature for Multi Chanel Communication'),
(47, 'Multi Company', 'checkbox', 'You can use this feature for Multi Company'),
(48, 'Multi Location', 'checkbox', 'You can use this feature for Multi Location'),
(49, 'Multiple User Account', 'checkbox', 'Multiple User Account'),
(50, 'Online Forums', 'checkbox', 'Online Forums'),
(51, 'Performance Reports', 'checkbox', 'You can use this feature for Performance Reports'),
(52, 'Performance Managements', 'checkbox', 'You can use this feature for Performance Managements'),
(53, 'Priotitizing', 'checkbox', 'You can use this feature for Priotitizing'),
(54, 'Productivity Reporting', 'checkbox', 'You can use this feature for Productivity Reporting'),
(55, 'Queue Manager', 'checkbox', 'You can use this feature for Queue Manager'),
(56, 'Real Time Data', 'checkbox', 'You can use this feature for Real Time Data'),
(57, 'Real Time Notification', 'checkbox', 'You can use this feature for Real Time Notification'),
(58, 'Receiving', 'checkbox', 'You can use this feature for Receiving'),
(59, 'Reporting And Statistics', 'checkbox', 'You can use this feature for Reporting And Statistics'),
(60, 'Request Assignment', 'checkbox', 'You can use this feature for Request Assignment'),
(61, 'Routing Options', 'checkbox', 'You can use this feature for Routing Options'),
(62, 'Rules Based WorkFlow', 'checkbox', 'You can use this feature for Rules Based WorkFlow'),
(63, 'SLA Management', 'checkbox', 'You can use this feature for SLA Management'),
(64, 'SLA Security', 'checkbox', 'You can use this feature for SLA Security'),
(65, 'SLA Service Portal', 'checkbox', 'You can use this feature for SLA Service Portal'),
(66, 'Single Sign on', 'checkbox', 'You can use this feature for Single Sign on'),
(67, 'Social Media Integration', 'checkbox', 'You can use this feature for Social Media Integration'),
(68, 'Status Tracking', 'checkbox', 'You can use this feature for Status Tracking'),
(69, 'Support Ticket Tracking', 'checkbox', 'You can use this feature for Support Ticket Tracking'),
(70, 'Surveys and Feedback', 'checkbox', 'You can use this feature for Surveys and Feedback'),
(71, 'Tagging', 'checkbox', 'You can use this feature for Tagging'),
(72, 'Third Party Integration', 'checkbox', 'Third Party Integration'),
(73, 'Ticket Management', 'checkbox', 'Ticket Management'),
(74, 'Two Factor Authentication', 'checkbox', 'You can use this feature for Two Factor Authentication'),
(75, 'Widgets', 'checkbox', 'You can use this feature for Widgets'),
(76, 'WorkFlow Management', 'checkbox', 'You can use this feature for WorkFlow Management'),
(77, 'Price Value', 'text', ' This is for text feature');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` text NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `screenshot` text NOT NULL,
  `category` text NOT NULL,
  `aboutproduct` text NOT NULL,
  `videourl` varchar(100) NOT NULL,
  `product_detail` text NOT NULL,
  `created_date` datetime NOT NULL,
  `popular` tinyint(1) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `description`, `logo`, `screenshot`, `category`, `aboutproduct`, `videourl`, `product_detail`, `created_date`, `popular`, `activated`) VALUES
(7, 15, 'Employee Effectiveness ', 'Culture Amp, the company that pioneered making the power of people analytics accessible to all organizations, has released an Employee Effectiveness product shaped by the latest research in organizational psychology and data science. It is easy, quick and comfortable for people providing and receiving feedback and a breeze for companies to manage. Employee Effectiveness perfectly complements Culture Amp is celebrated Employee Engagement product and is available on the same platform.', './uploads/product/15412720581.png', 'a:2:{i:0;s:70:\"./uploads/product/1541353878125689-v7-vivo-v9-mobile-phone-large-1.jpg\";i:1;s:124:\"./uploads/product/1541353880micromax-q409-spark-4g-dual-sim-android-mobile-phone-medium_eee35f2ed387b2d5939bd3f45773b9a2.jpg\";}', '34', 'Culture Amp, the company that pioneered making the power of people analytics accessible to all organizations, has released an Employee Effectiveness product shaped by the latest research in organizational psychology and data science. It is easy, quick and comfortable for people providing and receiving feedback and a breeze for companies to manage. Employee Effectiveness perfectly complements Culture Amp celebrated Employee Engagement product and is available on the same platform.', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:20:\"http://codecanon.com\";s:9:\"freetrial\";s:29:\"http://codecanon.com/freedemo\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"30$/daily/user\";s:12:\"price_detail\";s:487:\"Culture Amp, the company that pioneered making the power of people analytics accessible to all organizations, has released an Employee Effectiveness product shaped by the latest research in organizational psychology and data science. It is easy, quick and comfortable for people providing and receiving feedback and a breeze for companies to manage. Employee Effectiveness perfectly complements Culture Amp is celebrated Employee Engagement product and is available on the same platform.\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(8, 15, 'Blue 360 Degree Feedback ', 'Blue 360 degree feedback review software is built from the ground up for automation through advanced integration capabilities with your organization\'s HRIS, CRM, and other essential IT asset; to handle your most common and the most unique 360 evaluation use cases; and to provide powerful reports and insights, and fuel competency development across your organization.', './uploads/product/15412723602.png', 'a:3:{i:0;s:33:\"./uploads/product/15413132617.png\";i:1;s:33:\"./uploads/product/15413132618.png\";i:2;s:33:\"./uploads/product/15413132619.png\";}', '34', 'Blue 360 degree feedback review software is built from the ground up for automation through advanced integration capabilities with your organization\'s HRIS, CRM, and other essential IT asset; to handle your most common and the most unique 360 evaluation use cases; and to provide powerful reports and insights, and fuel competency development across your organization.', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:20:\"http://codecanon.com\";s:9:\"freetrial\";s:29:\"http://codecanon.com/freedemo\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"40$/daily/user\";s:12:\"price_detail\";s:369:\"Blue 360 degree feedback review software is built from the ground up for automation through advanced integration capabilities with your organization is HRIS, CRM, and other essential IT asset; to handle your most common and the most unique 360 evaluation use cases; and to provide powerful reports and insights, and fuel competency development across your organization.\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(10, 15, 'AutoCAD Architecture', 'CAD software designed to help create architectural designs and documents quickly and easily. ', './uploads/product/15413131185.png', 'a:3:{i:0;s:33:\"./uploads/product/15413132617.png\";i:1;s:33:\"./uploads/product/15413132618.png\";i:2;s:33:\"./uploads/product/15413132619.png\";}', '34', 'CAD software designed to help create architectural designs and documents quickly and easily. ', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:0:\"\";s:9:\"freetrial\";s:0:\"\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"40$/daily/user\";s:12:\"price_detail\";s:115:\"GRAPHISOFT develops Building Information Modeling software products for architects, interior designers and planners\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(11, 15, 'SketchUp Pro', '2D and 3D drafting application for visualizing, communicating, and planning future construction projects. ', './uploads/product/15413132126.png', 'a:2:{i:0;s:70:\"./uploads/product/1541355872125689-v7-vivo-v9-mobile-phone-large-1.jpg\";i:1;s:124:\"./uploads/product/1541355872micromax-q409-spark-4g-dual-sim-android-mobile-phone-medium_eee35f2ed387b2d5939bd3f45773b9a2.jpg\";}', '35,36', '2D and 3D drafting application for visualizing, communicating, and planning future construction projects. ', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:20:\"http://codecanon.com\";s:9:\"freetrial\";s:30:\"http://codecanon.com/freetrial\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"40$/daily/user\";s:12:\"price_detail\";s:106:\"2D and 3D drafting application for visualizing, communicating, and planning future construction projects. \";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(12, 15, 'ArchiCAD', ' GRAPHISOFT develops Building Information Modeling software products for architects, interior designers and planners. ', './uploads/product/15413133247.png', 'a:3:{i:0;s:33:\"./uploads/product/15413132617.png\";i:1;s:33:\"./uploads/product/15413132618.png\";i:2;s:33:\"./uploads/product/15413132619.png\";}', '34,36,37', 'GRAPHISOFT develops Building Information Modeling software products for architects, interior designers and planners', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:0:\"\";s:9:\"freetrial\";s:0:\"\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"40$/daily/user\";s:12:\"price_detail\";s:115:\"GRAPHISOFT develops Building Information Modeling software products for architects, interior designers and planners\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(13, 15, 'MicroStation', '3D modeling software provides modeling,drafting and visualization for architects, engineers & infrastructure professionals ', './uploads/product/15413134128.png', 'a:2:{i:0;s:70:\"./uploads/product/1541355974125689-v7-vivo-v9-mobile-phone-large-1.jpg\";i:1;s:124:\"./uploads/product/1541355974micromax-q409-spark-4g-dual-sim-android-mobile-phone-medium_eee35f2ed387b2d5939bd3f45773b9a2.jpg\";}', '34', '3D modeling software provides modeling,drafting and visualization for architects, engineers & infrastructure professionals ', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:20:\"http://codecanon.com\";s:9:\"freetrial\";s:30:\"http://codecanon.com/freetrial\";s:7:\"who_use\";s:11:\"user1,user2\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:17:\"50$/daily/company\";s:12:\"price_detail\";s:123:\"3D modeling software provides modeling,drafting and visualization for architects, engineers & infrastructure professionals \";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(14, 15, 'Chief Architect', ' The industry leader for residential architectural home design software. This program is easy to use for the building professional', './uploads/product/15413563429.png', 'a:3:{i:0;s:33:\"./uploads/product/15413562913.png\";i:1;s:33:\"./uploads/product/15413562914.png\";i:2;s:33:\"./uploads/product/15413562915.png\";}', '34,37', ' The industry leader for residential architectural home design software. This program is easy to use for the building professional', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:0:\"\";s:9:\"freetrial\";s:0:\"\";s:7:\"who_use\";s:129:\"The industry leader for residential architectural home design software. This program is easy to use for the building professional\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:14:\"40$/daily/user\";s:12:\"price_detail\";s:129:\"The industry leader for residential architectural home design software. This program is easy to use for the building professional\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:5:\"false\";}}', '0000-00-00 00:00:00', 1, 1),
(15, 15, ' Space Designer 3D Add to Compare Space Designer 3D ', 'Online application to draw floor plans in 2D and visualize them in 3D.', './uploads/product/154135701411.png', 'a:2:{i:0;s:33:\"./uploads/product/15413563918.png\";i:1;s:33:\"./uploads/product/15413563919.png\";}', '35,36', 'Online application to draw floor plans in 2D and visualize them in 3D.', 'https://www.youtube.com/embed/0rW5-vkNRKM?enablejsapi=1', 'a:8:{s:10:\"websiteurl\";s:20:\"http://codecanon.com\";s:9:\"freetrial\";s:30:\"http://codecanon.com/freetrial\";s:7:\"who_use\";s:70:\"Online application to draw floor plans in 2D and visualize them in 3D.\";s:6:\"deploy\";s:14:\"web,cloud,sass\";s:11:\"start_price\";s:16:\"50$/monthly/user\";s:12:\"price_detail\";s:70:\"Online application to draw floor plans in 2D and visualize them in 3D.\";s:8:\"training\";a:4:{s:8:\"inperson\";s:4:\"true\";s:10:\"liveonline\";s:4:\"true\";s:8:\"Webinars\";s:4:\"true\";s:13:\"Documentation\";s:5:\"false\";}s:7:\"support\";a:3:{s:7:\"liverep\";s:4:\"true\";s:12:\"businesshour\";s:4:\"true\";s:6:\"onLine\";s:4:\"true\";}}', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productmeta`
--

CREATE TABLE `productmeta` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `feature_key` int(11) NOT NULL,
  `value` text NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productmeta`
--

INSERT INTO `productmeta` (`id`, `product_id`, `category_id`, `feature_key`, `value`, `status`) VALUES
(184, 7, 34, 10, 'true', 'active'),
(185, 7, 34, 17, 'true', 'active'),
(186, 7, 34, 18, 'true', 'active'),
(187, 7, 34, 22, 'true', 'active'),
(188, 7, 34, 29, 'false', 'active'),
(189, 7, 34, 30, 'false', 'active'),
(190, 8, 34, 10, 'true', 'active'),
(191, 8, 34, 17, 'true', 'active'),
(192, 8, 34, 18, 'true', 'active'),
(193, 8, 34, 22, 'true', 'active'),
(194, 8, 34, 29, 'false', 'active'),
(195, 8, 34, 30, 'false', 'active'),
(214, 10, 34, 10, 'true', 'active'),
(215, 10, 34, 17, 'true', 'active'),
(216, 10, 34, 18, 'true', 'active'),
(217, 10, 34, 22, 'false', 'active'),
(218, 10, 34, 29, 'false', 'active'),
(219, 10, 34, 30, 'false', 'active'),
(220, 11, 35, 4, 'true', 'active'),
(221, 11, 35, 5, 'false', 'active'),
(222, 11, 35, 7, 'false', 'active'),
(223, 11, 35, 8, 'false', 'active'),
(224, 11, 35, 11, 'true', 'active'),
(225, 11, 35, 18, 'false', 'active'),
(226, 11, 36, 4, 'false', 'active'),
(227, 11, 36, 5, 'true', 'active'),
(228, 11, 36, 7, 'true', 'active'),
(229, 11, 36, 8, 'true', 'active'),
(230, 11, 36, 11, 'true', 'active'),
(231, 11, 36, 18, 'false', 'active'),
(232, 13, 34, 10, 'true', 'active'),
(233, 13, 34, 17, 'true', 'active'),
(234, 13, 34, 18, 'false', 'active'),
(235, 13, 34, 22, 'true', 'active'),
(236, 13, 34, 29, 'false', 'active'),
(237, 13, 34, 30, 'false', 'active'),
(238, 14, 34, 10, 'true', 'active'),
(239, 14, 34, 17, 'true', 'active'),
(240, 14, 34, 18, 'false', 'active'),
(241, 14, 34, 22, 'false', 'active'),
(242, 14, 34, 29, 'false', 'active'),
(243, 14, 34, 30, 'false', 'active'),
(244, 14, 37, 4, 'true', 'active'),
(245, 14, 37, 5, 'false', 'active'),
(246, 14, 37, 7, 'false', 'active'),
(247, 14, 37, 8, 'false', 'active'),
(248, 14, 37, 11, 'false', 'active'),
(249, 14, 37, 18, 'false', 'active'),
(250, 15, 35, 4, 'false', 'active'),
(251, 15, 35, 5, 'true', 'active'),
(252, 15, 35, 7, 'true', 'active'),
(253, 15, 35, 8, 'true', 'active'),
(254, 15, 35, 11, 'false', 'active'),
(255, 15, 35, 18, 'false', 'active'),
(256, 15, 36, 4, 'true', 'active'),
(257, 15, 36, 5, 'true', 'active'),
(258, 15, 36, 7, 'true', 'active'),
(259, 15, 36, 8, 'false', 'active'),
(260, 15, 36, 11, 'false', 'active'),
(261, 15, 36, 18, 'false', 'active'),
(262, 12, 34, 10, 'true', 'active'),
(263, 12, 34, 17, 'true', 'active'),
(264, 12, 34, 18, 'false', 'active'),
(265, 12, 34, 22, 'true', 'active'),
(266, 12, 34, 29, 'true', 'active'),
(267, 12, 34, 30, 'false', 'active'),
(268, 12, 36, 4, 'false', 'active'),
(269, 12, 36, 5, 'true', 'active'),
(270, 12, 36, 7, 'true', 'active'),
(271, 12, 36, 8, 'false', 'active'),
(272, 12, 36, 11, 'false', 'active'),
(273, 12, 36, 18, 'false', 'active'),
(274, 12, 37, 4, 'false', 'active'),
(275, 12, 37, 5, 'true', 'active'),
(276, 12, 37, 7, 'true', 'active'),
(277, 12, 37, 8, 'true', 'active'),
(278, 12, 37, 11, 'true', 'active'),
(279, 12, 37, 18, 'true', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `over_all` int(11) NOT NULL,
  `easy_use` int(11) NOT NULL,
  `features_functionality` int(11) NOT NULL,
  `customer_support` int(11) NOT NULL,
  `value_of_money` int(11) NOT NULL,
  `favourites` int(11) NOT NULL,
  `title` text NOT NULL,
  `props` text NOT NULL,
  `cons` text NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviewmeta`
--

CREATE TABLE `reviewmeta` (
  `id` int(11) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_value` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `website` varchar(30) NOT NULL,
  `socialnetwork` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `created_date` date NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `activation_code` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `company_size` varchar(30) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `popular` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `phone`, `website`, `socialnetwork`, `username`, `password`, `activated`, `created_date`, `usertype`, `activation_code`, `company`, `company_size`, `profile`, `popular`) VALUES
(4, 'quan', 'wei cheng', 'jws19950122@outlook.com', '', '', '', 'quan', 'de1ad18858feb4f93fca04ffa866c077', 1, '2018-10-30', 'administrator', 'edb3b863d9333073200581afe223ec', '', '', '', 1),
(11, 'quan', 'wei', 'quan@quan.quan', '+129039123', 'https://automatic.com', '', 'quanexe', '562b281bf5d205207bbf040114b9d692', 1, '2018-10-31', 'buyer', 'aab9221ab2571018f276769b93ddcb', 'Quan', '2~10', './uploads/user/11/profile_picture.jpg', 1),
(13, 'quan', 'wei', 'jws1995@outlook.com', '1920930123', 'http://kkk.com', '', 'kkk', 'cb42e130d1471239a27fca6228094f0e', 1, '2018-10-31', 'buyer', '', 'kslkdksd', '2~10', './uploads/user/13/profile_picture1.jpg', 1),
(15, 'Vendor', 'Vendor', 'agw19920504@gmail.com', '1290903123', 'http://www.http.com', 'a:5:{s:8:\"facebook\";s:19:\"http://facebook.com\";s:6:\"google\";s:17:\"http://google.com\";s:8:\"linkedin\";s:19:\"http://linkedin.com\";s:7:\"twitter\";s:18:\"http://twitter.com\";s:7:\"youtube\";s:18:\"http://youtube.com\";}', 'vendor', '7c3613dba5171cb6027c67835dd3b9d4', 1, '2018-10-31', 'vendor', '', 'Quan', '1000+', './uploads/user/1540995848profile_picture1.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productmeta`
--
ALTER TABLE `productmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewmeta`
--
ALTER TABLE `reviewmeta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productmeta`
--
ALTER TABLE `productmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `reviewmeta`
--
ALTER TABLE `reviewmeta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
