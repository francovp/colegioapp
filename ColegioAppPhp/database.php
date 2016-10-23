<?php	
	$conexion = pg_connect("host=ec2-54-243-199-161.compute-1.amazonaws.com
							port=5432
							dbname=da78hcibvmoqoj
							user=lfnfuyooekline
							password=oBf0XghCVqkE1Hxu-0m23gB68S");

	if(!$conexion){
			echo "Conexion fallida :(<br>No se pudo establecer conexión con la base de datos<br>
					Revisa que los datos de conexión a la DB en database.php sean correctos<br>";
			header ("Location: databaseError.php");
	}
?>