<template>
	<div>
    <div class="container">
      <div class="row">
        <div class="service">
          <div class="col-md-6 col-md-offset-3">
            <div class="text-center">
              <h2>Inicio</h2>
              <p>Proyecto Laravel-vue.<br>
              </p>
            </div>
            <hr>
          </div>
        </div>
      </div>
    </div>
    
    <div class="services">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="0.4s">
              <h4>Instalacion</h4>         
                <div class="icon">
                  <i class="fas fa-archive fa-3x"></i>
                </div>            
              <p>Guia basica de instalacion.</p>
              <div class="ficon">
                <router-link to="/instalation" class="btn btn-default" role="button">Ver</router-link>
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
              <h4>Backend</h4>
              <div class="icon">
                <i class="fas fa-cogs fa-3x"></i>
              </div>
              <p>Documentacion basica del backend </p>
              <div class="ficon">
                <router-link to="/backend" class="btn btn-default" role="button">Ver</router-link>
              </div>
            </div>
          </div>
          
          <div class="col-md-3">
            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.6s">
              <h4>Frontend</h4>
              <div class="icon">
                <i class="fas fa-desktop fa-3x"></i>
              </div>
              <p>Documentacion basica del frontend</p>
              <div class="ficon">
                <router-link to="/frontend" class="btn btn-default" role="button">Ver</router-link>
              </div>
            </div>          
          </div>
          
          <div class="col-md-3">
            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="2.2s">
              <h4>Tutoriales</h4>
              <div class="icon">
                <i class="far fa-clone fa-3x"></i>
              </div>
              <p>Tutoriales sobre componentes y plugins</p>
              <div class="ficon">
                <router-link to="/tutorials" class="btn btn-default" role="button">Ver</router-link>
              </div>
            </div>          
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
	export default {
        mounted() {
            console.log('Home mounted.');
        }
    }
</script>