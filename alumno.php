<?php
    include_once "conexion.php";
    session_start();
    $query = "SELECT * FROM info_gral_estudiantes WHERE no_ctrl = ".$_SESSION['userid'];
    $respuesta=mysql_query($query,$con);
    while ($dato=mysql_fetch_array($respuesta)) {
        $nombre=$dato[2]." ".$dato[3]." ".$dato[4];
        $grado=$dato[6];
        $grupo=$dato[7];
    }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Evaluaci&oacute;n a Docentes - Universidad Tecnol&oacute;gica de Manzanillo</title>
		<meta name="sied" content="sied"/>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/style-index.css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>
	</head>
    
	<body>
		<div id="main">
			<header>
				<div id="logo">
					<div id="logo_text">
						<img src="images/ut.jpg" height="125px" width="250px"/>
						<h1><a href="index.php"><span class="logo_colour"></span></h1></a>
					</div>
				</div>
			</header>

			<div id="info">
				<h3>Bienvenido <?php echo "".$nombre;?>
				<br>Contesta las siguientes preguntas, seg&uacute;n tu criterio.
				<br>Recuerda que el evaluar honestamente ayuda a mejorar el desempe&ntilde;o de tus profesores!</h3>
			</div>

            <div id="test">
            <br><b>Elige al docente que deseas evaluar:<br></b>
            <?php
                $campos=array();
                $query="SELECT `usuarios_administrativos`.`nombreadm`, `asignacion_de_prof_a_materia`.`no_trabajador`,  `asignacion_de_prof_a_materia`.`id_mat`, `materias`.`id_mat`, `materias`.`nombremat`, `asignacion_de_prof_a_materia`.`grado`,`asignacion_de_prof_a_materia`.`grupo` FROM asignacion_de_prof_a_materia, `usuarios_administrativos`, materias WHERE `asignacion_de_prof_a_materia`.`grupo`=".$grupo." AND `asignacion_de_prof_a_materia`.`grado`=".$grado." AND `usuarios_administrativos`.`no_trabajador`= `asignacion_de_prof_a_materia`.`no_trabajador` AND `asignacion_de_prof_a_materia`.`id_mat` = `materias`.`id_mat`";
                $resultado=mysql_query($query, $con);
                $elprofe=0;
                while ($fila = mysql_fetch_array($resultado)) {
                    $elprofe=$fila[1];
                    echo "<br>".$fila[0];
                    echo "<br>".$fila[4];
                    echo "<br><a href='ev-alum.php?no_trabajador=".$elprofe."&no_control=".$_GET['user']."'>Evaluar";
                    echo "<br><br>";
                }
            ?>
			</div>
	</body>
</hmtl>