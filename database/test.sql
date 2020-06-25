-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: mysql57
-- Время создания: Июн 25 2020 г., 11:42
-- Версия сервера: 5.7.28
-- Версия PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `dob` date NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actors`
--

INSERT INTO `actors` (`actor_id`, `first_name`, `last_name`, `dob`, `country_id`) VALUES
(1, 'William John', 'Neeson', '1952-06-07', 1),
(2, 'Ewan Gordon', 'McGregor', '1971-05-21', 2),
(3, 'Natalie', 'Portman', '1981-06-09', 1),
(4, 'Leonardo Wilhelm', 'DiCaprio', '1974-02-11', 2),
(5, 'Kate Elizabeth', 'Winslet', '1975-10-05', 1),
(6, 'William George', 'Zane Jr', '1966-02-15', 1),
(7, 'Nigel John Dermot', 'Neill', '1947-08-25', 1),
(8, 'Laura Elizabeth', 'Dern', '1967-05-10', 1),
(9, 'Jeffrey Lynn', 'Goldblum', '1952-11-02', 2),
(10, 'Lauren Christine', 'German', '1978-05-11', 1),
(11, 'Bijou Lilly', 'Phillips', '1980-04-01', 1),
(12, 'Jay', 'Hernandez', '1978-02-05', 1),
(13, 'Conor', 'McGregor', '1988-06-04', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `actors_fee`
--

CREATE TABLE `actors_fee` (
  `actors_fee_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actors_fee`
--

INSERT INTO `actors_fee` (`actors_fee_id`, `movie_id`, `actor_id`, `fee`) VALUES
(1, 3, 10, 300000),
(2, 3, 11, 250000),
(3, 1, 3, 1000000),
(4, 2, 4, 2000000),
(5, 3, 9, 900000),
(6, 2, 5, 2000000),
(7, 3, 7, 2000000),
(8, 1, 2, 3000000),
(9, 1, 1, 3500000),
(10, 3, 8, 3500000),
(11, 2, 6, 2000000),
(12, 2, 12, 600000),
(13, 5, 3, 3500000),
(14, 5, 2, 3000000),
(15, 6, 4, 5000000),
(16, 6, 5, 5000000);

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(60) NOT NULL,
  `mainland` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`country_id`, `country_name`, `mainland`) VALUES
(1, 'US', 'North America'),
(2, 'Canada', 'North America'),
(3, 'Ireland', 'Europe');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `movies_title` varchar(60) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `year_of_issue` date NOT NULL,
  `budget` int(11) NOT NULL,
  `box_office` int(11) DEFAULT NULL,
  `duration_min` int(25) DEFAULT NULL,
  `genre` varchar(45) NOT NULL,
  `studio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`movies_id`, `movies_title`, `producer_id`, `year_of_issue`, `budget`, `box_office`, `duration_min`, `genre`, `studio_id`) VALUES
(1, 'Star Wars Episode I: The Phantom Menace', 1, '1999-03-04', 115000000, 1027044677, 133, 'space opera', 1),
(2, 'Titanic', 2, '1997-01-30', 200000000, 2147483647, 253, 'disaster film', 2),
(3, 'Jurassic Park', 3, '1993-00-00', 6300000, 1029691118, 127, 'Sci-fi', 3),
(4, 'Hostel: Part II', 4, '2007-00-00', 10200000, 35619521, 93, 'horror film', 4),
(5, 'Star Wars Episode II: Attack of the Clones', 1, '2002-00-00', 115000000, 649398328, 142, 'space opera', 1),
(6, 'The Wolf of Wall Street', 5, '2013-00-00', 100000000, 392000694, 180, 'black comedy', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `producers`
--

CREATE TABLE `producers` (
  `producer_id` int(11) NOT NULL,
  `producer_name` varchar(50) DEFAULT NULL,
  `producer_country` varchar(50) DEFAULT NULL,
  `producer_dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `producers`
--

INSERT INTO `producers` (`producer_id`, `producer_name`, `producer_country`, `producer_dob`) VALUES
(1, 'George Lucas', 'USA', '1944-05-14'),
(2, 'James Cameron', 'Canada', '1954-09-05'),
(3, 'Steven Spielberg', 'USA', '1946-02-21'),
(4, 'Quentin Tarantino', 'USA', '1963-03-06'),
(5, 'Martin Charles Scorsese', 'USA', '1942-02-06');

-- --------------------------------------------------------

--
-- Структура таблицы `studios`
--

CREATE TABLE `studios` (
  `studios_id` int(11) NOT NULL,
  `studios_title` varchar(25) DEFAULT NULL,
  `foundation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `studios`
--

INSERT INTO `studios` (`studios_id`, `studios_title`, `foundation_date`) VALUES
(1, 'Lucasfilm', '1971-10-11'),
(2, 'Paramount Pictures', '1912-04-05'),
(3, 'Universal Pictures', '1912-05-11'),
(4, 'Miramax Films', '1979-01-09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Индексы таблицы `actors_fee`
--
ALTER TABLE `actors_fee`
  ADD PRIMARY KEY (`actors_fee_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Индексы таблицы `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`),
  ADD KEY `producer_id` (`producer_id`),
  ADD KEY `studio_id` (`studio_id`);

--
-- Индексы таблицы `producers`
--
ALTER TABLE `producers`
  ADD PRIMARY KEY (`producer_id`);

--
-- Индексы таблицы `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`studios_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `actors_fee`
--
ALTER TABLE `actors_fee`
  MODIFY `actors_fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `producers`
--
ALTER TABLE `producers`
  MODIFY `producer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `studios`
--
ALTER TABLE `studios`
  MODIFY `studios_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`country_id`);

--
-- Ограничения внешнего ключа таблицы `actors_fee`
--
ALTER TABLE `actors_fee`
  ADD CONSTRAINT `actors_fee_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movies_id`),
  ADD CONSTRAINT `actors_fee_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`);

--
-- Ограничения внешнего ключа таблицы `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`producer_id`) REFERENCES `producers` (`producer_id`),
  ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`studio_id`) REFERENCES `studios` (`studios_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
