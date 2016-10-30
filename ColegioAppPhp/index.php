<?php
    include('_Layout.php');
    include('modalListadoColegios.php');
    include('modalInfoColegio.php');
?>

<script src="Scripts/Chart.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

<?php
	//Se verifica Si está iniciada la sesión
	if (isset($_SESSION)){
		$session = $_SESSION["session"];
		// Si "Recuerdame" está activado se redirije al Perfil
		if($session)
		{
			header ("Location: perfil.php");
		}
        // Si "Recuerdame" no está activado, se destruirá la sesión.
	    else{
		    // Destruir todas las variables de sesión.
		    $_SESSION = array();
		    // Borrar la cookie de sesión.
		    if (ini_get("session.use_cookies")) {
			    $params = session_get_cookie_params();
			    setcookie(session_name(), '', time() - 42000,
				    $params["path"], $params["domain"],
				    $params["secure"], $params["httponly"]
			    );
		    }
		    if (strlen(session_id())){
		    // Finalmente, destruir la sesión.
			    session_destroy();
		    }
	    }
	}
?>

<!-- Botón para mostrar Listado de Colegios -->
	<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modalListadoColegios">
	<strong>Ver Listado de Colegios</strong></button><br><br>

<!-- Botón para mostrar Listado de Colegios -->
	<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modalInfoColegio">
	<strong>Ver Información de un Colegio</strong></button><br><br>
	
<!-- Botón para mostrar Gráfico -->
	<button type="button" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modalGrafico">
	<strong>Ver gráfico de colegios</strong></button><br><br>

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

        //$("#prueba").change(function () {

        //    $("#prueba option:selected").each(function () {
        //        id_prueba = $(this).val();
        //        $.post("colegio.php", { id_prueba: id_prueba }, function (data) {
        //            $("#colegio").html(data);
        //        });

        //    });
        //})

        $("#prueba").change(function () {

            $("#prueba option:selected").each(function () {
                id_prueba = $(this).val();
                $.post("infoColegio.php", { id_prueba: id_prueba }, function (data) {
                    $("#infoColegio").html(data);
                });

            });
        })
    });
</script>

<?php
	include('_Footer.php');
?>

