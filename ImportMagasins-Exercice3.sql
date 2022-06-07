USE `_wshop_test`;

DROP TABLE IF EXISTS `magasin`;

CREATE TABLE `magasin` (
  `magasin_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `magasin_nom` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`magasin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=607 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

insert  into `magasin`(`magasin_id`,`magasin_nom`) values 
(1,'Paris 75008'),
(2,'Paris 75002'),
(3,'Paris 75005'),
(4,'Le Mans Centre'),
(5,'Le Mans Banlieue'),
(6,'Angers Centre'),
(7,'Angers Zone Industrielle');