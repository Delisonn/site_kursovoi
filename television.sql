-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 26 2022 г., 05:07
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `television`
--

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `address` varchar(70) NOT NULL,
  `fio` varchar(50) NOT NULL,
  `contract_num` int NOT NULL,
  `tariff_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_client`, `address`, `fio`, `contract_num`, `tariff_id`) VALUES
(1, 'Тернійвський район, вулиця Івана Сірка 21/2', 'Володимир Лампарт Батькович', 1, 1),
(2, 'Тернівський район, вулю Доватора 31/5', 'Мохір Олександр Андрійович', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `contracts`
--

CREATE TABLE `contracts` (
  `id_contract` int NOT NULL,
  `client_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `subscription_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `contracts`
--

INSERT INTO `contracts` (`id_contract`, `client_id`, `employee_id`, `subscription_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `employee`
--

CREATE TABLE `employee` (
  `id_employee` int NOT NULL,
  `number` bigint NOT NULL,
  `fio` varchar(40) NOT NULL,
  `position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `employee`
--

INSERT INTO `employee` (`id_employee`, `number`, `fio`, `position`) VALUES
(1, 380981575135, 'Рубанов Максим Ігорович', 'Оператор');

-- --------------------------------------------------------

--
-- Структура таблицы `fare_terms`
--

CREATE TABLE `fare_terms` (
  `id_fare_terms` int NOT NULL,
  `fare_term_tariff` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `fare_terms`
--

INSERT INTO `fare_terms` (`id_fare_terms`, `fare_term_tariff`) VALUES
(1, 'nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn'),
(2, 'ccccccccccccccccccccc'),
(3, 'sdgssdggdssgdgds'),
(4, 'aaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id_payment` int NOT NULL,
  `contributed_money` int NOT NULL,
  `payment_date` date NOT NULL,
  `contract_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id_payment`, `contributed_money`, `payment_date`, `contract_id`) VALUES
(2, 500, '2022-11-26', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `subscription_fee`
--

CREATE TABLE `subscription_fee` (
  `id_subscription` int NOT NULL,
  `end_date` date NOT NULL,
  `cost` int NOT NULL,
  `activation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subscription_fee`
--

INSERT INTO `subscription_fee` (`id_subscription`, `end_date`, `cost`, `activation_date`) VALUES
(1, '2023-02-01', 300, '2022-12-01');

-- --------------------------------------------------------

--
-- Структура таблицы `tariffs`
--

CREATE TABLE `tariffs` (
  `id_tariff` int NOT NULL,
  `tariff_name` varchar(20) NOT NULL,
  `tariff_cost` int NOT NULL,
  `fare_terms_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tariffs`
--

INSERT INTO `tariffs` (`id_tariff`, `tariff_name`, `tariff_cost`, `fare_terms_id`) VALUES
(1, 'Базовий', 100, 1),
(2, 'Сімейний', 200, 2),
(3, 'Дужий', 300, 3),
(6, 'Максимальний', 400, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `tariff_id` (`tariff_id`);

--
-- Индексы таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id_contract`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `subscription_id` (`subscription_id`);

--
-- Индексы таблицы `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Индексы таблицы `fare_terms`
--
ALTER TABLE `fare_terms`
  ADD PRIMARY KEY (`id_fare_terms`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `contract_id` (`contract_id`);

--
-- Индексы таблицы `subscription_fee`
--
ALTER TABLE `subscription_fee`
  ADD PRIMARY KEY (`id_subscription`);

--
-- Индексы таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD PRIMARY KEY (`id_tariff`),
  ADD KEY `fare_terms_id` (`fare_terms_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id_contract` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employee`
--
ALTER TABLE `employee`
  MODIFY `id_employee` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `fare_terms`
--
ALTER TABLE `fare_terms`
  MODIFY `id_fare_terms` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `subscription_fee`
--
ALTER TABLE `subscription_fee`
  MODIFY `id_subscription` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `tariffs`
--
ALTER TABLE `tariffs`
  MODIFY `id_tariff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`tariff_id`) REFERENCES `tariffs` (`id_tariff`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id_client`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id_employee`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `contracts_ibfk_3` FOREIGN KEY (`subscription_id`) REFERENCES `subscription_fee` (`id_subscription`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contracts` (`id_contract`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `tariffs`
--
ALTER TABLE `tariffs`
  ADD CONSTRAINT `tariffs_ibfk_1` FOREIGN KEY (`fare_terms_id`) REFERENCES `fare_terms` (`id_fare_terms`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
