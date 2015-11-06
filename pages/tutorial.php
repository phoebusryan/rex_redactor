<?php
	echo rex_view::info($this->i18n('tutorial_infotext'));
	
	$fragment = new rex_fragment();
	$fragment->setVar('class', 'info', false);
	$fragment->setVar('title', 'Beispielmodul', false); //todo
	$fragment->setVar('body', 'XYZ', false); //todo
	echo $fragment->parse('core/page/section.php');
?>