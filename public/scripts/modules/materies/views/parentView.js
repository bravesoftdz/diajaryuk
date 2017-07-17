/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};

(function ($) {
	'use strict';

	app.views.parentView = Backbone.View.extend({
		
		initialize: function(){
			this.render();
		},
		render: function(){
			var template = _.template( $('#materies_index').html() );
			this.$el.html(template);
			// this.$el.append('<div></div>')

			var child = new app.views.materies.list({
				el: this.$("#listPlace"),
				collection: {
					materies: app.collections.materies,
					modules	: app.collections.modules
				} 
			});
			
			return this;
		}
	});
})(jQuery);