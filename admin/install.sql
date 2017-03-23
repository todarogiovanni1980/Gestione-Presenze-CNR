DROP TABLE IF EXISTS `#__todpre`;
 
CREATE TABLE `#__todpre` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__todpre` (`greeting`) VALUES ('Hello, World!'), ('Bonjour, Monde!'), ('Ciao, Mondo!');



DROP TABLE IF EXISTS `#__todpre_giustificativi`;
 
CREATE TABLE `#__todpre_giustificativi` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `nome` varchar(25) NOT NULL,
  `codice` varchar(5) NOT NULL, 
  `published` tinyint(1) NOT NULL, 
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__todpre_giustificativi` (`codice`,`nome`) 
VALUES ('31','Ferie anno precedente'), 
		 ('32','Ferie anno in corso'),
		 ('94','Festività soppresse'),
		 ('92','Missione');