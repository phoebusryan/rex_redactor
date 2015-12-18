(function($) {
	$.Redactor.prototype.fontsize = function() {
		return {
			init: function() {
				if (!this.opts.fontsize) return;
				var fonts = this.opts.fontsize;
				
				var that = this;
				var dropdown = {};

				$.each(fonts, function(i, s) {
					dropdown['s' + i] = {
						title: s,
						func: function() {
							that.fontsize.set(s);
						}
					};
				});
				
				dropdown.remove = { title: this.lang.get('remove_fontsize'), func: that.fontsize.remove };
				
				var button = this.button.add('fontsize', this.lang.get('fontsize'));
				this.button.addDropdown(button, dropdown);
			},
			set: function(size) {
				this.inline.format('span', 'style', 'font-size: ' + size + ';');
			},
			remove: function() {
				this.inline.removeStyleRule('font-size');
			}
		};
	};
})(jQuery);