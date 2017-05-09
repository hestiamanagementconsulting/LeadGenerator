--  use vazplfyig8yrjg3n; --producción
-- use leadgenerator; -- local

CREATE TABLE `leads` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
 `apellido` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
 `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `cargo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
 `empresa` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
 `website` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
 `region_pais` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
 `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
 `LinkedIn` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
 `Industria` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
 `created` datetime DEFAULT NULL,
 `modified` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id_lead` (`id`),
 UNIQUE KEY `Mail_Lead_Unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2158 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla general de Leads';

CREATE TABLE `campaigns` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
 `fecha_inicio` date NOT NULL,
 `fecha_fin` date DEFAULT NULL,
 `created` datetime DEFAULT NULL,
 `modified` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id_campaign` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `labels` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
 `created` datetime DEFAULT NULL,
 `modified` datetime DEFAULT NULL,
 PRIMARY KEY (`id`),
 UNIQUE KEY `id_label` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `campaign_labels` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `id_label` bigint(20) NOT NULL,
 `id_campaign` bigint(20) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_ID_LABEL_LABELS_CAMPAIGN` (`id_label`),
 KEY `FK_ID_CAMPAIGN_LABELS_CAMPAIGN` (`id_campaign`),
 CONSTRAINT `FK_ID_CAMPAIGN_LABELS_CAMPAIGN` FOREIGN KEY (`id_campaign`) REFERENCES `campaigns` (`id`),
 CONSTRAINT `FK_ID_LABEL_LABELS_CAMPAIGN` FOREIGN KEY (`id_label`) REFERENCES `labels` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `campaign_leads` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `id_campaign` bigint(20) NOT NULL,
 `id_lead` bigint(20) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_ID_CAMPAIGN_CAMPAIGN_LEAD` (`id_campaign`),
 KEY `FK_ID_LEAD_CAMPAIGN_LEAD` (`id_lead`),
 CONSTRAINT `FK_ID_CAMPAIGN_CAMPAIGN_LEAD` FOREIGN KEY (`id_campaign`) REFERENCES `campaigns` (`id`),
 CONSTRAINT `FK_ID_LEAD_CAMPAIGN_LEAD` FOREIGN KEY (`id_lead`) REFERENCES `leads` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;



CREATE TABLE `lead_labels` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `id_label` bigint(20) NOT NULL,
 `Id_lead` bigint(20) NOT NULL,
 PRIMARY KEY (`id`),
 KEY `FK_ID_LABEL_LEAD` (`id_label`),
 KEY `FK_ID_LEAD_LEAD` (`Id_lead`),
 CONSTRAINT `FK_ID_LABEL_LEAD` FOREIGN KEY (`id_label`) REFERENCES `labels` (`id`),
 CONSTRAINT `FK_ID_LEAD_LEAD` FOREIGN KEY (`Id_lead`) REFERENCES `leads` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `campaign_labels` ADD UNIQUE( `id_label`, `id_campaign`);