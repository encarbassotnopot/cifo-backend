<?php

?>
<!DOCTYPE html>
<html lang="ca">

<head>
	<meta charset="UTF-8">
	<title>PLA02</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estils.css">
</head>

<body>
	<main>
		<h1 class='centrar'>PLA02: COST HOTEL</h1>
		<br>
		<form method="post" action="#">
			<div class="row mb-3">
				<label for="nits" class="col-sm-3 col-form-label">Número de nits:</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="nits" id="nits">
				</div>
			</div>
			<div class="row mb-3">
				<label for="ciutat" class="col-sm-3 col-form-label">Destí:</label>
				<div class="col-sm-9">
					<select class="form-select" name='ciutat'>
						<option selected value=''>Selecciona un destí</option>
						<option>Madrid</option>
						<option>París</option>
						<option>Los Angeles</option>
						<option>Roma</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="cotxe" class="col-sm-3 col-form-label">Dies lloguer cotxe:</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="cotxe" id="cotxe">
				</div>
			</div>
			<label class="col-sm-3 col-form-label"></label>
			<button type="submit" class="btn btn-primary" name='enviar'>Enviar dades</button>
			<br><br>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Cost total: </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="total" id="total" disabled>
				</div>
			</div><br>
			<span class='errors'></span>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>