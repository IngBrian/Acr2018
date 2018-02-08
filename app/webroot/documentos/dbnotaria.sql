CREATE TABLE IF NOT EXISTS `[bd]`.`badcards` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tproceso_id` int(255) DEFAULT NULL,
  `ordenante_id` int(255) DEFAULT NULL,
  `referencia` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cliente_id` int(255) DEFAULT NULL,
  `codeudor` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `fecha_inicio` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `QtyDMora` int(11) NOT NULL,
  `juzgado_id` int(255) DEFAULT NULL,
  `pagare` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `saldo_int` double DEFAULT NULL,
  `doc_pagare` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doc_saldo_int` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doc_camara` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doc_anexos` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doc_r` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `estudio_credito` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `dpto_id` int(255) DEFAULT NULL,
  `municipio_id` int(255) DEFAULT NULL,
  `pagaduria_id` int(100) NOT NULL,
  `Abogado` int(11) NOT NULL,
  `Abogado2` int(11) DEFAULT NULL,
  `pendiente_id` int(11) DEFAULT NULL,
  `guia` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `guia2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ntitulo` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `estado` int(255) DEFAULT NULL,
  `empresa` int(11) NOT NULL,
  `subestado_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_albums`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL COMMENT 'Estos campos corresponden al Numero del proceso',
  `model_id` int(11) DEFAULT NULL COMMENT 'Estos campos corresponden al Numero del proceso',
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_archivos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL COMMENT 'Este campo es la relacion con documentos.',
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) NOT NULL DEFAULT 'full',
  `order` int(11) NOT NULL DEFAULT '9999999',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`document_id`),
  KEY `main_id` (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_bags`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_bags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_documents`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_items`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `bag_id` int(11) NOT NULL,
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) NOT NULL DEFAULT 'full',
  `order` int(11) NOT NULL DEFAULT '9999999',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`bag_id`),
  KEY `main_id` (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery_pictures`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`gallery_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `size` bigint(20) NOT NULL,
  `album_id` int(11) NOT NULL COMMENT 'Este campo es la relacion con la galeria.',
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) NOT NULL DEFAULT 'full',
  `order` int(11) NOT NULL DEFAULT '9999999',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `folder_id` (`album_id`),
  KEY `main_id` (`main_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_db`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`images_db` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbadjudicacion`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbadjudicacion` (
  `id_adjudicacion` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_adjudicacion` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbagenda`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbagenda` (
  `id` double NOT NULL AUTO_INCREMENT,
  `id_proceso` double NOT NULL,
  `fechaAgenda` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `comentario` varchar(30) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbagendagadmin`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbagendagadmin` (
  `id` double NOT NULL AUTO_INCREMENT,
  `id_proceso` double NOT NULL,
  `fechaAgenda` varchar(20) DEFAULT NULL,
  `hora` varchar(20) DEFAULT NULL,
  `comentario` varchar(30) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbasesor`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbasesor` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `cedula` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `direcion` varchar(100) NOT NULL,
  `email` varchar(45) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbaudienciasgadmin`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbaudienciasgadmin` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_proceso` int(100) NOT NULL,
  `video1` varchar(100) NOT NULL,
  `video2` varchar(100) NOT NULL,
  `video3` varchar(100) NOT NULL,
  `video4` varchar(100) NOT NULL,
  `audio1` varchar(100) NOT NULL,
  `audio2` varchar(100) NOT NULL,
  `audio3` varchar(100) NOT NULL,
  `audio4` varchar(100) NOT NULL,
  `opcional1` varchar(100) NOT NULL,
  `opcional2` varchar(100) NOT NULL,
  `opcional3` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbavaluo`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbavaluo` (
  `id_avaluo` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_avaluo` date NOT NULL DEFAULT '0000-00-00',
  `fecha_aprobacion` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `documento2` varchar(100) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbbitacora`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbbitacora` (
  `id_registro` double NOT NULL DEFAULT '0',
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `fecha_registro` date NOT NULL DEFAULT '0000-00-00',
  `hora_registro` time NOT NULL DEFAULT '00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbbitacora_procesos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbbitacora_procesos` (
  `idtbbitacora_procesos` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(11) NOT NULL DEFAULT '0',
  `idusuario` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `descripcion` varchar(2000) NOT NULL DEFAULT '',
  `modulo` enum('','p') NOT NULL DEFAULT '',
  PRIMARY KEY (`idtbbitacora_procesos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbbitacora_procesosgadmin`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbbitacora_procesosgadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(11) NOT NULL DEFAULT '0',
  `idusuario` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `descripcion` varchar(900) NOT NULL DEFAULT '',
  `modulo` enum('','p') NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbcategorias_juzgados`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbcategorias_juzgados` (
  `id_categoria` int(11) NOT NULL DEFAULT '0',
  `nombre_categoria` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbclientes` (
  `id` double NOT NULL AUTO_INCREMENT,
  `nit_cc` varchar(20) NOT NULL DEFAULT '',
  `nombre_completo` varchar(250) NOT NULL DEFAULT '',
  `direccion` varchar(250) NOT NULL DEFAULT '',
  `telefonos` varchar(250) DEFAULT '',
  `departamento_id` int(11) DEFAULT '0',
  `municipio_id` int(11) DEFAULT '0',
  `email` varchar(150) NOT NULL DEFAULT '',
  `pweb` varchar(250) DEFAULT '',
  `pais` varchar(50) DEFAULT '',
  `fecha_registro` date DEFAULT '0000-00-00',
  `hora_registro` time DEFAULT '00:00:00',
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbclientes_telefonos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbclientes_telefonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proceso_id` int(11) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `parentesco_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdemandas`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbdemandas` (
  `id_demanda` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_demanda` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL,
  `id_juzgado` int(170) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdepartamentos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbdepartamentos` (
  `id` int(11) NOT NULL,
  `nombre_dpto` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdependencias_empresa`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbdependencias_empresa` (
  `id_dependencia` int(11) NOT NULL DEFAULT '0',
  `nombre_dependencia` varchar(150) NOT NULL DEFAULT '',
  `sucursal` varchar(150) NOT NULL DEFAULT '',
  `director` varchar(250) NOT NULL DEFAULT '',
  `email` varchar(200) NOT NULL DEFAULT '',
  `telefonos` varchar(150) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbembargos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbembargos` (
  `id_embargo` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_embargo` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbempresas`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbempresas` (
  `id` double NOT NULL AUTO_INCREMENT,
  `identificacion` varchar(100) NOT NULL,
  `nombreCompleto` varchar(150) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefonos` varchar(50) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `nusuario` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `comentarios` text,
  `estado` int(11) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbetapas`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbetapas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_etapa` varchar(60) NOT NULL DEFAULT '',
  `tabla` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbetapasf`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbetapasf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proceso` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbglobalusers`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbglobalusers` (
  `usuario` varchar(255) NOT NULL,
  `bd` varchar(255) NOT NULL,
  `rol` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`usuario`,`bd`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbjuzgados`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbjuzgados` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `codigo` int(100) NOT NULL,
  `nombre_juzgado` varchar(100) NOT NULL,
  `oficina` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbliquidacion`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbliquidacion` (
  `id_liquidacion` double NOT NULL,
  `id_proceso` double NOT NULL,
  `f_liquidacion` varchar(25) NOT NULL,
  `f_costas` varchar(25) NOT NULL,
  `doc1` varchar(250) NOT NULL,
  `doc2` varchar(250) NOT NULL,
  `doc3` varchar(250) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblocalidades`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tblocalidades` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_albums`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_archivos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_archivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `archivo_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `document_id` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `accion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_bags`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_bags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bag_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_documents`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `default_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_items`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `bag_id` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `accion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbloggallery_pictures`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbloggallery_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `main_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `style` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `accion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblog_clientestelefonos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tblog_clientestelefonos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefono_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `parentesco_id` int(11) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblog_pagos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tblog_pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proceso_id` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `pago_capital` int(11) NOT NULL,
  `pago_interes` int(11) NOT NULL,
  `otros_pagos` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmandamiento`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbmandamiento` (
  `id_mandamiento` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_mandamiento` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmigracionesprocesos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbmigracionesprocesos` (
  `idMig` double NOT NULL,
  `idProceso` double NOT NULL,
  `idOrdenante` double NOT NULL,
  `idOrdenado1` double NOT NULL,
  `idOrdenado2` double NOT NULL,
  `idRelacionado` double NOT NULL,
  `idAsesor1` double NOT NULL,
  `idAsesor2` double NOT NULL,
  `idTipoP` double NOT NULL,
  `idJuzgado` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmigracionesxls`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbmigracionesxls` (
  `id` double NOT NULL AUTO_INCREMENT,
  `nombreFile` varchar(150) NOT NULL,
  `empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(30) NOT NULL,
  `logerror` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbmunicipios`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbmunicipios` (
  `id` int(11) NOT NULL,
  `id_dpto` int(11) NOT NULL DEFAULT '0',
  `nombre_municipio` varchar(150) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbnotificacion`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbnotificacion` (
  `id_notificacion` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_citacion` date NOT NULL DEFAULT '0000-00-00',
  `fecha_aviso` date NOT NULL DEFAULT '0000-00-00',
  `fecha_edicto` date NOT NULL DEFAULT '0000-00-00',
  `fecha_recurso` date NOT NULL,
  `fecha_nulidad` date NOT NULL,
  `fecha_contestacion` date NOT NULL,
  `fecha_excepciones` date NOT NULL,
  `nombre_curador` varchar(150) NOT NULL DEFAULT '',
  `documento` varchar(100) NOT NULL DEFAULT '',
  `documento2` varchar(100) NOT NULL DEFAULT '',
  `documento3` varchar(100) NOT NULL DEFAULT '',
  `documento4` varchar(100) NOT NULL,
  `documento5` varchar(100) NOT NULL,
  `documento6` varchar(100) NOT NULL,
  `documento7` varchar(100) NOT NULL,
  `video1` varchar(100) NOT NULL,
  `video2` varchar(100) NOT NULL,
  `video3` varchar(100) NOT NULL,
  `audio1` varchar(100) NOT NULL,
  `audio2` varchar(100) NOT NULL,
  `audio3` varchar(100) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbordenantes`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbordenantes` (
  `id` double NOT NULL AUTO_INCREMENT,
  `nit` varchar(20) NOT NULL DEFAULT '',
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `prefijo` varchar(5) NOT NULL DEFAULT '',
  `direccion` varchar(150) NOT NULL DEFAULT '',
  `telefonos` varchar(150) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpagadurias`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbpagadurias` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpagos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbpagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(11) NOT NULL DEFAULT '0',
  `fecha_pago` date DEFAULT NULL,
  `pago_capital` int(11) DEFAULT '0',
  `pago_intereses` int(11) DEFAULT '0',
  `otros_pagos` int(11) DEFAULT '0',
  `valor` int(11) DEFAULT '0',
  `PathFile` varchar(250) NOT NULL,
  `observa` varchar(500) NOT NULL DEFAULT '',
  `tipo` char(1) NOT NULL,
  `cancelado` char(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpagosgadmin`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbpagosgadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproceso` int(11) NOT NULL DEFAULT '0',
  `fecha_pago` date DEFAULT NULL,
  `pago_capital` double NOT NULL DEFAULT '0',
  `pago_intereses` double NOT NULL DEFAULT '0',
  `otros_pagos` double NOT NULL DEFAULT '0',
  `valor` double NOT NULL DEFAULT '0',
  `PathFile` varchar(250) NOT NULL,
  `observa` varchar(500) NOT NULL DEFAULT '',
  `tipo` char(1) NOT NULL,
  `cancelado` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbparentescos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbparentescos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbpermisos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbpermisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_mod1` int(11) NOT NULL,
  `id_mod2` int(11) NOT NULL,
  `id_mod3` int(11) NOT NULL,
  `id_mod4` int(11) NOT NULL,
  `id_mod5` int(11) NOT NULL,
  `id_mod6` int(11) NOT NULL,
  `id_mod7` int(11) NOT NULL,
  `id_mod8` int(11) NOT NULL,
  `id_mod9` int(11) NOT NULL,
  `id_mod10` int(11) NOT NULL,
  `id_mod11` int(11) NOT NULL,
  `id_mod12` int(11) NOT NULL,
  `id_demandante` int(11) DEFAULT '0',
  `id_demandante2` int(11) DEFAULT '0',
  `id_demandante3` int(11) DEFAULT '0',
  `id_demandante4` int(11) DEFAULT '0',
  `id_demandante5` int(11) DEFAULT '0',
  `cliente_id` int(11) DEFAULT '0',
  `cliente_id2` int(11) DEFAULT '0',
  `cliente_id3` int(11) DEFAULT '0',
  `cliente_id4` int(11) DEFAULT '0',
  `cliente_id5` int(11) DEFAULT '0',
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprocesos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbprocesos` (
  `id` double NOT NULL AUTO_INCREMENT,
  `id_ordenante` int(11) NOT NULL DEFAULT '0',
  `referencia` varchar(10) NOT NULL DEFAULT '',
  `id_cliente` double NOT NULL DEFAULT '0',
  `codeudor` varchar(250) NOT NULL DEFAULT '',
  `fecha_inicio` date NOT NULL DEFAULT '0000-00-00',
  `fecha_fin` date NOT NULL DEFAULT '0000-00-00',
  `recibo_pagare` int(11) NOT NULL DEFAULT '0',
  `recibo_consignacion` int(11) NOT NULL DEFAULT '0',
  `recibo_poder` int(11) NOT NULL DEFAULT '0',
  `recibo_extracto` int(11) NOT NULL DEFAULT '0',
  `recibo_anexos` int(11) NOT NULL DEFAULT '0',
  `recibo_r` int(11) NOT NULL DEFAULT '0',
  `doc_pagare` varchar(50) NOT NULL DEFAULT '',
  `doc_consignacion` varchar(50) NOT NULL DEFAULT '',
  `doc_poder` varchar(50) NOT NULL DEFAULT '',
  `doc_extracto` varchar(50) NOT NULL DEFAULT '',
  `doc_anexos` varchar(50) NOT NULL DEFAULT '',
  `doc_r` varchar(50) NOT NULL DEFAULT '',
  `nro_pagare` varchar(10) NOT NULL DEFAULT '',
  `saldo_insoluto` double NOT NULL DEFAULT '0',
  `estudio_credito` varchar(2) NOT NULL DEFAULT '',
  `id_dpto` int(11) NOT NULL DEFAULT '0',
  `id_municipio` int(100) NOT NULL DEFAULT '0',
  `id_pagaduria` int(100) NOT NULL,
  `id_tproceso` int(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `QtyDMora` int(11) NOT NULL,
  `Abogado` int(11) NOT NULL,
  `memorial` varchar(200) NOT NULL,
  `problemas_caso` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbprocesosmig`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbprocesosmig` (
  `proceso_id` double NOT NULL,
  `xls_id` double NOT NULL,
  `empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbremate`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbremate` (
  `id_remate` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha_remate` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsentencia`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbsentencia` (
  `id_sentencia` double NOT NULL DEFAULT '0',
  `id_proceso` double NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `documento` varchar(50) NOT NULL DEFAULT '',
  `observacion` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbsubestados`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbsubestados` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbterminacion`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbterminacion` (
  `id_terminacion` double NOT NULL,
  `id_proceso` double NOT NULL,
  `fpago_total` varchar(25) NOT NULL,
  `ptotal` double NOT NULL,
  `pmora` double NOT NULL,
  `potros` double NOT NULL,
  `documento` varchar(250) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbterminaciongadmin`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbterminaciongadmin` (
  `id_terminacion` double NOT NULL AUTO_INCREMENT,
  `id_proceso` double NOT NULL,
  `fpago_total` varchar(25) NOT NULL,
  `ptotal` double NOT NULL,
  `pmora` double NOT NULL,
  `potros` double NOT NULL,
  `documento` varchar(250) NOT NULL,
  `observaciones` text NOT NULL,
  PRIMARY KEY (`id_terminacion`),
  KEY `id_terminacion` (`id_terminacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtipo_usuario`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbtipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(150) NOT NULL DEFAULT '',
  `fecha_registro` date NOT NULL DEFAULT '0000-00-00',
  `hora_registro` time NOT NULL DEFAULT '00:00:00',
  `estado` int(11) NOT NULL DEFAULT '0',
  `crear` tinyint(1) NOT NULL DEFAULT '1',
  `ver` tinyint(1) NOT NULL,
  `tipo` int(11) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbtprocesos`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbtprocesos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuarios`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tbusuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cc_nit` varchar(20) NOT NULL DEFAULT '',
  `nombre_completo` varchar(150) DEFAULT NULL,
  `apellidos` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `fecha_registro` date DEFAULT NULL,
  `hora_registro` time DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `role` enum('sadmin','administrator','director','registrado','visitante') NOT NULL DEFAULT 'visitante',
  `reset_password_token` varchar(255) DEFAULT NULL,
  `token_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_gadministrativa`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tb_gadministrativa` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_tproceso` int(255) DEFAULT NULL,
  `id_demandante` int(255) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `id_deudor` int(255) DEFAULT NULL,
  `codeudor` varchar(255) DEFAULT NULL,
  `fecha_inicio` varchar(255) DEFAULT NULL,
  `QtyDMora` int(11) DEFAULT '0',
  `id_juzgado` int(255) DEFAULT NULL,
  `pagare` varchar(255) DEFAULT NULL,
  `saldo_int` double DEFAULT NULL,
  `doc_pagare` varchar(255) DEFAULT NULL,
  `doc_saldo_int` varchar(255) DEFAULT NULL,
  `doc_camara` varchar(255) DEFAULT NULL,
  `doc_anexos` varchar(255) DEFAULT NULL,
  `doc_r` varchar(255) DEFAULT NULL,
  `estudio_credito` varchar(255) DEFAULT NULL,
  `id_dpto` int(255) DEFAULT NULL,
  `id_municipio` int(255) DEFAULT NULL,
  `id_pagaduria` int(100) DEFAULT '0',
  `Abogado` int(11) DEFAULT '0',
  `Abogado2` int(11) DEFAULT NULL,
  `estado` int(255) DEFAULT NULL,
  `empresa` int(11) NOT NULL,
  `subestado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_logprocesos_a`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tb_logprocesos_a` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proceso_id` int(11) NOT NULL,
  `tproceso_id` int(11) DEFAULT NULL,
  `ordenante_id` int(11) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `codeudor` varchar(50) DEFAULT NULL,
  `fecha_inicio` varchar(50) DEFAULT NULL,
  `QtyDMora` int(11) DEFAULT NULL,
  `juzgado_id` int(11) DEFAULT NULL,
  `pagare` varchar(50) DEFAULT NULL,
  `saldo_int` int(11) DEFAULT NULL,
  `doc_pagare` varchar(50) DEFAULT NULL,
  `doc_saldo_int` varchar(50) DEFAULT NULL,
  `doc_camara` varchar(50) DEFAULT NULL,
  `doc_anexos` varchar(50) DEFAULT NULL,
  `doc_r` varchar(50) DEFAULT NULL,
  `estudio_credito` varchar(50) DEFAULT NULL,
  `dpto_id` int(11) DEFAULT NULL,
  `municipio_id` int(11) DEFAULT NULL,
  `pagaduria_id` int(11) DEFAULT NULL,
  `Abogado` int(11) DEFAULT NULL,
  `Abogado2` int(11) DEFAULT NULL,
  `guia` varchar(50) DEFAULT NULL,
  `guia2` varchar(50) DEFAULT NULL,
  `ntitulo` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `empresa` int(11) DEFAULT NULL,
  `subestado_id` int(11) DEFAULT NULL,
  `fecha` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `accion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_logprocesos_a_subestado`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tb_logprocesos_a_subestado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subestado_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_procesos_a`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tb_procesos_a` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tproceso_id` int(255) DEFAULT NULL,
  `ordenante_id` int(255) DEFAULT NULL,
  `referencia` varchar(255) DEFAULT NULL,
  `cliente_id` int(255) DEFAULT NULL,
  `codeudor` varchar(255) DEFAULT NULL,
  `fecha_inicio` varchar(255) DEFAULT NULL,
  `QtyDMora` int(11) NOT NULL,
  `juzgado_id` int(255) DEFAULT NULL,
  `pagare` varchar(255) DEFAULT NULL,
  `saldo_int` double DEFAULT NULL,
  `doc_pagare` varchar(255) DEFAULT NULL,
  `doc_saldo_int` varchar(255) DEFAULT NULL,
  `doc_camara` varchar(255) DEFAULT NULL,
  `doc_anexos` varchar(255) DEFAULT NULL,
  `doc_r` varchar(255) DEFAULT NULL,
  `estudio_credito` varchar(255) DEFAULT NULL,
  `ubicacion_id` int(255) DEFAULT NULL,
  `pagaduria_id` int(11) NOT NULL,
  `Abogado` int(11) NOT NULL,
  `Abogado2` int(11) DEFAULT NULL,
  `guia` varchar(255) DEFAULT NULL,
  `guia2` varchar(255) NOT NULL,
  `pendiente_id` int(11) NOT NULL,
  `ntitulo` varchar(255) DEFAULT NULL,
  `estado` int(255) DEFAULT NULL,
  `empresa` int(11) NOT NULL,
  `subestado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_procesos_a_subestado`
--

CREATE TABLE IF NOT EXISTS `[bd]`.`tb_procesos_a_subestado` (
  `subestado_id` int(11) NOT NULL,
  `proceso_id` int(11) NOT NULL,
  `observaciones` text NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Estructura de tabla para la tabla `tbaccesos`
--

CREATE TABLE IF NOT EXISTS  `[bd]`.`tbaccesos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proceso_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS  `[bd]`.`tbpendientes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

