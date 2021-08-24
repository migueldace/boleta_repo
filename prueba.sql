-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2021 a las 01:34:02
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta`
--

CREATE TABLE `boleta` (
  `id` int(11) NOT NULL,
  `folio` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleta`
--

INSERT INTO `boleta` (`id`, `folio`, `nombre`, `fecha`, `valor`) VALUES
(7, 'boleta1', 'Miguel', '2021-01-01', 500000),
(8, 'boleta2', 'Miguel', '2021-01-02', 500000),
(9, 'boleta3', 'Miguel', '2021-01-03', 896358),
(10, 'boleta4', 'Miguel', '2021-02-01', 500000),
(11, 'boleta5', 'Miguel', '2021-02-02', 500000),
(12, 'boleta6', 'Miguel', '2021-02-03', 500000),
(13, 'boleta7', 'Miguel', '2021-03-01', 500000),
(14, 'boleta8', 'Miguel', '2021-03-01', 500000),
(15, 'boleta9', 'Miguel', '2021-03-03', 500000),
(17, 'boleta165', 'Miguel', '2021-03-11', 90000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleta`
--
ALTER TABLE `boleta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleta`
--
ALTER TABLE `boleta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
