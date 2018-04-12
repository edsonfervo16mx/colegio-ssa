-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 12-08-2017 a las 08:58:06
-- Versión del servidor: 5.7.18-0ubuntu0.17.04.1
-- Versión de PHP: 7.0.18-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ssa_jeanpiaget`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_colegiatura`
--

CREATE TABLE `abono_colegiatura` (
  `cve_abono_colegiatura` int(11) NOT NULL,
  `fecha_abono_colegiatura` date NOT NULL,
  `deposito_abono_colegiatura` float NOT NULL,
  `interes_abono_colegiatura` float DEFAULT NULL,
  `detalle_abono_colegiatura` varchar(250) DEFAULT NULL,
  `cve_cuenta_colegiatura` int(11) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `cve_metodo_pago` varchar(70) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `status_abono_colegiatura` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de abonos a la colegiatura';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_inscripcion`
--

CREATE TABLE `abono_inscripcion` (
  `cve_abono_inscripcion` int(11) NOT NULL,
  `fecha_abono_inscripcion` date NOT NULL,
  `deposito_abono_inscripcion` float NOT NULL,
  `detalle_abono_inscripcion` varchar(250) DEFAULT NULL,
  `status_abono_inscripcion` varchar(20) DEFAULT 'active',
  `cve_cuenta_inscripcion` int(11) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `cve_metodo_pago` varchar(70) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de abonos de inscripcion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_servicios`
--

CREATE TABLE `abono_servicios` (
  `cve_abono_servicios` int(11) NOT NULL,
  `fecha_abono_servicios` date NOT NULL,
  `deposito_abono_servicios` float NOT NULL,
  `detalle_abono_servicios` varchar(250) DEFAULT NULL,
  `status_abono_servicios` varchar(20) DEFAULT 'active',
  `cve_cuenta_servicios` int(11) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `cve_metodo_pago` varchar(70) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de abonos a servicios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono_ventas`
--

CREATE TABLE `abono_ventas` (
  `cve_abono_venta` int(11) NOT NULL,
  `fecha_abono_venta` date NOT NULL,
  `deposito_abono_venta` float NOT NULL,
  `detalle_abono_venta` varchar(250) DEFAULT NULL,
  `cve_cuenta_venta` int(11) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `cve_metodo_pago` varchar(70) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `status_abono_venta` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de abonos en ventas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `curp_alumno` varchar(70) NOT NULL,
  `nombre_alumno` varchar(100) NOT NULL,
  `apellidop_alumno` varchar(100) NOT NULL,
  `apellidom_alumno` varchar(100) NOT NULL,
  `foto_alumno` varchar(200) DEFAULT NULL,
  `direccion_alumno` varchar(250) DEFAULT NULL,
  `nacimiento_alumno` date DEFAULT NULL,
  `correo_alumno` varchar(250) DEFAULT NULL,
  `telefono_alumno` varchar(20) DEFAULT NULL,
  `observaciones_alumno` varchar(250) DEFAULT NULL,
  `cve_sexo` varchar(20) NOT NULL,
  `cve_campus` varchar(70) NOT NULL,
  `status_alumno` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Alumnos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campus`
--

CREATE TABLE `campus` (
  `cve_campus` varchar(70) NOT NULL,
  `nombre_campus` varchar(100) NOT NULL,
  `logo_campus` varchar(200) NOT NULL,
  `telefono_campus` varchar(20) DEFAULT NULL,
  `correo_campus` varchar(200) DEFAULT NULL,
  `direccion_campus` varchar(250) DEFAULT NULL,
  `descripcion_campus` varchar(400) DEFAULT NULL,
  `cve_colegio` varchar(70) NOT NULL,
  `status_campus` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Campus Preescolar';

--
-- Volcado de datos para la tabla `campus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_producto`
--

CREATE TABLE `categoria_producto` (
  `cve_categoria` varchar(70) NOT NULL,
  `nombre_categoria` varchar(100) DEFAULT NULL,
  `detalle_categoria` varchar(200) DEFAULT NULL,
  `cve_campus` varchar(70) NOT NULL,
  `status_categoria` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de categoria de los productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_estado_pago`
--

CREATE TABLE `cat_estado_pago` (
  `cve_estado_pago` varchar(70) NOT NULL,
  `status_estado_pago` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Categorias de los estados de los pagos';

--
-- Volcado de datos para la tabla `cat_estado_pago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_mes`
--

CREATE TABLE `cat_mes` (
  `cve_mes` varchar(70) NOT NULL,
  `status_mes` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de meses';

--
-- Volcado de datos para la tabla `cat_mes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_metodo_pago`
--

CREATE TABLE `cat_metodo_pago` (
  `cve_metodo_pago` varchar(70) NOT NULL,
  `status_metodo_pago` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de metodos de pago';

--
-- Volcado de datos para la tabla `cat_metodo_pago`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_sexo`
--

CREATE TABLE `cat_sexo` (
  `cve_sexo` varchar(20) NOT NULL,
  `status_sexo` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Categorias Sexo';

--
-- Volcado de datos para la tabla `cat_sexo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE `ciclo` (
  `cve_ciclo` varchar(70) NOT NULL,
  `nombre_ciclo` varchar(100) NOT NULL,
  `inicio_ciclo` date DEFAULT NULL,
  `fin_ciclo` date DEFAULT NULL,
  `cve_campus` varchar(70) NOT NULL,
  `status_ciclo` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de ciclo escolar';

--
-- Volcado de datos para la tabla `ciclo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

CREATE TABLE `colegio` (
  `cve_colegio` varchar(70) NOT NULL,
  `nombre_colegio` varchar(100) NOT NULL,
  `status_colegio` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Datos Generales del Colegio';

--
-- Volcado de datos para la tabla `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constructor_grupo`
--

CREATE TABLE `constructor_grupo` (
  `cve_constructor_grupo` varchar(70) NOT NULL,
  `cve_grupo` varchar(70) NOT NULL,
  `curp_alumno` varchar(70) NOT NULL,
  `status_constructor_grupo` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Contructor de grupo, REL_GRUPO_ALUMNO';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_colegiatura`
--

CREATE TABLE `cuenta_colegiatura` (
  `cve_cuenta_colegiatura` int(11) NOT NULL,
  `folio_cuenta_colegiatura` varchar(70) NOT NULL,
  `fecha_cuenta_colegiatura` date NOT NULL,
  `monto_cuenta_colegiatura` float NOT NULL,
  `beca_cuenta_colegiatura` float NOT NULL,
  `descripcion_cuenta_colegiatura` varchar(250) DEFAULT NULL,
  `cve_precio_colegiatura` varchar(70) NOT NULL,
  `cve_constructor_grupo` varchar(70) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `status_cuenta_colegiatura` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de cuenta general de colegiaturas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_inscripcion`
--

CREATE TABLE `cuenta_inscripcion` (
  `cve_cuenta_inscripcion` int(11) NOT NULL,
  `folio_cuenta_inscripcion` varchar(70) NOT NULL,
  `fecha_cuenta_inscripcion` date NOT NULL,
  `monto_cuenta_inscripcion` float NOT NULL,
  `descripcion_cuenta_inscripcion` varchar(250) DEFAULT NULL,
  `cve_precio_inscripcion` varchar(70) NOT NULL,
  `cve_constructor_grupo` varchar(70) NOT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `status_cuenta_inscripcion` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de cuentas generales de inscripcion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_servicios`
--

CREATE TABLE `cuenta_servicios` (
  `cve_cuenta_servicios` int(11) NOT NULL,
  `folio_cuenta_servicios` varchar(70) NOT NULL,
  `fecha_cuenta_servicios` date NOT NULL,
  `monto_cuenta_servicios` float NOT NULL,
  `descripcion_cuenta_servicios` varchar(250) DEFAULT NULL,
  `cve_precio_servicios` varchar(70) NOT NULL,
  `cve_constructor_grupo` varchar(70) NOT NULL,
  `cat_estado_pago_cve_estado_pago` varchar(70) NOT NULL,
  `status_cuenta_servicios` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de cuenta de servicios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_ventas`
--

CREATE TABLE `cuenta_ventas` (
  `cve_cuenta_venta` int(11) NOT NULL,
  `folio_cuenta_venta` varchar(70) NOT NULL,
  `nombre_cuenta_venta` varchar(200) NOT NULL,
  `fecha_cuenta_venta` date NOT NULL,
  `monto_cuenta_venta` float NOT NULL,
  `descripcion_cuenta_venta` varchar(250) DEFAULT NULL,
  `cve_estado_pago` varchar(70) NOT NULL,
  `caja_campus` varchar(70) NOT NULL,
  `status_cuenta_venta` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de cuentas de las ventas en la tienda';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `cve_gasto` int(11) NOT NULL,
  `titulo_gasto` varchar(100) DEFAULT NULL,
  `fecha_gasto` date DEFAULT NULL,
  `descripcion_gasto` varchar(250) DEFAULT NULL,
  `monto_gasto` float DEFAULT NULL,
  `cve_metodo_pago` varchar(70) NOT NULL,
  `cve_ciclo` varchar(70) NOT NULL,
  `status_gasto` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de gastos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `cve_grupo` varchar(70) NOT NULL,
  `nombre_grupo` varchar(70) NOT NULL,
  `cve_ciclo` varchar(70) NOT NULL,
  `status_grupo` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Grupos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_colegiatura`
--

CREATE TABLE `precio_colegiatura` (
  `cve_precio_colegiatura` varchar(70) NOT NULL,
  `titulo_precio_colegiatura` varchar(100) NOT NULL,
  `monto_precio_colegiatura` float NOT NULL,
  `meses_precio_colegiatura` int(11) NOT NULL,
  `detalle_precio_colegiatura` varchar(250) DEFAULT NULL,
  `cve_ciclo` varchar(70) NOT NULL,
  `status_precio_colegiatura` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Precios de las Colegiaturas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_inscripcion`
--

CREATE TABLE `precio_inscripcion` (
  `cve_precio_inscripcion` varchar(70) NOT NULL,
  `titulo_precio_inscripcion` varchar(100) NOT NULL,
  `monto_precio_inscripcion` float NOT NULL,
  `detalle_precio_inscripcion` varchar(250) DEFAULT NULL,
  `cve_ciclo` varchar(70) NOT NULL,
  `status_precio_inscripcion` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de precios de Inscripcion';

--
-- Volcado de datos para la tabla `precio_inscripcion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_servicios`
--

CREATE TABLE `precio_servicios` (
  `cve_precio_servicios` varchar(70) NOT NULL,
  `titulo_precio_servicios` varchar(100) NOT NULL,
  `monto_precio_servicios` float NOT NULL,
  `detalle_precio_servicios` varchar(250) DEFAULT NULL,
  `cve_ciclo` varchar(70) NOT NULL,
  `status_precio_servicios` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de catalogo de servicios';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cve_producto` int(11) NOT NULL,
  `titulo_producto` varchar(100) NOT NULL,
  `detalle_producto` varchar(200) DEFAULT NULL,
  `descripcion_producto` varchar(250) DEFAULT NULL,
  `precio_producto` float NOT NULL,
  `existencia_producto` int(11) NOT NULL,
  `cve_categoria` varchar(70) NOT NULL,
  `status_producto` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de productos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relacion`
--

CREATE TABLE `relacion` (
  `cve_relacion` varchar(70) NOT NULL,
  `curp_alumno` varchar(70) NOT NULL,
  `cve_tutor` int(11) NOT NULL,
  `status_relacion` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de relaciones entre alumno y tutor';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_abono_mes`
--

CREATE TABLE `rel_abono_mes` (
  `cve_rel_abono_mes` int(11) NOT NULL,
  `cve_abono_colegiatura` int(11) NOT NULL,
  `cve_mes` varchar(70) NOT NULL,
  `status_rel_abono_mes` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de RELACION entre el abono y el mes o los meses a cobrar';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_ventas_producto`
--

CREATE TABLE `rel_ventas_producto` (
  `cve_rel_ventas_producto` int(11) NOT NULL,
  `cve_producto` int(11) NOT NULL,
  `cve_cuenta_venta` int(11) NOT NULL,
  `cantidad_rel_ventas_producto` int(11) DEFAULT NULL,
  `status_rel_ventas_producto` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de relaciones de cuentas ventas al producto';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `cve_tutor` int(11) NOT NULL,
  `nombre_tutor` varchar(100) NOT NULL,
  `apellidop_tutor` varchar(100) NOT NULL,
  `apellidom_tutor` varchar(100) NOT NULL,
  `correo_tutor` varchar(250) DEFAULT NULL,
  `telefono_tutor` varchar(20) DEFAULT NULL,
  `observaciones_tutor` varchar(250) DEFAULT NULL,
  `status_tutor` varchar(20) DEFAULT 'active',
  `cve_sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de tutores y/o Padres de Familia';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(100) NOT NULL,
  `password_usuario` varchar(200) NOT NULL,
  `descripcion_usuario` varchar(250) DEFAULT NULL,
  `privilegio_usuario` varchar(20) DEFAULT NULL,
  `status_usuario` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de Usuarios del Sistema';

--
-- Volcado de datos para la tabla `usuario`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono_colegiatura`
--
ALTER TABLE `abono_colegiatura`
  ADD PRIMARY KEY (`cve_abono_colegiatura`),
  ADD KEY `fk_abono_colegiatura_cuenta_colegiatura_preescolar1_idx` (`cve_cuenta_colegiatura`),
  ADD KEY `fk_abono_colegiatura_cat_estado_pago1_idx` (`cve_estado_pago`),
  ADD KEY `fk_abono_colegiatura_cat_metodo_pago1_idx` (`cve_metodo_pago`),
  ADD KEY `fk_abono_colegiatura_preescolar_usuario1_idx` (`nombre_usuario`);

--
-- Indices de la tabla `abono_inscripcion`
--
ALTER TABLE `abono_inscripcion`
  ADD PRIMARY KEY (`cve_abono_inscripcion`),
  ADD KEY `fk_abono_inscripcion_preescolar_cuenta_inscripcion_preescol_idx` (`cve_cuenta_inscripcion`),
  ADD KEY `fk_abono_inscripcion_preescolar_cat_estado_pago1_idx` (`cve_estado_pago`),
  ADD KEY `fk_abono_inscripcion_preescolar_cat_metodo_pago1_idx` (`cve_metodo_pago`),
  ADD KEY `fk_abono_inscripcion_preescolar_usuario1_idx` (`nombre_usuario`);

--
-- Indices de la tabla `abono_servicios`
--
ALTER TABLE `abono_servicios`
  ADD PRIMARY KEY (`cve_abono_servicios`),
  ADD KEY `fk_abono_servicios_preescolar_cuenta_servicios_preescolar1_idx` (`cve_cuenta_servicios`),
  ADD KEY `fk_abono_servicios_preescolar_cat_estado_pago1_idx` (`cve_estado_pago`),
  ADD KEY `fk_abono_servicios_preescolar_cat_metodo_pago1_idx` (`cve_metodo_pago`),
  ADD KEY `fk_abono_servicios_preescolar_usuario1_idx` (`nombre_usuario`);

--
-- Indices de la tabla `abono_ventas`
--
ALTER TABLE `abono_ventas`
  ADD PRIMARY KEY (`cve_abono_venta`),
  ADD KEY `fk_abono_ventas_cuenta_ventas1_idx` (`cve_cuenta_venta`),
  ADD KEY `fk_abono_ventas_cat_estado_pago1_idx` (`cve_estado_pago`),
  ADD KEY `fk_abono_ventas_cat_metodo_pago1_idx` (`cve_metodo_pago`),
  ADD KEY `fk_abono_ventas_usuario1_idx` (`nombre_usuario`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`curp_alumno`),
  ADD KEY `fk_alumno_preescolar_campus_preescolar1_idx` (`cve_campus`),
  ADD KEY `fk_alumno_preescolar_cat_sexo1_idx` (`cve_sexo`);

--
-- Indices de la tabla `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`cve_campus`),
  ADD KEY `fk_campus_preescolar_colegio1_idx` (`cve_colegio`);

--
-- Indices de la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD PRIMARY KEY (`cve_categoria`),
  ADD KEY `fk_categoria_producto_campus1_idx` (`cve_campus`);

--
-- Indices de la tabla `cat_estado_pago`
--
ALTER TABLE `cat_estado_pago`
  ADD PRIMARY KEY (`cve_estado_pago`);

--
-- Indices de la tabla `cat_mes`
--
ALTER TABLE `cat_mes`
  ADD PRIMARY KEY (`cve_mes`);

--
-- Indices de la tabla `cat_metodo_pago`
--
ALTER TABLE `cat_metodo_pago`
  ADD PRIMARY KEY (`cve_metodo_pago`);

--
-- Indices de la tabla `cat_sexo`
--
ALTER TABLE `cat_sexo`
  ADD PRIMARY KEY (`cve_sexo`);

--
-- Indices de la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD PRIMARY KEY (`cve_ciclo`),
  ADD KEY `fk_ciclo_preescolar_campus_preescolar1_idx` (`cve_campus`);

--
-- Indices de la tabla `colegio`
--
ALTER TABLE `colegio`
  ADD PRIMARY KEY (`cve_colegio`);

--
-- Indices de la tabla `constructor_grupo`
--
ALTER TABLE `constructor_grupo`
  ADD PRIMARY KEY (`cve_constructor_grupo`),
  ADD KEY `fk_constructor_grupo_preescolar_alumno_preescolar1_idx` (`curp_alumno`),
  ADD KEY `fk_constructor_grupo_preescolar_grupo_preescolar1_idx` (`cve_grupo`);

--
-- Indices de la tabla `cuenta_colegiatura`
--
ALTER TABLE `cuenta_colegiatura`
  ADD PRIMARY KEY (`cve_cuenta_colegiatura`),
  ADD KEY `fk_cuenta_colegiatura_preescolar_precio_colegiatura_preesco_idx` (`cve_precio_colegiatura`),
  ADD KEY `fk_cuenta_colegiatura_preescolar_constructor_grupo_preescol_idx` (`cve_constructor_grupo`),
  ADD KEY `fk_cuenta_colegiatura_preescolar_cat_estado_pago1_idx` (`cve_estado_pago`);

--
-- Indices de la tabla `cuenta_inscripcion`
--
ALTER TABLE `cuenta_inscripcion`
  ADD PRIMARY KEY (`cve_cuenta_inscripcion`),
  ADD KEY `fk_cuenta_inscripcion_preescolar_precio_inscripcion_preesco_idx` (`cve_precio_inscripcion`),
  ADD KEY `fk_cuenta_inscripcion_preescolar_constructor_grupo_preescol_idx` (`cve_constructor_grupo`),
  ADD KEY `fk_cuenta_inscripcion_preescolar_cat_estado_pago1_idx` (`cve_estado_pago`);

--
-- Indices de la tabla `cuenta_servicios`
--
ALTER TABLE `cuenta_servicios`
  ADD PRIMARY KEY (`cve_cuenta_servicios`),
  ADD KEY `fk_cuenta_servicios_preescolar_precio_servicios_preescolar1_idx` (`cve_precio_servicios`),
  ADD KEY `fk_cuenta_servicios_preescolar_constructor_grupo_preescolar_idx` (`cve_constructor_grupo`),
  ADD KEY `fk_cuenta_servicios_preescolar_cat_estado_pago1_idx` (`cat_estado_pago_cve_estado_pago`);

--
-- Indices de la tabla `cuenta_ventas`
--
ALTER TABLE `cuenta_ventas`
  ADD PRIMARY KEY (`cve_cuenta_venta`),
  ADD KEY `fk_cuenta_ventas_cat_estado_pago1_idx` (`cve_estado_pago`),
  ADD KEY `fk_caja_campus_cve_campus` (`caja_campus`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`cve_gasto`),
  ADD KEY `fk_gastos_cat_metodo_pago1_idx` (`cve_metodo_pago`),
  ADD KEY `fk_gastos_ciclo1_idx` (`cve_ciclo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`cve_grupo`),
  ADD KEY `fk_grupo_preescolar_ciclo_preescolar1_idx` (`cve_ciclo`);

--
-- Indices de la tabla `precio_colegiatura`
--
ALTER TABLE `precio_colegiatura`
  ADD PRIMARY KEY (`cve_precio_colegiatura`),
  ADD KEY `fk_precio_colegiatura_preescolar_ciclo_preescolar1_idx` (`cve_ciclo`);

--
-- Indices de la tabla `precio_inscripcion`
--
ALTER TABLE `precio_inscripcion`
  ADD PRIMARY KEY (`cve_precio_inscripcion`),
  ADD KEY `fk_precio_inscripcion_preescolar_ciclo_preescolar1_idx` (`cve_ciclo`);

--
-- Indices de la tabla `precio_servicios`
--
ALTER TABLE `precio_servicios`
  ADD PRIMARY KEY (`cve_precio_servicios`),
  ADD KEY `fk_precio_servicios_preescolar_ciclo_preescolar1_idx` (`cve_ciclo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cve_producto`),
  ADD KEY `fk_productos_categoria_producto1_idx` (`cve_categoria`);

--
-- Indices de la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD PRIMARY KEY (`cve_relacion`),
  ADD KEY `fk_relacion_preescolar_alumno_preescolar1_idx` (`curp_alumno`),
  ADD KEY `fk_relacion_preescolar_tutor_preescolar1` (`cve_tutor`);

--
-- Indices de la tabla `rel_abono_mes`
--
ALTER TABLE `rel_abono_mes`
  ADD PRIMARY KEY (`cve_rel_abono_mes`),
  ADD KEY `fk_rel_abono_mes_preescolar_abono_colegiatura_preescolar1_idx` (`cve_abono_colegiatura`),
  ADD KEY `fk_rel_abono_mes_preescolar_cat_mes1_idx` (`cve_mes`);

--
-- Indices de la tabla `rel_ventas_producto`
--
ALTER TABLE `rel_ventas_producto`
  ADD PRIMARY KEY (`cve_rel_ventas_producto`),
  ADD KEY `fk_rel_ventas_producto_productos1_idx` (`cve_producto`),
  ADD KEY `fk_rel_ventas_producto_cuenta_ventas1_idx` (`cve_cuenta_venta`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`cve_tutor`),
  ADD KEY `fk_tutor_preescolar_cat_sexo1_idx` (`cve_sexo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono_colegiatura`
--
ALTER TABLE `abono_colegiatura`
  MODIFY `cve_abono_colegiatura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `abono_inscripcion`
--
ALTER TABLE `abono_inscripcion`
  MODIFY `cve_abono_inscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `abono_servicios`
--
ALTER TABLE `abono_servicios`
  MODIFY `cve_abono_servicios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `abono_ventas`
--
ALTER TABLE `abono_ventas`
  MODIFY `cve_abono_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuenta_colegiatura`
--
ALTER TABLE `cuenta_colegiatura`
  MODIFY `cve_cuenta_colegiatura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuenta_inscripcion`
--
ALTER TABLE `cuenta_inscripcion`
  MODIFY `cve_cuenta_inscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuenta_servicios`
--
ALTER TABLE `cuenta_servicios`
  MODIFY `cve_cuenta_servicios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuenta_ventas`
--
ALTER TABLE `cuenta_ventas`
  MODIFY `cve_cuenta_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `cve_gasto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cve_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_abono_mes`
--
ALTER TABLE `rel_abono_mes`
  MODIFY `cve_rel_abono_mes` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_ventas_producto`
--
ALTER TABLE `rel_ventas_producto`
  MODIFY `cve_rel_ventas_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `cve_tutor` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono_colegiatura`
--
ALTER TABLE `abono_colegiatura`
  ADD CONSTRAINT `fk_abono_colegiatura_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_colegiatura_cat_metodo_pago1` FOREIGN KEY (`cve_metodo_pago`) REFERENCES `cat_metodo_pago` (`cve_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_colegiatura_cuenta_colegiatura_preescolar1` FOREIGN KEY (`cve_cuenta_colegiatura`) REFERENCES `cuenta_colegiatura` (`cve_cuenta_colegiatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_colegiatura_preescolar_usuario1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `abono_inscripcion`
--
ALTER TABLE `abono_inscripcion`
  ADD CONSTRAINT `fk_abono_inscripcion_preescolar_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_inscripcion_preescolar_cat_metodo_pago1` FOREIGN KEY (`cve_metodo_pago`) REFERENCES `cat_metodo_pago` (`cve_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_inscripcion_preescolar_cuenta_inscripcion_preescolar1` FOREIGN KEY (`cve_cuenta_inscripcion`) REFERENCES `cuenta_inscripcion` (`cve_cuenta_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_inscripcion_preescolar_usuario1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `abono_servicios`
--
ALTER TABLE `abono_servicios`
  ADD CONSTRAINT `fk_abono_servicios_preescolar_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_servicios_preescolar_cat_metodo_pago1` FOREIGN KEY (`cve_metodo_pago`) REFERENCES `cat_metodo_pago` (`cve_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_servicios_preescolar_cuenta_servicios_preescolar1` FOREIGN KEY (`cve_cuenta_servicios`) REFERENCES `cuenta_servicios` (`cve_cuenta_servicios`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_servicios_preescolar_usuario1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `abono_ventas`
--
ALTER TABLE `abono_ventas`
  ADD CONSTRAINT `fk_abono_ventas_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_ventas_cat_metodo_pago1` FOREIGN KEY (`cve_metodo_pago`) REFERENCES `cat_metodo_pago` (`cve_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_ventas_cuenta_ventas1` FOREIGN KEY (`cve_cuenta_venta`) REFERENCES `cuenta_ventas` (`cve_cuenta_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_abono_ventas_usuario1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_alumno_preescolar_campus_preescolar1` FOREIGN KEY (`cve_campus`) REFERENCES `campus` (`cve_campus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_alumno_preescolar_cat_sexo1` FOREIGN KEY (`cve_sexo`) REFERENCES `cat_sexo` (`cve_sexo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `fk_campus_preescolar_colegio1` FOREIGN KEY (`cve_colegio`) REFERENCES `colegio` (`cve_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria_producto`
--
ALTER TABLE `categoria_producto`
  ADD CONSTRAINT `fk_categoria_producto_campus1` FOREIGN KEY (`cve_campus`) REFERENCES `campus` (`cve_campus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciclo`
--
ALTER TABLE `ciclo`
  ADD CONSTRAINT `fk_ciclo_preescolar_campus_preescolar1` FOREIGN KEY (`cve_campus`) REFERENCES `campus` (`cve_campus`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `constructor_grupo`
--
ALTER TABLE `constructor_grupo`
  ADD CONSTRAINT `fk_constructor_grupo_preescolar_alumno_preescolar1` FOREIGN KEY (`curp_alumno`) REFERENCES `alumno` (`curp_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_constructor_grupo_preescolar_grupo_preescolar1` FOREIGN KEY (`cve_grupo`) REFERENCES `grupo` (`cve_grupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta_colegiatura`
--
ALTER TABLE `cuenta_colegiatura`
  ADD CONSTRAINT `fk_cuenta_colegiatura_preescolar_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_colegiatura_preescolar_constructor_grupo_preescolar1` FOREIGN KEY (`cve_constructor_grupo`) REFERENCES `constructor_grupo` (`cve_constructor_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_colegiatura_preescolar_precio_colegiatura_preescolar1` FOREIGN KEY (`cve_precio_colegiatura`) REFERENCES `precio_colegiatura` (`cve_precio_colegiatura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta_inscripcion`
--
ALTER TABLE `cuenta_inscripcion`
  ADD CONSTRAINT `fk_cuenta_inscripcion_preescolar_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_inscripcion_preescolar_constructor_grupo_preescolar1` FOREIGN KEY (`cve_constructor_grupo`) REFERENCES `constructor_grupo` (`cve_constructor_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_inscripcion_preescolar_precio_inscripcion_preescolar1` FOREIGN KEY (`cve_precio_inscripcion`) REFERENCES `precio_inscripcion` (`cve_precio_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta_servicios`
--
ALTER TABLE `cuenta_servicios`
  ADD CONSTRAINT `fk_cuenta_servicios_preescolar_cat_estado_pago1` FOREIGN KEY (`cat_estado_pago_cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_servicios_preescolar_constructor_grupo_preescolar1` FOREIGN KEY (`cve_constructor_grupo`) REFERENCES `constructor_grupo` (`cve_constructor_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_servicios_preescolar_precio_servicios_preescolar1` FOREIGN KEY (`cve_precio_servicios`) REFERENCES `precio_servicios` (`cve_precio_servicios`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta_ventas`
--
ALTER TABLE `cuenta_ventas`
  ADD CONSTRAINT `fk_caja_campus_cve_campus` FOREIGN KEY (`caja_campus`) REFERENCES `campus` (`cve_campus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cuenta_ventas_cat_estado_pago1` FOREIGN KEY (`cve_estado_pago`) REFERENCES `cat_estado_pago` (`cve_estado_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD CONSTRAINT `fk_gastos_cat_metodo_pago1` FOREIGN KEY (`cve_metodo_pago`) REFERENCES `cat_metodo_pago` (`cve_metodo_pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gastos_ciclo1` FOREIGN KEY (`cve_ciclo`) REFERENCES `ciclo` (`cve_ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_preescolar_ciclo_preescolar1` FOREIGN KEY (`cve_ciclo`) REFERENCES `ciclo` (`cve_ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precio_colegiatura`
--
ALTER TABLE `precio_colegiatura`
  ADD CONSTRAINT `fk_precio_colegiatura_preescolar_ciclo_preescolar1` FOREIGN KEY (`cve_ciclo`) REFERENCES `ciclo` (`cve_ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precio_inscripcion`
--
ALTER TABLE `precio_inscripcion`
  ADD CONSTRAINT `fk_precio_inscripcion_preescolar_ciclo_preescolar1` FOREIGN KEY (`cve_ciclo`) REFERENCES `ciclo` (`cve_ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `precio_servicios`
--
ALTER TABLE `precio_servicios`
  ADD CONSTRAINT `fk_precio_servicios_preescolar_ciclo_preescolar1` FOREIGN KEY (`cve_ciclo`) REFERENCES `ciclo` (`cve_ciclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria_producto1` FOREIGN KEY (`cve_categoria`) REFERENCES `categoria_producto` (`cve_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `relacion`
--
ALTER TABLE `relacion`
  ADD CONSTRAINT `fk_relacion_preescolar_alumno_preescolar1` FOREIGN KEY (`curp_alumno`) REFERENCES `alumno` (`curp_alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_relacion_preescolar_tutor_preescolar1` FOREIGN KEY (`cve_tutor`) REFERENCES `tutor` (`cve_tutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_abono_mes`
--
ALTER TABLE `rel_abono_mes`
  ADD CONSTRAINT `fk_rel_abono_mes_preescolar_abono_colegiatura_preescolar1` FOREIGN KEY (`cve_abono_colegiatura`) REFERENCES `abono_colegiatura` (`cve_abono_colegiatura`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rel_abono_mes_preescolar_cat_mes1` FOREIGN KEY (`cve_mes`) REFERENCES `cat_mes` (`cve_mes`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_ventas_producto`
--
ALTER TABLE `rel_ventas_producto`
  ADD CONSTRAINT `fk_rel_ventas_producto_cuenta_ventas1` FOREIGN KEY (`cve_cuenta_venta`) REFERENCES `cuenta_ventas` (`cve_cuenta_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rel_ventas_producto_productos1` FOREIGN KEY (`cve_producto`) REFERENCES `productos` (`cve_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_tutor_preescolar_cat_sexo1` FOREIGN KEY (`cve_sexo`) REFERENCES `cat_sexo` (`cve_sexo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
