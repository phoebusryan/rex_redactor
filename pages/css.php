<?php
	if(rex_post('save', 'string') != '') {
		foreach (['custom_css'] as $field) {
			$this->setConfig($field, rex_post($field, 'string'));
		}
		
		echo rex_view::success($this->i18n('config_saved'));
	}
	
	echo rex_view::info($this->i18n('css_infotext'));
	
	$config = rex_config::get('rex_redactor');
	
	//Start - configuration form
		$content = '';
		
		$content .= '<form action="' . rex_url::currentBackendPage() . '" method="post">';
		$content .= '	<fieldset>';
		
		$formElements = [];
		
		//Start - add custom_css field
			$n = [];
			$n['label'] = '<label for="rex-form-custom_css">' . 'Custom CSS' . '</label>';
			$n['field'] = '<textarea class="form-control" id="rex-form-custom_css" name="custom_css">'.$config['custom_css'].'</textarea>';
			$formElements[] = $n;
		//End - add custom_css field
		
		$fragment = new rex_fragment();
		$fragment->setVar('elements', $formElements, false);
		$content .= $fragment->parse('core/form/form.php');
		
		$content .= '</fieldset>';
	
		$formElements = [];
		$n = [];
		$n['field'] = '<button class="btn btn-save rex-form-aligned" type="submit" name="save" value="' . $this->i18n('button_save') . '">' . $this->i18n('button_save'). '</button>';
		$formElements[] = $n;
		
		$fragment = new rex_fragment();
		$fragment->setVar('elements', $formElements, false);
		$buttons = $fragment->parse('core/form/submit.php');
		
		$fragment = new rex_fragment();
		$fragment->setVar('class', 'edit', false);
		$fragment->setVar('title', $this->i18n('css_formcaption'), false);
		$fragment->setVar('body', $content, false);
		$fragment->setVar('buttons', $buttons, false);
		$content = $fragment->parse('core/page/section.php');
		
		$content .= '</form>';
		
		echo $content;
	//End - configuration form
?>