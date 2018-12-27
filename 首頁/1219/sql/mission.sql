-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018 年 12 月 19 日 07:41
-- 伺服器版本: 8.0.12
-- PHP 版本： 7.2.9RC1

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
-- 資料表結構 `mission`
--

CREATE TABLE `mission` (
  `mission_id` int(11) NOT NULL,
  `mission_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`mission_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `mission`
--
ALTER TABLE `mission`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
