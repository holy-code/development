<?php

use Illuminate\Http\Request;

require('basics.php');


//Grupo de rutas que requieren autentificacion
Route::middleware(["jwt.auth"])->group(function(){
	//Rutas
});