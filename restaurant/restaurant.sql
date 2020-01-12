-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 23 2018 г., 19:00
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `restaurant`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appetizer`
--

CREATE TABLE `appetizer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `appetizer`
--

INSERT INTO `appetizer` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Капрезе', 'Спелые томаты в сочетании с сыром', 350, 250, 'img/kapreze.jpg'),
(2, 'Капрезе', 'Спелые не спелые', 500, 250, 'img/kapreze.jpg'),
(3, 'Капрезе', 'Спелые не спелые наверное', 800, 250, 'img/kapreze.jpg'),
(4, 'Капрезе', 'Текст', 800, 250, 'img/kapreze.jpg'),
(5, 'ewfa', 'wfe', 123, 123, 'reasg'),
(9, 'Капрезе', 'Текст', 2, 300, 'img/kapreze.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `dessert`
--

CREATE TABLE `dessert` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dessert`
--

INSERT INTO `dessert` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Тирамису', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 250, 300, 'img/tiramisu.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `garnish`
--

CREATE TABLE `garnish` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `garnish`
--

INSERT INTO `garnish` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Паттата фритта', 'Фри', 350, 300, 'img/patata.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `interior`
--

CREATE TABLE `interior` (
  `id_interior` int(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `text_preview` text NOT NULL,
  `text_full` text NOT NULL,
  `img1` varchar(30) NOT NULL,
  `img2` varchar(30) NOT NULL,
  `img3` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `interior`
--

INSERT INTO `interior` (`id_interior`, `address`, `text_preview`, `text_full`, `img1`, `img2`, `img3`) VALUES
(2, 'Ленина, 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore alias animi inventore consLorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore alias animi inventore consequuntur ex, omnis magnam equuntur ex, omnis magnam ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore alias animi inventore consequuntur ex, omnis magnam pariatur aliquam aperiam iusto quis, modi atque praesentium. Inventore ab libero nihil adipisci vel!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore alias animi inventore consequuntur ex, omnis magnam pariatur aliquam aperiam iusto quis, modi atque praesentium. Inventore ab libero nihil adipisci vel!', 'img/restaurant.jpg', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `type_eng` varchar(20) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_menu`, `type`, `type_eng`, `img`) VALUES
(1, 'САЛАТЫ', 'salad', 'img/salad.jpg'),
(2, 'ПИЦЦА', 'pizza', 'img/margarita.jpg'),
(3, 'СУПЫ', 'soup', 'img/soup.jpg'),
(4, 'ГАРНИРЫ', 'garnish', 'img/potato.jpg'),
(5, 'ДЕСЕРТЫ', 'dessert', 'img/dessert.jpeg'),
(6, 'ЗАКУСКИ', 'appetizer', 'img/appetizer.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `pizza`
--

CREATE TABLE `pizza` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Маргарита', 'Томаты, сыр моцарелла, черри.', 540, 440, 'img/margarita.jpg'),
(2, ' не Маргарита', 'Томаты, сыр моцарелла, черри.', 1000, 600, 'img/margarita.jpg'),
(3, 'возможно Маргарита', 'Томаты, сыр моцарелла, помидоры черри.', 1000, 600, 'img/margarita.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reports`
--

CREATE TABLE `reports` (
  `id_report` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `text_report` text NOT NULL,
  `date` date NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reports`
--

INSERT INTO `reports` (`id_report`, `name`, `address`, `text_report`, `date`, `answer`) VALUES
(1, 'Пётр', 'ул. Московская, 65', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nobis accusamus est autem, suscipit nostrum quos excepturi temporibus dolorum ratione.', '2018-05-20', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nobis accusamus est autem, suscipit nostrum quos excepturi temporibus dolorum ratione.'),
(2, 'Светлана', 'ул. Московская, 65', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nobis accusamus est autem, suscipit nostrum quos excepturi temporibus dolorum ratione.', '2018-05-18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nobis accusamus est autem, suscipit nostrum quos excepturi temporibus dolorum ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium nobis accusamus est autem, suscipit nostrum quos excepturi temporibus dolorum ratione.');

-- --------------------------------------------------------

--
-- Структура таблицы `salad`
--

CREATE TABLE `salad` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `salad`
--

INSERT INTO `salad` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Инсалатта нест', 'Салат из картофеля пай', 330, 230, 'img/nest.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `soup`
--

CREATE TABLE `soup` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `discr` varchar(60) NOT NULL,
  `cost` int(5) NOT NULL,
  `weight` int(5) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `soup`
--

INSERT INTO `soup` (`id`, `name`, `discr`, `cost`, `weight`, `img`) VALUES
(1, 'Крема ай фунги', 'Крем-суп из шампиньонов', 270, 300, 'img/fungi.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `appetizer`
--
ALTER TABLE `appetizer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `garnish`
--
ALTER TABLE `garnish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `interior`
--
ALTER TABLE `interior`
  ADD PRIMARY KEY (`id_interior`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Индексы таблицы `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id_report`);

--
-- Индексы таблицы `salad`
--
ALTER TABLE `salad`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `soup`
--
ALTER TABLE `soup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `appetizer`
--
ALTER TABLE `appetizer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `dessert`
--
ALTER TABLE `dessert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `garnish`
--
ALTER TABLE `garnish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `interior`
--
ALTER TABLE `interior`
  MODIFY `id_interior` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `pizza`
--
ALTER TABLE `pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `reports`
--
ALTER TABLE `reports`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `salad`
--
ALTER TABLE `salad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `soup`
--
ALTER TABLE `soup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
