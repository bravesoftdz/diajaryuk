/*global Backbone */
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
			new app.views.createView({el: $("#materies") });
		}

	});

	app.Router = new Router();
	Backbone.history.start();
})();
