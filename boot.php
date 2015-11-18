<?php
	if (rex::isBackend()) {
		rex_view::addCssFile($this->getAssetsUrl('redactor.css'));
		rex_view::addJsFile($this->getAssetsUrl('redactor.js'));
		
		$plugins = glob(rex_path::addonAssets('rex_redactor', 'plugins').'/*/*.js');
		foreach ($plugins as $index => $plugin) {
			$plugins[$index] = substr($plugin, strrpos($plugin, '/')+1,-3);
			rex_view::addJsFile($this->getAssetsUrl('plugins/'.$plugins[$index].'/'.$plugins[$index].'.js'));
		}
		
		//Start - get redactor-profiles
			$sql = rex_sql::factory();
			$profiles = $sql->setQuery("SELECT `name`, `language`, `redactor_configuration` FROM `".rex::getTablePrefix()."redactor_profiles` ORDER BY `name` ASC")->getArray();
			unset($sql);
			
			$javascriptCode = '';
			$javascriptCode .= '$(document).on(\'ready pjax:success\',function() {';
			foreach ($profiles as $profile) {
				rex_view::addJsFile($this->getAssetsUrl('langs/'.$profile['language'].'.js'));
				
				$javascriptCode .= '$(\'.redactorEditor-'.$profile['name'].'\').redactor({';
				$javascriptCode .= 'lang: \''.$profile['language'].'\',';
				
				if (!empty($plugins)) {
					$javascriptCode .= 'plugins: [\''.implode('\',\'', $plugins).'\'],';
				}
				
				$javascriptCode .= $this->getConfig('redactor_enhancements');
				
				$javascriptCode .= $profile['redactor_configuration'];
				
				$javascriptCode .= '});';
			}
			$javascriptCode .= '});';
			
			if (!rex_file::put(rex_path::addonAssets('rex_redactor', 'cache/redactor_profiles.js').'', $javascriptCode)) {
				echo 'js-file konnte nicht gespeichert werden';
			}
			
			rex_view::addJsFile($this->getAssetsUrl('cache/redactor_profiles.js'));
		//End - get redactor-profiles
		
		//Start - include custom js
			$customJS = $this->getConfig('custom_js');
			
			if (!rex_file::put(rex_path::addonAssets('rex_redactor', 'cache/custom_js.js').'', $customJS)) {
				echo 'customJS konnte nicht gespeichert werden';
			}
			
			rex_view::addJsFile($this->getAssetsUrl('cache/custom_js.js'));
		//End - include custom js
		
		//Start - include custom css
			$customCSS = $this->getConfig('custom_css');
			
			if (!rex_file::put(rex_path::addonAssets('rex_redactor', 'cache/custom_css.css').'', $customCSS)) {
				echo 'customCSS konnte nicht gespeichert werden';
			}
			
			rex_view::addCssFile($this->getAssetsUrl('cache/custom_css.css'));
		//End - include custom css
	
		//Start use OUTPUT_FILTER-EP to use an custom callback
			rex_extension::register('OUTPUT_FILTER', function($param) {
				$page = rex_request('page', 'string');
				$opener_input_field = rex_request('opener_input_field', 'string');
				
				$content = $param->getSubject();
				
				if (substr($opener_input_field, 0, 9) == 'redactor_') {
					switch ($page) {
						case 'mediapool/media':
							$content = preg_replace("|javascript:selectMedia\(\'(.*)\', \'(.*)\'\);|", "javascript:window.opener.$('#".$opener_input_field."').redactor('rex_mediapool_image.selectMedia', '$1', '$2');self.close();", $content);
						break;
						case 'linkmap':
							$content = preg_replace("|javascript:insertLink\(\'(.*)\',\'(.*)\'\);|",  "javascript:window.opener.$('#".$opener_input_field."').redactor('rex_linkmap.insertLink', '$1', '$2');self.close();", $content);
						break;
					}
				}
				
				return $content;
			});
		//End use OUTPUT_FILTER-EP to use an custom callback
	}
?>