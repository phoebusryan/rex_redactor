$.Redactor.prototype.heading4 = function() {
	return {
		init: function() {
			var button = this.button.add('heading4', this.lang.get('header4'));
			this.button.setAwesome('heading4', 'fa-header');
			
			this.button.addCallback(button, this.heading4.set);
		},
		set: function() {
			this.block.format('h4');
		}
	};
};