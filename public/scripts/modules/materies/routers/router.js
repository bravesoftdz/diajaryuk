
var app = app || {};
app.routers = app.routers || {};
(function () {
	'use strict';
	var Router = Backbone.Router.extend({
		routes: {
			''			: 'index',
			'create'	: 'onCreate'
		},
		index: function(){
			console.log('router called');
			new app.views.parentView({el: $("#materies") });
			
		},
		onCreate: function(){
			try{
				app.collections.modules.fetch({
					success:function(response, models, opt){

						new app.views.createView({
							el: $("#materies"),
							collection: {
								modules: response,
							}
						});

					    var quill = new Quill('#content', {
				            theme: 'snow'
				        });
				    
					},
					error: function(){

					}
				});
					
			}catch(err){
				console.log(err);
				alert(err);
			}
			
		}

	});

	app.Router = new Router();
	Backbone.history.start();
})();
