-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2021 a las 22:48:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pluginswordpress`
--
CREATE DATABASE IF NOT EXISTS `pluginswordpress` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pluginswordpress`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ex1`
--

CREATE TABLE `ex1` (
  `tasques` varchar(60) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ex2`
--

CREATE TABLE `ex2` (
  `id` int(11) NOT NULL,
  `inici` timestamp NOT NULL DEFAULT current_timestamp(),
  `final` timestamp NOT NULL DEFAULT current_timestamp(),
  `total` time NOT NULL,
  `acabat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ex2`
--

INSERT INTO `ex2` (`id`, `inici`, `final`, `total`, `acabat`) VALUES
(1, '2021-03-07 21:39:02', '2021-03-07 21:39:02', '00:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ex1`
--
ALTER TABLE `ex1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ex2`
--
ALTER TABLE `ex2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ex1`
--
ALTER TABLE `ex1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
