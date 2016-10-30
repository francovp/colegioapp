<?php
include_once("conexion.php");
$obj=new conexion();
$con=$obj->conectar();

$html = '';
$id_colegio = $_POST['id_colegio'];

$querycolegio="SELECT * from Colegio where id='$id_colegio';";
$listadocolegio=$obj->ejecutarCONSULTA($querycolegio, $con);
echo "<strong>Información de este colegio: </strong><br><br>";
?>
<canvas id="chart-area" width="300" height="300"></canvas>
<script>
var lineChartData = {
			labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
			datasets : [
				{
					label: "Primera serie de datos",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "#6b9dfa",
					pointColor : "#1e45d7",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [90,30,10,80,15,5,15]
				},
				{
					label: "Segunda serie de datos",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "#e9e225",
					pointColor : "#faab12",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [40,50,70,40,85,55,15]
				}
			]

		}
var ctx = document.getElementById("chart-area").getContext("2d");
var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx4 = document.getElementById("chart-area4").getContext("2d");
window.myPie = new Chart(ctx).Pie(pieData);	
window.myPie = new Chart(ctx2).Doughnut(pieData);				
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
</script>
<?php
echo $html;
?>