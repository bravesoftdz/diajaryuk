var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var stages = Backbone.Collection.extend({
		model: app.models.stages,
		url: 'http://localhost/diajaryuk/public/api/stages',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.stages = new stages();
	
})();
