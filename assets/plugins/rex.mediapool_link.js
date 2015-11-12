$.Redactor.prototype.rex_mediapool_link = function() {
	return {
		init: function() {
			$('<input>').attr({ type: 'hidden', id: 'redactor_rex_mediapool_link_insert'+this.uuid}).appendTo($('#REX_FORM'));
			
			var button = this.button.add('rex_mediapool_link', this.lang.get('file'));
			this.button.setAwesome('rex_mediapool_link', 'fa-paperclip');
			
			var dropdown = {};
			
			dropdown.point1 = { title: this.lang.get('file'), func: this.rex_mediapool_link.addFileLink };
			dropdown.point2 = { title: this.lang.get('unlink'), func: this.rex_mediapool_link.removeFileLink };
			
			this.button.addDropdown(button, dropdown);
		},
		addFileLink: function() {
			var that = this;
			
			$('#redactor_rex_mediapool_insert'+that.uuid).val('');
			
			newPoolWindow('index.php?page=mediapool/media&opener_input_field=redactor_rex_mediapool_link_insert'+that.uuid);
			
			var callbackInterval = setInterval (function() {
				if ($('#redactor_rex_mediapool_link_insert'+that.uuid).val() != '') {
					clearInterval(callbackInterval);
					
					filename = $('#redactor_rex_mediapool_link_insert'+that.uuid).val();
					
					var html = '<a href="./media/' + filename + '">' + filename + '</a>';
					that.insert.html(html);
				}
			}, 500);
		},
		removeFileLink: function() {
			console.log('remove');
		}
	};
};