var app = app || {} ;
app.vue = app.vue || {} ;

app.collections.modules.fetch({
	success: function(collection, response, opt){

		Vue.component('module-item',{
			template: '#module-item-template',
			props: ['id', 'name', 'module', 'modules' ],
			methods: {
				editOnClick: function(module){
					console.log('edit clicked', module, this.modules );
					// var id = this.modules.filter
					collection.fetch({
						success(col, response, opt){
							
							var tmp = col.get({id: module.id})
							console.log(tmp)

							// app.vue.modules.newModule.name = tmp.get("name"); 
							app.vue.modules.newModule = tmp.toJSON();
						},	
						error(err){
							console.log(err)
						}
					})
				},
				deleteOnClick: function(module){
					
					var _this = this;
					//hapus di local
					app.vue.modules.modules = app.vue.modules.modules.filter(function(obj){
						// console.log(obj.id !== module.id )
						return obj.id !== module.id
					})

					//hapus di server
					collection.fetch({
						success(col, response, opt){
							col.get({id: module.id}).destroy({
								success(data, response, opt){
									console.log(response._meta.userMessage)
								},
								error(){

								}
							});
						},	
						error(err){
							console.log(err)
						}
					})
					
				}
			},
		});


		app.vue.modules = new Vue({
			el: '#item-place',
			data: {
				modules: collection.toJSON(),
				newModule:{
					// id: '',
					name: '',
					image_path: '',
				},
			},
			watch: {
				modules(newValue, oldValue){
					console.log(newValue, oldValue)
				},
			},
			ready: function(){
				console.log('ready called');
			},
			methods:{

				saveOnClick(){
					var _this = this;
					console.log(this.newModule )

					collection.create(
						_this.newModule,
						{
							success(collectionParam, response, opt){
								console.log({
									collectionParam:collectionParam,
									response: response,
									opt: opt,
									newModule: _this.newModule
								});

								if( typeof(_this.newModule.id) == "undefined"){
									app.vue.modules.modules.push(response.result);
								}else{
									
									collection.fetch({
										success(col, response, opt){
											app.vue.modules.modules = col.toJSON();
										},
										error(err){
											console.log(err)
										}
									})

								}

								_this.newModule = {
									// id: '',
									name: '',
									image_path: '',
								}
							},
							error(err){
								console.log(err)
							}
						}
					)
				},
			}

		});


	},
	error: function(err){
		console.log(err)
	}
});



app.collections.questions.fetch({
	success(collection, response, opt){

		Vue.component('question-item',{
			template: '#question-item-template',
			props: [ 'id','name', 'question', 'questions' ],
			methods: {
				editOnClick: function(question){
					// console.log('edit clicked', question);
					collection.fetch({
						success(col, response, opt){
							
							var tmp = col.get({id: question.id})
							console.log(tmp)

							app.vue.questions.newQuestion = tmp.toJSON();
							var answer = tmp.getAnswers();
							console.log(answer);
							$("#create-item").modal('toggle');
						},	
						error(err){
							console.log(err)
						}
					})
				},
				deleteOnClick: function(question){
					
					var _this = this;
					console.log(question)

					//hapus di local
					app.vue.questions.questions = app.vue.questions.questions.filter(function(obj){
						// console.log(obj.id !== module.id )
						return obj.id !== question.id
					})

					//hapus di server
					collection.fetch({
						success(col, response, opt){
							col.get({id: question.id}).destroy({
								success(data, response, opt){
									console.log(response._meta.userMessage)
								},
								error(err){
									console.log(err)
								}
							});
						},	
						error(err){
							console.log(err)
						}
					})
					
				}
			},
		});

		app.vue.questions = new Vue({
			el: "#question_place",
			data: {
				questions: collection.toJSON(),
				// answers: 
				newQuestion: {
					question_type: 'PG', //pilihan Ganda
					question: '',
					answer_1:'',
					answer_2:'',
					answer_3:'',
					answer_4:'',
					point:0,
				},

			},
			methods:{
				getAll(){
					var _this = this;
					collection.fetch({
						success(col, response, opt){
							_this.questions = col.toJSON();

						},	
						error(err){
							console.log(err)
						}
					})
				},
				store(){
					console.log(this.newQuestion)
					var _this = this;
					collection.create(
						this.newQuestion,
						{
							success(){
								console.log('success create');
								_this.getAll();
								$("#create-item").modal('toggle');
							},
							error(err){
								console.log(err);
								$("#create-item").modal('toggle');
							}
						}
					);

					this.newQuestion = {
						question_type: '',
						question: '',
						answer_1:'',
						answer_2:'',
						answer_3:'',
						answer_4:'',
						point:0,
					}
				},
				modalOnHide(){
					console.log('modal hidden');
					this.newQuestion = {
						question_type: 'PG', //pilihan Ganda
						question: '',
						answer_1:'',
						answer_2:'',
						answer_3:'',
						answer_4:'',
						point:0,
					}
				},
			},
			mounted(){

				$("#create-item").on("hidden.bs.modal", this.modalOnHide);
			}
		});

	},
	error(err){
		console.log(err)
	}
})

