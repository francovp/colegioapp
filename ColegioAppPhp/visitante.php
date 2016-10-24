<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Colegio App</title>
	<meta name="description" content="">
	<meta name="Franco Valerio, Gonzalo Zeballos, Sebastian Gonzalez, Roberto Hormazabal" content="">
	<link rel="icon" href="../../favicon.ico">
	
	<!-- Bootstrap -->
	<!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="Content/bootstrap.min.css">
	<!-- Custom styles-->
	<link href="Content/cover.css" rel="stylesheet">
	<link href="Content/style.css"  rel="stylesheet" type="text/css" /> 
</head>

<body>

<?php 
	// aqui si necesitas usar el php
	
	//conexion a la DB
	require('database.php');
	//Se obtienen datos de la DB para mostrarlas en el perfil
	$sql = "SELECT * FROM colegio ;";
	$result = pg_query($conexion,$sql);
	$num_filas = pg_num_rows($result);

	echo '<select id="ingresoSexo" class="form-control" name="sexo">';
	while($fila= pg_fetch_row($result)){
		echo '<option>'.$fila[1].'</option>';

	}
	echo '</select><br>';


	
	
	/* Franco se encarga de la sesion
	if (!isset($_SESSSION)) {
		session_start();
	}
	$_SESSION["username"] = $tupla[1];
	$_SESSION["nombre"] = $tupla[2];
	$_SESSION["apellido"] = $tupla[3];
	$_SESSION["sexo"] =$tupla[4];
	$_SESSION["email"] = $tupla[5];
	$_SESSION["pass"] = $tupla[6];
	*/

	//Se cierra conexi{on a la DB
	pg_close($conexion);
?>
	<!-- Bootstrap core JavaScript
	  ================================================== -->
	<!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
	<script src="Scripts/bootstrap.min.js"></script>

		<!-- AngularJS y Jquery -->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
	<script src="Scripts/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="Scripts/jquery-ui-1.12.1.min.js" type="text/javascript"></script>
</body>

</html>

