<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Cargando..</title>
	<link rel="stylesheet" type="text/css" href="public/css/app.css">
	<link rel="stylesheet" type="text/css" href="public/extras/css/font-awesome/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="public/extras/css/font-awesome/css/fontawesome.min.css">
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	@include('shared.jsDir')
</head>
<body>
	<div id="app">
		<vue-topprogress ref="loadingBar" color="yellow" :height="4"></vue-topprogress>
		<my-header></my-header>
		<router-view></router-view>
		<my-footer></my-footer>
	</div>
	<script type="text/javascript" src="public/js/app.js"></script>
</body>
</html>
