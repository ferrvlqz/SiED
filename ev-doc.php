<?php
include_once "conexion.php";
session_start();
if (isset($_POST['save_test'])) {
	$R=$_POST['R'];
	$user=$_SESSION['userid'];
	
	$exito = false;
	for ($i = 0; $i < 18; $i++) {
		$query = "INSERT INTO evaluaciones VALUES(NULL, 1, $user, 'doc', ".($i + 1).", ".$R[$i].", $user, 0)";
		$exito = mysql_query($query, $con);
		if ($exito == false) break;
	}

	?>

	<script>
		var pagina="docente.php?user=<?php echo"".$user?>";
		function redireccionar() {
			location.href=pagina;
		} 
		setTimeout ("redireccionar()", 2500);
	</script>

	<?php

	if ($exito) {
		echo "<div><center><b>Haz guardado!</b></center></div>";
	}
	else {
		echo "ups!: ERROR: contacta al administrador del sistema";//.mysql_error();
	}
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Evaluaci&oacute;n a Docentes - Universidad Tecnol&oacute;gica de Manzanillo</title>
		<meta name="sied" content="sied"/>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>
	</head>
    
	<body>
		<div id="main">
			<header>
				<div id="logo">
					<div id="logo_text">
						<img src="images/ut.jpg" height="125px" width="250px"/>
						<a href="index.php"><span class="logo_colour"></span></a>
					</div>
				</div>
			</header>

			<div id='cuestionario'>
				<form action="ev-doc.php" method="post">
					<?php
						require_once 'preguntas.php';

						for ($i=0; $i < sizeof($AUTOEVALUACION); $i++) { 
							$num = $i + 1;
							$pregunta = $AUTOEVALUACION[$i];
					?>

					<div id='preg'><br><?php echo "$num. $pregunta"; ?></div>
					<div id='resp'><select class='opt' name='R[]'>
							<option value='5'>Siempre</option> 
					        <option value='4'>Casi siempre</option> 
					        <option value='3'>Algunas veces</option>
					        <option value='2'>Casi nunca</option> 
					        <option value='1'>Nunca</option> 
					    </select></div>
					<?php
						}
					?>

				<div id='preg'><br>19. Comentarios o sugerencias</div>
					<div id='resp'><input type="text" name="R[]" id="campotexto" placeholder="Inserta un comentario"></div>
					<br><br><input name="save_test" type="submit" id="boton" value="Guardar">
			</form>
			</div>
		</div>
	</body>
</html>