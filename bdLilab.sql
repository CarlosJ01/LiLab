/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - lilab2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lilab2` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `lilab2`;

/*Table structure for table `analisis` */

DROP TABLE IF EXISTS `analisis`;

CREATE TABLE `analisis` (
  `idAnalisis` int(11) NOT NULL AUTO_INCREMENT,
  `codigoPaciente` varchar(5) NOT NULL,
  `rutaPDF` text NOT NULL,
  `fchPublicacion` date NOT NULL,
  `caduca` date NOT NULL,
  `tipoAnalisis` text NOT NULL,
  PRIMARY KEY (`idAnalisis`),
  KEY `foraniaPaciente` (`codigoPaciente`),
  CONSTRAINT `foraniaPaciente` FOREIGN KEY (`codigoPaciente`) REFERENCES `paciente` (`codigoPaciente`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `analisis` */

insert  into `analisis`(`idAnalisis`,`codigoPaciente`,`rutaPDF`,`fchPublicacion`,`caduca`,`tipoAnalisis`) values 
(35,'UMY74','Documentos_Analisis/UMY74/UMY74_35.pdf','2019-11-23','2020-01-23','EXAMEN DE COLESTEROL Y TRIGLICÉRIDOS'),
(36,'TPQGB','Documentos_Analisis/TPQGB/TPQGB_36.pdf','2019-11-23','2020-01-23','CULTIVO DE ORINA (UROCULTIVO)'),
(37,'4OTS8','Documentos_Analisis/4OTS8/4OTS8_37.pdf','2019-11-24','2020-01-24','Exámenes Pre-operatorios');

/*Table structure for table `anuncio` */

DROP TABLE IF EXISTS `anuncio`;

CREATE TABLE `anuncio` (
  `id_anuncio` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `img_1` text DEFAULT NULL,
  `img_2` text DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_anuncio`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `anuncio` */

insert  into `anuncio`(`id_anuncio`,`titulo`,`descripcion`,`img_1`,`img_2`,`fecha`) values 
(12,'Exámenes de Sangre (Bioquímicos, Incomunicarlos y Hormonales)','Los exámenes de sangre son usados para determinar estados fisiológicos y bioquímicos tales como una enfermedad, contenido mineral, eficacia de drogas, y función de los órganos.','principal_img/t3 231119 192030  carrusel.jpg','principal_img/p22 231119 192030  body.jpg','2019-11-23'),
(13,'Exámenes Microbiológicos ','El diagnóstico microbiológico es el conjunto de procedimientos y técnicas complementarias empleadas para establecer la etiología del agente responsable de una enfermedad infecciosa.','principal_img/t2 231119 192928  carrusel.jpg','principal_img/microbios 231119 192928  body.jpg','2019-11-20'),
(14,'Glucemia','La prueba de glucosa en la sangre se usa para averiguar si los niveles de azúcar en la sangre están dentro de límites saludables. A menudo se usa para diagnosticar o vigilar la diabetes.','','principal_img/analisis 241119 170524  body.jpg','2019-11-24');

/*Table structure for table `buzon` */

DROP TABLE IF EXISTS `buzon`;

CREATE TABLE `buzon` (
  `idBuzon` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `asunto` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idBuzon`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `buzon` */

insert  into `buzon`(`idBuzon`,`nombre`,`telefono`,`correo`,`asunto`,`fecha`) values 
(5,'Armando','4435333739','joxDios@gmail.com','En cuanto tiempo entregan mis Resultados??','2019-11-23'),
(6,'Jorge Placencia','4513857465',' ','Hacen estudios de funciones Hepáticas???','2019-11-23');

/*Table structure for table `paciente` */

DROP TABLE IF EXISTS `paciente`;

CREATE TABLE `paciente` (
  `codigoPaciente` varchar(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) NOT NULL,
  `apellidoM` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`codigoPaciente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `paciente` */

insert  into `paciente`(`codigoPaciente`,`nombre`,`apellidoP`,`apellidoM`,`telefono`) values 
('4OTS8','Leticia','Delgado','Zamora','4435602260'),
('TPQGB','Jorge','Martínez','Duarte','4471054934'),
('UMY74','Armando','Valdez','Duran','5517001297');

/*Table structure for table `tipo` */

DROP TABLE IF EXISTS `tipo`;

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tipo` */

insert  into `tipo`(`idTipo`,`tipo`) values 
(1,'Administrador'),
(2,'Quimico'),
(3,'Publicitario');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `nickname` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoP` varchar(50) NOT NULL,
  `apellidoM` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `idTipo` int(11) NOT NULL,
  PRIMARY KEY (`nickname`),
  KEY `Usuario_Tipo` (`idTipo`),
  CONSTRAINT `Usuario_Tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `usuario` */

insert  into `usuario`(`nickname`,`nombre`,`apellidoP`,`apellidoM`,`password`,`idTipo`) values 
('av1712','Armando','Duran','Valdez','av1712',3),
('dz1712','Diego','Zamora','Delgado','dz1712',1),
('vn1712','Vanessa','Torres','Vaca','vn1712',2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
