<?php	
	$conexion = new SQLite3("Database/colegioapp.sqlite");

	if(!$conexion){
			echo "Conexion fallida :(<br>No se pudo establecer conexión con la base de datos<br>
					Revisa que los datos de conexión a la DB en database.php sean correctos<br>";
			header ("Location: databaseError.php");
	}
?>