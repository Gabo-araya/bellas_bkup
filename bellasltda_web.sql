-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-07-2009 a las 10:56:49
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bellasltda_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_cat`
--

CREATE TABLE `web_cat` (
  `cat_id` tinyint(10) NOT NULL auto_increment,
  `cat_usuarios` tinytext collate utf8_unicode_ci,
  `cat_productos` tinytext collate utf8_unicode_ci,
  `cat_servicios` tinytext collate utf8_unicode_ci,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `web_cat`
--

INSERT INTO `web_cat` (`cat_id`, `cat_usuarios`, `cat_productos`, `cat_servicios`) VALUES
(1, 'admin', 'Productos', 'Servicios'),
(2, 'editor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_conf`
--

CREATE TABLE `web_conf` (
  `conf_id` tinyint(10) NOT NULL,
  `conf_nombre_sitio` tinytext collate utf8_unicode_ci NOT NULL,
  `conf_slogan` tinytext collate utf8_unicode_ci NOT NULL,
  `conf_descripcion` text collate utf8_unicode_ci NOT NULL,
  `conf_mail` tinytext collate utf8_unicode_ci NOT NULL,
  `conf_telefono` tinytext collate utf8_unicode_ci NOT NULL,
  `conf_direccion` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`conf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcar la base de datos para la tabla `web_conf`
--

INSERT INTO `web_conf` (`conf_id`, `conf_nombre_sitio`, `conf_slogan`, `conf_descripcion`, `conf_mail`, `conf_telefono`, `conf_direccion`) VALUES
(1, 'Bellas | Centro de Estética Integral', '', 'Centro de Estética Integral', 'bellasltda@hotmail.com', '(+56) (032) 222 33 48 - (+56) (032) 225 84 55', 'Huito Nº 325 - Valparaíso - Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_files`
--

CREATE TABLE `web_files` (
  `files_id` tinyint(10) NOT NULL auto_increment,
  `files_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `files_file` tinytext collate utf8_unicode_ci NOT NULL,
  `files_size` varchar(255) collate utf8_unicode_ci NOT NULL,
  `files_ext` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `web_files`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_img`
--

CREATE TABLE `web_img` (
  `img_id` tinyint(10) NOT NULL auto_increment,
  `img_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `img_imagen` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `web_img`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_info`
--

CREATE TABLE `web_info` (
  `info_id` tinyint(4) NOT NULL,
  `info_inicio` text collate utf8_unicode_ci NOT NULL,
  `info_empresa` text collate utf8_unicode_ci NOT NULL,
  `info_contacto` text collate utf8_unicode_ci NOT NULL,
  `info_contacto_error` text collate utf8_unicode_ci NOT NULL,
  `info_contacto_exito` text collate utf8_unicode_ci NOT NULL,
  `info_horario` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcar la base de datos para la tabla `web_info`
--

INSERT INTO `web_info` (`info_id`, `info_inicio`, `info_empresa`, `info_contacto`, `info_contacto_error`, `info_contacto_exito`, `info_horario`) VALUES
(0, '<p>El Centro de Estética Integral Bella&rsquo;s le ofrece dentro de una gama múltiple de servicios la práctica de la actividad física, para la mantención de los niveles estéticos y de salud.</p><p>Además, tenemos una amplia gama de productos, todo lo que usted necesita para verse y sentirse bella. </p>', '<p> </p><p> </p><p> </p>', '<p>Puede contactarnos a través de este formulario de contacto, enviando un correo electrónico a <a href="mailto:bellasltda@hotmail.com">bellasltda@hotmail.com</a> o por teléfono, a los números (032) 222 33 48 - (032) 225 84 55.</p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p>          <p><strong>Nota: Todos los campos del formulario son necesarios.</strong></p>', '<h2>Error</h2> <p><strong>¡Oh, no!</strong></p> <p>Ha ocurrido un error. Por favor avise del error a <a href="mailto:bellasltda@hotmail.com">bellasltda@hotmail.com</a> e inténtelo nuevamente más tarde.</p> <p>También puede contactarnos por teléfono, a los números (032) 222 33 48 - (032) 225 84 55. </p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p><p> </p><p> </p><p> </p><p> </p>', '<h2>¡Muchas gracias!</h2> <p>Su información ha llegado a nuestro correo. Trataremos de responderle a la brevedad.</p><p>También puede contactarnos en <a href="mailto:bellasltda@hotmail.com">bellasltda@hotmail.com</a> o por teléfono, a los números (032) 222 33 48 - (032) 225 84 55. </p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p><p> </p><p> </p><p> </p><p> </p><p> </p>', '<h2>Lunes  &bull; Miércoles &bull; Viernes</h2><p>09:00 &ndash; 10:00 hrs. Aeróbica localizada</p><p>10:00 &ndash; 11:00 hrs. Aeróbica localizada</p><p>13:15 &ndash; 14:15 hrs. Aeróbica localizada</p><p>14:15 &ndash; 15:15 hrs. Aeróbica localizada</p><p>15:15 &ndash; 16:15 hrs. Aeróbica localizada</p><p>17:00 &ndash; 18:00 hrs. Aeróbica localizada</p><p>18:30 &ndash; 19:30 hrs. Aeróbica localizada</p><p>19:30 &ndash; 20:30 hrs. Aeróbica localizada</p><h2>Martes &bull; Jueves</h2><p>09:00 &ndash; 10:00 hrs.  Aeróbica localizada</p><p>10:00 &ndash; 11:00 hrs.  Aeróbica localizada</p><p>11:00 &ndash; 12:00 hrs. Adulto Mayor</p><h2>Martes &bull; Jueves &bull; Viernes</h2><p>18:00 &ndash; 19:00 hrs. Aeróbica Localizada</p><p>19:00 &ndash; 20:00 hrs. Aeróbica Localizada</p><p>20:00 &ndash; 21:00 hrs. Gimnasia Entretenida</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_not`
--

CREATE TABLE `web_not` (
  `not_id` tinyint(10) NOT NULL auto_increment,
  `not_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `not_resena` text collate utf8_unicode_ci NOT NULL,
  `not_text` text collate utf8_unicode_ci NOT NULL,
  `not_cat` tinytext collate utf8_unicode_ci NOT NULL,
  `not_pub` tinytext collate utf8_unicode_ci NOT NULL,
  `not_dest` tinytext collate utf8_unicode_ci NOT NULL,
  `not_fecha` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`not_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `web_not`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_prod`
--

CREATE TABLE `web_prod` (
  `prod_id` tinyint(10) NOT NULL auto_increment,
  `prod_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `prod_imagen` tinytext collate utf8_unicode_ci NOT NULL,
  `prod_resena` text collate utf8_unicode_ci NOT NULL,
  `prod_pub` tinytext collate utf8_unicode_ci NOT NULL,
  `prod_cat` tinytext collate utf8_unicode_ci NOT NULL,
  `prod_dest` tinytext collate utf8_unicode_ci NOT NULL,
  `prod_fecha` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `web_prod`
--

INSERT INTO `web_prod` (`prod_id`, `prod_nombre`, `prod_imagen`, `prod_resena`, `prod_pub`, `prod_cat`, `prod_dest`, `prod_fecha`) VALUES
(1, 'Pendiente Gato', '27112008-1256_gato.jpg', '&lt;p&gt;Pendiente con forma de gato.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'si', '1', 'si', '1227758400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_serv`
--

CREATE TABLE `web_serv` (
  `serv_id` tinyint(10) NOT NULL auto_increment,
  `serv_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `serv_imagen` tinytext collate utf8_unicode_ci NOT NULL,
  `serv_resena` text collate utf8_unicode_ci NOT NULL,
  `serv_pub` tinytext collate utf8_unicode_ci NOT NULL,
  `serv_cat` tinytext collate utf8_unicode_ci NOT NULL,
  `serv_dest` tinytext collate utf8_unicode_ci NOT NULL,
  `serv_fecha` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`serv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `web_serv`
--

INSERT INTO `web_serv` (`serv_id`, `serv_nombre`, `serv_imagen`, `serv_resena`, `serv_pub`, `serv_cat`, `serv_dest`, `serv_fecha`) VALUES
(1, 'Peinados exclusivos', '27112008-1409_chica.jpg', '&lt;p&gt;Peinados Exclusivos&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'no', '1', 'si', '1227758400'),
(2, 'Cosmetolog&iacute;a', '09122008-1252_logo_bellasltda.png', '&lt;p&gt;Cosmetolog&amp;iacute;a &lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(3, 'Masajes de relajaci&oacute;n', '09122008-1254_logo_bellasltda.png', '&lt;p&gt;Masajes de relajaci&amp;oacute;n&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(4, 'Tratamientos corporales', '09122008-1257_logo_bellasltda.png', '&lt;p&gt;Tratamientos corporales de: &lt;/p&gt;&lt;ul&gt;&lt;li&gt;celulitis&lt;/li&gt;&lt;li&gt;reducci&amp;oacute;n&lt;/li&gt;&lt;li&gt;flacidez&lt;/li&gt;&lt;/ul&gt;', 'si', '1', 'no', '1228795200'),
(5, 'Peluquer&iacute;a', '09122008-1305_27112008-1409_chica.jpg', '&lt;p&gt;Peluquer&amp;iacute;a&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(6, 'Podolog&iacute;a', '09122008-1306_logo_bellasltda.png', '&lt;p&gt;Podolog&amp;iacute;a&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(7, 'Permanentes de pesta&ntilde;as', '09122008-1307_logo_bellasltda.png', '&lt;p&gt;Permanentes de pesta&amp;ntilde;as&lt;/p&gt;', 'si', '1', 'si', '1228795200'),
(8, 'Maquillaje', '09122008-1308_logo_bellasltda.png', '&lt;p&gt;Maquillaje&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(9, 'Depilaciones', '09122008-1308_logo_bellasltda.png', '&lt;p&gt;Depilaciones&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(10, 'Implantes', '09122008-1308_logo_bellasltda.png', '&lt;p&gt;Implantes&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(11, 'Delineados permanentes', '09122008-1309_logo_bellasltda.png', '&lt;p&gt;Delineados permanentes&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(12, 'Sauna', '09122008-1309_logo_bellasltda.png', '&lt;p&gt;Sauna&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(13, 'C&aacute;psula de Vapor Aromatizada', '09122008-1310_logo_bellasltda.png', '&lt;p&gt;C&amp;aacute;psula de Vapor Aromatizada&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(14, 'Sol&aacute;rium Vertical y Horizontal', '09122008-1310_logo_bellasltda.png', '&lt;p&gt;Sol&amp;aacute;rium Vertical y Horizontal&lt;/p&gt;', 'si', '1', 'no', '1228795200'),
(15, 'Gimnasio', '09122008-1311_logo_bellasltda.png', '&lt;p&gt;Tenemos a su disposici&amp;oacute;n las instalaciones necesarias y un buen equipo profesional en las siguientes especialidades:&lt;/p&gt;    &lt;ul&gt;&lt;li&gt;Gimnasia Aer&amp;oacute;bica&lt;/li&gt;&lt;li&gt;Gimnasia Adulto Mayor&lt;/li&gt;&lt;li&gt;Gimnasia Aero Step&lt;/li&gt;&lt;li&gt;Gimnasia Localizada&lt;/li&gt;&lt;li&gt;Gimnasia Entretenida&lt;/li&gt;&lt;/ul&gt;', 'si', '1', 'no', '1228795200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `web_usuarios`
--

CREATE TABLE `web_usuarios` (
  `usuarios_id` tinyint(10) NOT NULL auto_increment,
  `usuarios_nombre` varchar(25) collate utf8_unicode_ci NOT NULL,
  `usuarios_password` varchar(50) collate utf8_unicode_ci NOT NULL,
  `usuarios_tipo` varchar(50) collate utf8_unicode_ci NOT NULL,
  `usuarios_nombre_completo` text collate utf8_unicode_ci NOT NULL,
  `usuarios_genero` tinytext collate utf8_unicode_ci NOT NULL,
  `usuarios_email` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `web_usuarios`
--

INSERT INTO `web_usuarios` (`usuarios_id`, `usuarios_nombre`, `usuarios_password`, `usuarios_tipo`, `usuarios_nombre_completo`, `usuarios_genero`, `usuarios_email`) VALUES
(1, 'gabo', 'c32d3ca1eac61eff475a2dc79e19fe3e', 'admin', 'Gabriel Araya Rocha', 'masculino', 'gabo.araya@gmail.com'),
(2, 'admin', 'dcb0c152877f12661e4ba55b49ea9304', 'admin', 'Administrador', 'masculino', 'contacto@aqua3.cl');
