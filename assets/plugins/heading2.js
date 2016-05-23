$.Redactor.prototype.heading2 = function() {
	return {
		init: function() {
			var button = this.button.add('heading2', this.lang.get('header2'));
			this.button.setAwesome('heading2', 'fa-header');
			
			this.button.addCallback(button, this.heading2.set);
		},
		set: function() {
			this.block.format('h2');
		}
	};
};