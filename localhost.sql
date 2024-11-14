-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2024 a las 17:33:55
-- Versión del servidor: 5.7.41-log
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `c1402791_ddd`
--
CREATE DATABASE IF NOT EXISTS `c1402791_ddd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `c1402791_ddd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `email`
--

INSERT INTO `email` (`id`, `nombre`, `email`, `ciudad`, `mensaje`) VALUES
(1, 'ASXAsx', 'ursolmaksim.arg@gmail.com', 'buenos aires', 'asXAX'),
(2, 'er', 'argentinagleb73@gmail.com', 'buenos aires', 'sacacsd'),
(3, 'GLEB', 'idgleb646807@gmail.com', 'kfkfkfn', 'jejrnf'),
(4, 'Lugo Sabrina Elizabeth', 'idgleb646807@gmail.com', 'vladivostok', 'Ð“Ð»ÐµÐ±, Ð´Ð¾Ð±Ñ€Ñ‹Ð¹ Ð´ÐµÐ½ÑŒ.\r\nÐ¡ Ð›Ð¸Ñ‚Ð²Ð¸Ð½Ð¾Ð²Ñ‹Ð¼ Ð¿Ð¾Ð½ÑÐ».\r\nÐœÐ½Ðµ ÐµÑ‰Ðµ Ð½Ð°Ð´Ð¾ Ð¸Ð· Ð»Ð¸Ñ‡Ð½Ð¾Ð³Ð¾ ÐºÐ°Ð±Ð¸Ð½ÐµÑ‚Ð° ÑƒÐ´Ð°Ð»Ð¸Ñ‚ÑŒ Ñ‚ÐµÑ€Ð¼Ð¸Ð½Ð°Ð» Ñ Ð½Ð¾Ð¼ÐµÑ€Ð¾Ð¼ 60114 Ð¸ Ð²ÐµÑ€Ð½ÑƒÑ‚ÑŒ Ð¾Ð±Ñ€Ð°Ñ‚Ð½Ð¾ ÐºÐ¾Ð¼Ð¿Ð°Ð½Ð¸Ð¸ ÐÐ¾Ñ€Ð´. \r\nÐ Ñ‚Ð¾ Ð¾Ð½ Ð±Ñ‹Ð» Ð½ÐµÑ€Ð°Ð±Ð¾Ñ‡Ð¸Ð¹, Ñ ÐµÐ³Ð¾ Ð¸Ð¼ Ð²ÐµÑ€Ð½ÑƒÐ»');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `caracteristicas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `img`, `caracteristicas`) VALUES
(1, 'MÃ¡quina expendedora de cafÃ© JL220', '1731041183_fc012cf34be4d5a1.webp', 'La mÃ¡quina de cafÃ© JL220 destaca por su diseÃ±o contemporÃ¡neo y funcional, proporcionando una experiencia de autoservicio cÃ³moda y agradable. Su estructura compacta permite integrarla fÃ¡cilmente en cualquier espacio, sin sacrificar la variedad de opciones de bebidas que ofrece. Con una interfaz intuitiva y un mantenimiento simplificado, es una excelente opciÃ³n para ubicaciones de alto trÃ¡nsito donde se busca una combinaciÃ³n de conveniencia y cafÃ© de alta calidad.'),
(2, 'MÃ¡quina expendedora de cafÃ© frÃ­o y caliente', '1731041488_665cf975894d679e.png', 'La mÃ¡quina expendedora de cafÃ© JL300 es una soluciÃ³n de pie que fusiona un diseÃ±o elegante con una calidad de preparaciÃ³n excepcional. Ofrece una amplia variedad de bebidas y cuenta con capacidades avanzadas de gestiÃ³n mediante IoT. DestacÃ¡ndose en el mercado, proporciona una experiencia de usuario incomparable, satisfaciendo las expectativas de los amantes del cafÃ© con opciones de calidad profesional y una gran diversidad de bebidas.'),
(3, 'Cafetera comercial con doble grupo JL50', '1731041827_ea4d15dcfb8c0a85.webp', 'Este equipo se destaca como el mÃ¡ximo exponente en el mundo de la maquinaria de cafÃ© comercial, estableciendo un nuevo estÃ¡ndar de excelencia. Meticulosamente diseÃ±ado y elaborado con gran cuidado, este molinillo de cafÃ© totalmente automÃ¡tico, de calidad profesional, es un verdadero testimonio de precisiÃ³n y artesanÃ­a'),
(4, 'Cafetera profesional ideal para entornos de oficina JL26', '1731041651_9715c89d029c4b85.png', 'La mÃ¡quina de cafÃ© profesional JL26 se distingue por su capacidad para ofrecer una variedad de bebidas de alta calidad. Con tecnologÃ­a avanzada de molienda y preparaciÃ³n, junto a una interfaz intuitiva, esta mÃ¡quina estÃ¡ diseÃ±ada para cumplir con los estÃ¡ndares de los mÃ¡s exigentes entusiastas del cafÃ©, brindando siempre una experiencia excepcional.'),
(5, 'MÃ¡quina de cafÃ© versÃ¡til que ofrece bebidas frÃ­as y calientes JL300', '1729787536_4ba45ba04c5814e6.webp', 'Esta mÃ¡quina expendedora de cafÃ© de pie combina un diseÃ±o elegante, calidad excepcional en la preparaciÃ³n, diversas opciones de bebidas y capacidades avanzadas de gestiÃ³n IoT. Destaca en el mercado al ofrecer una experiencia de usuario superior, satisfaciendo las demandas de los entusiastas del cafÃ© con su calidad profesional y amplia variedad de bebidas.'),
(6, 'MÃ¡quina expendedora de cappuccino JL500', '1729787748_7aa58aef3ccb59c6.webp', 'Esta mÃ¡quina es una opciÃ³n muy valorada para quienes buscan un equipo de autoservicio de nivel profesional que combine rendimiento y satisfacciÃ³n del usuario sin complicaciones. Su sistema patentado de molienda y preparaciÃ³n asegura una experiencia de cafÃ© superior, mientras que la interfaz intuitiva aÃ±ade un toque de conveniencia al proceso'),
(7, 'MÃ¡quina expendedora de cafÃ© con sistema dispensador de tazas JL500I', '1729787853_e8ddbd62fbd9cafb.webp', 'El JL500I es una cafetera autoservicio de Ãºltima generaciÃ³n que redefine la comodidad al incorporar una mÃ¡quina de hielo integrada. Esta caracterÃ­stica innovadora permite a los usuarios disfrutar de una amplia variedad de bebidas frÃ­as y refrescantes, adaptÃ¡ndose a sus preferencias en cualquier estaciÃ³n. Desde cafÃ©s helados reciÃ©n preparados hasta bebidas especiales frÃ­as, el JL500I garantiza una experiencia de bebida deliciosa y personalizable durante todo el aÃ±o'),
(8, 'MÃ¡quina De CafÃ© AutomÃ¡tica TÃ¡ctil JL28', '1731041872_73866b085a591b2f.webp', 'La cafetera automÃ¡tica JL18 es compacta y de calidad profesional, ideal para establecimientos pequeÃ±os. Con su diseÃ±o eficiente y alta capacidad de producciÃ³n, se adapta perfectamente a lugares que valoran la calidad del cafÃ© y necesitan servirlo con frecuencia. Incorpora un molinillo Ditting EMH64 que garantiza granos reciÃ©n molidos, proporcionando una experiencia de cafÃ© superior. Es la elecciÃ³n perfecta para quienes buscan comodidad, rendimiento y excelencia en un formato compacto.'),
(9, 'MÃ¡quina De CafÃ© AutomÃ¡tica TÃ¡ctil JL28', '1731041990_1d9e221067de6da3.png', 'La mÃ¡quina expendedora de cafÃ© de escritorio es un innovador dispositivo diseÃ±ado para ofrecer una experiencia de cafÃ© excepcional en el entorno laboral. Compacta y funcional, esta mÃ¡quina permite a los usuarios disfrutar de una variedad de cafÃ©s, desde espresso hasta capuchinos, con solo presionar un botÃ³n. Su diseÃ±o ergonÃ³mico se adapta perfectamente a cualquier espacio de trabajo, proporcionando comodidad y satisfacciÃ³n al instante. Con opciones personalizables de sabores y niveles de intensidad, esta expendedora transforma la rutina diaria en un momento de placer, ideal para recargar energÃ­as durante la jornada laboral.'),
(10, 'MÃ¡quina De CafÃ©', '1729841386_757132ef2756c87b.png', ''),
(11, '', '1729837064_b21d6319b06037fb.png', ''),
(12, '', '1731042202_b4374ea6ac61e980.webp', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
