/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.try_outs = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/try_outs',

	});
})();
