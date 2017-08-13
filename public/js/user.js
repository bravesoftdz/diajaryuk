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

												Vue.use(VueQuillEditor);

												//user-module-item
												Vue.component('user-module-item',{
													template: '#user-module-item-template',
													// props: ['id', 'name', 'module', 'modules' ],
													props:{
														modules:{
															default: function(){
																return modules.toJSON()
															} 
														}
													},
													methods: {
														cardOnClick(module){
															window.location = "#/module/"+module.id;
														},
														printPDF(){
															console.log("printPDF")
															window.location = "/certificate/";		
														}
													},
												});

												//app-materies template
												var app_materies = {
													template: '#materies-template',
													props: {
														id: '',
														materies:{
															default:function(){
																return materies.toJSON()
															}
														}
													},
													methods:{
														cardOnClick(matery){
															// console.log(matery)
															app.vue.router.push("/matery/"+matery.id)
														}
													}
												};

												/*var */
												app.vue.matery = {
													template: '#matery-template',
													props: {
														id: '',
														matery: {
															default:function(){
																return materies.get({id: this.id }).toJSON()
															}
														},
													},
													data(){
														return {
															show_comments:false,
															comments: comments.toJSON(),
														}
													},
													
													methods:{
														cardOnClick(matery){
															console.log(matery, this.id )

														},
														commentOnClick(){
															var _this = this;
															comments.fetch({
																data:{
																	matery_id: this.matery.id
																},
																success(comments, response, opt){
																	_this.show_comments = !_this.show_comments;
																	// console.log(comments);
																	this.comments = comments.toJSON();
																	console.log(this.comments)
																},
																error(err){
																	console.log(err);
																	alert(err);
																}
															})
															// console.log(this.comments)
														},
														nextOnClick(){
															console.log('nextOnClick');
															var _this = this;
															// masuk ke link matery/{id}/try_out
															app.vue.router.replace('/matery/'+this.id+'/try_out')

															//muncul tampilan jika success

															//jika tidak ada makan kembali ke ke module view
														},

													}
												};


												var app_try_out = {
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
																//jika masih ada matery yang belum, go back to matery view
																/*if(){

																}else{
																//jika sudah tidak ada, kembali ke module
																	
																}*/

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

												}
												
												var bus_comment = new Vue();

												/*var */
												app.vue.comments = {
													template: "#comments-template",
													props: ['id','comments','username'], /*{
														id: '',
														comments: { //sama aja kaya [] array
															default(){
																return comments.toJSON();
															}
														}
														comments:''
													}*/
													/*data(){
														return {
															comments: comments.toJSON()
														}
													}*/
												};

												/*var */
												app.vue.comment = {
													template: "#comment-template",
													props: ['id','user_id', 'username']/*{
														id: '',
														user_id:'',
														username:'', //ini akan bermasalah, karena dapat dari Auth bkn ambil dari API users

													}*/,
													data(){
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
															comments: comments.where({matery_id: this.id }) ,//comments.toJSON(),
															newComment: {
																user_id:'',
																matery_id: "",
																comment:'',
															}
														}
													},
													methods:{
														getAll(params){
															_this = this;
															//kalau params diset, langsung saja refer ke paramas, kalau tidak, fetch ulang
															/*if( typeof(params) !== "undefined"){
																_this.comments = params.toJSON(); //bukan this tp harus ganti dari parentnya.
																app.vue.matery.comments = params.toJSON();
																console.log( "success getAll" , app.vue.matery.comments );
															}else{*/
																
																comments.fetch({
																	success(col, response, opt){
																		_this = col.toJSON();
																		// app.vue.matery.comments = col.toJSON();
																		// bus_comment.$emit('getAll', this.comments )
																		// console.log( "success getAll", app.vue.matery.comments );
																		app.vue.comments.comments = col.toJSON();
																		app.vue.matery.comments = col.toJSON();
																		var data = col.toJSON();
																		// console.log(app.vue.matery.comments);
																		bus_comment.$emit('id-selected', data);
																	},
																	error(err){
																		console.log(err);
																		alert(err)
																	}
																})
															/*}*/

														},
														sendComment(matery_id){
															if(this.newComment.comment == ""){
																alert('you need to add comment')
																return false;
															}

															//this.id & this.user_id sudah diisi di template, jd ketika fungsi ini dipanggil
															// value nya sudah ada. 
															this.newComment.matery_id = this.id;
															this.newComment.user_id = this.user_id;

															console.log("sendComment", this.newComment );
															var _this = this;

															comments.create(this.newComment,{
																success(col, response, opt){
																	
																	_this.getAll(col)
																	console.log("berhasil menyimpan")
																	app.vue.matery.comments.push(_this.newComment);

																	_this.newComment = {
																		user_id:'',
																		matery_id: "",
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


												
												Vue.component('app-comment', app.vue.comment )
												Vue.component('app-comments', app.vue.comments )

												app.vue.router = new VueRouter({
													routes: [
														{
															path: "/", 
															component: Vue.component("user-module-item")
														 },
														{
															path: "/module/:id",
															component: app_materies,//Vue.component("app-materies"),
															props:true
														},

														{
															path: "/matery/:id",
															component: app.vue.matery,//Vue.component("app-materies"),
															props:true
														},

														{
															path: "/matery/:id/try_out",
															component: app_try_out,//Vue.component("app-materies"),
															props:true
														},

													]
												});

												app.vue.user = new Vue({
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
													},/*
													components: {
														"app-materies": app_materies,
														"app-matery": app.vue.matery,
														"app-comments": app.vue.comments,
													},*/

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