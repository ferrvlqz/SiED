<?php
    include_once "conexion.php";
    session_start();
    $query = "SELECT * FROM usuarios_administrativos WHERE no_trabajador = ".$_SESSION['userid'];
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
						<h1><a href="index.php"><span class="logo_colour"></span></a>
					</div>
				</div>
			</header>

			<div id="doc-info">
				<b><h3>Profesor/a: <?php echo "".$nombre;?></h3></b>
				<b><h3>Evaluaron: </h3></b>
				<b><h3>Carrera/s: </h3></b>
				<b><h3>Periodo: </h3></b>
			</div>

			<div id="doc-menu">
				<a href="ev-doc.php?user=<?php echo "".$ctrl;?>" id="menu">REALIZAR AUTOEVALUACI&Oacute;N</a>
				<a href="resultado.php" id="menu">VER MIS RESULTADOS</a>
			</div>
		</div>
	</body>
</hmtl>