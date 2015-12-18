$.Redactor.prototype.paragraph = function() {
	return {
		init: function() {
			var button = this.button.add('paragraph', this.lang.get('paragraph'));
			this.button.setAwesome('paragraph', 'fa-paragraph');
			
			this.button.addCallback(button, this.paragraph.set);
		},
		set: function() {
			var selectedText = this.selection.getText();
			
			if (selectedText != '') {
				var html = '<p>'+selectedText+'</p>';
				this.insert.html(html);
			}
		}
	};
};