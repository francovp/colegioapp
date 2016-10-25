<?php
class dependencia{

    function __construct() {

    }

    function consultarDependencias(){	   
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
        $query='select * from Dependencia';
	    return $obj->ejecutarCONSULTA($query,$con);
    }
    function getDependencia($id){
        include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	   $query="SELECT * FROM Dependencia WHERE (id = '$id')";
	   return $obj->ejecutarQueryUnica($query,$con);
	}

    function getDescripcion($id){
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	   $query="SELECT descripcion FROM Dependencia WHERE (id = '$id')";
       $res = $obj->ejecutarQueryUnica($query,$con);
       $valor = $res[0];
	   return $valor;
	}
}
?>