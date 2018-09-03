-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 03 2018 г., 14:49
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

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`card_id`, `card_question`, `card_answer`, `card_сreated_date`) VALUES
(1, 'Что такое PHP?', 'Серверный язык веб-программирования', 1535966277),
(2, 'Что такое HTML?', 'Язык гипертесктовой разметки', 1535966369),
(3, 'White', 'Белый', 1535966443),
(4, '<?php echo \'1\'; ?>\r\n\r\n<i>Просто курсив теги</i>\r\n[CODE]<i>Курсив теги в коде</i>[/CODE]', '<i>III</i>\r\n[IMG]https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png[/IMG]', 1535967792);

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
(3, 'English', 1);

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
(3, 3, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `image_id` int(12) NOT NULL,
  `image_title` varchar(255) NOT NULL,
  `image_uploaded_date` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`image_id`, `image_title`, `image_uploaded_date`) VALUES
(1, '\'555\'./', 1535974037),
(2, 'Вторая картинка!', 1535974095);

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

--
-- Дамп данных таблицы `response`
--

INSERT INTO `response` (`response_id`, `card_id`, `response_result`, `response_date`, `level_id`, `user_id`) VALUES
(1, 1, 0, 1535966459, 1, 1),
(2, 3, 0, 1535966461, 1, 1),
(3, 2, 1, 1535966468, 2, 1),
(4, 3, 0, 1535966471, 1, 1),
(5, 1, 1, 1535966491, 2, 1),
(6, 3, 1, 1535966492, 2, 1),
(7, 2, 1, 1535966494, 3, 1),
(8, 2, 1, 1535966522, 4, 1),
(9, 1, 1, 1535966524, 3, 1),
(10, 3, 1, 1535966525, 3, 1),
(11, 3, 1, 1535966558, 4, 1),
(12, 2, 1, 1535966559, 5, 1),
(13, 1, 1, 1535966559, 4, 1),
(14, 1, 1, 1535966666, 5, 1),
(15, 2, 1, 1535966668, 6, 1),
(16, 3, 1, 1535966670, 5, 1),
(17, 3, 0, 1535966713, 1, 1),
(18, 1, 1, 1535966715, 6, 1),
(19, 2, 1, 1535966716, 7, 1),
(20, 1, 1, 1535966764, 7, 1),
(21, 3, 1, 1535966765, 2, 1),
(22, 2, 1, 1535966766, 8, 1),
(23, 2, 0, 1535966805, 100, 1),
(26, 2, 1, 1535966863, 101, 1),
(27, 3, 1, 1535966876, 3, 1),
(28, 1, 1, 1535966876, 8, 1),
(29, 2, 1, 1535966892, 102, 1),
(30, 3, 1, 1535966894, 4, 1),
(31, 3, 1, 1535967384, 5, 1),
(32, 2, 1, 1535967385, 103, 1),
(33, 1, 1, 1535967386, 9, 1),
(34, 1, 1, 1535967632, 10, 1),
(35, 3, 1, 1535967633, 6, 1),
(36, 2, 1, 1535967633, 8, 1),
(37, 4, 1, 1535967916, 2, 1),
(38, 2, 1, 1535967917, 9, 1),
(39, 3, 1, 1535967918, 7, 1),
(40, 1, 1, 1535967919, 11, 1),
(41, 4, 1, 1535967939, 3, 1);

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
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`);

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
  MODIFY `card_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `deck`
--
ALTER TABLE `deck`
  MODIFY `deck_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `deckcard`
--
ALTER TABLE `deckcard`
  MODIFY `deckcard_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `response_id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
