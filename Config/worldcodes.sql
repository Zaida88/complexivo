-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2023 a las 02:45:16
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
  `id` int(11) NOT NULL,
  `id_exercise` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codes`
--

INSERT INTO `codes` (`id`, `id_exercise`, `name`, `number`) VALUES
(1, 1, 'parte 1 js 1', 1),
(2, 1, 'parte 2 js 1', 2),
(3, 1, 'parte 3 js 1', 3),
(4, 2, 'parte 1 js 2', 1),
(5, 2, 'parte 2 js 2', 2),
(6, 2, 'parte 3 js 2', 3),
(7, 1, 'parte 4 js 1', 4),
(8, 4, '&lth1&gt', 1),
(9, 4, 'hola mundo', 2),
(10, 4, '&lt/h1&gt', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id_exercise` int(11) NOT NULL,
  `id_language` int(11) NOT NULL,
  `name_exercise` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id_exercise`, `id_language`, `name_exercise`, `description`) VALUES
(1, 1, 'ejercicio 1 js', 'etgewgt'),
(2, 1, 'ejercicio 2 js', 'edfewf'),
(3, 1, 'ejercicio 3 js', 'truj6'),
(4, 2, 'ejercicio 1 html', 'wfwfew'),
(5, 2, 'ejercicio 2 html', 'wetgwe'),
(6, 2, 'ejercicio 3 html', 'lknkjb'),
(7, 3, 'ejercicio 1 css', 'safsaf'),
(8, 3, 'ejercicio 2 css', 'efas'),
(9, 3, 'ejercicio 3 css', 'fshrdh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `languages`
--

CREATE TABLE `languages` (
  `id_language` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `route` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `languages`
--

INSERT INTO `languages` (`id_language`, `name`, `description`, `logo`, `route`) VALUES
(1, 'JavaScript', 'JavaScript es un poderoso lenguaje de programación construido para el navegador Netscape en 1995. Todos los navegadores modernos lo adoptaron desde entonces para añadir funciones a los sitios web y, más recientemente, a aplicaciones web.\r\n\r\nA lo largo de los años, desde su concepción, JavaScript se ha convertido en un gigante: no se utiliza únicamente por la web, sino que puede encontrarse en casi cualquier lugar, incluso en el espacio.', 'assets/img/languages/js/js.png', 'js'),
(2, 'Html', 'HTML es un lenguaje de marcado que se utiliza para el desarrollo de páginas de Internet. Se trata de la sigla que corresponde a HyperText Markup Language, es decir, Lenguaje de Marcas de Hipertexto, que podría ser traducido como Lenguaje de Formato de Documentos para Hipertexto.', 'assets/img/languages/html/html.jpg', 'html'),
(3, 'Css', 'CSS son las siglas en inglés de Cascading Style Sheets, que significa «hojas de esilo en cascada». Es un lenguaje que se usa para estilizar elementos escritos en un lenguaje de marcado como HTML.', 'assets/img/languages/css/css.png', 'css');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyect`
--

CREATE TABLE `proyect` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `logo` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyect`
--

INSERT INTO `proyect` (`id`, `name`, `description`, `logo`, `email`, `phone_number`) VALUES
(1, 'WORLDCODES', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore expedita ad ea accusamus cupiditate, nihil pariatur placeat eum eaque facilis doloremque repellendus qui iste eveniet dolorem obcaecati quos animi. Error.', 'assets/img/proyect/logo/logo-default.jpg', 'asfsafsaf@gmail.com', '0911111111');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'client');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `photo` text NOT NULL,
  `state` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_name` text NOT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `first_name`, `username`, `password`, `photo`, `state`, `last_login`, `date`, `last_name`, `id_rol`, `email`) VALUES
(1, 'Liseth', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'assets/img/users/user-default.png', 1, '2023-02-02 14:08:52', '2023-02-02 19:08:52', 'Ponce', 1, ''),
(2, 'cliente default', 'cliente', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/user-default.png', 1, '2023-02-02 20:38:43', '2023-02-03 01:38:43', 'Ponce', 2, 'lka.ponce@yavirac.edu.ec'),
(3, 'cliente pruebas', 'prueba', '$2a$07$asxx54ahjppf45sd87a5au1gjqdU.ybWXdMxoN7YGHb9SmYjSf9na', 'assets/img/users/prueba/l7vlz783454859.jpg', 1, '2023-02-02 20:31:35', '2023-02-03 01:31:35', 'assa', 2, 'sasfasf@asfsaf.com');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `user_show`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `user_show` (
`first_name` text
,`last_name` text
,`username` text
,`password` text
,`photo` text
,`email` text
,`name` text
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wins`
--

CREATE TABLE `wins` (
  `id` int(11) NOT NULL,
  `id_exercise` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `wins`
--

INSERT INTO `wins` (`id`, `id_exercise`, `id_user`, `state`) VALUES
(1, 1, 2, 1),
(2, 2, 2, 1),
(3, 3, 2, 0),
(4, 4, 2, 1),
(5, 5, 2, 0),
(6, 6, 2, 0),
(7, 7, 2, 0),
(8, 8, 2, 0),
(9, 9, 2, 0),
(37, 1, 3, 1),
(38, 2, 3, 1),
(39, 3, 3, 0),
(40, 4, 3, 0),
(41, 5, 3, 0),
(42, 6, 3, 0),
(43, 7, 3, 0),
(44, 8, 3, 0),
(45, 9, 3, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `win_user`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `win_user` (
`id` int(11)
,`state` tinyint(1)
,`id_user` int(11)
,`name_exercise` text
,`id_exercise` int(11)
,`name` text
,`id_language` int(11)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `user_show`
--
DROP TABLE IF EXISTS `user_show`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_show`  AS SELECT `u`.`first_name` AS `first_name`, `u`.`last_name` AS `last_name`, `u`.`username` AS `username`, `u`.`password` AS `password`, `u`.`photo` AS `photo`, `u`.`email` AS `email`, `r`.`name` AS `name` FROM (`users` `u` join `roles` `r` on(`u`.`id_rol` = `r`.`id`))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `win_user`
--
DROP TABLE IF EXISTS `win_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `win_user`  AS SELECT `w`.`id` AS `id`, `w`.`state` AS `state`, `w`.`id_user` AS `id_user`, `e`.`name_exercise` AS `name_exercise`, `e`.`id_exercise` AS `id_exercise`, `l`.`name` AS `name`, `l`.`id_language` AS `id_language` FROM (((`wins` `w` join `exercises` `e` on(`e`.`id_exercise` = `w`.`id_exercise`)) join `languages` `l` on(`l`.`id_language` = `e`.`id_language`)) join `users` `u` on(`u`.`id` = `w`.`id_user`))  ;

--
--estructura para la vista 'user_show '
--
CREATE VIEW user_show AS SELECT u.username, u.email, r.name FROM users as u JOIN roles as r ON id_rol=id_rol
--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_exercise` (`id_exercise`);

--
-- Indices de la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id_exercise`),
  ADD KEY `id_language` (`id_language`);

--
-- Indices de la tabla `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id_language`);

--
-- Indices de la tabla `proyect`
--
ALTER TABLE `proyect`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_users_roles` (`id_rol`);

--
-- Indices de la tabla `wins`
--
ALTER TABLE `wins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_exercise` (`id_exercise`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `languages`
--
ALTER TABLE `languages`
  MODIFY `id_language` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyect`
--
ALTER TABLE `proyect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `wins`
--
ALTER TABLE `wins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `codes`
--
ALTER TABLE `codes`
  ADD CONSTRAINT `codes_ibfk_1` FOREIGN KEY (`id_exercise`) REFERENCES `exercises` (`id_exercise`);

--
-- Filtros para la tabla `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`id_language`) REFERENCES `languages` (`id_language`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `wins`
--
ALTER TABLE `wins`
  ADD CONSTRAINT `wins_ibfk_1` FOREIGN KEY (`id_exercise`) REFERENCES `exercises` (`id_exercise`),
  ADD CONSTRAINT `wins_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
