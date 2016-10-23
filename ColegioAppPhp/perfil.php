<!DO-+*******////*+/
<html lang="es">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title> Clash of Crews - Perfil de <?php echo ($nombre." ".$apellido)?></title>
	<meta name="description" content="">
	<meta name="Franco Valerio, Gonzalo Zeballos, Sebastian Gonzalez, Roberto Hormazabal" content="">
	<link rel="icon" href="../../favicon.ico">
  
  <!-- Bootstrap Online -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="Content/bootstrap.min.css"> 

  <!-- Custom styles-->
	<link href="Content/cover.css" rel="stylesheet">
	<link href="Content/style.css"  rel="stylesheet" type="text/css" /> 

  <!-- Styles Jquery -->
	<link href="Content/themes/base/core.css" rel="stylesheet" type="text/css">
	<link href="Content/themes/base/theme.css" rel="stylesheet" type="text/css">
	<link href="Content/themes/base/button.css" rel="stylesheet" type="text/css">
  </head>

<!-- ----------------------------------------------------------------------------------------- -->
  <?php
	//error_reporting(-1);
	//ini_set('display_errors', 'On');
	require('database.php');
	
	// Verifica si es que no se ha iniciado una sesión
	if (isset($_SESSION)) {
	  // Intenta iniciar sesión
	  session_start();
	  // Verifica si hay datos de inicio de sesión
	  if (strlen(session_id()) < 1){
		// Si no hay datos de inicio de sesión se vuelve al login
		header ("Location: index.php");
	  }
	  else{
		// Si está activado "Recuerdame", Activarlo (No funcionando)
		//$session = $_POST["recuerdame"];
	  }
	}

	// Guarda datos de sesión en variables para ser ocupados después
	$username = $_SESSION["username"];
	$nombre = $_SESSION["nombre"];
	$apellido =  $_SESSION["apellido"];
	$sexo = $_SESSION["sexo"];
	$email = $_SESSION["email"];
	$pass = $_SESSION["pass"];

	// Codigo para obtener fecha actual
	  date_default_timezone_set('America/Santiago');
	  $fecha = date('j-n-o h:i:s');
	  $_SESSION["fecha"] = $fecha;

  ?>

<!-- ----------------------------------------------------------------------------------------- -->
  <body>
	<div class="site-wrapper">
	  <div class="site-wrapper-inner">
		<div class="cover-container">
			<?php include('navPartial.php');?> 
		  <div class="masthead clearfix">
			<div class="inner">
			  <h3 class="masthead-brand"><strong>Clash of Crews Administrator</strong></h3>
			  <nav>
				<ul class="nav masthead-nav">
				  <li class="active"><a href="perfil.php">Inicio</a></li>
				  <li><a href="index.php"><strong>Cerrar Sesión</strong></a></li>
				</ul>
			  </nav>
			</div>
		  </div>
		  <div class="container-fluid">
			
			<h1> 
			<strong><center> Bienvenido <?php echo $nombre;?>!</center></strong><br>

			<!-- Botón para activar modal Datos Personales -->
			<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modalDatosPersonales">
			<strong>Ver datos personales</strong></button>
			</h1>

			-->

<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->            
<!-- Modal Datos personales-->

			<div class="modal fade" id="modalDatosPersonales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
	
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Mis Datos personales</h4>
				  </div>
	
				  <div class="modal-body">
					  <?php
						echo "<strong>Nombre de usuario:</strong> ".$username."<br>
							  <strong><br>Nombre Completo:</strong> ".$nombre." ".$apellido."<br>
							  <strong><br>Genero:</strong> ".$sexo."<br>
							  <strong><br>Email:</strong> ".$email."<br>"
					  ?>
				  </div>
				  <div class="modal-footer">
					<!-- Button trigger modal Modificar Datos Personales -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalModificarDatos">
					  Modificar Datos
					</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				  </div>
				</div>
			  </div>
			</div>

<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->       
<!-- Modal Modificar Datos Personales-->
			<div class="modal fade" id="modalModificarDatos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content"> <!-- Aquí van la class del script de autoformulario -->
				  <div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Modificar datos personales</h4>
				  </div>
				  <form action="modificarJugador.php" method="POST" ng-app="myApp" ng-controller="formCtrl" novalidate>
					<div class="modal-body">
	
						<!-- Script para autoformulario con valores predeterminados del usuario logeado -->
					  <script>
						  var app = angular.module('myApp', []);
						  app.controller('formCtrl', function($scope) {
							$scope.nombre = <?php echo $nombre;?>;
							$scope.apellido = <?php echo $apellido;?>;
							$scope.email = <?php echo $email;?>;
							$scope.pass = <?php echo $pass;?>;
						  });
						</script>
	
						<div class="form-group">
						  <label for="ingresoNombre">Nombre: </label>
						  <input type="text" id="ingresoNombre" name="nombre" class="form-control" placeholder="Nombre" ng-model="nombre" required autofocus>
						</div>
						<div class="form-group">
						  <label for="ingresoApellido">Apellido: </label>
						  <input type="text" id="ingresoApellido" name="apellido" class="form-control" placeholder="Apellido" ng-model="apellido" required autofocus>
						</div>
						<?php
						  if($sexo == 'Masculino'){
							echo "<div class=\"form-group\">
							  <label for=\"ingresoSexo\">Genero: </label>
							  <select id=\"ingresoSexo\" class=\"form-control\" name=\"sexo\">
								<option>Masculino</option>
								<option>Femenino</option>
							  </select>
							</div>
							";
						  }else{
							echo "<div class=\"form-group\">
							  <label for=\"ingresoSexo\">Genero: </label>
							  <select id=\"ingresoSexo\" class=\"form-control\" name=\"sexo\">
								<option>Femenino</option>
								<option>Masculino</option>
							  </select>
							</div>
							";
						  }
						?>
						<div class="form-group">
						  <label for="ingresoEmail">Email: </label>
						  <input type="email" id="ingresoEmail" name="mail" class="form-control" placeholder="Email" ng-model="email" required autofocus>
						</div>
						<div class="form-group">
						  <label for="ingreso">Contraseña: </label>
						  <input type="password" id="ingresoPassword" name="pass" class="form-control" placeholder="Contraseña" ng-model="pass" required autofocus>
						</div>
						
					</div>
					<div class="modal-footer">
					  <button type="submit" class="btn btn-primary">
						Actualizar Datos
					  </button>
					  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				  </form>
				</div>
			  </div>
			</div>

<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->  
<!-- FIN MODALES -->
			
			<?php
			  // Guardar datos extras de sesión actual
			  $_SESSION["username"] = $username;

			  //Cierra cualquier conexión abierta a la base de datos
			  pg_close($conexion);
			?>

<!-- Fondo de la página -->
			<div class="mastfoot">
			  <div class="inner">
				<p>Sitio desarrollado por:<br>Franco Valerio - Leandro Mondaca - Diego Mayorga</p>
			  </div>
			</div>
		  </div>
		  </div>
	  </div>
	</div>

		<!-- AngularJS y Jquery -->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script src="Scripts/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="Scripts/jquery-ui-1.12.1.min.js" type="text/javascript"></script>

	  <!-- Bootstrap core JavaScript
	  ================================================== -->
  <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
	<script src="Scripts/bootstrap.min.js"></script>

  </body>
</html>