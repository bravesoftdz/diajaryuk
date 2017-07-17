/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};
app.views.overview = app.views.overview || {};

(function ($) {
	'use strict';

	app.views.overview.list = Backbone.View.extend({
		
		initialize: function(){
			var _this = this;
			this.collection.materies.fetch({
				success: function(){
					_this.collection.modules.fetch({
						success: function(){
							_this.render();
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
			});
			
		},
		render: function(){

			var _this = this;
			// console.log(this.collection);
			/*this.collection.materies.each(function(param_model){
				
				var tmpView = new app.views.materies.item( {
					model: {
						matery:	param_model,
						module: _this.collection.modules.get({id: param_model.get('id') })
					} 
				});
				_this.$el.append( tmpView.render().$el );
			});*/
			this.collection.modules.each(function(param_model){
				var tmpView = new app.views.overview.item({
					model: {
						modules: param_model,
						matery : _this.collection.materies.get({module_id: param_model.get('id')}) 
					}
				});

				// console.log(param_model);

				_this.$el.append( tmpView.render().$el );
			});
		
		}
		
	});
})(jQuery);