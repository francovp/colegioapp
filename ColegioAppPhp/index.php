<?php
    include('_Layout.php');
?> 
<div class="container-fluid">

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
