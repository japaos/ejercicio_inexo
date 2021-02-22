-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2021 a las 04:27:34
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inexoo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `cantPacientes` int(11) NOT NULL,
  `nombreEspecialista` varchar(40) NOT NULL,
  `tipoconsulta` varchar(20) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `atendidos` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id`, `cantPacientes`, `nombreEspecialista`, `tipoconsulta`, `estado`, `atendidos`) VALUES
(12, 0, 'Romario', 'urgencia', 'ocupado', 1),
(80, 0, 'Melissa', 'cgi', 'ocupado', 1),
(99, 0, 'Rita', 'pediatria', 'ocupado', 1),
(333, 0, 'toto quinatinna', 'cgi', 'ocupado', 1),
(432, 0, 'camila salva', 'cgi', 'ocupado', 1),
(983, 0, 'juanito ssalvador', 'urgencia', 'ocupado', 1),
(987, 0, 'romero romerillo', 'pediatria', 'ocupado', 1),
(999, 0, 'milano ssalvador', 'pediatria', 'ocupado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL DEFAULT 1,
  `historia` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL DEFAULT 1,
  `riesgo` float NOT NULL,
  `hora_ingreso` time NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(20) NOT NULL DEFAULT 'Pendiente',
  `asignacion` varchar(20) NOT NULL DEFAULT 'urgencia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `edad`, `historia`, `prioridad`, `riesgo`, `hora_ingreso`, `estado`, `asignacion`) VALUES
(1, 'ramiro ramirez romero', 22, 222, 2, 0, '18:36:16', 'atendido', 'cgi'),
(2, 'julio jaramillo jil', 33, 2223, 10, 3.3825, '18:36:16', 'atendido', 'urgencia'),
(3, 'sofie herrera', 16, 324, 6, 0.96, '22:05:06', 'pendiente', 'urgencia'),
(4, 'camila mondragon libano', 29, 999, 9, 2.6825, '22:05:40', 'atendido', 'urgencia'),
(5, 'sergio alejandro maximo', 25, 800, 3, 0.5, '22:06:38', 'atendido', 'cgi'),
(6, 'lion f kennedy', 32, 32, 2, 0.64, '00:17:03', 'atendido', 'cgi'),
(7, 'emilia', 80, 45, 8, 11.7, '10:07:34', 'pendiente', 'urgencia'),
(8, 'mariano', 1, 2234, 4, 0.04, '19:53:34', 'atendido', 'pediatria'),
(9, 'cristina', 1, 934, 4, 0.04, '19:53:48', 'atendido', 'pediatria'),
(10, 'carol', 13, 1112, 2, 0.26, '19:54:19', 'atendido', 'pediatria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_anciano`
--

CREATE TABLE `p_anciano` (
  `id` int(11) NOT NULL,
  `dieta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_anciano`
--

INSERT INTO `p_anciano` (`id`, `dieta`) VALUES
(45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_joven`
--

CREATE TABLE `p_joven` (
  `id` int(11) NOT NULL,
  `fumador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_joven`
--

INSERT INTO `p_joven` (`id`, `fumador`) VALUES
(222, 0),
(2223, 3),
(324, 1),
(999, 10),
(800, 0),
(32, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `p_ninno`
--

CREATE TABLE `p_ninno` (
  `id` int(11) NOT NULL,
  `peso_e` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `p_ninno`
--

INSERT INTO `p_ninno` (`id`, `peso_e`) VALUES
(2234, 1),
(934, 1),
(1112, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `historia` (`historia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
