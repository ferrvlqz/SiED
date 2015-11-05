-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2014 a las 01:32:28
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sied`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_de_prof_a_materia`
--

CREATE TABLE IF NOT EXISTS `asignacion_de_prof_a_materia` (
  `id_asignacion` int(11) NOT NULL AUTO_INCREMENT,
  `no_trabajador` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `grado` varchar(11) COLLATE utf8_bin NOT NULL,
  `grupo` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  PRIMARY KEY (`id_asignacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `asignacion_de_prof_a_materia`
--

INSERT INTO `asignacion_de_prof_a_materia` (`id_asignacion`, `no_trabajador`, `id_mat`, `id_car`, `grado`, `grupo`, `id_periodo`) VALUES
(1, 10, 2, 1, '5', 2, 1),
(2, 3, 3, 1, '3', 2, 2),
(3, 4, 2, 1, '3', 2, 2),
(4, 3, 5, 1, '4', 2, 1),
(10, 3, 7, 1, '1', 1, 1),
(11, 3, 8, 1, '1', 1, 1),
(12, 10, 1, 1, '5', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE IF NOT EXISTS `carreras` (
  `id_car` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_car`, `nombre`) VALUES
(1, 'tics'),
(2, 'oci'),
(3, 'mmp'),
(4, 'quimica'),
(5, 'Gastronomia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE IF NOT EXISTS `evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) NOT NULL,
  `no_trabajador` int(11) NOT NULL,
  `tipo` varchar(4) NOT NULL,
  `no_pregunta` int(11) NOT NULL,
  `respuesta` varchar(45) NOT NULL,
  `no_control` varchar(15) NOT NULL,
  `id_materia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `id_periodo`, `no_trabajador`, `tipo`, `no_pregunta`, `respuesta`, `no_control`, `id_materia`) VALUES
(1, 1, 10, 'alum', 1, '5', '20120909', 1),
(2, 1, 10, 'alum', 2, '2', '20120909', 1),
(3, 1, 10, 'alum', 3, '4', '20120909', 1),
(4, 1, 10, 'alum', 4, '1', '20120909', 1),
(5, 1, 10, 'alum', 5, '4', '20120909', 1),
(6, 1, 10, 'alum', 6, '3', '20120909', 1),
(7, 1, 10, 'alum', 7, '4', '20120909', 1),
(8, 1, 10, 'alum', 8, '2', '20120909', 1),
(9, 1, 10, 'alum', 9, '4', '20120909', 1),
(10, 1, 10, 'alum', 10, '5', '20120909', 1),
(11, 1, 10, 'alum', 11, '5', '20120909', 1),
(12, 1, 10, 'alum', 12, '5', '20120909', 1),
(13, 1, 10, 'alum', 13, '5', '20120909', 1),
(14, 1, 10, 'alum', 14, '5', '20120909', 1),
(15, 1, 10, 'alum', 15, '5', '20120909', 1),
(16, 1, 10, 'alum', 16, '5', '20120909', 1),
(17, 1, 10, 'alum', 17, '1', '20120909', 1),
(18, 1, 10, 'alum', 18, '1', '20120909', 1),
(19, 1, 3, 'alum', 1, '1', '20121111', 1),
(20, 1, 3, 'alum', 2, '5', '20121111', 1),
(21, 1, 3, 'alum', 3, '1', '20121111', 1),
(22, 1, 3, 'alum', 4, '5', '20121111', 1),
(23, 1, 3, 'alum', 5, '1', '20121111', 1),
(24, 1, 3, 'alum', 6, '5', '20121111', 1),
(25, 1, 3, 'alum', 7, '2', '20121111', 1),
(26, 1, 3, 'alum', 8, '5', '20121111', 1),
(27, 1, 3, 'alum', 9, '2', '20121111', 1),
(28, 1, 3, 'alum', 10, '5', '20121111', 1),
(29, 1, 3, 'alum', 11, '3', '20121111', 1),
(30, 1, 3, 'alum', 12, '5', '20121111', 1),
(31, 1, 3, 'alum', 13, '3', '20121111', 1),
(32, 1, 3, 'alum', 14, '5', '20121111', 1),
(33, 1, 3, 'alum', 15, '4', '20121111', 1),
(34, 1, 3, 'alum', 16, '5', '20121111', 1),
(35, 1, 3, 'alum', 17, '4', '20121111', 1),
(36, 1, 3, 'alum', 18, '5', '20121111', 1),
(37, 1, 3, 'alum', 1, '5', '20140001', 1),
(38, 1, 3, 'alum', 2, '5', '20140001', 1),
(39, 1, 3, 'alum', 3, '5', '20140001', 1),
(40, 1, 3, 'alum', 4, '5', '20140001', 1),
(41, 1, 3, 'alum', 5, '5', '20140001', 1),
(42, 1, 3, 'alum', 6, '5', '20140001', 1),
(43, 1, 3, 'alum', 7, '5', '20140001', 1),
(44, 1, 3, 'alum', 8, '5', '20140001', 1),
(45, 1, 3, 'alum', 9, '5', '20140001', 1),
(46, 1, 10, 'alum', 10, '5', '20140001', 2),
(47, 1, 10, 'alum', 11, '5', '20140001', 2),
(48, 1, 10, 'alum', 12, '5', '20140001', 2),
(49, 1, 10, 'alum', 13, '5', '20140001', 2),
(50, 1, 10, 'alum', 14, '5', '20140001', 2),
(51, 1, 10, 'alum', 15, '5', '20140001', 2),
(52, 1, 10, 'alum', 16, '5', '20140001', 2),
(53, 1, 10, 'alum', 17, '5', '20140001', 2),
(54, 1, 10, 'alum', 18, '5', '20140001', 2),
(55, 1, 10, 'alum', 1, '1', '20140001', 2),
(56, 1, 10, 'alum', 2, '4', '20140001', 2),
(57, 1, 10, 'alum', 3, '4', '20140001', 2),
(58, 1, 10, 'alum', 4, '4', '20140001', 2),
(59, 1, 10, 'alum', 5, '4', '20140001', 2),
(60, 1, 10, 'alum', 6, '4', '20140001', 2),
(61, 1, 3, 'alum', 7, '4', '20140001', 2),
(62, 1, 3, 'alum', 8, '4', '20140001', 2),
(63, 1, 3, 'alum', 9, '4', '20140001', 2),
(64, 1, 3, 'alum', 10, '4', '20140001', 2),
(65, 1, 3, 'alum', 11, '2', '20140001', 2),
(66, 1, 3, 'alum', 12, '4', '20140001', 2),
(67, 1, 3, 'alum', 13, '4', '20140001', 2),
(68, 1, 3, 'alum', 14, '4', '20140001', 2),
(69, 1, 3, 'alum', 15, '4', '20140001', 2),
(70, 1, 3, 'alum', 16, '4', '20140001', 2),
(71, 1, 3, 'alum', 17, '4', '20140001', 2),
(72, 1, 3, 'alum', 18, '3', '20140001', 2),
(73, 1, 3, 'dir', 1, '5', '14', 2),
(74, 1, 3, 'dir', 2, '5', '14', 2),
(75, 1, 3, 'dir', 3, '5', '14', 2),
(76, 1, 3, 'dir', 4, '5', '14', 2),
(77, 1, 3, 'dir', 5, '5', '14', 2),
(78, 1, 3, 'dir', 6, '5', '14', 2),
(79, 1, 3, 'dir', 7, '5', '14', 2),
(80, 1, 3, 'dir', 8, '5', '14', 2),
(81, 1, 3, 'dir', 9, '5', '14', 2),
(82, 1, 3, 'dir', 10, '5', '14', 2),
(83, 1, 3, 'dir', 11, '5', '14', 2),
(84, 1, 3, 'dir', 12, '5', '14', 2),
(85, 1, 3, 'dir', 13, '5', '14', 2),
(86, 1, 3, 'dir', 14, '5', '14', 2),
(87, 1, 3, 'dir', 15, '5', '14', 2),
(88, 1, 3, 'dir', 16, '5', '14', 2),
(89, 1, 3, 'dir', 17, '5', '14', 2),
(90, 1, 3, 'dir', 18, '5', '14', 2),
(91, 1, 10, 'alum', 17, '1', '20120909', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grup` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_bin NOT NULL,
  `id_car` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  PRIMARY KEY (`id_grup`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grup`, `nombre`, `id_car`, `id_mat`) VALUES
(1, '5TIC1', 1, 1),
(2, '5TIC2', 1, 2),
(3, '2GAS1', 5, 1),
(4, '3GAS1', 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_gral_estudiantes`
--

CREATE TABLE IF NOT EXISTS `info_gral_estudiantes` (
  `no_ctrl` int(11) NOT NULL,
  `id_car` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `a_paterno` varchar(45) COLLATE utf8_bin NOT NULL,
  `a_materno` varchar(45) COLLATE utf8_bin NOT NULL,
  `sexo` varchar(45) COLLATE utf8_bin NOT NULL,
  `grado` int(1) NOT NULL,
  `grupo` int(2) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`no_ctrl`),
  KEY `grado` (`grado`),
  KEY `grupo` (`grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `info_gral_estudiantes`
--

INSERT INTO `info_gral_estudiantes` (`no_ctrl`, `id_car`, `nombre`, `a_paterno`, `a_materno`, `sexo`, `grado`, `grupo`, `id_status`) VALUES
(20120000, 4, 'Amdres', 'Mora', 'Gutierrez', 'M', 5, 2, 1),
(20120808, 3, 'Augusto', 'Cesar', 'Lopez', 'M', 4, 2, 1),
(20120909, 1, 'Fernanda', 'Velazquez', 'Guzman', 'F', 5, 2, 1),
(20120958, 2, 'Alejandro', 'Del Angel', 'Ruiz', 'M', 5, 2, 1),
(20121111, 1, 'Carmen', 'Gallegos', 'Flores', 'F', 4, 2, 1),
(20140001, 1, 'prueba alumno ', 'Bonnie', 'brust', 'femenin', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id_mat` int(11) NOT NULL,
  `nombremat` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_mat`, `nombremat`) VALUES
(1, 'español'),
(2, 'matematicas'),
(3, 'ingles'),
(4, 'base de datos'),
(5, 'frances'),
(6, 'aplicaciones'),
(7, 'redes'),
(8, 'integradora I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE IF NOT EXISTS `periodos` (
  `id_periodo` int(11) NOT NULL,
  `periodo` varchar(45) COLLATE utf8_bin NOT NULL,
  `ciclo_estado` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `periodo`, `ciclo_estado`) VALUES
(1, 'Ene-Abr', ''),
(2, 'May-Agos', ''),
(3, 'Sep-Dic', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE IF NOT EXISTS `planes` (
  `id_plan` int(11) NOT NULL,
  `cuatrimestre` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id_plan`, `cuatrimestre`, `id_carrera`, `id_mat`) VALUES
(1, 2, 1, 2),
(2, 4, 2, 1),
(3, 4, 3, 3),
(4, 2, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'vigente'),
(2, 'no vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'todos'),
(2, 'director'),
(3, 'ptc'),
(4, 'por horas'),
(5, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `no_ctrl` int(8) NOT NULL,
  `pass` varchar(16) COLLATE utf8_bin NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  PRIMARY KEY (`no_ctrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`no_ctrl`, `pass`, `id_status`, `id_tipo`) VALUES
(3, 'hola', 1, 3),
(4, 'hola', 1, 3),
(5, 'hola', 1, 3),
(6, 'hola', 1, 3),
(7, 'hola', 1, 3),
(8, 'hola', 1, 3),
(10, '123', 1, 4),
(11, '123', 1, 3),
(12, 'docente', 1, 3),
(13, '123', 1, 3),
(14, '123', 1, 2),
(12345, 'director', 1, 2),
(20120000, 'alumno', 1, 5),
(20120808, 'alumno', 1, 5),
(20120909, 'fernanda', 1, 5),
(20120958, 'alumno', 1, 5),
(20121111, 'alumno', 1, 5),
(20140001, 'bonnie', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_administrativos`
--

CREATE TABLE IF NOT EXISTS `usuarios_administrativos` (
  `no_trabajador` int(11) NOT NULL,
  `nombreadm` varchar(45) COLLATE utf8_bin NOT NULL,
  `cargo` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `tel` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  PRIMARY KEY (`no_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuarios_administrativos`
--

INSERT INTO `usuarios_administrativos` (`no_trabajador`, `nombreadm`, `cargo`, `id_carrera`, `tel`, `email`, `id_tipo`, `id_status`) VALUES
(3, 'Bonnie', 'docente', 1, '12345678', 'asdfghj', 3, 1),
(4, 'sdfvb', 'docente', 1, '234567', 'dfgvbn', 3, 1),
(5, 'vcxh', 'docente', 1, '435436', 'cvnvm', 3, 1),
(6, 'etyuiou', 'docente', 1, '21212', 'bgbgbg', 3, 1),
(7, 'wertyui', 'docente', 1, '234567', 'dfghj', 3, 1),
(8, 'etrtrt', 'docente', 1, '1222', 'wwww', 3, 1),
(10, 'fulanito', 'docente', 1, '1233214', 'fulanito@gmail.com', 4, 1),
(13, 'Ernie', 'PTC', 1, '65985', 'ftrehr', 3, 1),
(14, 'Reynaga', 'Director', 1, '65959', 'fesgweg', 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
