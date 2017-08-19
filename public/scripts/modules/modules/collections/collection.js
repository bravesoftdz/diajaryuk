var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var modules = Backbone.Collection.extend({
		model: app.models.modules,
		url: app.url + 'modules',//'http://localhost/diajaryuk/public/api/modules',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.modules = new modules();
	
})();
