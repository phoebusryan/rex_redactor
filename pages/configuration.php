<?php
	if (rex_post('save', 'string') != '') {
		foreach (['twitter_consumer_token', 'twitter_consumer_secret_token', 'twitter_access_token', 'twitter_secret_token'] as $field) {
			$this->setConfig($field, rex_post($field, 'string'));
		}
		
		echo rex_view::success($this->i18n('config_saved'));
	}
	
	//Start - configuration form
		$content = '';
		
		$content .= '<form action="' . rex_url::currentBackendPage() . '" method="post">';
		$content .= '	<fieldset>';
		
		$formElements = [];
		
		////
		
		//fields goes here
		
		////
		
		$fragment = new rex_fragment();
		$fragment->setVar('elements', $formElements, false);
		$content .= $fragment->parse('core/form/form.php');
		
		$content .= '</fieldset>';
	
		$formElements = [];
		$n = [];
		$n['field'] = '<button class="btn btn-save rex-form-aligned" type="submit" name="save" value="' . $this->i18n('twitter_button_save') . '">' . $this->i18n('twitter_button_save'). '</button>'; //todo
		$formElements[] = $n;
		
		$fragment = new rex_fragment();
		$fragment->setVar('elements', $formElements, false);
		$buttons = $fragment->parse('core/form/submit.php');
		
		$fragment = new rex_fragment();
		$fragment->setVar('class', 'edit', false);
		$fragment->setVar('title', 'Redactor-Konfiguration', false); //todo
		$fragment->setVar('body', $content, false);
		$fragment->setVar('buttons', $buttons, false);
		$content = $fragment->parse('core/page/section.php');
		
		$content .= '</form>';
		
		echo $content;
	//End - configuration form
?>