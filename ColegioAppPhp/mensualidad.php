<?php
class mensualidad{

    function consultarMensualidades(){
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	    $query='select * from Mensualidad';
	    return $obj->ejecutarCONSULTA($query,$con);
    }
    function getMensualidad($id){	   
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	   $query="SELECT * FROM Mensualidad WHERE (id = '$id')";
	   return $obj->ejecutarQueryUnica($query,$con);
	}

    function getDescripcion($id){
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	   $query="SELECT descripcion FROM Mensualidad WHERE (id = '$id')";
       $res = $obj->ejecutarQueryUnica($query,$con);
       $valor = $res[0];
	   return $valor;
	}
}
?>