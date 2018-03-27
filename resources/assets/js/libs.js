/*
 *
 * Estas librerias estan presentes tanto en la website como en el dashboard
 *
 */

//Librerias necesarias
import VeeValidate, { Validator } from 'vee-validate';
import es from 'vee-validate/dist/locale/es';
import Datetime from 'vue-datetime';
import vSelect from 'vue-select';
import cart from './services/cart.js';
import vueTopprogress from 'vue-top-progress'

//Funcion para añadirlas a Vue
function fire(Vue){
	//Vee-validate	
	Validator.localize('es', es);
	Vue.use(VeeValidate,{locale:"es"});

	//vue-datetime	
	Vue.use(Datetime);

	//Vue-select	
	Vue.component('v-select', vSelect);

	//Loading bar
	Vue.use(vueTopprogress);

	Vue.use(cart,{token_sandbox:"AZ2Ddsdu1l0uRI8tFkpvbapGVsdcA2T2eKzLBEMZpbHH5i50jVkK-cIgMHe-dCP7MGsgZjWRleR5qgh8"});

}



// Install by default if using the script tag
if (typeof window !== 'undefined' && window.Vue) {
  window.Vue.use(plugin)
}

export default fire;