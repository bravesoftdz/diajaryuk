/*global Backbone */
var app = app || {};
app.models = app.models || {};
(function () {
	'use strict';

	app.models.quizzes = Backbone.Model.extend({
		urlRoot: 'http://localhost/diajaryuk/public/api/quizzes',
		initialize(){
			this.getQuestion();
			this.getModule();
		},
		getQuestion(){
			var _this = this;
			var question_id = this.get('question_id')
			var question = app.collections.questions.get({id: question_id});
			if(typeof(question) !== "undefined" ){
				
				this.set({question: question.toJSON()})
			}else{
				app.collections.questions.fetch({
					success(questions, response, opt){
						var question = questions.get({id: question_id})
						console.log(question_id)
						_this.set({question: question.toJSON()})		 
					},
					error(err){
						console.log(err)
					}
				})
			}
			
		},
		getModule(){
			var _this = this;
			var module_id = this.get('module_id')
			var module = app.collections.modules.get({id: module_id});
			//if module == 'undefined' => fetch ulang.
			if( typeof(module) !=="undefined" ){ //sudah ada,

				this.set({module: module.toJSON()})
			}else{	//harus fetch ulang

				app.collections.modules.fetch({
					success(modules, response, opt){
						var module = modules.get({id: module_id})
						_this.set({module: module})
					},
					error(err){
						console.log(err)
					}
				})	
					
			}
		}
	});
})();
