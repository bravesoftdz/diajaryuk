/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.modules = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/modules',
		/*parse: function(response){
			return response.result;
		},*/
	});
})();
