(function($)
{
	$.Redactor.prototype.fontfamily = function()
	{
		return {
			init: function ()
			{
				if (!this.opts.fontfamily) return;
				var fonts = this.opts.fontfamily;
				
				var that = this;
				var dropdown = {};

				$.each(fonts, function(i, s)
				{
					dropdown['s' + i] = { title: s, func: function() { that.fontfamily.set(s); }};
				});

				dropdown.remove = { title: 'Remove Font Family', func: that.fontfamily.reset };

				var button = this.button.add('fontfamily', 'Change Font Family');
				this.button.addDropdown(button, dropdown);

			},
			set: function (value)
			{
				this.inline.format('span', 'style', 'font-family:' + value + ';');
			},
			reset: function()
			{
				this.inline.removeStyleRule('font-family');
			}
		};
	};
})(jQuery);