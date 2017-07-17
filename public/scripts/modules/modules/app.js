var app = app || {} ;
app.vue = app.vue || {} ;

app.collections.modules.fetch({
	success: function(collection, response, opt){

		Vue.component('module-item',{
			template: '#module-item-template',
			props: ['id', 'name', 'module', 'modules' ],
			methods: {
				editOnClick: function(module){
					console.log('edit clicked');
				},
				deleteOnClick: function(module){
					
					var _this = this;
					collection.get({id:this.id}).destroy({
						success: function(){
							app.vue.modules.modules.splice(module.id -1 , 1);
						},
						error: function(err){
							console.log('error has occured',err)
						}
					});
					
				}
			},
		});


		app.vue.modules = new Vue({
			el: '#item-place',
			data: {
				modules: collection.toJSON(),
			},
			watch: {
				modules(newValue, oldValue){
					console.log(newValue, oldValue)
				},
			}
		});

		app.vue.modules.create = new Vue({
			el: '#modal-template',
			data: {
				modules: collection.toJSON()
			},
			
		});

	}
});


