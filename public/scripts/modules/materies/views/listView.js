/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};
app.views.materies = app.views.materies || {};

(function ($) {
	'use strict';

	app.views.materies.list = Backbone.View.extend({
		
		initialize: function(){
			var _this = this;

			this.bindEvents();

			/*this.collection.materies.fetch({
				reset: true,
				success: function(){
					_this.collection.modules.fetch({
						reset: true,
						success: function(){
							// _this.render();
							// _this.listenTo(_this.collection.materies, 'reset', _this.render );							
						},
						error: function(err){
							console.log(err);
							alert('error has occured', err);		
						}
					});
				
				},
				error: function(err){
					console.log(err);
					alert('error has occured', err);
				}
			});*/
			this.collection.modules.fetch({
				reset:true,
				success: function(){
					_this.collection.materies.fetch({reset: true })
				}

			});
			
		},
		render: function(){

			var _this = this;
			// if( this.collection.materies.has('id') && this.collection.modules.has('id') ){
				this.collection.materies.each(function(param_model){
					param_model.module = _this.collection.modules.get({id: param_model.get('module_id') });  //masukin module ke model
					
					var tmpView = new app.views.materies.item( {
						model: param_model,			
					});
					
					_this.$el.append( tmpView.render().$el );
					// tmpView.delegateEvents();
				});
			// }
		
		},
		bindEvents: function(){
			this.listenTo(this.collection.materies, 'reset', this.render );
			// this.listenTo(this.collection.modules, 'reset', this.render );
		},
		
	});
})(jQuery);