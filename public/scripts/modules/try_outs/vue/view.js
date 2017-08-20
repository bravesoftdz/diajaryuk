(function() {
	// body...
	app.vue.try_outs = {
		template: "#tryout-template",
		props:['id', "comments" ],
		data(){

			/*var tmp = {
		      "id": 2,
		      "matery_id": 4,
		      "question_id": 18,
		      "created_at": "2017-07-28 07:08:03",
		      "updated_at": "2017-07-28 07:08:03",
		      "question": {
		        "id": 18,
		        "question_type": "PG",
		        "point": 0,
		        "question": "terbagi berapa bagian kah part of speech itu ?",
		        "answer_1": "8",
		        "answer_2": "2",
		        "answer_3": "4",
		        "answer_4": "1",
		        "created_at": "2017-07-27 21:20:00",
		        "updated_at": "2017-07-27 21:20:00"
		      },
		      "answer": {
		        "answer": "8"
		      }
		    }*/

			return {
				try_out: '',//try_outs.where({matery_id: parseInt(this.id) }),
				answer: '',
				show_comments:false
			}		
		},

		created(){
			this.fetchData()
		},

		methods:{
			fetchData(){
				// alert('fetchData try_outs')
				var _this = this;
				var objectData = {
					matery_id: this.id
				}

				app.collections.try_outs.fetch({
					data: objectData,
					success(try_outs, response, opt){
						var try_out = try_outs.toJSON()
						try_out = try_out[0]
						_this.try_out = try_out;
					},
					error(try_outs, response, opt){
						console.log(try_outs, response, opt)
					}
				})
			},
			nextOnClick(){
				
				if(this.answer == this.try_out.answer.answer){
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
})();