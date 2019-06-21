-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2019 a las 06:54:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `LAST_NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ID_ROLE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`ID`, `NAME`, `LAST_NAME`, `EMAIL`, `ID_ROLE`) VALUES
(1, 'daniel', 'valdez', 'lolis@gmail.com', 6),
(2, 'daniel', 'valdez', 'lolis@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `ID` int(11) NOT NULL,
  `PROJECT_NAME` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `COST` decimal(7,2) NOT NULL,
  `CREATION_DATE` date NOT NULL,
  `END_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`ID`, `PROJECT_NAME`, `COST`, `CREATION_DATE`, `END_DATE`) VALUES
(96, 'Apl', '79.00', '2019-05-01', '2019-05-31'),
(112, 'aguado 3', '79.00', '2019-06-01', '2019-06-30'),
(126, 'Aplicación  web', '0.05', '2019-06-08', '2019-06-27'),
(131, '[object Object]', '79.00', '2019-06-08', '2019-06-27'),
(134, 'aguado', '677.00', '2019-06-01', '2019-06-28'),
(135, 'Aplicación  web', '79.00', '2019-06-01', '2019-06-27'),
(138, 'Aplicación  web', '555.00', '2019-06-11', '2019-06-26'),
(142, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(146, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(148, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(149, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(150, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(151, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(152, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(153, 'Aplicación  web', '79.00', '2019-06-19', '2019-06-25'),
(154, 'Aplicación  web', '0.01', '2019-06-07', '2019-06-13'),
(155, 'Aplicación  web', '0.01', '2019-06-07', '2019-06-13'),
(156, '[object Object]', '79.00', '2019-06-13', '2019-06-21'),
(157, '[object Object]', '79.00', '2019-06-13', '2019-06-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_historic`
--

CREATE TABLE `project_historic` (
  `ID_PROJECT` int(11) NOT NULL,
  `ID_EMPLOYEE` int(11) NOT NULL,
  `DAYS_ASSINGNED` int(11) NOT NULL,
  `ASSINGNED_DATE` date NOT NULL,
  `TOTAL_COST` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `DESCRIPTION` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`ID_ROLE`, `DESCRIPTION`) VALUES
(1, 'programador'),
(2, 'programador :3'),
(6, 'Front-End'),
(7, 'Back-End'),
(9, 'programador'),
(10, 'programador'),
(11, 'Programador Analista');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_ROLE` (`ID_ROLE`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `project_historic`
--
ALTER TABLE `project_historic`
  ADD PRIMARY KEY (`ID_PROJECT`,`ID_EMPLOYEE`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `ID_ROLE` FOREIGN KEY (`ID`) REFERENCES `role` (`ID_ROLE`),
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`ID_ROLE`) REFERENCES `role` (`ID_ROLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
