$.Redactor.prototype.rex_linkmap = function() {
	return {
		init: function() {
			$('<input>').attr({ type: 'hidden', id: 'redactor_rex_linkmap_insert'+this.uuid}).appendTo($('#REX_FORM'));
			$('<input>').attr({ type: 'hidden', id: 'redactor_rex_linkmap_insert'+this.uuid+'_NAME'}).appendTo($('#REX_FORM'));
			
			var button = this.button.add('rex_linkmap', this.lang.get('link'));
			this.button.setAwesome('rex_linkmap', 'fa-link');
			
			var dropdown = {};
			
			dropdown.point1 = { title: this.lang.get('link_insert'), func: this.rex_linkmap.addLink };
			dropdown.point2 = { title: this.lang.get('unlink'), func: this.rex_linkmap.removeLink };
			
			this.button.addDropdown(button, dropdown);
		},
		addLink: function() {
			var that = this;
			
			$('#redactor_rex_linkmap_insert'+that.uuid).val('');
			
			openLinkMap('redactor_rex_linkmap_insert'+this.uuid);
			
			var callbackInterval = setInterval (function() {
				if ($('#redactor_rex_linkmap_insert'+that.uuid).val() != '') {
					clearInterval(callbackInterval);
					
					var linkID = $('#redactor_rex_linkmap_insert'+that.uuid).val();
					var linkText = $('#redactor_rex_linkmap_insert'+that.uuid+'_NAME').val();
					
					var html = '<a href="redaxo://' + linkID + '">' + linkText + '</a>';
					that.insert.html(html);
				}
			}, 500);
		},
		removeLink: function() {
			console.log('remove');
		}
	};
};