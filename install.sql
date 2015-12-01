DROP TABLE IF EXISTS `%TABLE_PREFIX%redactor_profiles`;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%redactor_profiles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `redactor_buttons` text NOT NULL,
  `redactor_plugins` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `%TABLE_PREFIX%redactor_profiles` (`id`, `name`, `description`, `language`, `redactor_buttons`, `redactor_plugins`) VALUES
(1, 'full', 'Standard Redactor-Konfiguration', 'de', 'alignment,bold,deleted,formatting[h1|p],horizontalrule,html,italic,indent,orderedlist,outdent,underline,unorderedlist', 'clips[Snippetname1=Snippettext1|Snippetname2=Snippettext2],fontcolor[#ffffff|#000000],fontfamily[arial|times],fontsize[10|12|14],fullscreen,rex_linkmap,rex_mediapool_image,rex_mediapool_link,table,textdirection,video');

ALTER TABLE `%TABLE_PREFIX%redactor_profiles`
 ADD PRIMARY KEY (`id`);