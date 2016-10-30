<?php
include_once("conexion.php");
$obj=new conexion();
$con=$obj->conectar();

$html = '';
$id_prueba = $_POST['id_prueba'];

$queryprueba="SELECT idcolegio from AplicacionPrueba where idprueba='$id_prueba';";
$listadoprueba=$obj->ejecutarCONSULTA($queryprueba, $con);
echo "<strong>Colegios que rindieron esa prueba: </strong><br><br>";

echo "
<table class=\"table\" cellspacing=1 border=1>
	<thead>
		<tr>
			<th>Nombre Colegio</th>
		    <th>Nombre Director</th>
			<th>Nombre Sostenedor</th>
            <th>Mensualidad</th>
            <th>Dependencia</th>
		</tr>
	</thead>
	<tbody>
		";

    if($listadoprueba){		
    	//Borrar ListaColegios
    	$queryBorrarLista="DELETE FROM ListaColegios;";
    	$obj->ejecutarQueryUnica($queryBorrarLista, $con);
        foreach($listadoprueba as $rowprueba){
            $valor = $rowprueba[0];
            $querycolegio="SELECT * from Colegio where (id='$valor');";
            $listadocolegio=$obj->ejecutarCONSULTA($querycolegio, $con);
            if($listadocolegio){		
                foreach($listadocolegio as $rowcolegio){
                    echo "<tr>";

                        echo "<td>".$rowcolegio[1]."</td>";
		                echo "<td>".$rowcolegio[2]."</td>";
                        echo "<td>".$rowcolegio[3]."</td>";

                        // Se obtiene mensualidad del colegio
		                $idMensualidad = $rowcolegio[4];
		                include_once("mensualidad.php");
  	                    $objMensualidad=new mensualidad();
		                $mensualidad = $objMensualidad->getDescripcion($idMensualidad);
                        echo "<td>".$mensualidad."</td>";

                        // Se obtiene dependencia del colegio
		                $idDependencia = $rowcolegio[5];
		                include_once("dependencia.php");
  	                    $objDependencia=new dependencia();
		                $dependencia = $objDependencia->getDescripcion($idDependencia);
                        echo "<td>".$dependencia."</td>";
		            echo "</tr>";
                }
            }
            //Rellenar ListaColegios
            $queryInsertarLista="INSERT INTO ListaColegios (id, nombreColegio, nombreDirector, nombreSostenedor, mensualidad, dependencia)
            VALUES (NULL,'$rowcolegio[1]','$rowcolegio[2]','$rowcolegio[3]','$mensualidad','$dependencia');";
            $obj->ejecutarQueryUnica($queryInsertarLista, $con);
	    }
        echo "</tbody></table>";
    }
echo $html;
?>