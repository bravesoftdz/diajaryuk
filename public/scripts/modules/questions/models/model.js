/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.questions = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/questions',
		initialize(){

		},
		getAnswers(question_id){
			var id = this.get('id');
			var _this = this;
			app.collections.answers.fetch({
				success(col, response, opt){
					console.log( col.get({question_id: id}) , id )
					_this.answer = col.get({id: id}); 
					return col.get({id: id})
				},
				error(err){
					console.log(err)
				}
			})
		},

	});
})();
