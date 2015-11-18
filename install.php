<?php
	if (!$this->hasConfig()) {
		$this->setConfig('redactor_enhancements', "/*limiter: 20,\ncounterCallback: function (data) {\n  console.log(data);\n},*/");
		$this->setConfig('custom_css', '');
		$this->setConfig('custom_js', '');
	}
?>