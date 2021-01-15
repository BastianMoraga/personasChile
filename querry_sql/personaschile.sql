-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-01-2021 a las 16:16:03
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personaschile`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` int(11) DEFAULT NULL,
  `facebook` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `correo` varchar(60) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `telefono`, `facebook`, `correo`) VALUES
(1, 964495250, 'Gina Corey', ''),
(3, NULL, 'Catalina Paz Tudela', NULL),
(4, 959860131, '', ''),
(5, 988078888, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

DROP TABLE IF EXISTS `datos`;
CREATE TABLE IF NOT EXISTS `datos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contextura` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `estatura` int(11) DEFAULT NULL,
  `tez` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `cabello` varchar(30) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `ojos` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id`, `contextura`, `estatura`, `tez`, `cabello`, `ojos`) VALUES
(1, 'Media', 160, 'Clara', 'Negro', 'CastaÃ±os'),
(5, 'Delgada', 165, 'Clara', 'select', 'Cafes'),
(3, 'Delgada', 170, 'Morena Clara', 'Canoso', 'Cafes'),
(6, 'Media', 175, 'Morena Clara', 'CastaÃ±o', 'Cafes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugarfecha`
--

DROP TABLE IF EXISTS `lugarfecha`;
CREATE TABLE IF NOT EXISTS `lugarfecha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `zona` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha` varchar(80) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugarfecha`
--

INSERT INTO `lugarfecha` (`id`, `region`, `zona`, `fecha`) VALUES
(1, 'Region Metropolitana', 'OlmuÃ©', '2020-12-03'),
(6, 'Region de TarapacÃ¡', 'Iquique', '2020-06-18'),
(3, 'Region de Ã‘uble', 'ChillÃ¡n', '2020-12-10'),
(5, 'Region de Bio BÃ­o', 'HualpÃ©n', '2020-03-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `id_datos` int(11) DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `id_lugar_fecha` int(11) DEFAULT NULL,
  `id_contacto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombre`, `edad`, `id_datos`, `descripcion`, `id_lugar_fecha`, `id_contacto`) VALUES
(1, 'Yaniell Michel Aguilar Saavedra', 23, 1, 'Vestimenta: polera celeste, sufre de depresiÃ³n, tiene tatuajes en el cuello, brazo derecho, pecho y piernas. Ultimas ves visto en la plazuela de OlmuÃ©', 1, 1),
(3, 'Sergio Alfredo Castillo Rivas', 49, 3, 'Vestimenta: jeans oscuros, polerón gris, zapatillas grises y mochila negra. Tiene una discapacidad severa, cirrosis hepática, tiene una cicatriz en la rodilla derecha. Visto por ultima ves en Av. Francia con Campaña', 3, 3),
(4, 'HÃ©ctor Ascencio Fuentealba', 78, 5, 'Vestimenta: pantalÃ³n gris, polera blanca con cuello verde, suÃ©ter negro y sombrero gris. Tiene principio de Alzheimer.', 5, 4),
(5, 'Cristian Daniel Lay VelÃ¡squez', 43, 6, 'Vestimenta: polera sport, jeans juveniles. Tiene tatuajes en ambos hombros y pecho. Ultima ves visto en caleta cÃ¡Ã±amo a las afueras de Iquique', 6, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
