$.Redactor.prototype.rex_mediapool_link = function() {
	return {
		init: function() {
			var button = this.button.add('rex_mediapool_link', this.lang.get('file'));
			this.button.setAwesome('rex_mediapool_link', 'fa-paperclip');
			
			this.button.addCallback(button, this.rex_mediapool_link.addFileLink);
		},
		addFileLink: function() {
			this.selection.save();
			
			var redactorFieldID = $(this.$element).attr('id');
			newPoolWindow('index.php?page=mediapool/media&referrer=redactor&pluginname=rex_mediapool_link&opener_input_field='+redactorFieldID);
		},
		selectMedia: function(filename, title) {
			this.selection.restore();
			var selectedText = this.selection.getText();
			
			var html = '<a href="./media/' + filename + '" title="'+title+'">' + ((selectedText != '') ? selectedText : title) + '</a>';
			this.insert.html(html);
		}
	};
};