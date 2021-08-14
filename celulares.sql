/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.7.9-log : Database - bdcelulares
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bdcelulares` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bdcelulares`;

/*Table structure for table `tblproducto` */

DROP TABLE IF EXISTS `tblproducto`;

CREATE TABLE `tblproducto` (
  `intId_Producto` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombre` varchar(100) NOT NULL,
  `vchImagen` varchar(200) NOT NULL,
  `vchDescripcion` varchar(500) NOT NULL,
  `intPCompra` int(11) NOT NULL,
  `intPVenta` int(11) DEFAULT NULL,
  `intCantidad` int(11) NOT NULL,
  `intTotal` int(11) DEFAULT NULL,
  `intId_Proveedor` int(11) NOT NULL,
  PRIMARY KEY (`intId_Producto`),
  KEY `intId_Proveedor` (`intId_Proveedor`),
  CONSTRAINT `tblproducto_ibfk_1` FOREIGN KEY (`intId_Proveedor`) REFERENCES `tblproveedor` (`intId_Proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tblproducto` */

insert  into `tblproducto`(`intId_Producto`,`vchNombre`,`vchImagen`,`vchDescripcion`,`intPCompra`,`intPVenta`,`intCantidad`,`intTotal`,`intId_Proveedor`) values (4,'juana','10.jpg','ssss',10,5,1000,10000,2);

/*Table structure for table `tblproveedor` */

DROP TABLE IF EXISTS `tblproveedor`;

CREATE TABLE `tblproveedor` (
  `intId_Proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombre` varchar(100) NOT NULL,
  `vchEmpresa` varchar(100) NOT NULL,
  `vchTelefono` varchar(10) NOT NULL,
  `vchCorreo` varchar(100) NOT NULL,
  PRIMARY KEY (`intId_Proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tblproveedor` */

insert  into `tblproveedor`(`intId_Proveedor`,`vchNombre`,`vchEmpresa`,`vchTelefono`,`vchCorreo`) values (2,'Jose','ZTATE','7713298113','Jose@live.com'),(3,'Edgar','Nokia','21313','Edgar@live.com');

/*Table structure for table `tblusuarios` */

DROP TABLE IF EXISTS `tblusuarios`;

CREATE TABLE `tblusuarios` (
  `intId_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `vchCorreo` varchar(100) NOT NULL,
  `vchPassword` varchar(100) NOT NULL,
  `vchRool` varchar(100) DEFAULT 'Admin',
  PRIMARY KEY (`intId_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblusuarios` */

insert  into `tblusuarios`(`intId_Usuario`,`vchCorreo`,`vchPassword`,`vchRool`) values (1,'Edgar@live.com','123','Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
