-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2015 a las 22:08:50
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `malla_turnos`
--
CREATE DATABASE IF NOT EXISTS `malla_turnos` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `malla_turnos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id` int(11) NOT NULL,
  `activo` int(1) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `id_linea_servicio` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `cliente`
--

TRUNCATE TABLE `cliente`;
--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `activo`, `nombre`, `nit`, `id_linea_servicio`) VALUES
(1, 1, 'Nutresa', '45878455', 1),
(2, 1, 'Nutresa', '34634563', 1),
(5, 1, 'asdf', '234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurrencia_malla`
--

CREATE TABLE IF NOT EXISTS `concurrencia_malla` (
`id` int(11) NOT NULL,
  `id_modelo_malla` int(11) NOT NULL,
  `dia` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `cant_analistas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `concurrencia_malla`
--

TRUNCATE TABLE `concurrencia_malla`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_horario`
--

CREATE TABLE IF NOT EXISTS `detalle_horario` (
`id` int(11) NOT NULL,
  `id_horario_cliente` int(11) NOT NULL,
  `dia` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `detalle_horario`
--

TRUNCATE TABLE `detalle_horario`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_cliente`
--

CREATE TABLE IF NOT EXISTS `horario_cliente` (
`id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `horario_cliente`
--

TRUNCATE TABLE `horario_cliente`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_servicio`
--

CREATE TABLE IF NOT EXISTS `linea_servicio` (
`id` int(11) NOT NULL,
  `sigla` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `linea_servicio`
--

TRUNCATE TABLE `linea_servicio`;
--
-- Volcado de datos para la tabla `linea_servicio`
--

INSERT INTO `linea_servicio` (`id`, `sigla`, `descripcion`) VALUES
(1, 'DSI', 'Desarrollo Informático Especializado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_estado_mh`
--

CREATE TABLE IF NOT EXISTS `log_estado_mh` (
  `id` int(11) NOT NULL,
  `id_malla_horario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de apoyo para Log de estados';

--
-- Truncar tablas antes de insertar `log_estado_mh`
--

TRUNCATE TABLE `log_estado_mh`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo_malla`
--

CREATE TABLE IF NOT EXISTS `modelo_malla` (
`id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_horario_cliente` int(11) NOT NULL,
  `cant_analistas` int(11) NOT NULL,
  `cant_backups` int(11) NOT NULL,
  `horas_semanales` int(11) NOT NULL,
  `horas_diarias` int(11) NOT NULL,
  `hora_inicio_almuerzo` time NOT NULL,
  `hora_fin_almuerzo` time NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Truncar tablas antes de insertar `modelo_malla`
--

TRUNCATE TABLE `modelo_malla`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos_malla`
--

CREATE TABLE IF NOT EXISTS `turnos_malla` (
`id` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de apoyo para horarios por defecto';

--
-- Truncar tablas antes de insertar `turnos_malla`
--

TRUNCATE TABLE `turnos_malla`;
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `un_nit_linea` (`nit`,`id_linea_servicio`), ADD KEY `id_linea_servicio` (`id_linea_servicio`);

--
-- Indices de la tabla `concurrencia_malla`
--
ALTER TABLE `concurrencia_malla`
 ADD PRIMARY KEY (`id`), ADD KEY `id_modelo_malla` (`id_modelo_malla`);

--
-- Indices de la tabla `detalle_horario`
--
ALTER TABLE `detalle_horario`
 ADD PRIMARY KEY (`id`), ADD KEY `id_horario_cliente` (`id_horario_cliente`);

--
-- Indices de la tabla `horario_cliente`
--
ALTER TABLE `horario_cliente`
 ADD PRIMARY KEY (`id`), ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `linea_servicio`
--
ALTER TABLE `linea_servicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo_malla`
--
ALTER TABLE `modelo_malla`
 ADD PRIMARY KEY (`id`), ADD KEY `id_cliente` (`id_cliente`), ADD KEY `id_horario_cliente` (`id_horario_cliente`);

--
-- Indices de la tabla `turnos_malla`
--
ALTER TABLE `turnos_malla`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `concurrencia_malla`
--
ALTER TABLE `concurrencia_malla`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_horario`
--
ALTER TABLE `detalle_horario`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario_cliente`
--
ALTER TABLE `horario_cliente`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `linea_servicio`
--
ALTER TABLE `linea_servicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `modelo_malla`
--
ALTER TABLE `modelo_malla`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `turnos_malla`
--
ALTER TABLE `turnos_malla`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
ADD CONSTRAINT `fk_cliente_linea` FOREIGN KEY (`id_linea_servicio`) REFERENCES `linea_servicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `concurrencia_malla`
--
ALTER TABLE `concurrencia_malla`
ADD CONSTRAINT `fk_malla_concurrenica` FOREIGN KEY (`id_modelo_malla`) REFERENCES `modelo_malla` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_horario`
--
ALTER TABLE `detalle_horario`
ADD CONSTRAINT `fk_horario_detalle` FOREIGN KEY (`id_horario_cliente`) REFERENCES `horario_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_cliente`
--
ALTER TABLE `horario_cliente`
ADD CONSTRAINT `fk_horario_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `modelo_malla`
--
ALTER TABLE `modelo_malla`
ADD CONSTRAINT `fk_malla_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_malla_horariocli` FOREIGN KEY (`id_horario_cliente`) REFERENCES `horario_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
