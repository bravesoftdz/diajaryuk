/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.materies = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/materies',
		/*parse: function(response){
			return response.result;
		},*/
	});
})();
