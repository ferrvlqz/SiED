<!DOCTYPE HTML>
<html>
	<head>
		<title>Sistema de Evaluaci&oacute;n a Docentes - Universidad Tecnol&oacute;gica de Manzanillo</title>
		<meta name="sied" content="sied"/>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/style-login.css"/>
	</head>

	<body>
		<div id="main">
			<header>
				<div id="logo">
					<div id="logo_text">
						<img src="images/ut.jpg" height="125px" width="250px" /></h1>
						<h1><a href="index.php"><span class="logo_colour"></span></a>
					</div>
				</div>
			</header>

			<div id="welcome">
				<h6>Bienvenido a SiED, Sistema de Evaluaci&oacute;n a Docentes</h6>
			</div>
				<div id="login">
					<h4><b>INGRESAR<b><br>(DOCENTES)</b></h4>
					<form action="login-doc.php" method="post">
						<div><input class="textbox" name="user" type="text" placeholder="No. de control"></div>
                		<div><input class="textbox" name="password" type="password" placeholder="Contrase&ntilde;a"></div>
                		<div><input id="botton" name="enviar" type="submit" value="Entrar"></div>
                	</form>
                	<a href="">¿Olvid&oacute; su contrase&ntilde;a?</a>
            	</div>
		</div>

		<footer>
			© Derechos reservados 2014. Universidad Tecnol&oacute;gica de Manzanillo.
	    	Camino Hacia Las Humedades S/N, 28869, Manzanillo, Col. México.
		</footer>
	</body>
</html>