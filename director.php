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
				<b><h3>Bienvenido <?php echo "".$nombre;?></b>
				<b><br>Contesta las siguientes preguntas, seg&uacute;n tu criterio.</b>
				<b><br>Recuerda que el evaluar honestamente ayuda a mejorar el desempe&ntilde;o de tus profesores!</b>
				<b><br>S&oacute;lo puedes evaluar una vez a cada profesor!</h3></b>
				<a href="logout.php">SALIR</a>
			</div>

			<div id="dir-list">
				<b><h1>LISTA DE LOS DOCENTES DE SU CARRERA</h1></b>
				<br><b>Elige para evaluar:</b>
				<?php
					$campos=array();
					$query = "SELECT no_trabajador, nombreadm FROM usuarios_administrativos WHERE no_trabajador IN (SELECT asignacion_de_prof_a_materia.no_trabajador FROM usuarios_administrativos JOIN asignacion_de_prof_a_materia ON id_car = id_carrera  WHERE usuarios_administrativos.no_trabajador = ".$ctrl." AND id_periodo = 2)";
					$resultado=mysql_query($query, $con);
					while ($fila = mysql_fetch_array($resultado)) {
						$num=$fila[0];
						$name=$fila[1];
	                    echo "<br>";
	                    echo "<a href='ev-dir.php?no_trabajador=".$num."'>".$name."</a>";
                	}
				?>
			</div>
		</div>
	</body>
</hmtl>