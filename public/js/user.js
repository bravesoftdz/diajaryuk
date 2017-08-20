var app = app || {} ;
app.vue = app.vue || {} ;

console.log('im user js');

// (function(){
// 'use strict';
app.collections.modules.fetch({
success(modules, response, opt){

app.collections.materies.fetch({
success(materies, response, opt){

app.collections.comments.fetch({
success(comments, response, opt){
app.collections.questions.fetch({
success(questions, response, opt){
app.collections.try_outs.fetch({
success(try_outs, response, opt){

app.collections.answers.fetch({
success(answers, response, opt){

app.collections.quizzes.fetch({
success(quizzes, response, opt){

	app.collections.stages.fetch({
		success(stages, response, opt){
			// Vue.use(VueQuillEditor);

			//user-module-item
			/*Vue.component('user-module-item',{
				template: '#user-module-item-template',
				props: ['user_id'],
				data(){
					var _this = this;
					modules.each(function(module){
						var tmp = stages.where({
							user_id: _this.user_id,
							module_id: module.id
						});

						var isEnable = true;
						if(tmp.length !== 0){
							isEnable = true;
						}
						module.set({isEnable: isEnable})
					});

					return {
						modules: modules.toJSON(),
						stages: stages.toJSON(),

					}
				},
				methods: {
					cardOnClick(module){
						window.location = "#/module/"+module.id;
						console.log(module)
					},
					printPDF(){
						console.log("printPDF")
						window.location = "/certificate/";		
					}
				},
			});*/

			//app-materies template
			/*var app_materies = {
				template: '#materies-template',
				props: {
					id: '',
				},
				data(){
					var _this = this;
					var materies_per_module = materies.where({
						module_id: parseInt(_this.id)
					})

					_.map(materies_per_module, function(model){
						return model.toJSON()
					})

					materies.each(function(matery){
						var tmp = stages.where({
							user_id: _this.user_id,
							matery_id: matery.id
						});

						var isEnable = true;
						if(tmp.length !== 0){
							isEnable = true;
						}
						matery.set({isEnable: isEnable})
					});


					return {
						materies: materies.toJSON(),
						materies_per_module: materies_per_module,
						quiz_link: '',
					}
				},
				methods:{
					cardOnClick(matery){
						// console.log(matery)
						app.vue.router.push("/matery/"+matery.id)
					},
					quizOnClick(){
						app.vue.router.push("/module/"+this.id+"/quiz")
					}
				}
			};*/

			
			/*app.vue.matery = {
				template: '#matery-template',
				props: {
					id: '', 
					matery: {
						default:function(){
							return materies.get({id: this.id }).toJSON() 
						}
					},
					materies_per_module:'',
				},
				data(){
					return {
						show_comments:false,

						// comments: comments.toJSON(),
					}
				},
				
				methods:{
					cardOnClick(matery){
						console.log(matery, this.id )

					},
					commentOnClick(){
						var _this = this;
						_this.show_comments = !_this.show_comments;	
						
					},
					nextOnClick(){
						var _this = this;
						
						var try_out = try_outs.where({
							matery_id: parseInt(_this.id)
						})

						//check apakah try_out dengan matery.id terkait ada,
						if(try_out.length !== 0){
							//jika ada, masuk ke try out
							// masuk ke link matery/{id}/try_out
							app.vue.router.replace('/matery/'+this.id+'/try_out')
						}else{
							//jika tidak, masuk ke matery.id selanjutnya

							
						}

						console.log(try_out, try_outs, this.matery_id)



					},

				}
			};*/



			/*app.vue.quizzes = {
				template: '#quiz-template',
				props: ['id'], //diisi oleh router
				data(){
					return {
						quizzes: quizzes.toJSON(), //nanti pake where
						answer:'',
					}
				},
				methods:{
					onClick(){
						console.log(quizzes.toJSON())
					},
					nextOnClick(){
						console.log('nextOnClick')
					}
				}
			}*/

			/*app.vue.try_outs = {
				template: "#tryout-template",
				props:['id', "comments" ],
				data(){

					var try_out = try_outs.where({matery_id: parseInt(this.id) });
					try_out = try_out[0].toJSON()
					console.log( try_out );
					return {
						try_out: try_out,//try_outs.where({matery_id: parseInt(this.id) }),
						answer: '',
						show_comments:false
					}		
				},
				methods:{
					nextOnClick(){
						console.log(this.answer, this.try_out )
						var answer = answers.where({question_id: this.try_out.question_id })
						answer = answer[0].toJSON();
						console.log(answer)
						
						//cek jawaban yang dipilih dengan jawaban yang benar.
						if(this.answer == answer.answer){
							//alert betul
							alert("good job!")
							

						}else{
							//alert bahwa salah
							alert("you're wrong")
							// go back to matery view

						}

					},
					commentOnClick(){
						// console.log("show_comments")
						this.show_comments = !this.show_comments;
					}
				}

			}*/
			
			
			
			/*app.vue.comments = {
				template: "#comments-template",
				props: ['matery_id', 'try_out_id','user_id', 'username'],
				data(){
					if(typeof(this.matery_id) !== "undefined"){
						var tmp = comments.where({matery_id: parseInt(this.matery_id)});
						console.log('matery_id', this.matery_id)
					}
					else if(typeof(this.try_out_id) !== "undefined"){
						var tmp = comments.where({try_out_id: parseInt(this.try_out_id)});
						console.log('try_out_id', this.try_out_id)
					}
					for (i in tmp){
						tmp[i] = tmp[i].toJSON() 
					}
					console.log(tmp);
					return {
						editorOption:{
							theme: "snow",
							modules: {
					            toolbar: [
					              [{ 'size': ['small', false, 'large'] }],
					              ['bold', 'italic'],
					              [{ 'list': 'ordered'}, { 'list': 'bullet' }],
					              ['link', 'image']
					            ]
					        }
						},
						comments: tmp,
						newComment: {
							user_id:'',
							matery_id: "",
							try_out_id:"",
							comment:'',
						}
					}
				},
				methods:{
					getAll(params){
						_this = this;
						
						if(typeof(this.matery_id) !== "undefined"){
							var tmp = {matery_id: _this.matery_id}//comments.where({matery_id: parseInt(this.id)});
							console.log('matery_id')
						}
						if(typeof(this.try_out_id) !== "undefined"){
							var tmp = {try_out_id: this.try_out_id}//comments.where({try_out_id: parseInt(this.try_out_id)});
							console.log('try_out_id')
						}
						comments.fetch({
							data: tmp,
							success(col, response, opt){
								_this.comments = col.toJSON();
								
							},
							error(err){
								console.log(err);
								alert(err)
							}
						})
					
					},
					sendComment(matery_id){
						if(this.newComment.comment == ""){
							alert('you need to add comment')
							return false;
						}

						//this.id & this.user_id sudah diisi di template, jd ketika fungsi ini dipanggil
						// value nya sudah ada. 
						this.newComment.matery_id = this.matery_id;
						this.newComment.try_out_id = this.try_out_id;
						this.newComment.user_id = this.user_id;

						console.log("sendComment", this.newComment );
						var _this = this;

						comments.create(this.newComment,{
							success(col, response, opt){
								
								_this.getAll(col)
								console.log("berhasil menyimpan")
								// app.vue.matery.comments.push(_this.newComment);

								_this.newComment = {
									user_id:'',
									matery_id: "",
									try_out_id:"",
									comment:'',
								}
							},
							error(err){
								console.log(err)
								alert(err)
							}
						});

					},
					
				},
			}
			Vue.component('app-comments', app.vue.comments )*/

			/*app.vue.router = new VueRouter({
				routes: [
					{
						path: "/", 
						component: Vue.component("user-module-item")
					 },
					{
						path: "/module/:id",
						component: app.vue.materies,//app_materies,//Vue.component("app-materies"),
						props:true
					},

					{
						path: "/matery/:id",
						component: app.vue.matery,//Vue.component("app-materies"),
						props:true
					},

					{
						path: "/matery/:id/try_out",
						component: app.vue.try_outs,//Vue.component("app-materies"),
						props:true
					},

					{
						path: "/module/:id/quiz",
						component: app.vue.quizzes,//Vue.component("app-materies"),
						props:true
					},

				]
			});*/

			/*app.vue.user = new Vue({
				el: "#play",
				router: app.vue.router,
				data(){ 
					return {
						modules: modules.toJSON(),
						materies: materies.toJSON(),
						comments: comments.toJSON(),
						editorOption:{

						}
					}
				},

			})*/
		},
		error(){
			console.log('stages error');
		}
	})

},
error(quizzes, response, opt){
	console.log(quizzes, response, opt)
	alert('error quizzes')
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
},
error(err){
console.log(err)
}
});




},
error(err){
console.log(err)
alert(err)
}
});


// console.log(app.vue.comments)

},
error(err){
console.log(err)
}
})


},
error(err){
console.log(err);
alert(err);
}
})


// });