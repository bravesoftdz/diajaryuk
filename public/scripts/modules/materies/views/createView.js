/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};

(function ($) {
	'use strict';

	app.views.createView = Backbone.View.extend({
		
		initialize: function(){
			console.log(this.collection.modules);
			this.render();
		},
		render: function(){
			var template = _.template( $('#materies_create').html() );
			this.$el.html( template({
				modules: this.collection.modules,
			}) );
			return this;
		},
		events: {
			'click #btnSave' : 'btnSaveOnclick',
		},
		btnSaveOnclick: function(){
			// console.log('btnSaveOnclick');
			var tmp = {
				title: this.$("#title").val(),
				content: this.$("#content").text(),
				module_id: this.$("#module_id").val()
			};

			if(tmp.title !== '' && tmp.content !== '' && tmp.module_id !== ''){
				try{
					
				}catch(err){
					console.log(err);
					alert(err);
				}
			}else{
				alert('you need to full fill all data !');
			}

			console.log(tmp);
		},
	});
})(jQuery);