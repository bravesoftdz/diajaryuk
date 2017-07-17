
var app = app || {};
app.routers = app.routers || {};
(function () {
	'use strict';
	var Router = Backbone.Router.extend({
		routes: {
			'overview'			: 'index',
			// 'create'	: 'onCreate',
			// 'create/:id': 'onEdit',
		},
		index: function(){
			new app.views.overview.list({
                el: $("#overview"),
                collection: {
                    modules: app.collections.modules,
                    materies: app.collections.materies
                }
            });
            console.log('im called');
		},
		onCreate: function(){
			try{
				app.collections.modules.fetch({
					success:function(response, models, opt){

						new app.views.createView({
							el: $("#materies"),
							collection: {
								modules: response,
								materies: app.collections.materies,
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
		},
		onEdit: function(id){
			//console.log(id);
			try{
				app.collections.modules.fetch({
					success:function(model, response, opt){
						app.collections.materies.fetch({
							success:function(model2, response2, opt2){

								new app.views.createView({
									el: $("#materies"),
									collection: {
										modules: model,
										// materies: app.collections.materies,
									},
									model: model2.get({id: id})
									 
								});

							    var quill = new Quill('#content', {
						            theme: 'snow'
						        });
							},
							error: function(err){
								console.log(err);
							}
						});
				    
					},
					error: function(err){
						console.log(err);
					}
				});
					
			}catch(err){
				console.log(err);
				alert(err);
			}
		}


	});

	app.userRouter = new Router();
	// Backbone.history.start();
})();
