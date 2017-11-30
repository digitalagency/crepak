-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2017 at 12:54 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dactechn_crepak`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE IF NOT EXISTS `tbl_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `image` varchar(225) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `post_id`, `image`, `status`, `created_date`) VALUES
(7, 22, '6634820100714078.jpg', '0', '2017-06-15'),
(8, 22, '46503201143_502217573135428_1051192523_o.jpg', '1', '2017-06-15'),
(9, 20, '11822Bataart1.jpg', '1', '2017-06-15'),
(10, 20, '98203Bataart2.jpg', '1', '2017-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `title_cn` varchar(150) NOT NULL,
  `page_link` varchar(225) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `menu_order` int(11) NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `parent_id`, `title`, `title_cn`, `page_link`, `status`, `menu_order`, `created_date`) VALUES
(1, 0, 'Home', '家', 'index', '1', 1, '2017-06-21'),
(2, 0, 'Product', '产品', '', '1', 2, '2017-06-21'),
(3, 0, 'Application', '应用', 'applications', '1', 3, '2017-06-22'),
(4, 0, 'Contact', '联系', 'contact', '1', 4, '2017-06-21'),
(5, 2, 'Product Category', '产品分类', 'category/category-testing', '1', 1, '2017-06-21'),
(6, 5, 'Product Testing', 'Product Testing Chinese', 'product/product-testing', '1', 1, '2017-06-16'),
(7, 0, 'Main Categry', 'Main Categry Chinese', 'pages/main-category', '0', 6, '2017-06-30'),
(8, 0, 'About Us', '关于我们', 'pages/about-us', '1', 5, '2017-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `title_cn` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `content_cn` longtext NOT NULL,
  `excrept` text NOT NULL,
  `excrept_cn` text NOT NULL,
  `featured_img` varchar(220) NOT NULL,
  `featured_img_cn` varchar(220) DEFAULT NULL,
  `post_type` varchar(100) NOT NULL,
  `post_parent` int(11) NOT NULL,
  `post_order` int(11) NOT NULL,
  `post_date` datetime NOT NULL,
  `post_update` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `slug` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `title_cn`, `content`, `content_cn`, `excrept`, `excrept_cn`, `featured_img`, `featured_img_cn`, `post_type`, `post_parent`, `post_order`, `post_date`, `post_update`, `status`, `slug`) VALUES
(2, 'Main Category', '主要類別', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行業的虛擬文字。 自從15世紀15年代以來，Lorem Ipsum一直是行業標準的虛擬文本，當時一個未知的打印機拿了一個類型的廚房，並加了一個類型的樣本書。 它已經生存了不止五個世紀，而且還跨越了電子排版，基本保持不變。 它在20世紀60年代被普及，並發行了包含Lorem Ipsum段落的Letraset片，最近還有一些桌面出版軟件，如Aldus PageMaker，包括Lorem Ipsum的版本。</p>\r\n', '', '', '27072review_miniondave_1.jpg', '65100img.jpg', 'pages', 0, 0, '2017-05-26 13:43:49', '2017-05-29 00:00:00', '1', 'main-category'),
(3, 'Testing For Images update', '測試圖像', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行業的虛擬文字。 自從15世紀15年代以來，Lorem Ipsum一直是行業標準的虛擬文本，當時一個未知的打印機拿了一個類型的廚房，並加了一個類型的樣本書。 它已經生存了不止五個世紀，而且還跨越了電子排版，基本保持不變。 它在20世紀60年代被普及，並發行了包含Lorem Ipsum段落的Letraset片，最近還有一些桌面出版軟件，如Aldus PageMaker，包括Lorem Ipsum的版本。</p>\r\n', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行業的虛擬文字。 自從15世紀15年代以來，Lorem Ipsum一直是行業標準的虛擬文本，</p>\r\n', '87500img.jpg', '996710288762_919423534752419_1066153914971804929_n.jpg', 'pages', 0, 0, '2017-05-29 07:16:44', '2017-05-29 00:00:00', '1', 'testing-for-images-update'),
(5, 'New Method', '', '<p>asdfasdfasdfsa</p>\r\n', '<p>asdfasdfafa</p>\r\n', '<p>asdfasdf</p>\r\n', '<p>asdfasdfassfddsa</p>\r\n', '86448481763_4234528360989_393566039_n.jpg', '36975969167_4234503600370_1292568748_n.jpg', 'pages', 0, 0, '2017-05-30 08:38:22', '2017-05-30 00:00:00', '1', 'new-method'),
(8, 'Category Testing', '測試圖像', '', '', '', '', '', '', 'category', 0, 0, '2017-05-31 08:36:57', '0000-00-00 00:00:00', '1', 'category-testing'),
(10, 'Product Testing', '測試圖像', '<p>asdfadf</p>\r\n', '<p>asdfadsfa</p>\r\n', '<p>asdfa</p>\r\n', '<p>adsfas</p>\r\n', '70535969167_4234503600370_1292568748_n.jpg', '74457481763_4234528360989_393566039_n.jpg', 'product', 8, 0, '2017-05-31 12:06:30', '2017-05-31 12:27:12', '1', 'product-testing'),
(12, 'Company News', 'Company News', '', '', '', '', '', NULL, 'newscategory', 0, 0, '2017-06-01 12:29:57', '0000-00-00 00:00:00', '1', 'company-news'),
(14, 'Success Story updatesss', '', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '75464481763_4234528360989_393566039_n.jpg', '25735969167_4234503600370_1292568748_n.jpg', 'story', 0, 0, '2017-06-02 09:25:46', '2017-06-02 00:00:00', '1', 'success-story-updatesss'),
(15, 'application test', 'application test', '<p>testing for last inserted id</p>\r\n', '<p>testing for last inserted id</p>\r\n', '<p>testing for last inserted id</p>\r\n', '<p>testing for last inserted id</p>\r\n', '', '', 'applications', 0, 0, '2017-06-05 07:18:57', '2017-06-30 01:04:50', '0', 'application-test'),
(16, 'Product for application', 'Product for application', '<p>Product for application</p>\r\n', '<p>Product for application</p>\r\n', '<p>Product for application</p>\r\n', '<p>Product for application</p>\r\n', '', '', 'product', 8, 0, '2017-06-05 07:21:27', '0000-00-00 00:00:00', '1', 'product-for-application'),
(17, 'Story for application', 'Story for application', '<p>Story for application</p>\r\n', '<p>Story for application</p>\r\n', '<p>Story for application</p>\r\n', '<p>Story for application</p>\r\n', '', '', 'story', 0, 0, '2017-06-05 07:21:47', '0000-00-00 00:00:00', '1', 'story-for-application'),
(22, 'File Upload', 'File Upload', '<p>File Upload</p>\r\n', '<p>File Upload</p>\r\n', '<p>File Upload</p>\r\n', '<p>File Upload</p>\r\n', '', '', 'product', 8, 0, '2017-06-05 13:47:43', '2017-06-12 13:09:39', '1', 'file-upload'),
(23, 'tetttt', '', '', '', '', '', '73404481763_4234528360989_393566039_n.jpg', '68390969167_4234503600370_1292568748_n.jpg', 'product', 8, 0, '2017-06-12 13:10:44', '2017-06-13 06:06:05', '1', 'tetttt'),
(25, 'Simple is the new smart', '简单就是新的聪明才智', '<p>Crepak designs and manufactures durable, high Performance RFID tagsfor general and harsh environment. Toensure perfect deployment, We work withour customerthrough all project phase from POC, Pilotto Deployment;With ourknowhow we could work with our customer to solve themost challenge problem.</p>\r\n', '<p>Crepak设计和制造耐用，高性能RFID标签，适用于一般和恶劣的环境。 实现完美的部署，我们通过POC，Pilotto部署的所有项目阶段与客户沟通;通过我们的了解，我们可以与客户合作，解决最大的挑战性问题。</p>\r\n', '<p>Crepak designs and manufactures durable, high Performance RFID tagsfor general and harsh environment. Toensure perfect deployment, We work withour customerthrough all project phase from POC, Pilotto Deployment;With ourknowhow we could work with our customer to solve themost challenge problem.</p>\r\n', '<p>Crepak设计和制造耐用，高性能RFID标签，适用于一般和恶劣的环境。 实现完美的部署，我们通过POC，Pilotto部署的所有项目阶段与客户沟通;通过我们的了解，我们可以与客户合作，解决最大的挑战性问题。</p>\r\n', '', NULL, 'videos', 0, 0, '2017-06-30 00:40:36', '0000-00-00 00:00:00', '1', 'simple-is-the-new-smart'),
(26, 'About Us', '关于我们', '<p><strong>What is it?&nbsp; Where is it?When is it?&nbsp;</strong></p>\r\n\r\n<p>Large organizations always face challenges of effectively tracking of assets with real time reporting, it cost a lot of redundancies, expenditures and labor but the result is still not accurate and on time, a reliable, automated asset management system is highly needed to improve it;</p>\r\n\r\n<p><strong>Technology evolution- id palte to RFID</strong></p>\r\n\r\n<p>To solve the problem, traditional way is to use normal label or nameplate to manage assets, this system allowed personnel to more easily identify key items. Of course, one still had to read them individually, and human error in data capture limited effectiveness.</p>\r\n\r\n<p>Nowadays, general bar code automated the process and allowed people to scan individual items using a handheld scanner, however it still wastes time due to one by one visual scanning, RFID is the next generation of technology and allows users to scan multiple items at one time and does not require line of sight. Unlike bar codes, RFID enable personnel to locate tagged items without climbing ladders, crawling under desks, or having to be in direct line of sight.</p>\r\n\r\n<p><strong>Benefits of rfid asset management system</strong>&nbsp;</p>\r\n\r\n<p>By deploying RFID system, benefits are recognized across many departments:</p>\r\n\r\n<ul>\r\n	<li><strong>Accounting &amp; Finance</strong>: enable true cost control and audit-proof inventory. Improve asset accounting with customized and ad hoc reports of asset locations, trends, status, and history.</li>\r\n	<li><strong>IT</strong>: support life cycle management and scale more efficiently</li>\r\n	<li><strong>Facilities &amp; Security</strong>: protect critical information on devices</li>\r\n	<li><strong>Operations</strong>: Quickly locate critical equipment and achieve real-time physical asset inventory.</li>\r\n</ul>\r\n\r\n<p>Overall, Organizations will be benefit on:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Achieve&nbsp;real-time physical inventory&nbsp;of assets to reduce asset loss</li>\r\n	<li>Enhance&nbsp;productivity&nbsp;by remotely monitoring assets and infrastructure</li>\r\n	<li>Optimize inventory and new assets purchasing to save cost;</li>\r\n	<li>Improve security&nbsp;by preventing assets from leaving premises and keeping designated assets out of unauthorized areas</li>\r\n	<li>Whole life cycle management to optimize asset usage</li>\r\n	<li>Deliver&nbsp;more timely and transition information for decision making</li>\r\n</ul>\r\n', '<p><strong>What is it?&nbsp; Where is it?When is it?&nbsp;</strong></p>\r\n\r\n<p>Large organizations always face challenges of effectively tracking of assets with real time reporting, it cost a lot of redundancies, expenditures and labor but the result is still not accurate and on time, a reliable, automated asset management system is highly needed to improve it;</p>\r\n\r\n<p><strong>Technology evolution- id palte to RFID</strong></p>\r\n\r\n<p>To solve the problem, traditional way is to use normal label or nameplate to manage assets, this system allowed personnel to more easily identify key items. Of course, one still had to read them individually, and human error in data capture limited effectiveness.</p>\r\n\r\n<p>Nowadays, general bar code automated the process and allowed people to scan individual items using a handheld scanner, however it still wastes time due to one by one visual scanning, RFID is the next generation of technology and allows users to scan multiple items at one time and does not require line of sight. Unlike bar codes, RFID enable personnel to locate tagged items without climbing ladders, crawling under desks, or having to be in direct line of sight.</p>\r\n\r\n<p><strong>Benefits of rfid asset management system</strong>&nbsp;</p>\r\n\r\n<p>By deploying RFID system, benefits are recognized across many departments:</p>\r\n\r\n<ul>\r\n	<li><strong>Accounting &amp; Finance</strong>: enable true cost control and audit-proof inventory. Improve asset accounting with customized and ad hoc reports of asset locations, trends, status, and history.</li>\r\n	<li><strong>IT</strong>: support life cycle management and scale more efficiently</li>\r\n	<li><strong>Facilities &amp; Security</strong>: protect critical information on devices</li>\r\n	<li><strong>Operations</strong>: Quickly locate critical equipment and achieve real-time physical asset inventory.</li>\r\n</ul>\r\n\r\n<p>Overall, Organizations will be benefit on:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Achieve&nbsp;real-time physical inventory&nbsp;of assets to reduce asset loss</li>\r\n	<li>Enhance&nbsp;productivity&nbsp;by remotely monitoring assets and infrastructure</li>\r\n	<li>Optimize inventory and new assets purchasing to save cost;</li>\r\n	<li>Improve security&nbsp;by preventing assets from leaving premises and keeping designated assets out of unauthorized areas</li>\r\n	<li>Whole life cycle management to optimize asset usage</li>\r\n	<li>Deliver&nbsp;more timely and transition information for decision making</li>\r\n</ul>\r\n', '', '', '', '', 'pages', 0, 0, '2017-06-30 00:57:52', '0000-00-00 00:00:00', '1', 'about-us'),
(27, 'News Title', 'News Title Chinese', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行业的虚拟文字。 Lorem Ipsum自15世纪15年代以来一直是行业标准的虚拟文本，当时一个未知的打印机拿了一个类型的厨房，并加了一个类型的样本书。 它已经生存了不止五个世纪，而且还跨越了电子排版，基本保持不变。 它在20世纪60年代被普及，并发行了包含Lorem Ipsum段落的Letraset片，最近还有一些桌面出版软件，如Aldus PageMaker，包括Lorem Ipsum的版本。</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,&nbsp;</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行业的虚拟文字。 Lorem Ipsum自15世纪15年代以来一直是行业的标准虚拟文本，</p>\r\n', '262131.jpg', '', 'news', 12, 0, '2017-06-30 04:49:15', '0000-00-00 00:00:00', '1', 'news-title'),
(28, 'News Title 2', 'News Title Chinese 2', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行业的虚拟文字。 Lorem Ipsum自15世纪15年代以来一直是行业标准的虚拟文本，当时一个未知的打印机拿了一个类型的厨房，并加了一个类型的样本书。 它已经生存了不止五个世纪，而且还跨越了电子排版，基本保持不变。 它在20世纪60年代被普及，并发行了包含Lorem Ipsum段落的Letraset片，最近还有一些桌面出版软件，如Aldus PageMaker，包括Lorem Ipsum的版本。</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,&nbsp;</p>\r\n', '<p>Lorem Ipsum只是印刷和排版行业的虚拟文字。 Lorem Ipsum自15世纪15年代以来一直是行业的标准虚拟文本，</p>\r\n', '', '452232.jpg', 'news', 12, 0, '2017-06-30 04:49:57', '0000-00-00 00:00:00', '1', 'news-title-2'),
(29, 'Logistic', '', '', '', '', '', '28674Logistic_banner.jpg', '', 'banners', 0, 0, '2017-07-13 03:23:42', '0000-00-00 00:00:00', '1', 'logistic'),
(30, 'Asset Track', '资产追踪', '<p><strong>What is it?&nbsp; Where is it?When is it?&nbsp;</strong></p>\r\n\r\n<p>Large organizations always face challenges of effectively tracking of assets with real time reporting, it cost a lot of redundancies, expenditures and labor but the result is still not accurate and on time, a reliable, automated asset management system is highly needed to improve it;</p>\r\n\r\n<p><strong>Technology evolution- id palte to RFID</strong></p>\r\n\r\n<p>To solve the problem, traditional way is to use normal label or nameplate to manage assets, this system allowed personnel to more easily identify key items. Of course, one still had to read them individually, and human error in data capture limited effectiveness.</p>\r\n\r\n<p>Nowadays, general bar code automated the process and allowed people to scan individual items using a handheld scanner, however it still wastes time due to one by one visual scanning, RFID is the next generation of technology and allows users to scan multiple items at one time and does not require line of sight. Unlike bar codes, RFID enable personnel to locate tagged items without climbing ladders, crawling under desks, or having to be in direct line of sight.</p>\r\n\r\n<p><strong>Benefits of rfid asset management system</strong>&nbsp;</p>\r\n\r\n<p>By deploying RFID system, benefits are recognized across many departments:</p>\r\n\r\n<ul>\r\n	<li><strong>Accounting &amp; Finance</strong>: enable true cost control and audit-proof inventory. Improve asset accounting with customized and ad hoc reports of asset locations, trends, status, and history.</li>\r\n	<li><strong>IT</strong>: support life cycle management and scale more efficiently</li>\r\n	<li><strong>Facilities &amp; Security</strong>: protect critical information on devices</li>\r\n	<li><strong>Operations</strong>: Quickly locate critical equipment and achieve real-time physical asset inventory.</li>\r\n</ul>\r\n\r\n<p>Overall, Organizations will be benefit on:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Achieve&nbsp;real-time physical inventory&nbsp;of assets to reduce asset loss</li>\r\n	<li>Enhance&nbsp;productivity&nbsp;by remotely monitoring assets and infrastructure</li>\r\n	<li>Optimize inventory and new assets purchasing to save cost;</li>\r\n	<li>Improve security&nbsp;by preventing assets from leaving premises and keeping designated assets out of unauthorized areas</li>\r\n	<li>Whole life cycle management to optimize asset usage</li>\r\n	<li>Deliver&nbsp;more timely and transition information for decision making</li>\r\n</ul>\r\n\r\n<p><strong>Applications</strong></p>\r\n\r\n<p>The solution is utilized used by public and private organizations to solve complex asset management challenges, including the areas of:</p>\r\n\r\n<ul>\r\n	<li>IT asset tracking</li>\r\n	<li>Data center asset tracking</li>\r\n	<li>Healthcare asset tracking</li>\r\n	<li>Oil &amp; gas and utilities</li>\r\n	<li>Public sectory / state and federal agency asset management</li>\r\n	<li>Education assets tracking</li>\r\n	<li>Law enforcement asset tracking</li>\r\n</ul>\r\n', '<p><strong>What is it?&nbsp; Where is it?When is it?&nbsp;</strong></p>\r\n\r\n<p>Large organizations always face challenges of effectively tracking of assets with real time reporting, it cost a lot of redundancies, expenditures and labor but the result is still not accurate and on time, a reliable, automated asset management system is highly needed to improve it;</p>\r\n\r\n<p><strong>Technology evolution- id palte to RFID</strong></p>\r\n\r\n<p>To solve the problem, traditional way is to use normal label or nameplate to manage assets, this system allowed personnel to more easily identify key items. Of course, one still had to read them individually, and human error in data capture limited effectiveness.</p>\r\n\r\n<p>Nowadays, general bar code automated the process and allowed people to scan individual items using a handheld scanner, however it still wastes time due to one by one visual scanning, RFID is the next generation of technology and allows users to scan multiple items at one time and does not require line of sight. Unlike bar codes, RFID enable personnel to locate tagged items without climbing ladders, crawling under desks, or having to be in direct line of sight.</p>\r\n\r\n<p><strong>Benefits of rfid asset management system</strong>&nbsp;</p>\r\n\r\n<p>By deploying RFID system, benefits are recognized across many departments:</p>\r\n\r\n<ul>\r\n	<li><strong>Accounting &amp; Finance</strong>: enable true cost control and audit-proof inventory. Improve asset accounting with customized and ad hoc reports of asset locations, trends, status, and history.</li>\r\n	<li><strong>IT</strong>: support life cycle management and scale more efficiently</li>\r\n	<li><strong>Facilities &amp; Security</strong>: protect critical information on devices</li>\r\n	<li><strong>Operations</strong>: Quickly locate critical equipment and achieve real-time physical asset inventory.</li>\r\n</ul>\r\n\r\n<p>Overall, Organizations will be benefit on:&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Achieve&nbsp;real-time physical inventory&nbsp;of assets to reduce asset loss</li>\r\n	<li>Enhance&nbsp;productivity&nbsp;by remotely monitoring assets and infrastructure</li>\r\n	<li>Optimize inventory and new assets purchasing to save cost;</li>\r\n	<li>Improve security&nbsp;by preventing assets from leaving premises and keeping designated assets out of unauthorized areas</li>\r\n	<li>Whole life cycle management to optimize asset usage</li>\r\n	<li>Deliver&nbsp;more timely and transition information for decision making</li>\r\n</ul>\r\n\r\n<p><strong>Applications</strong></p>\r\n\r\n<p>The solution is utilized used by public and private organizations to solve complex asset management challenges, including the areas of:</p>\r\n\r\n<ul>\r\n	<li>IT asset tracking</li>\r\n	<li>Data center asset tracking</li>\r\n	<li>Healthcare asset tracking</li>\r\n	<li>Oil &amp; gas and utilities</li>\r\n	<li>Public sectory / state and federal agency asset management</li>\r\n	<li>Education assets tracking</li>\r\n	<li>Law enforcement asset tracking</li>\r\n</ul>\r\n', '', '', '', '', 'applications', 0, 0, '2017-07-13 03:31:36', '0000-00-00 00:00:00', '1', 'asset-track');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_postmeta`
--

CREATE TABLE IF NOT EXISTS `tbl_postmeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `post_meta_key` varchar(225) NOT NULL,
  `post_meta_value` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_postmeta`
--

INSERT INTO `tbl_postmeta` (`id`, `post_id`, `post_meta_key`, `post_meta_value`) VALUES
(7, 15, 'related_story', 'a:1:{i:0;s:2:"14";}'),
(8, 15, 'related_product', 'a:2:{i:0;s:2:"10";i:1;s:2:"16";}'),
(9, 22, 'product_file', '11468Crepak_website_design_idea.pptx'),
(10, 22, 'product_file_cn', '11468Crepak_website_design_idea.pptx'),
(11, 23, 'product_file', '89090Crepak_website_design_idea.pptx'),
(12, 23, 'product_file_cn', '96918innerlogo.jpg'),
(13, 25, 'video', 'https://www.youtube.com/watch?v=310abcGOb_I'),
(14, 25, 'video_cn', 'https://www.youtube.com/watch?v=310abcGOb_I');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$08$VSPeb9I.CeeAiPn24qWDdOcZVTRz8dc9pCT7WeBQzVRxlRNa0w4Ka', '', 'admin@admin.com', '', 'rFUnWXQ21qXQL1DTH58nou950be96e55dcb6f755', 1495709919, 'z1jjxrQ4wAwPqylzj0BxiO', 1268889823, 1499930573, 1, 'crepak', 'admin', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
