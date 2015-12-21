$.Redactor.prototype.cleaner = function() {
	return {
		init: function() {
			var button = this.button.add('cleaner', this.lang.get('remove_formatting'));
			this.button.setAwesome('cleaner', 'fa-eraser');
			this.button.addCallback(button, this.cleaner.set);
		},
		set: function() {
			var selectedText = this.selection.getText();
			
			if (selectedText != '') {
				var selectedText = this.clean.getPlainText(selectedText);
				this.insert.html(selectedText);
			}
		}
	};
};