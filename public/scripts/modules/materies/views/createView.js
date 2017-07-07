/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};

(function ($) {
	'use strict';

	app.views.createView = Backbone.View.extend({
		
		initialize: function(){
			this.render();
		},
		render: function(){
			var template = _.template( $('#materies_create').html() );
			this.$el.html(template);
			return this;
		}
	});
})(jQuery);