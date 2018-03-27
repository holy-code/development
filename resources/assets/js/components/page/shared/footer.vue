<template>
	<footer>
		<div class="inner-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 f-about">
						<a href="index.html"><h1><span>L</span>araVue</h1></a>
						<p>
							Este proyecto utiliza las tecnologias estandar
							de que Laravel propone para el desarrollo en su
							framework, en este caso tiene como intencion que
							el programador use las tecnologias de Vue para el
							front-end haciendo uso de webpack con laravel-mix
							para la compilacion de archivos css, less,sass y js.
						</p>
					</div>
					<div class="col-md-4 l-posts">
						<h3 class="widgetheading">Documentacion</h3>
						<ul>
							<li><router-link to="/instalation">Instalacion</router-link></li>
							<li><router-link to="/backend">Backend</router-link></li>
							<li><router-link to="/frontend">Frontend</router-link></li>
							<li><router-link to="/tutorials">Tutoriales</router-link></li>
						</ul>
					</div>
					<div class="col-md-4 f-contact">
						<h3 class="widgetheading">Contacto</h3>
						<a href="#"><p><i class="fa fa-envelope"></i> example@gmail.com</p></a>
						<p><i class="fa fa-phone"></i>  +345 578 59 45 416</p>
						<p><i class="fa fa-home"></i> Enno inc  |  PO Box 23456
							Little Lonsdale St, New York <br>
							Victoria 8011 USA</p>
					</div>
				</div>
			</div>
		</div>


		<div class="last-div">
			<div class="container">
				<div class="row">
					<div class="copyright">
						© 2018 <a target="_blank" href="https://holy-code.com">Holy - Code</a>
					</div>

				</div>
			</div>
			<div class="container">
				<div class="row">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fas fa-facebook fa-1x"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fas fa-twitter fa-1x"></i></a></li>
					</ul>
				</div>
			</div>

			<a href="" class="scrollup"><i class="fa fa-chevron-up"></i></a>


		</div>
	</footer>
</template>

<script type="text/javascript">
	export default {
        mounted() {
            console.log('Footer mounted.');
        }
    }
</script>
