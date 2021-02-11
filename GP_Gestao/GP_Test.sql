# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.32)
# Base de Dados: mydb
# Tempo de Geração: 2021-02-11 16:51:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela GP_Test
# ------------------------------------------------------------

DROP TABLE IF EXISTS `GP_Test`;

CREATE TABLE `GP_Test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kanban` varchar(255) NOT NULL,
  `section` int(11) NOT NULL,
  `date_check_in` timestamp NULL DEFAULT NULL,
  `date_check_out` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kanban` (`id_kanban`),
  KEY `section` (`section`),
  CONSTRAINT `gp_test_ibfk_1` FOREIGN KEY (`id_kanban`) REFERENCES `KANBAN` (`idKANBAN`),
  CONSTRAINT `gp_test_ibfk_2` FOREIGN KEY (`section`) REFERENCES `Seccoes` (`idSeccoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
