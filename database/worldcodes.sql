-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2023 a las 22:35:09
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
(9, 4, 'Lenguaje HTML', 2),
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
(96, 3, ';', 8),
(99, 11, '&lth2&gt', 1),
(100, 11, 'Es un subtitulo', 2),
(101, 11, '&lt/h2&gt', 3),
(102, 12, '&lth3&gt', 1),
(103, 12, 'Descripcion:', 2),
(104, 12, '&lt/h3&gt', 3),
(105, 14, '&ltimg', 1),
(106, 14, 'src=\'', 2),
(107, 14, 'srset_img.jpg\'', 3),
(108, 14, 'alt=\'MDN\'', 4),
(109, 14, 'srcset=\'mdn-logo-HD.png 2x\'', 5),
(110, 14, '&gt', 6),
(111, 13, '&ltimg ', 1),
(112, 13, 'src=', 2),
(113, 13, '\'img_result.jpg\'', 3),
(114, 13, 'height=', 4),
(115, 13, '\'200\'', 5),
(116, 13, 'width=\'', 6),
(117, 13, '150\'&gt', 7),
(118, 38, '&ltp&gt', 1),
(119, 38, 'Vista para formar', 2),
(120, 38, 'un parrafo basico.', 3),
(121, 38, '&lt/p&gt', 4),
(122, 39, '&ltp&gt', 1),
(123, 39, 'Primer parrafo de que indica diferencia entre uno a mas parrafos.', 2),
(124, 39, '&lt/p&gt', 3),
(125, 39, '&ltp&gt', 4),
(126, 39, 'Segundo parrafo de que indica diferencia entre uno a mas parrafos.  ', 5),
(127, 39, '&lt/p&gt', 6),
(128, 40, '&ltp&gt', 1),
(129, 40, 'Este párrafo no ayudara &ltbr&gt', 2),
(130, 40, 'a ver un ejemplo de un &ltbr&gt\\nparrafo con salto de &ltbr&gt', 3),
(131, 40, 'linea usando la tiqueta br.', 4),
(132, 40, '&lt/p&gt', 5),
(133, 41, '&ltp', 1),
(134, 41, 'align=', 2),
(135, 41, '\'center\'', 3),
(136, 41, '&gt', 4),
(137, 41, 'Parrafo con el atributo align', 5),
(138, 41, '&lt/p&gt', 6),
(139, 42, 'background-', 1),
(140, 42, 'image:', 2),
(141, 42, 'url(\'', 3),
(142, 42, 'ejemplo/unicod/backi.png\'', 4),
(143, 42, ');', 5),
(144, 43, 'background-', 1),
(145, 43, 'repeat: ', 2),
(146, 43, 'space;', 3),
(154, 45, 'h1', 1),
(155, 45, '{ ', 2),
(156, 45, 'font-', 3),
(157, 45, 'size: ', 4),
(158, 45, '250% ', 5),
(159, 45, '}', 6),
(160, 46, 'p{ ', 1),
(161, 46, 'font-', 2),
(162, 46, 'size:', 3),
(163, 46, ' medium}', 4),
(164, 47, '.conten{', 1),
(165, 47, ' font', 2),
(166, 47, '-style', 3),
(167, 47, ':normal', 4),
(168, 47, ';}', 5),
(169, 48, '.itc ', 1),
(170, 48, '{', 2),
(171, 48, 'font', 3),
(172, 48, '-', 4),
(173, 48, 'style: ', 5),
(174, 48, 'italic', 6),
(175, 48, ';}', 7),
(176, 49, '.ob', 1),
(177, 49, ' {', 2),
(178, 49, ' font-', 3),
(179, 49, 'style', 4),
(180, 49, ': ', 5),
(181, 49, 'oblique', 6),
(182, 49, ';}', 7),
(183, 50, 'div ', 1),
(184, 50, '{ ', 2),
(185, 50, 'line-', 3),
(186, 50, 'height: ', 4),
(187, 50, '2.2;', 5),
(188, 50, 'font-', 6),
(189, 50, 'size: ', 7),
(190, 50, '15pt;}', 8),
(191, 51, 'div ', 1),
(192, 51, '{ ', 2),
(193, 51, 'line-height', 3),
(194, 51, ':3.2em;', 4),
(195, 51, ' font-', 5),
(196, 51, 'size: ', 6),
(197, 51, '13pt;}', 7),
(198, 52, 'div ', 1),
(199, 52, '{ ', 2),
(200, 52, 'line', 3),
(201, 52, '-', 4),
(202, 52, 'height: ', 5),
(203, 52, '130%;', 6),
(204, 52, 'font-', 7),
(205, 52, 'size: ', 8),
(206, 52, '15pt;}', 9),
(207, 53, 'div', 1),
(208, 53, '{', 2),
(209, 53, 'font:', 3),
(210, 53, '15pt/', 4),
(211, 53, '2.2', 5),
(212, 53, 'Georgia,', 6),
(213, 53, '\'Bitstream ', 7),
(214, 53, 'Charter\'', 8),
(215, 53, ',serif', 9),
(216, 53, '; }', 10),
(217, 44, '.img{\\r\\n ', 1),
(218, 44, 'background-image', 2),
(219, 44, 'url(\'ante.png\');', 3),
(220, 44, 'background', 4),
(221, 44, '-position:', 5),
(222, 44, 'top', 6),
(223, 44, 'center;}', 7);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `code_exercise_label`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `code_exercise_label` (
`id_label` int(11)
,`idLanguage` int(11)
,`name_label` text
,`description_label` text
,`img_label` text
,`id_exercise` int(11)
,`idLabel` int(11)
,`name_exercise` text
,`description_exercise` text
,`img_example_exercise` text
,`img_result_exercise` text
,`id_code` int(11)
,`idExercise` int(11)
,`name_code` text
,`number_code` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercises`
--

CREATE TABLE `exercises` (
  `id_exercise` int(11) NOT NULL COMMENT 'Código de identificación del ejercicio',
  `idLabel` int(11) NOT NULL COMMENT 'Foreign key que ayuda a identificar a que etiqueta pertenece el ejercicio ',
  `name_exercise` text NOT NULL COMMENT 'Nombre para identificar el ejercicio',
  `description_exercise` text NOT NULL COMMENT 'Descripción sobre qué trata el ejercicio  ',
  `img_example_exercise` text NOT NULL COMMENT 'Imagen de ejemplo a mostrar al cliente',
  `img_result_exercise` text NOT NULL COMMENT 'Imagen del resultado del ejercicio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exercises`
--

INSERT INTO `exercises` (`id_exercise`, `idLabel`, `name_exercise`, `description_exercise`, `img_example_exercise`, `img_result_exercise`) VALUES
(2, 1, 'Crear una variable', 'Colocar las tarjetas de manera correcta para que pueda crear una variable llamada name y le pueda asignar el valor \'Hola mundo\'', 'assets/img/exercises/example/js/var-example.png', '0'),
(3, 2, 'Mostrar mensajes por consola', 'Colocar las tarjetas de de forma correcta para que pueda mostrar el mensaje \'Hola mundo\' por consola', '', '0'),
(4, 3, '<b>&lth1&gt</b>', 'Coloca el código de manera ordenada para formar un titulo con la etiqueta &lth1&gt', 'assets/img/exercises/example/html/h1_example.png', 'assets/img/exercises/example/html/h1_result.png'),
(5, 4, '&ltimg&gt&nbsp;<br><b>gif</b>', 'En el siguiente ejercicio coloca correctamente las tarjetas para poder agregar un gif a un sitio web', 'assets/img/exercises/example/html/gif_example.png', 'assets/img/exercises/example/html/img.gif'),
(7, 5, 'background-color', 'Coloque el siguiente código de tal forma que pueda cambiar el color de fondo de sus sitio web ', 'assets/img/exercises/example/css/background_color_example.png', '0'),
(8, 6, 'font-size ejercicio 1', 'Coloque las tarjetas en el orden correcto para cambiar el tamaño de la letra de una etiqueta &ltp&gt', 'assets/img/exercises/ejm.jpg', 'assets/img/exercises/3.jpg'),
(9, 6, 'font-size&nbsp; <b>ejercicio</b>', 'fhd', '', 'dfhfdh'),
(11, 3, '<b>&lth2&gt</b>', 'Coloca el código de manera ordenada para formar un subtítulo con la etiqueta &lth2&gt', 'assets/img/exercises/example/html/h2_example.png', 'assets/img/exercises/example/html/h2_result.png'),
(12, 3, '<b>&lth3&gt</b>', 'Coloca el código de manera ordenada para formar un encabezado de nivel 3 con la etiqueta &lth3&gt', 'assets/img/exercises/example/html/h3_example.png', 'assets/img/exercises/example/html/h3_result.png'),
(13, 4, '&ltimg&gt&nbsp;<br><b>height y width</b>', 'Coloca el código de manera ordenada para insertar una imagen con un ancho y un tamaño con la etiqueta &ltimg&gt con sus atributos height y width.', 'assets/img/exercises/example/html/imghw_example.png', 'assets/img/exercises/example/html/hw_result.png'),
(14, 4, '&ltimg&gt &nbsp; <br><b>srcset</b>', 'Coloca el código de manera ordenada para insertar una imagen con atributo srcset con la etiqueta &ltimg&gt (El atributo src es un candidato en agentes de usuario 1x que soporta srcset).', 'assets/img/exercises/example/html/srset_example.png', 'assets/img/exercises/example/html/srset_img.jpg'),
(38, 7, '&ltp&gt&nbsp;<br><b>Párrafo Basico</b>', 'Coloca el código de manera ordenada para mostrar un <b>párrafo basico</b> con el elemento indicado', 'assets/img/exercises/example/html/p_basico_example.png', 'assets/img/exercises/example/html/p_basico_result.png'),
(39, 7, '&ltp&gt&nbsp;<br><b>Multi párrafos</b>', 'Coloca el código de manera ordenada para mostrar dos <b>párafo</b> con el elemento indicado', 'assets/img/exercises/example/html/p_multi_example.png', 'assets/img/exercises/example/html/p_multi_result.png'),
(40, 7, '&ltp&gt&nbsp;<br><b>Párrafo con salto de linea.</b>', 'Coloca el código de manera ordenada para mostrar el <b>párafo con salto de linea</b> con el elemento indicado', 'assets/img/exercises/example/html/p_salto_example.png', 'assets/img/exercises/example/html/p_salto_result.png'),
(41, 7, '&ltp&gt&nbsp;<br><b>Párrafo con atributo de alineación</b>', 'Coloca el código de manera ordenada para mostrar el <b>párafo con atributo de alineación</b> con el elemento indicado', 'assets/img/exercises/example/html/p_align_example.png', 'assets/img/exercises/example/html/p_align_result.png'),
(42, 5, 'background-image', 'Colocar el código de manera correcta para lograr insertar una imagen en tu pagina con la etiqueta indicada.', 'assets/img/exercises/example/css/background_img_example.png', 'assets/img/exercises/example/css/background_img_result.jpg'),
(43, 5, 'background-repeat', 'Colocar el código de manera correcta para lograr repetir la imagen en las esquinas del documento con ayuda del <b>repeat.</b>', 'assets/img/exercises/example/css/background_repeat_example.png', 'assets/img/exercises/example/css/background_repeat_result.png'),
(44, 5, 'background-position', 'Colocar el código de manera correcta para lograr ponerle posición a una imagen con el atributo <b>position</b>', 'assets/img/exercises/example/css/background_position_example.png', 'assets/img/exercises/example/css/background_position_result.png'),
(45, 6, 'font-size&nbsp;<b>tamaño</b>', 'Coloque las tarjetas en el orden correcto para aumentar el tamaño del titulo un 2,5 veces su tamaño con la propiedad font-size.', 'assets/img/exercises/example/css/font_size_h1_example.png', 'assets/img/exercises/example/css/font_size_h1_result.png'),
(46, 6, 'font-size&nbsp;<b>medium</b>', 'Coloque las tarjetas en el orden correcto para aumentar el tamaño del parrafo segun el atributo <bmedium</b> con la propiedad font-size.', 'assets/img/exercises/example/css/font_size_medium_example.png', 'assets/img/exercises/example/css/font_size_medium_result.png'),
(47, 9, 'font-style&nbsp;<b>normal</b>', 'Coloque las tarjetas en el orden correcto para cambiar el estilo del parrafo con la etiqueta indicada y el atributo <b>normal.</b>', 'assets/img/exercises/example/css/font_style_normal_example.png', 'assets/img/exercises/example/css/font_style_normal_result.png'),
(48, 9, 'font-style&nbsp;<b>italic</b>', 'Coloque las tarjetas en el orden correcto para cambiar el estilo del párrafo con la etiqueta indicada y el atributo <b>italic.</b>', 'assets/img/exercises/example/css/font_style_italic_example.png', 'assets/img/exercises/example/css/font_style_italic_result.png'),
(49, 9, 'font-style&nbsp;<b>oblique</b>', 'Coloque las tarjetas en el orden correcto para cambiar el estilo del párrafo con la etiqueta indicada y el atributo <b>oblique.</b>', 'assets/img/exercises/example/css/font_style_oblique_example.png', 'assets/img/exercises/example/css/font_style_oblique_result.png'),
(50, 10, 'line-height ', 'Coloque las tarjetas en el orden correcto para dar espacios al contenido en el<b>div</b> con la etiqueta indicada ', 'assets/img/exercises/example/css/line_height_example.png', 'assets/img/exercises/example/css/line_height_result.png'),
(51, 10, 'line-height &nbsp; <b>longitud </b>', 'Coloque las tarjetas en el orden correcto para dar espacios al contenido dentro del<b>div</b> con la etiqueta indicada y su atributo <b>em.</b>', 'assets/img/exercises/example/css/line_height_em_example.png', 'assets/img/exercises/example/css/line_height_em_result.png'),
(52, 10, 'line-height &nbsp; <b>porcentaje</b>', 'Coloque las tarjetas en el orden correcto para dar espacios al contenido dentro del<b>div</b> con la etiqueta indicada y su <b>porcentaje (%).</b>', 'assets/img/exercises/example/css/line_height_porcentaje_example.png', 'assets/img/exercises/example/css/line_height_porcentaje_result.png'),
(53, 10, 'line-height &nbsp; <b>font shorthand</b>', 'Coloque las tarjetas en el orden correcto para dar espacios al contenido dentro del<b>div</b> con la etiqueta indicada y su <b>font.</b>', 'assets/img/exercises/example/css/line_height_font_example.png', 'assets/img/exercises/example/css/line_height_font_result.png');

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
(1, 1, 'var', 'La sentencia <b>var</b> nos ayuda a declarar variable, opcionalmente inicializándolas con un valor o no.                     Las variables son la manera como los programadores le dan nombre a un valor para poder reusarlo, actualizarlo o simplemente registrarlo <i>(se pueden usar para guardar cualquier tipo de dato en <b>JavaScript</b>)</i>.\n', 'assets/img/labels/javaScript/var-js.png'),
(2, 1, 'console.log', 'Este método muestra un <b>mensaje en la consola</b>, recibe como argumento uno o más objetos. Cada objeto se evalúa y se concatena en un <b>string</b> separado por espacios. Este es un método que nos ayuda a <b>inspeccionar</b> de mejor manera el código, claramente existen más aparte del <b>console.log</b> como podría ser el <b>console.error()</b> entre muchos otros.', 'assets/img/labels/javaScript/console-js.png'),
(3, 2, '&lth1&gt to &lth6&gt', 'Es una etiqueta muy importante dentro del <b>html</b> ya que esta nos ayuda a <b>jerarquizar</b> el contenido de la web. La etiqueta <b>H1</b> es un encabezado HTML cuyo uso más común es marcar el título de una página web. La mayoría de webs usan CSS para hacer que el H1 destaque en la página en comparación con encabezados menores como H2, H3, etc.<br><b>En otras palabras nos ayuda a definir la importancia de cada titulo dentro cualquier pagina web.</b>', 'assets/img/labels/html/etiqueta.gif'),
(4, 2, '&ltimg&gt', 'Es una etiqueta que nos ayuda a «pintar» una imagen en cualquie parte de la página web, esta cuenta con distintos atributos border esta ayuda a dar una anchura del borde alrededor de la imagen. Los atrubutos mas usados son height el cual nos ayudar a dar una altura a la imagen en píxeles CSS en HTML5 o como porcentaje en HTML4, width nos ayuda a dar el ancho de la imagen en píxeles CSS en HTML5, o porcentaje en HTML4', 'assets/img/labels/html/img.gif'),
(5, 3, 'background', 'La propiedad background es un atajo para <b>definir los valores individuales del fondo en una única regla CSS.</b> Se puede usar background para definir los valores de una o de todas las propiedades siguientes: <b>background-attachment, color, image, position, repeat.</b>\nBackground-color es un propiedad de CSS que define el color de fondo de un elemento, puede ser el <b>valor de un color o la palabra clave transparent</b>. Cada una de las propiedades tiene su propio <b>uso y beneficio.</b>', 'assets/img/labels/css/back.gif'),
(6, 3, 'font-size', 'La propiedad <b>font-size</b> especifica la dimensión de la letra. Este tamaño puede, a su vez, alterar el aspecto de alguna otra cosa, ya que se usa para calcular la longitud de las unidades <b>em</b> y <b>ex.</b> Los valores que usa son:<b>xx-small, x-small, small, medium, large, x-large, xx-large</b>.', 'assets/img/labels/css/size.gif'),
(7, 2, '&ltp&gt &lt/p&gt', 'El elemento p (párrafo) nos ayuda a distribuir de mejor manera el texto en la pantalla o el contenedor en el que se encuentre. Se considera párrafo a un bloque de texto compuesto de una o más oraciones que se refieren a un tema en particular y que normalmente se separa de otros por un espacio en blanco.', 'assets/img/labels/html/etiquetap.gif'),
(8, 2, '&lttitle&gt &lt/title&gt', 'Title (título) es un tag de código HTML que le permite darle un título a una página web. Este título se puede encontrar en la barra de título del navegador, así como en las páginas de resultados de los buscadores.', 'assets/img/labels/html/title.gif'),
(9, 3, 'font-style', 'La propiedad font-style permite definir el aspecto de una familia tipográfica entre los valores: <b>normal , italic (cursiva) y oblique.</b><br><b>Valores de font-style:</b>\r\n<b>normal</b>\r\nEscoge un tipo de letra de letra reservado como normal dentro de un grupo de fuente distintas.<br>\r\n\r\n<b>italic (cursiva)</b>\r\nSelecciona un tipo de letra conocida como italic, o, si una versión cursiva del tipo de letra no esté disponible, escoge un tipo de letra conocida como oblique en lugar de eso.\r\n\r\n<b>oblique</b>\r\nOpta por un tipo de letra etiquetado como oblique, o, si una versión oblique del tipo de letra no esté disponible, elige un tipo de letra etiquetado como italic en lugar de eso.', 'assets/img/labels/css/style.gif'),
(10, 3, 'line-height', 'La propiedad CSS line-height establece la altura de una casilla remarcada por líneas. Comúnmente se usa para establecer la distancia entre líneas de texto. A nivel de elementos de bloque, define la altura mínima de las casillas encuadradas por líneas dentro del elemento.', 'assets/img/labels/css/line.gif');

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
(1, 'JavaScript', 'JavaScript es un poderoso lenguaje de programación construido para el navegador Netscape en 1995. Todos los navegadores modernos lo adoptaron desde entonces para añadir funciones a los sitios web y, más recientemente, a aplicaciones web.\r\n\r\nA lo largo de los años, desde su concepción, JavaScript se ha convertido en un gigante: no se utiliza únicamente por la web, sino que puede encontrarse en casi cualquier lugar, incluso en el espacio.', 'assets/img/languages/js/js.gif', '&lt!DOCTYPE html&gt <br>  &lthtml lang=\"en\"&gt <br>  &lthead&gt<br>      &ltmeta charset=\"UTF-8\"&gt<br>      &ltmeta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\"&gt<br>      &ltmeta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"&gt<br>      &lttitle&gtDocument&lt/title&gt<br>  &lt/head&gt<br>  &ltbody&gt<br> &ltscript&gt', '&lt/script&gt<br>  &lt/body&gt<br>  &lt/html&gt'),
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
(1, 1, 'Zaida', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'assets/img/users/admin/zmmy23admin.jpg', 1, '2023-02-25 21:02:11', 'Mejia', 'zaidamejia.147@gmail.com'),
(2, 2, 'Liseth', 'cliente', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'assets/img/users/cliente/wupau8Gato.jpg', 1, '2023-02-25 19:52:57', 'Ponce', 'lka.ponce@yavirac.edu.ec'),
(4, 3, 'Creador de contenido', 'creador', '$2a$07$asxx54ahjppf45sd87a5au8Kij3ELum/1LLfDvgR6tzVPzv1B791q', 'assets/img/users/creador/f1gq13b6ecef320cdcc086c89e7c764a0e2890.jpg', 1, '2023-02-26 16:15:22', 'Ponce', 'asfskaf@sfsa.com');

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
(208, 12, 2, 1, '2023-02-24'),
(209, 13, 2, 1, '2023-02-24'),
(210, 14, 2, 1, '2023-02-24'),
(211, 11, 2, 1, '2023-02-24'),
(212, 38, 2, 0, NULL),
(213, 39, 2, 0, NULL),
(214, 40, 2, 0, NULL),
(215, 41, 2, 0, NULL),
(216, 42, 2, 0, NULL),
(217, 43, 2, 0, NULL),
(219, 45, 2, 0, NULL),
(220, 46, 2, 0, NULL),
(221, 47, 2, 0, NULL),
(222, 48, 2, 0, NULL),
(223, 49, 2, 0, NULL),
(224, 50, 2, 0, NULL),
(225, 51, 2, 0, NULL),
(226, 52, 2, 0, NULL),
(227, 53, 2, 0, NULL);

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `code_exercise_label`  AS SELECT `l`.`id_label` AS `id_label`, `l`.`idLanguage` AS `idLanguage`, `l`.`name_label` AS `name_label`, `l`.`description_label` AS `description_label`, `l`.`img_label` AS `img_label`, `e`.`id_exercise` AS `id_exercise`, `e`.`idLabel` AS `idLabel`, `e`.`name_exercise` AS `name_exercise`, `e`.`description_exercise` AS `description_exercise`, `e`.`img_example_exercise` AS `img_example_exercise`, `e`.`img_result_exercise` AS `img_result_exercise`, `c`.`id_code` AS `id_code`, `c`.`idExercise` AS `idExercise`, `c`.`name_code` AS `name_code`, `c`.`number_code` AS `number_code` FROM ((`labels` `l` left join `exercises` `e` on(`e`.`idLabel` = `l`.`id_label`)) left join `codes` `c` on(`c`.`idExercise` = `e`.`id_exercise`))  ;

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
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del código', AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id_exercise` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del ejercicio', AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `labels`
--
ALTER TABLE `labels`
  MODIFY `id_label` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación de la etiqueta', AUTO_INCREMENT=11;

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
  MODIFY `id_win` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Código de identificación del logro', AUTO_INCREMENT=228;

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
