<?php
	session_start();
	include_once "conexion.php";
	if (isset ($_POST['enviar'])){

	function verificar_login($user,$password,$result) {
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$sql = "SELECT * FROM usuarios WHERE no_ctrl = '$user' and pass = '$password'";
    	$rec = mysql_query($sql) or die ("fallo mysql_query".mysql_error());
		$result=mysql_num_rows($rec);
		return $result;
	}
		if(verificar_login($_POST['user'],$_POST['password'],$result) == 1) {
			$_SESSION['userid'] = $_POST['user'];//$result->idusuario;
			header("location:docente.php?user=".$_POST['user']);
		}

		else {
			echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';
        }
	}
?>