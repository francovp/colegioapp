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