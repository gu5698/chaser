-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 12 月 19 日 13:43
-- 伺服器版本: 8.0.12
-- PHP 版本： 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `chaser`
--

-- --------------------------------------------------------

--
-- 資料表結構 `chatbot`
--

CREATE TABLE `chatbot` (
  `no` int(11) NOT NULL,
  `keyword` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `chatbot`
--

INSERT INTO `chatbot` (`no`, `keyword`, `response`) VALUES
(2, '你好,妳好,大家好,hi,hello', '你好，歡迎來到CHASER。'),
(3, '安', '你也安安'),
(4, '蟲鳴', '鳥叫7878787887'),
(5, '幹', '什麼？'),
(6, '你娘卡好', '施主請注意口德'),
(7, '王八蛋', '您老師卡好！你存心找碴麼！！'),
(8, '草枝擺', '莫非閣下就是鼎鼎大名的趕領羊！'),
(9, '機八', '施主！有仇嗎？'),
(10, '基巴', '施主！你需要正能量啊！'),
(11, '藝廊,gallery', '鋼琴內有祕密'),
(12, '宗靖', '104設計毒舌王，噗街夢的台主！強！'),
(13, '喬治掰', '給你相關連結\r\n<a target=\"_blank\" href=\"http://140.115.236.72/demo-personal/CD104/web/O1800253/\">相</a>'),
(14, '景儀', '30公分神人，104神鵰大俠！'),
(15, '鈺鍠', '設計殺手！'),
(16, '經久良服', 'http://140.115.236.72/demo-personal/CD104/web/O1800265/'),
(17, '籃球', 'http://140.115.236.72/demo-personal/CD104/web/O1800251/web1123/index/'),
(18, '行者基因', 'http://140.115.236.72/demo-personal/CD104/web/O1800271/index.html'),
(19, '沒錢', '這是一個除了特務身份外，具備一定資產的人士才可加入的網站。'),
(20, 'FUCO', 'http://140.115.236.72/demo-personal/CD104/web/O1800256/mynewweb/'),
(21, '神鵰大俠', '30公分'),
(22, '講三曉', 'CHASER問候你'),
(23, '問候你全家', 'CHASER也問候你全家'),
(24, '有事嗎', '沒事我先走'),
(25, '優惠券,折扣', '可經由兩種方式獲得折扣碼\r\n1.請參加特務彩蛋任務\r\n2.前往藝廊解開特務隱藏任務'),
(26, '彩蛋,特務彩蛋', '請在首頁打：\r\n\"上上下下左右左右BA\"\r\n即可獲得特務彩蛋任務的獎賞。\r\n請注意！！你~~~\r\n只有五秒鐘！！\r\n逾時即銷毀任務相關的全部資訊。\r\n'),
(27, '任務', '請問您指的是：\r\n1.特務彩蛋\r\n2.藝廊尋寶'),
(28, '尋寶,藝廊尋寶', '請進藝廊畫面裡，\r\n尋找會看似會發聲的物品，\r\n裡面將有我們為你準備測試。\r\n通過測試的人，將獲得CHASER給予的神祕獎勵。'),
(29, '網站', '這是一個為特別的人、\r\n特別的族群，所創立的網站。\r\n您可從這裡買到特殊的物品。\r\n只有特務與具備一定資產的人士，\r\n可經由本網審核後加入會員。\r\n\r\n'),
(30, 'ㄍㄋㄋ,垃圾,廢物', '<img src=\"images/chatbot/whatever.gif\">'),
(31, '拜託,拜偷,霸脫', '<img src=\"images/chatbot/please.gif\">');

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `couponid` int(5) UNSIGNED ZEROFILL NOT NULL,
  `discount` float DEFAULT NULL,
  `promotion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'x',
  `caniuse` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `coupon`
--

INSERT INTO `coupon` (`couponid`, `discount`, `promotion`, `caniuse`) VALUES
(00001, 0.9, 'Happy', 1),
(00012, 0.9, 'x', 1),
(00013, 0.9, 'x', 1),
(00014, 0.9, 'x', 1),
(00015, 0.9, 'x', 1),
(00016, 0.9, 'x', 1),
(00019, 0.9, 'x', 1),
(00020, 0.9, 'x', 1),
(00021, 0.9, 'x', 1),
(00022, 0.9, 'x', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `customized_product`
--

CREATE TABLE `customized_product` (
  `cu_product_id` int(11) UNSIGNED NOT NULL COMMENT '客製化商品編號',
  `cu_product_name` varchar(100) DEFAULT NULL COMMENT '客製化商品名稱',
  `cu_product_price` int(11) DEFAULT NULL COMMENT '客製化商品價格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `customized_product_cpn`
--

CREATE TABLE `customized_product_cpn` (
  `cpn_id` int(11) UNSIGNED NOT NULL COMMENT '部件編號',
  `cu_product_id` int(11) DEFAULT NULL COMMENT '客製化商品編號',
  `cpn_name` varchar(100) DEFAULT NULL COMMENT '部件名稱',
  `cpn_state` varchar(255) DEFAULT NULL COMMENT '部件說明'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `customized_product_cpn_atr`
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
-- 資料表結構 `cu_order`
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
-- 資料表的匯出資料 `cu_order`
--

INSERT INTO `cu_order` (`cu_order_id`, `cu_product_id`, `total`, `mem_id`, `cu_order_time`, `cu_order_stat`) VALUES
(1, NULL, 1500000, 6, '2018-12-08 11:50:26', 1),
(2, NULL, 500000, 6, '2018-12-08 11:50:29', 1),
(3, NULL, 2500000, 6, '2018-12-08 11:50:34', 0),
(4, NULL, 100000, 6, '2018-12-08 11:50:38', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `cu_order_item`
--

CREATE TABLE `cu_order_item` (
  `cpnr_id` int(11) UNSIGNED NOT NULL COMMENT '部件編號',
  `cu_order_id` int(11) NOT NULL COMMENT '客製化訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `cu_order_item_attr`
--

CREATE TABLE `cu_order_item_attr` (
  `atr_id` int(11) UNSIGNED NOT NULL COMMENT '部件屬性編號',
  `cpn_id` int(11) NOT NULL COMMENT '部件編號',
  `cu_order_id` int(11) NOT NULL COMMENT '客製化訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `gallery`
--

CREATE TABLE `gallery` (
  `picid` int(50) UNSIGNED NOT NULL,
  `positionno` int(2) UNSIGNED NOT NULL DEFAULT '0',
  `pictitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `picuser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `piccontent` varchar(350) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `imgname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `upordown` int(1) UNSIGNED NOT NULL DEFAULT '0',
  `addtime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `gallery`
--

INSERT INTO `gallery` (`picid`, `positionno`, `pictitle`, `picuser`, `piccontent`, `imgname`, `upordown`, `addtime`) VALUES
(1, 1, '去妳妹殺豬刀', 'PSD天王阿民', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic01.png', 1, '2018-12-03'),
(2, 2, '古靈精怪槍', '董董天師', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic02.png', 1, '2018-12-03'),
(3, 3, '古靈精怪槍', 'amos', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic03.png', 1, '2018-12-03'),
(4, 4, '古靈精怪槍', '阿摩師', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic04.png', 1, '2018-12-03'),
(5, 5, '古靈精怪槍', '阿善師', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic05.png', 1, '2018-12-03'),
(6, 6, '古靈精怪槍', '阿基師', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic06.png', 1, '2018-12-03'),
(7, 7, '古靈精怪槍', '詩詩詩', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic07.png', 1, '2018-12-03'),
(8, 8, '古靈精怪槍', '流失施', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic08.png', 1, '2018-12-03'),
(9, 9, '古靈精怪槍', '師師劉', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic09.png', 1, '2018-12-03'),
(10, 10, '古靈精怪槍', '師流失', '子曰：「學而時習之，不亦說乎？有朋自遠方來，不亦樂乎？人不知而不慍，不亦君子乎？」有子曰：「其為人也孝弟，而好犯上者，鮮矣；不好犯上，而好作亂者，未之有也。君子務本，本立而道生。孝弟也者，其為仁之本與！」子曰：「巧言令色，鮮矣仁！」曾子曰：「吾日三省吾身：為人謀而不忠乎？與朋友交而不信乎？傳不習乎？」子曰：「道千乘之國：敬事而信，節用而愛人，使民以時。」子曰：「弟子入則孝，出則弟，謹而信，汎愛眾，而親仁。行有餘力，則以學文。」', 'pic01.png', 1, '2018-12-03');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
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
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) UNSIGNED NOT NULL,
  `mem_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mem_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Y','N') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_email`, `mem_phone`, `mem_password`, `mem_image`, `status`, `create_at`) VALUES
(1, '蔡依林', 'aaa@aaa', '0912345678', '111', 'mem1.png', 'Y', '0000-00-00 00:00:00'),
(2, '沈玉琳', 'bbb', '0912345678', '111', 'mem2.png', 'Y', '0000-00-00 00:00:00'),
(3, '周杰倫', 'ccc', '0912345678', '111', 'mem3.png', 'Y', '0000-00-00 00:00:00'),
(4, '鄧紫棋', 'ddd', '0912345678', '111', 'mem4.png', 'Y', '0000-00-00 00:00:00'),
(6, 'test', 'test@gmail.com', '0911234567', '3edf466d2a8fa3875c73467915cda515', 'mem6.png', 'Y', '2018-12-06 16:19:44'),
(7, 'test1', 'bbb@bbb.bbb', '0912345678', '1383734cc13db894a26e184e8e66da87', 'mem7.png', 'N', '2018-12-16 01:27:30'),
(8, '123', '123@gmail.com', '0911111111', '3edf466d2a8fa3875c73467915cda515', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `msgid` int(10) UNSIGNED NOT NULL,
  `msgcontent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `msgdatetime` datetime DEFAULT NULL,
  `msgupordown` int(1) UNSIGNED NOT NULL,
  `picid` int(50) UNSIGNED DEFAULT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`msgid`, `msgcontent`, `msgdatetime`, `msgupordown`, `picid`, `mem_id`) VALUES
(6, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam, fugit nulla. Nisi maxime, quia iusto minus possimus earum placeat, beatae consequatur non, perspiciatis quidem asperiores voluptates cum temporibus accusantium itaque.', '2018-12-05 01:34:18', 1, 1, 2),
(21, 'sssssssssssss3388', '2018-12-05 01:42:09', 1, 1, 1),
(23, '4466', '2018-12-05 01:42:09', 1, 1, 1),
(43, 'ttaaa', '2018-12-04 21:53:35', 1, 1, 1),
(44, 'ttyy', '2018-12-04 21:55:24', 1, 1, 1),
(45, 'gsdgsdgzdcgv7788', '2018-12-04 22:08:17', 1, 1, 1),
(46, 'aaaaaaa', '2018-12-04 22:11:45', 1, 1, 1),
(47, 'bbb', '2018-12-04 22:12:41', 1, 1, 1),
(48, 'adasdas', '2018-12-04 22:13:56', 1, 1, 1),
(49, 'ssss', '2018-12-04 22:19:03', 1, 1, 1),
(50, '88668989', '2018-12-04 22:23:54', 1, 1, 1),
(51, 'sadasdsadfgsg', '2018-12-04 22:29:36', 1, 1, 1),
(52, '88888', '2018-12-04 22:30:52', 1, 1, 1),
(53, 'sdsd', '2018-12-05 05:44:28', 1, 2, 2),
(54, '47578', '2018-12-05 05:44:52', 1, 2, 2),
(55, 'udusauu', '2018-12-04 22:46:01', 1, 2, 1),
(56, 'fdfsdfsd', '2018-12-05 00:38:37', 1, 1, 1),
(57, 'ooooooooo', '2018-12-05 00:44:12', 1, 1, 1),
(58, 'aaaa', '2018-12-05 00:51:16', 1, 1, 1),
(59, 'ssss', '2018-12-05 00:53:04', 1, 1, 1),
(60, 'sdaasdsa', '2018-12-05 00:54:15', 1, 1, 1),
(61, 'bjkgbjk459999', '2018-12-05 00:57:04', 1, 1, 1),
(62, 'aaaaaaaaaa', '2018-12-05 01:01:10', 1, 1, 1),
(63, 'aaaa', '2018-12-05 01:03:22', 1, 1, 1),
(64, 'aaaaaaaaaaaaaaddddddd', '2018-12-05 01:04:13', 1, 1, 1),
(65, '444444455555555555566666666666666666', '2018-12-05 01:12:33', 1, 1, 1),
(66, '測試session', '2018-12-05 08:17:52', 1, 1, 4),
(67, '蔡依林測試測試', '2018-12-05 08:31:21', 1, 1, 1),
(68, '測試測試', '2018-12-05 08:31:57', 1, 2, 1),
(69, '測試測試', '2018-12-05 08:32:56', 1, 1, 3),
(70, '測試測試', '2018-12-05 08:33:15', 1, 4, 3),
(71, '哈哈哈哈哈', '2018-12-05 08:55:29', 1, 4, 3),
(72, 'yayayaya完成也', '2018-12-05 10:06:07', 1, 1, 1),
(73, 'aaaa', '2018-12-05 10:43:51', 1, 1, 1),
(74, 'sdasd', '2018-12-05 10:52:04', 1, 1, 1),
(75, 'ew', '2018-12-05 10:55:10', 1, 1, 1),
(76, 'aaaa', '2018-12-05 12:03:14', 1, 1, 1),
(77, 'aaa', '2018-12-05 12:17:24', 1, 1, 1),
(78, 'aaaaaappp', '2018-12-05 12:20:03', 1, 1, 1),
(79, 'tttttttttttyyyyyyyyyyy', '2018-12-05 12:20:42', 1, 1, 1),
(80, 'aaaaaaaaaa', '2018-12-05 12:23:26', 1, 1, 1),
(81, '5555554545454', '2018-12-05 14:40:15', 1, 1, 1),
(82, 'sdsd', '2018-12-05 14:46:57', 1, 1, 3),
(83, 'ssssssssssssss', '2018-12-05 14:47:24', 1, 4, 3),
(84, 'uityuiytuiyui', '2018-12-05 14:47:36', 1, 2, 3),
(85, 'ooooooooooooooopp', '2018-12-05 23:24:27', 1, 1, 1),
(86, '7777777', '2018-12-05 22:29:04', 1, 1, 1),
(87, 'aaaaaaa', '2018-12-06 09:25:59', 1, 1, 1),
(89, 'aaaaaaaaaaa', '2018-12-06 10:12:35', 1, 1, 1),
(90, 'sdsfsafsaf', '2018-12-06 10:13:04', 1, 4, 1),
(91, 'fdsfsf', '2018-12-06 10:13:44', 1, 4, 1),
(92, 'aaaaaaaaaaaaaaaaaaa', '2018-12-06 10:18:45', 1, 1, 1),
(93, 'ffffffffffffffffff', '2018-12-06 16:13:36', 1, 1, 2),
(94, '111', '2018-12-07 12:04:32', 1, 1, 1),
(96, 'aaaaa', '2018-12-16 01:22:07', 1, 1, 7),
(97, '555555555555555', '2018-12-16 01:30:16', 0, 1, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `mission`
--

CREATE TABLE `mission` (
  `mission_id` int(11) NOT NULL,
  `mission_code` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `atk` int(11) NOT NULL COMMENT '0-10',
  `def` int(11) NOT NULL COMMENT '0-10',
  `dex` int(11) NOT NULL COMMENT '0-10',
  `dur` int(11) NOT NULL COMMENT '0-10',
  `hide` int(11) NOT NULL COMMENT '0-10',
  `x_axis` int(11) NOT NULL COMMENT '0-100',
  `y_axis` int(11) NOT NULL COMMENT '0-100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `mission`
--

INSERT INTO `mission` (`mission_id`, `mission_code`, `content`, `img`, `atk`, `def`, `dex`, `dur`, `hide`, `x_axis`, `y_axis`) VALUES
(2, 'A9F4V', '盡這同他行少考候教此華的業，本是邊手家古：證在頭花不香過下是成隨設部。好數愛克要自的車非詩山全我期過中指們一時，讀我失年費時調司電、什性電上一市細導力影、取金量，是病院像為向天他師經愛還。命樹據花然軍手了機打做不處的民的，一支特！會人提間獎素學，動新斯特險知應議！適學重遊得語。假不票停經算些面人是再指濟人二給藥如量水起臺原該三北下備目，為息時優人是我運題作雨件合你來推能氣也早展沒嚴感書，事種是直沒；樂海以公費時香了到出其當象通著日神時回無事我銀散公學收……院利英前開次料研時好們物腳海片題。', 'mission-1.jpg', 8, 4, 10, 6, 7, 30, 30),
(3, 'V5X6F', '取指多多回洋縣意市變大可院好然有電：設相到指像一一，當師文起了送得……行進顯法重。業人得利政雄臺都平府，大裡星油……名登後常持的多獎文發中的數那：充旅制醫藥許；客當三不，樂座樣如東要心買是細注相，件月這晚中間格而地來把如合，通界他？高此媽特畫書到點，怎種民隨！界刻信。能創否一模場一拉我線員受：風全上代里表應不念說集跑藝立玩是林想水多院害要了！', 'mission-2.jpg', 2, 10, 4, 7, 5, 100, 0),
(4, 'CD9D8', '樣生要簡使紀師會強下盡好。個法許除告那要為裡候帶！一高生式、能說師自點高戰在強為是朋好大仍！園外了覺靜小、年法的想車斷調太夫常處也以……近角而製集天速！西地電人。知東大行對政不十維人生以！受我布園；公市我轉書共信酒語來什安好以家石！足沒我分，當題度朋李案二金公主界時以地！老今孩收做標但新！笑我是：福的有必類獎無語規一一為他寶上、體視速底久能。散的外體學那：天官定打變積之勢市；家人好力親只要人治飯標百流學要程：論界到際。好你容長技自不同選切的市體太要只新觀，由習自方，坐情要過子。能選石高，風我成日品門至問小萬而切例度治', 'mission-3.jpg', 9, 5, 6, 3, 1, 100, 100),
(5, 'W8D1S', '學我不員的；喜朋全明飛地到境以臺家商例所院事但關體！然美雄的：解謝團命氣果面配從山於舞寫化車半體學依學問險果沒公委多，提竟一目讀查年參子它為可絕著人我情？西次天產電生評的人教，高不的我其子教？地她家兩變者的例要，自品子存類雨和要高有是科吃排明多現上性個臺天，引水當書直地指雨王一全到；力終年。理子可見見快著看部。', 'mission-4.jpg', 6, 3, 5, 6, 9, 60, 80);

-- --------------------------------------------------------

--
-- 資料表結構 `orderdetail`
--

CREATE TABLE `orderdetail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orderdetail`
--

INSERT INTO `orderdetail` (`order_detail_id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL,
  `coupon_id` int(11) UNSIGNED DEFAULT NULL,
  `order_stat` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `order_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`order_id`, `total`, `grand_total`, `mem_id`, `coupon_id`, `order_stat`, `order_time`) VALUES
(1, 2000, 1800, 6, NULL, '3', '2018-12-07 16:47:03'),
(2, 2000, 1800, 6, 1, '2', '2018-12-07 16:47:06'),
(3, 2000, 2000, 6, NULL, '1', '2018-12-11 10:23:23');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `atk` tinyint(4) NOT NULL,
  `def` tinyint(4) NOT NULL,
  `dex` tinyint(4) NOT NULL,
  `dur` tinyint(4) NOT NULL,
  `hide` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_image`, `description`, `atk`, `def`, `dex`, `dur`, `hide`) VALUES
(1, '黯然消魂筆', 69, 'item1.png', '鋼筆頭內藏有毒針，可對敵使用-筆身有隱藏按鈕，可啟動錄音功能-看似普通的筆，其實暗藏殺機-內藏針孔攝影機，乃偷拍神氣', 30, 40, 70, 50, 90),
(2, '刺刀牛逼鞋', 168, 'item2.png', '鞋底夾層內藏有刀刃，可傷敵於無形之中-鞋頭乃鋼鐵打造，殺傷驚人-看似普通的鞋，其實暗藏殺機-鞋跟有吹風機功能，一體多用', 40, 50, 75, 70, 85),
(3, '真陰陽眼鏡', 149, 'item3.png', '配戴此眼鏡後，可擁有傳說中的陰陽眼-內有VR系統，在家即可開臨時會議-防塵防垢防紫外線防藍光-具有每個男人夢想中的透視功能', 30, 35, 40, 70, 80),
(4, '無極防彈傘', 100, 'item4.png', '傘身極為堅固，可抵擋暴龍的咬合力-結合太極之力，可將子彈反彈-看似普通的傘，其實防禦驚人-緊急時可當降落傘使用', 30, 90, 75, 80, 50),
(5, '炸彈打火機', 50, 'item5.png', '內含高壓天然氣，增加爆炸威力-火焰溫度高達攝氏1000度-看似普通打火機，其實是手榴彈-純金打造，絕對物超所值', 80, 30, 40, 40, 60),
(6, '一發入魂槍', 199, 'item6.png', '高手可將子彈改為念彈，能靠意念控制-就算內無子彈，還是可發出槍響威攝敵人-槍中之神，槍神才配擁有', 100, 40, 80, 70, 50),
(7, '五屬性魔戒', 133, 'item7.png', '', 70, 90, 70, 80, 70);

-- --------------------------------------------------------

--
-- 資料表結構 `qrc_ticket`
--

CREATE TABLE `qrc_ticket` (
  `qrc_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `t_order_id` int(7) UNSIGNED ZEROFILL DEFAULT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL,
  `qrc_caniuse` int(1) UNSIGNED DEFAULT '1',
  `qrc_usetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `qrc_ticket`
--

INSERT INTO `qrc_ticket` (`qrc_id`, `t_order_id`, `mem_id`, `qrc_caniuse`, `qrc_usetime`) VALUES
(0000000001, 0000002, 1, 1, NULL),
(0000000002, 0000005, 1, 1, NULL),
(0000000003, 0000005, 1, 1, NULL),
(0000000004, 0000005, 1, 1, NULL),
(0000000005, 0000005, 1, 1, NULL),
(0000000006, 0000006, 1, 1, NULL),
(0000000007, 0000006, 1, 1, NULL),
(0000000008, 0000006, 1, 1, NULL),
(0000000009, 0000006, 1, 1, NULL),
(0000000010, 0000006, 1, 1, NULL),
(0000000011, 0000007, 1, 1, NULL),
(0000000012, 0000008, 1, 1, NULL),
(0000000013, 0000008, 1, 0, '2018-12-07 07:34:48'),
(0000000014, 0000008, 1, 0, '2018-12-07 07:36:03'),
(0000000015, 0000008, 1, 1, NULL),
(0000000016, 0000009, 1, 1, NULL),
(0000000017, 0000010, 1, 1, NULL),
(0000000018, 0000010, 1, 0, '2018-12-07 07:38:16'),
(0000000019, 0000010, 1, 1, NULL),
(0000000020, 0000010, 1, 1, NULL),
(0000000021, 0000010, 1, 1, NULL),
(0000000022, 0000010, 1, 1, NULL),
(0000000023, 0000010, 1, 1, NULL),
(0000000024, 0000010, 1, 1, NULL),
(0000000025, 0000010, 1, 1, NULL),
(0000000026, 0000010, 1, 1, NULL),
(0000000027, 0000011, 1, 1, NULL),
(0000000028, 0000012, 1, 1, NULL),
(0000000029, 0000012, 1, 1, NULL),
(0000000030, 0000012, 1, 1, NULL),
(0000000031, 0000012, 1, 1, NULL),
(0000000032, 0000012, 1, 1, NULL),
(0000000033, 0000012, 1, 1, NULL),
(0000000034, 0000012, 1, 0, '2018-12-07 07:43:00'),
(0000000035, 0000013, 1, 1, NULL),
(0000000036, 0000013, 1, 1, NULL),
(0000000037, 0000013, 1, 1, NULL),
(0000000038, 0000013, 1, 1, NULL),
(0000000039, 0000014, 1, 1, NULL),
(0000000040, 0000015, 1, 1, NULL),
(0000000041, 0000016, 1, 1, NULL),
(0000000042, 0000017, 1, 1, NULL),
(0000000043, 0000018, 1, 1, NULL),
(0000000044, 0000019, 1, 1, NULL),
(0000000045, 0000020, 7, 1, NULL),
(0000000046, 0000021, 7, 1, NULL),
(0000000047, 0000022, 7, 1, NULL),
(0000000048, 0000023, 7, 1, NULL),
(0000000049, 0000024, 7, 1, NULL),
(0000000050, 0000024, 7, 1, NULL),
(0000000051, 0000024, 7, 1, NULL),
(0000000052, 0000024, 7, 1, NULL),
(0000000053, 0000024, 7, 1, NULL),
(0000000054, 0000024, 7, 1, NULL),
(0000000055, 0000024, 7, 1, NULL),
(0000000056, 0000024, 7, 1, NULL),
(0000000057, 0000025, 7, 1, NULL),
(0000000058, 0000026, 7, 1, NULL),
(0000000059, 0000027, 7, 1, NULL),
(0000000060, 0000028, 7, 1, NULL),
(0000000061, 0000029, 7, 1, NULL),
(0000000062, 0000030, 7, 1, NULL),
(0000000063, 0000031, 7, 1, NULL),
(0000000064, 0000031, 7, 1, NULL),
(0000000065, 0000031, 7, 1, NULL),
(0000000066, 0000031, 7, 1, NULL),
(0000000067, 0000032, 7, 1, NULL),
(0000000068, 0000033, 7, 1, NULL),
(0000000069, 0000034, 6, 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `report`
--

CREATE TABLE `report` (
  `reportid` int(10) UNSIGNED NOT NULL,
  `reason` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `reportaddtime` datetime NOT NULL,
  `complainid` int(10) UNSIGNED NOT NULL,
  `picid` int(2) UNSIGNED NOT NULL,
  `msgid` int(10) UNSIGNED NOT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `report`
--

INSERT INTO `report` (`reportid`, `reason`, `reportaddtime`, `complainid`, `picid`, `msgid`, `mem_id`) VALUES
(13, '自殺或自殘', '2018-12-05 08:51:39', 2, 2, 54, 2),
(14, '情色', '2018-12-05 08:51:39', 1, 2, 68, 2),
(15, '騷擾', '2018-12-05 08:51:39', 1, 2, 55, 2),
(16, '情色', '2018-12-05 08:53:29', 4, 1, 66, 2),
(17, '情色', '2018-12-05 08:56:01', 1, 1, 67, 3),
(18, '暴力', '2018-12-05 08:56:01', 2, 1, 6, 3),
(19, '騷擾', '2018-12-05 10:51:53', 1, 1, 21, 1),
(22, '自殺或自殘', '2018-12-05 12:02:58', 1, 1, 73, 1),
(23, '自殺或自殘', '2018-12-05 12:23:18', 1, 1, 79, 1),
(24, '自殺或自殘', '2018-12-05 14:40:44', 1, 1, 81, 1),
(25, '暴力', '2018-12-05 14:47:30', 1, 2, 68, 3),
(26, '自殺或自殘', '2018-12-05 14:59:29', 2, 2, 54, 3),
(27, '自殺或自殘', '2018-12-05 14:59:53', 2, 2, 53, 3),
(28, '自殺或自殘', '2018-12-05 15:03:55', 1, 1, 72, 3),
(29, '自殺或自殘', '2018-12-05 15:07:51', 3, 1, 82, 3),
(30, '自殺或自殘', '2018-12-05 15:08:55', 1, 1, 76, 3),
(31, '騷擾', '2018-12-05 15:09:14', 1, 1, 79, 3),
(32, '騷擾', '2018-12-05 15:09:42', 1, 1, 80, 3),
(33, '自殺或自殘', '2018-12-05 15:09:56', 3, 1, 82, 3),
(34, '暴力', '2018-12-05 15:09:56', 2, 1, 6, 3),
(35, '自殺或自殘', '2018-12-05 15:10:55', 1, 1, 65, 3),
(36, '自殺或自殘', '2018-12-05 15:11:13', 1, 1, 80, 3),
(37, '騷擾', '2018-12-05 15:11:59', 1, 1, 76, 3),
(38, '自殺或自殘', '2018-12-05 15:13:35', 3, 1, 82, 3),
(39, '暴力', '2018-12-05 15:13:56', 1, 1, 79, 3),
(40, '騷擾', '2018-12-05 15:15:08', 1, 1, 78, 3),
(41, '自殺或自殘', '2018-12-05 15:15:43', 1, 1, 76, 3),
(42, '情色', '2018-12-05 15:16:08', 1, 1, 75, 3),
(43, '暴力', '2018-12-05 15:16:26', 1, 1, 79, 3),
(44, '暴力', '2018-12-05 22:32:24', 1, 1, 86, 1),
(45, '自殺或自殘', '2018-12-06 10:18:37', 1, 1, 87, 1),
(46, '自殺或自殘', '2018-12-06 10:18:37', 1, 1, 89, 1),
(47, '騷擾', '2018-12-06 10:18:37', 3, 1, 82, 1),
(48, '暴力', '2018-12-06 10:18:37', 3, 1, 82, 1),
(49, '騷擾', '2018-12-06 16:13:28', 1, 1, 92, 2),
(52, '情色', '2018-12-16 01:21:59', 1, 1, 94, 7),
(53, '騷擾', '2018-12-16 01:30:07', 7, 1, 96, 7),
(54, '騷擾', '2018-12-16 17:39:44', 7, 1, 97, 7),
(56, '自殺或自殘', '2018-12-16 17:59:41', 7, 1, 96, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `ticket_order`
--

CREATE TABLE `ticket_order` (
  `t_order_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `t_order_much` int(11) DEFAULT NULL,
  `t_order_single_price` int(11) UNSIGNED DEFAULT NULL,
  `t_order_total_price` int(11) UNSIGNED DEFAULT NULL,
  `t_order_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_order_tel` int(11) UNSIGNED DEFAULT NULL,
  `t_order_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `t_order_addtime` datetime DEFAULT NULL,
  `mem_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `ticket_order`
--

INSERT INTO `ticket_order` (`t_order_id`, `t_order_much`, `t_order_single_price`, `t_order_total_price`, `t_order_name`, `t_order_tel`, `t_order_email`, `t_order_addtime`, `mem_id`) VALUES
(0000002, 1, 420, 420, 'ricky', 9111111, '55@55', '2018-12-07 03:51:25', 1),
(0000003, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-07 04:19:00', 1),
(0000004, 1, 420, 420, '蔡依林sdsads', 4294967295, 'aaa@aaa32131', '2018-12-07 04:19:00', 1),
(0000005, 4, 420, 1680, '蔡依林1111', 912345678, 'aaa@aaa', '2018-12-07 04:29:00', 1),
(0000006, 5, 420, 2100, '蔡依林bbbb', 912345678, 'aaa@aaa', '2018-12-07 04:32:00', 1),
(0000007, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-07 04:49:00', 1),
(0000008, 4, 420, 1680, '蔡依林hhhhhhh', 912345678, 'aaa@aaa', '2018-12-07 04:52:18', 1),
(0000009, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-07 05:50:10', 1),
(0000010, 10, 420, 4200, '蔡依林', 912345678, 'aaa@aaa', '2018-12-07 06:39:33', 1),
(0000011, 1, 420, 420, '蔡依林dafdfsdaf', 91235555, 'aaa@aaaaa', '2018-12-07 07:40:47', 1),
(0000012, 7, 420, 2940, '蔡依林', 912345678, 'aaa@aaa', '2018-12-07 07:41:22', 1),
(0000013, 4, 420, 1680, 'sdsafas', 9, 'aaa@sf', '2018-12-07 11:40:30', 1),
(0000014, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 22:23:55', 1),
(0000015, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 22:32:47', 1),
(0000016, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 22:57:32', 1),
(0000017, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 22:58:34', 1),
(0000018, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 23:15:08', 1),
(0000019, 1, 420, 420, '蔡依林', 912345678, 'aaa@aaa', '2018-12-13 23:23:00', 1),
(0000020, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 01:20:02', 7),
(0000021, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 01:22:35', 7),
(0000022, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 01:31:16', 7),
(0000023, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 01:31:49', 7),
(0000024, 8, 420, 3360, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 02:06:49', 7),
(0000025, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 02:18:59', 7),
(0000026, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 02:25:41', 7),
(0000027, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 14:03:05', 7),
(0000028, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 14:22:17', 7),
(0000029, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 17:59:22', 7),
(0000030, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 18:28:12', 7),
(0000031, 4, 420, 1680, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 18:28:29', 7),
(0000032, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 18:33:25', 7),
(0000033, 1, 420, 420, 'test1', 912345678, 'bbb@bbb.bbb', '2018-12-16 18:40:48', 7),
(0000034, 1, 420, 420, 'test', 911234567, 'test@gmail.com', '2018-12-17 12:24:44', 6);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`couponid`);

--
-- 資料表索引 `cu_order`
--
ALTER TABLE `cu_order`
  ADD PRIMARY KEY (`cu_order_id`);

--
-- 資料表索引 `cu_order_item`
--
ALTER TABLE `cu_order_item`
  ADD PRIMARY KEY (`cpnr_id`,`cu_order_id`) USING BTREE;

--
-- 資料表索引 `cu_order_item_attr`
--
ALTER TABLE `cu_order_item_attr`
  ADD PRIMARY KEY (`atr_id`,`cpn_id`,`cu_order_id`) USING BTREE;

--
-- 資料表索引 `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`picid`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`man_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msgid`),
  ADD KEY `FK_message_gallery` (`picid`),
  ADD KEY `FK_message_member` (`mem_id`);

--
-- 資料表索引 `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`mission_id`);

--
-- 資料表索引 `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `mem_id` (`mem_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- 資料表索引 `qrc_ticket`
--
ALTER TABLE `qrc_ticket`
  ADD PRIMARY KEY (`qrc_id`),
  ADD KEY `FK_qrc_ticket_member` (`mem_id`),
  ADD KEY `FK_qrc_ticket_ticket_order` (`t_order_id`);

--
-- 資料表索引 `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportid`),
  ADD KEY `FK_report_member` (`mem_id`),
  ADD KEY `FK_report_message` (`msgid`),
  ADD KEY `FK_report_gallery` (`picid`);

--
-- 資料表索引 `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD PRIMARY KEY (`t_order_id`),
  ADD KEY `FK_ticket_order_member` (`mem_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `couponid` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表 AUTO_INCREMENT `cu_order`
--
ALTER TABLE `cu_order`
  MODIFY `cu_order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '客製訂單編號', AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `cu_order_item`
--
ALTER TABLE `cu_order_item`
  MODIFY `cpnr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件編號';

--
-- 使用資料表 AUTO_INCREMENT `cu_order_item_attr`
--
ALTER TABLE `cu_order_item_attr`
  MODIFY `atr_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '部件屬性編號';

--
-- 使用資料表 AUTO_INCREMENT `gallery`
--
ALTER TABLE `gallery`
  MODIFY `picid` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `manager`
--
ALTER TABLE `manager`
  MODIFY `man_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '管理員編號';

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `msgid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- 使用資料表 AUTO_INCREMENT `mission`
--
ALTER TABLE `mission`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `qrc_ticket`
--
ALTER TABLE `qrc_ticket`
  MODIFY `qrc_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- 使用資料表 AUTO_INCREMENT `report`
--
ALTER TABLE `report`
  MODIFY `reportid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- 使用資料表 AUTO_INCREMENT `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `t_order_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `FK_message_gallery` FOREIGN KEY (`picid`) REFERENCES `gallery` (`picid`),
  ADD CONSTRAINT `FK_message_member` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);

--
-- 資料表的 Constraints `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FK_orderdetail_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `FK_orderdetail_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- 資料表的 Constraints `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_coupon` FOREIGN KEY (`coupon_id`) REFERENCES `coupon` (`couponid`),
  ADD CONSTRAINT `FK_orders_member` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);

--
-- 資料表的 Constraints `qrc_ticket`
--
ALTER TABLE `qrc_ticket`
  ADD CONSTRAINT `FK_qrc_ticket_member` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`),
  ADD CONSTRAINT `FK_qrc_ticket_ticket_order` FOREIGN KEY (`t_order_id`) REFERENCES `ticket_order` (`t_order_id`);

--
-- 資料表的 Constraints `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `FK_report_gallery` FOREIGN KEY (`picid`) REFERENCES `gallery` (`picid`),
  ADD CONSTRAINT `FK_report_member` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`),
  ADD CONSTRAINT `FK_report_message` FOREIGN KEY (`msgid`) REFERENCES `message` (`msgid`);

--
-- 資料表的 Constraints `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD CONSTRAINT `FK_ticket_order_member` FOREIGN KEY (`mem_id`) REFERENCES `member` (`mem_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
