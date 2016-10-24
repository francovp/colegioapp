<?php
    $sesionIniciada = false;
    if (!isset($_SESSION)){
        if (strlen(session_id()) < 1){
            $sesionIniciada = false;
        }else{
            $sesionIniciada = true;
        }
    }

    if($sesionIniciada){
?>
    <div class="masthead clearfix">
        <div class="inner">
	        <h3 class="masthead-brand"><strong>ColegioApp Administrador</strong></h3>
	        <nav>
	        <ul class="nav masthead-nav">
		        <li><a href="perfil.php">Inicio</a></li>
		        <li><a href="index.php"><strong>Cerrar Sesión</strong></a></li>
	        </ul>
	        </nav>
        </div>
    </div>
<?php
    }else{
?>
    <div class="masthead clearfix">
	    <div class="inner">
		    <h3> <a href="index.php" class="masthead-brand"><strong>Colegio App Visitante</strong></a></h3>
		    <nav>
		    <ul class="nav masthead-nav">
                <li><a href="iniciarSesion.php">Iniciar Sesión</a></li>
		    </ul>
		    </nav>
	    </div>
    </div>
<?php
    }
?>