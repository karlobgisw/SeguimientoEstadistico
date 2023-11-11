-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.27-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para schedulermv
CREATE DATABASE IF NOT EXISTS `schedulermv` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `schedulermv`;

-- Volcando estructura para tabla schedulermv.actividades
CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_actividad` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_actividad` (`nombre_actividad`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.actividades: ~17 rows (aproximadamente)
INSERT INTO `actividades` (`id`, `nombre_actividad`) VALUES
	(10, 'Acompañamiento'),
	(9, 'Crear Contenido'),
	(15, 'cursos de capacitacion agendados con una semana anticipacion'),
	(13, 'Estudio Comparativo de Mercado y en su caso retorno de inversion al momento del ingreso'),
	(11, 'Fidelizacion de Clientes'),
	(17, 'Firma ( incluye integracion de expediente antilavado, cobrar comision)'),
	(2, 'Llamadas de Prospeccion Activa'),
	(3, 'Llamadas de Seguimiento a Esfera de Influencia familiares y Referidos'),
	(12, 'Pedir Reseñas (a clientes despues de las firmas)'),
	(7, 'Posicionamiento Geografico (tiros de presicion)'),
	(8, 'Prospeccion Pasiva'),
	(16, 'retroalimentacion de mi experiencia al llenar la agenda'),
	(14, 'Retroalimentacion Propia del Plan de ingresos'),
	(5, 'Revisar Inventario'),
	(4, 'Seguimiento Clientes de Guardia'),
	(1, 'Texto de Presentacion institucional Whattsapp, correo'),
	(6, 'Visitas de Cortesia zona de interes, Vecinos, Amistades');

-- Volcando estructura para tabla schedulermv.agenda_agente
CREATE TABLE IF NOT EXISTS `agenda_agente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia_semana_id` int(10) unsigned NOT NULL,
  `momento_dia` varchar(255) NOT NULL,
  `actividad_id` int(10) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `semana` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `año` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dia_semana_id` (`dia_semana_id`),
  KEY `actividad_id` (`actividad_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `agenda_agente_ibfk_1` FOREIGN KEY (`dia_semana_id`) REFERENCES `dias_semana` (`id`),
  CONSTRAINT `agenda_agente_ibfk_2` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id`),
  CONSTRAINT `agenda_agente_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.agenda_agente: ~12 rows (aproximadamente)
INSERT INTO `agenda_agente` (`id`, `dia_semana_id`, `momento_dia`, `actividad_id`, `user_id`, `semana`, `mes`, `estado`, `año`) VALUES
	(1, 1, 'Mañana', 1, 18, 1, 11, 1, 2023),
	(2, 2, 'Tarde', 2, 18, 1, 11, 1, 2023),
	(3, 3, 'Noche', 3, 18, 1, 11, 1, 2023),
	(4, 4, 'Mañana', 4, 18, 1, 11, 1, 2023),
	(5, 5, 'Tarde', 5, 18, 1, 11, 1, 2023),
	(6, 6, 'Noche', 6, 18, 1, 11, 1, 2023),
	(7, 7, 'Mañana', 7, 18, 1, 11, 1, 2023),
	(8, 1, 'Tarde', 8, 18, 1, 11, 1, 2023),
	(9, 2, 'Noche', 9, 18, 1, 11, 1, 2023),
	(10, 3, 'Mañana', 10, 18, 1, 11, 1, 2023),
	(11, 4, 'Tarde', 11, 18, 1, 11, 1, 2023),
	(12, 1, 'Mañana', 4, 18, 1, 11, 1, 2023);

-- Volcando estructura para tabla schedulermv.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `fuente_contacto_id` int(10) unsigned NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `posible` varchar(255) DEFAULT NULL,
  `clasificacion` varchar(255) DEFAULT NULL,
  `llamada` tinyint(1) DEFAULT NULL,
  `contestada` tinyint(1) DEFAULT NULL,
  `interesado` tinyint(1) DEFAULT NULL,
  `cita` tinyint(1) DEFAULT NULL,
  `clave_sir` tinyint(1) DEFAULT NULL,
  `fovissste` tinyint(1) DEFAULT NULL,
  `infonavit` tinyint(1) DEFAULT NULL,
  `bancario` tinyint(1) DEFAULT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `semana` int(10) DEFAULT NULL,
  `mes` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `fuente_contacto_id` (`fuente_contacto_id`),
  CONSTRAINT `contactos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `contactos_ibfk_2` FOREIGN KEY (`fuente_contacto_id`) REFERENCES `fuentes_contacto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.contactos: ~8 rows (aproximadamente)
INSERT INTO `contactos` (`id`, `user_id`, `fuente_contacto_id`, `nombre`, `telefono`, `correo`, `posible`, `clasificacion`, `llamada`, `contestada`, `interesado`, `cita`, `clave_sir`, `fovissste`, `infonavit`, `bancario`, `comentario`, `valor`, `semana`, `mes`, `updated_at`, `created_at`) VALUES
	(1, 18, 3, 'Cesar Gaytan', '6181649517', NULL, 'Comprador', 'A', 1, 1, 1, 1, 1, 1, 1, 1, 'En proceso de Precali', NULL, 4, 'Diciembre', '2023-11-10 11:03:55', '2023-10-12 02:41:02'),
	(2, 18, 10, 'Maria del Carmen Garza', '6181343291', NULL, 'Vendedor', 'A', 1, 1, 1, 1, 0, 0, 0, 0, 'Ingreso de Bodega', '$5,205,000.00', 3, 'Junio', '2023-11-10 11:03:56', '2023-10-12 02:41:02'),
	(3, 18, 10, 'Azael corral', '6181007741', NULL, 'Comprador', 'A', 1, 1, 1, 1, 0, 0, 0, 0, 'Terreno Rio Grande', NULL, 3, 'Junio', '2023-11-10 11:03:56', '2023-10-12 02:41:02'),
	(4, 18, 10, 'jonathan Lonas', '6181127699', NULL, 'Comprador', 'B', 1, 1, 0, 0, 0, 0, 0, 0, 'interesado casa Nuevo Durango', NULL, 3, 'Junio', '2023-11-10 11:03:58', '2023-10-12 02:41:02'),
	(5, 18, 10, 'Zahira Moncisvais', '6181515196', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 1, 'Zona de Coca Cola', NULL, 3, 'Junio', '2023-11-10 11:03:59', '2023-10-12 02:41:02'),
	(6, 18, 3, 'Indira Nevarez', '6181681509', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Casa Fracc Roma', '$1,450,000.00', 3, 'Junio', '2023-11-10 11:04:00', '2023-10-12 02:41:02'),
	(7, 18, 9, 'Alan Luna', '6182562013', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Compra de Oportunidad', NULL, 3, 'Junio', '2023-11-10 11:04:01', '2023-10-12 02:41:02'),
	(8, 18, 9, 'Lupita Leautaud', '6181331536', NULL, 'Comprador', 'A', 1, 1, 1, 0, 0, 0, 0, 0, 'Vendedor', NULL, 3, 'Junio', '2023-11-10 11:04:01', '2023-10-12 02:41:02');

-- Volcando estructura para tabla schedulermv.dias_semana
CREATE TABLE IF NOT EXISTS `dias_semana` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_dia` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.dias_semana: ~7 rows (aproximadamente)
INSERT INTO `dias_semana` (`id`, `nombre_dia`) VALUES
	(1, 'Lunes'),
	(2, 'Martes'),
	(3, 'Miércoles'),
	(4, 'Jueves'),
	(5, 'Viernes'),
	(6, 'Sábado'),
	(7, 'Domingo');

-- Volcando estructura para tabla schedulermv.estadisticas_usuario
CREATE TABLE IF NOT EXISTS `estadisticas_usuario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contacto_id` int(10) unsigned DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `semana` int(11) DEFAULT NULL,
  `llamadas` int(11) DEFAULT NULL,
  `contestadas` int(11) DEFAULT NULL,
  `interesados` int(11) DEFAULT NULL,
  `citas` int(11) DEFAULT NULL,
  `fuente_contacto` varchar(255) DEFAULT NULL,
  `total_contactos` int(11) DEFAULT NULL,
  `citas_concretadas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacto_id` (`contacto_id`),
  CONSTRAINT `estadisticas_usuario_ibfk_2` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.estadisticas_usuario: ~0 rows (aproximadamente)

-- Volcando estructura para tabla schedulermv.fuentes_contacto
CREATE TABLE IF NOT EXISTS `fuentes_contacto` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_fuente` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.fuentes_contacto: ~19 rows (aproximadamente)
INSERT INTO `fuentes_contacto` (`id`, `nombre_fuente`) VALUES
	(1, 'Búsqueda en Google'),
	(2, 'Familiar'),
	(3, 'Facebook Campaña pagada'),
	(4, 'Facebook Institucional'),
	(5, 'Facebook Personal(FB, Grupos, Etc)'),
	(6, 'Llamada por Lona'),
	(7, 'Página web REMAX Victoria(remaxvictoria.mx)'),
	(8, 'Página web SIR (remax.com.mx)'),
	(9, 'Propiedades.com'),
	(10, 'Prospección'),
	(11, 'Recomendación'),
	(12, 'Referido'),
	(13, 'SIR || Propiedad || Correo'),
	(14, 'SIR || Propiedad || Whatsapp'),
	(15, 'SIR || Propiedades.com'),
	(16, 'SIR || Tarjeta Digital'),
	(17, 'SIR || The Smart Flat'),
	(18, 'SIR || Vivanuncios'),
	(19, 'MercadoLibre');

-- Volcando estructura para tabla schedulermv.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('full','limited') NOT NULL DEFAULT 'limited',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.permissions: ~2 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `description`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'full', 'Permisos completos', 'full', '2023-10-03 07:00:00', '2023-10-03 07:00:00'),
	(2, 'limited', 'Permisos limitados', 'limited', '2023-10-03 07:00:00', '2023-10-03 07:00:00');

-- Volcando estructura para tabla schedulermv.registro_cierre
CREATE TABLE IF NOT EXISTS `registro_cierre` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cerro` bigint(20) unsigned NOT NULL,
  `ingreso` bigint(20) unsigned NOT NULL,
  `monto_propiedad` decimal(18,2) NOT NULL,
  `recurso` enum('FOVISSSTE','INFONAVIT','Credito Bancario','Recursos Propios') NOT NULL,
  `fuente_contacto` int(10) unsigned NOT NULL,
  `genero` enum('Hombre','Mujer') NOT NULL,
  `rango_edad` enum('20-30','30-40','40-50','50-60') NOT NULL,
  `estado_civil` enum('Soltero','Casado') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `cerro` (`cerro`) USING BTREE,
  KEY `ingreso` (`ingreso`) USING BTREE,
  KEY `fuente_contacto` (`fuente_contacto`) USING BTREE,
  CONSTRAINT `registro_cierre_ibfk_1` FOREIGN KEY (`cerro`) REFERENCES `users` (`id`),
  CONSTRAINT `registro_cierre_ibfk_2` FOREIGN KEY (`ingreso`) REFERENCES `users` (`id`),
  CONSTRAINT `registro_cierre_ibfk_3` FOREIGN KEY (`fuente_contacto`) REFERENCES `fuentes_contacto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.registro_cierre: ~101 rows (aproximadamente)
INSERT INTO `registro_cierre` (`id`, `cerro`, `ingreso`, `monto_propiedad`, `recurso`, `fuente_contacto`, `genero`, `rango_edad`, `estado_civil`, `created_at`) VALUES
	(1, 7, 8, 17219784.13, 'FOVISSSTE', 10, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(2, 1, 3, 10491969.53, 'FOVISSSTE', 10, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(3, 14, 10, 6121020.24, 'FOVISSSTE', 16, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(4, 10, 6, 19887156.64, 'FOVISSSTE', 12, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(5, 20, 16, 19217819.75, 'Credito Bancario', 9, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(6, 3, 12, 10316079.17, 'Credito Bancario', 6, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(7, 11, 18, 15562361.48, 'FOVISSSTE', 16, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(8, 12, 19, 18004867.71, 'Credito Bancario', 3, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(9, 2, 11, 5558943.37, 'INFONAVIT', 8, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(10, 15, 19, 11057092.94, 'INFONAVIT', 7, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(11, 19, 8, 3500378.07, 'Credito Bancario', 19, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(12, 2, 11, 8134456.75, 'INFONAVIT', 17, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(13, 17, 16, 9163093.57, 'Credito Bancario', 14, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(14, 10, 11, 3208971.26, 'FOVISSSTE', 10, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(15, 3, 7, 5830724.73, 'INFONAVIT', 8, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(16, 17, 17, 12093644.99, 'Credito Bancario', 2, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(17, 8, 2, 4694517.00, 'Recursos Propios', 12, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(18, 3, 9, 14318120.68, 'INFONAVIT', 4, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(19, 2, 12, 12463661.04, 'INFONAVIT', 2, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(20, 14, 11, 9247169.26, 'INFONAVIT', 2, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(21, 12, 9, 9060600.61, 'INFONAVIT', 2, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(22, 16, 14, 4539470.47, 'FOVISSSTE', 8, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(23, 11, 20, 6155817.61, 'Recursos Propios', 14, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(24, 11, 19, 2219897.53, 'INFONAVIT', 4, 'Hombre', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(25, 14, 6, 6393779.94, 'INFONAVIT', 19, 'Mujer', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(26, 15, 19, 7888027.88, 'FOVISSSTE', 14, 'Hombre', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(27, 1, 1, 1786901.35, 'INFONAVIT', 19, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(28, 3, 13, 16328186.20, 'FOVISSSTE', 9, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(29, 8, 15, 12256963.73, 'INFONAVIT', 9, 'Hombre', '50-60', 'Casado', '2023-11-10 09:56:57'),
	(30, 5, 6, 12328764.71, 'Credito Bancario', 2, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(31, 14, 13, 3016786.62, 'Recursos Propios', 1, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(32, 19, 6, 13736472.47, 'Credito Bancario', 17, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(33, 11, 8, 3536225.13, 'INFONAVIT', 17, 'Hombre', '50-60', 'Casado', '2023-11-10 09:56:57'),
	(34, 15, 1, 2130807.48, 'INFONAVIT', 3, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(35, 15, 12, 13745328.35, 'Credito Bancario', 7, 'Hombre', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(36, 3, 3, 6200267.12, 'FOVISSSTE', 9, 'Hombre', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(37, 6, 1, 8530486.32, 'Recursos Propios', 4, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(38, 5, 13, 11260523.98, 'Credito Bancario', 5, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(39, 6, 15, 17537755.43, 'FOVISSSTE', 6, 'Mujer', '50-60', 'Soltero', '2023-11-10 09:56:57'),
	(40, 14, 15, 13809818.22, 'FOVISSSTE', 17, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(41, 3, 12, 12159514.16, 'Credito Bancario', 3, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(42, 7, 12, 18344396.75, 'INFONAVIT', 3, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(43, 5, 18, 13247638.78, 'INFONAVIT', 1, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(44, 15, 10, 4221970.01, 'INFONAVIT', 1, 'Hombre', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(45, 4, 20, 6491477.75, 'Credito Bancario', 5, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(46, 10, 1, 14276985.27, 'INFONAVIT', 15, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(47, 14, 14, 9140396.15, 'FOVISSSTE', 13, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(48, 14, 12, 17757742.80, 'Recursos Propios', 15, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(49, 5, 5, 6060665.47, 'INFONAVIT', 8, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(50, 4, 9, 14047428.22, 'FOVISSSTE', 15, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(51, 19, 20, 1664903.59, 'Credito Bancario', 6, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(52, 11, 12, 8165423.89, 'FOVISSSTE', 1, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(53, 2, 4, 14446321.45, 'FOVISSSTE', 4, 'Mujer', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(54, 16, 19, 6383149.60, 'Recursos Propios', 2, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(55, 5, 15, 19389892.79, 'INFONAVIT', 2, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(56, 18, 6, 15734436.19, 'FOVISSSTE', 3, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(57, 16, 5, 18112248.88, 'INFONAVIT', 13, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(58, 14, 14, 5892459.80, 'INFONAVIT', 12, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(59, 11, 13, 11228682.90, 'Credito Bancario', 14, 'Hombre', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(60, 5, 19, 1501421.21, 'INFONAVIT', 12, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(61, 20, 15, 16226707.94, 'Credito Bancario', 17, 'Mujer', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(62, 19, 12, 19341949.96, 'FOVISSSTE', 19, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(63, 19, 7, 14275074.87, 'INFONAVIT', 5, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(64, 1, 7, 11172477.30, 'INFONAVIT', 10, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(65, 3, 4, 7897365.22, 'INFONAVIT', 16, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(66, 1, 2, 7109786.44, 'INFONAVIT', 6, 'Hombre', '50-60', 'Soltero', '2023-11-10 09:56:57'),
	(67, 3, 2, 19722836.32, 'Recursos Propios', 11, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(68, 13, 20, 19606715.75, 'FOVISSSTE', 5, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(69, 19, 8, 1178461.75, 'FOVISSSTE', 14, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(70, 7, 18, 7243863.38, 'FOVISSSTE', 18, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(71, 15, 6, 4043403.35, 'FOVISSSTE', 3, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(72, 7, 10, 7319322.67, 'Credito Bancario', 16, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(73, 14, 16, 15997659.24, 'Credito Bancario', 6, 'Mujer', '50-60', 'Casado', '2023-11-10 09:56:57'),
	(74, 7, 5, 2247575.65, 'INFONAVIT', 14, 'Hombre', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(75, 2, 19, 9984831.43, 'Credito Bancario', 14, 'Hombre', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(76, 3, 15, 4930345.42, 'FOVISSSTE', 7, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(77, 17, 18, 18305321.42, 'Recursos Propios', 6, 'Mujer', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(78, 17, 6, 18954787.91, 'INFONAVIT', 7, 'Mujer', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(79, 17, 16, 6527816.22, 'Credito Bancario', 3, 'Hombre', '50-60', 'Soltero', '2023-11-10 09:56:57'),
	(80, 3, 10, 19566161.52, 'Credito Bancario', 4, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(81, 5, 17, 8852780.76, 'INFONAVIT', 19, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(82, 11, 14, 17024790.45, 'FOVISSSTE', 8, 'Hombre', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(83, 11, 10, 14609725.17, 'FOVISSSTE', 19, 'Hombre', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(84, 14, 5, 3131528.40, 'FOVISSSTE', 14, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(85, 6, 2, 8305102.70, 'INFONAVIT', 18, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(86, 15, 18, 2434370.66, 'Credito Bancario', 17, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(87, 16, 15, 8305985.31, 'Credito Bancario', 12, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(88, 6, 8, 18784308.58, 'INFONAVIT', 19, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(89, 9, 9, 16224201.23, 'Credito Bancario', 15, 'Mujer', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(90, 8, 3, 12766937.57, 'Credito Bancario', 11, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(91, 9, 17, 14639232.33, 'FOVISSSTE', 1, 'Hombre', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(92, 17, 19, 237490.56, 'INFONAVIT', 6, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(93, 17, 19, 2396315.65, 'Credito Bancario', 3, 'Hombre', '20-30', 'Casado', '2023-11-10 09:56:57'),
	(94, 10, 13, 12535645.43, 'INFONAVIT', 5, 'Mujer', '20-30', 'Soltero', '2023-11-10 09:56:57'),
	(95, 5, 12, 5497924.90, 'INFONAVIT', 9, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(96, 19, 5, 8813861.73, 'Credito Bancario', 3, 'Hombre', '40-50', 'Casado', '2023-11-10 09:56:57'),
	(97, 7, 5, 4615175.87, 'INFONAVIT', 16, 'Mujer', '30-40', 'Casado', '2023-11-10 09:56:57'),
	(98, 3, 16, 10788557.64, 'Recursos Propios', 2, 'Mujer', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(99, 13, 4, 17682462.58, 'INFONAVIT', 14, 'Hombre', '30-40', 'Soltero', '2023-11-10 09:56:57'),
	(100, 20, 13, 1461993.03, 'INFONAVIT', 14, 'Mujer', '40-50', 'Soltero', '2023-11-10 09:56:57'),
	(128, 5, 5, 13245678.00, 'INFONAVIT', 14, 'Hombre', '30-40', 'Casado', '2023-11-10 10:56:59');

-- Volcando estructura para tabla schedulermv.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `nombre_archivo_foto` varchar(255) DEFAULT NULL,
  `correo_institucional` varchar(255) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `sir` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `permisos_id` bigint(20) unsigned DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `permisos_id` (`permisos_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permisos_id`) REFERENCES `permissions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla schedulermv.users: ~20 rows (aproximadamente)
INSERT INTO `users` (`id`, `nombre`, `nombre_archivo_foto`, `correo_institucional`, `celular`, `sir`, `password`, `permisos_id`, `activo`) VALUES
	(1, 'Denise Vázquez', 'https://cdn.remax.com.mx/agentes/1693678121.jpg', 'denise.vazquez@remaxvictoria.mx', '6181449104', 'denisevazquez', '$2y$10$Q.wPaVC2tPDnVryKHLO/2.9gNDi/yw9a3BR8W/xHNb9r29tODsEI6', 2, 1),
	(2, 'Angelica Gomez', 'https://cdn.remax.com.mx/agentes/1693682129.jpg', 'angelica.gomez@remaxvictoria.mx', '6181132264', 'angelicagomez', '$2y$10$k3oE2JHkQD4FBsvlfjXBhu3lW99cQqEyLk.gsaoPA/eDPCnPh2r.i', 2, 1),
	(3, 'Merith Ortiz', 'https://cdn.remax.com.mx/agentes/1693681826.jpg', 'merith.ortiz@remaxvictoria.mx', '6181069203', 'merithortiz', '$2y$10$KG8kQeMF48tuf36Ij/E6G.RMdk26.5BZC2nuyhjIPIFgyQkQTVeuW', 2, 1),
	(4, 'Tomas Campos', 'https://cdn.remax.com.mx/agentes/1693682268.jpg', 'tomas.campos@remaxvictoria.mx', '6181594001', 'tomascampos', '$2y$10$wqJ/LylYECwF.TGNjp2DS.zqIuMj1tUgv8F2IrZa/mB4LWQcRK6HC', 2, 1),
	(5, 'Fatima Sánchez', 'https://cdn.remax.com.mx/agentes/1693681490.jpg', 'fatima.sanchez@remaxvictoria.mx', '6182660905', 'fatimasanchez', '$2y$10$nZVZO/3Xlrhfjjt8vcm9j.xxfHgb3ts/S0aFKnbm/RN1X6FB/uGGe', 2, 1),
	(6, 'Alfonso Cano', 'https://cdn.remax.com.mx/agentes/1693676076.jpg', 'alfonso.cano@remaxvictoria.mx', '6188049916', 'alfonsocano', '$2y$10$wHmjYdZfDcHi3okoTKS9xOHVTcwcieqeXRu6ZWUyiUNOmwXGm6pqK', 2, 1),
	(7, 'Teresa Zuñiga', 'https://cdn.remax.com.mx/agentes/1693682163.jpg', 'teresa.zuñiga@remaxvictoria.mx', '6181494417', 'terezuvictoria', '$2y$10$jHu.ehPFGxZCqSZYBJtuEOP42xIjsw7/Kvpv/L1V4HDqITGEPsizS', 2, 1),
	(8, 'Eduardo del Rio', 'https://cdn.remax.com.mx/agentes/1693680697.jpg', 'eduardo.delrio@remaxvictoria.mx', '6181177361', 'eduardodlrio', '$2y$10$qV/s5gplF0Kb8CKX3N20R.fcC12YHzOVmvTU5e34BjdZ74/dQCl9K', 2, 1),
	(9, 'Jorge Molina', 'https://cdn.remax.com.mx/agentes/1693681606.jpg', 'jorge.molina@remaxvictoria.mx', '6182306416', 'jorgemolina', '$2y$10$/3v2xU23KeHme5b1HNtEyOsyBgVPPMN.xNybdl4zO0YxlfcIshbsO', 2, 1),
	(10, 'Gladis Sánchez', 'https://cdn.remax.com.mx/agentes/1693681578.jpg', 'gladis.sanchez@remaxvictoria.mx', '6188383073', 'gladissanchez', '$2y$10$0M9iunL7itch/hj8E6DaguOkAM2wYIC.3Oyz3su5fh3AAn5HxPECq', 2, 1),
	(11, 'Susana Rocha', 'https://cdn.remax.com.mx/agentes/1693681935.jpg', 'susana.rocha@remaxvictoria.mx', '6181709790', 'erwinguerrero', 'Incompleto', 2, 1),
	(12, 'Fátima Aceves', 'https://cdn.remax.com.mx/agentes/1693680953.jpg', 'fatima.aceves@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(13, 'Olga Lucero', 'https://cdn.remax.com.mx/agentes/1694451969.jpg', 'olga.lucero@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(14, 'Luz Puentes', 'https://cdn.remax.com.mx/agentes/1693681670.jpg', 'luz.puentes@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(15, 'Michelle Lares', 'https://cdn.remax.com.mx/agentes/1693681793.jpg', 'michelle.lares@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(16, 'Victor Hernandez', 'https://cdn.remax.com.mx/agentes/1693682299.jpg', 'victor.hernandez@remaxvictoria.mx', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(17, 'Estefano Rivera', 'https://cdn.remax.com.mx/agentes/1693682671.jpg', 'estefano.rivera@remaxvictoria.mx', 'Incompleto', 'estefanorivera', '$2y$10$Zm9IjSXGygN2ubjsLHbzUuubt9lEd2hiz84V97lLdQCHqwow9vo8q', 1, 1),
	(18, 'Agustin Cumplido', 'https://cdn.remax.com.mx/agentes/1693676059.jpg', 'Incompleto', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(19, 'Tereza Molina Rocha', 'https://cdn.remax.com.mx/agentes/1693682012.jpg', 'Incompleto', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1),
	(20, 'Julio Cesar Fernandez Sanchez', 'https://cdn.remax.com.mx/agentes/1693681630.jpg', 'Incompleto', 'Incompleto', 'Incompleto', 'Incompleto', 2, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
