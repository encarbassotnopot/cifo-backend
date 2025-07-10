<?php
$errors = array();
// recollida de dades del formulari
$nif = $_POST['nif'] ?? null;
$nom = $_POST['nom'] ?? null;
$cognoms = $_POST['cognoms'] ?? null;
$email = $_POST['email'] ?? null;
$nota = filter_input(INPUT_POST, 'nota', FILTER_VALIDATE_FLOAT);
$missatge = $_POST['missatge'] ?? null;

// validació de camps obligatoris
if (empty($nif)) {
	$errors[] = "El NIF és obligatori.";
}
if (empty($nom)) {
	$errors[] = "El nom és obligatori.";
}
if (empty($cognoms)) {
	$errors[] = "Els cognoms són obligatoris.";
}
if (empty($email)) {
	$errors[] = "El correu electrònic és obligatori.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	$errors[] = "El correu electrònic no és vàlid.";
}
if (empty($missatge)) {
	$errors[] = "El missatge és obligatori.";
}

if ($nota === null) {
	$errors[] = "La nota és obligatòria.";
} else if ( $nota === false )
{
	$errors[] = "La nota ha de ser un número.";
} else {
	// conversió de nota a qualificació
	if ($nota < 0 || $nota > 10) {
		$nota = null; // ens assegurem que la nota no es mostra si queda fora de rang
		$errors[] = "La nota ha d'estar compresa entre 0 i 10.";
	} else if ($nota < 5) {
		$qualificacio = "Suspès";
	} else if ($nota < 7) {
		$qualificacio = "Aprovat";
	} else if ($nota < 9) {
		$qualificacio = "Notable";
	} else {
		$qualificacio = "Excel·lent";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>PLA01</title>
	<link rel="stylesheet" type="text/css" href="css/estils.css?v=1.0">
</head>

<body>
	<div class='container'>
		<h1 class='centrar'>PLA01: MOSTRAR DADES</h1>
		<div class='card'>
			<input type="text" placeholder="nif" disabled value='<?php echo $nif?>'><br><br>
			<input type="text" placeholder="nom" disabled value='<?php echo $nom?>'>
			<input type="text" placeholder="cognoms" disabled value='<?php echo $cognoms?>'><br><br>
			<input type="text" placeholder="qualificació" disabled value='<?php echo $qualificacio?>'>
			<?php 
				for ($i = 1; $i <= $nota && $i <= 4; $i++) {
					echo "<aside class='roig'></aside>";
				}
				for ($i = 5; $i <= $nota && $i <= 6; $i++) {
					echo "<aside class='groc'></aside>";
				}
				for ($i = 7; $i <= $nota && $i <= 8; $i++) {
					echo "<aside class='verd'></aside>";
				}
				for ($i = 9; $i <= $nota && $i <= 10; $i++) {
					echo "<aside class='blau'></aside>";
				}
			?>
			<br><br>
			<input type="text" placeholder="email" disabled value='<?php echo $email?>'><br><br>
			<textarea cols='22' rows='5' disabled><?php echo $missatge?></textarea>
			<p class='errors'>
				<?php
				foreach ($errors as $error) {
					echo "<p class='error'>", $error, "</p>";
				}
				?>
			</p>
		</div>
	</div>
</body>

</html>