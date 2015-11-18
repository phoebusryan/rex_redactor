$.Redactor.prototype.rex_linkmap = function() {
	return {
		init: function() {
			var button = this.button.add('rex_linkmap', 'Redaxo ' + this.lang.get('link'));
			this.button.setAwesome('rex_linkmap', 'fa-link');
			
			this.button.addCallback(button, this.rex_linkmap.addLink);
		},
		addLink: function() {
			this.selection.save();
			
			var redactorFieldID = $(this.$element).attr('id');
			openLinkMap(redactorFieldID);
		},
		insertLink: function(url, title) {
			this.selection.restore();
			var selectedText = this.selection.getText();
			
			var html = '<a href="' + url + '" title="'+title+'">' + ((selectedText != '') ? selectedText : title) + '</a>';
			this.insert.html(html);
		}
	};
};