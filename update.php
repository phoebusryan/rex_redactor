<?php
	if (rex_string::versionCompare($this->getVersion(), '1.5', '<')) {
		rex_sql_table::get(rex::getTable('redactor_profiles'))->ensureColumn(new rex_sql_column('urltype', 'VARCHAR(50)'))->alter();
	}

	if (rex_string::versionCompare($this->getVersion(), '1.4', '<')) {
		rex_sql_table::get(rex::getTable('redactor_profiles'))->removeColumn('language')->alter();
	}

	if (rex_string::versionCompare($this->getVersion(), '1.3', '<')) {
		rex_sql_table::get(rex::getTable('redactor_profiles'))->ensureColumn(new rex_sql_column('redactor_plugins', 'TEXT'))->alter();
	}
?>