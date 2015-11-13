-- phpMyAdmin SQL Dump
-- version 3.3.0
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2015 年 10 月 20 日 06:43
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
  `PRODUCT_AUTHOR` text CHARACTER SET utf8,
  `PRODUCT_PRICE` int(8) NOT NULL,
  `PRODUCTY_DESCRIPTION` text CHARACTER SET utf8,
  `PRODUCT_DATE_AVAILABLE` date DEFAULT NULL,
  `PRODUCT_CHANGE_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TAX_RATE_CODE` int(6) NOT NULL,
  `PUBLISHER_ID` int(6) NOT NULL,
  `ISBN` varchar(14) CHARACTER SET utf8 NOT NULL,
  `KEYWORD` text CHARACTER SET utf8,
  PRIMARY KEY (`PRODUCT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='商品表' AUTO_INCREMENT=100023 ;

--
-- テーブルのデータをダンプしています `PRODUCT`
--

INSERT INTO `PRODUCT` (`PRODUCT_ID`, `PRODUCT_NAME`, `PRODUCT_AUTHOR`, `PRODUCT_PRICE`, `PRODUCTY_DESCRIPTION`, `PRODUCT_DATE_AVAILABLE`, `PRODUCT_CHANGE_DATE`, `TAX_RATE_CODE`, `PUBLISHER_ID`, `ISBN`, `KEYWORD`) VALUES
(100007, 'ソードアート・オンライン (16) アリシゼーション・エクスプローディング', '川原礫', 637, 'アリシゼーション編≪アンダーワールド大戦≫、ついに開幕！\r\nキリトを想うアスナの行方は……？\r\n\r\n人界暦三八〇年十一月。\r\nアンダーワールド全土を混沌に巻き込む≪最終負荷実験≫の幕が上がる。\r\n暗黒神ベクタことガブリエル・ミラー率いる侵略軍50,000に対するは、整合騎士ベルクーリ率いる人界守備軍3,000。\r\n≪霜鱗鞭≫のエルドリエ、≪熾焔弓≫のデュソルバート、の副団長・≪天穿剣≫のファナティオら整合騎士は、数的劣勢を跳ね返すべく奮闘を続けるが、敵軍の尖兵たる山ゴブリン族は奸計を用いて防衛線をすり抜け、後方の補給部隊を狙う。心神喪失状態のキリトを守る少女練士ロニエとティーゼに危機が迫る。\r\n更に、侵略軍一の奸智を誇る暗黒術師ギルド総長ディー・アイ・エルもまた、恐るべき大規模術式によって守備軍の殲滅を図る。対する守備軍の総指揮官、整合騎士長ベルクーリがとった作戦とは……。そして、現実世界からアンダーワールドへログインしたアスナの行方は――！', '2015-08-08', '2015-10-20 14:08:26', 1, 1, '978-4048653077', '"ソードアート・オンライン"'),
(100011, 'ダンジョンに出会いを求めるのは間違っているだろうか ', '大森 藤ノ', 670, '大森藤ノ×ヤスダスズヒトのコンビが贈る\r\nGA文庫大賞初の《大賞》受賞作、ここに開幕!!\r\n\r\n迷宮都市オラリオ──『ダンジョン』と通称される壮大な地下迷宮を保有する巨大都市。\r\n未知という名の興奮、輝かしい栄誉、そして可愛い女の子とのロマンス。\r\n人の夢と欲望全てが息を潜めるこの場所で、少年は一人の小さな「神様」に出会った。\r\n「よし、ベル君、付いてくるんだ! 【ファミリア】入団の儀式をやるぞ! 」\r\n「はいっ! 僕は強くなります! 」\r\nどの【ファミリア】にも門前払いだった冒険者志望の少年と、\r\n構成員ゼロの神様が果たした運命の出会い。\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2013-01-16', '2015-10-20 14:45:56', 1, 1, '978-4797372809', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100012, 'ダンジョンに出会いを求めるのは間違っているだろうか 2', '大森 藤ノ', 680, '「初めまして、白髪のお兄さん」\r\nベルに声をかけてきたのは、自ら《サポーター》を名乗る少女・リリだった。\r\n半ば強引にペアを組むことになった少女を不審に思いながらも、\r\n順調にダンジョンを攻略していく二人。\r\n束の間の仲間。\r\n一方で、リリが所属する【ソーマ・ファミリア】には悪い噂が絶えない。\r\nその先には、人の心までも奪うとされる《神酒》の存在が──?\r\n\r\n「神様、僕は……」\r\n「大丈夫、ベル君の異性を見る目は確かなのさ。神のように、きっとね」\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2013-02-16', '2015-10-20 14:54:15', 1, 1, '978-4797373073', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100013, 'ダンジョンに出会いを求めるのは間違っているだろうか 3', '大森 藤ノ', 648, '「……君は、臆病だね」\r\n「!?」\r\n「臆病でいることは冒険で大切なこと。\r\nでもそれ以外にも、君は何かに怯えてる」\r\n\r\n突如憧れの女性【剣姫】アイズと再会を果たしたベル。\r\nそこで突きつけられてしまった事実。\r\n自分を抉る最大の因縁。\r\n紅い紅い、凶悪な猛牛・ミノタウロス。\r\n少年はそんな自分を情けなく思った。\r\nそして少年は初めて思った。\r\n僕は── 英雄になりたい。\r\n\r\n『偉業を成し遂げればいい、\r\n人も、神々さえも讃える功績を』\r\n\r\nこれは、少年が歩み、女神が記す、── 【眷族の物語(ファミリア・ミィス)】──', '2013-05-16', '2015-10-20 15:03:27', 1, 1, '978-4797373622', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100014, 'ダンジョンに出会いを求めるのは間違っているだろうか 4', '大森 藤ノ', 670, '「「「「Lv.2~~~~~~!?」」」」\r\n\r\n先のミノタウロス戦での勝利により、Lv.2到達、世界最速兎(レコードホルダー)となったベル。\r\n一躍オラリオ中の注目・羨望を集めることとなった少年の元には、仲間への勧誘が絶えない。\r\n廻り巡る環境。そんな折――\r\n\r\n「俺と契約しないか、ベル・クラネル?」\r\n偶然にも自身の装備《兎鎧》を創った鍛冶師のヴェルフと出会い、仲間を組むことに。\r\nしかも、彼は圧倒的な力を誇る《魔剣》唯一の創り手らしいのだが……?\r\n\r\n犬人ナァーザ、そして女神ヘスティア、ベルが交わした2つのアナザーエピソードも収録! \r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2013-12-16', '2015-10-20 15:06:11', 1, 1, '978-4797375145', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100015, 'ダンジョンに出会いを求めるのは間違っているだろうか 5', '大森 藤ノ', 702, '「リリ達は囮にされました! すぐにモンスターがやって来ます! 」\r\n「…そんな」\r\n「おいおいっ、冗談だろ?」\r\n鍛冶師のヴェルフを加え中層へと進んだベル達。\r\nしかし他パーティの策略により一転、ダンジョン内で孤立してしまう。 \r\nヘスティアはベルを救うため、Lv.4の元冒険者・リュー、さらには神・ヘルメスと共にダンジョン侵入を試みるが……\r\n「──階層主(ゴライアス)!?」\r\n立ち塞がる最凶の敵が、ベル達を更なる絶望へと追いつめる。\r\n希望を求め、決死行が繰り広げられる、迷宮譚第五弾! \r\n\r\n『限界まで──限界を越えて己を賭けろ』\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2014-05-15', '2015-10-20 15:09:02', 1, 1, '978-4797377149', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100016, 'ダンジョンに出会いを求めるのは間違っているだろうか 6', '大森 藤ノ', 691, '「ヘスティア、君に『戦争遊戯(ウォーゲーム)』を申し込む! 」\r\n「な、なんだとアポロン!?」\r\n\r\n『戦争遊戯(ウォーゲーム)』──対立する神々の派閥が総力戦を行う神の代理戦争。\r\n勝者は敗者の全てを奪う。そして敵神の狙いは──\r\n「君の眷族、ベル・クラネルをもらう! 」\r\n戦争開始まで期限は一週間。\r\n更に追い打ちをかけるように今度はリリが【ソーマ・ファミリア】に捕らえられてしまう!\r\nもはや絶望的な状況。それでも少年と『出会い』、幾多の『冒険』を経た絆が今ここに集結する。\r\n全ては勝利のために!\r\n\r\n『上等だ、アポロン! 僕等は受けて立ってやる、この戦争遊戯(ウォーゲーム)を! 』\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2014-11-14', '2015-10-20 15:15:25', 1, 1, '978-4797380583', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100017, 'ダンジョンに出会いを求めるのは間違っているだろうか 7', '大森 藤ノ', 691, '「ヘスティア、君に『戦争遊戯(ウォーゲーム)』を申し込む! 」\r\n「な、なんだとアポロン!?」\r\n\r\n『戦争遊戯(ウォーゲーム)』──対立する神々の派閥が総力戦を行う神の代理戦争。\r\n勝者は敗者の全てを奪う。そして敵神の狙いは──\r\n「君の眷族、ベル・クラネルをもらう! 」\r\n戦争開始まで期限は一週間。\r\n更に追い打ちをかけるように今度はリリが【ソーマ・ファミリア】に捕らえられてしまう!\r\nもはや絶望的な状況。それでも少年と『出会い』、幾多の『冒険』を経た絆が今ここに集結する。\r\n全ては勝利のために!\r\n\r\n『上等だ、アポロン! 僕等は受けて立ってやる、この戦争遊戯(ウォーゲーム)を! 』\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2015-04-14', '2015-10-20 15:22:03', 1, 1, '978-4797380583', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100018, 'ダンジョンに出会いを求めるのは間違っているだろうか 8', '大森 藤ノ', 788, '──王国(ラキア)軍出兵。\r\n軍神アレス率いる王国軍の突然の来襲。迷宮都市へ進撃する軍勢その数、三万。\r\n迫りくる軍靴の音に、オラリオは──何も変わらなかった。\r\n\r\n「せっかくだし、たまにはベル君達には羽を伸ばしてもらうさ」\r\n強過ぎる冒険者達の手によって市壁の外で侵略者達の悲鳴が上がる中、オラリオは平穏な日々を過ごしてゆく。\r\n\r\n小人族(パルゥム)の求婚、愛しのボディガード、街娘の秘密、神々への恋歌──そして女神が紡ぐ愛の歌。\r\n神と子供達が送るささやかな日常編! \r\n「ボクはずっと君の側にいるよ、ベル君」\r\n\r\nこれは、少年が歩み、女神が記す、\r\n── 【眷族の物語(ファミリア・ミィス)】──', '2015-06-12', '2015-10-20 15:25:12', 1, 1, '978-4797383140', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100019, 'ダンジョンに出会いを求めるのは間違っているだろうか 9', '大森 藤ノ', 691, '「モンスター……ヴィーヴル?」\r\n\r\n新たなダンジョン階層域『大樹の迷宮』に進出したベルは、竜の少女ウィーネと出会う。\r\n人語を話し、人からも怪物からも襲われる孤独な少女を保護することを決めるのだが……。\r\n\r\n「竜女か──久々の上玉だ」\r\n忍び寄る暴悪の狩猟者達の魔の手、覆すことのできない人と怪物の軋轢、そして動き出すギルドの真の主。\r\n一匹の竜の少女を巡り、都市に波乱がもたらされる。\r\n\r\n人と怪物、神々を揺るがす異常事態──ダンジョンの異変に迫る迷宮譚第九弾! \r\n「ベル……大好き」\r\n\r\nこれは、少年が歩み、女神が記す、\r\n──【眷族の物語(ファミリア・ミィス)】──', '2015-09-12', '2015-10-20 15:26:50', 1, 1, '978-4797385007', '"ダンジョンに出会いを求めるのは間違っているだろうか"'),
(100020, 'ソードアート・オンライン〈1〉アインクラッド', '川原 礫', 637, 'クリアするまで脱出不可能、ゲームオーバーは本当の“死”を意味する―。謎の次世代MMO『ソードアート・オンライン(SAO)』の“真実”を知らずにログインした約一万人のユーザーと共に、その苛酷なデスバトルは幕を開けた。SAOに参加した一人である主人公・キリトは、いち早くこのMMOの“真実”を受け入れる。そして、ゲームの舞台となる巨大浮遊城『アインクラッド』で、パーティーを組まないソロプレイヤーとして頭角をあらわしていった。クリア条件である最上階層到達を目指し、熾烈な冒険を単独で続けるキリトだったが、レイピアの名手・女流剣士アスナの強引な誘いによって彼女とコンビを組むことに。その出会いは、キリトに運命とも呼べる契機をもたらし―。個人サイト上で閲覧数650万PVオーバーを記録した伝説の小説が登場。', '2009-04-10', '2015-10-20 15:35:53', 1, 1, '978-4048677608', '"ソードアート・オンライン"'),
(100021, 'ソードアート・オンライン〈2〉アインクラッド', '川原 礫', 637, 'クリアするまで脱出不可能のデスバトルMMO『ソードアート・オンライン』に接続した主人公・キリト。最上階層を目指す“攻略組”の彼以外にも、様々な職業や考え方を持つプレイヤーがそこには存在していた。彼女たちはログアウト不可能という苛烈な状況下でも、生き生きと暮らし、喜び笑い、そして時には泣いて、ただ“ゲーム”を楽しんでいた。“ビーストテイマー”のシリカ、“鍛冶屋”の女店主・リズベット、謎の幼女・ユイ、そして黒い剣士が忘れることの出来ない少女・サチ―。ソロプレイヤー・キリトが彼女たちと交わした、四つのエピソードを、今紐解く。', '2009-08-10', '2015-10-20 15:38:12', 1, 1, '978-4048679350', '"ソードアート・オンライン"'),
(100022, 'ソードアート・オンライン〈3〉フェアリィ・ダンス', '川原 礫', 616, '禁断のデスバトルMMO『ソードアート・オンライン』から現実世界に戻ってきたキリト。彼は攻略パートナーであり、想い人でもあるアスナのもとに向かう。しかし、結城明日奈は、あの悪夢のゲームからまだ帰還していなかった。困惑と絶望に包まれるキリト。唯一の手がかりは、鳥篭の中で佇む“妖精姿”のアスナという謎の画像データのみ。どうやら彼女は、高スペックVRMMO“アルヴヘイム・オンライン”というゲーム内に囚われているらしい。キリトはアスナを救うため、飛翔する妖精プレイヤーたちが交錯する“ALO”に飛び込んでいく…!!WEB上でも屈指の人気を誇った『フェアリィ・ダンス』編、スタート。', '2009-12-10', '2015-10-20 15:41:00', 1, 1, '978-4048681933', '"ソードアート・オンライン"');

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

