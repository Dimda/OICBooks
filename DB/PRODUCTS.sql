-- phpMyAdmin SQL Dump
-- version 4.4.14.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015 年 10 月 10 日 15:13
-- サーバのバージョン： 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Webshop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `PRODUCTS` (
  `PRODUCT_ID` int(6) NOT NULL,
  `PRODUCT_NAME` text CHARACTER SET utf8 NOT NULL,
  `PRICE` int(5) NOT NULL,
  `DESCRITPION` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100004 DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `PRODUCTS`
--

INSERT INTO `PRODUCTS` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRICE`, `DESCRITPION`) VALUES
(100001, 'ダンジョン飯 1巻 (ビームコミックス)', 670, '待ってろドラゴン、ステーキにしてやる! \r\n\r\n九井諒子、初の長編連載。待望の単行本化! \r\nダンジョンの奥深くでドラゴンに襲われ、\r\n金と食料を失ってしまった冒険者・ライオス一行。\r\n再びダンジョンに挑もうにも、このまま行けば、途中で飢え死にしてしまう……。\r\nそこでライオスは決意する「そうだ、モンスターを食べよう! 」\r\nスライム、バジリスク、ミミック、そしてドラゴン!!\r\n襲い来る凶暴なモンスターを食べながら、\r\nダンジョンの踏破を目指せ! 冒険者よ!! \r\n'),
(100002, '反応しない練習 あらゆる悩みが消えていくブッダの超・合理的な「考え方」', 1404, '待ってろドラゴン、ステーキにしてやる! \r\n\r\n九井諒子、初の長編連載。待望の単行本化! \r\nダンジョンの奥深くでドラゴンに襲われ、\r\n金と食料を失ってしまった冒険者・ライオス一行。\r\n再びダンジョンに挑もうにも、このまま行けば、途中で飢え死にしてしまう……。\r\nそこでライオスは決意する「そうだ、モンスターを食べよう! 」\r\nスライム、バジリスク、ミミック、そしてドラゴン!!\r\n襲い来る凶暴なモンスターを食べながら、\r\nダンジョンの踏破を目指せ! 冒険者よ!! \r\n'),
(100003, 'アクセル・ワールド (19) ―暗黒星雲の引力― (電撃文庫)', 594, '加速世界の≪果て≫――その謎に迫る! \r\n\r\n黒雪姫が卒業してしまう前に、≪加速世界≫の果て――≪ブレイン・バースト≫のクリア条件を知るため、ハルユキはスカイ・レイカーと共に≪帝城≫へと赴いた。\r\n絶対不可侵であるはずのそこには、何故か陽気に二人を迎える黒の剣士、グラファイト・エッジの姿が!?\r\n困惑するハルユキだったが、≪帝城の住人≫トリリード・テトラオキサイドとも合流し、四人+1エネミー(メタトロン)で深部へと進んでいく。\r\nそして、ハルユキはついに知る。七番星『揺光』の神器≪ザ・フラクチュエーティング・ライト≫が≪帝城≫に鎮座する意味を……。\r\n加速世界の謎を知り現実世界へと帰還したハルユキを待っていたのは、最終決戦間近の≪ネガ・ネビュラス≫へと続々集う、頼もしい仲間たちだった。\r\n過去最大のキャラクター&アバターが登場する最新刊!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PRODUCTS`
--
ALTER TABLE `PRODUCTS`
  MODIFY `PRODUCT_ID` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
