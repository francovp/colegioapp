<?php
class usuario{

    function getUsuario($username){	   
	    include_once ('conexion.php');
        $obj=new conexion();
	    $con=$obj->conectar();
	   $query="select * FROM Usuario WHERE username='$username';";
	   return $obj->ejecutarQueryUnica($query,$con);
	}
}
?>