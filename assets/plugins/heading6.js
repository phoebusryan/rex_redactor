$.Redactor.prototype.heading6 = function() {
	return {
		init: function() {
			var button = this.button.add('heading6', this.lang.get('header6'));
			this.button.setAwesome('heading6', 'fa-header');
			
			this.button.addCallback(button, this.heading6.set);
		},
		set: function() {
			var selectedText = this.selection.getText();
			
			if (selectedText != '') {
				var html = '<h6>'+selectedText+'</h6>';
				this.insert.html(html);
			}
		}
	};
};