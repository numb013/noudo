-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 1 朁E24 日 06:34
-- サーバのバージョン： 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nodo`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `text` text NOT NULL,
  `image_flag` varchar(255) DEFAULT NULL COMMENT '画像フラグ',
  `delete_flag` int(11) DEFAULT '0' COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `text`, `image_flag`, `delete_flag`, `created`, `modified`) VALUES
(1, 'About', '人間の脳が熱に耐えられず溶けだす温度は[42℃]だといわれている。 私達は『接する人の脳を限界値42℃まで上げるような服つくり』をかかげ、中央に4と2をかけあわせたブレインアイコンでそれを示めす。 決められたパズルをはめていく様な、忠実な日常ではもの足らず歪んでライフアウトしていく日々。 アートに満ちた興奮と虚しさの中に生きる衣服を提案する。', '1', 0, '2018-01-24 06:29:50', '2018-01-24 06:29:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `collections`
--

CREATE TABLE `collections` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `text` text COMMENT '内容',
  `image_flag` varchar(255) DEFAULT NULL COMMENT '画像フラグ',
  `delete_flag` int(11) DEFAULT '0' COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `collections`
--

INSERT INTO `collections` (`id`, `title`, `text`, `image_flag`, `delete_flag`, `created`, `modified`) VALUES
(1, 'dddd', 'ddddd', '1', 0, '2018-01-16 07:12:34', '2018-01-17 06:47:42'),
(2, 'dddd', 'ddddd', '1', 0, '2018-01-16 07:32:14', '2018-01-16 07:32:14'),
(3, 'dddd', NULL, '1', 0, '2018-01-17 06:37:14', '2018-01-17 06:37:14');

-- --------------------------------------------------------

--
-- テーブルの構造 `contcts`
--

CREATE TABLE `contcts` (
  `id` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL COMMENT '名前',
  `email` varchar(255) NOT NULL COMMENT 'アドレス',
  `body` text COMMENT '内容',
  `delete_flag` int(11) DEFAULT NULL COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `genres`
--

CREATE TABLE `genres` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'ジャンル名',
  `delete_flag` varchar(255) NOT NULL DEFAULT '0' COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `genres`
--

INSERT INTO `genres` (`id`, `name`, `delete_flag`, `created`, `modified`) VALUES
(4, 'アウター', '0', '2018-01-16 06:04:05', '2018-01-16 06:04:05'),
(5, 'トレーナー', '0', '2018-01-16 06:04:12', '2018-01-16 06:04:12');

-- --------------------------------------------------------

--
-- テーブルの構造 `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `partner_id` int(10) DEFAULT NULL,
  `partner_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delete_flag` int(11) NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `images`
--

INSERT INTO `images` (`id`, `partner_id`, `partner_name`, `name`, `url`, `delete_flag`, `created`, `modified`) VALUES
(87, 10, 'Item', 'download.jpg', '/files/updir/20180116060109_0.jpeg', 0, '2018-01-16 06:01:15', '2018-01-16 06:01:15'),
(88, 10, 'Item', 'img3.jpg', '/files/updir/20180116060109_1.jpeg', 1, '2018-01-16 06:01:15', '2018-01-16 06:01:15'),
(89, 11, 'Item', 'sam-01-11-0.png', '/files/updir/20180116063317_0.png', 1, '2018-01-16 06:33:22', '2018-01-16 06:33:22'),
(90, 1, 'Collection', 'sam-01-10-0.gif', '/files/updir/20180116071232_0.gif', 0, '2018-01-16 07:12:34', '2018-01-16 07:12:34'),
(91, 1, 'Collection', '331x229x004d0244f89e1d9c870f24b5.gif', '/files/updir/20180116071232_1.gif', 1, '2018-01-16 07:12:34', '2018-01-16 07:12:34'),
(92, 1, 'Collection', 'download.jpg', '/files/updir/20180116071232_2.jpeg', 0, '2018-01-16 07:12:34', '2018-01-16 07:12:34'),
(93, 1, 'Collection', 'download.png', '/files/updir/20180116071232_3.png', 0, '2018-01-16 07:12:34', '2018-01-16 07:12:34'),
(94, 2, 'Collection', '2d9182724_0.jpg', '/files/updir/20180116072748_0.jpeg', 0, '2018-01-16 07:32:15', '2018-01-16 07:32:15'),
(95, 11, 'Item', '201608291dfsf82724_0.jpg', '/files/updir/20180116073939_0.jpeg', 1, '2018-01-16 07:39:42', '2018-01-16 07:39:42'),
(96, 1, 'Collection', '201sfasd60829sw182724_0.jpg', '/files/updir/20180116111532_0.jpeg', 0, '2018-01-16 11:15:36', '2018-01-16 11:15:36'),
(97, 1, 'Collection', '3701ed12302585.562661e587402.jpg', '/files/updir/20180116111532_1.jpeg', 0, '2018-01-16 11:15:36', '2018-01-16 11:15:36'),
(98, 1, 'Collection', '201608sdfasdf2918ddd2724_0.jpg', '/files/updir/20180116111532_2.jpeg', 0, '2018-01-16 11:15:36', '2018-01-16 11:15:36'),
(99, 11, 'Item', '2724_0.jpg', '/files/updir/20180116114751_0.jpeg', 1, '2018-01-16 11:47:58', '2018-01-16 11:47:58'),
(100, 11, 'Item', '3701ed12302585.562661e587402.jpg', '/files/updir/20180116114751_1.jpeg', 1, '2018-01-16 11:47:58', '2018-01-16 11:47:58'),
(101, 11, 'Item', '201608sdfasdf2918ddd2724_0.jpg', '/files/updir/20180116114751_2.jpeg', 1, '2018-01-16 11:47:58', '2018-01-16 11:47:58'),
(102, 11, 'Item', '2016082sdff9182724_0.jpg', '/files/updir/20180116114751_3.jpeg', 0, '2018-01-16 11:47:58', '2018-01-16 11:47:58'),
(103, 11, 'Item', '2016082sdfsdf9182724_0.jpg', '/files/updir/20180116114751_4.jpeg', 1, '2018-01-16 11:47:58', '2018-01-16 11:47:58'),
(104, 12, 'Item', '2d9182724_0.jpg', '/files/updir/20180117050643_0.jpeg', 1, '2018-01-17 05:06:59', '2018-01-17 05:06:59'),
(105, 12, 'Item', '2s4_0.jpg', '/files/updir/20180117050643_1.jpeg', 1, '2018-01-17 05:06:59', '2018-01-17 05:06:59'),
(106, 12, 'Item', '20d182724_0.jpg', '/files/updir/20180117050643_3.jpeg', 1, '2018-01-17 05:06:59', '2018-01-17 05:06:59'),
(107, 12, 'Item', '201608sdfasdf2918ddd2724_0.jpg', '/files/updir/20180117060021_0.jpeg', 0, '2018-01-17 06:00:28', '2018-01-17 06:00:28'),
(108, 12, 'Item', '2016082sdfsdf9182724_0.jpg', '/files/updir/20180117060021_1.jpeg', 1, '2018-01-17 06:00:28', '2018-01-17 06:00:28'),
(109, 12, 'Item', '20160829ASFAS182724_0.jpg', '/files/updir/20180117060021_2.jpeg', 1, '2018-01-17 06:00:28', '2018-01-17 06:00:28'),
(110, 3, 'Collection', '2724_0.jpg', '/files/updir/20180117063710_0.jpeg', 0, '2018-01-17 06:37:14', '2018-01-17 06:37:14'),
(111, 3, 'Collection', '3701ed12302585.562661e587402.jpg', '/files/updir/20180117063710_1.jpeg', 0, '2018-01-17 06:37:14', '2018-01-17 06:37:14'),
(112, 3, 'Collection', '201608sdfasdf2918ddd2724_0.jpg', '/files/updir/20180117063710_2.jpeg', 0, '2018-01-17 06:37:14', '2018-01-17 06:37:14'),
(113, 12, 'Item', 'voice82724_0.jpg', '/files/updir/20180117090917_0.jpeg', 0, '2018-01-17 09:09:20', '2018-01-17 09:09:20'),
(114, 12, 'Item', '20160829ASFAS182724_0.jpg', '/files/updir/20180117090917_1.jpeg', 0, '2018-01-17 09:09:20', '2018-01-17 09:09:20'),
(115, 12, 'Item', '91sssss2724_0.jpg', '/files/updir/20180117090917_2.jpeg', 0, '2018-01-17 09:09:20', '2018-01-17 09:09:20'),
(116, 10, 'Item', '272dsdsd4_0.jpg', '/files/updir/20180118113544_0.jpeg', 0, '2018-01-18 11:35:47', '2018-01-18 11:35:47'),
(117, 10, 'Item', '20sfd724_0.jpg', '/files/updir/20180118113544_1.jpeg', 0, '2018-01-18 11:35:47', '2018-01-18 11:35:47'),
(118, 10, 'Item', '20d182724_0.jpg', '/files/updir/20180118113544_2.jpeg', 0, '2018-01-18 11:35:47', '2018-01-18 11:35:47'),
(119, 10, 'Item', '2s4_0.jpg', '/files/updir/20180118113544_3.jpeg', 0, '2018-01-18 11:35:47', '2018-01-18 11:35:47'),
(120, 10, 'Item', '2d9182724_0.jpg', '/files/updir/20180118113544_4.jpeg', 0, '2018-01-18 11:35:47', '2018-01-18 11:35:47'),
(121, 1, 'Topimage', '2724_0.jpg', '/files/updir/20180124054059_0.jpeg', 0, '2018-01-24 05:41:01', '2018-01-24 05:41:01'),
(122, 2, 'Topimage', '201608291sdfasdf8ddd2724_0.jpg', '/files/updir/20180124054745_0.jpeg', 0, '2018-01-24 05:47:49', '2018-01-24 05:47:49'),
(123, 0, 'About', '20d182724_0.jpg', '/files/updir/20180124061841_0.jpeg', 0, '2018-01-24 06:18:44', '2018-01-24 06:18:44'),
(124, 0, 'About', '201608sdfasdf2918ddd2724_0.jpg', '/files/updir/20180124062720_0.jpeg', 0, '2018-01-24 06:27:23', '2018-01-24 06:27:23'),
(125, 1, 'About', 'sss4_0.jpg', '/files/updir/20180124062924_0.jpeg', 0, '2018-01-24 06:29:50', '2018-01-24 06:29:50');

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `image_flag` varchar(255) DEFAULT NULL COMMENT '画像フラグ',
  `price` int(11) DEFAULT NULL,
  `genre` int(10) DEFAULT NULL,
  `item_genre` varchar(11) DEFAULT NULL,
  `sale_type` int(10) DEFAULT NULL,
  `season` varchar(255) DEFAULT NULL,
  `ec_shop_code` text,
  `sale_flag` int(10) DEFAULT NULL,
  `discount` int(10) DEFAULT NULL,
  `pick_up_item` int(11) DEFAULT NULL,
  `item_text` text,
  `delete_flag` varchar(10) DEFAULT '0' COMMENT '削除',
  `created` datetime DEFAULT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`id`, `title`, `image_flag`, `price`, `genre`, `item_genre`, `sale_type`, `season`, `ec_shop_code`, `sale_flag`, `discount`, `pick_up_item`, `item_text`, `delete_flag`, `created`, `modified`) VALUES
(10, 'あああ', '1', 17000, 5, '1', 0, '1', '                                    <form method=\"post\" action=\"//cart.ec-sites.jp/cart_step2/pc/pk00/\">\r\n                                    Size<select name=\"es_simple_attr_sel[]\" style=\"vertical-align:middle\">\r\n                                    <option value=\"0\">M</option>\r\n                                    <option value=\"1\">L</option>\r\n                                    <option value=\"2\">XL(soldout)</option>\r\n                                    </select>\r\n\r\n                                    <input type=\"hidden\" name=\"es_charset\" value=\"sjis\">\r\n\r\n                                    <input type=\"hidden\" name=\"es_item_id\" value=\"90\">\r\n                                    <input type=\"hidden\" name=\"es_shop_id\" value=\"5375\">\r\n                                    <input type=\"hidden\" name=\"es_stock_attr_flag\" value=\"0\">\r\n                                    <input type=\"submit\" name=\"es_submit\" value=\"カゴに入れる\" >\r\n                                    </form>', 0, NULL, 0, '【ヨシフ・スターリン(1873-1953)】の生い立ちがソースとなり生まれたプルオーバー。\r\n\r\n\r\n若い頃は、神学校での勉学に励み信仰心に溢れた少年だったが、やがて殺人や強盗などの犯罪を含む革命行動を繰り返しソビエト連邦最高指導者に登りつめる…\r\n\r\nそんな信仰人から独裁者に変貌する寸前の彼をブランド独自の解釈でプルオーバーとして構築。\r\n\r\n\r\n胸に施されたアップリケは、青年時のヨシフで顔左半分は最高指導者まで登り詰めた後世の顔が縫いこまれ心境の変化が表されている。その上からドローイングされた『Joseph(ヨシフ)』の文字や『1953(没年)』、散らされたペンキ跡はひとつひとつ表情が異なります。\r\n\r\n\r\nコットン地のスウェットにボールバイオウォッシュ(生地表面部分を微生物に食べさせた加工)を施すことで、着古した衣類の色味とアタリ、柔らかな肌触りと古着の様な風合いを再現。\r\n\r\n\r\n厚みのある10ozの柔らかなコットン地に、裏地を起毛させた保温性の高いプルーオーバーなっています。\r\n※アタリの強弱など一つ一つ表情が異なります。\r\n\r\n\r\nSHELL(cotton 100％)BODY LINING(COTTON52%　POLYESTER48%)<br><br>\r\n着用目安(ジャスト)…M/162〜167cm', '0', '2018-01-16 06:01:15', '2018-01-18 11:39:27'),
(11, 'BBB', '1', 20000, 4, '1,2', 1, '2', NULL, 0, NULL, 1, 'adfafdasfadfadf', '0', '2018-01-16 06:33:22', '2018-01-17 11:06:19'),
(12, 'yyyy', '1', 20000, 4, '1', 1, '4', NULL, 0, NULL, 1, 'ssss', '0', '2018-01-17 05:06:59', '2018-01-17 10:55:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `item_genres`
--

CREATE TABLE `item_genres` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '職業名',
  `delete_flag` varchar(255) NOT NULL DEFAULT '0' COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `item_genres`
--

INSERT INTO `item_genres` (`id`, `name`, `delete_flag`, `created`, `modified`) VALUES
(1, 'タンクトップ', '0', '2017-08-04 05:39:19', '2017-08-04 05:39:19'),
(2, 'ロンティー', '0', '2017-08-04 05:39:23', '2017-08-04 05:39:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `shops`
--

CREATE TABLE `shops` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tdfk` varchar(255) DEFAULT NULL,
  `shop_url` text,
  `image_flag` int(11) DEFAULT NULL,
  `delete_flag` int(11) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `shops`
--

INSERT INTO `shops` (`id`, `name`, `tdfk`, `shop_url`, `image_flag`, `delete_flag`, `created`, `modified`) VALUES
(1, 'AAAA', 'OSAKA', 'https://www.yahoo.co.jp/', NULL, 0, '2018-01-17 09:49:54', '2018-01-17 09:49:54');

-- --------------------------------------------------------

--
-- テーブルの構造 `topimages`
--

CREATE TABLE `topimages` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `text` text NOT NULL,
  `url` text NOT NULL,
  `image_flag` varchar(255) DEFAULT NULL COMMENT '画像フラグ',
  `delete_flag` int(11) DEFAULT '0' COMMENT '削除',
  `created` datetime NOT NULL COMMENT '作成日',
  `modified` datetime DEFAULT NULL COMMENT '更新日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `topimages`
--

INSERT INTO `topimages` (`id`, `title`, `text`, `url`, `image_flag`, `delete_flag`, `created`, `modified`) VALUES
(1, 'Personal Approach', 'rsonal Approachrsonal Approachrsonal Approachrsonal Approach', 'http://www.htmq.com/style/line-height.shtml', '1', 0, '2018-01-24 05:41:01', '2018-01-24 06:01:39'),
(2, 'leave a review!', 'Enjoying Restlet Client? Help us make it better, leave a review!', 'http://www.htmq.com/style/line-height.shtml', '1', 0, '2018-01-24 05:47:49', '2018-01-24 06:01:05');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `full_name_kana` varchar(11) DEFAULT NULL,
  `zip` varchar(11) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `mail_address` varchar(255) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `delete_flag` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `full_name_kana`, `zip`, `address1`, `address2`, `role`, `mail_address`, `tel`, `delete_flag`, `created`, `modified`) VALUES
(1, '3nakamura01008@decoo.co.jp', '$2a$10$FJI0CBOsMBROMoFMzMtsiOAkRmwTV8oYyembYBmiDv/P7HU4D1eMe', '中村篤史', 'ナカムラアツシ', '550-0021', '大阪府大阪市西区川口', 'dsfsads', 'admin', '3nakamura01008@decoo.co.jp', '08040167186', 0, '2016-06-24 00:01:47', '2017-08-22 08:30:07'),
(8, 'atusi027', '$2a$10$O0wBnfmjnmwjnKg/hrBicu5d8tFXDcc.zf7yNI0df1WvWwjFWDQcG', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, 0, '2017-05-15 17:23:43', '2017-05-15 17:23:43'),
(9, 'linkinpark', '$2a$10$43ggHgZGfKSXw8PjsMAopOAi4HqgpWuSnM926UmkTQlKyCfxZxvTK', NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, 0, '2017-08-10 10:50:54', '2017-08-10 10:50:54'),
(10, '2nakamura01008@decoo.co.jp', '$2a$10$VjXJZYuuEiEOorfhu/V8OehGDKtRPRubXoVBG0a7Dut2EIHn.nggq', '中村篤史', 'ナカムラアツシ', '550', '川口', '西区', 'author', 'nakamura01008@decoo.co.jp', '2147483647', 0, '2017-08-10 11:00:21', '2017-11-02 05:20:05'),
(16, NULL, '$2a$10$kVd1e44Y5LvyerNpCnrYQ.L3dxDgC88MSn0jGxiBOU5mK.jottz4e', NULL, NULL, NULL, NULL, NULL, NULL, 'aaaaanakamura01008@decoo.co.jp', NULL, 0, '2017-08-17 05:52:41', '2017-08-17 05:52:41'),
(20, '1nakamura01008@decoo.co.jp', '$2a$10$ACEFw6Vle/eJWeAwSycA2.21u1tggsfCfFMCukBVzoBhJemfQ5o/6', '中村篤史', 'ナカムラアツシ', '550', '川口', '中野区', 'author', 'nakamura01008@decoo.co.jp', '2147483647', 0, '2017-08-17 06:07:14', '2017-08-17 11:55:52'),
(21, 'nakamura01008@decoo.co.jp', '$2a$10$fidP1OS8pTmZTnW6UbYOBuwaY/N8Dn4labZ3XvSeZJ7UzYoNNynZu', NULL, NULL, NULL, NULL, NULL, 'author', 'nakamura01008@decoo.co.jp', NULL, 0, '2017-11-14 03:34:55', '2017-11-14 03:34:55'),
(22, 'numb013013@yahoo.co.jp', '$2a$10$VVhI6AKmszd.05h3ZN1mcej2ZiRmeDd2srVy6p/Sq2QWj66oAGP0q', NULL, NULL, NULL, NULL, NULL, 'author', 'numb013013@yahoo.co.jp', NULL, 0, '2017-11-14 03:35:24', '2017-11-14 03:35:24'),
(23, 'numb013', '$2a$10$trl0BWL2pPeIt8dIevytw.hAqvo8fUNTKqRjIHhWMudVUpxd6b0dy', NULL, NULL, NULL, NULL, NULL, 'author', 'numb013', NULL, 0, '2018-01-15 06:38:03', '2018-01-15 06:38:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contcts`
--
ALTER TABLE `contcts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_genres`
--
ALTER TABLE `item_genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topimages`
--
ALTER TABLE `topimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contcts`
--
ALTER TABLE `contcts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item_genres`
--
ALTER TABLE `item_genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `topimages`
--
ALTER TABLE `topimages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
