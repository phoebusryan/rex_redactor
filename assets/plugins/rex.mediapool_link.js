$.Redactor.prototype.rex_mediapool_link = function() {
	return {
		init: function() {
			var button = this.button.add('rex_mediapool_link', this.lang.get('file'));
			this.button.setAwesome('rex_mediapool_link', 'fa-paperclip');
			
			var dropdown = {};
			
			dropdown.point1 = { title: this.lang.get('file'), func: this.rex_mediapool_link.addFileLink };
			dropdown.point2 = { title: this.lang.get('unlink'), func: this.rex_mediapool_link.removeFileLink };
			
			this.button.addDropdown(button, dropdown);
		},
		addFileLink: function() {
			var redactorFieldID = $(this.$element).attr('id');
			newPoolWindow('index.php?page=mediapool/media&referrer=redactor&pluginname=rex_mediapool_link&opener_input_field='+redactorFieldID);
		},
		selectMedia: function(filename, title) {
			var html = '<a href="./media/' + filename + '" title="'+title+'">' + filename + '</a>';
			this.insert.html(html);
		},
		removeFileLink: function() {
			console.log('remove');
		}
	};
};