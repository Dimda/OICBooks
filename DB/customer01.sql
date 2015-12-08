-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 12 朁E08 日 08:17
-- サーバのバージョン： 5.5.40
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `oicbooks`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`CUSTOMER_ID` int(8) NOT NULL,
  `FIRST_NAME` varchar(20) CHARACTER SET sjis DEFAULT NULL,
  `LAST_NAME` varchar(20) CHARACTER SET sjis DEFAULT NULL,
  `FURIGANA` varchar(100) CHARACTER SET sjis DEFAULT NULL,
  `SEX` varchar(5) DEFAULT NULL,
  `BIRTH_DATE` date DEFAULT NULL,
  `EMAIL_ADDRESS` varchar(50) DEFAULT NULL,
  `PHONE_NUMBER` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `BANK_NUMBER` varchar(7) NOT NULL,
  `CREDIT_NUMBER` varchar(16) NOT NULL,
  `EXPIRATION_DATE` date NOT NULL,
  `SEQURE_CODE` varchar(3) NOT NULL,
  `ZIP_CODE` varchar(7) DEFAULT NULL,
  `ADDRESS_STREET_1` varchar(50) CHARACTER SET sjis DEFAULT NULL COMMENT '例：大阪府大阪市',
  `ADDRESS_STREET_2` varchar(50) CHARACTER SET sjis NOT NULL COMMENT '例：天王寺区○○',
  `ADDRESS_STREET_3` varchar(50) CHARACTER SET sjis NOT NULL COMMENT '例：xxマンション701',
  `EMAIL_PERMIT` tinyint(1) DEFAULT NULL,
  `WITHDRAWAL` tinyint(1) DEFAULT NULL,
  `POINT` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COMMENT='顧客表';

--
-- テーブルのデータのダンプ `customer`
--

INSERT INTO `customer` (`CUSTOMER_ID`, `FIRST_NAME`, `LAST_NAME`, `FURIGANA`, `SEX`, `BIRTH_DATE`, `EMAIL_ADDRESS`, `PHONE_NUMBER`, `PASSWORD`, `BANK_NUMBER`, `CREDIT_NUMBER`, `EXPIRATION_DATE`, `SEQURE_CODE`, `ZIP_CODE`, `ADDRESS_STREET_1`, `ADDRESS_STREET_2`, `ADDRESS_STREET_3`, `EMAIL_PERMIT`, `WITHDRAWAL`, `POINT`) VALUES
(1, '田中', '次郎', 'ﾀﾅｶｼﾞﾛｳ', 'MAN', '1994-05-11', 'oicbooks3@gmail.com', '09012345678', '1234', '1234567', '1234567812345678', '2020-11-11', '000', '1540014', '東京都', '世田谷区新町3丁目51番地', '', 0, 0, 100),
(2, '佐藤', '太郎', 'ｻﾄｳﾀﾛｳ', 'MAN', '1990-04-10', 'oicbooks01@gmail.com', '09001234567', '0123', '0123456', '0123456789012345', '2024-10-10', '111', '5798048', '大阪府', '東大阪市旭町１丁目1番地', '', 0, 0, 100),
(4, '山下', '卓郎', 'ﾔﾏｼﾀﾀｸﾛｳ', 'MAN', '1990-04-20', 'oicbooks02@gmail.com', '09023456789', '1234', '4567891', '1234567890123456', '2024-10-20', '222', '5770053', '大阪府', '東大阪市高井田2丁目2番地', '', 0, 0, 100),
(5, '橋本', '一郎', 'ﾊｼﾓﾄｲﾁﾛｳ', 'MAN', '1990-04-30', 'oicbooks03@gmail.com', '09034567890', '2345', '2345678', '2345678901234567', '2024-10-30', '333', '5800043', '大阪府', '松原市阿保3丁目3番地', '', 0, 0, 100),
(6, '高橋', '茜', 'ﾀｶﾊｼｱｶﾈ', 'WOMAN', '1991-05-01', 'oicbooks04@gmail.com', '09045678901', '3456', '3456789', '3456789012345678', '2024-08-20', '444', '5430031', '大阪府', '大阪市天王寺区石ヶ辻町1丁目1番地', '', 0, 0, 100),
(7, '大橋', '由香里', 'ｵｵﾊｼﾕｶﾘ', 'WOMAN', '1980-06-20', 'oicbooks05@gmail.com', '09056789012', '4567', '5678901', '4567890123456789', '2019-07-20', '555', '3440126', '埼玉県', '春日部市赤崎2丁目2番地', '', 0, 0, 100),
(8, '一二三', '五郎', 'ﾋﾌﾐｺﾞﾛｳ', 'MAN', '1960-01-23', 'oicbooks06@gmail.com', '09067890123', '5678', '6789012', '5678901234567890', '2025-01-20', '666', '0620912', '北海道', '札幌市豊平区水車町5丁目3番地', '', 0, 0, 100),
(9, '木村', '聡史', 'ｷﾑﾗｻﾄｼ', 'MAN', '1970-12-08', 'oicbooks07@gmail.com', '09078901234', '6789', '7890123', '6789012345678910', '2022-03-09', '777', '0301502', '青森県', '東津軽郡今別町2丁目2番地', '', 100, 0, NULL),
(10, '下村', '若菜', 'ｼﾓﾑﾗﾜｶﾅ', 'WOMAN', '1995-09-25', 'oicbooks07@gmail.com', '09089012345', '7890', '8901234', '7890123456789012', '2022-05-10', '888', '0286103', '岩手県', '二戸市石切所3丁目2番地', '', 0, 0, 100),
(11, '井上', '友理奈', 'ｲﾉｳｴﾕﾘﾅ', 'WOMAN', '1985-07-14', 'oicbooks08@gmail.com', '09090123456', '8901', '9012345', '8901234567890123', '2025-04-10', '999', NULL, NULL, '', '', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`CUSTOMER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `CUSTOMER_ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
