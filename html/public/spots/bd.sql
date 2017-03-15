-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 08 2015 г., 07:33
-- Версия сервера: 5.5.36-34.0-632.precise
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ca59309_vii24s`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `conf_list`;
CREATE TABLE `conf_list` (
  `name` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `vk` varchar(64) NOT NULL,
  `vk_group` varchar(64) NOT NULL,
  `secret` varchar(64) NOT NULL,
  `key` varchar(64) NOT NULL,
  `referal` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `conf_list` (`name`, `url`, `email`, `vk`, `vk_group`, `secret`, `key`, `referal`) VALUES
('FASTUP',	'http://fastup.su/',	'-',	'-',	'-',	'1980KEYSBG',	'7053B4302E3D615EE197B7620F0EA3DD',	'21');

-- --------------------------------------------------------

--
-- Структура таблицы `prod_list`
--

CREATE TABLE IF NOT EXISTS `prod_list` (
`id` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `price_p` int(255) NOT NULL,
  `place` int(255) NOT NULL,
  `place_n` int(255) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `winer_num` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rarity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shower` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(255) NOT NULL,
  `game` int(255) NOT NULL,
  `time2` int(255) NOT NULL,
  `win` int(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rate_list`
--

CREATE TABLE IF NOT EXISTS `rate_list` (
`id` int(255) NOT NULL,
  `item` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `num` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=952 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_list`
--

CREATE TABLE IF NOT EXISTS `users_list` (
`id` int(255) NOT NULL,
  `steam` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pic_min` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pic_norm` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pic_big` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `money` int(255) NOT NULL DEFAULT '0',
  `trade` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `prod_list`
--
ALTER TABLE `prod_list`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rate_list`
--
ALTER TABLE `rate_list`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_list`
--
ALTER TABLE `users_list`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `prod_list`
--
ALTER TABLE `prod_list`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `rate_list`
--
ALTER TABLE `rate_list`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=952;
--
-- AUTO_INCREMENT для таблицы `users_list`
--
ALTER TABLE `users_list`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
