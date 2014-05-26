-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2014 a las 02:38:40
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `paninicrud`
--
CREATE DATABASE IF NOT EXISTS `paninicrud` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `paninicrud`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id`, `name`, `description`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Álbum 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu porta lacus, ac facilisis sem. Etiam molestie, enim lacinia interdum auctor, libero tortor sagittis nibh, sed ornare lectus libero non metus. Proin nec est dui. Nunc a justo sagittis, eleifend nisi quis, sollicitudin ante. Donec posuere, nulla et malesuada varius, odio massa scelerisque felis, vel rhoncus dui leo eu sapien. Etiam luctus eget magna sed accumsan. Aenean ac risus lectus. Suspendisse id risus in ligula vestibulum feugiat. Proin interdum feugiat orci, vitae hendrerit sapien pellentesque ac. Praesent laoreet eros dignissim semper molestie. Aliquam erat volutpat. In hac habitasse platea dictumst. Nullam iaculis purus velit, vitae blandit orci aliquam at. Cras interdum a sapien quis faucibus. Quisque eleifend sapien quis lacinia imperdiet. Aenean tempus ante in eros vehicula gravida. ', 2014, '2014-05-25 09:54:42', '2014-05-25 09:54:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_05_24_234739_albumtable', 1),
('2014_05_24_234800_sectiontable', 1),
('2014_05_24_234822_sheettable', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `albumid` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `sheets` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `albumid`, `order`, `name`, `sheets`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'FIFA', 0, '2014-05-25 10:19:18', '2014-05-25 12:51:14'),
(3, 1, 3, 'Jugadores', 3, '2014-05-25 10:25:34', '2014-05-25 20:14:40'),
(4, 2, 1, 'Juagadores 2013', 0, '2014-05-25 10:58:05', '2014-05-25 10:58:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sheets`
--

CREATE TABLE IF NOT EXISTS `sheets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sectionid` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `sheets`
--

INSERT INTO `sheets` (`id`, `sectionid`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 'http://www.timesofoman.com/Siteimages/MynImages/dtl_20_8_2013_13_37_8.jpg', 'Integer interdum ornare nulla id sollicitudin. Nam nec elit a odio scelerisque scelerisque vitae eu dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In pharetra, neque non fringilla ornare, eros mauris mollis sapien, in molestie dolor augue in felis. Etiam cursus elit fringilla lectus luctus consectetur. Phasellus lacinia elit ante, vitae interdum sem semper vitae. Suspendisse et purus dapibus, accumsan arcu eu, malesuada ipsum. Aenean suscipit urna vitae justo ornare, ut blandit tortor feugiat. In in laoreet magna, nec interdum ante. ', '2014-05-25 11:52:31', '2014-05-25 12:32:39'),
(2, 3, 'http://pixabay.com/static/uploads/photo/2013/03/09/04/44/tumaco-91763_150.jpg', 'Aenean pretium, dolor sed ultricies ullamcorper, dolor nibh blandit quam, ut interdum ipsum lacus ut risus. Pellentesque a leo ipsum. Vestibulum ornare volutpat elit eu iaculis. In laoreet eros a neque euismod, faucibus sagittis justo gravida. Fusce nisl neque, viverra dictum sem adipiscing, consequat consequat justo. Donec a arcu at libero venenatis consectetur. Mauris eu sollicitudin diam. Integer a tempus erat, ut convallis sapien. ', '2014-05-25 12:25:47', '2014-05-25 12:51:13'),
(5, 3, 'http://upload.wikimedia.org/wikipedia/commons/1/10/Ronaldinho_corner_brazil.jpg', 'Mauris convallis ipsum a nulla sodales faucibus. Integer eget urna lacinia, sagittis mauris eu, molestie ante. Nunc nisl tortor, ullamcorper quis tempor ac, fringilla id dolor. Pellentesque adipiscing nibh sit amet mauris tempor, eu vestibulum leo dignissim. Sed faucibus tristique erat, vitae tempus mi fermentum ac. Nam et luctus urna. Nulla nisi leo, porta non est ut, egestas vestibulum elit. ', '2014-05-25 20:14:40', '2014-05-25 20:14:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
