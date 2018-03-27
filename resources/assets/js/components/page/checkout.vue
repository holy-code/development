<template>
	<div>
	    <div class="container">
	      <div class="row">
	        <div class="service">
	          <div class="col-md-6 col-md-offset-3">
	            <div class="text-center">
	              <h2>Checkout</h2>
	              <p>Ejemplo de un checkout de paypal.<br>
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
	              <h4>Producto 1</h4>         
	                <div class="icon">
	                  <i class="far fa-heart fa-3x"></i>
	                </div>            
	              <p><b>$100 MNX</b> - Producto 1</p>
	              <div class="ficon">
	                <a class="btn btn-default" role="button" @click="addToCart(1,100)">Añadir</a>
	              </div>
	            </div>
	          </div>
	          
	          <div class="col-md-3">
	            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.0s">
	              <h4>Producto 2</h4>
	              <div class="icon">
	                <i class="fas fa-desktop fa-3x"></i>
	              </div>
	              <p><b>$2500 MNX</b> - Producto 2</p>
	              <div class="ficon">
	                <a class="btn btn-default" role="button" @click="addToCart(2,2500)">Añadir</a>
	              </div>
	            </div>
	          </div>
	          
	          <div class="col-md-3">
	            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="1.6s">
	              <h4>Producto 3</h4>
	              <div class="icon">
	                <i class="fas fa-location-arrow fa-3x"></i>
	              </div>
	              <p><b>$5 MNX</b> - Producto 3</p>
	              <div class="ficon">
	                <a class="btn btn-default" role="button" @click="addToCart(3,5)">Añadir</a>
	              </div>
	            </div>          
	          </div>
	          
	          <div class="col-md-3">
	            <div class="wow bounceIn" data-wow-offset="0" data-wow-delay="2.2s">
	              <h4>Producto 4</h4>
	              <div class="icon">
	                <i class="fas fa-laptop fa-3x"></i>
	              </div>
	              <p><b>$9999 MNX</b> - Producto 4</p>
	              <div class="ficon">
	                <a class="btn btn-default" role="button" @click="addToCart(4,9999)">Añadir</a>
	              </div>
	            </div>          
	          </div>
	        </div>
	      </div>
	    </div>

	    <div class="container">
	      <div class="row">
	      	<h2>Checkout</h2>
	      </div>	
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-3" v-for="product in cart">
	            <div class="wow bounceIn">
	              <h4>{{ product.name }}</h4>
	              <p><b>${{ product.price }} MNX</b> - {{ product.description }}</p>
								<small>Cantidad: {{ product.quantity }}</small>
	              <div class="ficon">
	                <a class="btn btn-danger" role="button" @click="deleteCart(product.sku)">Eliminar</a>
	              </div>
	            </div>          
	          </div>
					</div>
				</div>
	      <div class="row">
	        <div class="service">
	          <div class="col-md-6">
	            <div>
	              <p><b>Total a pagar:</b> ${{ total }}<br>
	              </p>
	            </div>
	            <hr>
	          </div>
	          <div class="col-md-3" v-show="isGenerated==false">
	          	<button class="btn btn-info" @click="generate">Generar pago</button>
	          </div>
	          <div class="col-md-3" v-show="isGenerated==true">
	          	<div id="paypal"></div>
	          </div>
	        </div>
	      </div>
	    </div>

	</div>
</template>

<script type="text/javascript">
	export default {
		data(){
			return {
				cart:[],
				total:0,
				isGenerated:false,
			}
		},
		computed:{
			
		},
		methods:{
			addToCart:function(num,p){
				let product={
					name:'Producto '+num,
					description:'Un producto',
					quantity:1,
					price:p+'.00',
					sku:num,
				}
				Vue.cart.add(product);
				this.isGenerated=false;
				this.getCart();
				this.getTotal();
			},
			getCart:function(){
				let cart=Vue.cart.getCart();
				// cart=cart.map((e)=>{
				// 	return e.name;
				// });
				this.cart= cart;
			},
			deleteCart:function(sku){
				Vue.cart.delete(sku);
				this.getCart();
				this.getTotal();
			},
			getTotal:function(){
				this.total= Vue.cart.getTotal();
			},
			generate:function(){
				this.getTotal();
				Vue.cart.setTotal(this.total);
				Vue.cart.createPayment(
					"#paypal",(a,b)=>{
						console.log(a);
						console.log(b);
					},
					()=>{
						
					}
					,"sandbox"
				);
				this.isGenerated=true;
			}	
		},
        mounted() {
						this.getCart();
						this.getTotal();
        }
    }
</script>