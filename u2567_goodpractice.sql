-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 16 2013 г., 20:27
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u2567_goodpractice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `text`) VALUES
(1, 'How to lose work and job of your li', 'Course that teaches how to lose the job', 'Kill th president of United States'),
(2, 'gdfsgsdfg', 'gdsgsdfgdsgfsdfg', 'gsdgsdgsdgfsdfgsdfg'),
(3, 'gdfsgsdfg', 'gdsgsdfgdsgfsdfg', 'gsdgsdgsdgfsdfgsdfg'),
(4, '3424', '44gsf dfsg', 'fdsgs g sgf sg fsd '),
(5, '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `buy`
--

CREATE TABLE IF NOT EXISTS `buy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `buy`
--

INSERT INTO `buy` (`id`, `title`, `text`) VALUES
(2, 'ПАУК продажи', 'продажи продажи продажи продажи ОПА!'),
(5, 'fdfsfsdf', 'fds fdsfds fs df ');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'members', 'members');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `login` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `activation_code` varchar(80) NOT NULL,
  `forgotten_password_code` varchar(40) NOT NULL,
  `forgotten_password_time` int(11) NOT NULL,
  `remember_on` varchar(40) NOT NULL,
  `created_on` varchar(30) NOT NULL,
  `last_login` varchar(11) NOT NULL,
  `active` int(1) NOT NULL,
  `temp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
