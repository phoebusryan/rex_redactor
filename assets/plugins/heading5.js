$.Redactor.prototype.heading5 = function() {
	return {
		init: function() {
			var button = this.button.add('heading5', this.lang.get('header5'));
			this.button.setAwesome('heading5', 'fa-header');
			
			this.button.addCallback(button, this.heading5.set);
		},
		set: function() {
			this.block.format('h5');
		}
	};
};