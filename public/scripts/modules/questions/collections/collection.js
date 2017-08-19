var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var questions = Backbone.Collection.extend({
		model: app.models.questions,
		url: app.url + 'questions',//'http://localhost/diajaryuk/public/api/questions',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.questions = new questions();
	
})();
