/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.stages = Backbone.Model.extend({
		urlRoot: app.url + 'stages',//'http://localhost/diajaryuk/public/api/stages',
		/*parse: function(response){
			return response.result;
		},*/
	});
})();
