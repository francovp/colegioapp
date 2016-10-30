<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->            
<!-- Modal Listado de Colegios-->

	<div class="modal fade" id="modalListadoColegios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		<div class="modal-content">
	
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Ver Colegios de un curso y prueba específico</h4>
			</div>
	
			<div class="modal-body">
			<?php
	            include_once("/curso.php");
  	            $objcurso=new curso();
  	            $listacurso=$objcurso->consultarCursos();
	            if($listacurso){
	                echo "<label>Seleccione curso de Prueba Simce: </label><br><br>";
                    echo "<select  class='form-control' id='curso' name='curso'>";
                    echo "<option id=''>"."SELECCIONE"."</option>";
	                foreach($listacurso as $rowcurso){
		                    echo "<option value='".$rowcurso[0]."' id='".$rowcurso[0]."'>".$rowcurso[1]."</option>";
	                }
	                echo "</select><br><br>";
	                }
            ?>
            <label>Seleccione año de Prueba Simce: </label><br><br>
            <select class="form-control" name="prueba" id="prueba">
                <option value="0">SELECCIONE</option>
            </select><br /><br />

            <div name="listadoColegios" id="listadoColegios">
            </div> <br /><br />
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
		</div>
	</div>

<script language="javascript">
    $(document).ready(function () {
        $("#curso").change(function () {

            $("#curso option:selected").each(function () {
                id_curso = $(this).val();
                $.post("prueba.php", { id_curso: id_curso }, function (data) {
                    $("#prueba").html(data);
                });

            });
        })

        $("#prueba").change(function () {

            $("#prueba option:selected").each(function () {
                id_prueba = $(this).val();
                $.post("listadoColegios2.php", { id_prueba: id_prueba }, function (data) {
                    $("#listadoColegios").html(data);
                });

            });
        })

    });
</script>

