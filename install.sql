DROP TABLE IF EXISTS `%TABLE_PREFIX%redactor_profiles`;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%redactor_profiles` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `language` varchar(10) NOT NULL DEFAULT '',
  `redactor_buttons` text NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

INSERT INTO `%TABLE_PREFIX%redactor_profiles` (`id`, `name`, `description`, `language`, `redactor_buttons`) VALUES
(1, 'full', 'Standard Redactor-Konfiguration', 'de', 'html,alignment,bold,clips[Snippetname1=Snippettext1|Snippetname2=Snippettext2],deleted,fontcolor[#ffffff|#000000],fontfamily[arial|times],fontsize[10|12|14],formatting[h1|p],fullscreen,italic,orderedlist,rex_linkmap,rex_mediapool_image,rex_mediapool_link,table,textexpander[Lorem=Lorem ipsum|Duis=Duis aute],unorderedlist,underline,video,indent,outdent,horizontalrule');