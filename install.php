<?php
	if (!$this->hasConfig('redactor_enhancements')) {
		$this->setConfig('redactor_enhancements', "/*limiter: 20,\ncounterCallback: function (data) {\n  console.log(data);\n},\ntextexpander: [\n  ['lorem', 'Lorem ipsum...'],\n  ['duis', 'Duis autem...']\n],*/");
	}
	
	if (!$this->hasConfig('custom_css')) {
		$this->setConfig('custom_css', '');
	}
	
	if (!$this->hasConfig('custom_js')) {
		$this->setConfig('custom_js', '');
	}
?>