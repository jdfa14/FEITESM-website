-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2015 a las 17:40:43
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

CREATE DATABASE feitesm_website_db;
USE feitesm_website_db;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-06:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `feitesm_website_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `google_users`
--

CREATE TABLE IF NOT EXISTS `google_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `google_id` decimal(21,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `google_id` (`google_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `google_users`
--

INSERT INTO `google_users` (`id`, `google_id`, `email`, `admin`) VALUES
(1, '117726784827535638854', 'jdfa14@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE IF NOT EXISTS `informacion` (
  `id_inf` int(11) NOT NULL AUTO_INCREMENT,
  `id_org` int(11) NOT NULL,
  `tabla_titulo` varchar(60) NOT NULL DEFAULT 'Nueva Tab',
  `titulo` varchar(50) DEFAULT 'Titulo',
  `contenido` varchar(255) DEFAULT 'Contenido',
  `img_url` varchar(255) DEFAULT 'images/default.jpg',
  `contacto` tinyint(1) NOT NULL,
  `redes` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_inf`),
  KEY `org_deletion` (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id_inf`, `id_org`, `tabla_titulo`, `titulo`, `contenido`, `img_url`, `contacto`, `redes`) VALUES
(1, 1, 'Quienes Somos', '¡Bienvenidos!', 'La FEITESM es un órgano estudiantil conformado por alumnos encargados de representar los intereses de la federación de estudiantes del Tec de Monterrey, siendo el vínculo entre los estudiantes y las autoridades con la finalidad de mejorar la calidad de vi', 'images/feitesm/quienessomos.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE IF NOT EXISTS `integrantes` (
  `id_int` int(11) NOT NULL AUTO_INCREMENT,
  `id_org` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `apellido_p` varchar(60) NOT NULL,
  `apellido_m` varchar(60) DEFAULT '',
  `cargo` varchar(30) DEFAULT '',
  `img_url` varchar(255) NOT NULL DEFAULT 'images\\personas\\default.png',
  PRIMARY KEY (`id_int`),
  KEY `Eliminar Integrantes` (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id_int`, `id_org`, `nombres`, `apellido_p`, `apellido_m`, `cargo`, `img_url`) VALUES
(1, 1, 'Rolando Andrés', 'Ramírez', '', 'Presidente', 'images/feitesm/equipo/PRESIDENTE.png'),
(2, 1, 'Mayra Gabriela', 'García', '', 'Vicepresidente', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2VE0ySG9YNDczWmc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `id_org` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT 'images\\organizaciones\\default.jpg',
  PRIMARY KEY (`id_mesa`,`id_org`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guardara cada mesa de las asosiaciones' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
  `id_org` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email_contacto` varchar(50) DEFAULT NULL,
  `logo_url` varchar(255) NOT NULL DEFAULT 'images\\organizaciones\\default.jpg',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `id_org_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`id_org`, `nombre`, `email_contacto`, `logo_url`, `facebook`, `twitter`, `id_org_padre`) VALUES
(1, 'feitesm', 'ejemplo@mail.com', 'images\\organizaciones\\default.jpg', 'https://www.facebook.com/feitesm.mty', 'https://twitter.com/feitesm_mty', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `org_deletion` FOREIGN KEY (`id_org`) REFERENCES `organizacion` (`id_org`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD CONSTRAINT `Eliminar Integrantes` FOREIGN KEY (`id_org`) REFERENCES `organizacion` (`id_org`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
