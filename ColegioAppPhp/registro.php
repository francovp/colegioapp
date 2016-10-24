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
	<div class="site-wrapper">
	  <div class="site-wrapper-inner">
		<div class="cover-container">
			<div class="masthead clearfix">
				<div class="inner">
				  <h1 class="masthead-brand">Clash of Crews</h1>
				  <nav>
					<ul class="nav masthead-nav">
					  <li class="active"><a href="index.php">Inicio</a></li>
					  <li><a href="contacto.html">Contacto</a></li>
					</ul>
				  </nav>
				</div>
			</div>
			<div class="container-fluid">

<?php 
    //error_reporting(-1);
    //ini_set('display_errors', 'On');
    require('database.php');

    $username = trim($_POST["username"]);
	$nombre = trim($_POST["nombre"]);
	$apellido = trim($_POST["apellido"]);
	$sexo = trim($_POST["sexo"]);
	$email = trim($_POST["mail"]);
	//$pass_oculta = crypt(trim($_POST["pass"]),$1$);
	$pass_oculta = trim($_POST["pass"]);

		//Se verifica que el usuario no haya sido registrado antes.
		$query = "SELECT verificar_email ('".$email."');";
		$result = pg_query($conexion, $query);
		$ver = pg_fetch_row($result);
		//Si no se encuentra...
		if ($ver[0] == 'f') {
			//...Se procede a registrar al jugador...
			$query = "SELECT crear_usuario ('".$username."','".$nombre."','".$apellido."','".$sexo."','".$email."','".$pass_oculta."');";
			$result = pg_query($conexion,$query);
            $ver = pg_fetch_row ($result);
		    //Si se crea...
		    if ($ver[0] == 'v') {

				//Se obtienen datos de la DB para mostrarlas en el perfil
				$sql = "SELECT * FROM usuario WHERE (username = '".$username."');";
				$result = pg_query($conexion,$sql);
				$tupla = pg_fetch_row($result);

                if (!isset($_SESSSION)) {
					session_start();
			    }
				$_SESSION["username"] = $tupla[1];
				$_SESSION["nombre"] = $tupla[2];
				$_SESSION["apellido"] = $tupla[3];
                $_SESSION["sexo"] =$tupla[4];
				$_SESSION["email"] = $tupla[5];
				$_SESSION["pass"] = $tupla[6];

			    header ("Location: perfil.php");

				//Se cierra conexi{on a la DB
				pg_close($conexion);
			}
            else{
            	header ("Location: indexErrorCrearUsuario.php");
                //Se cierra conexi{on a la DB
				pg_close($conexion);
            }
		}
		else {
			header ("Location: indexErrorRegistro.php");
		}
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