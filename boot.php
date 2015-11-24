<?php
	if (rex::isBackend()) {
		rex_view::addCssFile($this->getAssetsUrl('redactor.css'));
		rex_view::addCssFile($this->getAssetsUrl('redactor_custom.css'));
		rex_view::addJsFile($this->getAssetsUrl('redactor.js'));
		
		//Start - get redactor-profiles
			$sql = rex_sql::factory();
			$profiles = $sql->setQuery("SELECT `name`, `language`, `redactor_buttons`, `redactor_plugins` FROM `".rex::getTablePrefix()."redactor_profiles` ORDER BY `name` ASC")->getArray();
			unset($sql);
			
			$jsCode = [];
			$jsCode[] = '$(document).on(\'ready pjax:success\',function() {';
			foreach ($profiles as $profile) {
				rex_view::addJsFile($this->getAssetsUrl('langs/'.$profile['language'].'.js'));
				
				$redactorConfig = [];
				
				$jsCode[] = '$(\'.redactorEditor-'.$profile['name'].'\').redactor({';
				$jsCode[] = '  lang: \''.$profile['language'].'\',';
				
				//Start - get buttonconfiguration
					$redactorButtons = [];
					$buttons = explode(',', $profile['redactor_buttons']);
					foreach ($buttons as $button) {
						if (preg_match('/(.*)\[(.*)\]/', $button, $matches)) {
							//Start - explode parameters
								$parameters = explode('|', $matches[2]);
								$parameterString = '';
								foreach ($parameters as $parameter) {
									if (strpos($parameter, '=') !== false) {
										list($key, $value) = explode('=',$parameter);
										$parameterString .= "['".addslashes($key)."', '".addslashes($value)."'],";
									} else {
										$parameterString .= "'".$parameter."',";
									}
								}
								
								$redactorConfig[] =  $matches[1].': ['.$parameterString.'],';
							//End - explode parameters
							
							$redactorButtons[] = $matches[1];
						} else {
							$redactorButtons[] = $button;
						}
					}
				//End - get buttonconfiguration
				
				//Start - get pluginconfiguration
					$redactorPlugins = [];
					$plugins = explode(',', $profile['redactor_plugins']);
					foreach ($plugins as $plugin) {
						if (preg_match('/(.*)\[(.*)\]/', $plugin, $matches)) {
							//Start - explode parameters
								$parameters = explode('|', $matches[2]);
								$parameterString = '';
								foreach ($parameters as $parameter) {
									if (strpos($parameter, '=') !== false) {
										list($key, $value) = explode('=',$parameter);
										$parameterString .= "['".addslashes($key)."', '".addslashes($value)."'],";
									} else {
										$parameterString .= "'".$parameter."',";
									}
								}
								
								$redactorConfig[] =  $matches[1].': ['.$parameterString.'],';
							//End - explode parameters
							
							$redactorPlugins[] = $matches[1];
							rex_view::addJsFile($this->getAssetsUrl('plugins/'.$matches[1].'.js'));
						} else {
							$redactorPlugins[] = $plugin;
							rex_view::addJsFile($this->getAssetsUrl('plugins/'.$plugin.'.js'));
						}
					}
				//End - get pluginconfiguration
				
				$jsCode[] = 'buttons: [\''.implode('\',\'', $redactorButtons).'\'],';
				$jsCode[] = 'plugins: [\''.implode('\',\'', $redactorPlugins).'\'],';
				$jsCode[] = implode(PHP_EOL, $redactorConfig);
				
				$jsCode[] = '});';
			}
			$jsCode[] = '});';
			
			if (!rex_file::put(rex_path::addonAssets('rex_redactor', 'cache/redactor_profiles.js').'', implode(PHP_EOL, $jsCode))) {
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
	
		//Start - use OUTPUT_FILTER-EP to use an custom callback
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
		//End - use OUTPUT_FILTER-EP to use an custom callback
	}
?>