-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Окт 31 2018 г., 12:04
-- Версия сервера: 5.6.38
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
-- База данных: `gamesite`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_project` (IN `p_id` INT(11) UNSIGNED)  NO SQL
BEGIN
DELETE FROM `game_page` WHERE proj_id = p_id;
DELETE FROM `game_page_carousel` WHERE proj_id = p_id;
DELETE FROM `game_project` WHERE id = p_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_user` (IN `u_id` INT(11) UNSIGNED)  NO SQL
BEGIN
DELETE from `user_role` WHERE user_id = u_id;
DELETE FROM `user_data` WHERE user_id = u_id;
DELETE FROM `users` WHERE id = u_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `game_page`
--

CREATE TABLE `game_page` (
  `id` int(11) UNSIGNED NOT NULL,
  `proj_id` int(11) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `game_page`
--

INSERT INTO `game_page` (`id`, `proj_id`, `img`, `video`, `about`) VALUES
(1, 14, 'img/hearthstone.jpg', 'https://www.youtube.com/embed/vPguoeYTvMI', 'Some text about this game should be placed here!'),
(2, 16, 'img/hex.jpg', 'https://www.youtube.com/embed/5Ivz9MWhrHM', 'Some text about Hex game should be placed here!'),
(4, 18, 'img/gwint.jpg', 'https://www.youtube.com/embed/5yu7FVZOyAo', 'Some text about Gwint gonna be placed here soon!');

-- --------------------------------------------------------

--
-- Структура таблицы `game_page_carousel`
--

CREATE TABLE `game_page_carousel` (
  `id` int(11) UNSIGNED NOT NULL,
  `proj_id` int(11) UNSIGNED NOT NULL,
  `carousel` varchar(255) DEFAULT NULL,
  `carousel_title` varchar(255) DEFAULT NULL,
  `carousel_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `game_page_carousel`
--

INSERT INTO `game_page_carousel` (`id`, `proj_id`, `carousel`, `carousel_title`, `carousel_info`) VALUES
(1, 14, 'http://via.placeholder.com/1920x1080?text=Game+1', 'Slider_1', 'Information 1'),
(2, 14, 'http://via.placeholder.com/1920x1080?text=Game+2', 'Slider_2', 'Information 2'),
(3, 14, 'http://via.placeholder.com/1920x1080?text=Game+3', 'Slider_3', 'Information 3');

-- --------------------------------------------------------

--
-- Структура таблицы `game_project`
--

CREATE TABLE `game_project` (
  `id` int(11) UNSIGNED NOT NULL,
  `proj_name` varchar(64) NOT NULL,
  `proj_url` varchar(255) NOT NULL,
  `proj_img` varchar(255) NOT NULL,
  `proj_desc` varchar(255) DEFAULT NULL,
  `is_featured` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `game_project`
--

INSERT INTO `game_project` (`id`, `proj_name`, `proj_url`, `proj_img`, `proj_desc`, `is_featured`) VALUES
(14, 'Hearthstone', 'https://playhearthstone.com/ru-ru/', 'img/hearthstone.jpg', 'Best TCG game... ', b'1'),
(16, 'Hex ', 'http://www.hextcg.com/', 'img/hex.jpg', 'Cool tcg with nice UI...', b'1'),
(18, 'gwint', 'https://www.playgwent.com', 'img/gwint.jpg', 'You know that stuff', b'0'),
(19, 'Star Worlds', 'http://starworlds.ru/', 'img/star_worlds.jpg', 'Coming soon', b'0'),
(20, 'Game 1', 'http://via.placeholder.com/1920x1080?text=Game+1', 'http://via.placeholder.com/1920x1080?text=Game+1', 'Game 1 description', b'0'),
(21, 'Game 2', 'http://via.placeholder.com/1920x1080?text=Game+2', 'http://via.placeholder.com/1920x1080?text=Game+2', 'Game 2 description', b'0'),
(22, 'Game 3', 'http://via.placeholder.com/1920x1080?text=Game+3', 'http://via.placeholder.com/1920x1080?text=Game+3', 'Game 3 description', b'0'),
(23, 'Game 4', 'http://via.placeholder.com/1920x1080?text=Game+4', 'http://via.placeholder.com/1920x1080?text=Game+4', 'Game 4 description', b'0'),
(24, 'Game 5', 'http://via.placeholder.com/1920x1080?text=Game+5', 'http://via.placeholder.com/1920x1080?text=Game+5', 'Game 5 description', b'0');

-- --------------------------------------------------------

--
-- Структура таблицы `proj_platform`
--

CREATE TABLE `proj_platform` (
  `id` int(11) UNSIGNED NOT NULL,
  `proj_id` int(11) UNSIGNED NOT NULL,
  `pc` bit(1) DEFAULT NULL,
  `android` bit(1) DEFAULT NULL,
  `ios` bit(1) DEFAULT NULL,
  `ps` bit(1) DEFAULT NULL,
  `xbox` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `proj_platform`
--

INSERT INTO `proj_platform` (`id`, `proj_id`, `pc`, `android`, `ios`, `ps`, `xbox`) VALUES
(1, 14, b'1', b'1', b'1', b'1', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `proj_service`
--

CREATE TABLE `proj_service` (
  `id` int(11) UNSIGNED NOT NULL,
  `proj_id` int(11) UNSIGNED NOT NULL,
  `steam` bit(1) DEFAULT NULL,
  `gog` bit(1) DEFAULT NULL,
  `origin` bit(1) DEFAULT NULL,
  `ps_store` bit(1) DEFAULT NULL,
  `microsoft_xbox` bit(1) DEFAULT NULL,
  `google_play` bit(1) DEFAULT NULL,
  `app_store` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `proj_service`
--

INSERT INTO `proj_service` (`id`, `proj_id`, `steam`, `gog`, `origin`, `ps_store`, `microsoft_xbox`, `google_play`, `app_store`) VALUES
(1, 14, NULL, NULL, NULL, NULL, NULL, b'1', b'1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(3, 'seyv3@gmail.com', '$2y$10$yXz1MsMaf9L6jKigngjyzuzmHgp89yfQKta0yvD6CVcA.cQVq5FH6'),
(4, 'tetradochka1488@gmail.com', '$2y$10$Qf6E9SxUbU8BjBeUHucqyuI/258th3WFhc6klfav147pY/qiIN5fO'),
(7, 'g@gmail.com', '$2y$10$L4nfHVyqlID7U06x5Nej5uTI3rjZyfMEh7zkbBxAUgRU/CtKS3GGu'),
(8, 'd@mail.ru', '$2y$10$GIHInfjWJWH51UdVKKHTSeS6zo/55wB31cQFhHQ66xe7WLK0pftoa'),
(9, 'sdfdsf@gadf.sfsdf', '$2y$10$6IlMr3c3zDqXYsAayRRxouL95/I2tgPMa1YNqVJbTmhC2uy7ifgpC'),
(10, 'nakmak1998@gmail.com', '$2y$10$NelsS902GWPWY3B63v1rE.5/Kt8zHcfNn6WG5Th2ChPsF7y/kRATK');

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `age` int(4) NOT NULL,
  `region` varchar(40) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `nickname`, `age`, `region`, `session_id`) VALUES
(1, 3, NULL, 18, 'eu', '4v78be05sf08i972u6rcmo3nd1'),
(2, 4, NULL, 18, 'eu', NULL),
(5, 7, NULL, 12, 'eu', NULL),
(6, 8, NULL, 18, 'eu', NULL),
(7, 9, NULL, 18, 'eu', NULL),
(8, 10, NULL, 18, 'eu', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role`) VALUES
(1, 3, 'admin'),
(2, 4, 'subscriber'),
(5, 7, 'subscriber'),
(6, 8, 'subscriber'),
(7, 9, 'subscriber'),
(8, 10, 'subscriber');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `game_page`
--
ALTER TABLE `game_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gamePageFK1` (`proj_id`);

--
-- Индексы таблицы `game_page_carousel`
--
ALTER TABLE `game_page_carousel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gamePageCarouselFK1` (`proj_id`);

--
-- Индексы таблицы `game_project`
--
ALTER TABLE `game_project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proj_platform`
--
ALTER TABLE `proj_platform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projPlatformFK1` (`proj_id`);

--
-- Индексы таблицы `proj_service`
--
ALTER TABLE `proj_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projServiceFK1` (`proj_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userDataFK1` (`user_id`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userRoleFK1` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `game_page`
--
ALTER TABLE `game_page`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `game_page_carousel`
--
ALTER TABLE `game_page_carousel`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `game_project`
--
ALTER TABLE `game_project`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `proj_platform`
--
ALTER TABLE `proj_platform`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `proj_service`
--
ALTER TABLE `proj_service`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `game_page`
--
ALTER TABLE `game_page`
  ADD CONSTRAINT `gamePageFK1` FOREIGN KEY (`proj_id`) REFERENCES `game_project` (`id`);

--
-- Ограничения внешнего ключа таблицы `game_page_carousel`
--
ALTER TABLE `game_page_carousel`
  ADD CONSTRAINT `gamePageCarouselFK1` FOREIGN KEY (`proj_id`) REFERENCES `game_project` (`id`);

--
-- Ограничения внешнего ключа таблицы `proj_platform`
--
ALTER TABLE `proj_platform`
  ADD CONSTRAINT `projPlatformFK1` FOREIGN KEY (`proj_id`) REFERENCES `game_project` (`id`);

--
-- Ограничения внешнего ключа таблицы `proj_service`
--
ALTER TABLE `proj_service`
  ADD CONSTRAINT `projServiceFK1` FOREIGN KEY (`proj_id`) REFERENCES `game_project` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_data`
--
ALTER TABLE `user_data`
  ADD CONSTRAINT `userDataFK1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `userRoleFK1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
