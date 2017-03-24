DROP TABLE IF EXISTS `#__todpre_giustificativi`;

CREATE TABLE `#__todpre_giustificativi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catid` int(11) NOT NULL default '0',
  `nome` varchar(25) NOT NULL,
  `codice` varchar(5) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__todpre_giustificativi` (`id`, `catid`, `nome`, `codice`, `published`)
VALUES
	(1,4,'Assemblea Sindacale 1 ora','01',1),
	(2,4,'Assemblea Sindacale 2 ore','02',1),
	(3,4,'Assemblea Sindacale 3 ore','03',1),
	(4,4,'Assemblea Sindacale 4 ore','04',1),
	(5,4,'Assemblea Sindacale 5 ore','05',1),
	(6,4,'Assemblea Sindacale 6 ore','06',1),
	(7,4,'Assemblea Sindacale 7 ore','07',1),
	(8,4,'Assemblea Sindacale 8 ore','08',1);
