$.Redactor.prototype.rex_mediapool_image = function() {
	return {
		init: function() {
			$('<input>').attr({ type: 'hidden', id: 'redactor_rex_mediapool_image_insert'+this.uuid}).appendTo($('#REX_FORM'));
			
			var button = this.button.add('rex_mediapool_image', this.lang.get('image'));
			this.button.setAwesome('rex_mediapool_image', 'fa-picture-o');
			this.button.addCallback(button, this.rex_mediapool_image.addImage);
		},
		addImage: function() {
			var that = this;
			
			$('#redactor_rex_mediapool_insert'+that.uuid).val('');
			
			newPoolWindow('index.php?page=mediapool/media&opener_input_field=redactor_rex_mediapool_image_insert'+that.uuid);
			
			var callbackInterval = setInterval (function() {
				if ($('#redactor_rex_mediapool_image_insert'+that.uuid).val() != '') {
					clearInterval(callbackInterval);
					
					filename = $('#redactor_rex_mediapool_image_insert'+that.uuid).val();
					
					var html = '<img src="index.php?rex_media_type=redactorImage&rex_media_file=' + filename + '" alt="">';
					that.insert.html(html);
				}
			}, 500);
		}
	};
};