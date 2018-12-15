-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 09, 2018 at 05:11 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Chaser`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) UNSIGNED NOT NULL COMMENT '優惠券編號',
  `coupon_serno` varchar(50) DEFAULT NULL COMMENT '優惠券序號',
  `discount` float DEFAULT NULL COMMENT '折扣',
  `caniuse` enum('0','1') DEFAULT NULL COMMENT '上下架'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customized_product`
--

CREATE TABLE `customized_product` (
  `cu_product_id` int(11) UNSIGNED NOT NULL COMMENT '客製化商品編號',
  `cu_product_name` varchar(100) DEFAULT NULL COMMENT '客製化商品名稱',
  `cu_product_price` int(11) DEFAULT NULL COMMENT '客製化商品價格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customized_product_cpn`
--

CREATE TABLE `customized_product_cpn` (
  `cpn_id` int(11) UNSIGNED NOT NULL COMMENT '部件編號',
  `cu_product_id` int(11) DEFAULT NULL COMMENT '客製化商品編號',
  `cpn_name` varchar(100) DEFAULT NULL COMMENT '部件名稱',
  `cpn_state` varchar(255) DEFAULT NULL COMMENT '部件說明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customized_product_cpn_atr`
--

CREATE TABLE `customized_product_cpn_atr` (
  `atr_id` int(11) UNSIGNED NOT NULL COMMENT '部件屬性編號',
  `cpn_id` int(11) DEFAULT NULL COMMENT '部件編號',
  `atr_name` varchar(100) DEFAULT NULL COMMENT '部件屬性名稱',
  `atk` tinyint(4) DEFAULT NULL COMMENT '攻擊值',
  `def` tinyint(4) DEFAULT NULL COMMENT '防禦值',
  `dex` tinyint(4) DEFAULT NULL COMMENT '敏捷值',
  `hide` tinyint(4) DEFAULT NULL COMMENT '耐久值',
  `dur` tinyint(4) DEFAULT NULL COMMENT '隱匿值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cu_order`
--

CREATE TABLE `cu_order` (
  `cu_order_id` int(11) UNSIGNED NOT NULL COMMENT '客製訂單編號',
  `cu_product_id` int(11) DEFAULT NULL COMMENT '客製商品編號',
  `total` int(11) DEFAULT NULL COMMENT '總計',
  `mem_id` int(11) NOT NULL COMMENT '會員編號',
  `cu_order_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '訂單時間',
  `cu_order_stat` int(11) DEFAULT NULL COMMENT '訂單狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cu_order`
--

INSERT INTO `cu_order` (`cu_order_id`, `cu_product_id`, `total`, `mem_id`, `cu_order_time`, `cu_order_stat`) VALUES
(1, NULL, 1500000, 2, '2018-12-08 11:50:26', 1),
(2, NULL, 500000, 2, '2018-12-08 11:50:29', 1),
(3, NULL, 2500000, 2, '2018-12-08 11:50:34', 0),
(4, NULL, 100000, 2, '2018-12-08 11:50:38', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cu_order_item`
--

CREATE TABLE `cu_order_item` (
  `cpnr_id` int(11) UNSIGNED NOT NULL COMMENT '部件編號',
  `cu_order_id` int(11) NOT NULL COMMENT '客製化訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cu_order_item_attr`
--

CREATE TABLE `cu_order_item_attr` (
  `atr_id` int(11) UNSIGNED NOT NULL COMMENT '部件屬性編號',
  `cpn_id` int(11) NOT NULL COMMENT '部件編號',
  `cu_order_id` int(11) NOT NULL COMMENT '客製化訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `man_id` int(11) UNSIGNED NOT NULL COMMENT '管理員編號',
  `man_account` varchar(50) DEFAULT NULL COMMENT '管理員帳號',
  `man_password` varchar(32) DEFAULT NULL COMMENT '管理員密碼',
  `man_name` varchar(100) DEFAULT NULL COMMENT '管理員名稱',
  `man_admin` tinyint(4) DEFAULT NULL COMMENT '管理員權限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) UNSIGNED NOT NULL COMMENT '會員編號',
  `mem_name` varchar(100) NOT NULL DEFAULT '' COMMENT '會員姓名',
  `mem_email` varchar(255) NOT NULL DEFAULT '' COMMENT '會員電子郵件',
  `mem_phone` varchar(50) NOT NULL DEFAULT '' COMMENT '會員手機',
  `mem_password` varchar(50) NOT NULL DEFAULT '' COMMENT '會員密碼',
  `mem_image` varchar(255) NOT NULL COMMENT '會員照片',
  `status` enum('Y','N') DEFAULT 'Y' COMMENT '會員狀態 (Y=正常, N=關閉)',
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '建立時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_email`, `mem_phone`, `mem_password`, `mem_image`, `status`, `create_at`) VALUES
(2, 'test', 'test@gmail.com', '0911234567', 'a1f758079fdf65c002cb7fed0ec53a02', '', 'Y', '2018-12-06 16:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_detail_id` int(11) UNSIGNED NOT NULL COMMENT '訂單明細編號',
  `order_id` int(11) DEFAULT NULL COMMENT '訂單編號',
  `product_id` int(11) DEFAULT NULL COMMENT '商品編號',
  `quantity` int(11) DEFAULT NULL COMMENT '商品數量',
  `total` int(11) DEFAULT NULL COMMENT '商品小計'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`order_detail_id`, `order_id`, `product_id`, `quantity`, `total`) VALUES
(1, 1, 1, 1, 3600);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) UNSIGNED NOT NULL COMMENT '訂單編號',
  `total` int(11) UNSIGNED DEFAULT NULL COMMENT '商品小計',
  `grand_total` int(11) UNSIGNED DEFAULT NULL COMMENT '總計',
  `mem_id` int(11) NOT NULL COMMENT '會員編號',
  `coupon_id` int(11) DEFAULT NULL COMMENT '優惠券編號',
  `order_stat` tinyint(4) DEFAULT '0' COMMENT '訂單狀態',
  `order_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '訂單時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `total`, `grand_total`, `mem_id`, `coupon_id`, `order_stat`, `order_time`) VALUES
(1, NULL, 3600, 2, NULL, 0, '2018-10-08 10:30:18'),
(2, NULL, 10000, 2, NULL, 1, '2018-11-08 10:30:18'),
(3, NULL, 6000, 2, NULL, 1, '2018-11-09 10:30:18'),
(4, NULL, 5000, 2, NULL, 0, '2018-11-18 10:30:18'),
(5, NULL, 3600, 2, NULL, 1, '2018-11-20 10:30:18'),
(6, NULL, 2000, 2, NULL, 0, '2018-11-08 10:30:18'),
(7, NULL, 300, 2, NULL, 1, '2018-12-08 10:30:18'),
(8, NULL, 600, 2, NULL, 0, '2018-12-18 10:30:18'),
(9, NULL, 360, 2, NULL, 1, '2018-12-08 10:30:18'),
(10, NULL, 36000, 2, NULL, 0, '2018-12-18 10:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) UNSIGNED NOT NULL COMMENT '商品編號',
  `product_name` varchar(100) DEFAULT NULL COMMENT '商品名稱',
  `product_price` int(11) DEFAULT NULL COMMENT '商品價格',
  `pruduct_image` varchar(100) DEFAULT NULL COMMENT '商品圖片路徑',
  `description` text COMMENT '商品簡介',
  `atk` tinyint(4) DEFAULT NULL COMMENT '攻擊值',
  `def` tinyint(4) DEFAULT NULL COMMENT '防禦值',
  `dex` tinyint(4) DEFAULT NULL COMMENT '敏捷值',
  `dur` tinyint(4) DEFAULT NULL COMMENT '耐久值',
  `hide` tinyint(4) DEFAULT NULL COMMENT '隱匿值'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `pruduct_image`, `description`, `atk`, `def`, `dex`, `dur`, `hide`) VALUES
(1, '箱神', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qrc_ticket`
--

CREATE TABLE `qrc_ticket` (
  `qrc_id` int(11) UNSIGNED ZEROFILL NOT NULL COMMENT '票券編號',
  `t_order_id` int(11) UNSIGNED ZEROFILL DEFAULT NULL COMMENT '票券訂單編號',
  `mem_id` int(11) DEFAULT NULL COMMENT '會員編號',
  `qrc_caniuse` enum('0','1') DEFAULT '0' COMMENT '使用狀態0=未使用, 1=已使用)',
  `qrc_usetime` int(11) DEFAULT NULL COMMENT '使用時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qrc_ticket`
--

INSERT INTO `qrc_ticket` (`qrc_id`, `t_order_id`, `mem_id`, `qrc_caniuse`, `qrc_usetime`) VALUES
(00000000001, 00000000001, 2, '1', NULL),
(00000000002, 00000000001, 2, '0', NULL),
(00000000003, 00000000001, 2, '0', NULL),
(00000000004, 00000000002, 2, '1', NULL),
(00000000005, 00000000003, 2, '0', NULL),
(00000000006, 00000000003, 2, '0', NULL),
(00000000007, 00000000004, 2, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_order`
--

CREATE TABLE `ticket_order` (
  `t_order_id` int(11) UNSIGNED ZEROFILL NOT NULL COMMENT '票券訂單編號',
  `t_order_much` int(11) DEFAULT NULL COMMENT '購買張數',
  `t_order_single_price` int(11) DEFAULT NULL COMMENT '單價',
  `t_order_total_price` int(11) DEFAULT NULL COMMENT '總價',
  `t_order_name` varchar(100) DEFAULT NULL COMMENT '購票人姓名',
  `t_order_tel` varchar(50) DEFAULT NULL COMMENT '購票人電話',
  `t_roder_email` varchar(255) DEFAULT NULL COMMENT '購票人人email',
  `t_order_addtime` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '購票時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket_order`
--

INSERT INTO `ticket_order` (`t_order_id`, `t_order_much`, `t_order_single_price`, `t_order_total_price`, `t_order_name`, `t_order_tel`, `t_roder_email`, `t_order_addtime`) VALUES
(00000000001, 3, 1000, 3000, 'Alice', '3345678', '123@gamail.com', '2018-12-08 16:34:27'),
(00000000002, 1, 1000, 1000, 'Carol', '3345678', '123@gamail.com', '2018-12-08 16:34:27'),
(00000000003, 2, 1000, 2000, 'Doris', '3345678', '123@gamail.com', '2018-12-09 16:35:27'),
(00000000004, 1, 1000, 1000, 'Emily', '3345678', '123@gamail.com', '2018-12-18 16:34:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customized_product`
--
ALTER TABLE `customized_product`
  ADD PRIMARY KEY (`cu_product_id`);

--
-- Indexes for table `customized_product_cpn`
--
ALTER TABLE `customized_product_cpn`
  ADD PRIMARY KEY (`cpn_id`);

--
-- Indexes for table `customized_product_cpn_atr`
--
ALTER TABLE `customized_product_cpn_atr`
  ADD PRIMARY KEY (`atr_id`);

--
-- Indexes for table `cu_order`
--
ALTER TABLE `cu_order`
  ADD PRIMARY KEY (`cu_order_id`);

--
-- Indexes for table `cu_order_item`
--
ALTER TABLE `cu_order_item`
  ADD PRIMARY KEY (`cpnr_id`,`cu_order_id`) USING BTREE;

--
-- Indexes for table `cu_order_item_attr`
--
ALTER TABLE `cu_order_item_attr`
  ADD PRIMARY KEY (`atr_id`,`cpn_id`,`cu_order_id`) USING BTREE;

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`man_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `qrc_ticket`
--
ALTER TABLE `qrc_ticket`
  ADD PRIMARY KEY (`qrc_id`);

--
-- Indexes for table `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD PRIMARY KEY (`t_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '優惠券編號';

--
-- AUTO_INCREMENT for table `customized_product`
--
ALTER TABLE `customized_product`
  MODIFY `cu_product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '客製化商品編號';

--
-- AUTO_INCREMENT for table `customized_product_cpn`
--
ALTER TABLE `customized_product_cpn`
  MODIFY `cpn_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件編號';

--
-- AUTO_INCREMENT for table `customized_product_cpn_atr`
--
ALTER TABLE `customized_product_cpn_atr`
  MODIFY `atr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件屬性編號';

--
-- AUTO_INCREMENT for table `cu_order`
--
ALTER TABLE `cu_order`
  MODIFY `cu_order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '客製訂單編號', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cu_order_item`
--
ALTER TABLE `cu_order_item`
  MODIFY `cpnr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件編號';

--
-- AUTO_INCREMENT for table `cu_order_item_attr`
--
ALTER TABLE `cu_order_item_attr`
  MODIFY `atr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件屬性編號';

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `man_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理員編號';

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '會員編號', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `order_detail_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訂單明細編號', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訂單編號', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品編號', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qrc_ticket`
--
ALTER TABLE `qrc_ticket`
  MODIFY `qrc_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '票券編號', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `t_order_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '票券訂單編號', AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
