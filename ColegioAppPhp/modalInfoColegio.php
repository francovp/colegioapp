<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->            
<!-- Modal Info de Colegio-->

			<div class="modal fade" id="modalInfoColegio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
				<div class="modal-content">
	
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Ver Información de Colegio</h4>
				  </div>
	
				  <div class="modal-body">
					<?php
	                    include_once("/colegio.php");
  	                    $objcolegio=new colegio();
  	                    $listacolegio=$objcolegio->consultarColegios();
	                    if($listacolegio){
	                        echo "<label>Seleccione colegio: </label><br><br>";
                            echo "<select  class='form-control' id='colegio' name='colegio'>";
                            echo "<option id=''>"."SELECCIONE"."</option>";
	                        foreach($listacolegio as $rowcolegio){
		                            echo "<option value='".$rowcolegio[0]."' id='".$rowcolegio[0]."'>".$rowcolegio[1]."</option>";
	                        }
	                        echo "</select><br><br>";
	                        }
                    ?>
                    <div name="infoColegio" id="infoColegio">
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
        $("#colegio").change(function () {

            $("#colegio option:selected").each(function () {
                id_colegio = $(this).val();
                $.post("infoColegio.php", { id_colegio: id_colegio }, function (data) {
                    $("#infoColegio").html(data);
                });

            });
        })
    });
</script>

