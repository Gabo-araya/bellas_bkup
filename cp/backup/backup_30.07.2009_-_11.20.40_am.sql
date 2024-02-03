# +===================================================================
# |
# | Generado el 30-07-2009 a las 11:07:40 AM
# | Servidor: localhost
# | MySQL Version: 5.0.51b-community-nt
# | PHP Version: 5.2.6
# | Base de datos: 'bellasltda_web'
# |
# +-------------------------------------------------------------------
# | Vaciado de tabla 'web_cat'
# +------------------------------------->
DROP TABLE IF EXISTS `web_cat`;


# | Estructura de la tabla 'web_cat'
# +------------------------------------->
CREATE TABLE `web_cat` (
  `cat_id` tinyint(10) NOT NULL auto_increment,
  `cat_usuarios` tinytext collate utf8_unicode_ci,
  `cat_productos` tinytext collate utf8_unicode_ci,
  `cat_servicios` tinytext collate utf8_unicode_ci,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_cat'
# +------------------------------------->
INSERT INTO `web_cat` VALUES ('1', 'admin', 'Productos', 'Servicios');
INSERT INTO `web_cat` VALUES ('2', 'editor', NULL, NULL);


# | Vaciado de tabla 'web_conf'
# +------------------------------------->
DROP TABLE IF EXISTS `web_conf`;


# | Estructura de la tabla 'web_conf'
# +------------------------------------->
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


# | Carga de datos de la tabla 'web_conf'
# +------------------------------------->
INSERT INTO `web_conf` VALUES ('1', 'Bellas Ltda.', '', 'Centro de Estética Integral', 'bellasltda@hotmail.com', '(+56) (032) 222 33 48 - (+56) (032) 225 84 55', 'Huito Nº 325 - Valparaíso - Chile');


# | Vaciado de tabla 'web_files'
# +------------------------------------->
DROP TABLE IF EXISTS `web_files`;


# | Estructura de la tabla 'web_files'
# +------------------------------------->
CREATE TABLE `web_files` (
  `files_id` tinyint(10) NOT NULL auto_increment,
  `files_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `files_file` tinytext collate utf8_unicode_ci NOT NULL,
  `files_size` varchar(255) collate utf8_unicode_ci NOT NULL,
  `files_ext` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`files_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_files'
# +------------------------------------->


# | Vaciado de tabla 'web_img'
# +------------------------------------->
DROP TABLE IF EXISTS `web_img`;


# | Estructura de la tabla 'web_img'
# +------------------------------------->
CREATE TABLE `web_img` (
  `img_id` tinyint(10) NOT NULL auto_increment,
  `img_nombre` tinytext collate utf8_unicode_ci NOT NULL,
  `img_imagen` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_img'
# +------------------------------------->


# | Vaciado de tabla 'web_info'
# +------------------------------------->
DROP TABLE IF EXISTS `web_info`;


# | Estructura de la tabla 'web_info'
# +------------------------------------->
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


# | Carga de datos de la tabla 'web_info'
# +------------------------------------->
INSERT INTO `web_info` VALUES ('0', '<p>El Centro de Estética Integral Bella&rsquo;s tiene más de tres décadas de experiencia entregando servicios de belleza y cuidado corporal a la mujer de hoy.</p><p>Además, tenemos una amplia gama de productos, todo lo que usted necesita para verse y sentirse bella. </p>', '<p> </p><p> </p><p> </p>', '<p>Puede contactarnos a través de este formulario de contacto, enviando un correo electrónico a <a href=\"mailto:bellasltda@hotmail.com\">bellasltda@hotmail.com</a> o por teléfono, a los números (032) 222 33 48 - (032) 225 84 55.</p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p>          <p><strong>Nota: Todos los campos del formulario son necesarios.</strong></p>', '<h2>Error</h2> <p><strong>¡Oh, no!</strong></p> <p>Ha ocurrido un error. Por favor avise del error a <a href=\"mailto:bellasltda@hotmail.com\">bellasltda@hotmail.com</a> e inténtelo nuevamente más tarde.</p> <p>También puede contactarnos por teléfono, a los números (032) 222 33 48 - (032) 225 84 55. </p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p><p> </p><p> </p><p> </p><p> </p>', '<h2>¡Muchas gracias!</h2> <p>Su información ha llegado a nuestro correo. Trataremos de responderle a la brevedad.</p><p>También puede contactarnos en <a href=\"mailto:bellasltda@hotmail.com\">bellasltda@hotmail.com</a> o por teléfono, a los números (032) 222 33 48 - (032) 225 84 55. </p><p>Estamos ubicados en Huito Nº 325, Valparaíso.  </p><p> </p><p> </p><p> </p><p> </p><p> </p>', '<h2>Lunes  &bull; Miércoles &bull; Viernes</h2><p>09:00 &ndash; 10:00 hrs. Aeróbica localizada</p><p>10:00 &ndash; 11:00 hrs. Aeróbica localizada</p><p>13:15 &ndash; 14:15 hrs. Aeróbica localizada</p><p>14:15 &ndash; 15:15 hrs. Aeróbica localizada</p><p>15:15 &ndash; 16:15 hrs. Aeróbica localizada</p><p>17:00 &ndash; 18:00 hrs. Aeróbica localizada</p><p>18:30 &ndash; 19:30 hrs. Aeróbica localizada</p><p>19:30 &ndash; 20:30 hrs. Aeróbica localizada</p><h2>Martes &bull; Jueves</h2><p>09:00 &ndash; 10:00 hrs.  Aeróbica localizada</p><p>10:00 &ndash; 11:00 hrs.  Aeróbica localizada</p><p>11:00 &ndash; 12:00 hrs. Adulto Mayor</p><h2>Martes &bull; Jueves &bull; Viernes</h2><p>18:00 &ndash; 19:00 hrs. Aeróbica Localizada</p><p>19:00 &ndash; 20:00 hrs. Aeróbica Localizada</p><p>20:00 &ndash; 21:00 hrs. Gimnasia Entretenida</p>');


# | Vaciado de tabla 'web_not'
# +------------------------------------->
DROP TABLE IF EXISTS `web_not`;


# | Estructura de la tabla 'web_not'
# +------------------------------------->
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_not'
# +------------------------------------->


# | Vaciado de tabla 'web_prod'
# +------------------------------------->
DROP TABLE IF EXISTS `web_prod`;


# | Estructura de la tabla 'web_prod'
# +------------------------------------->
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_prod'
# +------------------------------------->
INSERT INTO `web_prod` VALUES ('1', 'Productos Hidratantes', '30072009-1049_14.jpg', '&lt;p&gt;Productos hidratantes para la piel usados despu&amp;eacute;s de una sesi&amp;oacute;n de Solarium.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'si', '1', 'si', '1227758400');
INSERT INTO `web_prod` VALUES ('2', 'Productos Naturales', '30072009-1048_15.jpg', '&lt;p&gt;Productos Naturales de Belleza y Salud. &lt;/p&gt;', 'si', '1', 'si', '1248930000');
INSERT INTO `web_prod` VALUES ('3', 'Productos para cuidado facial', '30072009-1050_13.jpg', '&lt;p&gt;Productos para cuidado facial. &lt;/p&gt;', 'si', '1', 'si', '1248930000');


# | Vaciado de tabla 'web_serv'
# +------------------------------------->
DROP TABLE IF EXISTS `web_serv`;


# | Estructura de la tabla 'web_serv'
# +------------------------------------->
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_serv'
# +------------------------------------->
INSERT INTO `web_serv` VALUES ('1', 'Peinados exclusivos', '27112008-1409_chica.jpg', '&lt;p&gt;Peinados Exclusivos&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;', 'no', '1', 'si', '1227758400');
INSERT INTO `web_serv` VALUES ('2', 'Cosmetolog&iacute;a', '09122008-1252_logo_bellasltda.png', '&lt;p&gt;Cosmetolog&amp;iacute;a &lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('3', 'Masajes de relajaci&oacute;n', '09122008-1254_logo_bellasltda.png', '&lt;p&gt;Masajes de relajaci&amp;oacute;n&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('4', 'Tratamientos corporales', '30072009-1110_06.jpg', '&lt;p&gt;Tratamientos corporales de: &lt;/p&gt;&lt;ul&gt;&lt;li&gt;celulitis&lt;/li&gt;&lt;li&gt;reducci&amp;oacute;n&lt;/li&gt;&lt;li&gt;flacidez&lt;/li&gt;&lt;/ul&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('5', 'Peluquer&iacute;a', '09122008-1305_27112008-1409_chica.jpg', '&lt;p&gt;Peluquer&amp;iacute;a&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('6', 'Podolog&iacute;a', '09122008-1306_logo_bellasltda.png', '&lt;p&gt;Podolog&amp;iacute;a&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('7', 'Permanentes de pesta&ntilde;as', '09122008-1307_logo_bellasltda.png', '&lt;p&gt;Permanentes de pesta&amp;ntilde;as&lt;/p&gt;', 'si', '1', 'si', '1228795200');
INSERT INTO `web_serv` VALUES ('8', 'Maquillaje', '09122008-1308_logo_bellasltda.png', '&lt;p&gt;Maquillaje&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('9', 'Depilaciones', '30072009-1108_03.jpg', '&lt;p&gt;Depilaciones&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('10', 'Implantes', '09122008-1308_logo_bellasltda.png', '&lt;p&gt;Implantes&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('11', 'Delineados permanentes', '09122008-1309_logo_bellasltda.png', '&lt;p&gt;Delineados permanentes&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('12', 'Sauna', '09122008-1309_logo_bellasltda.png', '&lt;p&gt;Sauna&lt;/p&gt;', 'no', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('13', 'C&aacute;psula de Vapor Aromatizada', '09122008-1310_logo_bellasltda.png', '&lt;p&gt;C&amp;aacute;psula de Vapor Aromatizada&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('14', 'Solarium Horizontal', '30072009-1108_09.jpg', '&lt;p&gt;Solarium Horizontal.&lt;/p&gt;', 'si', '1', 'no', '1228795200');
INSERT INTO `web_serv` VALUES ('15', 'Solarium Vertical', '30072009-1107_10.jpg', '&lt;p&gt;Solarium Vertical.&lt;/p&gt;', 'si', '1', 'si', '1228795200');


# | Vaciado de tabla 'web_usuarios'
# +------------------------------------->
DROP TABLE IF EXISTS `web_usuarios`;


# | Estructura de la tabla 'web_usuarios'
# +------------------------------------->
CREATE TABLE `web_usuarios` (
  `usuarios_id` tinyint(10) NOT NULL auto_increment,
  `usuarios_nombre` varchar(25) collate utf8_unicode_ci NOT NULL,
  `usuarios_password` varchar(50) collate utf8_unicode_ci NOT NULL,
  `usuarios_tipo` varchar(50) collate utf8_unicode_ci NOT NULL,
  `usuarios_nombre_completo` text collate utf8_unicode_ci NOT NULL,
  `usuarios_genero` tinytext collate utf8_unicode_ci NOT NULL,
  `usuarios_email` tinytext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# | Carga de datos de la tabla 'web_usuarios'
# +------------------------------------->
INSERT INTO `web_usuarios` VALUES ('1', 'gabo', 'c32d3ca1eac61eff475a2dc79e19fe3e', 'admin', 'Gabriel Araya Rocha', 'masculino', 'gabo.araya@gmail.com');
INSERT INTO `web_usuarios` VALUES ('2', 'admin', 'c32d3ca1eac61eff475a2dc79e19fe3e', 'admin', 'Administrador', 'masculino', 'contacto@aqua3.cl');

