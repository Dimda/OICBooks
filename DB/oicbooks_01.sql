-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2015 年 10 月 20 日 04:37
-- サーバのバージョン: 5.6.27
-- PHP のバージョン: 5.4.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `oicbooks`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `ADDRESS`
--

CREATE TABLE IF NOT EXISTS `ADDRESS` (
  `ADDRESS_ID` int(11) NOT NULL,
  `ADDRESS_STREET` int(11) NOT NULL,
  `ZIP_CODE` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='住所表';

--
-- テーブルのデータをダンプしています `ADDRESS`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `BASKET`
--

CREATE TABLE IF NOT EXISTS `BASKET` (
  `BASKET_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `BASKET_DATE_ADDED` int(11) NOT NULL,
  `BASKET_STATUS_CODE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='カート表';

--
-- テーブルのデータをダンプしています `BASKET`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `BASKET_PRODUCTS`
--

CREATE TABLE IF NOT EXISTS `BASKET_PRODUCTS` (
  `BASKET_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='商品表とカート表を結ぶ表';

--
-- テーブルのデータをダンプしています `BASKET_PRODUCTS`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `BASKET_STATUS`
--

CREATE TABLE IF NOT EXISTS `BASKET_STATUS` (
  `BASKET_STATUS_CODE` int(11) NOT NULL,
  `BASKET_STATUS_DESCRIPTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='カートの状態を格納する表';

--
-- テーブルのデータをダンプしています `BASKET_STATUS`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `CATEGORY_PRODUCT`
--

CREATE TABLE IF NOT EXISTS `CATEGORY_PRODUCT` (
  `PRODUCT_ID` int(11) NOT NULL,
  `CATEGORY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='商品表とカテゴリ表を結ぶ表';

--
-- テーブルのデータをダンプしています `CATEGORY_PRODUCT`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `CUSTOMER`
--

CREATE TABLE IF NOT EXISTS `CUSTOMER` (
  `CUSTOMER_ID` int(11) NOT NULL,
  `GENDER` int(11) NOT NULL,
  `FIRST_NEME` int(11) NOT NULL,
  `LAST_NAME` int(11) NOT NULL,
  `BIRTH_DATE` int(11) NOT NULL,
  `EMAIL_ADDRESS` int(11) NOT NULL,
  `PHONE_NUMBER` int(11) NOT NULL,
  `PASS_WORD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='顧客表';

--
-- テーブルのデータをダンプしています `CUSTOMER`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `ORDER`
--

CREATE TABLE IF NOT EXISTS `ORDER` (
  `ORDER_ID` int(11) NOT NULL,
  `CUSTOMER_ID` int(11) NOT NULL,
  `REFERENCE` int(11) NOT NULL,
  `BILLING_NAME` int(11) NOT NULL,
  `DELIVERY_NAME` int(11) NOT NULL,
  `EMAIL_ADDRESS` int(11) NOT NULL,
  `PURCHASE_DATE` int(11) NOT NULL,
  `ORDER_STATUS_CODE` int(11) NOT NULL,
  `BILLING_ADDRESS_ID` int(11) NOT NULL,
  `DELIVERY_ADDRESS_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='注文表';

--
-- テーブルのデータをダンプしています `ORDER`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `ORDERED_PRODUCT`
--

CREATE TABLE IF NOT EXISTS `ORDERED_PRODUCT` (
  `ORDERED_PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `PRODUCT_NAME` int(11) NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `PRODUCT_TAX` int(11) NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `ORDER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='注文明細表';

--
-- テーブルのデータをダンプしています `ORDERED_PRODUCT`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `ORDER_STATUS`
--

CREATE TABLE IF NOT EXISTS `ORDER_STATUS` (
  `ORDER_STATUS_CODE` int(11) NOT NULL,
  `ORDER_STATUS_DESCRIPTION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='注文の状態を格納する表';

--
-- テーブルのデータをダンプしています `ORDER_STATUS`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `PAY_MENT`
--

CREATE TABLE IF NOT EXISTS `PAY_MENT` (
  `PAY_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='お支払情報表';

--
-- テーブルのデータをダンプしています `PAY_MENT`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `PRODUCT`
--

CREATE TABLE IF NOT EXISTS `PRODUCT` (
  `PRODUCT_ID` int(6) NOT NULL AUTO_INCREMENT,
  `PRODUCT_NAME` text CHARACTER SET utf8 NOT NULL,
  `PRODUCT_PRICE` int(8) NOT NULL,
  `PRODUCTY_DESCRIPTION` text CHARACTER SET utf8 NOT NULL,
  `PRODUCT_DATE_AVAILABLE` int(11) NOT NULL,
  `PRODUCT_CHANGE_DATE` int(11) NOT NULL,
  `TAX_RATE_CODE` int(11) NOT NULL,
  `PUBLISHER_ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `KEYWORD` int(11) NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`),
  KEY `PRODUCT_ID` (`PRODUCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='商品表' AUTO_INCREMENT=100007 ;

--
-- テーブルのデータをダンプしています `PRODUCT`
--

INSERT INTO `PRODUCT` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_PRICE`, `PRODUCTY_DESCRIPTION`, `PRODUCT_DATE_AVAILABLE`, `PRODUCT_CHANGE_DATE`, `TAX_RATE_CODE`, `PUBLISHER_ID`, `ISBN`, `KEYWORD`) VALUES
(100001, 'ダンジョン飯 1巻 (ビームコミックス)', 670, '待ってろドラゴン、ステーキにしてやる! \r\n\r\n九井諒子、初の長編連載。待望の単行本化! \r\nダンジョンの奥深くでドラゴンに襲われ、\r\n金と食料を失ってしまった冒険者・ライオス一行。\r\n再びダンジョンに挑もうにも、このまま行けば、途中で飢え死にしてしまう……。\r\nそこでライオスは決意する「そうだ、モンスターを食べよう! 」\r\nスライム、バジリスク、ミミック、そしてドラゴン!!\r\n襲い来る凶暴なモンスターを食べながら、\r\nダンジョンの踏破を目指せ! 冒険者よ!! \r\n', 0, 0, 0, 0, 0, 0),
(100002, '反応しない練習 あらゆる悩みが消えていくブッダの超・合理的な「考え方」', 1404, '待ってろドラゴン、ステーキにしてやる! \r\n\r\n九井諒子、初の長編連載。待望の単行本化! \r\nダンジョンの奥深くでドラゴンに襲われ、\r\n金と食料を失ってしまった冒険者・ライオス一行。\r\n再びダンジョンに挑もうにも、このまま行けば、途中で飢え死にしてしまう……。\r\nそこでライオスは決意する「そうだ、モンスターを食べよう! 」\r\nスライム、バジリスク、ミミック、そしてドラゴン!!\r\n襲い来る凶暴なモンスターを食べながら、\r\nダンジョンの踏破を目指せ! 冒険者よ!! \r\n', 0, 0, 0, 0, 0, 0),
(100003, 'アクセル・ワールド (19) ―暗黒星雲の引力― (電撃文庫)', 594, '加速世界の≪果て≫――その謎に迫る! \r\n\r\n黒雪姫が卒業してしまう前に、≪加速世界≫の果て――≪ブレイン・バースト≫のクリア条件を知るため、ハルユキはスカイ・レイカーと共に≪帝城≫へと赴いた。\r\n絶対不可侵であるはずのそこには、何故か陽気に二人を迎える黒の剣士、グラファイト・エッジの姿が!?\r\n困惑するハルユキだったが、≪帝城の住人≫トリリード・テトラオキサイドとも合流し、四人+1エネミー(メタトロン)で深部へと進んでいく。\r\nそして、ハルユキはついに知る。七番星『揺光』の神器≪ザ・フラクチュエーティング・ライト≫が≪帝城≫に鎮座する意味を……。\r\n加速世界の謎を知り現実世界へと帰還したハルユキを待っていたのは、最終決戦間近の≪ネガ・ネビュラス≫へと続々集う、頼もしい仲間たちだった。\r\n過去最大のキャラクター&アバターが登場する最新刊!!', 0, 0, 0, 0, 0, 0),
(100004, '日常（10） 特装版 (カドカワコミックス・エース)', 1058, '時定の町にあふれる日常の日々も約10年&10巻に突入！　それを記念して特装版の発売が決定！　雑誌に掲載されたものの、コミックスに収録されなかったエピソードを厳選して収録した特別冊子がついてくる！', 0, 0, 0, 0, 0, 0),
(100005, '進撃の巨人(17) (講談社コミックス)', 463, '巨人がすべてを支配する世界。巨人の餌と化した人類は、巨大な壁を築き、壁外への自由と引き換えに侵略を防いでいた。だが、名ばかりの平和は壁を越える大巨人の出現により崩れ、絶望の闘いが始まってしまう。\r\n\r\n真の王・レイス家が代々継承する巨人の力は、グリシャによりエレンに渡った。ヒストリアは父であるロッド・レイスにエレン殺害を命じられるが、最後は自分の道を選ぶ。そして怒りのままに最大の巨人と化したロッド・レイスが、エレンらに襲い掛かり……! オルブド区外壁にて人類の命運を懸けた一戦が勃発!!', 0, 0, 0, 0, 0, 0),
(100006, '夜桜四重奏~ヨザクラカルテット~(17) (シリウスKC)', 648, 'あの世に送られた比泉分家の恨みの楔・七郷。その開花は世界の破滅を意味する。七郷に対抗する為に考案された最終兵器・零郷。だが、それを成し遂げるには多くの犠牲が必要であった。これは「お役目」を継ぐ比泉家と元老院の伊予家を軸に語られる、零郷を完成させる為に全てを賭けた人々の物語。', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- テーブルの構造 `PRODUCT_IMAGE`
--

CREATE TABLE IF NOT EXISTS `PRODUCT_IMAGE` (
  `PRODUCT_IMAGE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='商品の画像パス';

--
-- テーブルのデータをダンプしています `PRODUCT_IMAGE`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `PRODUCT_SPECIAL`
--

CREATE TABLE IF NOT EXISTS `PRODUCT_SPECIAL` (
  `PROMOTION_CODE` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL,
  `NEW_PRODUCT_PRICE` int(11) NOT NULL,
  `START_DATE` int(11) NOT NULL,
  `EXPIRY_DATE` int(11) NOT NULL,
  PRIMARY KEY (`PROMOTION_CODE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='特別(セール中)の商品価格';

--
-- テーブルのデータをダンプしています `PRODUCT_SPECIAL`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `PUBLISHER_ID`
--

CREATE TABLE IF NOT EXISTS `PUBLISHER_ID` (
  `PUBLISHER_ID` int(11) NOT NULL,
  `PUBLISHER_NAME` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='出版社';

--
-- テーブルのデータをダンプしています `PUBLISHER_ID`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `REVIEW`
--

CREATE TABLE IF NOT EXISTS `REVIEW` (
  `REVIEW_ID` int(11) NOT NULL,
  `REVIEW_RATING` int(11) NOT NULL,
  `REVIEW_READS` int(11) NOT NULL,
  `REVIEW_TEXT` int(11) NOT NULL,
  `REVIEWER` int(11) NOT NULL,
  `PRODUCT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='レビュー表(保留)';

--
-- テーブルのデータをダンプしています `REVIEW`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `TAX_RATE`
--

CREATE TABLE IF NOT EXISTS `TAX_RATE` (
  `TAX_RATE_CODE` int(11) NOT NULL,
  `TAX_CLASS_ID` int(11) NOT NULL,
  `TAX_CLASSLD` int(11) NOT NULL,
  `TAX_PRIORITY` int(11) NOT NULL,
  `TAX_RATE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='消費税';

--
-- テーブルのデータをダンプしています `TAX_RATE`
--


-- --------------------------------------------------------

--
-- テーブルの構造 `ZIP_CODE`
--

CREATE TABLE IF NOT EXISTS `ZIP_CODE` (
  `UNKNOWN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='郵便番号表';

--
-- テーブルのデータをダンプしています `ZIP_CODE`
--

