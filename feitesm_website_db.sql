-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2015 a las 18:58:14
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

CREATE DATABASE feitesm_website_db;
USE feitesm_website_db;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
(1, '117726784827535638854', 'feitesmwebsite@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE IF NOT EXISTS `informacion` (
  `id_inf` int(11) NOT NULL AUTO_INCREMENT,
  `id_org` int(11) NOT NULL,
  `tabla_titulo` varchar(60) NOT NULL DEFAULT 'Nueva Tab',
  `titulo` varchar(50) DEFAULT 'Titulo',
  `contenido` varchar(1200) DEFAULT 'Contenido',
  `img_url` varchar(255) DEFAULT '/feitesm-website/images/default.jpg',
  `contacto` tinyint(1) NOT NULL,
  `redes` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_inf`),
  KEY `org_deletion` (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`id_inf`, `id_org`, `tabla_titulo`, `titulo`, `contenido`, `img_url`, `contacto`, `redes`) VALUES
(1, 1, 'Quienes Somos', '¡Bienvenidos!', 'La FEITESM es un órgano estudiantil conformado por alumnos encargados de representar los intereses de la federación de estudiantes del Tec de Monterrey, siendo el vínculo entre los estudiantes y las autoridades con la finalidad de mejorar la calidad de vida estudiantil.', 'images/feitesm/quienessomos.jpg', 0, 0),
(4, 2, 'Quiénes somos', '¡Bienvenidos!', 'Somos el consejo que busca despertar la conciencia de solidaridad de los líderes estudiantiles e impulsar su iniciativa en emprendimiento social, encausándola para conectarla con esfuerzos de distintos actores.', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZnFVT3FyUktzX0E', 0, 0),
(5, 2, 'Contacto', '', '', '/feitesm-website/images/default.jpg', 1, 0),
(8, 2, 'Redes Sociales', '', '', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TExFQllid0Vyenc', 0, 1),
(9, 3, 'Quiénes somos', '¡Bienvenidos!', 'En el CARE se concentran todas las asociaciones estudiantiles de los diferentes estados de México y países de Latinoamérica.', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RExIU2Z3a1BMTGM', 0, 0),
(10, 3, 'Contacto', '', '', '/feitesm-website/images/default.jpg', 1, 0),
(11, 3, 'Redes sociales', '', '', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2a2lNNWkyUW5oOHM', 0, 1),
(12, 4, 'Quiénes somos', '¡Bienvenidos!', 'Somos el Consejo que tiene como objetivo impulsar y hacer crecer dentro y fuera del Campus a las Comunidades Estudiantiles, así como también tengan un impacto social. Impulsamos iniciativas de Responsabilidad Social, Cultura, Deportes y Emprendimiento Académico con el fin de representar los intereses de las Comunidades Estudiantiles del Campus Monterrey.', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RGdEVThHSzJtU3M', 0, 0),
(13, 4, 'Contacto', '', '', '/feitesm-website/images/default.jpg', 1, 0),
(14, 4, 'Redes sociales', '', '', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2WVJFbFVzM2thZEE', 0, 1),
(15, 5, 'Quiénes somos', '¡Bienvenidos!', 'El Consejo Estudiantil de Filantropía es uno de los siete consejos de la Federación de Estudiantes del ITESM responsable de transformar vidas a través de la promoción del Sentido Humano en el Campus Monterrey, la representación de los alumnos becados y la coordinación de los procesos de becas de grupos estudiantiles. Su objetivo es fomentar el valor de la filantropía dentro de la comunidad estudiantil además de promover la creación y el desarrollo de los fondos de becas en los distintos grupos estudiantiles. Busca sensibilizar al alumnado en cuanto a la trascendencia de sus acciones, que puestas al servicio de los demás, pueden elevar el nivel de vida de las personas en nuestro país.', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2cThKVU9zV1JsMEk', 0, 0),
(16, 5, 'Contacto', '', '', '/feitesm-website/images/default.jpg', 1, 0),
(17, 5, 'Redes Sociales', '', '', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2SldBZ3JiVER2aE0', 0, 1),
(18, 6, 'Quiénes somos', '¡Bienvenidos!', 'El Consejo de Sociedades de Alumnos del Tecnológico de Monterrey busca fortalecer las competencias de trabajo en equipo y gestión de proyectos de las Sociedades de Alumnos con la intención de que se generen eventos de auténtico impacto estudiantil. Así mismo, el Consejo de Sociedades de Alumnos brindará herramientas para fomentar el desarrollo de iniciativas transversales entre sus miembros, fomentando las alianzas por área académica, intereses afines o mera innovación.', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2eDZ5ZFFyel9iOTA', 0, 0),
(19, 6, 'Contacto', '', '', '/feitesm-website/images/default.jpg', 1, 0),
(20, 6, 'Redes sociales', '', '', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bWtOcGF2TnJGV3c', 0, 1);

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
  `cargo` varchar(255) DEFAULT NULL,
  `img_url` varchar(255) NOT NULL DEFAULT 'images\\personas\\default.png',
  PRIMARY KEY (`id_int`),
  KEY `Eliminar Integrantes` (`id_org`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id_int`, `id_org`, `nombres`, `apellido_p`, `apellido_m`, `cargo`, `img_url`) VALUES
(1, 1, 'Rolando Andrés', 'Ramírez', '', 'Presidente', 'images/feitesm/equipo/PRESIDENTE.png'),
(2, 1, 'Mayra Gabriela', 'García', '', 'Vicepresidente', 'images/feitesm/equipo/VICEPRESIDENTE.png'),
(3, 1, 'Rigoberto', 'Gómez', '', 'Secretaría General', 'images/feitesm/equipo/SECRETARIA.png'),
(4, 1, 'Perla', 'Caballero', '', 'Director de Planeación', 'images/feitesm/equipo/PLANEACION.png'),
(5, 1, 'Nancy ', 'Bautista', '', 'Director de Finanzas', 'images/feitesm/equipo/FINANZAS.png'),
(6, 1, 'Estefanía', 'Leal', '', 'Director de Comunicación', 'images/feitesm/equipo/COMUNICACION.png'),
(7, 1, 'Ceci', 'Fernández', '', 'Director CAM', 'images/feitesm/equipo/CAM.png'),
(8, 1, 'Martha Alejandra', 'Paredes', '', 'Director CARE', 'images/feitesm/equipo/CARE.png'),
(9, 1, 'Rafa', 'Vélez', '', 'Director CCE', 'images/feitesm/equipo/CCE.png'),
(10, 1, 'Lore', 'Flores', '', 'Director CEF', 'images/feitesm/equipo/CEF.png'),
(13, 5, 'Lorena', 'Flores', '', 'Directora', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2SWZxSHI4SkhDZlU'),
(14, 5, 'Mariana', 'Gomezgil', '', 'Secretaría', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2MVNtQ25VRU41YjQ'),
(15, 5, 'Kermith', 'Morales', '', 'Comunicación e Imagen', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2cTQ0MXI4Nzl0N1k'),
(16, 5, 'Maricarmen', 'Ocejo', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2dzNSaDExOXpCams'),
(17, 5, 'Paloma', 'Santos', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2U2dsclhfOTdCRVk'),
(18, 5, 'Paola', 'Madero', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2S2d4Y0w3NnFIbXc'),
(19, 5, 'Xavier', 'Sempere', '', 'Campañas Financieras', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2dUp0Y2hMOXMtRTg');

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
  `siglas` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(600) NOT NULL,
  `email_contacto` varchar(50) DEFAULT NULL,
  `logo_url` varchar(255) NOT NULL DEFAULT 'images\\organizaciones\\default.jpg',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `id_org_padre` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_org`),
  UNIQUE KEY `siglas` (`siglas`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=97 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`id_org`, `siglas`, `nombre`, `descripcion`, `email_contacto`, `logo_url`, `facebook`, `twitter`, `instagram`, `id_org_padre`) VALUES
(1, 'FEITESM', 'Federación de Estudiantes del Tecnológico de Monterrey, Campus Monterrey.', '', 'ejemplo@mail.com', 'images\\organizaciones\\default.jpg', 'https://www.facebook.com/feitesm.mty', 'https://twitter.com/feitesm_mty', NULL, NULL),
(2, 'cam', 'Consejo de Acciones por México', '', 'ejemplo@mail.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZnFVT3FyUktzX0E', 'https://www.facebook.com/cam.mty', 'https://twitter.com/cam_mty', 'https://instagram.com/cam.mty', 1),
(3, 'care', 'Consejo de Asociaciones Regionales y Extranjeras', '', 'ejemplo@mail.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RExIU2Z3a1BMTGM', 'https://www.facebook.com/caremty', 'https://twitter.com/CARE_Mty', 'https://instagram.com/care_mty', 1),
(4, 'cce', 'Consejo de Comunidades Estudiantiles', '', 'ejemplo@mail.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2RGdEVThHSzJtU3M', 'https://www.facebook.com/consejoce', '', 'https://instagram.com/cce_mty', 1),
(5, 'cef', 'Consejo Estudiantil de Filantropía', '', 'ejemplo@mail.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2cThKVU9zV1JsMEk', 'https://www.facebook.com/cefmty', '', 'https://instagram.com/cef_mty', 1),
(6, 'csa', 'Consejo de Sociedades de Alumnos', '', 'ejemplo@mail.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2eDZ5ZFFyel9iOTA', 'https://www.facebook.com/ConsejoSA', 'https://twitter.com/csa_mty', NULL, 1),
(7, 'CSA_SAA', 'Sociedad De Alumnos De Arquitectura', 'Descripcion', 'email@ejemplo.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', '#', '#', '#', 6),
(9, 'CAM_E', 'Edificar', 'asdasdasd', 'email@ejemplo.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bVRkTFFFNUd4d3M', 'face', 'twt', 'inst', 2),
(10, 'CAM_R', 'Recrea', 'asdasdasd', 'email@ejemplo.com', 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2bVRkTFFFNUd4d3M', 'face', 'twt', 'inst', 2),
(11, 'CARE_AEC', 'Asociación de Estudiantes de Coahuila', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg', NULL, NULL, NULL, 3),
(12, 'CARE_AET', 'Asociación de Estudiantes de Tamaulipas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg', NULL, NULL, NULL, 3),
(15, 'CARE_AETA', 'Asociación de Estudiantes de Tabasco', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg', NULL, NULL, NULL, 3),
(16, 'CARE_AEV', 'Asociación de Estudiantes de Veracruz', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2TVMyUmFLWTRCaTg', NULL, NULL, NULL, 3),
(17, 'CCE_AC', 'Abriendo Caminos', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(18, 'CCE_AICE', 'American Institute of Chemical Engineers', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(19, 'CCE_ASCE', 'American Society of Civil Engineers', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(20, 'CCE_ASME', 'American Society of Mechanical Engineers', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(21, 'CCE_APICS', 'APICS', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(22, 'CCE_ACCME', 'Asociación de Cineastas Creativos de Monterrey por Estudiantes', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(23, 'CCE_AEDC', 'Asociación de Estudiantes de Difusión Cultural', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(24, 'CCE_AEPI', 'Asociación Estudiantil por los Pueblos Indígenas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(25, 'CCE_AIRE', 'Asociación por la Integración, Respeto y Equidad', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(26, 'CCE_ACM', 'Association for Computing Machinery', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(27, 'CCE_AWS', 'Association of Women Surgeons', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(28, 'CCE_BCDPT', 'Borregos Club Deportivo Parkour Tec', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(29, 'CCE_C', 'Caremisiones', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(30, 'CCE_CCJ', 'Club de Cultura Japonesa', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(31, 'CCE_CF', 'Club de Fotografía', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(32, 'CCE_CT', 'Club de Tenis', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(33, 'CCE_CTJJB', 'Club Tec de Jiu Jitsu Brasileño', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(34, 'CCE_CZNL', 'Creciendo con Zaragoza, N.L.', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(35, 'CCE_DH', 'Dejando Huella', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(36, 'CCE_GAMSM', 'Grupo Águilas México, Sede Monterrey', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(37, 'CCE_GNP', 'Grupo Nueva Prensa', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(38, 'CCE_GVBM', 'Grupo Valores Brigadas Misioneras', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(39, 'CCE_HIPOTEC', 'HIPOTEC', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(40, 'CCE_H', 'Hormigas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(41, 'CCE_IFTSACM', 'Institute of Food Technologists Student Association Capítulo Monterrey', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(42, 'CCE_IIE', 'Institute of Industrial Engineers', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(43, 'CCE_IMEF', 'Instituto Mexicano Ejecutivos de Finanzas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(44, 'CCE_IDPSA', 'International Degree Program Student Association', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(45, 'CCE_JUNLCETM', 'Jóvenes Unidos por Nuevo León Capítulo Estudiantil Tec de Monterrey', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(46, 'CCE_L', 'LATIDOS', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(47, 'CCE_MT', 'Mujeres en Tecnología', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(48, 'CCE_OHANA', 'OHANA', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(49, 'CCE_PLEI', 'Programa de Liderazgo Empresarial Internacional', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(50, 'CCE_PDIQ', 'Programa para el Desarrollo del Ingeniero Químico', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(51, 'CCE_REIEEE', 'Rama Estudiantil IEEE Sección MTY', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(52, 'CCE_Rugby', 'Rugby', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(53, 'CCE_SEIMIQ', 'Sección Estudiantil del Instituto Mexicano de Ingeniero Química', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(54, 'CCE_SMEBB', 'Sociedad Mexicana de Estudiantes de Biotecnología y Bioingenieria', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2ZjBFYWpCcHM5SW8', NULL, NULL, NULL, 4),
(55, 'CSA_LAD', 'Sociedad de Alumnos de Licenciado en Animación y Arte Digital', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(56, 'CSA_LDI', 'Sociedad de Alumnos de Licenciado en Diseño Industrial', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(57, 'CSA_CQ', 'Sociedad de Alumnos de Ciencias Químicas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(58, 'CSA_IA', 'Sociedad de Alumnos de Ingeniero en Agrobiotecnología', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(59, 'CSA_IB', 'Sociedad de Alumnos de Ingeniero en Bionegocios', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(60, 'CSA_IBIOT', 'Sociedad de Alumnos de Ingeniero en Biotecnología', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(61, 'CSA_IIA', 'Sociedad de Alumnos de Ingeniero en Industrias Alimentarias', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(62, 'CSA_IBM', 'Sociedad de Alumnos de Ingeniero Biomédico', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(63, 'CSA_LNBI', 'Sociedad de Alumnos de Licenciado en Nutrición y Bienestar Integral', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(64, 'CSA_LPCS', 'Sociedad de Alumnos de Licenciado en Psicología Clínica y de la Salud', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(65, 'CSA_MCO', 'Sociedad de Alumnos de Médico Cirujano Odontólogo', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(66, 'CSA_IC', 'Sociedad de Alumnos de Ingeniero Civil', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(67, 'CSA_IDA', 'Sociedad de Alumnos de Ingeniero en Diseño Automotriz', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(68, 'CSA_IDS', 'Sociedad de Alumnos de Ingeniero en Desarrollo Sustentable', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(69, 'CSA_IFI', 'Sociedad de Alumnos de Ingeniero Físico Industrial', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(70, 'CSA_I2D', 'Sociedad de Alumnos de Ingeniero en Innovación y Desarrollo', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(71, 'CSA_IIS', 'Sociedad de Alumnos de Ingeniero Ingeniero Industrial y de Sistemas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(72, 'CSA_IMA', 'Sociedad de Alumnos de Ingeniero Mecánico Administrador', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(73, 'CSA_IME', 'Sociedad de Alumnos de Ingeniero Mecánico Electricista', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(74, 'CSA_IM', 'Sociedad de Alumnos de Ingeniero Mecatrónica', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(75, 'CSA_INTI', 'Sociedad de Alumnos de Ingeniero en Negocios y Tecnologías de Información', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(76, 'CSA_IQ', 'Sociedad de Alumnos de Ingeniero Químico', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(77, 'CSA_ISD', 'Sociedad de Alumnos de Ingeniero en Sistemas Digitales y Robótica', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(78, 'CSA_ITC', 'Sociedad de Alumnos de Ingeniero en Tecnologías Computacionales', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(79, 'CSA_ICMD', 'Sociedad de Alumnos de Licenciado en Comunicación y Medios Digitales', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(80, 'CSA_CPF', 'Sociedad de Alumnos de Contaduría Pública y Finanzas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(81, 'CSA_IMI', 'Sociedad de Alumnos de Ingeniero en Producción Musical Digital', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(82, 'CSA_LAE', 'Sociedad de Alumnos de Licenciado en Administración de Empresas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(83, 'CSA_LAF', 'Sociedad de Alumnos de Licenciado en Administración Financiera', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(84, 'CSA_LCDE', 'Sociedad de Alumnos de Licenciado en Creación y Desarrollo de Empresas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(85, 'CSA_LEC', 'Sociedad de Alumnos de Licenciado en Economía', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(86, 'CSA_LDF', 'Sociedad de Alumnos de Licenciado en Derecho y Finanzas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(87, 'CSA_LM', 'Sociedad de Alumnos de Licenciado en Mercadotecnia', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(88, 'CSA_LNI', 'Sociedad de Alumnos de Licenciado en Negocios Internacionales', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(89, 'CSA_LLH', 'Sociedad de Alumnos de Licenciado en Letras Hispánicas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(90, 'CSA_LP', 'Sociedad de Alumnos de Licenciado en Psicología', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(91, 'CSA_LCP', 'Sociedad de Alumnos de Licenciado en Ciencias Políticas', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(92, 'CSA_LPCM', 'Sociedad de Alumnos de Licenciado en Publicidad y Comunicación de Mercados', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(93, 'CSA_LPO', 'Sociedad de Alumnos de Licenciado en Psicología Organizacional', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(94, 'CSA_LPMI', 'Sociedad de Alumnos de Licenciado en Periodismo y Medios de Información', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(95, 'CSA_LRI', 'Sociedad de Alumnos de Licenciado en Relaciones Internacionales', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6),
(96, 'CSA_LMC', 'Sociedad de Alumnos de Médico Cirujano', '', NULL, 'https://drive.google.com/uc?export=download&id=0B_V63ukt6Nk2d2taVTNKQk5CcDg', NULL, NULL, NULL, 6);

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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `activity`, `access_token`) VALUES
(1, '2015-05-08 02:24:08', '{"access_token":"ya29.bAGrgxQyJhw_9YsXFvD0a9wLiklv7HUgTP1rwAXYfM5FRvblI1rda4YoNYx3b00PG7YWwTw875A1ZA","token_type":"Bearer","expires_in":3599,"id_token":"eyJhbGciOiJSUzI1NiIsImtpZCI6IjgwNmFlMDIxZjNmZDA5M2EzYWIzODE1NjQwMzUzMjhiMDQ0MjNlNmYifQ.eyJpc3MiOiJhY2');

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
