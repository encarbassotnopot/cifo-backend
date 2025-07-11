<?php
const PREU_NIT = 60;
const PREU_DIA_COTXE = 40;
const DTE_3D_COTXE = 20;
const DTE_7D_COTXE = 50;
const PREU_AVIO = ["Madrid" => 150, "París" => 250, "Los Angeles" => 450, "Roma" => 200];
const CIUTATS = ["Madrid", "París", "Los Angeles", "Roma"];

if (isset($_POST['enviar'])) {

	try {
		$dies_hotel = filter_input(INPUT_POST, "nits", FILTER_VALIDATE_INT, ["min_range" => "1"]);
		if (!is_int($dies_hotel))
			throw new Exception("S'ha d'indicar una quantitat de nits i aquesta ha de ser major a 0");
		$preu_estada = $dies_hotel * PREU_NIT;
	} catch (Exception $error) {
		$errors[] = $error->getMessage();
	}

	try {
		$ciutat = $_POST["ciutat"];
		if (!in_array($ciutat, CIUTATS))
			throw new Exception("S'ha de seleccionar una destinació de la llista.");
		$preu_vol = PREU_AVIO[$ciutat];
	} catch (Exception $error) {
		$errors[] = $error->getMessage();
	}

	try {
		$dies_cotxe = filter_input(INPUT_POST, "cotxe", FILTER_VALIDATE_INT, ["min_range" => "0", "max_range" => $dies_hotel]);
		$preu_cotxe = calculPreuCotxe($dies_cotxe);
		if (!is_int($dies_cotxe))
			throw new Exception("S'ha d'indicar quants dies es vol llogar el cotxe. No pot ser negatiu ni més dies que dura l'estada");
	} catch (Exception $error) {
		$errors[] = $error->getMessage();
	}

	if (!$errors)
		$preu = $preu_cotxe + $preu_estada + $preu_vol;
}

function calculPreuCotxe(int $dies)
{
	$preu = $dies * PREU_DIA_COTXE;
	if ($dies >= 7)
		$preu -= DTE_7D_COTXE;
	else if ($dies >= 3)
		$preu -= DTE_3D_COTXE;
	return $preu;
}
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
					<input type="number" class="form-control" name="nits" id="nits" value="<?= $dies_hotel ?>">
				</div>
			</div>
			<div class="row mb-3">
				<label for="ciutat" class="col-sm-3 col-form-label">Destí:</label>
				<div class="col-sm-9">
					<select class="form-select" name='ciutat'>
						<option selected value=''>Selecciona un destí</option>
						<option <?php if ($ciutat === "Madrid") echo "selected"; ?>>Madrid</option>
						<option <?php if ($ciutat === "París") echo "selected"; ?>>París</option>
						<option <?php if ($ciutat === "Los Angeles") echo "selected"; ?>>Los Angeles</option>
						<option <?php if ($ciutat === "Roma") echo "selected"; ?>>Roma</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
				<label for="cotxe" class="col-sm-3 col-form-label">Dies lloguer cotxe:</label>
				<div class="col-sm-9">
					<input type="number" class="form-control" name="cotxe" id="cotxe" value="<?= $dies_cotxe ?>">
				</div>
			</div>
			<label class="col-sm-3 col-form-label"></label>
			<button type="submit" class="btn btn-primary" name='enviar'>Envia les dades</button>
			<button type="submit" class="btn btn-success" name='neteja'>Neteja el formulari</button>
			<br><br>
			<div class="row mb-3">
				<label class="col-sm-3 col-form-label">Cost total: </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="total" id="total" value="<?= $preu ?>" disabled>
				</div>
			</div><br>
			<span class='errors'>
				<?php
				foreach ($errors as $error) {
					echo "<p class='error'>", $error, "</p>";
				}
				?>
			</span>
		</form>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>