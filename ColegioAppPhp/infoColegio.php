<?php
include_once("conexion.php");
$obj=new conexion();
$con=$obj->conectar();

$html = '';
$id_colegio = $_POST['id_colegio'];

$querycolegio="SELECT * from Colegio where id='$id_colegio';";
$listadocolegio=$obj->ejecutarCONSULTA($querycolegio, $con);
echo "<strong>Información de este colegio: </strong><br><br>";

echo "
<table class=\"table\" cellspacing=1 border=1>
	<thead>
		<tr>
			<th>Nombre Sostenedor</th>
            <th>Nombre Director</th>
            <th>Mensualidad</th>
            <th>Dependencia</th>
		</tr>
	</thead>
	<tbody>
		";

    if($listadocolegio){		
        foreach($listadocolegio as $rowcolegio){
            echo "<tr>";

		        echo "<td>".$rowcolegio[2]."</td>";
                echo "<td>".$rowcolegio[3]."</td>";

                // Se obtiene mensualidad del colegio
		        $idMensualidad = $rowcolegio[4];
		        include_once("mensualidad.php");
  	            $objMensualidad=new mensualidad();
		        $mensualidad = $objMensualidad->getDescripcion($idMensualidad);
                echo "<td>".$mensualidad."</td>";

                // Se obtiene dependencia del colegio
		        $idDependencia = $rowcolegio[4];
		        include_once("dependencia.php");
  	            $objDependencia=new dependencia();
		        $dependencia = $objDependencia->getDescripcion($idDependencia);
                echo "<td>".$dependencia."</td>";
		    echo "</tr>";
        }
        echo "</tbody></table>";
    }
echo $html;
?>