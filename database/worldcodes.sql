-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2023 a las 23:36:07
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
(4, 2, 'var ', 1),
(5, 2, 'name', 2),
(6, 2, '\'Hola ', 3),
(8, 4, '&lth1&gt', 1),
(9, 4, 'hola mundo', 2),
(10, 4, '&lt/h1&gt', 3),
(11, 3, 'console', 1),
(12, 3, '.', 2),
(13, 5, '&ltimg', 1),
(14, 5, 'src', 2),
(18, 7, 'body {', 1),
(19, 7, 'background-color', 2),
(20, 8, 'p ', 1),
(21, 8, '{', 2),
(78, 5, '=\'img.gif\'', 3),
(79, 5, '&gt', 4),
(80, 7, ':', 3),
(81, 7, ';', 5),
(82, 7, 'verdana', 4),
(83, 7, '}', 6),
(84, 8, 'font-size:', 3),
(85, 8, '20', 4),
(86, 8, 'px', 5),
(87, 8, ';', 6),
(88, 8, '}', 7),
(89, 2, 'mundo\'', 4),
(90, 2, ';', 5),
(91, 3, 'log', 3),
(92, 3, '(\'', 4),
(93, 3, 'Hola', 5),
(94, 3, 'mundo\'', 6),
(95, 3, ')', 7),
(96, 3, ';', 8);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `code_exercise_label`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `code_exercise_label` (
`id_code` int(11)
,`idExercise` int(11)
,`name_code` text
,`number_code` int(11)
,`id_label` int(11)
,`idLanguage` int(11)
,`name_label` text
,`description_label` text
,`img_label` text
,`id_exercise` int(11)
,`idLabel` int(11)
,`name_exercise` text
,`description_exercise` text
,`img_result_exercise` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id_exercise` int(11) NOT NULL COMMENT 'Código de identificación del ejercicio',
  `idLabel` int(11) NOT NULL,
  `name_exercise` text NOT NULL COMMENT 'Nombre para identificar el ejercicio',
  `description_exercise` text NOT NULL COMMENT 'Descripción sobre qué trata el ejercicio  ',
  `img_example_exercise` text NOT NULL COMMENT 'Imagen de ejemplo a mostrar al cliente',
  `img_result_exercise` text NOT NULL COMMENT 'Imagen del resultado del ejercicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id_exercise`, `idLabel`, `name_exercise`, `description_exercise`, `img_example_exercise`, `img_result_exercise`) VALUES
(2, 1, 'Crear una variable', 'Colocar las tarjetas de manera correcta para que pueda crear una variable llamada name y le pueda asignar el valor \'Hola mundo\'', '', '0'),
(3, 2, 'Mostrar mensajes por consola', 'Colocar las tarjetas de de forma correcta para que pueda mostrar el mensaje \'Hola mundo\' por consola', '', '0'),
(4, 3, '&lth1&gt', 'Coloca el código de manera ordenada para formar un titulo con la etiqueta &lth1&gt', '', '0'),
(5, 4, '&ltimg&gt', 'En el siguiente ejercicio coloca correctamente las tarjetas para poder agregar una imagen a un sitio web', '', '0'),
(7, 5, 'background-color', 'Coloque el siguiente código de tal forma que pueda cambiar el color de fondo de sus sitio web ', '', '0'),
(8, 6, 'font-size ejercicio 1', 'Coloque las tarjetas en el orden correcto para cambiar el tamaño de la letra de una etiqueta &ltp&gt', 'assets/img/exercises/ejm.jpg', 'assets/img/exercises/3.jpg'),
(9, 6, 'font-size ejercicio 2', 'fhd', '', 'dfhfdh'),
(10, 6, 'prueba', 'sdfgd', '', 'sdgsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labels`
--

CREATE TABLE `labels` (
  `id_label` int(11) NOT NULL COMMENT 'Código de identificación de la etiqueta',
  `idLanguage` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar el lenguaje al que pertenece cada etiqueta',
  `name_label` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombre de la etiqueta',
  `description_label` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Descripcion de la etiqueta',
  `img_label` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL COMMENT 'Foto/imagen del resultado esperado de la etiqueta '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `labels`
--

INSERT INTO `labels` (`id_label`, `idLanguage`, `name_label`, `description_label`, `img_label`) VALUES
(1, 1, 'var', 'asfs', 'assets/img/languages/js/js.png'),
(2, 1, 'console.log', 'sf', 'assets/img/languages/js/js.png'),
(3, 2, '&lth1&gt', 'eftewe', 'assets/img/languages/html/html.jpg'),
(4, 2, '&ltimg&gt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti dolorum explicabo fugit officia ad consequuntur velit vero eligendi consectetur, eveniet in nobis quis, ut impedit voluptas earum aperiam nostrum quidem?', 'assets/img/languages/html/html.jpg'),
(5, 3, 'background-color', 'ewwe', 'assets/img/languages/css/css.png'),
(6, 3, 'font-size', 'gsdds', 'assets/img/languages/css/css.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id_language` int(11) NOT NULL COMMENT 'Código de identificación del lenguaje',
  `name_language` text NOT NULL COMMENT 'Nombre para identificar el lenguaje',
  `description_language` text NOT NULL COMMENT 'Descripción del lenguaje para que el usuario sepa de que trata ',
  `logo_language` text NOT NULL COMMENT 'Imagen que identifique al lenguaje ',
  `start_code_language` text NOT NULL COMMENT 'Código inicial del lenguaje a mostrar a los clientes al momento de realizar el ejercicio',
  `end_code_language` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Código final del lenguaje a mostrar a los clientes al momento de realizar el ejercicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id_language`, `name_language`, `description_language`, `logo_language`, `start_code_language`, `end_code_language`) VALUES
(1, 'JavaScript', 'JavaScript es un poderoso lenguaje de programación construido para el navegador Netscape en 1995. Todos los navegadores modernos lo adoptaron desde entonces para añadir funciones a los sitios web y, más recientemente, a aplicaciones web.\r\n\r\nA lo largo de los años, desde su concepción, JavaScript se ha convertido en un gigante: no se utiliza únicamente por la web, sino que puede encontrarse en casi cualquier lugar, incluso en el espacio.', 'assets/img/languages/js/js.png', '&lt!DOCTYPE html&gt <br>  &lthtml lang=\"en\"&gt <br>  &lthead&gt<br>      &ltmeta charset=\"UTF-8\"&gt<br>      &ltmeta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"&gt<br>      &ltmeta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt<br>      &lttitle&gtDocument&lt/title&gt<br>  &lt/head&gt<br>  &ltbody&gt<br> &ltscript&gt', '&lt/script&gt<br>  &lt/body&gt<br>  &lt/html&gt'),
(2, 'Html', 'HTML es un lenguaje de marcado que se utiliza para el desarrollo de páginas de Internet. Se trata de la sigla que corresponde a HyperText Markup Language, es decir, Lenguaje de Marcas de Hipertexto, que podría ser traducido como Lenguaje de Formato de Documentos para Hipertexto.', 'assets/img/languages/html/html.jpg', '&lt!DOCTYPE html&gt <br> &lthtml lang=\"en\"&gt <br> &lthead&gt<br>     &ltmeta charset=\"UTF-8\"&gt<br>     &ltmeta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"&gt<br>     &ltmeta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt<br>     &lttitle&gtDocument&lt/title&gt<br> &lt/head&gt<br> &ltbody&gt<br>', '&lt/body&gt<br> &lt/html&gt'),
(3, 'Css', 'CSS son las siglas en inglés de Cascading Style Sheets, que significa «hojas de esilo en cascada». Es un lenguaje que se usa para estilizar elementos escritos en un lenguaje de marcado como HTML.', 'assets/img/languages/css/css.png', '&lt!DOCTYPE html&gt <br>\n&lthtml lang=\"en\"&gt <br>\n&lthead&gt<br>\n    &ltmeta charset=\"UTF-8\"&gt<br>\n    &ltmeta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"&gt<br>\n    &ltmeta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt<br>\n    &lttitle&gtDocument&lt/title&gt<br>\n&lt/head&gt<br>\n&ltbody&gt<br>\n    &ltstyle&gt', '&lt/style&gt<br>\n&lt/body&gt<br>\n&lt/html&gt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id_project` int(11) NOT NULL COMMENT 'Código de identificación del proyecto ',
  `name_project` text NOT NULL COMMENT 'Nombre del proyecto',
  `description_project` text NOT NULL COMMENT 'Descripción del proyecto',
  `logo_project` text NOT NULL COMMENT 'Logo del proyecto',
  `email_project` text NOT NULL COMMENT 'Correo de contacto ',
  `phone_number_project` text NOT NULL COMMENT 'Número de contacto '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id_project`, `name_project`, `description_project`, `logo_project`, `email_project`, `phone_number_project`) VALUES
(1, 'WORLDCODES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore expedita ad ea accusamus cupiditate, nihil pariatur placeat eum eaque facilis doloremque repellendus qui iste eveniet dolorem obcaecati quos animi. Error.', 'assets/img/project/logo-default.jpg', 'asfsafsaf@gmail.com', '0911111111');

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
  `last_name_user` text NOT NULL COMMENT 'Apellido del usuario',
  `email_user` text NOT NULL COMMENT 'Correo que sirve para que el usuario pueda reestablecer su contraseña'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `idRol`, `first_name_user`, `username_user`, `password_user`, `photo_user`, `state_user`, `last_login_user`, `last_name_user`, `email_user`) VALUES
(1, 1, 'Zaida', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'assets/img/users/admin/zmmy23admin.jpg', 1, '2023-02-23 12:39:22', 'Mejia', 'zaidamejia.147@gmail.com'),
(2, 2, 'Liseth', 'cliente', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/cliente/wupau8Gato.jpg', 1, '2023-02-23 17:29:45', 'Ponce', 'lka.ponce@yavirac.edu.ec'),
(4, 3, 'Creador de contenido', 'creador', '$2a$07$asxx54ahjppf45sd87a5au8Kij3ELum/1LLfDvgR6tzVPzv1B791q', 'assets/img/users/creador/f1gq13b6ecef320cdcc086c89e7c764a0e2890.jpg', 1, '2023-02-22 20:03:35', 'Ponce', 'asfskaf@sfsa.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `user_show`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_show` (
`id_user` int(11)
,`idRol` int(11)
,`username_user` text
,`email_user` text
,`state_user` int(11)
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
(2, 2, 2, 0, NULL),
(3, 3, 2, 0, NULL),
(4, 4, 2, 1, '2023-02-08'),
(5, 5, 2, 1, '2023-02-23'),
(7, 7, 2, 1, '2023-02-08'),
(8, 8, 2, 1, '2023-02-23'),
(205, 9, 2, 0, NULL),
(206, 10, 2, 0, NULL);

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
,`id_label` int(11)
,`name_language` text
,`id_language` int(11)
,`idRol` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `code_exercise_label`
--
DROP TABLE IF EXISTS `code_exercise_label`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `code_exercise_label`  AS SELECT `c`.`id_code` AS `id_code`, `c`.`idExercise` AS `idExercise`, `c`.`name_code` AS `name_code`, `c`.`number_code` AS `number_code`, `l`.`id_label` AS `id_label`, `l`.`idLanguage` AS `idLanguage`, `l`.`name_label` AS `name_label`, `l`.`description_label` AS `description_label`, `l`.`img_label` AS `img_label`, `e`.`id_exercise` AS `id_exercise`, `e`.`idLabel` AS `idLabel`, `e`.`name_exercise` AS `name_exercise`, `e`.`description_exercise` AS `description_exercise`, `e`.`img_result_exercise` AS `img_result_exercise` FROM ((`codes` `c` join `exercises` `e` on(`e`.`id_exercise` = `c`.`idExercise`)) join `labels` `l` on(`l`.`id_label` = `e`.`idLabel`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `user_show`
--
DROP TABLE IF EXISTS `user_show`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_show`  AS SELECT `u`.`id_user` AS `id_user`, `u`.`idRol` AS `idRol`, `u`.`username_user` AS `username_user`, `u`.`email_user` AS `email_user`, `u`.`state_user` AS `state_user`, `r`.`name_rol` AS `name_rol` FROM (`users` `u` join `roles` `r` on(`u`.`idRol` = `r`.`id_rol`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `win_user`
--
DROP TABLE IF EXISTS `win_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `win_user`  AS SELECT `w`.`id_win` AS `id_win`, `w`.`state_win` AS `state_win`, `w`.`idUser` AS `idUser`, `w`.`date_win` AS `date_win`, `e`.`name_exercise` AS `name_exercise`, `e`.`id_exercise` AS `id_exercise`, `la`.`id_label` AS `id_label`, `l`.`name_language` AS `name_language`, `l`.`id_language` AS `id_language`, `u`.`idRol` AS `idRol` FROM ((((`wins` `w` join `exercises` `e` on(`e`.`id_exercise` = `w`.`idExercise`)) join `labels` `la` on(`la`.`id_label` = `e`.`idLabel`)) join `languages` `l` on(`l`.`id_language` = `la`.`idLanguage`)) join `users` `u` on(`u`.`id_user` = `w`.`idUser`))  ;

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
  ADD KEY `idLabel` (`idLabel`);

--
-- Indices de la tabla `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id_label`),
  ADD KEY `fk_labels_languages` (`idLanguage`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_language`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

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
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del código', AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del ejercicio', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `labels`
--
ALTER TABLE `labels`
  MODIFY `id_label` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación de la etiqueta', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del lenguaje', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del proyecto ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del rol', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del usuario', AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `wins`
--
ALTER TABLE `wins`
  MODIFY `id_win` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del logro', AUTO_INCREMENT=207;

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
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`idLabel`) REFERENCES `labels` (`id_label`);

--
-- Filtros para la tabla `labels`
--
ALTER TABLE `labels`
  ADD CONSTRAINT `fk_labels_languages` FOREIGN KEY (`idLanguage`) REFERENCES `languages` (`id_language`);

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