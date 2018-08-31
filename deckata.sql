-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 31 2018 г., 19:39
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

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

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`card_id`, `card_question`, `card_answer`, `card_сreated_date`) VALUES
(1, '1-ая карточка про PHP', 'Ответ на первую карточку', 1535713386),
(2, '2-ая карточка про HTML', 'Ответ на вторую карточку', 1535713426),
(3, '3-яя карточка про JavaScript', 'Ответ на третью карточку', 1535713453),
(4, 'Book', 'Книга', 1535713495),
(5, 'Dog', 'Собака', 1535713510),
(6, 'Cat', 'Кошка', 1535713530),
(7, 'Red', 'Красный', 1535713565),
(8, 'Black', 'Черный', 1535713584),
(9, 'White', 'Белый', 1535713613),
(10, 'Never', 'Никогда', 1535713633),
(11, 'Big', 'Большой', 1535713649),
(12, '11111', '22222', 1535713727),
(13, 'Первая сторона', 'Вторая сторона', 1535731490),
(14, 'Первая сторона', 'Вторая сторона', 1535731509),
(15, 'Первая сторона', 'Вторая сторона', 1535733490);

-- --------------------------------------------------------

--
-- Структура таблицы `deck`
--

CREATE TABLE `deck` (
  `deck_id` int(12) NOT NULL,
  `deck_title` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deck`
--

INSERT INTO `deck` (`deck_id`, `deck_title`, `user_id`) VALUES
(1, 'Веб-мастерская', 1),
(2, 'Английский', 1),
(3, 'Одна карточка', 1),
(4, 'Без карточек', 1),
(5, 'Новая', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `deckcard`
--

CREATE TABLE `deckcard` (
  `deckcard_id` int(20) NOT NULL,
  `deck_id` int(12) NOT NULL,
  `card_id` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `deckcard`
--

INSERT INTO `deckcard` (`deckcard_id`, `deck_id`, `card_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 4),
(5, 2, 5),
(6, 2, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 9),
(10, 2, 10),
(11, 2, 11),
(12, 3, 12),
(13, 5, 13),
(14, 5, 14),
(15, 5, 15);

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
(2, 20, 3, 1),
(3, 120, 4, 1),
(4, 600, 5, 1),
(5, 3600, 6, 1),
(6, 18000, 7, 1),
(7, 86400, 8, 1),
(8, 172800, 9, 100),
(9, 345600, 10, 100),
(10, 691200, 11, 100),
(11, 1382400, 12, 100),
(12, 2764800, 13, 100),
(13, 5529600, 14, 100),
(14, 5529600, 14, 100),
(100, 0, 101, 1),
(101, 600, 102, 1),
(102, 3600, 103, 1),
(103, 18000, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(20) NOT NULL,
  `card_id` int(16) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mark`
--

INSERT INTO `mark` (`mark_id`, `card_id`, `user_id`) VALUES
(1, 1, 1),
(2, 4, 1);

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
  MODIFY `card_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `deck`
--
ALTER TABLE `deck`
  MODIFY `deck_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `deckcard`
--
ALTER TABLE `deckcard`
  MODIFY `deckcard_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблицы `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(24) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
