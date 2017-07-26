var app = app || {} ;
app.vue = app.vue || {} ;

console.log('im user js');

// (function(){
// 'use strict';
app.collections.modules.fetch({
	success(modules, response, opt){

		app.collections.materies.fetch({
			success(materies, response, opt){

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
							window.location = "#/matery/"+module.id;
						}
					},
				});

				/*Vue.component('app-materies',{
					template: '#materies-template',
					props: ['id','materies'],
					data(){
						return {
							materies: materies.toJSON()
						}
					},
					watch:{
						"$route.params"(to, from){
							console.log({to,from})
						}
					}
				});*/

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
							console.log(matery)
						}
					}
				}				
				
				app.vue.router = new VueRouter({
					routes: [
						{
							path: "/", 
							component: Vue.component("user-module-item")
						 },
						{
							path: "/matery/:id",
							component: app_materies,//Vue.component("app-materies"),
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

						}
					},
					component: {
						"app-materies": app_materies,
					}
				})

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