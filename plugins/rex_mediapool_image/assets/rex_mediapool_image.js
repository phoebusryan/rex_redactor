$.Redactor.prototype.rex_mediapool_image = function() {
	return {
		init: function() {
			var button = this.button.add('rex_mediapool_image', this.lang.get('image'));
			this.button.setAwesome('rex_mediapool_image', 'fa-picture-o');
			this.button.addCallback(button, this.rex_mediapool_image.addImage);
		},
		addImage: function() {
			var redactorFieldID = $(this.$element).attr('id');
			
			newPoolWindow('index.php?page=mediapool/media&opener_input_field='+redactorFieldID);
		},
		selectMedia: function(filename, title) {
			var html = '<img src="index.php?rex_media_type=redactorImage&rex_media_file=' + filename + '" alt="'+title+'">';
			this.insert.html(html);
		}
	};
};