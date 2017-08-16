/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.stages = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/stages',
		/*parse: function(response){
			return response.result;
		},*/
	});
})();
