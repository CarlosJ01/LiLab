-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-12-2019 a las 10:40:16
-- Versión del servidor: 10.2.29-MariaDB-cll-lve
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laborator_lilab2`
--
CREATE DATABASE IF NOT EXISTS `laborator_lilab2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `laborator_lilab2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

DROP TABLE IF EXISTS `analisis`;
CREATE TABLE IF NOT EXISTS `analisis` (
  `idAnalisis` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPaciente` varchar(5) NOT NULL,
  `rutaPDF` text NOT NULL,
  `fchPublicacion` date NOT NULL,
  `caduca` date NOT NULL,
  `tipoAnalisis` text NOT NULL,
  PRIMARY KEY (`idAnalisis`),
  KEY `foraniaPaciente` (`codigoPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncio`
--

DROP TABLE IF EXISTS `anuncio`;
CREATE TABLE IF NOT EXISTS `anuncio` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `img_1` text DEFAULT NULL,
  `img_2` text DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anuncio`
--

INSERT INTO `anuncio` (`id_anuncio`, `titulo`, `descripcion`, `img_1`, `img_2`, `fecha`) VALUES
(1, 'Exámenes de Sangre (Bioquímicos y Hormonales)', 'Los exámenes de sangre son usados para determinar estados fisiológicos y bioquímicos tales como una enfermedad, contenido mineral, eficacia de drogas, y función de los órganos.\r\n', 'principal_img/WhatsApp Image 2019-11-23 at 11.58.57 PM 41219 122432  carrusel 141219 102835  carrusel.jpeg', 'principal_img/p22 41219 122432  body 141219 102835  body.jpg', '2019-12-14'),
(2, 'Exámenes Microbiológicos', 'El diagnóstico microbiológico es el conjunto de procedimientos y técnicas complementarias empleadas para establecer la etiología del agente responsable de una enfermedad infecciosa.\r\n', 'principal_img/t2 231119 192928  carrusel 141219 102921  carrusel.jpg', 'principal_img/analisis 241119 170524  body 141219 102921  body.jpg', '2019-12-14'),
(3, 'Glucemia', 'La prueba de glucosa en la sangre se usa para averiguar si los niveles de azúcar en la sangre están dentro de límites saludables. A menudo se usa para diagnosticar o vigilar la diabetes.\r\n', NULL, 'principal_img/microbios 231119 192928  body 141219 103028  body.jpg', '2019-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon`
--

DROP TABLE IF EXISTS `buzon`;
CREATE TABLE IF NOT EXISTS `buzon` (
  `idBuzon` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `asunto` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idBuzon`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `buzon`
--

INSERT INTO `buzon` (`idBuzon`, `nombre`, `telefono`, `correo`, `asunto`, `fecha`) VALUES
(1, 'Equipo ITM Lilab', '44 35 33 37 39', ' ', 'Sistema funcionando, esperamos que lo disfrute', '2019-12-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `codigoPaciente` varchar(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Quimico'),
(3, 'Publicitario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nickname` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`nickname`),
  KEY `Usuario_Tipo` (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nickname`, `nombre`, `apellidoP`, `apellidoM`, `password`, `idTipo`) VALUES
('geimar', 'Sin', 'Definir', '', 'geimar06', 3),
('lilab773', 'Lilia', 'Ramos', 'Soberanes', 'lilab773', 1),
('quimico773', 'Sin', 'Definir', '', 'quimico773', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `foraniaPaciente` FOREIGN KEY (`codigoPaciente`) REFERENCES `paciente` (`codigoPaciente`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_Tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
