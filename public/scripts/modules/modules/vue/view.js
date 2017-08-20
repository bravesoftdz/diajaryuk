var app = app || {};
app.vue = app.vue || {};

(function(){
	
//user-module-item

//tnggal perbaiki backbone fetch nya
Vue.component('user-module-item',{
	template: '#user-module-item-template',
	props: ['user_id'],
	created(){
		this.fetchData()
	},
	data(){
		var _this = this;
		/*modules.each(function(module){
			// stages = stages.where({module_id: module.id});
			var tmp = stages.where({
				user_id: _this.user_id,
				module_id: module.id
			});

			var isEnable = true;
			if(tmp.length !== 0){
				isEnable = true;
			}
			module.set({isEnable: isEnable})
		});*/

		return {
			modules: '',//modules.toJSON(),
			stages: '',//stages.toJSON(),

		}
	},
	methods: {
		fetchData(){
			var _this = this;

			app.collections.stages.fetch({
				success(stages, response, opt){
					_this.stages = stages;
					app.collections.modules.fetch({
						success(modules, response, opt){
							modules.each(function(module){
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

							_this.modules = modules.toJSON()
							// console.log(_this.modules)
						},
						error(modules, response, opt){
							console.log(modules, response, opt)
						}
					})
				},
				error(stages, response, opt){
					console.log(stages, response, opt)
				}
			})

		},
		cardOnClick(module){
			window.location = "#/module/"+module.id;
			// console.log(module)
		},
		printPDF(){
			// console.log("printPDF")
			window.location = "/certificate/";		
		}
	},
});


})();

