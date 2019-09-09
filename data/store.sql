-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 09 2019 г., 13:55
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session` text NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `carts`
--

INSERT INTO `carts` (`id`, `item_id`, `user_id`, `session`, `quantity`) VALUES
(18, 2, NULL, '2arf35gl57n3toq1v967hqnjq2o2eud1', 7),
(22, 22, NULL, '2arf35gl57n3toq1v967hqnjq2o2eud1', 4),
(23, 21, NULL, '2arf35gl57n3toq1v967hqnjq2o2eud1', 4),
(28, 2, NULL, '6166segrvii2enqacmn235mu8m42m21k', 2),
(29, 2, NULL, 'qn5fhivtg13ir895cpu2r03m60q64342', 1),
(30, 2, NULL, 'rhqu7ijf02bmmkfafkpjk58c2dsmtqm6', 3),
(31, 21, NULL, 'rhqu7ijf02bmmkfafkpjk58c2dsmtqm6', 1),
(32, 22, NULL, 'rhqu7ijf02bmmkfafkpjk58c2dsmtqm6', 1),
(33, 2, NULL, 'o2nqjd678m465me8n4ahlpp2neuj60jr', 3),
(34, 21, NULL, 'o2nqjd678m465me8n4ahlpp2neuj60jr', 1),
(35, 22, NULL, '0gp1ka8tqi6b9g9p0j7t11fl4853ggog', 2),
(36, 2, NULL, '0gp1ka8tqi6b9g9p0j7t11fl4853ggog', 3),
(37, 2, NULL, 'i3jvtu37clan2bj5oak4ufd2crbc4fb1', 1),
(38, 22, NULL, 'i3jvtu37clan2bj5oak4ufd2crbc4fb1', 2),
(39, 21, NULL, 'i3jvtu37clan2bj5oak4ufd2crbc4fb1', 1),
(40, 2, NULL, 'd4c0p4tui8qm7ri626lsvufh5utbcs84', 1),
(41, 21, NULL, 'd4c0p4tui8qm7ri626lsvufh5utbcs84', 2),
(42, 22, NULL, 'd4c0p4tui8qm7ri626lsvufh5utbcs84', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `item_id`, `name`, `comment`) VALUES
(1, 1, 'Антон', 'Лягуха - класс!');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `views` int(11) DEFAULT '0',
  `likes` int(11) DEFAULT '0',
  `description` text NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `file_name`, `views`, `likes`, `description`, `item_name`, `price`) VALUES
(2, 'pikachu.jpg', 5, 2, 'Веселый покемон Пикачу', 'Пикачу', 200),
(21, 'bear.jpg', NULL, NULL, 'Мягкий и добрый мишка', 'Медведь', 244),
(22, 'panda.jpg', NULL, NULL, 'Большой панда', 'Панда', 333);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `session` text NOT NULL,
  `status` varchar(30) DEFAULT 'новый'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `session`, `status`) VALUES
(9, '1111111111', 'anton2009danilov@yandex.ru', 'd4c0p4tui8qm7ri626lsvufh5utbcs84', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(50) NOT NULL,
  `login` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`) VALUES
(1, 'Петров Д.Д.', 'Danila40001', 'ElKi'),
(3, 'Иванов И.И.', 'Ivan2059', 'VaLeNki32841'),
(19, 'Иванов Д.Д.', 'Danila5000', 'VaLeNhhesjkki3284444'),
(20, 'Петров М.Д.', 'Danila4000', 'ElKi'),
(21, 'Петров М.Д.', 'Danila4000', 'ElKi'),
(22, 'Петров Ф.Д.', 'Danila4000', 'ElKi'),
(23, 'Петров Ф.Д.', 'Danila4000', 'ElKi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
