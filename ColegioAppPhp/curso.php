<?php
class curso{

function consultarCursos(){	   
       include_once ('conexion.php');
       $obj=new conexion();
	   $con=$obj->conectar();
	   $query="select * from curso_prueba";
	   return $obj->ejecutarCONSULTA($query,$con);
	}
}
?>