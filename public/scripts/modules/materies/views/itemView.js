/*global Backbone, jQuery, _, ENTER_KEY */
var app = app || {};
app.views = app.views || {};
app.views.materies = app.views.materies || {};

(function ($) {
	'use strict';

	app.views.materies.item = Backbone.View.extend({
		tagName: 'tr',
		className: 'itemView',
		initialize: function(){
			// console.log(this.model);
			// this.render();
			// this.bindEvents();
		},
		render: function(){
			var _this = this;
			var temp = $('#materies_item').html();
			var template = _.template( temp );
			// console.log(this.events);
			this.$el.html( template({
				module: _this.model.module.toJSON(),
				data: _this.model.toJSON()
			}) );
			
			// this.bindEvents();

			return this;
		},
		bindEvents: function(){
			this.listenTo( this.model, 'destroy' , this.remove() );
			this.listenTo( this.model, 'change' , this.render() );
				
		},
		events: {
			'click .btn-success': 'btnEditOnClick',
			'click .btn-danger'	: 'btnDeleteOnClick',
			
		},
		btnEditOnClick:function(){
			console.log( "on edit",this.model);
			var id = this.model.get('id');
			app.Router.navigate('create/'+id , true);


		},
		btnDeleteOnClick: function(){
			console.log( "on Delete",this.model);
			this.model.destroy();
			this.remove();
		},
		
	});
})(jQuery);