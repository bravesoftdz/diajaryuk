/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.questions = Backbone.Model.extend({
		urlRoot: app.url + 'questions',//'http://localhost/diajaryuk/public/api/questions',
		initialize(){
			this.on('fetch', this.onFetch , this );
		},
		onFetch(){
			console.log('onFetch called')
		},
		getAnswer(callback){
			var id = this.get('id');
			var _this = this;
			app.collections.answers.fetch({
				success(col, response, opt){
					var new_col = col.models.filter(function(obj){
						// console.log(obj.get('question_id') == id)
						return obj.get('question_id') == id; 
					})
					// console.log( col.get({question_id: id}) , id )
					// _this.answer = col.get({question_id: id});
					// console.log({col, response, opt} , new_col)
					_this.answer = new_col[0];
					callback( new_col[0] ) 
					
				},
				error(err){
					console.log(err)
				}
			})
		},
		postAnswer(obj){
			app.collections.answers.create(
				obj,{
				success(col, response, opt){
					console.log('answers saved', {
						col, response, opt
					})
				},
				error(err){
					console.log(err)
				}
			});
		}

	});
})();
