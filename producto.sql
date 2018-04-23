-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-04-2018 a las 04:29:19
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `antena`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(100) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` mediumint(9) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `img_path` varchar(100) NOT NULL DEFAULT '../../recursos/images/antena.png',
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombreProducto`, `precio`, `descripcion`, `cantidad`, `marca`, `modelo`, `categoria`, `img_path`) VALUES
(1, 'Antena parabolica', '450.00', 'la así llamada parábola refleja las ondas electromagnéticas generadas por un dispositivo radiante que se encuentra ubicado en el foco del paraboloide. Los frentes de onda inicialmente esféricos que emite ese dispositivo se convierten en frentes de onda planos al reflejarse en dicha superficie, produciendo ondas más coherentes que otro tipo de antenas.', 21, 'Parabol', 'HTN-45', 'Antenas', '../../recursos/images/antena.png'),
(2, 'Antena parabolica', '450.00', 'la así llamada parábola refleja las ondas electromagnéticas generadas por un dispositivo radiante que se encuentra ubicado en el foco del paraboloide. Los frentes de onda inicialmente esféricos que emite ese dispositivo se convierten en frentes de onda planos al reflejarse en dicha superficie, produciendo ondas más coherentes que otro tipo de antenas.', 21, 'Parabol', 'HTN-45', 'Antenas', '../../recursos/images/antena.png'),
(3, 'Antena parabolica', '450.00', 'la así llamada parábola refleja las ondas electromagnéticas generadas por un dispositivo radiante que se encuentra ubicado en el foco del paraboloide. Los frentes de onda inicialmente esféricos que emite ese dispositivo se convierten en frentes de onda planos al reflejarse en dicha superficie, produciendo ondas más coherentes que otro tipo de antenas.', 0, 'Parabol', 'HTN-45', 'Antenas', '../../recursos/images/antena.png'),
(4, 'Antena parabolica', '450.00', 'la así llamada parábola refleja las ondas electromagnéticas generadas por un dispositivo radiante que se encuentra ubicado en el foco del paraboloide. Los frentes de onda inicialmente esféricos que emite ese dispositivo se convierten en frentes de onda planos al reflejarse en dicha superficie, produciendo ondas más coherentes que otro tipo de antenas.', 21, 'Parabol', 'HTN-45', 'Antenas', '../../recursos/images/antena.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
