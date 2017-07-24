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


app.collections.materies.fetch({
	success(materies,response,opt){

		app.collections.questions.fetch({
			success(questions,response,opt){
				
				app.collections.try_outs.fetch({
					success(try_outs,response,opt){

						Vue.component('try_out-item',{
							template: '#try_out-item-template',
							props: [ 'id','question', 'materi', 'try_out', 'try_outs' ],
							methods: {
								editOnClick: function(try_out){
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
									try_outs.fetch().then((response)=>{
										_this.try_outs = response.result ;
									});
								},
								store(){
									console.log(this.newTryOut);
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

								}
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

	},
	error(err){
		console.log(err)
	}
})


app.collections.materies.fetch({
	success(materies, response, opt){
		app.collections.modules.fetch({
			success(modules,response, opt){

				var quill = new Quill('#content', {
		        	theme: 'snow'
		        });

		        Vue.component('try_out-item',{
							template: '#try_out-item-template',
							props: [ 'id','question', 'materi', 'try_out', 'try_outs' ],
							methods: {
								editOnClick: function(try_out){
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
								},
								deleteOnClick: function(try_out){
									
									/*var _this = this;
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
									})*/
									
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