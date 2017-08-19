var app = app || {};
app.collections = app.collections || {};

(function () {
	'use strict';

	var try_outs = Backbone.Collection.extend({
		model: app.models.try_outs,
		url: app.url + 'try_outs',//'http://localhost/diajaryuk/public/api/try_outs',
		parse: function(response){
			return response.result;
		},		

	});

	app.collections.try_outs = new try_outs();
	
})();
