CREATE DATABASE  IF NOT EXISTS `driver` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `driver`;
-- MySQL dump 10.13  Distrib 5.6.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: driver
-- ------------------------------------------------------
-- Server version	5.6.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` text,
  `descripcion` text,
  PRIMARY KEY (`id_departamento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'administracion','Control del finaciero de la empresa'),(2,'talento humano','Reclutamiento de personal'),(3,'ventas','entrada de ingreso para la empresa'),(4,'produccion','Fabricacion de los procutos en la organizacion'),(5,'almacen','control de salidas y entradas de inventario'),(6,'logistica','evolcion a diferentes mercados internacionales'),(7,'marketing','publicidad de los productos'),(8,'panel de control','configuraciones de sistema genius');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id_permiso` varchar(15) NOT NULL,
  `id_usuario` varchar(15) DEFAULT NULL,
  `permisos` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES ('1','100','1,2,3,4,5,6,7,8'),('2','103','1,3,5,6,7'),('3','104','1,3');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos_usuario`
--

DROP TABLE IF EXISTS `permisos_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos_usuario` (
  `id_permiso_personal` int(11) DEFAULT NULL,
  `id_usuario` varchar(10) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `control_total` char(1) DEFAULT NULL,
  `crear` char(1) DEFAULT NULL,
  `leer` char(1) DEFAULT NULL,
  `modificar` char(1) DEFAULT NULL,
  `borrar` char(1) DEFAULT NULL,
  `reportes` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos_usuario`
--

LOCK TABLES `permisos_usuario` WRITE;
/*!40000 ALTER TABLE `permisos_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `permisos_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_genius`
--

DROP TABLE IF EXISTS `personal_genius`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_genius` (
  `id_personal` varchar(5) NOT NULL,
  `id_usuario` varchar(5) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `a_paterno` varchar(30) DEFAULT NULL,
  `a_materno` varchar(30) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `direccion` text,
  `colonia` text,
  `municipio_delegacion` text,
  `estado` text,
  `ciudad` text,
  `pais` text,
  `cp` varchar(6) DEFAULT NULL,
  `tel_movil` varchar(15) DEFAULT NULL,
  `tel_casa` varchar(15) DEFAULT NULL,
  `tel_otro` varchar(15) DEFAULT NULL,
  `email_personal` varchar(40) DEFAULT NULL,
  `email_empresarial` varchar(40) DEFAULT NULL,
  `dir_foto` varchar(200) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  `puesto` int(11) DEFAULT NULL,
  `numero_empleado` int(11) DEFAULT NULL,
  `RFC` varchar(15) DEFAULT NULL,
  `nombre_banco` varchar(40) DEFAULT NULL,
  `CURP` varchar(20) DEFAULT NULL,
  `NSS` varchar(100) DEFAULT NULL,
  `clave_IFE` varchar(20) DEFAULT NULL,
  `cuenta_banco` varchar(25) DEFAULT NULL,
  `clave_banco` varchar(20) DEFAULT NULL,
  `dir_curp` text,
  `dir_tarjeta` text,
  `dir_ife` text,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_genius`
--

LOCK TABLES `personal_genius` WRITE;
/*!40000 ALTER TABLE `personal_genius` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_genius` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puestos` (
  `id_puesto` int(11) NOT NULL,
  `nombre_puesto` text,
  `descripcion` text,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (1,'Gerente general','patron'),(2,'Jefe','Lider'),(3,'Empleado','trabajador');
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `pass_usuario` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('100','System','root','Super Administrador',1),('101','Adolfo ','A.adolfo','Administrador',2),('102','Lino ','L.lino','Administrador',2),('103','Jose ','jose123','user',3),('104','Aldo ','Aldo123','user',3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'driver'
--

--
-- Dumping routines for database 'driver'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-15 13:52:39
