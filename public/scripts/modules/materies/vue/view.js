var app = app || {};
app.vue = app.vue || {};

(function() {
	
	app.vue.materies = {
		template: '#materies-template',
		props: {
			id: '',
			/*materies:{
				default:function(){
					return materies.toJSON()
				}
			}*/
		},
		data(){
			var _this = this;
			return {
				materies: '',//materies.toJSON(),
				materies_per_module: '',//materies_per_module,
				_meta:'',
				quiz_link: '',
			}
		},
		created(){
			this.fetchData()
		},
		methods:{
			fetchData(){
				var _this = this;
				app.collections.stages.fetch({
					success(stages, response, opt){
						_this.stages = stages;

						var objectData = {module_id: _this.id}

						app.collections.materies.fetch({
							data: objectData,
							success(materies, response, opt){
								materies.each(function(module){
									// stages = stages.where({module_id: module.id});
									var tmp = _this.stages.where({
										user_id: _this.user_id,
										module_id: module.id
									});

									var isEnable = true;
									if(tmp.length !== 0){
										isEnable = true;
									}
									module.set({isEnable: isEnable})
								});

								_this.materies = materies.toJSON()
								_this._meta = response._meta;
								// console.log(_this.materies)
							},
							error(materies, response, opt){
								console.log(materies, response, opt)
							}
						})

					},
					error(stages, response, opt){
						console.log(stages, response, opt)
					}
				})
			},	
			cardOnClick(matery){
				app.vue.router.push("/matery/"+matery.id)
			},
			quizOnClick(){
				app.vue.router.push("/module/"+this.id+"/quiz")
			}
		}
	};
	
	app.vue.matery = {
		template: '#matery-template',
		props: {
			id: '',
			 
			/*matery: {
				default:function(){
					return this.materies.get({id: this.id }).toJSON() 
				}
			},*/
			materies_per_module:'',
		},
		data(){
			return {
				show_comments:false,
				materies: '',
				matery: '',
				try_outs: '',
				_meta:'',
				module_id:'',
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
				// alert('hia')
				app.collections.stages.fetch({
					success(stages, response, opt){
						_this.stages = stages;

						app.collections.materies.fetch({
							// data:objectData,
							success(materies, response, opt){
								materies.each(function(matery){
									// stages = stages.where({module_id: module.id});
									var tmp = _this.stages.where({
										user_id: _this.user_id,
										module_id: matery.id
									});

									var isEnable = true;
									if(tmp.length !== 0){
										isEnable = true;
									}
									matery.set({isEnable: isEnable})
								});

								_this.materies = materies; //.toJSON()
								_this.matery = materies.get({id: _this.id }).toJSON()
								_this._meta = response._meta
								console.log(_this.module_id)

								if(!_this.module_id){ //typeof(_this.module_id) == "undefined"
									console.log(_this.module_id)
									_this.module_id = _this.matery.module_id;
									var objectData = {module_id: _this.module_id}
									materies.fetch({
										data:objectData,
										success(materies, response, opt){
											_this.materies = materies; //.toJSON()
											_this.matery = materies.get({id: _this.id }).toJSON()
											_this._meta = response._meta;
											console.log(_this._meta, _this.matery)											
										},
										error(materies, response, opt){
											console.log(materies, response, opt)
										}										
									})
								}

								// console.log(_this._meta, _this.matery)

							},
							error(materies, response, opt){
								console.log(materies, response, opt)
							}
						})

					},
					error(stages, response, opt){
						console.log(stages, response, opt)
					}
				})

				app.collections.try_outs.fetch({
					success(try_outs,response,error){
						_this.try_outs = try_outs;
					},
					error(try_outs,response,error){
						console.log(try_outs,response,error)
					}
				})
			},
			cardOnClick(matery){
				console.log(matery, this.id )

			},
			commentOnClick(){
				var _this = this;
				_this.show_comments = !_this.show_comments;	
				
			},
			nextOnClick(){
				var _this = this;
				
				var try_out = this.try_outs.where({
					matery_id: parseInt(_this.id)
				})

				//check apakah try_out dengan matery.id terkait ada,
				if(try_out.length !== 0){
					//jika ada, masuk ke try out
					// masuk ke link matery/{id}/try_out
					app.vue.router.replace('/matery/'+this.id+'/try_out')
				}else{
					//jika tidak, masuk ke matery.id selanjutnya

					//jika this.matery.index < this._meta.count then this.matery.index++
					console.log(this.matery.index , this._meta.count)
					if(this.matery.index < this._meta.count){
						var index = this.matery.index;
						var next = this.materies.where({
							index: ++index
						})

						var nextId = next[0].get("id");
						console.log(next, index, nextId);
						app.vue.router.replace('/matery/'+nextId)	

					}else{
						alert('matery index == _meta.count')
					}
				}

				// console.log(try_out, this.try_outs, this.matery_id)



			},

		}
	};

})();