<?php

?>
<html>

<head>
	<title>Banc</title>
	<meta charset='UTF-8'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/estils.css">
</head>

<body>
	<div class='container'>
		<form id='formulari' method='post' action=''>
			<input type='hidden' id='idpersona' name='idpersona' value=''>
			<div class="row mb-3">
				<label for="nif" class="col-sm-2 col-form-label">NIF</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nif" name='nif' value=''>
				</div>
			</div>
			<div class="row mb-3">
				<label for="nom" class="col-sm-2 col-form-label">Nom</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="nom" name="nom" value="">
				</div>
			</div>
			<div class="row mb-3">
				<label for="cognoms" class="col-sm-2 col-form-label">Cognoms</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="cognoms" name="cognoms" value="">
				</div>
			</div>
			<div class="row mb-3">
				<label for="direccio" class="col-sm-2 col-form-label">Direcció</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="direccio" name="direccio" value="">
				</div>
			</div>
			<div class="row mb-3">
				<label for="telefon" class="col-sm-2 col-form-label">Telèfon</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="telefon" name="telefon" value="">
				</div>
			</div>
			<div class="row mb-3">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="email" name="email" value="">
				</div>
			</div>
			<label class="col-sm-2 col-form-label"></label>
			<button type="submit" class="btn btn-success" id='alta' name='peticio' value='alta'>Alta</button>
			<button type="submit" class="btn btn-warning" id='modificacio' name='peticio'
				value='modificacio'>Modificació</button>
			<button type="submit" class="btn btn-danger" id='baixa' name='peticio' value='baixa'>Baixa</button>
			<button type="reset" class="btn btn-success">Neteja</button>
			<label class="col-sm-2 col-form-label"></label>
			<hr>
			<p class='missatges'></p>
		</form><br><br>
		<form method='get' action='' class="d-flex justify-content-center">
			<div class="row col-4 mb-3">
				<label class="form-label">Persones a mostrar</label>
				<select class="form-select" name='mostrar' onchange="this.form.submit()">
					<option>5</option>
					<option>10</option>
					<option>15</option>
					<option>20</option>
				</select>
			</div>
		</form>
		<table id='llistapersones' class="table table-striped">
			<tr class='table-dark'>
				<th>NIF</th>
				<th>nom</th>
				<th>Cognoms</th>
			</tr>
			<tr data-id='id de la persona a mostrar'>
				<td>Nif de la persona</td>
				<td>Nom de la persona</td>
				<td>Cognoms de la persona</td>
			</tr>
		</table>
		<div class="enllacos d-flex justify-content-center">
			<p>
				<a class='ressaltar' href=''>número de pàgina</a>
			</p>
		</div>
	</div>
	</div>
	<form id='formconsulta' method='post' action=''>
		<input type='hidden' name='peticio' value='consulta'>
		<input type='hidden' id='consulta' name='idpersona'>
	</form>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<script type="text/javascript" src='assets/scripts/script.js'></script>
</body>

</html>