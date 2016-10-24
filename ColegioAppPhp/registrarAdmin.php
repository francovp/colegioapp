<?php
    include('_Layout.php');
?> 
<div class="container-fluid">
<div class="row">
	<div class="col-sm-6">
		<div class="cuadro">
			<form class="form-signin" action="login.php" method="POST">
				<center>
					<strong><h1 class="form-signin-heading">Ingresa!</h1></strong><br>
					<input type="text" id="ingresoId" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus><br>
					<input type="password" id="ingresoPassword" name="pass" class="form-control" placeholder="Contraseña" required autofocus><br>
					<a href="olvidarPass.html">¿Olvidaste tu contraseña?</a><br>
					<!-- <div class="checkbox">
						<label>
						<input type="hidden" name="recuerdame" value="off">
						<input type="checkbox" name="recuerdame" value="on"> Recuerdame
						</label>
					</div> --><br>
					<button class="btn btn-lg btn-default" type="submit">Ingresar</button><br><br>
				</center>
			</form>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="registro">
			<div class="cuadro">
				<form action="registro.php" method="POST">
					<center>
						<strong><h1 class="form-signin-heading">Registrate!</h1></strong><br>
						<input type="text" id="ingresoId" name="username" class="form-control" placeholder="Nombre de usuario" required autofocus><br>
						<input type="text" id="ingresoNombre" name="nombre" class="form-control" placeholder="Nombre" required autofocus><br>
						<input type="text" id="ingresoApellido" name="apellido" class="form-control" placeholder="Apellido" required autofocus><br>
						<select id="ingresoSexo" class="form-control" name="sexo">
							<option>Genero...</option>
							<option>Masculino</option>
							<option>Femenino</option>
						</select><br>
						<input type="email" id="ingresoEmail" name="mail" class="form-control" placeholder="Email" required autofocus><br>
						<input type="password" id="ingresoPassword" name="pass" class="form-control" placeholder="Contraseña" required autofocus><br>
						<button class="btn btn-lg btn-default" type="submit">Registrarse</button><br><br>
					</center>
				</form>
			</div>
		</div>
	</div>
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
