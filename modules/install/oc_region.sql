-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 19 2014 г., 14:33
-- Версия сервера: 5.6.16-64.0-beget-log
-- Версия PHP: 5.4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `vadiev_spars`
--

-- --------------------------------------------------------

--
-- Структура таблицы `oc_region`
--
-- Создание: Июн 18 2014 г., 10:28
-- Последнее обновление: Июн 19 2014 г., 07:52
--

DROP TABLE IF EXISTS `oc_region`;
CREATE TABLE IF NOT EXISTS `oc_region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `iso_code_2` varchar(2) CHARACTER SET utf8 NOT NULL,
  `iso_code_3` varchar(3) CHARACTER SET utf8 NOT NULL,
  `address_format` text CHARACTER SET utf8 NOT NULL,
  `postcode_required` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`region_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1612 ;

--
-- Дамп данных таблицы `oc_region`
--

INSERT INTO `oc_region` (`region_id`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`) VALUES
(1, 'Москва и Московская область', '', '', '', 0, 1),
(2, 'Санкт-Петербург и область', '', '', '', 0, 1),
(3, 'Адыгея', '', '', '', 0, 1),
(4, 'Алтайский край', '', '', '', 0, 1),
(5, 'Амурская область', '', '', '', 0, 1),
(6, 'Архангельская область', '', '', '', 0, 1),
(7, 'Астраханская область', '', '', '', 0, 1),
(8, 'Башкортостан(Башкирия)', '', '', '', 0, 1),
(9, 'Белгородская область', '', '', '', 0, 1),
(10, 'Брянская область', '', '', '', 0, 1),
(11, 'Бурятия', '', '', '', 0, 1),
(12, 'Владимирская область', '', '', '', 0, 1),
(13, 'Волгоградская область', '', '', '', 0, 1),
(14, 'Вологодская область', '', '', '', 0, 1),
(15, 'Воронежская область', '', '', '', 0, 1),
(16, 'Дагестан', '', '', '', 0, 1),
(17, 'Еврейская область', '', '', '', 0, 1),
(18, 'Ивановская область', '', '', '', 0, 1),
(19, 'Иркутская область', '', '', '', 0, 1),
(20, 'Кабардино-Балкария', '', '', '', 0, 1),
(21, 'Калининградская область', '', '', '', 0, 1),
(22, 'Калмыкия', '', '', '', 0, 1),
(23, 'Калужская область', '', '', '', 0, 1),
(24, 'Камчатский край', '', '', '', 0, 1),
(25, 'Карелия', '', '', '', 0, 1),
(26, 'Кемеровская область', '', '', '', 0, 1),
(27, 'Кировская область', '', '', '', 0, 1),
(28, 'Коми', '', '', '', 0, 1),
(29, 'Костромская область', '', '', '', 0, 1),
(30, 'Краснодарский край', '', '', '', 0, 1),
(31, 'Красноярский край', '', '', '', 0, 1),
(32, 'Курганская область', '', '', '', 0, 1),
(33, 'Курская область', '', '', '', 0, 1),
(34, 'Липецкая область', '', '', '', 0, 1),
(35, 'Магаданская область', '', '', '', 0, 1),
(36, 'Марий Эл', '', '', '', 0, 1),
(37, 'Мордовия', '', '', '', 0, 1),
(38, 'Мурманская область', '', '', '', 0, 1),
(39, 'Нижегородская (Горьковская)', '', '', '', 0, 1),
(40, 'Новгородская область', '', '', '', 0, 1),
(41, 'Новосибирская область', '', '', '', 0, 1),
(42, 'Омская область', '', '', '', 0, 1),
(43, 'Оренбургская область', '', '', '', 0, 1),
(44, 'Орловская область', '', '', '', 0, 1),
(45, 'Пензенская область', '', '', '', 0, 1),
(46, 'Пермский край', '', '', '', 0, 1),
(47, 'Приморский край', '', '', '', 0, 1),
(48, 'Псковская область', '', '', '', 0, 1),
(49, 'Ростовская область', '', '', '', 0, 1),
(50, 'Рязанская область', '', '', '', 0, 1),
(51, 'Самарская область', '', '', '', 0, 1),
(52, 'Саратовская область', '', '', '', 0, 1),
(53, 'Саха (Якутия)', '', '', '', 0, 1),
(54, 'Сахалин', '', '', '', 0, 1),
(55, 'Свердловская область', '', '', '', 0, 1),
(56, 'Северная Осетия', '', '', '', 0, 1),
(57, 'Смоленская область', '', '', '', 0, 1),
(58, 'Ставропольский край', '', '', '', 0, 1),
(59, 'Тамбовская область', '', '', '', 0, 1),
(60, 'Татарстан', '', '', '', 0, 1),
(61, 'Тверская область', '', '', '', 0, 1),
(62, 'Томская область', '', '', '', 0, 1),
(63, 'Тува (Тувинская Респ.)', '', '', '', 0, 1),
(64, 'Тульская область', '', '', '', 0, 1),
(65, 'Тюменская область и Ханты-Мансийский АО', '', '', '', 0, 1),
(66, 'Удмуртия', '', '', '', 0, 1),
(67, 'Ульяновская область', '', '', '', 0, 1),
(68, 'Уральская область', '', '', '', 0, 1),
(69, 'Хабаровский край', '', '', '', 0, 1),
(70, 'Хакасия', '', '', '', 0, 1),
(71, 'Челябинская область', '', '', '', 0, 1),
(72, 'Чечено-Ингушетия', '', '', '', 0, 1),
(73, 'Читинская область', '', '', '', 0, 1),
(74, 'Чувашия', '', '', '', 0, 1),
(75, 'Чукотский АО', '', '', '', 0, 1),
(76, 'Ямало-Ненецкий АО', '', '', '', 0, 1),
(77, 'Ярославская область', '', '', '', 0, 1),
(78, 'Карачаево-Черкесская Республика', '', '', '', 0, 1),
(91, 'Республика Крым', '', '', '', 0, 1),
(92, 'Севастополь', '', '', '', 0, 1);