<template>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <router-link to="/" class="navbar-brand" ><span>LaraVue</span></router-link>
            </div>
            <div class="navbar-collapse collapse">                          
                <div class="menu">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><router-link to="/">Inicio</router-link></li>
                        <li role="presentation"><router-link to="/instalation">Instalacion</router-link></li>
                        <li role="presentation"><router-link to="/backend">Backend</router-link></li>
                        <li role="presentation"><router-link to="/frontend">Frontend</router-link></li>
                        <li role="presentation"><router-link to="/tutorials">Tutoriales</router-link></li>                     
                    </ul>
                </div>
            </div>          
        </div>
    </nav>
</template>

<script type="text/javascript">
	export default {
        mounted() {
            console.log('Header mounted.');
        }
    }
</script>