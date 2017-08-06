/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.try_outs = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/try_outs',
		initialize(){
			this.getQuestion();
			this.getMatery();
		},
		getQuestion(){
			var _this = this;
			var question_id = this.get('question_id')
			var question = app.collections.questions.get({id: question_id});
			if(typeof(question) !== "undefined" ){
				this.set({question: question.toJSON()})
			}else{
				
				app.collections.questions.fetch({
					success(col, response, opt){
						var question = col.get({id: question_id})
						_this.set({question: question.toJSON() }) ;
						// console.log('im model of try_out', _this);
					},
					error(err){
						console.log(err)
					}
				})
			}

		},
		getMatery(){
			var _this = this;
			var matery_id = this.get('matery_id')
			var matery = app.collections.materies.get({id: matery_id});
			this.set({matery: matery.toJSON()})
			/*app.collections.materies.fetch({
				success(col, response, opt){
					var matery = col.get({id: matery_id})
					_this.set({matery: matery.toJSON() }) ;
					console.log('im model of try_out', _this);
				},
				error(err){
					console.log(err)
				}
			})*/	
		}
	});
})();
