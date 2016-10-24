<?php
	include('_Layout.php');
?>


		<script>
	   $(document).ready(function(){
	   $("#curso").change(function () {

	   		$("#curso option:selected").each(function () {
				id_curso = $(this).val();			
				$.post("prueba.php", { id_curso: id_curso }, function(data){
					$("#prueba").html(data);			
				});		

	        });
	   })
		});
		</script>

<?php
	   include_once("curso.php");
  	   $objcurso=new curso();
  	   $listacurso=$objcurso->consultarCursos();
	   if($listacurso){
	        echo "<label>Cursos</label><br><br>";
            echo "<select id='curso' name='curso'>";
            echo "<option id=''>"."SELECCIONE"."</option>";
	        foreach($listacurso as $rowcurso){
		          echo "<option value='$rowcurso[0]' id='".$rowcurso[0]."'>".$rowcurso[1]."</option>";
	        }
	        echo "</select><br><br><br>";
	     }
?>
        <label>Categoria secundaria</label><br><br>
        <select name="prueba" id="prueba">
            <option value="0">SELECCIONE</option>
        </select>



<?php
	            /* Franco se encarga de la sesion
	            if (!isset($_SESSSION)) {
		            session_start();
	            }
	            $_SESSION["username"] = $tupla[1];
	            $_SESSION["nombre"] = $tupla[2];
	            $_SESSION["apellido"] = $tupla[3];
	            $_SESSION["sexo"] =$tupla[4];
	            $_SESSION["email"] = $tupla[5];
	            $_SESSION["pass"] = $tupla[6];
	            */
	            //Se cierra conexi{on a la DB
	           // pg_close($conexion);
?>

<?php
	include('_Footer.php');
?>

