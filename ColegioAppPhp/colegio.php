<?php

class colegio{

    function consultarColegios(){	 
        include_once("conexion.php");
        $obj=new conexion();
        $con=$obj->conectar();
        $query='select * from Colegio';
        return $obj->ejecutarCONSULTA($query,$con);
    }
}
?>

