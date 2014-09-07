CREATE TABLE `ping` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `source` varchar(255) NOT NULL,
 `destination` varchar(255) NOT NULL,
 `min` int(11) NOT NULL,
 `avg` int(11) NOT NULL,
 `max` int(11) NOT NULL,
 `loss` int(11) NOT NULL,
 `time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
 KEY `source` (`source`),
 KEY `destination` (`destination`),
 KEY `time` (`time`),
 KEY `source_time` (`source`,`time`),
 KEY `destination_time` (`destination`,`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8
