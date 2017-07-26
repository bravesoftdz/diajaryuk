/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.materies = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/materies',
		
		initialize(){
			console.log('hai im model')
			this.getModule();
		},	
		getModule(callback){
			var _this = this;
			var module_id = this.get('module_id')
			app.collections.modules.fetch({
				success(col, response, opt){
					var module = col.get({id: module_id})
					_this.set({module: module.toJSON() }) ;
					// console.log('im matery modal', this);
					// console.log(callback)
					if(typeof(callback) !== "undefined"){
						callback(module);
					}

				},
				error(err){
					console.log(err)
				}
			})
		}
	});
})();
