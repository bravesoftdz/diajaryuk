var app = app || {} ;
app.vue = app.vue || {} ;

//modules
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


//Questions
app.collections.questions.fetch({
	success(collection, response, opt){

		Vue.component('question-item',{
			template: '#question-item-template',
			props: [ 'id','name', 'answer', 'question', 'questions' ],
			methods: {
				editOnClick: function(question){
					var _this = this;
					collection.fetch({
						success(col, response, opt){
							
							var tmp = col.get({id: question.id})
							console.log(tmp)

							app.vue.questions.newQuestion = tmp.toJSON();
							
							tmp.getAnswer(function(jawaban){
								app.vue.questions.answer = jawaban.get('answer');
								$("#create-item").modal('toggle');
							});
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
				answer: '', 
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
					if(_this.answer == ""){
						alert('you need to choose right answer first!')
						return false;
					}
					if( this.newQuestion.question == '' ||  this.newQuestion.answer_1 == '' || this.newQuestion.answer_2 == '' || this.newQuestion.answer_3 == '' || this.newQuestion.answer_4 == ''  ){
						alert('you need to fulfill the whole data first!')
						return false;
					}
					collection.create(
						this.newQuestion,
						{
							success(col, response, opt){
								console.log('success create',{
									col,response,opt
								});

								console.log(_this.answer)
								
								var id = response.result.id ;//col.get('id');
								
								col.getAnswer(function(jawaban){
									if(typeof(jawaban) == "undefined"){ //new
										console.log({
											question_id: id,
											answer: _this.answer
										})

										//untuk bisa update postAnswer ini kita harus kirim ID.
										col.postAnswer({
											question_id: id,
											answer: _this.answer
										});

									}else{ // edit

										col.postAnswer({
											id: jawaban.get('id'),
											question_id: id,
											answer: _this.answer
										});										

									}
								})

								

								
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
					this.answer ='';
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

//try outs
app.collections.materies.fetch({
	success(materies,response,opt){

		app.collections.questions.fetch({
			success(questions,response,opt){
				
				app.collections.try_outs.fetch({
					success(try_outs,response,opt){
						// console.log(try_outs)

						Vue.component('try_out-item',{
							template: '#try_out-item-template',
							props: [ 'id','question', 'materi', 'try_out', 'try_outs' ],
							methods: {
								editOnClick: function(try_out){
									
									var model = try_outs.get({id: try_out.id})
									app.vue.try_outs.newTryOut = model.toJSON();
									$("#create-item").modal('toggle');
								},
								deleteOnClick: function(try_out){
									
									var _this = this;
									//hapus di local
									app.vue.try_outs.try_outs = app.vue.try_outs.try_outs.filter(function(obj){
										return obj.id !== try_out.id
									})

									//hapus di server
									try_outs.fetch({
										success(col, response, opt){
											col.get({id: try_out.id}).destroy({
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

						app.vue.try_outs = new Vue({
							el: '#try_out_place',
							data: {
								materies: materies.toJSON(),
								questions: questions.toJSON(),
								try_outs: try_outs.toJSON(),
								newTryOut: {
									matery_id: '',
									question_id:''
								}
							},
							methods:{
								getAll(){
									var _this = this;
									try_outs.fetch({
										success(col,response, opt ){

											col.each(function(model, index){
												model.getQuestion();
												model.getMatery();
											})

											_this.try_outs = col.toJSON()
										},
										error(err){
											console.log(err)
										}
									})
								},
								store(){
									console.log(this.newTryOut);
									var _this = this;
									try_outs.create(
										this.newTryOut,
										{
											success(){
												console.log('success')
												_this.getAll();
												$("#create-item").modal('toggle');
											},
											error(err){
												console.log(err);
												_this.getAll();
												$("#create-item").modal('toggle');
											}
									});

								},
								modalOnHide(){
									console.log('modalOnHide')
									this.newTryOut = {
										matery_id: '',
										question_id:''
									}
								}
							},
							mounted(){
								$("#create-item").on("hidden.bs.modal", this.modalOnHide);
							},


						});



					},
					error(err){
						console.log(err)
					}
				})

			},
			
			error(err){
				console.log(err)
			}			
		})

	},
	error(err){
		console.log(err)
	}
})

//MATERY
app.collections.materies.fetch({
	success(materies, response, opt){
		app.collections.modules.fetch({
			success(modules,response, opt){

				// console.log(materies)

				var quill = new Quill('#content', {
		        	theme: 'snow'
		        });

		        Vue.component('matery-item',{
					template: '#matery-item-template',
					props: [ 'id', 'title', 'content', 'module', 'matery', 'materies' ],
					methods: {
						editOnClick: function(matery){
							/*var _this = this;
							collection.fetch({
								success(col, response, opt){
									
									var tmp = col.get({id: question.id})
									console.log(tmp)

									app.vue.questions.newQuestion = tmp.toJSON();
									
									tmp.getAnswer(function(jawaban){
										app.vue.questions.answer = jawaban.get('answer');
										$("#create-item").modal('toggle');
									});
								},	
								error(err){
									console.log(err)
								}
							})*/
							materies.fetch({
								success(col,response,opt){
									var tmp = col.get({id: matery.id})
									app.vue.materies.newMatery = tmp.toJSON();
									$("#create-item").modal('toggle');
								},
								error(err){
									console.log(err)
								}
							})

						},
						deleteOnClick: function(matery){
							
							app.vue.materies.materies = app.vue.materies.materies.filter(function(obj){
								return obj.id !== matery.id
							})
							//fetch dulu untuk memastikan data bersangkutan sudah ada di materies lokal.
							materies.fetch({
								success(col, response, opt){
									col.get({id: matery.id}).destroy({
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

				app.vue.materies = new Vue({
					el: "#materies_place",
					data:{
						materies: materies.toJSON(),
						modules: modules.toJSON(),
						newMatery:{
							module_id:'',
							title:'',
							content:''
						}
					},
					methods:{
						getAll(){
							var _this = this;
							materies.fetch({
								success(col, response, opt){
									
									// var jumlah = col.models.length;
									// var tmp = [];

									/*col.each(function(model, index){
										model.getModule(function(newModel){
											tmp.push(newModel)
										})
										// console.log(tmp.length, col.length )
										if( col.length == tmp.length ){
											_this.materies = col.toJSON();
											console.log(col.toJSON() , _this.materies );
										}
									})*/

									/*col.models[jumlah-1].getModule(function(model){
										console.log('yg terakhir nyampe', col.toJSON() )
										_this.materies = col.toJSON();	
									});*/ //biar yang baru masuk duluan
									console.log( "getAll",col.toJSON() )
									_this.materies = col.toJSON();

								},
								error(err){
									console.log(err)
								}
							})
						},
						store(){

							var _this = this;
							materies.create(this.newMatery,{
								success(){
									_this.getAll();
									$('#create-item').modal('toggle');
								},
								error(err){
									console.log(err)
								}
							})

						},
						modalOnHide(){

							this.newMatery = {
								module_id:'',
								title:'',
								content:''
							}

						}
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
	},
	error(err){
		console.log(err)
	}
})

//Quizzes
app.collections.quizzes.fetch({
	success(quizzes, response, opt){
		app.collections.modules.fetch({
			success(modules, response, opt){

				app.collections.questions.fetch({
					success(questions, response,opt){

						Vue.component('quiz-item',{
							template: '#quiz-item-template',
							props: [ 'id','question', 'module', 'quiz', 'quizzes' ],
							methods: {
								editOnClick: function(quiz){
									
									var model = quizzes.get({id: quiz.id})
									if(typeof(model) !== "undefined" ){
										app.vue.quizzes.newQuiz = model.toJSON();
									}else{
										quizzes.fetch({
											success(col, response, opt){
												var model =	col.get({id: quiz.id})
												app.vue.quizzes.newQuiz = model.toJSON();
											},
											error(err){
												console.log(err)
											}
										})
									}
									$("#create-item").modal('toggle');
								},
								deleteOnClick: function(quiz){
									
									var _this = this;
									//hapus di local
									app.vue.quizzes.quizzes = app.vue.quizzes.quizzes.filter(function(obj){
										return obj.id !== quiz.id
									})

									//hapus di server
									quizzes.fetch({
										success(col, response, opt){
											col.get({id: quiz.id}).destroy({
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

						app.vue.quizzes = new Vue({
							el: '#quizzes_place',
							data: {
								modules: modules.toJSON(),
								questions: questions.toJSON(),
								quizzes: quizzes.toJSON(),
								newQuiz: {
									module_id: '',
									question_id:''
								}
							},
							methods:{
								getAll(){
									var _this = this;
									quizzes.fetch({
										success(col,response, opt ){

											col.each(function(model, index){
												model.getQuestion();
												model.getModule();
											})

											_this.quizzes = col.toJSON()
										},
										error(err){
											console.log(err)
										}
									})
								},
								store(){
									console.log(this.newQuiz);
									var _this = this;
									quizzes.create(
										this.newQuiz,
										{
											success(){
												console.log('success')
												_this.getAll();
												$("#create-item").modal('toggle');
											},
											error(err){
												console.log(err);
												_this.getAll();
												$("#create-item").modal('toggle');
											}
									});

								},
								modalOnHide(){
									console.log('modalOnHide')
									this.newQuiz = {
										module_id: '',
										question_id:''
									}
								}
							},
							mounted(){
								$("#create-item").on("hidden.bs.modal", this.modalOnHide);
							},


						});


					},
					error(err){
						console.log(err)
					}
				})


			},
			error(err){
				console.log(err)
			}

		})
	},
	error(err){
		console.log(err)
	}
})