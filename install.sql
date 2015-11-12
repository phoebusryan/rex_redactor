DROP TABLE IF EXISTS `%TABLE_PREFIX%redactor_profiles`;

CREATE TABLE `%TABLE_PREFIX%redactor_profiles` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `redactor_configuration` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO `%TABLE_PREFIX%redactor_profiles` (`id`, `name`, `description`, `language`, `redactor_configuration`) VALUES
(2, 'simple', 'Standard Redactor-Konfiguration', 'en', 'buttons: [\r\n	''html'', ''|'',\r\n	''formatting'', ''|'',\r\n	''bold'', ''|'',\r\n	''unorderedlist'', ''|'',\r\n	''rex_link'', ''rex_linkmap'', ''rex_unlink'', ''rex_media'', ''|''\r\n	],\r\n\r\nfocus: false,\r\nautoresize: false,\r\ncleanup: true,\r\nconvertLinks: false,\r\nfixedBox: true,\r\nwym: false,\r\nformattingTags: [''p'', ''h3''],\r\nrex_linktitle: false,\r\nrex_mediatitle: false, \r\nrex_filetitle: false '),
(6, 'default', 'Full', 'de', '');