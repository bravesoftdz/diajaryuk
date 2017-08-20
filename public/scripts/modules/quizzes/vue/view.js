(function() {
	// body...
	app.vue.quizzes = {
		template: '#quiz-template',
		props: ['id'], //diisi oleh router
		data(){
			return {
				quizzes: '',//quizzes.toJSON(), //nanti pake where
				answer:'',
			}
		},

		created(){
			this.fetchData()
		},

		methods:{
			fetchData(){
				var _this = this;
				objectData = {
					module_id: this.id
				}
				app.collections.quizzes.fetch({
					data:objectData,
					success(quizzes, response, opt){
						_this.quizzes = quizzes.toJSON();
					},
					error(quizzes, response, opt){
						console.log(quizzes, response, opt)
					}
				})
			},
			onClick(){
				console.log(quizzes.toJSON())
			},
			nextOnClick(){
				console.log('nextOnClick')
			}
		}
	}

})();