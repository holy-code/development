<template>
	<div>
		<div class="container">
	    	<div class="row">
	        	<div class="service">
	        		<div class="col-md-6 col-md-offset-3">
	            		<div class="text-center">
	              			<h2>Tutoriales</h2>
	              			<p>Tutoriales basicos para uso de componentes.<br></p>
	            		</div>
	            	<hr>
	          		</div>
	        	</div>
	      	</div>
	    </div>
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2>Tutoriales basicos para el dashboard.</h2>
	    			<p>Aqui mostraran tutoriales basicos para implementar algunos de los plugins instalados en este proyecto.</p>
					<h3>Contenido</h3>
					<ul>
						<li @click="goTo('tynyMCE')"><a> Tinymce</a></li>
						<li @click="goTo('bootstrap')"><a> bootstrap-table</a></li>
					</ul>
	    		</div>
	    	</div>
	    </div>
	    <div class="container" id="tinyMCE">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2>Implementando Tinymce.</h2>
	    			<p>Tinymce es un plugin que añadira a cualquier textbox un panel de herramientas de edicion.<br>
	    			Para implentar tinymce en un componente de Vue, debemos de declarar (de preferencia) un metodo para inicializarlo:</p>
<pre>
methods:{
	tinymce:function(){
		tinymce.init({
			selector:'textarea',
			init_instance_callback: (editor) => {
				editor.on('KeyUp', (e) => {
					VARIABLE_VUE=editor.getContent();
				});
				editor.on('Change', (e) => {
					VARIABLE_VUE=editor.getContent();
				});
				editor.setContent(VARIABLE_VUE);
	    	},
		});
	},
}
</pre>
	    			<p>Este metodo añadira a todos los textbox un panel de herramientas.<br>
	    			Para settear cualquier dato dentro del textbox se usa el codigo: <code>tinymce.activeEditor.setContent(VALOR_A_SETTEAR);</code></p>

	    		</div>
	    	</div>
	    </div>
	    <hr>
	    <div class="container" id="bootstrap">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2>Implementar bootstrap-table.</h2>
	    			<p>Este plugin sirve para hacer dataTables dinamicos.<br>
	    				Para implementarlo en cualquier componente necesitamos agregar codigo HTML y un poco de JS.<br>
	    				<br>
	    				Codigo HTML:
	    			</p>
<pre>
&lt;div id="toolbar"&gt;
        BOTONES_DEL_TOOLBAR
&lt;/div&gt;

&lt;table id="TABLE"&gt;&lt;/table&gt;
</pre>
					<p>
						<b>Donde:</b><br>
						BOTONES_DEL_TOOLBAR: Codigo html que desees añadir para hacer ciertas acciones.<br>
						TABLE: id de la tabla.<br>
						Codigo JS:
					</p>
					<p>Se recomienda hacer un methodo para montar la tabla.</p>
<pre>
methods: {
	mounthTable(){
		jQuery(‘TABLE’).bootstrapTable({
			columns: [
	      		{field: LLAVE_DEL_DATO,  title: NOMBRE_DE_LA_COLUMNA}
			],            
		});
	}
}
</pre>
					<p>
						<b>Donde:</b><br>
						TABLE: id de la tabla.<br>
						LLAVE_DEL_DATO: Llave en el objeto en la tabla.<br>
						NOMBRE_DE_LA_COLUMNA: Texto que se mostrara en la tabla.
					</p>
	    		</div>
	    	</div>
	    </div>
		
	</div>
</template>
<script type="text/javascript">
	export default {
		methods:{
			goTo:function(to) {
				let code = document.getElementById(to);
				code.scrollIntoView();
			}
		}
	}
</script>
<style type="text/css">
	pre{
		width: 70%;
	}
</style>