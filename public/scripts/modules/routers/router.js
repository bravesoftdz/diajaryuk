var app = app || {};
app.vue = app.vue || {};

(function(){

	app.vue.router = new VueRouter({
		routes: [
			{
				path: "/", 
				component: Vue.component("user-module-item")
			 },
			{
				path: "/module/:id",
				component: app.vue.materies,//app_materies,//Vue.component("app-materies"),
				props:true
			},

			{
				path: "/matery/:id",
				component: app.vue.matery,//Vue.component("app-materies"),
				props:true
			},

			{
				path: "/matery/:id/try_out",
				component: app.vue.try_outs,//Vue.component("app-materies"),
				props:true
			},

			{
				path: "/module/:id/quiz",
				component: app.vue.quizzes,//Vue.component("app-materies"),
				props:true
			},

		]
	});

	app.vue.user = new Vue({
		el: "#play",
		router: app.vue.router,
		/*data(){ 
			return {
				modules: modules.toJSON(),
				materies: materies.toJSON(),
				comments: comments.toJSON(),
				editorOption:{

				}
			}
		},*/
		

	})

})();