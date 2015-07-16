
--
-- Table structure for table `linqs`
--
-- id int(11) - primary key
-- oid int(11) - owner id
-- url text - original url
-- linq varchar(6) - shortened url
-- pmstamp timestamp - record timestamp

DROP TABLE IF EXISTS `linqs`;
CREATE TABLE IF NOT EXISTS `linqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `url` text NOT NULL,
  `linq` varchar(6) NOT NULL,
  `pmstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `linq` (`linq`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Table structure for table `tracking`
--
-- id int(11) - primary key
-- ip varchar(20) - ip address
-- agent text - browser agent
-- linq text - shortened url
-- pmstamp timestamp - record timestamp

DROP TABLE IF EXISTS `tracking`;
CREATE TABLE IF NOT EXISTS `tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) DEFAULT NULL,
  `agent` text,
  `linq` text,
  `pmstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
