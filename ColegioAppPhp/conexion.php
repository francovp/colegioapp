<?php
class conexion{
	function conectar(){
			$link = new SQLite3("Database/colegioapp.sqlite");
			$valor;
			if($link){
				$valor=$link;

			}else{
				$valor="No se conectó a database";

			}
			return $valor;
	}
	function ejecutarCONSULTA($query,$con){
			$resultado=$con->query($query);
			$valor;
			if($resultado){
				$lista =array();
				while ($row = $resultado->fetchArray()) {
					array_push($lista,$row);
				}
				$valor = $lista;
			}else{
				$valor = "No se ejecutó query a la database";
			}
			return $valor;
	}

	function ejecutarQueryUnica($query,$con){
			$resultado=$con->query($query);
			$valor;
			if($resultado){
			   $row = $resultado->fetchArray();
			   $valor = $row;
			}else{
				$valor = "No se ejecutó query a la database";
			}
			return $valor;
	}
}
?>