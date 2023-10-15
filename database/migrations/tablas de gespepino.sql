
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `facturas` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_factura_token` int(11) DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `dni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_oficina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion_trabajo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sucursal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iban` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bic_switch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` double(8,2) DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `kilometros` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `bastidor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricula` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `presupuestos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `dni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_oficina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal_cliente` int(11) DEFAULT NULL,
  `dni_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concepto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iva` double(8,2) DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `presupuestos_trabajos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_presupuesto` int(10) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_u` double(8,2) DEFAULT NULL,
  `iva` double(8,2) DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `trabajos` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_factura` int(10) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(11,1) DEFAULT NULL,
  `precio_u` double(8,2) DEFAULT NULL,
  `iva` double(8,2) DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `orden_trabajo` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_recepcion` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `servicio_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trabajos_realizar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presupuesto` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_orden_token` int(11) DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `dni` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_personal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_oficina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal_cliente` int(11) DEFAULT NULL,
  `dni_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kilometros` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,  
  `bastidor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `matricula` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_trabajo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_cliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codigo_postal_cliente` int(11) DEFAULT NULL,
  `dni_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad_cliente` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;





	26 	descripcion_trabajo 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	27 	observaciones 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	28 	matricula 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	29 	marca 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	30 	modelo 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	31 	kilometros 	int(11) 			Sí 	NULL 			
	32 	bastidor 	text 	utf8mb4_unicode_ci 		Sí 	NULL 			
	33 	tipo_documento 

  ALTER TABLE `facturas` ADD `descripcion_trabajo` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `observaciones` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `matricula` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `marca` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `modelo` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `kilometros` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `bastidor` TEXT NULL AFTER `estado`;
  ALTER TABLE `facturas` ADD `tipo_documento` TEXT NULL AFTER `estado`;
