-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2021 a las 20:42:16
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matchpeo_vacantesbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academico`
--

CREATE TABLE `academico` (
  `id_académico` int(10) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `academico`
--

INSERT INTO `academico` (`id_académico`, `texto`) VALUES
(1, 'Licenciatura'),
(2, 'Maestría'),
(3, 'Doctorado'),
(4, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(10) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `texto`) VALUES
(1, 'ABASTECIMIENTOS'),
(2, 'ADMINISTRACIÓN'),
(3, 'ADMINISTRACIÓN DE PROYECTOS'),
(4, 'ADMINISTRACIÓN DE RIESGOS'),
(5, 'ARTE CREATIVO'),
(6, 'CADENA DE SUMINISTRO'),
(7, 'CALIDAD'),
(8, 'COMERCIAL'),
(9, 'COMERCIAL INTERNACIONAL'),
(10, 'CONSULTORA'),
(11, 'CONTRALORIA'),
(12, 'CUIDADO DE LA SALUD'),
(13, 'DESARROLLO DE NEGOCIOS'),
(14, 'DISEÑO'),
(15, 'EDUCACIÓN'),
(16, 'ENTRETENIMIENTO'),
(17, 'FINANZAS'),
(18, 'FISCAL'),
(19, 'INGENIERÍA'),
(20, 'LEGAL'),
(21, 'LOGÍSTICA'),
(22, 'MANTENIMIENTO'),
(23, 'MERCADOTECNIA'),
(24, 'OPERACIONES'),
(25, 'PLANEACION ESTRATEGICA'),
(26, 'PRODUCCIÓN'),
(27, 'PUBLICIDAD'),
(28, 'RECURSOS HUMANOS'),
(29, 'RELACIONES PUBLICAS'),
(30, 'SERVICIO AL CLIENTE'),
(31, 'TÉCNICA'),
(32, 'TECNOLOGÍA'),
(33, 'TECNOLOGÍAS DE INFORMACIÓN'),
(34, 'VENTAS'),
(35, 'VENTAS'),
(36, 'OTROS'),
(37, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `Id` int(100) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 NOT NULL,
  `celular` varchar(200) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(200) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `nombreCandidato` varchar(200) CHARACTER SET utf8 NOT NULL,
  `celularCandidato` varchar(200) CHARACTER SET utf8 NOT NULL,
  `telefonoCandidato` varchar(200) CHARACTER SET utf8 NOT NULL,
  `emailCandiato` varchar(200) CHARACTER SET utf8 NOT NULL,
  `vacante` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destacado`
--

CREATE TABLE `destacado` (
  `destacadoId` int(11) NOT NULL,
  `texto` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destacado`
--

INSERT INTO `destacado` (`destacadoId`, `texto`) VALUES
(1, 'Si'),
(2, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas_sociometria`
--

CREATE TABLE `empresas_sociometria` (
  `IdEmpresa` int(11) NOT NULL,
  `Nombre` varchar(250) CHARACTER SET utf8 NOT NULL,
  `estatusId` int(3) NOT NULL,
  `papeleria` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas_sociometria`
--

INSERT INTO `empresas_sociometria` (`IdEmpresa`, `Nombre`, `estatusId`, `papeleria`) VALUES
(1, 'Scanpaint', 1, 0),
(2, 'Prueba nombre2', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id` int(11) NOT NULL,
  `nomencuesta` varchar(150) NOT NULL,
  `balaso` varchar(250) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `alt` varchar(150) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `file` varchar(150) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `idiomaId` int(10) NOT NULL,
  `estatusId` int(10) NOT NULL,
  `papeleria` int(10) NOT NULL,
  `destacado` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id`, `nomencuesta`, `balaso`, `descripcion`, `documento`, `imagen`, `alt`, `keywords`, `file`, `autor`, `idiomaId`, `estatusId`, `papeleria`, `destacado`, `fecha`) VALUES
(1, 'Plan de Contingencia y Continuidad Laboral ante el COVID-19', '3er INFORME 08 MAYO 2020 Benchmarking Colaborativo Industria de México', 'El jueves 09 de abril iniciamos una consulta sobre el impacto del COVID-19 a una muestra importante del mercado laboral siendo este documento el 3er Informe Ejecutivo de dicha investigación, integrando 91 empresas de 15 sectores industriales en 12 Estados de México.', 'mP_3er_Informe_Covid19.pdf', 'covit-19.jpg', 'Contingencia y Continuidad Laboral ', 'industria mexicana,contingencia laboral, impacto del covid-19 en monterrey', 'plan_de_contingencia_y_continuidad_laboral_ante_el_covid-19', 'Appetizer', 1, 1, 0, 2, '2020-09-24'),
(2, 'Compensación en tiempos del COVID-19', 'Consulta sobre las Prácticas de Compensación y Laboral en tiempos de COVID-19, en México.', 'El 22 de Mayo iniciamos una consulta sobre las Prácticas de Compensación y Laboral en tiempos de COVID-19, a una muestra importante del mercado laboral siendo este el Informe Ejecutivo de dicha investigación, integrando 98 empresas de 16 sectores industriales en 10 Estados de México.', 'mP-Compensación-en-tiempos-del-Covid19.pdf', 'fondo-covit-compensaciones-laboral.jpg', 'Prácticas de Compensación y Laboral en tiempos de COVID-19', 'Compensación en tiempos del COVID-19,  remuneración laboral', 'compensación_en_tiempos_del_covid-19', 'Appetizer', 1, 1, 0, 2, '2020-09-24'),
(6, 'Expectativas Salariales y Empleo 2021 en tiempos de COVID-19', 'Inmersos aún en un ambiente socio-económico y de salud complejo e incierto, las empresas en México buscan mejorar su dinámica y reestablecer mejores condiciones de negocio, de empleo y salariales.', ' En el mes de Julio iniciamos una consulta sobre las Expectativas Salariales y de Empleo en tiempos de COVID-19, a una muestra importante del mercado laboral siendo este el Informe Ejecutivo de dicha investigación, integrando 94 empresas de 17 sectores industriales en 11 Estados de México.​', 'mP_Expectativas_Salariales_MX_2021.pdf', 'expectativas-salariales-2021.jpg', 'Expectativas Salariales 2021, gracias a https://idconline.mx', 'Expectativas Salariales 2021', 'expectativas_salariales_y_empleo_2021_en_tiempos_de_covid-19', 'Appetizer', 1, 1, 0, 2, '2020-09-30'),
(7, 'Informe de Expectativas Salariales y Empleo 2021 en tiempos de COVID-19', 'Continuando en un ambiente socioeconómico y de salud complejo e incierto, las empresas en México buscan ajustar su dinámica laboral y reestablecer mejores condiciones de negocio, de empleo y salariales', ' Al cierre del mes de Octubre actualizamos nuestra consulta sobre las Expectativas Salariales y de Empleo en tiempos de COVID-19, a una muestra importante del mercado laboral siendo este el Informe Ejecutivo de dicha investigación, integrando 130 empresas de 19 sectores industriales en 11 Estados de México.', 'mP_Informe_Expectativas_Salariales_MX_2021.pdf', 'expectativas-salariales-20.jpg', 'Expectativas Salariales MX 2021', 'Impacto, COVID 19, matchpeople', 'actualización_de_expectativas_salariales_y_empleo_2021_en_tiempos_de_covid-19', 'Appetizer', 1, 1, 0, 2, '2021-01-25'),
(8, 'Expectativas Salariales y Empleo 2021 en tiempos de COVID-19', 'Inmersos aún en un ambiente socio-económico y de salud complejo e incierto, las empresas en México buscan mejorar su dinámica y reestablecer mejores condiciones de negocio, de empleo y salariales.', 'fg', 'Mod.pdf', 'Martillo_de_percusión_con_SDS_max_GSH_11_VC_Professional-dimensiones.jpg', '', 'fg', 'expectativas_salariales_y_empleo_2021_en_tiempos_de_covid-19', 'Vinculacion', 1, 2, 0, 2, '2021-04-21'),
(9, 'Informe Indicadores Económico-Laboral matchPeople MTY & ZM | MARZO 2021', 'INFORME Actualizado al mes de Marzo respecto a diferentes indicadores Económicos y Laborales de la Industria en Monterrey N.L y Zona Metropolitana.', '     Al cierre del mes de Marzo actualizamos nuestra consulta sobre diferentes Indicadores Salariales y de Empleo en la Industria de Monterrey N.L. integrando 45 empresas de 13 sectores industriales.', 'Marzo_2021_-_Actualización_Indicadores_Econ_Lab_-_NL.pdf', 'Monterrey.jpg', '', 'Incrementos Salariales, Dinámica Laboral, Variaciones de Empleo', 'informe_indicadores_económico-laboral_matchpeople_|_marzo_2021', 'Vinculacion', 1, 1, 0, 2, '2021-04-28'),
(10, 'Publicación de Decreto en Materia de Subcontratación Laboral', 'Tras la aprobación del Senado en la reforma en materia de subcontratación laboral, el Decreto  comparte el alcance y efectos de la reforma. ', ' El día de 23 de Abril fue publicado en el Diario Oficial de la Federación, el DECRETO por el que se reforman, adicionan y derogan diversas disposiciones de la Ley Federal del Trabajo; de la Ley del Seguro Social; de la Ley del Instituto del Fondo Nacional de la Vivienda para los Trabajadores.', 'DOF_STPS_In_Outsourcing_2021_04_23_ves_stps.pdf', 'Senado.jpg', '', 'Decreto, Reforma, Subcontratacion', 'publicación_de_decreto_en_materia_de_subcontratación_laboral', 'Vinculacion', 1, 1, 0, 2, '2021-04-27'),
(11, ' Informe sobre el Insourcing y Outsourcing en la Industria de México 2021', 'Las empresas de México nos comparten qué prácticas, acciones y desafíos enfrentarán en presencia de la reforma de subcontratación laboral.', '  En la búsqueda de un equilibrio y el establecimiento de reglas claras, en Enero del 2021 se realizaron\r\ndiversas mesas de diálogo entre representantes del Sector Público, Privado y Obrero, donde se\r\ndiscutieron las posibles distorsiones y su impacto al regular la subcontratación en México. El mercado comparte su postura y estrategia respecto a las acciones por definir en el tema laboral.', 'mP_Insourcing_y_Outsourcing_MX_2021.pdf', 'INSOURCING.jpg', '', 'Insourcing, Outsourcing, Industria, Mexico', '_informe_sobre_el_insourcing_y_outsourcing_en_la_industria_de_méxico_2021', 'Vinculacion', 1, 1, 0, 2, '2021-04-27'),
(12, 'Informe Indicadores Económico-Laboral matchPeople | ABRIL  2021', 'INFORME Actualizado al mes de Abril respecto a diferentes indicadores Económicos y Laborales de la Industria en Monterrey N.L y Zona Metropolitana.', 'Al cierre del mes de Abril actualizamos nuestra consulta sobre diferentes Indicadores Salariales y de Empleo en la Industria de Monterrey N.L. integrando 55 empresas de 13 sectores industriales.', 'Abril_2021_-_Actualización_Indicadores_Econ_Lab_-_NL.pdf', 'Monterrey_2.jpg', '', 'Incremento Salarial, Indicadores Economicos', 'informe_indicadores_económico-laboral_matchpeople_|_abril__2021', 'Vinculacion', 1, 1, 0, 2, '2021-05-28'),
(13, 'Informe Indicadores Económico-Laboral matchPeople | MAYO  2021 TAMPS', 'INFORME Actualizado al mes de Mayo respecto a diferentes indicadores Económicos y Laborales de la Industria en Altamira, Tamaulipas.', ' Al cierre del mes de Mayo actualizamos nuestra consulta sobre diferentes Indicadores Salariales y de Empleo en la Industria de Altamira, Tamps. integrado por 35 empresas.', 'Mayo_2021_-_Actualización_Indicadores_Econ_Lab_-_TAMPs.pdf', 'altamira_3.jpg', '', 'Incremento Salarial, Indicadores Economicos, Tamaulipas, Altamira', 'informe_indicadores_económico-laboral_matchpeople_|_mayo__2021_tamps', 'Vinculacion', 1, 1, 0, 2, '2021-06-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta_sociometria`
--

CREATE TABLE `encuesta_sociometria` (
  `IdEncuesta` int(100) NOT NULL,
  `IdEmpresa` int(100) NOT NULL,
  `Titulo` varchar(300) CHARACTER SET utf8 NOT NULL,
  `Fecha` date NOT NULL,
  `act_formacion1` mediumtext CHARACTER SET utf8 NOT NULL,
  `act_formacion2` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_Ascendencia` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_Afinidad` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_Trabajo3` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_Popularidad` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_sociales2` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_sociales3` mediumtext CHARACTER SET utf8 NOT NULL,
  `Act_sociales4` mediumtext NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estatusId` int(11) NOT NULL,
  `papeleria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuesta_sociometria`
--

INSERT INTO `encuesta_sociometria` (`IdEncuesta`, `IdEmpresa`, `Titulo`, `Fecha`, `act_formacion1`, `act_formacion2`, `Act_Ascendencia`, `Act_Afinidad`, `Act_Trabajo3`, `Act_Popularidad`, `Act_sociales2`, `Act_sociales3`, `Act_sociales4`, `porcentaje`, `estatusId`, `papeleria`) VALUES
(1, 1, 'SEGURIDAD Y SALUD OCUPACIONAL', '2021-07-18', '   ¿Qué pláticas o cursos de Seguridad y Salud Ocupacional te gustaría recibir por parte de la empresa?', '   ¿Qué recomendaciones o sugerencias puedes comentar para lograr CERO accidentes?', '   Menciona a tres compañeros de la empresa a los que respetas porque te aconsejan adecuadamente en situaciones personales o relacionadas con el trabajo (No importa el puesto ni el área en que se encuentren).', '   Menciona a tres compañeros de la empresa a los que por su experiencia la mayoría les hace caso y con quienes te gustaría trabajar en equipos o comisiones de seguridad y salud (No importa el puesto ni el área en que se encuentren).', '   ¿Estás oportunamente comunicado sobre las campañas que organiza el área de Seguridad y Salud Ocupacional?   ', '   Escribe los nombres de tres compañeros de la empresa que son de trato agradable y gustan de organizar eventos y reuniones (No importa el puesto ni el área en que se encuentren).', '    ¿Cómo te sientes con las medidas de prevención que la empresa ha implementado ante la pandemia del COVID-19?', '   ¿Consideras que hay deficiencias o tienes alguna sugerencia para mejorar las medidas implementadas?', '  ¿Crees que la vacuna del COVID-19 es necesaria para disminuir el riesgo de contagio?  (SI / NO) ', 0, 1, 0),
(2, 2, 'Encuesta Demo', '2021-07-18', '   act_formacion1.1', '   act_formacion2.1', '   act asendencia.1', '   act afinidad.1', '   act trabajo.1', '   Act populiaridad.1', '   act social2.1', '   act social 3.1', '', 0, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `estatusId` int(10) NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`estatusId`, `texto`) VALUES
(1, 'Publicado'),
(2, 'Borrador'),
(3, 'Eliminado'),
(4, 'Terminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus_sociometria`
--

CREATE TABLE `estatus_sociometria` (
  `IdEstatus` int(250) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus_sociometria`
--

INSERT INTO `estatus_sociometria` (`IdEstatus`, `Descripcion`) VALUES
(1, 'Sin responder'),
(2, 'En progresso'),
(3, 'Terminada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(10) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `texto`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Indistinto'),
(4, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giro`
--

CREATE TABLE `giro` (
  `id_giro` int(10) NOT NULL,
  `texto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giro`
--

INSERT INTO `giro` (`id_giro`, `texto`) VALUES
(1, 'AGROINDUSTRIA'),
(2, 'ASEGURADORAS'),
(3, 'AUTOMOTRIZ'),
(4, 'AUTOPARTES'),
(5, 'AUTOSERVICIO'),
(6, 'BANCA Y SERVICIOS FINANCIEROS'),
(7, 'CENTRO DE DISTRIBUCIÓN'),
(8, 'COMERCIO'),
(9, 'CONSTRUCCIÓN'),
(10, 'CONSULTORIA'),
(11, 'CONSUMO, ALIMENTOS Y BEBIDAS'),
(12, 'EDUCATIVO'),
(13, 'ELÉCTRICA-ELECTRÓNICA'),
(14, 'EMBOTELLADORA'),
(15, 'EMPAQUES Y PAPEL'),
(16, 'ENSAMBLADORAS'),
(17, 'ENSERES Y APARATOS ELÉCTRICOS'),
(18, 'ENVASES'),
(19, 'FARMACÉUTICO'),
(20, 'FIBRA ACRÍLICA'),
(21, 'GENERADORA DE ELECTRICIDAD'),
(22, 'HERRAMIENTAS Y EQUIPO'),
(23, 'HOTELERO'),
(24, 'MANUFACTURA'),
(25, 'MAQUILA'),
(26, 'MATERIALES DE CONSTRUCCIÓN'),
(27, 'METAL-MECÁNICO'),
(28, 'METALÚRGICO'),
(29, 'MINERO'),
(30, 'PETROLEOQUÍMICO'),
(31, 'PINTURAS'),
(32, 'PLÁSTICOS'),
(33, 'PRODUCTOS CERÁMICOS'),
(34, 'QUÍMICO'),
(35, 'RESINAS Y PEGAMENTOS'),
(36, 'SEGUROS'),
(37, 'SERVICIOS'),
(38, 'SERVICIOS PETR./IND.'),
(39, 'SERVICIOS PORTUARIOS'),
(40, 'TELAS Y TEXTILES'),
(41, 'TELECOMUNICACIONES'),
(42, 'TRANSFORMADORES'),
(43, 'TRANSPORTE DE CARGA'),
(44, 'VIDRIO'),
(45, 'OTRO'),
(46, '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `idiomaId` int(10) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `ref` varchar(20) NOT NULL,
  `hreflang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`idiomaId`, `idioma`, `ref`, `hreflang`) VALUES
(1, 'Español', 'alternate', 'es-mx'),
(2, 'Ingles', 'alternate', 'en-us');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listavacantes`
--

CREATE TABLE `listavacantes` (
  `id` int(100) NOT NULL,
  `autor` varchar(150) CHARACTER SET latin1 NOT NULL,
  `vacante` varchar(300) CHARACTER SET latin1 NOT NULL,
  `ciudad` varchar(20) CHARACTER SET latin1 NOT NULL,
  `GiroEmpresa` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descripcion` longtext CHARACTER SET latin1 NOT NULL,
  `fecha` varchar(15) CHARACTER SET latin1 NOT NULL,
  `afinidad` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Perfil_Academico` varchar(200) CHARACTER SET latin1 NOT NULL,
  `experiencia_profecional` varchar(11) CHARACTER SET latin1 NOT NULL,
  `edad` varchar(200) CHARACTER SET latin1 NOT NULL,
  `genero` varchar(200) CHARACTER SET latin1 NOT NULL,
  `competencias` varchar(200) CHARACTER SET latin1 NOT NULL,
  `disponibilidad_viaje` varchar(200) CHARACTER SET latin1 NOT NULL,
  `Nombre_empresa` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ingles` varchar(100) CHARACTER SET latin1 NOT NULL,
  `residencia` varchar(10) CHARACTER SET latin1 NOT NULL,
  `img` varchar(100) CHARACTER SET latin1 NOT NULL,
  `des_corta` varchar(200) CHARACTER SET latin1 NOT NULL,
  `area_funcion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `estatusId` int(10) NOT NULL,
  `papeleria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listavacantes`
--

INSERT INTO `listavacantes` (`id`, `autor`, `vacante`, `ciudad`, `GiroEmpresa`, `descripcion`, `fecha`, `afinidad`, `Perfil_Academico`, `experiencia_profecional`, `edad`, `genero`, `competencias`, `disponibilidad_viaje`, `Nombre_empresa`, `ingles`, `residencia`, `img`, `des_corta`, `area_funcion`, `estatusId`, `papeleria`) VALUES
(75, 'Appetizer', 'PRACTICANTE DE DESARROLLO HUMANO', 'Monterrey, N.L', 'CONSULTORIA', 'Reclutamiento y selección. Atención a clientes. Revisión de perfiles. Publicación de vacantes. Elaboración de reportes. Entrevistas inicial, profunda y por competencias. Manejo de psicometría. Seguimiento a cliente y candidatos. Clima laboral. Evaluaciones de desempeño. Capacitación e inducción de personal interno. Apoyo en coordinación y logística de procesos de reclutamiento con clientes.   ', '31-07-2020', 'Lic. en Administración de Empresas. Lic. en Recursos Humanos. Ing. Industial. Lic. en Psicología. Lic. en Mercadotecnia.', 'Licenciatura', 'indistinto', '19 y 24 años', 'Indistinto', 'Liderazgo. Trabajo en equipo. Comunicación efectiva.', 'NO', 'MATCHPEOPLE', 'Inglés Avanzado', 'NO', 'Prueba.png', 'Reclutamiento y selección, encuestas de clima laboral,  evaluaciones de desempeño y capacitación.', 'RECURSOS HUMANOS', 1, 0),
(77, 'Appetizer', 'Coordinador de Cuentas por Cobrar', 'Monterrey, N.L', 'MANUFACTURA', 'Cobranza y atención a clientes.\r\nAnálisis de crédito y autorización de pedidos.\r\nApoyo a factoraje internacional y movimientos con bancos extranjeros.', '2016-02-03', 'Contador Público', 'Licenciatura', '3 años.', '24 - 40 años.', 'Femenino', 'Iniciativa. Pensamiento Analítico. Orientación a Resultados. Orientación y servicio al cliente. Comunicación oral y escrita y Trabajo en equipo.', 'NO', 'Confidencial', 'Inglés: Avanzado', 'NO', 'dafault.jpg', 'Recuperación oportuna de la cartera de acuerdo a plazos estipulados, otorgar crédito confiable y seguro. Orientado a clientes extranjeros.', 'VENTAS', 1, 0),
(79, 'Appetizer', 'Coordinador de Proyectos de Diseño y Construcción', 'Monterrey, N.L', 'EDUCATIVO', 'Gestionar simultáneamente proyectos en diferentes fases y magnitudes. \r\nRevisar presupuestos y estimaciones de las obras. ', '', 'Arquitectura, Ingeniero Civil con habilidades de diseño.', 'Licenciatura', '3 años.', '25 - 33 años.', 'Femenino', 'Capacidad numérica. Altamente organizado. Orientación a resultados. Orientación y servicio al cliente. Trabajo bajo presión. Dinámico. Trabajo en equipo. Negociación.', 'SI', 'Confidencial', 'Inglés: Avanzado', 'NO', 'dafault.jpg', 'Apoyar en el desarrollo exitosos de proyectos de diseño y construcción garantizando que estos se desarrollen en tiempo, costo y calidad.', 'OTROS', 1, 0),
(88, 'Appetizer', 'Preuba Vacante Borrador', 'Monterrey, N.L', 'OTRO', 'esta es una prueba borrador Descripción', '2020-07-30', 'Diseñador Grafico', 'Licenciatura', '1 año', '20 años', 'Indistinto', 'esta es una prueba borrador Competencia', 'SI', 'Appetizer', 'indistinto', 'SI', 'dafault.jpg', 'esta es una prueba borrador', 'DISEÑO', 1, 1),
(95, 'Appetizer', 'Preuba Vacante1', 'Monterrey, N.L', 'AGROINDUSTRIA', 'Prueba de guardado 1', '31-07-2020', 'Diseñador Grafico1', 'Doctorado', '2 año', '21 años', 'Femenino', 'asas1', 'NO', 'Appetizer1', 'indistinto', 'SI', 'fa5eed143eb5f5b2f5871083727b5abae62c2df3w.jpg', 'esta es una prueba1', 'ABASTECIMIENTOS', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `user` varchar(150) NOT NULL,
  `pass` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `user`, `pass`) VALUES
(1, 'match', 'acepto'),
(2, 'Vinculacion', 'm4tch2000#'),
(3, 'Appetizer', 'Match2020#');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logocliente`
--

CREATE TABLE `logocliente` (
  `id` int(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `empresa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logocliente`
--

INSERT INTO `logocliente` (`id`, `logo`, `empresa`) VALUES
(10, 'logoemblema.png', 'Chemours'),
(11, 'O003 Oxxo.png', 'Oxxo'),
(12, 'H006 Heineken.png', 'Heineken'),
(13, 'logo.png', 'mondelez'),
(14, 'UDEM.png', 'Udem'),
(15, 'W001-W003 Whirlpool.png', 'whirlpool'),
(16, 'N003 Navistar.png', 'Navistar'),
(17, 'A011 Arcelor Mittal.png', 'Arcelor Mittal'),
(18, 'N006 Nemak.png', 'Nemak'),
(19, 'M009 Metalsa.png', 'Metalsa'),
(20, 'N001 NovoCast.png', 'Novocast'),
(21, 'L004 Lego.png', 'Lego'),
(22, 'A003 ADSMexicana.png', 'ADS Mexicana'),
(23, 'P009 Prolec GE.png', 'Prolec GE'),
(24, 'E003 Evco.png', 'Evco'),
(25, 'C021 Cydsa.png', 'Cydsa'),
(26, 'A014 Air liquide.png', 'Air Liquide'),
(27, 'F006 Forja.png', 'Forja Mty'),
(28, 'S017 Spirol.png', 'Spirol'),
(30, 'D010 DuPont.png', 'Dupont'),
(31, 'K004 KUO.png', 'kuo'),
(32, 'T011 Tla.png', 'TLA'),
(33, 'T015 Tupy.png', 'Tupy'),
(34, 'O002 Omega.png', 'Omega'),
(35, 'G13 Grupo Piasa.png', 'PIASA'),
(37, 'M010 M&G.png', 'M&G'),
(38, 'C001 Cabot.png', 'Cabot');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_sociometria`
--

CREATE TABLE `personal_sociometria` (
  `IdPersonal` int(100) NOT NULL,
  `IdEmpresa` int(100) NOT NULL,
  `NumNomina` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `FechaIngreso` date NOT NULL,
  `Departamento` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Clave` int(11) NOT NULL,
  `Puesto` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Planta` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Segmento` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Turno` varchar(200) CHARACTER SET utf8 NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Grupo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Email` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Contraseña` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal_sociometria`
--

INSERT INTO `personal_sociometria` (`IdPersonal`, `IdEmpresa`, `NumNomina`, `Nombre`, `FechaIngreso`, `Departamento`, `Clave`, `Puesto`, `Planta`, `Segmento`, `Turno`, `FechaNacimiento`, `Grupo`, `Email`, `Contraseña`) VALUES
(1, 1, '14', 'Héctor Raúl Medina Heredia\r\n', '2021-07-01', 'Producción Polvos\r\n', 0, 'Coordinador de Jefes de Línea', '2', 'Administrativo', 'Fijo', '1995-02-12', '', 'demo@gmail.com', '1234'),
(2, 1, '224', 'Óscar Roberto González Sierra ', '1976-09-02', 'Dirección', 0, 'Director de Operaciones', '2', 'Administrativo', 'Fijo', '1999-09-01', '', 'demo2@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resencuesta_sociometria`
--

CREATE TABLE `resencuesta_sociometria` (
  `IdResEncuesta` int(100) NOT NULL,
  `IdEmpresa` int(100) NOT NULL,
  `IdPersonal` int(100) NOT NULL,
  `IdEncuesta` int(100) NOT NULL,
  `IdEstatus` int(3) NOT NULL,
  `Fecha` date NOT NULL,
  `NumNomina` varchar(100) NOT NULL,
  `Nombre` varchar(300) NOT NULL,
  `Departamento` varchar(300) NOT NULL,
  `TRNombre_ascendencia1` varchar(300) NOT NULL,
  `TRNombre_ascendencia2` varchar(300) NOT NULL,
  `TRNombre_ascendencia3` varchar(300) NOT NULL,
  `TRNombre_afinidad1` varchar(300) NOT NULL,
  `TRNombre_afinidad2` varchar(300) NOT NULL,
  `TRNombre_afinidad3` varchar(300) NOT NULL,
  `TRNombre_popularidad1` varchar(300) NOT NULL,
  `TRNombre_popularidad2` varchar(300) NOT NULL,
  `TRNombre_popularidad3` varchar(300) NOT NULL,
  `act_formacionA` varchar(500) NOT NULL,
  `act_formacionB` varchar(500) NOT NULL,
  `act_formacionC` varchar(500) NOT NULL,
  `act_formacionR2` varchar(500) NOT NULL,
  `Act_TrabajoSN` varchar(3) NOT NULL,
  `Act_TrabajoR3` varchar(500) NOT NULL,
  `Act_socialesR2` varchar(500) NOT NULL,
  `Act_socialesR3` varchar(500) NOT NULL,
  `Act_socialesR4` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resencuesta_sociometria`
--

INSERT INTO `resencuesta_sociometria` (`IdResEncuesta`, `IdEmpresa`, `IdPersonal`, `IdEncuesta`, `IdEstatus`, `Fecha`, `NumNomina`, `Nombre`, `Departamento`, `TRNombre_ascendencia1`, `TRNombre_ascendencia2`, `TRNombre_ascendencia3`, `TRNombre_afinidad1`, `TRNombre_afinidad2`, `TRNombre_afinidad3`, `TRNombre_popularidad1`, `TRNombre_popularidad2`, `TRNombre_popularidad3`, `act_formacionA`, `act_formacionB`, `act_formacionC`, `act_formacionR2`, `Act_TrabajoSN`, `Act_TrabajoR3`, `Act_socialesR2`, `Act_socialesR3`, `Act_socialesR4`) VALUES
(1, 1, 1, 1, 1, '2021-07-20', '14', 'Héctor Raúl Medina Heredia', 'Producción Polvos', '', '', '', '', '', '', '', '', '', 'hola', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `si_no`
--

CREATE TABLE `si_no` (
  `id` int(10) NOT NULL,
  `texto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `si_no`
--

INSERT INTO `si_no` (`id`, `texto`) VALUES
(1, 'NO'),
(2, 'SI'),
(3, '-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academico`
--
ALTER TABLE `academico`
  ADD PRIMARY KEY (`id_académico`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `destacado`
--
ALTER TABLE `destacado`
  ADD PRIMARY KEY (`destacadoId`);

--
-- Indices de la tabla `empresas_sociometria`
--
ALTER TABLE `empresas_sociometria`
  ADD PRIMARY KEY (`IdEmpresa`),
  ADD KEY `estatusId` (`estatusId`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idiomaId` (`idiomaId`),
  ADD KEY `estatusId` (`estatusId`),
  ADD KEY `destacado` (`destacado`);

--
-- Indices de la tabla `encuesta_sociometria`
--
ALTER TABLE `encuesta_sociometria`
  ADD PRIMARY KEY (`IdEncuesta`),
  ADD KEY `IdEmpresa` (`IdEmpresa`),
  ADD KEY `estatusId` (`estatusId`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`estatusId`);

--
-- Indices de la tabla `estatus_sociometria`
--
ALTER TABLE `estatus_sociometria`
  ADD PRIMARY KEY (`IdEstatus`);

--
-- Indices de la tabla `giro`
--
ALTER TABLE `giro`
  ADD PRIMARY KEY (`id_giro`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`idiomaId`);

--
-- Indices de la tabla `listavacantes`
--
ALTER TABLE `listavacantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatusId` (`estatusId`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logocliente`
--
ALTER TABLE `logocliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_sociometria`
--
ALTER TABLE `personal_sociometria`
  ADD PRIMARY KEY (`IdPersonal`),
  ADD KEY `IdEmpresa` (`IdEmpresa`);

--
-- Indices de la tabla `resencuesta_sociometria`
--
ALTER TABLE `resencuesta_sociometria`
  ADD PRIMARY KEY (`IdResEncuesta`),
  ADD KEY `IdEmpresa` (`IdEmpresa`),
  ADD KEY `IdPersonal` (`IdPersonal`),
  ADD KEY `IdEncuesta` (`IdEncuesta`),
  ADD KEY `IdEstatus` (`IdEstatus`);

--
-- Indices de la tabla `si_no`
--
ALTER TABLE `si_no`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academico`
--
ALTER TABLE `academico`
  MODIFY `id_académico` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destacado`
--
ALTER TABLE `destacado`
  MODIFY `destacadoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresas_sociometria`
--
ALTER TABLE `empresas_sociometria`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `encuesta_sociometria`
--
ALTER TABLE `encuesta_sociometria`
  MODIFY `IdEncuesta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `estatusId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estatus_sociometria`
--
ALTER TABLE `estatus_sociometria`
  MODIFY `IdEstatus` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `giro`
--
ALTER TABLE `giro`
  MODIFY `id_giro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `idiomaId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `listavacantes`
--
ALTER TABLE `listavacantes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `logocliente`
--
ALTER TABLE `logocliente`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `personal_sociometria`
--
ALTER TABLE `personal_sociometria`
  MODIFY `IdPersonal` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `resencuesta_sociometria`
--
ALTER TABLE `resencuesta_sociometria`
  MODIFY `IdResEncuesta` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `si_no`
--
ALTER TABLE `si_no`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empresas_sociometria`
--
ALTER TABLE `empresas_sociometria`
  ADD CONSTRAINT `empresas_sociometria_ibfk_1` FOREIGN KEY (`estatusId`) REFERENCES `estatus` (`estatusId`);

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`idiomaId`) REFERENCES `idioma` (`idiomaId`),
  ADD CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`idiomaId`) REFERENCES `idioma` (`idiomaId`),
  ADD CONSTRAINT `encuesta_ibfk_3` FOREIGN KEY (`estatusId`) REFERENCES `estatus` (`estatusId`),
  ADD CONSTRAINT `encuesta_ibfk_4` FOREIGN KEY (`destacado`) REFERENCES `destacado` (`destacadoId`);

--
-- Filtros para la tabla `encuesta_sociometria`
--
ALTER TABLE `encuesta_sociometria`
  ADD CONSTRAINT `encuesta_sociometria_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas_sociometria` (`IdEmpresa`),
  ADD CONSTRAINT `encuesta_sociometria_ibfk_2` FOREIGN KEY (`estatusId`) REFERENCES `estatus` (`estatusId`);

--
-- Filtros para la tabla `listavacantes`
--
ALTER TABLE `listavacantes`
  ADD CONSTRAINT `listavacantes_ibfk_1` FOREIGN KEY (`estatusId`) REFERENCES `estatus` (`estatusId`);

--
-- Filtros para la tabla `personal_sociometria`
--
ALTER TABLE `personal_sociometria`
  ADD CONSTRAINT `personal_sociometria_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas_sociometria` (`IdEmpresa`);

--
-- Filtros para la tabla `resencuesta_sociometria`
--
ALTER TABLE `resencuesta_sociometria`
  ADD CONSTRAINT `resencuesta_sociometria_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresas_sociometria` (`IdEmpresa`),
  ADD CONSTRAINT `resencuesta_sociometria_ibfk_2` FOREIGN KEY (`IdPersonal`) REFERENCES `personal_sociometria` (`IdPersonal`),
  ADD CONSTRAINT `resencuesta_sociometria_ibfk_4` FOREIGN KEY (`IdEstatus`) REFERENCES `estatus_sociometria` (`IdEstatus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
