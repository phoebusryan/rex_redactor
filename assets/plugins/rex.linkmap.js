$.Redactor.prototype.rex_linkmap = function() {
	return {
		init: function() {
			var button = this.button.add('rex_linkmap', this.lang.get('link'));
			this.button.setAwesome('rex_linkmap', 'fa-link');
			
			var dropdown = {};
			
			dropdown.point1 = { title: this.lang.get('link'), func: this.rex_linkmap.addLink };
			dropdown.point2 = { title: this.lang.get('unlink'), func: this.rex_linkmap.removeLink };
			
			this.button.addDropdown(button, dropdown);
		},
		addLink: function() {
			var redactorFieldID = $(this.$element).attr('id');
			openLinkMap(redactorFieldID, '&referrer=redactor&pluginname=rex_linkmap');
		},
		insertLink: function(url, title) {
			var html = '<a href="' + url + '" title="'+title+'">' + title + '</a>';
			this.insert.html(html);
		},
		removeLink: function() {
			console.log('remove');
		}
	};
};