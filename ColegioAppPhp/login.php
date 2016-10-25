<?php 
	//error_reporting(-1);
	//ini_set('display_errors', 'On');

	$username = trim($_POST["username"]);
	//$pass = crypt(trim($_POST["pass"]),$1$);
	$pass = trim($_POST["pass"]);

	include_once("usuario.php");
  	$objusuario=new usuario();
  	$fila=$objusuario->getUsuario($username);
    if ($fila['contraseña'] == $pass) {
                  
        //Debug
        echo "<br>El usuario existe y su contraseña está correcta<br>";
        echo "<br>Usuario: ".$fila['username']."<br>";
        //

        if (!isset($_SESSSION)) {
            session_start();
            session_regenerate_id(true);
        }

        $_SESSION["username"] = $fila['username'];
        $_SESSION["nombre"] = $fila['nombre'];
        $_SESSION["apellido"] = $fila['apellido'];
        $_SESSION["sexo"] =$fila['sexo'];
        $_SESSION["email"] = $fila['email'];
        $_SESSION["pass"] = $fila['contraseña'];

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
            header ("Location: iniciarSesionError.php");
        }
    }
?>