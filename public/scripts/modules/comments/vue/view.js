var app = app || {};
app.vue = app.vue || {};


(function() {
	// body...
	Vue.use(VueQuillEditor);

	app.vue.comments = {
		template: "#comments-template",
		props: ['matery_id', 'try_out_id','user_id', 'username'],
		data(){
			var _this = this;

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
				comments: '',//tmp,
				newComment: {
					user_id:'',
					matery_id: "",
					try_out_id:"",
					comment:'',
				}
			}
		},

		created(){
			this.fetchData();
		},

		methods:{
			fetchData(){
				var _this = this;
				if(typeof(this.matery_id) !== "undefined"){
					var objectData = {matery_id: this.matery_id }
				}
				else if(typeof(this.try_out_id) !== "undefined"){
					var objectData = {try_out_id: this.try_out_id}
				}

				app.collections.comments.fetch({
					data: objectData,
					success(comments,response, opt){
						_this.comments = comments.toJSON();
					},
					error(comments,response, opt){
						console.log(comments,response, opt)
					}
				})
			},
			getAll(params){
				var _this = this;
				
				if(typeof(this.matery_id) !== "undefined"){
					var tmp = {matery_id: _this.matery_id}//comments.where({matery_id: parseInt(this.id)});
					console.log('matery_id')
				}
				if(typeof(this.try_out_id) !== "undefined"){
					var tmp = {try_out_id: this.try_out_id}//comments.where({try_out_id: parseInt(this.try_out_id)});
					console.log('try_out_id')
				}

				app.collections.comments.fetch({
					data: tmp,
					success(col, response, opt){
						console.log(_this.comments)
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

				app.collections.comments.create(this.newComment,{
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

	Vue.component('app-comments', app.vue.comments )

})();