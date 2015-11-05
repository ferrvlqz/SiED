<?php
    include_once "conexion.php";
    session_start();
    $query = "SELECT * FROM `usuarios_administrativos` WHERE no_trabajador = ".$_SESSION['userid'];
    $respuesta=mysql_query($query,$con);
    while ($dato=mysql_fetch_array($respuesta)) {
        $nombre=$dato[1];
        $ctrl=$dato[0];
    }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Evaluaci&oacute;n a Docentes - Universidad Tecnol&oacute;gica de Manzanillo</title>
		<meta name="sied" content="sied"/>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/style-index.css"/>
	</head>

	<body>
		<div id="main">
			<header>
				<div id="logo">
					<div id="logo_text">
						<img src="images/ut.jpg" height="125px" width="250px"/></h1>
						<h1><a href="index.html"><span class="logo_colour"></span></a>
					</div>
				</div>
			</header>
			<div id="info">
				<a href="logout.php">SALIR</a>
			</div>

			<div id="dir-list">
				<b><h1>LISTA RESULTADOS</h1></b>
	
				<?php
				require_once 'preguntas.php';
				require_once "TeacherResults.php";

				$teacherId = $_SESSION['userid'];
				$results = new TeacherResults($teacherId);
				?>

				<div style="background: white; padding: 1em">
					<h4>Evaluación de alumnos</h4>
					<center>
						<?php
						$asignatures = $results->getResultsByAsignaturesFor('alum');
						foreach ($asignatures as $asignature => $values) {
							echo "<h3>".$asignature."</h3>";
							echo resultsTableFor($values, $PREGUNTAS_A);
						}
						?>
					</center>
				</div>


				<div style="background: white; padding: 1em">
					<h4>Evaluación de Director de Carrera</h4>
					<center>
						<?php echo resultsTableFor($results->getResultsFor('dir'), $PREGUNTAS_D); ?>
					</center>
				</div>

				<div style="background: white; padding: 1em">
					<h4>Autoevaluaci&oacute;n</h4>
					<center>
						<?php echo resultsTableFor($results->getResultsFor('doc'), $AUTOEVALUACION); ?>
					</center>
				</div>

			</div>
		</div>
	</body>
</html>

<?php
function resultsTableFor($answers, $preguntas) { 
	if (sizeof($answers) <= 0 ) {
		echo 'Aún no ha se ha realizado esta evaluación.';
		return;
	} ?>
	<table style="margin-bottom: 1.5em" border="1" cellpadding="5">
		<tr>
			<th>Pregunta</th>
			<th>Siempre</th>
			<th>Casi siempre</th>
			<th>Algunas veces</th>
			<th>Casi nunca</th>
			<th>Nunca</th>
			<th>Promedio</th>
		</tr>
		<?php
		require_once 'Averager.php';
		$averager = new Averager();
		$averages = $averager->getAveragesFor($answers);
		$sumaDeAverages = 0;
		for ($i=0; $i < sizeof($answers); $i++) { 
			$pregunta = $preguntas[$i];
			$answerData = $answers[$i];
			echo '<tr style="text-align: center">';
			echo 	"<td>$pregunta</td>";
			echo 	"<td>".$answerData['Siempre']."</td>";
			echo 	"<td>".$answerData['Casi siempre']."</td>";
			echo 	"<td>".$answerData['Algunas veces']."</td>";
			echo 	"<td>".$answerData['Casi nunca']."</td>";
			echo 	"<td>".$answerData['Nunca']."</td>";
			echo  "<td>".$averages[$i]."</td>";
			echo '</tr>';
			$sumaDeAverages += $averages[$i];
		}
		?>
		<tr>
			<th colspan="6" style="text-align: right">Promedio:</th>
			<th><?php echo round($sumaDeAverages / sizeof($averages), 1); ?></th>
		</tr>
	</table>
<?php
}
?>
