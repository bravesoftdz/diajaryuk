(function() {
	// body...
	app.vue.try_outs = {
		template: "#tryout-template",
		props:['id', "comments" ],
		data(){

			var tmp = {
		      "id": 2,
		      "matery_id": 4,
		      "question_id": 18,
		      "created_at": "2017-07-28 07:08:03",
		      "updated_at": "2017-07-28 07:08:03",
		      "question": {
		        "id": 18,
		        "question_type": "PG",
		        "point": 0,
		        "question": "",
		        "answer_1": "",
		        "answer_2": "",
		        "answer_3": "",
		        "answer_4": "",
		        "created_at": "2017-07-27 21:20:00",
		        "updated_at": "2017-07-27 21:20:00"
		      },
		      "answer": {
		        "answer": "8"
		      }
		    }

			return {
				try_out: tmp,//try_outs.where({matery_id: parseInt(this.id) }),
				answer: '',
				_meta: '',
				show_comments:false
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
						
						_this._meta = response._meta;
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
					//jika masih ada matery yang belum, go back to matery view //materies view (/module/{id})
					console.log(this.try_out)
					if(this.try_out.materies.next_page_url !== null ){ //masih ada materi selanjutnya.
						
						$.ajax({
							url: this.try_out.materies.next_page_url,
							success(result){
								console.log(result.result)
								var next_matery_id = result.result[0].materies.data[0].id;
								app.vue.router.replace('/matery/'+next_matery_id);	
							},
							error(){
								console.log('error next matery_id')
							} 
						});	

						// var next_matery_id = this.try_out.materies.data.data[0].id;
						// app.vue.router.replace('/matery/'+next_matery_id);
					
					}else{
					//jika sudah tidak ada, kembali ke module
						
					}

				}else{
					//alert bahwa salah
					alert("you're wrong")
					// go back to matery view
					app.vue.router.replace('/matery/'+this.id)
				}

			},
			commentOnClick(){
				// console.log("show_comments")
				this.show_comments = !this.show_comments;
			}
		}
	}
})();