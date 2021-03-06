-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2019 a las 15:45:04
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desersoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencias`
--

CREATE TABLE `competencias` (
  `id_competencia` int(11) NOT NULL,
  `nom_competencia` varchar(15) DEFAULT NULL,
  `ver_competencia` varchar(50) DEFAULT NULL,
  `desc_competencia` varchar(250) DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `competencias`
--

INSERT INTO `competencias` (`id_competencia`, `nom_competencia`, `ver_competencia`, `desc_competencia`, `id_programa`) VALUES
(1, 'Ingles', '1', 'Esto es ingles', 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `consulta_trimestre_fichas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `consulta_trimestre_fichas` (
`Ficha` int(11)
,`Trimestre` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desercausa`
--

CREATE TABLE `desercausa` (
  `idDCausa` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `desercausa`
--

INSERT INTO `desercausa` (`idDCausa`, `nombre`) VALUES
(1, 'Falta de interés en el curso'),
(2, 'Dedicación a otros estudios o actividades'),
(3, 'Problemas de salud'),
(4, 'Maternidad '),
(5, 'Problemas familiares o personales'),
(6, 'Problemas laborales'),
(7, 'Problemas económicos'),
(8, 'Problema de servicio militar Problemas de domicilio'),
(9, 'Problemas relacionados con el desarrollo del curso'),
(10, 'Bajo rendimiento académico  y/o práctico'),
(11, 'Indisciplina y mala conducta'),
(12, 'Falta de puntualidad y mala conducta'),
(13, 'Otras causas'),
(14, 'Desconoce la causa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deserciones`
--

CREATE TABLE `deserciones` (
  `id_desercion` int(11) NOT NULL,
  `fecha_reporte` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_desercion1` date NOT NULL,
  `fecha_desercion2` date NOT NULL,
  `fecha_desercion3` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  `id_aprendiz` int(11) NOT NULL,
  `instructor` int(11) NOT NULL,
  `envio_notificacion` date DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `estado_pdf` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deserciones`
--

INSERT INTO `deserciones` (`id_desercion`, `fecha_reporte`, `fecha_desercion1`, `fecha_desercion2`, `fecha_desercion3`, `observaciones`, `id_aprendiz`, `instructor`, `envio_notificacion`, `estado`, `estado_pdf`) VALUES
(1, '2019-02-08 10:00:00', '2019-02-04', '2019-02-05', '2019-02-06', 'fasdf', 3, 5, NULL, NULL, NULL),
(2, '2019-03-03 01:19:45', '2019-03-04', '2019-03-05', '2019-03-06', 'No le interesó el curso.', 16, 4, '2019-03-03', NULL, NULL),
(3, '2019-03-03 00:31:57', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 16, 4, '2019-02-25', 1, 1),
(4, '2019-03-02 15:33:12', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 16, 4, NULL, NULL, NULL),
(5, '2019-03-02 15:36:53', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 3, 4, NULL, NULL, NULL),
(6, '2019-03-02 15:38:21', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 3, 4, NULL, NULL, NULL),
(7, '2019-03-03 00:07:43', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 3, 4, NULL, NULL, NULL),
(8, '2019-03-03 01:27:06', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 3, 4, '2019-03-03', 1, 1),
(9, '2019-03-02 16:05:58', '2019-03-04', '2019-03-05', '2019-03-06', 'test', 3, 4, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deserciones_has_desercausa`
--

CREATE TABLE `deserciones_has_desercausa` (
  `deserciones_id_desercion` int(11) NOT NULL,
  `desercausa_idDCausa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `deserciones_has_desercausa`
--

INSERT INTO `deserciones_has_desercausa` (`deserciones_id_desercion`, `desercausa_idDCausa`) VALUES
(2, 12),
(3, 13),
(4, 4),
(5, 12),
(6, 12),
(7, 4),
(8, 12),
(9, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `nombre_estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `num_ficha` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `id_programa` int(11) DEFAULT NULL,
  `id_trimestre` int(11) DEFAULT NULL,
  `id_jornada` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`num_ficha`, `fecha_inicio`, `fecha_fin`, `id_programa`, `id_trimestre`, `id_jornada`) VALUES
(1205788, '2018-11-15', '2018-11-22', 1, 1, 2),
(1503799, '2017-09-25', '2019-09-26', 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas_has_usuarios`
--

CREATE TABLE `fichas_has_usuarios` (
  `fichas_num_ficha` int(11) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fichas_has_usuarios`
--

INSERT INTO `fichas_has_usuarios` (`fichas_num_ficha`, `usuarios_id_usuario`) VALUES
(1205788, 2),
(1205788, 3),
(1205788, 4),
(1205788, 16),
(1503799, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `id_jornada` int(11) NOT NULL,
  `nom_jornada` varchar(50) DEFAULT NULL,
  `siglas_jornada` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`id_jornada`, `nom_jornada`, `siglas_jornada`) VALUES
(1, 'Diurna', 'J.D'),
(2, 'Nocturna', 'J.N'),
(3, 'Fines de semana', 'J.F.S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id_justificaciones` int(11) NOT NULL,
  `estado_id_estado` int(11) NOT NULL,
  `tipo_justificacion_idtipo_justificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `justificaciones`
--

INSERT INTO `justificaciones` (`id_justificaciones`, `estado_id_estado`, `tipo_justificacion_idtipo_justificacion`) VALUES
(9, 3, 1),
(10, 3, 1),
(11, 3, 1),
(12, 3, 1),
(13, 3, 1),
(14, 3, 1),
(15, 3, 1),
(16, 3, 1),
(17, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nom_programa` varchar(40) DEFAULT NULL,
  `estado_programa` varchar(10) DEFAULT NULL,
  `nvl_programa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nom_programa`, `estado_programa`, `nvl_programa`) VALUES
(1, 'ADSI', 'Activo', 'Tecnologo'),
(2, 'DIM', 'Actvio', 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `tip_rol` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `tip_rol`) VALUES
(1, 'coordinador'),
(2, 'instructor'),
(3, 'aprendiz'),
(4, 'enfermera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_doc` int(11) NOT NULL,
  `Tip_doc` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_doc`, `Tip_doc`) VALUES
(1, 'cédula de ciudadanía '),
(2, 'tarjeta de identidad '),
(3, 'Cedula_extranjeria'),
(4, 'Documento_nacional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_justificacion`
--

CREATE TABLE `tipo_justificacion` (
  `idtipo_justificacion` int(11) NOT NULL,
  `tipo_justificacion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_justificacion`
--

INSERT INTO `tipo_justificacion` (`idtipo_justificacion`, `tipo_justificacion`) VALUES
(1, 'médica'),
(2, 'calamidad doméstica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestres`
--

CREATE TABLE `trimestres` (
  `id_trimestre` int(11) NOT NULL,
  `num_trimestre` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trimestres`
--

INSERT INTO `trimestres` (`id_trimestre`, `num_trimestre`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `id_doc` int(11) NOT NULL,
  `num_documento` varchar(30) DEFAULT NULL,
  `cel_usuario` varchar(11) DEFAULT NULL,
  `tel_usuario` varchar(20) NOT NULL,
  `correo_instu` varchar(30) NOT NULL,
  `correo_perso` varchar(30) NOT NULL,
  `contrasenia` varchar(200) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL,
  `estado_usuario_id_estado` int(11) NOT NULL,
  `roles_id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `imagen`, `create_time`, `nombres`, `apellidos`, `id_doc`, `num_documento`, `cel_usuario`, `tel_usuario`, `correo_instu`, `correo_perso`, `contrasenia`, `token`, `estado_usuario_id_estado`, `roles_id_rol`) VALUES
(1, 'avatar-9.jpg', '2019-03-02 19:53:44', 'Leidy', 'Molina', 1, '123', '123', '123', 'affernandez74@email.co', 'dsad@gsdf.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 1),
(2, 'avatar-8.jpg', '2019-03-02 15:46:29', 'Ana', 'del Arco', 1, '1231', '123456', '123456', 'affernandez76@email.co', 'lucas@dfs.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 4),
(3, 'avatar-10.jpg', '2019-03-03 00:57:12', 'Luca', 'Moundin Bambino', 2, '12345', '12345', '12345', 'affernandez74@misena.edu.co', 'lucas@fsa.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 3),
(4, 'avatar-1.jpg', '2019-03-02 15:46:39', 'Carlos Verto', 'Wilmar', 1, '1234', '1234', '1234', 'affernandez74c@email.co', 'carlos@gmail.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 2),
(16, '', '2019-02-19 14:40:10', 'Liss', 'Pereira', 4, '980780', '453635', '3565', 'sd2f@email.com', 'sd2f@email.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 3),
(18, '', '2019-02-19 14:40:10', 'Juan', 'Garcia', 1, '658', '23145', '4325423', 's22df@email.com', 'sdf2@email.com', '$2y$10$HGrCr0HKHVogPIoXfPY1SuwJQEAliUf9KDZPKWn7anSOl1jGNovEG', '', 1, 3),
(19, '', '2018-12-12 19:45:04', 'Juan', 'Garcia', 3, '46', '5436', '56', '432@adg', 'sdsdaff@email.com', '$2y$10$Z.OislvvFktJht11nIoVjuRmKBkX7/icbaOZpB9KewKTCy39.776y', '', 1, 3),
(20, '', '2018-12-12 19:48:36', 'Karen ', 'Garcia', 4, '435342', '2435234', '4352345', '345@email.com', '345@DSGDAS', '$2y$10$en8vmGttBtJhwmlpIYf13Oq8GsOJ.Y4Za1LsFCMRUX8Bz8U7GhDhC', '', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_has_justificaciones`
--

CREATE TABLE `usuarios_has_justificaciones` (
  `id_usuario` int(11) NOT NULL,
  `id_justificaciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_has_justificaciones`
--

INSERT INTO `usuarios_has_justificaciones` (`id_usuario`, `id_justificaciones`) VALUES
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17);

-- --------------------------------------------------------

--
-- Estructura para la vista `consulta_trimestre_fichas`
--
DROP TABLE IF EXISTS `consulta_trimestre_fichas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consulta_trimestre_fichas`  AS  select `fichas`.`num_ficha` AS `Ficha`,`trimestres`.`num_trimestre` AS `Trimestre` from (`fichas` join `trimestres` on((`fichas`.`id_trimestre` = `trimestres`.`id_trimestre`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD PRIMARY KEY (`id_competencia`),
  ADD KEY `id_programa` (`id_programa`);

--
-- Indices de la tabla `desercausa`
--
ALTER TABLE `desercausa`
  ADD PRIMARY KEY (`idDCausa`);

--
-- Indices de la tabla `deserciones`
--
ALTER TABLE `deserciones`
  ADD PRIMARY KEY (`id_desercion`),
  ADD KEY `fk_deserciones_usuarios1_idx` (`id_aprendiz`);

--
-- Indices de la tabla `deserciones_has_desercausa`
--
ALTER TABLE `deserciones_has_desercausa`
  ADD KEY `fk_deserciones_has_desercausa_deserciones1_idx` (`deserciones_id_desercion`),
  ADD KEY `fk_deserciones_has_desercausa_desercausa1_idx` (`desercausa_idDCausa`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`num_ficha`),
  ADD KEY `id_programa` (`id_programa`),
  ADD KEY `id_trimestre` (`id_trimestre`),
  ADD KEY `id_jornada` (`id_jornada`);

--
-- Indices de la tabla `fichas_has_usuarios`
--
ALTER TABLE `fichas_has_usuarios`
  ADD PRIMARY KEY (`fichas_num_ficha`,`usuarios_id_usuario`),
  ADD KEY `fk_fichas_has_usuarios_fichas1_idx` (`fichas_num_ficha`),
  ADD KEY `fk_fichas_has_usuarios_usuarios2_idx` (`usuarios_id_usuario`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`id_jornada`);

--
-- Indices de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD PRIMARY KEY (`id_justificaciones`,`estado_id_estado`),
  ADD KEY `fk_justificaciones_estado1_idx` (`estado_id_estado`),
  ADD KEY `fk_justificaciones_tipo_justificacion1_idx` (`tipo_justificacion_idtipo_justificacion`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `tipo_justificacion`
--
ALTER TABLE `tipo_justificacion`
  ADD PRIMARY KEY (`idtipo_justificacion`);

--
-- Indices de la tabla `trimestres`
--
ALTER TABLE `trimestres`
  ADD PRIMARY KEY (`id_trimestre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`id_doc`,`estado_usuario_id_estado`,`roles_id_rol`),
  ADD UNIQUE KEY `correo_instu_UNIQUE` (`correo_instu`),
  ADD KEY `fk_usuarios_estado_usuario1_idx` (`estado_usuario_id_estado`),
  ADD KEY `fk_usuarios_roles1_idx` (`roles_id_rol`),
  ADD KEY `fk_usuarios_tipo_documento1_idx` (`id_doc`);

--
-- Indices de la tabla `usuarios_has_justificaciones`
--
ALTER TABLE `usuarios_has_justificaciones`
  ADD PRIMARY KEY (`id_usuario`,`id_justificaciones`),
  ADD KEY `fk_usuarios_has_justificaciones_justificaciones1_idx` (`id_justificaciones`),
  ADD KEY `fk_usuarios_has_justificaciones_usuarios1_idx` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `competencias`
--
ALTER TABLE `competencias`
  MODIFY `id_competencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `desercausa`
--
ALTER TABLE `desercausa`
  MODIFY `idDCausa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `deserciones`
--
ALTER TABLE `deserciones`
  MODIFY `id_desercion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `num_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1503800;

--
-- AUTO_INCREMENT de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  MODIFY `id_jornada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  MODIFY `id_justificaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_justificacion`
--
ALTER TABLE `tipo_justificacion`
  MODIFY `idtipo_justificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `trimestres`
--
ALTER TABLE `trimestres`
  MODIFY `id_trimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `competencias`
--
ALTER TABLE `competencias`
  ADD CONSTRAINT `competencias_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`);

--
-- Filtros para la tabla `deserciones`
--
ALTER TABLE `deserciones`
  ADD CONSTRAINT `fk_deserciones_usuarios1` FOREIGN KEY (`id_aprendiz`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `deserciones_has_desercausa`
--
ALTER TABLE `deserciones_has_desercausa`
  ADD CONSTRAINT `fk_deserciones_has_desercausa_desercausa1` FOREIGN KEY (`desercausa_idDCausa`) REFERENCES `desercausa` (`idDCausa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_deserciones_has_desercausa_deserciones1` FOREIGN KEY (`deserciones_id_desercion`) REFERENCES `deserciones` (`id_desercion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD CONSTRAINT `fichas_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`),
  ADD CONSTRAINT `fichas_ibfk_2` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestres` (`id_trimestre`),
  ADD CONSTRAINT `fichas_ibfk_3` FOREIGN KEY (`id_jornada`) REFERENCES `jornadas` (`id_jornada`);

--
-- Filtros para la tabla `fichas_has_usuarios`
--
ALTER TABLE `fichas_has_usuarios`
  ADD CONSTRAINT `fk_fichas_has_usuarios_fichas1` FOREIGN KEY (`fichas_num_ficha`) REFERENCES `fichas` (`num_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fichas_has_usuarios_usuarios2` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD CONSTRAINT `fk_justificaciones_estado1` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_justificaciones_tipo_justificacion1` FOREIGN KEY (`tipo_justificacion_idtipo_justificacion`) REFERENCES `tipo_justificacion` (`idtipo_justificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_estado_usuario1` FOREIGN KEY (`estado_usuario_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_roles1` FOREIGN KEY (`roles_id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_tipo_documento1` FOREIGN KEY (`id_doc`) REFERENCES `tipo_documento` (`id_doc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios_has_justificaciones`
--
ALTER TABLE `usuarios_has_justificaciones`
  ADD CONSTRAINT `fk_usuarios_has_justificaciones_justificaciones1` FOREIGN KEY (`id_justificaciones`) REFERENCES `justificaciones` (`id_justificaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_justificaciones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
