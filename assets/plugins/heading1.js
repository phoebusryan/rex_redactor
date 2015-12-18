$.Redactor.prototype.heading1 = function() {
	return {
		init: function() {
			var button = this.button.add('heading1', this.lang.get('header1'));
			this.button.setAwesome('heading1', 'fa-header');
			
			this.button.addCallback(button, this.heading1.set);
		},
		set: function() {
			var selectedText = this.selection.getText();
			
			if (selectedText != '') {
				var html = '<h1>'+selectedText+'</h1>';
				this.insert.html(html);
			}
		}
	};
};