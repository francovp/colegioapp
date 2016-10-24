<?php
    include('_Layout.php');
?> 
<div class="container-fluid">
        <form class="form-horizontal" action="login.php" method="POST">
            <strong><h1 class="form-signin-heading">Ingresa!</h1></strong><br>
            <div class="form-group">
                <label for="ingresoUsername" class="col-sm-2 control-label">Usuario</label>
                <div class="col-sm-10">
                    <input type="text" id="ingresoUsername" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus><br>
                </div>
            </div>
            <div class="form-group">
                <label for="ingresoPassword" class="col-sm-2 control-label">Contraseña</label>
                <div class="col-sm-10">
                    <input type="password" id="ingresoPassword" name="pass" class="form-control" placeholder="Contraseña" required autofocus><br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <a href="olvidarPass.html">¿Olvidaste tu contraseña?</a><br>
                </div>
            </div>
            <!-- <div class="checkbox">
                <label>
                <input type="hidden" name="recuerdame" value="off">
                <input type="checkbox" name="recuerdame" value="on"> Recuerdame
                </label>
            </div> -->
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <br><button class="btn btn-lg btn-default" type="submit">Ingresar</button><br><br>
                </div>
            </div>
        </form>
</div>

<?php
	//Se verifica Si está iniciada la sesión
	if (isset($_SESSION)){
		$session = $_SESSION["session"];
		// Si "Recuerdame" está activado se redirije al Perfil
		if($session)
		{
			header ("Location: perfil.php");
		}
        // Si "Recuerdame" no está activado, se destruirá la sesión.
	    else{
		    // Destruir todas las variables de sesión.
		    $_SESSION = array();
		    // Borrar la cookie de sesión.
		    if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
				    $params["path"], $params["domain"],
				    $params["secure"], $params["httponly"]
			    );
		    }
		    if (strlen(session_id())){
		    // Finalmente, destruir la sesión.
			    session_destroy();
		    }
	    }
	}
?>

<?php
    include('_Footer.php'); 
?> 
