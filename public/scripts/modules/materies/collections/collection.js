var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var materies = Backbone.Collection.extend({
		model: app.models.materies,
		url: app.url + 'materies',//'http://localhost/diajaryuk/public/api/materies',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.materies = new materies();
	
})();
