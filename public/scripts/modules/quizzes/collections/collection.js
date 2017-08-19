var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var quizzes = Backbone.Collection.extend({
		model: app.models.quizzes,
		url: app.url + 'quizzes',//'http://localhost/diajaryuk/public/api/quizzes',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.quizzes = new quizzes();
	
})();
