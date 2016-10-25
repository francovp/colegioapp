<?php
include_once("conexion.php");
$obj=new conexion();
$con=$obj->conectar();

$html = '';
$id_curso = $_POST['id_curso'];

$queryprueba="SELECT * from prueba_simce where (curso='$id_curso');";

$listadoprueba=$obj->ejecutarCONSULTA($queryprueba, $con);
echo "<option id=''>"."SELECCIONE"."</option>";
	   if($listadoprueba){		
            foreach($listadoprueba as $rowprueba){ 	
		          echo "<option value='".$rowprueba[0]."' id='".$rowprueba[0]."'>".$rowprueba[1]."</option>";
	        }
	     }
echo $html;
?>

