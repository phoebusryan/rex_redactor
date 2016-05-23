$.Redactor.prototype.blockquote = function() {
	return {
		init: function() {
			var button = this.button.add('blockquote', this.lang.get('blockquote'));
			this.button.setAwesome('blockquote', 'fa-quote-left');
			
			this.button.addCallback(button, this.blockquote.set);
		},
		set: function() {
			this.block.format('blockquote');
		}
	};
};