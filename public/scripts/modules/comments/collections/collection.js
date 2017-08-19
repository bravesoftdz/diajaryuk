var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var comments = Backbone.Collection.extend({
		model: app.models.comments,
		url: app.url + 'comments',//'http://localhost/diajaryuk/public/api/comments',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.comments = new comments();
	
})();
