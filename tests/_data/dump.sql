-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2013 at 02:25 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gileswilson_saidit`
--

-- --------------------------------------------------------

--
-- Table structure for table `saidit_activity`
--

CREATE TABLE `saidit_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(300) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `saidit_activity`
--

INSERT INTO `saidit_activity` (`id`, `content`, `create_date`) VALUES
(118, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/200&quot;&gt;test&lt;/a&gt;', '2013-09-19 15:18:41'),
(119, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/200&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-19 15:20:53'),
(120, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/200&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-19 15:20:57'),
(121, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/200&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-19 15:20:58'),
(122, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/200&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-19 15:21:00'),
(123, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;', '2013-09-20 09:11:28'),
(124, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;', '2013-09-20 09:20:58'),
(125, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/203&quot;&gt;asd&lt;/a&gt;', '2013-09-20 09:23:53'),
(126, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/204&quot;&gt;test+this+week&lt;/a&gt;', '2013-09-23 12:56:01'),
(127, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/205&quot;&gt;sad&lt;/a&gt;', '2013-09-23 16:28:58'),
(128, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/206&quot;&gt;sad&lt;/a&gt;', '2013-09-23 16:30:17'),
(129, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/207&quot;&gt;asd&lt;/a&gt;', '2013-09-23 16:30:28'),
(130, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/208&quot;&gt;asd&lt;/a&gt;', '2013-09-23 16:30:35'),
(131, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/209&quot;&gt;sdfs&lt;/a&gt;', '2013-09-23 16:36:17'),
(132, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/209&quot;&gt;sdfs&lt;/a&gt;+you+posted', '2013-09-23 16:53:13'),
(133, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/210&quot;&gt;asd&lt;/a&gt;', '2013-09-24 08:07:04'),
(134, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/211&quot;&gt;sad&lt;/a&gt;', '2013-09-24 10:15:03'),
(135, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/212&quot;&gt;qwe&lt;/a&gt;', '2013-09-24 10:50:48'),
(136, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/203&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:52:36'),
(137, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/203&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:52:52'),
(138, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:53:18'),
(139, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:54:07'),
(140, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:54:45'),
(141, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:55:52'),
(142, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:56:03'),
(143, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:57:01'),
(144, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:58:01'),
(145, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:58:43'),
(146, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:59:38'),
(147, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:59:45'),
(148, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 14:59:53'),
(149, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', '2013-09-24 15:00:09'),
(150, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:31:20'),
(151, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:31:55'),
(152, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:34:37'),
(153, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:34:47'),
(154, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:39:19'),
(155, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:40:05'),
(156, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;http://localhost:8888//storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt;+you+posted', '2013-09-24 15:41:47'),
(157, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/213&quot;&gt;asd&lt;/a&gt;', '2013-09-24 15:53:34'),
(158, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/214&quot;&gt;asd&lt;/a&gt;', '2013-09-24 15:53:58'),
(159, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/215&quot;&gt;asdadasdas&lt;/a&gt;', '2013-09-24 15:54:07'),
(160, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/216&quot;&gt;sad&lt;/a&gt;', '2013-09-24 15:54:17'),
(161, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/217&quot;&gt;asd&lt;/a&gt;', '2013-09-24 15:54:21'),
(162, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/218&quot;&gt;asdasds&lt;/a&gt;', '2013-09-24 15:54:26'),
(163, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/219&quot;&gt;asd&lt;/a&gt;', '2013-09-24 15:58:08'),
(164, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/220&quot;&gt;iOS7+Confusing+users&lt;/a&gt;', '2013-09-24 16:50:01'),
(165, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/221&quot;&gt;Why+we+hate+infographics&lt;/a&gt;', '2013-09-24 17:02:07'),
(166, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/222&quot;&gt;asd&lt;/a&gt;', '2013-09-25 10:59:13'),
(167, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/223&quot;&gt;asd&lt;/a&gt;', '2013-09-25 11:00:08'),
(168, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/224&quot;&gt;asd&lt;/a&gt;', '2013-09-25 11:00:23'),
(169, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/225&quot;&gt;asd&lt;/a&gt;', '2013-09-25 11:00:42'),
(170, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/226&quot;&gt;asd&lt;/a&gt;', '2013-09-25 11:00:49'),
(171, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/227&quot;&gt;Coffee+shop+in+GTA+called+java&lt;/a&gt;', '2013-09-25 13:32:32'),
(172, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/228&quot;&gt;Diagrams+that+changed+the+world.&lt;/a&gt;', '2013-09-25 13:43:34'),
(173, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/229&quot;&gt;Why+do+people+hate+crossfit?&lt;/a&gt;', '2013-09-25 13:44:00'),
(174, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; created+new+post+&lt;a+href=&quot;/storm-saidit/post/view/230&quot;&gt;Easyjet+refuse+man+on+board+for+sending+a+tweet&lt;/a&gt;', '2013-09-25 14:11:46'),
(175, '&lt;a href=&quot;/storm-saidit/?name=2&quot;&gt;Ashley Banks&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;http://localhost:8888//storm-saidit/post/view/220&quot;&gt;iOS7+Confusing+users&lt;/a&gt;+you+posted+on+Saidit.', '2013-09-25 14:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `saidit_authors`
--

CREATE TABLE `saidit_authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `saidit_authors`
--

INSERT INTO `saidit_authors` (`id`, `name`, `create_date`) VALUES
(2, 'Ashley Banks', '2013-06-20 13:31:57'),
(20, 'richard', '2013-06-24 16:57:05'),
(21, 'test', '2013-06-25 16:19:15'),
(22, 'gary', '2013-06-26 16:36:03'),
(23, 'Alex Shearcroft', '2013-06-26 16:37:34'),
(24, 'David Jones', '2013-06-26 16:53:51'),
(25, 'David Jones', '2013-06-28 15:34:17'),
(26, 'rbeaufoy', '2013-07-09 16:41:21'),
(27, 'Alex Shearcroft', '2013-07-17 10:01:09'),
(28, 'Ed Currington', '2013-08-01 10:13:15');

-- --------------------------------------------------------

--
-- Table structure for table `saidit_comments`
--

CREATE TABLE `saidit_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `posts_id` int(11) NOT NULL,
  `authors_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `saidit_comments`
--

INSERT INTO `saidit_comments` (`id`, `body`, `posts_id`, `authors_id`, `create_date`) VALUES
(73, 'sadad', 200, 2, '2013-09-19 15:20:53'),
(74, 'asdsad', 200, 2, '2013-09-19 15:20:57'),
(75, 'asdasd', 200, 2, '2013-09-19 15:20:58'),
(76, 'asdasdasdad', 200, 2, '2013-09-19 15:21:00'),
(77, 'asdad', 209, 2, '2013-09-23 16:53:13'),
(78, 'RAHHH\r\n', 203, 2, '2013-09-24 14:52:36'),
(79, 'asdasd', 203, 2, '2013-09-24 14:52:52'),
(80, 'adsasd', 201, 20, '2013-09-24 14:53:18'),
(81, 'asdasd', 201, 20, '2013-09-24 14:54:07'),
(82, 'asdasda', 201, 20, '2013-09-24 14:54:45'),
(83, 'asdasda', 201, 20, '2013-09-24 14:55:52'),
(84, 'asdasda', 201, 20, '2013-09-24 14:56:03'),
(85, 'asdasd', 201, 20, '2013-09-24 14:57:01'),
(86, 'asdasd', 201, 20, '2013-09-24 14:58:01'),
(87, 'asdasd', 201, 20, '2013-09-24 14:58:43'),
(88, 'asdasd', 201, 20, '2013-09-24 14:59:38'),
(89, 'asdasd', 201, 20, '2013-09-24 14:59:45'),
(90, 'asdasd', 201, 20, '2013-09-24 14:59:53'),
(91, 'asdasd', 201, 20, '2013-09-24 15:00:09'),
(92, 'asdasdasdasd', 202, 20, '2013-09-24 15:31:20'),
(93, 'asdasd', 202, 20, '2013-09-24 15:31:55'),
(94, 'asdasd', 202, 20, '2013-09-24 15:34:37'),
(95, 'asdasd', 202, 20, '2013-09-24 15:34:47'),
(96, 'asdasd', 202, 20, '2013-09-24 15:39:19'),
(97, 'asdasd', 202, 20, '2013-09-24 15:40:05'),
(98, 'asdasd', 202, 20, '2013-09-24 15:41:47'),
(99, 'I really like this article and agree on every point made.', 220, 2, '2013-09-25 14:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `saidit_notifications`
--

CREATE TABLE `saidit_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(300) NOT NULL,
  `authors_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `saidit_notifications`
--

INSERT INTO `saidit_notifications` (`id`, `content`, `authors_id`, `create_date`, `status`) VALUES
(1, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', 2, '2013-09-24 14:53:18', 0),
(2, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', 2, '2013-09-24 14:54:07', 0),
(3, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented+on+the+post+&lt;a+href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt;+you+posted', 2, '2013-09-24 14:54:45', 0),
(4, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:55:52', 0),
(5, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:56:03', 0),
(6, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:57:01', 0),
(7, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:58:01', 0),
(8, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:58:43', 0),
(9, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:59:38', 0),
(10, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:59:45', 0),
(11, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 14:59:53', 0),
(12, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/201&quot;&gt;asd&lt;/a&gt; you posted', 2, '2013-09-24 15:00:09', 0),
(13, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:31:20', 0),
(14, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:31:55', 0),
(15, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:34:37', 0),
(16, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:34:47', 0),
(17, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:39:20', 0),
(18, '&lt;a href=&quot;/storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;/storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:40:05', 0),
(19, '&lt;a href=&quot;http://localhost:8888//storm-saidit/?name=20&quot;&gt;richard&lt;/a&gt; commented on the post &lt;a href=&quot;http://localhost:8888//storm-saidit/post/view/202&quot;&gt;test&lt;/a&gt; you posted', 2, '2013-09-24 15:41:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `saidit_posts`
--

CREATE TABLE `saidit_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `authors_id` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `link` varchar(250) NOT NULL,
  `rating` int(11) DEFAULT '0',
  `category` varchar(150) NOT NULL,
  `image_url` varchar(300) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `notes` text NOT NULL,
  `approved_by` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=231 ;

--
-- Dumping data for table `saidit_posts`
--

INSERT INTO `saidit_posts` (`id`, `title`, `image_id`, `authors_id`, `create_date`, `link`, `rating`, `category`, `image_url`, `status`, `notes`, `approved_by`) VALUES
(220, 'iOS7 Confusing users', NULL, 2, '2013-09-24 16:50:01', 'https://medium.com/design-ux/ce87662270cf', 0, 'in-the-news,funny-interesting,ideas', 'https://d233eq3e3p3cv0.cloudfront.net/fit/c/190/190/0*nsWGhy3DFdxD03t7.jpeg', 1, 'Found this article on user interface being very inconsistent in the new iOS', '2'),
(221, 'Why we hate infographics', NULL, 2, '2013-09-24 17:02:07', 'http://insights.qunb.com/why-we-hate-infographics-and-why-you-should', 0, 'in-the-news,social-events', 'http://cdn2.hubspot.net/hub/295090/file-319399065-jpg/132024_-_Visicalc_founders_-_Cute.jpg', 1, '', '2'),
(227, 'Coffee shop in GTA called java', NULL, 2, '2013-09-25 13:32:32', 'http://orcz.com/GTA_V:_Java_Update_Coffeeshop', 0, 'in-the-news,funny-interesting', '/skins/vector/images/search-ltr.png?303', 1, 'Testing this with a random unrelated link.', '2'),
(228, 'Diagrams that changed the world.', NULL, 2, '2013-09-25 13:43:34', 'http://www.brainpickings.org/index.php/2012/12/21/100-diagrams-that-changed-the-world/', 0, 'legal-updates,ideas,local', 'http://www.brainpickings.org/wp-content/uploads/2012/12/100diagramsthatchangedtheworld2.jpg', 3, '', '2'),
(229, 'Why do people hate crossfit?', NULL, 2, '2013-09-25 13:44:00', 'https://medium.com/i-m-h-o/6d606a0b7d31', 0, 'legal-updates,in-the-news', 'https://d233eq3e3p3cv0.cloudfront.net/max/700/0*1Y141vvxp3v6-RHF.jpeg', 1, 'Just another random post with comments', '2'),
(230, 'Easyjet refuse man on board for sending a tweet', NULL, 2, '2013-09-25 14:11:46', 'http://www.thedrum.com/news/2013/09/25/easyjet-under-fire-after-claims-it-refused-let-drum-columnist-mark-leiser-board', 0, 'in-the-news,social-events,funny-interesting', 'http://img.youtube.com/vi/P47eLknD0qo/0.jpg', 1, '', '2');

-- --------------------------------------------------------

--
-- Table structure for table `saidit_ratings`
--

CREATE TABLE `saidit_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `posts_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `authors_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `saidit_ratings`
--

INSERT INTO `saidit_ratings` (`id`, `rating`, `posts_id`, `create_date`, `authors_id`) VALUES
(3, 2, 221, '2013-09-25 10:58:59', 2),
(4, 1, 227, '2013-09-25 13:53:16', 2);

-- --------------------------------------------------------

--
-- Table structure for table `saidit_users`
--

CREATE TABLE `saidit_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authors_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notifications` int(11) NOT NULL DEFAULT '0',
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `saidit_users`
--

INSERT INTO `saidit_users` (`id`, `authors_id`, `username`, `password`, `notifications`, `level`) VALUES
(1, 2, 'ash@stormcreative.co.uk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, '1'),
(29, 20, 'rich@stormcreative.co.uk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, '2'),
(30, 21, 'alex@stormcreative.co.uk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, '0'),
(31, 22, 'gary', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(32, 23, 'Alex', 'b80b60151dffadfe1eb597aba7a1d3b2a5fd2237', 0, ''),
(33, 24, 'david_jones', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(34, 25, 'iamjones', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 0, ''),
(35, 26, 'rbeaufoy', '3c649185ca41b2c53060c8266b0845206b4ab363', 0, ''),
(36, 27, 'Alex Shearcroft', 'b80b60151dffadfe1eb597aba7a1d3b2a5fd2237', 0, ''),
(37, 28, 'Ed', '250e77f12a5ab6972a0895d290c4792f0a326ea8', 0, '');
