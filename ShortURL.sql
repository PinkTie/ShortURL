
--
-- Table structure for table `links`
--
-- id int(11) - primary key
-- oid int(11) - owner id
-- url text - original url
-- surl varchar(6) - shortened url
-- pmstamp timestamp - record timestamp

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` int(11) NOT NULL,
  `url` text NOT NULL,
  `surl` varchar(6) NOT NULL,
  `pmstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
