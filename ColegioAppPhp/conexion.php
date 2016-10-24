<?php
class conexion{
	function conectar(){
			$host = "localhost"; 
			$port = "5432"; 
			$data = "colegioapp"; 
			$user = "postgres"; //usuario de postgres 
			$pass = "8569"; //password de usuario de postgres 
			$conn_string = "host=". $host . " port=" . $port . " dbname= " . $data . " user=" . $user . " password=" . $pass; 
			$link = pg_connect($conn_string);
			$valor;
			if($link){
				$valor=$link;

			}else{
				$valor="No se conectó a database";

			}
			return $valor;
	}
	function ejecutarCONSULTA($query,$con){
	        $resultado=pg_query($con, $query);
	        $valor;
	        if($resultado){
	            $lista =array();
	            while($row=pg_fetch_array($resultado)){
	                array_push($lista,$row);
	            }
	            $valor = $lista;
	        }else{
	            $valor = "No se ejecutó query a la database";
	        }
	        return $valor;
	}

}
?>