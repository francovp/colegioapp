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
				      <li><a href="contacto.html">Contacto</a></li>>
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
				//$pass_oculta = crypt(trim($_POST["pass"]),$1$);
				$pass_oculta = trim($_POST["pass"]);

				$debug = $_POST["debug"];
							
					$query = "SELECT verificar_usuario ('".$username."','".$pass_oculta."');";
					$result = pg_query($conexion,$query);
					$ver = pg_fetch_row ($result);

					if ($ver[0] == 't') {

						//Debug
							echo "<br>El usuario existe y su contraseña está correcta<br>";
							echo "<br>ID usuario: ".$username."<br>";
						//

						//Obtener datos del jugador
						$query = "SELECT * FROM usuario WHERE (username = '".$username."');";
						$result = pg_query($conexion,$query);
						$tupla = pg_fetch_row($result);


						pg_close($conexion);

						if (!isset($_SESSSION)) {
								session_start();
								session_regenerate_id(true);
						}

							$_SESSION["username"] = $tupla[1];
							$_SESSION["nombre"] = $tupla[2];
							$_SESSION["apellido"] = $tupla[3];
                            $_SESSION["sexo"] =$tupla[4];
							$_SESSION["email"] = $tupla[5];
							$_SESSION["pass"] = $tupla[6];

						if(!$debug)
						{
							header ("Location: perfil.php");
						}
						//Debug
							else{

							 	$username = $_SESSION["username"];
							 	echo $username." Se ha logeado";
							}
						//
					}
					else {
						if(!$debug){
							header ("Location: indexErrorLogin.php");
						}
					}
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