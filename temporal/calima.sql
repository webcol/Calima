-- MySQL dump 10.11
--
-- Host: localhost    Database: calima
-- ------------------------------------------------------
-- Server version	5.0.96-community

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
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(10) NOT NULL auto_increment,
  `idvideo` varchar(50) NOT NULL,
  `estado` char(1) NOT NULL default '0',
  `titulo` varchar(50) NOT NULL,
  `categoria` int(5) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `post` text NOT NULL,
  `autor` varchar(50) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `tema` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` (`id`, `idvideo`, `estado`, `titulo`, `categoria`, `descripcion`, `post`, `autor`, `imagen`, `fecha`, `tema`) VALUES (1,'A4Hwg0t4b1k','1','Bienvenido al Blog Calima',1,'Una guia de inicio en nuestro Cf para el desarrollo web 2.0','Framework Php desarrollado basado en diferentes marcos de trabajo PHP, para permitir el desarrollo de aplicaciones web rápidas y con la menor curva de aprendizaje posible tanto en su implementación como en el uso y posterior desarrollo de sitios web y app para internet.','Efrasoft','banner.png','2014-10-18','Bienvenido a la guia'),(2,'Efrasoft','1','Sobre Calima Framework',1,'Calima Framework es un marco de trabajo desarrollado sobre PHP 5.3+ escrito para apoyar el facil conocimiento, implementación y desarrollo de hispano ','En esta versión opensource ofrece una documentación completa en español con ejemplos de uso en cada una de sus funciones y clases desarrolladas.\r\n\r\nSe escribe un Framework ligero que permite la creación de sitios web estático o dinámicos así como aplicaciones web básicas o robustas para un entorno empresarial actual lleno de requerimientos y de alto consumo.','Efrasoft','sobreCf.png','2014-10-23','Intro'),(3,'iR4WvXZI7zw','1','Instalación',1,'La instalación de Calima Framework se debe hacer siguiendo la siguiente guía.','<b>Instalación LocalHost:</b><br>\r\n\r\n1) Debes de tener un servidor apache 2.0+ corriendo en tu maquina local ( xampp - wampp )<br>\r\n2) Descargar la ultima versión de Calima-master.zip en https://github.com/webcol/Calima<br>\r\n3) Descomprimir y llevar el esqueleto dentro de una carpeta (calima) en su directorio root del servidor (htdocs)<br>\r\n4) abre un navegador web y escribe http://localhost/calima/<br><br>\r\n\r\n<b>Instalación WebHost:</b><br>\r\n\r\n1) Debes de tener un servidor apache 2.0+ corriendo en tu servidor web ( Cpanel )<br>\r\n2) Descargar la ultima versión de Calima-master.zip en https://github.com/webcol/Calima<br>\r\n3) Descomprimir y sube el esqueleto a la carpeta raiz (public_html) usando FTP <br>\r\n4) abre un navegador web y escribe http://misitio.com/<br>','Efasoft','git.png','2014-10-24','Guia de uso');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(10) NOT NULL auto_increment,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES (1,'home','La categoría Raíz de la aplicación y los artículos principales'),(2,'Guía Básica','Instalación, integración con netbeans, hola mundo, Url y formulario '),(3,'Ejemplos Básicos','Onepage, Sitio web, Crud php y mysql, pequeñoCrm');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id` int(10) NOT NULL auto_increment,
  `id_blog` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` (`id`, `id_blog`, `fecha`, `nombre`, `email`, `comentario`) VALUES (1,3,'2014-10-26','cero+','webmaster@webcol.net','Vemos como con esta herramienta puedo crear un blog muy fácil y rapido.\r\nGracias'),(2,3,'2014-10-22','Eka','eka@hotmail.com','Mejorara la interface grafica de la aplicacion CF');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `cuerpo` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `titulo`, `cuerpo`) VALUES (355,'YRTYRTY','admin'),(9117,'esto es un ejemplo','admin'),(9869,'esto es un ejemplo','admin');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(5) NOT NULL auto_increment,
  `id_post` int(5) NOT NULL,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `id_post`, `tag`) VALUES (1,1,'php'),(2,2,'desarrollo'),(3,1,'app'),(4,3,'OnePage');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-04  8:11:02
