import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

const page="./components/admin/";

const MyRouter = new VueRouter({
  	routes:[
	    { path: '/', redirect:"/login"},
	    { path: '/login', component: require(page+'login.vue'), meta:{title:"Login"}},
	    { path: '/home', component: require(page+'home.vue'), meta:{title:"Home"}},
	    { path: '/profile', component: require(page+'me.vue'), meta:{title:"Mi perfil"}},
	    //Usuarios
	    { path: '/users', component: require(page+'users/index.vue'), meta:{title:"Usuarios"}},
	    { path: '/users/edit', component: require(page+'users/edit.vue'), meta:{title:"Editar"}},//Cuando no envian parametro
	    { path: '/users/edit/:id', component: require(page+'users/edit.vue'), meta:{title:"Editar"}},//Con parametro
	    //Roles
	    { path: '/roles', component: require(page+'configuration/roles.vue'), meta:{title:"Roles"}},
	    { path: '/roles/edit/:id', component: require(page+'configuration/permissions.vue'), meta:{title:"Editar"}},
	  ]
});

//Titulos del website
import VueDocumentTitlePlugin from "vue-document-title-plugin";
Vue.use(VueDocumentTitlePlugin, MyRouter,
	{ defTitle: "Holy - Code", filter: (title)=>{ return title+" - Holy - Code"; } }
);

// export {routes};
export default MyRouter;
