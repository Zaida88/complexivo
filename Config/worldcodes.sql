-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2023 a las 20:23:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `worldcodes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codes`
--

CREATE TABLE `codes` (
  `id_code` int(11) NOT NULL COMMENT 'Código de identificación del código',
  `idExercise` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar a que ejercicio pertenece el código ',
  `name_code` text NOT NULL COMMENT 'Código a mostrar al usuario ',
  `number_code` int(11) NOT NULL COMMENT 'Número que ayuda a saber en que orden va cada etiqueta del código '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`id_code`, `idExercise`, `name_code`, `number_code`) VALUES
(1, 1, 'parte 1 js 1', 1),
(2, 1, 'parte 2 js 1', 2),
(3, 1, 'parte 3 js 1', 3),
(4, 2, 'parte 1 js 2', 1),
(5, 2, 'parte 2 js 2', 2),
(6, 2, 'parte 3 js 2', 3),
(7, 1, 'parte 4 js 1', 4),
(8, 4, '&lth1&gt', 1),
(9, 4, 'hola mundo', 2),
(10, 4, '&lt/h1&gt', 3),
(11, 3, 'parte 1', 1),
(12, 3, 'parte 2', 2),
(13, 5, 'parte 1', 1),
(14, 5, 'parte 2', 2),
(16, 6, 'parte 1', 1),
(17, 6, 'parte 2', 2),
(18, 7, 'parte 1', 1),
(19, 7, 'parte 2', 2),
(20, 8, 'parte 1', 1),
(21, 8, 'parte 2', 2),
(22, 9, 'parte 1', 1),
(23, 9, 'parte 3', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id_exercise` int(11) NOT NULL COMMENT 'Código de identificación del ejercicio',
  `idLanguage` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar a que lenguaje pertenece el ejercicio ',
  `name_exercise` text NOT NULL COMMENT 'Nombre para identificar el ejercicio',
  `description_exercise` text NOT NULL COMMENT 'Descripción sobre qué trata el ejercicio  '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id_exercise`, `idLanguage`, `name_exercise`, `description_exercise`) VALUES
(1, 1, 'ejercicio 1 js', 'etgewgt'),
(2, 1, 'ejercicio 2 js', 'edfewf'),
(3, 1, 'ejercicio 3 js', 'truj6'),
(4, 2, 'ejercicio 1 html', 'wfwfew'),
(5, 2, 'ejercicio 2 html', 'wetgwe'),
(6, 2, 'ejercicio 3 html', 'lknkjb'),
(7, 3, 'ejercicio 1 css', 'safsaf'),
(8, 3, 'ejercicio 2 css', 'efas'),
(9, 3, 'ejercicio 3 css', 'fshrdh'),
(10, 1, 'ejercicio extra', 'wsrfsfas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id_language` int(11) NOT NULL COMMENT 'Código de identificación del lenguaje',
  `name_language` text NOT NULL COMMENT 'Nombre para identificar el lenguaje',
  `description_language` text NOT NULL COMMENT 'Descripción del lenguaje para que el usuario sepa de que trata ',
  `logo_language` text NOT NULL COMMENT 'Imagen que identifique al lenguaje '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id_language`, `name_language`, `description_language`, `logo_language`) VALUES
(1, 'JavaScript', 'JavaScript es un poderoso lenguaje de programación construido para el navegador Netscape en 1995. Todos los navegadores modernos lo adoptaron desde entonces para añadir funciones a los sitios web y, más recientemente, a aplicaciones web.\r\n\r\nA lo largo de los años, desde su concepción, JavaScript se ha convertido en un gigante: no se utiliza únicamente por la web, sino que puede encontrarse en casi cualquier lugar, incluso en el espacio.', 'assets/img/languages/js/js.png'),
(2, 'Html', 'HTML es un lenguaje de marcado que se utiliza para el desarrollo de páginas de Internet. Se trata de la sigla que corresponde a HyperText Markup Language, es decir, Lenguaje de Marcas de Hipertexto, que podría ser traducido como Lenguaje de Formato de Documentos para Hipertexto.', 'assets/img/languages/html/html.jpg'),
(3, 'Css', 'CSS son las siglas en inglés de Cascading Style Sheets, que significa «hojas de esilo en cascada». Es un lenguaje que se usa para estilizar elementos escritos en un lenguaje de marcado como HTML.', 'assets/img/languages/css/css.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyect`
--

CREATE TABLE `proyect` (
  `id_proyect` int(11) NOT NULL COMMENT 'Código de identificación del proyecto ',
  `name_proyect` text NOT NULL COMMENT 'Nombre del proyecto',
  `description_proyect` text NOT NULL COMMENT 'Descripción del proyecto',
  `logo_proyect` text NOT NULL COMMENT 'Logo del proyecto',
  `email_proyect` text NOT NULL COMMENT 'Correo de contacto ',
  `phone_number_proyect` text NOT NULL COMMENT 'Número de contacto '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyect`
--

INSERT INTO `proyect` (`id_proyect`, `name_proyect`, `description_proyect`, `logo_proyect`, `email_proyect`, `phone_number_proyect`) VALUES
(1, 'WORLDCODES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore expedita ad ea accusamus cupiditate, nihil pariatur placeat eum eaque facilis doloremque repellendus qui iste eveniet dolorem obcaecati quos animi. Error.', 'assets/img/proyect/logo-default.jpg', 'asfsafsaf@gmail.com', '0911111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL COMMENT 'Código de identificación del rol',
  `name_rol` text NOT NULL COMMENT 'Nombre del rol disponible '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `name_rol`) VALUES
(1, 'admin'),
(2, 'client'),
(3, 'contentCreator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL COMMENT 'Código de identificación del usuario',
  `idRol` int(11) DEFAULT NULL COMMENT 'Foreign key que ayuda a identificar el rol del usuario en el sistema',
  `first_name_user` text NOT NULL COMMENT 'Nombre del usuario',
  `username_user` text NOT NULL COMMENT 'Nombre que sirve para iniciar sesión ',
  `password_user` text NOT NULL COMMENT 'Contraseña que sirve para iniciar sesión y cambiar información del usuario ',
  `photo_user` text NOT NULL COMMENT 'Foto/imagen que el usuario desee agregar como foto de perfil ',
  `state_user` int(11) NOT NULL COMMENT 'Campo que ayuda a identificar si el usuario se encuentra en estado activo o inactivo',
  `last_login_user` datetime NOT NULL COMMENT 'Campo para saber fecha y hora de la ultima conexión del usuario ',
  `date_user` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '	Campo para saber fecha y hora de la ultima conexión del usuario',
  `last_name_user` text NOT NULL COMMENT 'Apellido del usuario',
  `email_user` text NOT NULL COMMENT 'Correo que sirve para que el usuario pueda reestablecer su contraseña'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `idRol`, `first_name_user`, `username_user`, `password_user`, `photo_user`, `state_user`, `last_login_user`, `date_user`, `last_name_user`, `email_user`) VALUES
(1, 1, 'Liseth', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'assets/img/users/user-default.png', 1, '2023-02-02 14:08:52', '2023-02-04 00:57:44', 'Ponce', 'dsgfsdgds@qwfsf.com'),
(2, 2, 'nombre c', 'cliente', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/cliente/wjydilGato.jpg', 1, '2023-02-08 13:58:30', '2023-02-08 18:58:30', 'apellido c', 'lka.ponce@yavirac.edu.ec'),
(3, 2, 'Liseth', 'prueba', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/prueba/dx81lbgato2.jpg', 1, '2023-02-08 13:57:40', '2023-02-08 18:57:40', 'Ponce', 'prueba@gmail.com'),
(104, 2, 'saf', 'prueba1', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/user-default.png', 1, '0000-00-00 00:00:00', '2023-02-08 18:22:05', 'asf', 'asfas@kjb.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `user_show`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_show` (
`username_user` text
,`email_user` text
,`name_rol` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wins`
--

CREATE TABLE `wins` (
  `id_win` int(11) NOT NULL COMMENT 'Código de identificación del logro',
  `idExercise` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar el ejercicio',
  `idUser` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar el usuario',
  `state_win` tinyint(1) DEFAULT NULL COMMENT 'Estado en el que se encuentra el ejercicio; ya sea 0=incompleto o 1=finalizado',
  `date_win` date DEFAULT NULL COMMENT 'Fecha en la que se realizó el ejercicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `wins`
--

INSERT INTO `wins` (`id_win`, `idExercise`, `idUser`, `state_win`, `date_win`) VALUES
(1, 1, 2, 1, '2023-02-07'),
(2, 2, 2, 1, '2023-02-08'),
(3, 3, 2, 0, NULL),
(4, 4, 2, 1, '2023-02-08'),
(5, 5, 2, 0, NULL),
(6, 6, 2, 0, NULL),
(7, 7, 2, 1, '2023-02-08'),
(8, 8, 2, 0, NULL),
(9, 9, 2, 0, NULL),
(37, 1, 3, 0, NULL),
(38, 2, 3, 1, '2023-02-07'),
(39, 3, 3, 0, NULL),
(40, 4, 3, 0, NULL),
(41, 5, 3, 0, NULL),
(42, 6, 3, 0, NULL),
(43, 7, 3, 0, NULL),
(44, 8, 3, 0, NULL),
(45, 9, 3, 0, NULL),
(127, 10, 2, 0, NULL),
(128, 1, 104, 0, NULL),
(129, 2, 104, 0, NULL),
(130, 3, 104, 0, NULL),
(131, 4, 104, 0, NULL),
(132, 5, 104, 0, NULL),
(133, 6, 104, 0, NULL),
(134, 7, 104, 0, NULL),
(135, 8, 104, 0, NULL),
(136, 9, 104, 0, NULL),
(137, 10, 104, 0, NULL),
(138, 10, 3, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `win_user`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `win_user` (
`id_win` int(11)
,`state_win` tinyint(1)
,`idUser` int(11)
,`date_win` date
,`name_exercise` text
,`id_exercise` int(11)
,`name_language` text
,`id_language` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `user_show`
--
DROP TABLE IF EXISTS `user_show`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_show`  AS SELECT `u`.`username_user` AS `username_user`, `u`.`email_user` AS `email_user`, `r`.`name_rol` AS `name_rol` FROM (`users` `u` join `roles` `r` on(`u`.`idRol` = `r`.`id_rol`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `win_user`
--
DROP TABLE IF EXISTS `win_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `win_user`  AS SELECT `w`.`id_win` AS `id_win`, `w`.`state_win` AS `state_win`, `w`.`idUser` AS `idUser`, `w`.`date_win` AS `date_win`, `e`.`name_exercise` AS `name_exercise`, `e`.`id_exercise` AS `id_exercise`, `l`.`name_language` AS `name_language`, `l`.`id_language` AS `id_language` FROM (((`wins` `w` join `exercises` `e` on(`e`.`id_exercise` = `w`.`idExercise`)) join `languages` `l` on(`l`.`id_language` = `e`.`idLanguage`)) join `users` `u` on(`u`.`id_user` = `w`.`idUser`))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id_code`),
  ADD KEY `id_exercise` (`idExercise`);

--
-- Indices de la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id_exercise`),
  ADD KEY `id_language` (`idLanguage`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_language`);

--
-- Indices de la tabla `proyect`
--
ALTER TABLE `proyect`
  ADD PRIMARY KEY (`id_proyect`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_users_roles` (`idRol`);

--
-- Indices de la tabla `wins`
--
ALTER TABLE `wins`
  ADD PRIMARY KEY (`id_win`),
  ADD KEY `id_exercise` (`idExercise`),
  ADD KEY `id_user` (`idUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codes`
--
ALTER TABLE `codes`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del código', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del ejercicio', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del lenguaje', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyect`
--
ALTER TABLE `proyect`
  MODIFY `id_proyect` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del proyecto ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del rol', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del usuario', AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `wins`
--
ALTER TABLE `wins`
  MODIFY `id_win` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del logro', AUTO_INCREMENT=139;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`idExercise`) REFERENCES `exercises` (`id_exercise`);

--
-- Filtros para la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`idLanguage`) REFERENCES `languages` (`id_language`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`idRol`) REFERENCES `roles` (`id_rol`);

--
-- Filtros para la tabla `wins`
--
ALTER TABLE `wins`
  ADD CONSTRAINT `wins_ibfk_1` FOREIGN KEY (`idExercise`) REFERENCES `exercises` (`id_exercise`),
  ADD CONSTRAINT `wins_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
