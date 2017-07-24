var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var answers = Backbone.Collection.extend({
		model: app.models.answers,
		url: 'http://localhost/diajaryuk/public/api/answers',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.answers = new answers();
	
})();
