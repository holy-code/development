/*
 *
 * Estos componentes estan presentes solo en el website
 *
 */

const page="./page/";

function plugin (Vue) {
	//Componentes llamados
  	Vue.component('my-header', require(page+'shared/header.vue'));
	Vue.component('my-footer', require(page+'shared/footer.vue'));
}

// Install by default if using the script tag
if (typeof window !== 'undefined' && window.Vue) {
  window.Vue.use(plugin)
}

export default plugin