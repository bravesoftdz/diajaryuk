/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};
app.views.overview = app.views.overview || {};

(function ($) {
	'use strict';

	app.views.overview.item = Backbone.View.extend({
		tagName: 'tr',
		initialize: function(){
			this.render();
		},
		render: function(){
			var _this = this;
			var template = _.template( $('#course_item').html() );
			this.$el.html( template({
				modules: this.model.modules.toJSON(),
			}) );
			return this;
		}
		
	});
})(jQuery);