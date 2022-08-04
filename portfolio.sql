-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2022 a las 20:53:49
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `portfolio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtitle` text NOT NULL,
  `text` text NOT NULL,
  `image` text NOT NULL,
  `uploaded` datetime NOT NULL,
  `last_edit` datetime NOT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 1,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `title`, `subtitle`, `text`, `image`, `uploaded`, `last_edit`, `hidden`, `deleted`) VALUES
(1, 'Las Redes Sociales', 'La vida dentro de ellas', '<h3>¿Nunca te has preguntado porque hay gente que deja su vida en las redes sociales sin saber el riesgo que conlleva esto?</h3><p>Bien, para poner en situación, hay varios tipos de personas en las redes sociales, en este post hablare específicamente sobre 3:</p><blockquote><p>    Aquellos que solo utilizan las redes sociales como medio de comunicación o, valga la redundancia, medio de sociabilización, conociendo y chateando con gente conocida o desconocida.</p></blockquote><p><br></p><blockquote><p>    Aquellos que postean su vida allí, mostrando continuamente donde están mediante historias, publicaciones, ignorando el riesgo que puede traer consigo.</p></blockquote><p><br></p><blockquote><p>    Este ultimo tipo de persona son aquellos que no tienen cuentas especificas, sino que utilizan cuentas ajenas o cuentas \"fake\" para realizar diversas actividades, ya sea \"stalkear\", ingeniería social, etc.</p></blockquote><p>Bien, una vez descriptas estos tres tipos de personas, pasaremos a hablar sobre el riesgo que conlleva cada una de ellas. Bien, lo primero y principal hablaremos sobre el tipo dos, el cual deja la vida en las redes. Este tipo de persona es muy vulnerable ante el tipo tres, el cual aprovecha de la información que brinda la gente en sus redes.</p><h3>¿De que manera?</h3><p>Este tipo de persona puede utilizar la información recolectada para diversas cosas, ejemplo: extorsión, manipulación, etc. Esto puede ser muy perjudicial para una persona que tiene muchos \"enemigos\" o gente en su contra. Un método muy utilizado para la recolección de información es el doxing, el cual consiste en la investigación profunda de esa persona mediante las redes sociales. Y si es una persona sociable, la cual charla y cuenta su vida con cualquiera, la ingeniería social es muy útil.</p><p>Esto es muy provechoso para los cibercriminales, ya que al recaudar demasiada información sobre esa persona pueden llegar hasta tomar el control de el mediante amenazas de publicación de la información privada.</p><h3>¿Como puedo evitar ser victima de esto?</h3><p>Bien, ahora pasare a comentarte sobre como no ser victima de este tipo de problemas. Uno de los problemas mas comunes al crear una red social es poner perfiles públicos, en los cuales tu información es accesible para cualquier persona. Entonces para poder evitar esto lo primero que hay que hacer luego de crear un perfil es ponerlo privado. Algo a destacar son los datos personales que dejas plasmados en tu información, por ejemplo, fecha de cumpleaños. Parece algo sin importancia, pero cuando una persona en serio quiere hacer daño, la fecha de cumpleaños es un buen dato.</p><p>Entonces, para repasar, estos son algunos de los consejos que suelo dar al momento de utilizar una red social:</p><blockquote><p>    Perfil privado.</p></blockquote><p><br></p><blockquote><p>    No dar demasiados datos personales en tu biografía.</p></blockquote><p><br></p><blockquote><p>    Solo aceptar gente conocida o de confianza.</p></blockquote><p><br></p><blockquote><p>    Cada tanto ir cambiando la contraseña para ingresar a la cuenta.</p></blockquote><p><br></p><blockquote><p>    La contraseña debe ser larga, y que en lo posible contenga números y caracteres extraños.</p></blockquote>', '74f3d1fe3f73ebb0284c1c46e12a6257.jpg', '2022-08-01 10:57:57', '2022-08-01 10:57:57', 0, 0),
(2, 'testing 1', 'post test 1', 'asdwadsdwa', '', '2022-08-01 11:00:57', '2022-08-01 11:00:57', 0, 0),
(3, 'New Post Title', 'New Post Subtitle', '<h2>New Post Content<h2>', '', '2022-08-04 20:50:22', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `lastname` text NOT NULL,
  `nickname` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `image` text NOT NULL,
  `token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `nickname`, `password`, `email`, `image`, `token`) VALUES
(1, 'Lautaro', 'Walther', 'Lauti', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'lautarowalther@gmail.com', '', '7c8180156bb6b8584362960ede1d6d09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
