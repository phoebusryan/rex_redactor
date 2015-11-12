<?php
	echo rex_view::info($this->i18n('tutorial_infotext'));
	
	$moduleInput = '';
	$moduleInput .= '<fieldset>'.PHP_EOL;
	$moduleInput .= '  <dl class="rex-form-group form-group">'.PHP_EOL;
	$moduleInput .= '    <dt><label for="value_1">VALUE 1:</label></dt>'.PHP_EOL;
	$moduleInput .= '    <dd><textarea cols="1" rows="6" class="form-control redactorEditor-default" id="value_1" name="REX_INPUT_VALUE[1]">REX_VALUE[1]</textarea></dd>'.PHP_EOL;
	$moduleInput .= '  </dl>'.PHP_EOL;
	$moduleInput .= '  <dl class="rex-form-group form-group">'.PHP_EOL;
	$moduleInput .= '    <dt><label for="value_2">VALUE 2:</label></dt>'.PHP_EOL;
	$moduleInput .= '    <dd><textarea cols="1" rows="6" class="form-control redactorEditor-simple" id="value_2"name="REX_INPUT_VALUE[2]">REX_VALUE[2]</textarea></dd>'.PHP_EOL;
	$moduleInput .= '  </dl>'.PHP_EOL;
	$moduleInput .= '</fieldset>'.PHP_EOL;
	
	$fragment = new rex_fragment();
	$fragment->setVar('class', 'info', false);
	$fragment->setVar('title', 'Beispiel: Module Input', false); //todo
	$fragment->setVar('body', highlight_string($moduleInput, true), false);
	echo $fragment->parse('core/page/section.php');
?>