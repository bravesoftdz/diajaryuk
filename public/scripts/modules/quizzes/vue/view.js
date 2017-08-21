(function() {
	// body...
	app.vue.quizzes = {
		template: '#quiz-template',
		props: {
			id:'',
			quiz_index:{
				default(){
					return 0;
				}
			}
		}, //['id','quiz_index'], //diisi oleh router
		data(){

			//tmp biar ga error pas data belum nyampe
			var tmp = {
		      "id": 3,
		      "module_id": 27,
		      "question_id": 18,
		      "question": {
		        "id": 18,
		        "question_type": "PG",
		        "point": 0,
		        "question": "",
		        "answer_1": "",
		        "answer_2": "",
		        "answer_3": "",
		        "answer_4": ""
		      },
		      "answer": {
		        "answer": "8"
		      },
		      "index": 0,
		      "next_id": 4,
		      "prev_id": null
		    }

			return {
				quizzes: '',//quizzes.toJSON(), //nanti pake where
				quiz: tmp,
				answer:'',
				answers:[],
				right_answers:[],
				result:{
					score:0,
					benar:0,
					salah:0,
					total:0
				},
			}
		},

		created(){
			this.fetchData()
		},

		watch:{
			'$route': 'fetchData'
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
						_this.quizzes = quizzes;

						_this.quiz = quizzes.at(_this.quiz_index).toJSON()
						// console.log(_this.quiz)
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
				var _this = this;
				if(_this.quiz.next_index !== null ){
					//store jawaban, 
					_this.answers.push(_this.answer);
					//store jawaban yang benar
					_this.right_answers.push(_this.quiz.answer.answer);
										
					app.vue.router.replace('/module/'+_this.id+'/quiz/'+_this.quiz.next_index);
				}else{
					//input jawaban soal terakhir
					
					//0 = exist, -1 == doesn't exist
					if( _this.answers.indexOf(_this.answer) == -1){
						_this.answers.push(_this.answer);
					}

					if( _this.right_answers.indexOf(_this.quiz.answer.answer) == -1){
						
						_this.right_answers.push(_this.quiz.answer.answer);
					}

					//muncul nilai. store nilai //store stage module
					//evaluasi answers
					/*_this.answers.*/
					console.log(_this.answers, _this.right_answers)
					if( _this.answers.length == _this.right_answers.length){

						for (var i = 0; i < _this.answers.length; i++) {
							if(_this.answers[i] == _this.right_answers[i]){
								//jika jawaban benar.
								_this.result.benar = _this.result.benar + 1;
							}else{
								//jika jawaban salah
								_this.result.salah = _this.result.salah + 1;
							}
							
							// _this.result.total = _this.result.total + 1;
						}

						_this.result.total = _this.answers.length;
						_this.result.score = (_this.result.benar / _this.result.total) * 100;
					}

					if(_this.result.score > 60){
						//lulus //store ke stages
						//redirect ke menu modules
						alert('Contratulations! you pass the quiz!')
						app.vue.router.replace('/');
						console.log(_this.result)
					}else{
						//tidak lulus //go back to app.router.replace('/module/:id')
						app.vue.router.replace('/module/'+_this.id);
						alert('sorry you didn\'t pass the quiz, but hey! you can try again!')
						console.log(_this.result)
					}
					//mengosongkan kembali answers
					// _this.answers = [];
				}
			}
		}
	}

})();