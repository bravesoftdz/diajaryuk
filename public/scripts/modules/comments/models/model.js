/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.comments = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/comments',
		
		initialize(){
			// console.log('hai im model')
			// this.getModule();
		},	
		/*getModule(callback){
			var _this = this;
			var module_id = this.get('module_id')
			var module = app.collections.modules.get({id: module_id});
			if(typeof(module) !== "undefined"){
				console.log('!undefined')
				this.set({module: module.toJSON() })
			}else{
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
		}*/
	});
})();
