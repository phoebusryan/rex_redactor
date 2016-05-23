$.Redactor.prototype.heading3 = function() {
	return {
		init: function() {
			var button = this.button.add('heading3', this.lang.get('header3'));
			this.button.setAwesome('heading3', 'fa-header');
			
			this.button.addCallback(button, this.heading3.set);
		},
		set: function() {
			this.block.format('h3');
		}
	};
};