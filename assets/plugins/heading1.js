$.Redactor.prototype.heading1 = function() {
	return {
		init: function() {
			var button = this.button.add('heading1', this.lang.get('header1'));
			this.button.setAwesome('heading1', 'fa-header');
			
			this.button.addCallback(button, this.heading1.set);
		},
		set: function() {
			this.block.format('h1');
		}
	};
};