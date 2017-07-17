/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};

(function ($) {
	'use strict';

	app.views.createView = Backbone.View.extend({
		
		initialize: function(){
			// console.log(this.model);
			this.render();
		},
		render: function(){
			var template = _.template( $('#materies_create').html() );
			
			if( typeof(this.model) !== 'undefined' ){
				this.$el.html( template({
					modules: this.collection.modules,
					model: this.model.toJSON()
				}) );

				this.$("#module_id").attr('selected','selected');	
			}else{
				this.$el.html( template({
					modules: this.collection.modules,

				}) );
			}

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
					
					this.collection.materies.create(tmp, { 
						wait: true,
						success: function(){
							console.log('data saved');
							app.Router.navigate('/', true);
						},
					});

				}catch(err){
					console.log(err);
					alert(err);
				}
			}else{
				alert('you need to full fill all data !');
			}

			console.log(tmp, this.collection.materies);
		},
	});
})(jQuery);