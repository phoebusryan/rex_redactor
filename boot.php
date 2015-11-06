<?php
	if (rex::isBackend()) {
		rex_view::addCssFile($this->getAssetsUrl('redactor.css'));
		rex_view::addJsFile($this->getAssetsUrl('redactor.js'));
		
		$plugins = glob(rex_path::addonAssets('rex_redactor', 'plugins').'/*.js');
		foreach ($plugins as $plugin) {
			rex_view::addJsFile($this->getAssetsUrl('plugins/'.substr($plugin, strlen(rex_path::addonAssets('rex_redactor', 'plugins'))+1)));
		}
		
		//Start - get redactor-profiles
			$sql = rex_sql::factory();
			$profiles = $sql->setQuery("SELECT `name`, `language`, `redactor_configuration` FROM `".rex::getTablePrefix()."redactor_profiles` ORDER BY `name` ASC")->getArray();
			unset($sql);
			
			$javascriptCode = '';
			$javascriptCode .= '$(document).ready(function() {';
			foreach ($profiles as $profile) {
				rex_view::addJsFile($this->getAssetsUrl('langs/'.$profile['language'].'.js'));
				
				$javascriptCode .= '$(\'.redactorEditor-'.$profile['name'].'\').redactor({';
				$javascriptCode .= 'lang: \''.$profile['language'].'\',';
				$javascriptCode .= 'plugins:[\'rex_mediapool\', \'rex_linkmap\'],';
				
				$javascriptCode .= $profile['redactor_configuration'];
				
				$javascriptCode .= '});';
			}
			$javascriptCode .= '});';
			
			if (!rex_file::put(rex_path::addonAssets('rex_redactor', 'cache/redactor_profiles.js').'', $javascriptCode)) {
				echo 'file konnte nicht gespeichert werden';
			}
			
			rex_view::addJsFile($this->getAssetsUrl('cache/redactor_profiles.js'));
		//End - get redactor-profiles
	}
?>