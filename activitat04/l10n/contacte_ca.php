<!DOCTYPE html>
<html>

<head>
	<title>IEM</title>
	<meta charset="UTF-8">
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="css/page.css" type="text/css" />
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script src="js/page.js" type="text/javascript"></script>
	<script src="js/text_ca.js" type="text/javascript"></script>
	<script src="js/form.js" type="text/javascript"></script>
</head>

<body>
	<?php require("./components/header.php"); ?><br>
	<div class="wraper">
		<?php require("./components/nav.php"); ?>

		<div class="content">
			<div class="slider">
				<img src="img/iem_3.jpg" /><img src="img/iem_4.jpg" />
			</div>

			<div class="sections">
				<h1 style="text-align:center">LOCALITZACIÓ DEL CENTRE I CONTACTE</h1><br><br>
				<div class="contacto">
					<h2>CONTACTE</h2>
					<p>Els camps marcats amb * son obligatoris..</p><br>
					<form id="form" name="form" method="get" action='#'>
						<label for="nombre">Nom: * </label><input type="text" name="nombre" autofocus id="nombre" /><br><br>
						<label for="email">Email: * </label><input type="email" name="email" id="email" placeholder="nom@mail.com" /><br><br>
						<label for="telefono">Telèfon: </label><input type="tel" name="telefono" id="telefono"><br><br>
						<label>Missatge: *</label><br><br>
						<textarea id="mensaje" name="mensaje" placeholder="Introdueixi aquí la seva pregunta o comentari"></textarea><br><br>
						<span>He llegit i accepto la política de privacitat:</span><br><br>
						<input id="privacidad" type="checkbox" name="privacidad">&nbsp&nbsp
						<span id='ver' onclick="muestraAlert()">Veure aquí</span><br><br>
						<input id="enviar" type="button" name="enviar" value="Enviar" onclick="validaFormulario()" /><br>
					</form>

					<div id="alerta">
						<span id="alertatext">En compliment de la LLei Orgànica 15/1999, de 13 de decembre, de Protecció de Dades de Caràcter Personal (LOPD), l'informem que les dades de caràcter personal que vostè ens comuniqui mitjançant aquest formulari de contacte seràn confidencials i, sota cap concepte seràn transmeses a terceres persones.<br><br>
							<input type="button" onclick="ocultaAlert()" />
					</div>
				</div>
			</div>
			<br><br>
		</div>

		<?php require("./components/footer.php"); ?>
	</div>
</body>

</html>