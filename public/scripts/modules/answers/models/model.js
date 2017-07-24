/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.answers = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/answers',
		/*parse: function(response){
			return response.result;
		},*/
	});
})();
