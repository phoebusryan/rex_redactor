DROP TABLE IF EXISTS `%TABLE_PREFIX%redactor_profiles`;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%redactor_profiles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `redactor_configuration` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `%TABLE_PREFIX%redactor_profiles` (`id`, `name`, `description`, `language`, `redactor_configuration`) VALUES
(2, 'simple', 'Standard Redactor-Konfiguration', 'en', 'buttons: [\r\n	''html'', ''|'',\r\n	''formatting'', ''|'',\r\n	''bold'', ''|'',\r\n	''unorderedlist'', ''|'',\r\n	],\r\n\r\nformatting: [''p'', ''h3''],'),
(1, 'default', 'Full', 'de', '');