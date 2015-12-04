<?php
	class rex_redactor {
		
		public static function insertProfile ($name, $description = '', $redactorButtons = '', $redactorProfiles = '') {
			$sql = rex_sql::factory();
			$sql->setTable(rex::getTablePrefix().'redactor_profiles');
			$sql->setValue('name', $name);
			$sql->setValue('description', $description);
			$sql->setValue('redactor_buttons', $redactorButtons);
			$sql->setValue('redactor_profile', $redactorProfiles);
			
			try {
				$sql->insert();
				return $sql->getLastId();
			} catch (rex_sql_exception $e) {
				return $e->getMessage();
			}
		}
	}
?>