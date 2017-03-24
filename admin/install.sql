DROP TABLE IF EXISTS `#__todpre`;
 
CREATE TABLE `#__todpre` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#__todpre_giustificativi`;

CREATE TABLE `#__todpre_giustificativi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) NOT NULL,
  `codice` varchar(5) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
