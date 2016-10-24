<?php
include_once("conexion.php");
$obj=new conexion();
$con=$obj->conectar();

$html = '';
$id_prueba = $_POST['id_prueba'];

$queryprueba="SELECT idcolegio from aplicacionprueba where (idprueba='".$id_prueba."');";
$listadoprueba=$obj->ejecutarCONSULTA($queryprueba, $con);
echo "<option id=''>"."SELECCIONE"."</option>";
	   if($listadoprueba){		
            foreach($listadoprueba as $rowprueba){
                $querycolegio="SELECT * from colegio where (id='".$rowprueba[0]."');";
                $listadocolegio=$obj->ejecutarCONSULTA($querycolegio, $con);
                if($listadocolegio){		
                    foreach($listadocolegio as $rowcolegio){
                        echo "<option value='".$rowcolegio[0]."' id='".$rowcolegio[0]."'>".$rowcolegio[1]."</option>";
                    }
                }
	        }
	     }
echo $html;
?>

