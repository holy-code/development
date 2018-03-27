<template>
	<div>
		<div class="container">
	    	<div class="row">
	        	<div class="service">
	        		<div class="col-md-6 col-md-offset-3">
	            		<div class="text-center">
	              			<h2>Instalacion</h2>
	              			<p>Instalacion y configuracion para el proyecto Laravel-vue.<br></p>
	            		</div>
	            	<hr>
	          		</div>
	        	</div>
	      	</div>
	    </div>
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2>Intoduccion</h2>
	    			<p>La base Laravel – Vue utiliza las tecnologias estandar de que Laravel propone para el desarrollo en su framework, en este caso tiene como intencion que el programador use las tecnologias de Vue para el front-end haciendo uso de webpack con laravel-mix para la compilacion de archivos css, less,sass y js.</p>
	    		</div>
	    		<div class="col-md-12">
	    			<h2>Documentacion basica</h2>
	    			<p>Para poder empezar a programar en este proyecto para otros proyectos es necesario tener conocimientos basicos de Laravel y Vuejs.</p>
	    			<p><a href="https://laravel.com/docs/5.5/" target="_blank">Documentacion de Laravel (oficial)</a></p>
	    			<p><a href="https://docs.laraveles.com/docs/5.5/" target="_blank">Documentacion de Laravel al español</a></p>
	    			<p><a href="https://es-vuejs.github.io/vuejs.org/v2/guide/" target="_blank">Documentacion de Vuejs (oficial)</a></p>
	    			<p><a href="https://www.youtube.com/watch?v=KnmauNagGTo&list=PLhCiuvlix-rTK8DfSiSP1itl7vbjWp7_F" target="_blank">Usando Vuejs en Laravel (curso en youtube)</a></p>
	    		</div>
	    		<div class="col-md-12">
	    			<h2>Requerimientos</h2>
	    			<p>Para poder programar en este proyecto son necesarias las siguientes herramientas:</p>
	    			<ul>
	    				<li>Terminal UNIX: Cualquier distribucion Linux o MacOS las tienen. En el caso de windows es necesario descargar una Terminal como Cygwin.</li>
	    				<li>Composer: Gestor de paquetes/librerias PHP.</li>
	    				<li>NPM: Gestor de paquetes/librerias de JavaScript.</li>
	    				<li>PHP 7.1 o superior: Necesario para utilizar Composer y Laravel</li>
	    				<li>Git: Para control de versiones</li>
	    			</ul>
	    		</div>
	    	</div>
	    	<div class="row">
	    		<div class="col-md-12">
	    			<h2>Instalacion:</h2>
	    			<p>
	    				1.- Clonar el repositorio:
						<code>git clone https://bitbucket.org/csng18/base_laravel/</code>
					</p>
					<p>
						En su defecto puedes descargar el repositorio manualmente desde este enlace:
						<code>https://bitbucket.org/csng18/base_laravel</code>
					</p>
					<p>
						2.- Configurar el archivo “.env” con las configuraciones del servidor.
					</p>
					<p>
						3.- Instalar las dependencias de PHP
						<code>composer install</code>
					</p>
					<p>
						4.- Se generara una carpeta con el nombre “vendor”esta tiene que estar en el servidor donde se ejecutara PHP. (Si se ejecuta desde un servidor remoto se tiene que subir, si se maneja en local no es necesario).
					</p>
					<p>
						5.- Instalar las dependencias de JS
						<code>npm install</code>
					</p>
					<p>
						6.- Se creara una carpeta con el nombre “node_modules”. Esta solo debe de estar en la carpeta de desarrollo, no es necesario subirla al servidor.
					</p>
					<p>
						7.- Despues de estar seguros de que esta bien configurado el entorno (archivo .env) migraremos la base de datos con el siguiente comando:
						<code>php artisan migrate</code>
					</p>
					<p>
						8.- Una vez terminada la migracion, insertaremos los datos basicos a la base de datos con el siguiente comando (puede tardar unos minutos):
						<code>php artisan db:seed</code>
					</p>
					<p>
						9.- El sitio ya deberia de funcionar correctamente.
					</p>
	    		</div>
	    	</div>
	    </div>
	</div>
</template>
<script type="text/javascript">
	export default {}
</script>