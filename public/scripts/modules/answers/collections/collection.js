var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var answers = Backbone.Collection.extend({
		model: app.models.answers,
		url: app.url + 'answers',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.answers = new answers();
	
})();
