-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS scheduleRMV DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Usar la base de datos
USE scheduleRMV;

-- Estructura de tabla para la tabla dias_semana
CREATE TABLE IF NOT EXISTS dias_semana (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre_dia varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcar nuevos datos para la tabla dias_semana
INSERT IGNORE INTO dias_semana (nombre_dia) VALUES
('Lunes'),
('Martes'),
('Miércoles'),
('Jueves'),
('Viernes'),
('Sábado'),
('Domingo');

-- Estructura de tabla para la tabla actividades
CREATE TABLE IF NOT EXISTS actividades (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre_actividad varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE (nombre_actividad)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcar nuevos datos para la tabla actividades
INSERT IGNORE INTO actividades (nombre_actividad) VALUES
('Texto de Presentacion institucional Whattsapp, correo'),
('Llamadas de Prospeccion Activa'),
('Llamadas de Seguimiento a Esfera de Influencia familiares y Referidos'),
('Seguimiento Clientes de Guardia'),
('Revisar Inventario'),
('Visitas de Cortesia zona de interes, Vecinos, Amistades'),
('Posicionamiento Geografico (tiros de presicion)'),
('Prospeccion Pasiva'),
('Crear Contenido'),
('Acompañamiento'),
('Fidelizacion de Clientes'),
('Pedir Reseñas (a clientes despues de las firmas)'),
('Estudio Comparativo de Mercado y en su caso retorno de inversion al momento del ingreso'),
('Retroalimentacion Propia del Plan de ingresos'),
('cursos de capacitacion agendados con una semana anticipacion'),
('retroalimentacion de mi experiencia al llenar la agenda'),
('Firma ( incluye integracion de expediente antilavado, cobrar comision)');

-- Estructura de tabla para la tabla users
CREATE TABLE IF NOT EXISTS users (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  nombre varchar(255) NOT NULL,
  nombre_archivo_foto varchar(255),
  correo_institucional varchar(255),
  celular varchar(20),
  sir varchar(255),
  password varchar(255) NOT NULL,
  permisos_id bigint(20) UNSIGNED,
  PRIMARY KEY (id),
  FOREIGN KEY (permisos_id) REFERENCES permissions(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla agenda_agente
CREATE TABLE IF NOT EXISTS agenda_agente (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  dia_semana_id int(10) UNSIGNED NOT NULL,
  momento_dia varchar(255) NOT NULL,
  actividad_id int(10) UNSIGNED NOT NULL,
  user_id bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (dia_semana_id) REFERENCES dias_semana(id),
  FOREIGN KEY (actividad_id) REFERENCES actividades(id),
  FOREIGN KEY (user_id) REFERENCES users(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla permissions
CREATE TABLE IF NOT EXISTS permissions (
  id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  type enum('full','limited') NOT NULL DEFAULT 'limited',
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcar nuevos datos para la tabla permissions
INSERT IGNORE INTO permissions (name, description, type, created_at, updated_at) VALUES
('full', 'Permisos completos', 'full', '2023-10-03 00:00:00', '2023-10-03 00:00:00'),
('limited', 'Permisos limitados', 'limited', '2023-10-03 00:00:00', '2023-10-03 00:00:00');

-- Modificar el autoincremento del ID para las tablas
ALTER TABLE dias_semana MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE actividades MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE users MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE agenda_agente MODIFY id int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE permissions MODIFY id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
