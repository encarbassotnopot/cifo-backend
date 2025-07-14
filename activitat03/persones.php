<?php
//Extreure les dades de la variable de sessió que utilitzarem en el document html
session_start();
$persones = $_SESSION["persones"] ?? [];
ksort($persones);
if (isset($_SESSION["dades"])) extract($_SESSION["dades"]);
?>
<html>

<head>
	<title>PLA03: GESTIÓ DE PERSONES</title>
	<meta charset='UTF-8'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estils.css">
</head>

<body>
	<main>
		<h1 class='centrar'>PLA03: GESTIÓ DE PERSONES</h1>
		<br>
		<form method='post' action='serveis/alta_persona.php'>
			<div class="row mb-3">
				<label for="nif" class="col-sm-2 col-form-label">NIF</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nif" name="nif" value='<?= $nif ?? null; ?>'>
				</div>
			</div>
			<div class="row mb-3">
				<label for="nom" class="col-sm-2 col-form-label">Nom</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nom" name="nom" value='<?= $nom ?? null; ?>'>
				</div>
			</div>
			<div class="row mb-3">
				<label for="direccio" class="col-sm-2 col-form-label">Adreça</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="direccio" name="direccio" value='<?= $direccio ?? null; ?>'>
				</div>
			</div>
			<label for="nom" class="col-sm-2 col-form-label"></label>
			<button type="submit" class="btn btn-success" name=' alta'>Alta persona</button>
			<br><br>
			<span><?= $missatge ?? null ?></span>
		</form><br>

		<table class="table table-striped">
			<tr class='table-dark'>
				<th scope="col">NIF</th>
				<th scope="col">Nom</th>
				<th scope="col">Adreça</th>
				<th scope="col"></th>
			</tr>
			<?php

			?>
			<?php foreach ($persones as $nif => $persona) : ?>
				<tr>
					<td><input type='text' value='<?= $nif ?>' class='nif' disabled></td>
					<td><input type='text' value='<?= $persona['nom'] ?>' class='nom'></td>
					<td><input type='text' value='<?= $persona['direccio'] ?>' class='direccio'></td>
					<td>
						<form method='post' action='serveis/baixa_persona.php'>
							<input type='hidden' name='nifBaixa' value='<?= $nif ?>'>
							<button type="submit" class="btn btn-warning" name='baixaPersona'>Baixa</button>
						</form>
						<button type="button" class="btn btn-primary" name='modiPersona' onclick="modificarPersones(this)">Modificar</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>

		<form method='post' action='serveis/baixa_persones.php' id='formulariobaixa'>
			<input type='hidden' id='baixa' name='baixa'></input>
			<button type="submit" class="btn btn-danger" id='baixa' name='baixa'>Baixa persones</button>
		</form>

		<!--FORMULARI OCULT PER A LA MODIFICACIÓ-->
		<form method='post' action='serveis/modificacio_persona.php' id='formulariModi'>
			<input type='hidden' name='nifModi'>
			<input type='hidden' name='nomModi'>
			<input type='hidden' name="direccioModi">
			<input type='hidden' name='modificar'>
		</form>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src='js/scripts.js'></script>
</body>

</html>
<?php echo ("<pre>" . print_r($_SESSION, true) . "</pre>"); ?>