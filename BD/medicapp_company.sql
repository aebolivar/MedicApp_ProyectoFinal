-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicapp_company`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactenos`
--

DROP TABLE IF EXISTS `contactenos`;
CREATE TABLE IF NOT EXISTS `contactenos` (
  `Nombre` varchar(25) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Cliente` varchar(25) NOT NULL,
  `Solicitud` varchar(25) NOT NULL,
  `Mensaje` varchar(25) CHARACTER SET ucs2 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vitaminas`
--

DROP TABLE IF EXISTS `productos_vitaminas`;
CREATE TABLE IF NOT EXISTS `productos_vitaminas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Precio` varchar(25) NOT NULL,
  `Direccion` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_cliente`
--

DROP TABLE IF EXISTS `productos_cliente`;
CREATE TABLE IF NOT EXISTS `productos_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Precio` varchar(25) NOT NULL,
  `Direccion` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_capsulas`
--

DROP TABLE IF EXISTS `productos_capsulas`;
CREATE TABLE IF NOT EXISTS `productos_capsulas` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Precio` varchar(25) NOT NULL,
  `Direccion` varchar(25) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usu` int(1) NOT NULL,
  `descripcion_tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id_tipo_usu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usu`, `descripcion_tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_personas`
--

DROP TABLE IF EXISTS `usuarios_personas`;
CREATE TABLE IF NOT EXISTS `usuarios_personas` (
  `Tipo_documento` varchar(20) NOT NULL,
  `ID_persona` int(15) NOT NULL,
  `Nombre_persona` varchar(50) NOT NULL,
  `Apellidos_persona` varchar(50) NOT NULL,
  `Direccion_persona` varchar(60) NOT NULL,
  `Correo_persona` varchar(40) NOT NULL,
  `Password_persona` varchar(250) NOT NULL,
  `Foto_persona` varchar(1000) NOT NULL,
  `Fecha_registro` varchar(30) NOT NULL,
  `id_tipo` int(1) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_persona`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios_personas`
--

INSERT INTO `usuarios_personas` (`Tipo_documento`, `ID_persona`, `Nombre_persona`, `Apellidos_persona`, `Direccion_persona`, `Correo_persona`, `Password_persona`, `Foto_persona`, `Fecha_registro`, `id_tipo`, `last_session`, `token_password`, `password_request`) VALUES
('900', 12345678, 'super', 'admin', 'calle 123', 'superadmin@medicappcompany.com', '$2y$10$BERVy9bDkW/dYqrMSVLT1OIPbnWBGkC17rXMxF8Cv475xEjVjauqi', '', '27/08/20', 1, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
