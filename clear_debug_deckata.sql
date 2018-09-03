-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 03 2018 г., 12:15
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deckata`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE `card` (
  `card_id` int(16) NOT NULL,
  `card_question` text NOT NULL,
  `card_answer` text NOT NULL,
  `card_сreated_date` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `deck`
--

CREATE TABLE `deck` (
  `deck_id` int(12) NOT NULL,
  `deck_title` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `deckcard`
--

CREATE TABLE `deckcard` (
  `deckcard_id` int(20) NOT NULL,
  `deck_id` int(12) NOT NULL,
  `card_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `level`
--

CREATE TABLE `level` (
  `level_id` int(3) NOT NULL,
  `level_pause` int(12) NOT NULL,
  `level_next` int(3) NOT NULL,
  `level_crash` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `level`
--

INSERT INTO `level` (`level_id`, `level_pause`, `level_next`, `level_crash`) VALUES
(1, 0, 2, 1),
(2, 5, 3, 1),
(3, 10, 4, 1),
(4, 15, 5, 1),
(5, 20, 6, 1),
(6, 25, 7, 1),
(7, 30, 8, 1),
(8, 35, 9, 100),
(9, 40, 10, 100),
(10, 45, 11, 100),
(11, 50, 12, 100),
(12, 55, 13, 100),
(13, 60, 14, 100),
(14, 60, 14, 100),
(100, 0, 101, 1),
(101, 10, 102, 1),
(102, 20, 103, 1),
(103, 25, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(20) NOT NULL,
  `card_id` int(16) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `response`
--

CREATE TABLE `response` (
  `response_id` int(24) NOT NULL,
  `card_id` int(12) NOT NULL,
  `response_result` tinyint(1) NOT NULL,
  `response_date` int(12) NOT NULL,
  `level_id` int(4) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`user_id`, `user_name`) VALUES
(1, 'Sergey'),
(2, 'Admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Индексы таблицы `deck`
--
ALTER TABLE `deck`
  ADD PRIMARY KEY (`deck_id`);

--
-- Индексы таблицы `deckcard`
--
ALTER TABLE `deckcard`
  ADD PRIMARY KEY (`deckcard_id`);

--
-- Индексы таблицы `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Индексы таблицы `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Индексы таблицы `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(16) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `deck`
--
ALTER TABLE `deck`
  MODIFY `deck_id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `deckcard`
--
ALTER TABLE `deckcard`
  MODIFY `deckcard_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(24) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
