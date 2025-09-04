<?php
//trunquem el fitxer, així no s'acomulen noves entrades dels mateixos empleats en cada càrrega
$fitxer = fopen("fitxers/empleats.csv", "w");
fclose($fitxer);

//incorporar els fitxers amb les classes
require_once("classes/Empleat.php");
require_once("classes/Administracio.php");
require_once("classes/EmpleatFix.php");
require_once("classes/EmpleatHores.php");
require_once("classes/EmpleatTemporal.php");

//instanciar un empleat amb cada classe
try {
	$eFix = new EmpleatFix("12345678A", "Laura", 25, "IT", 2020);
} catch (Error $error) {
	$errors[] = $error->getMessage();
}

try {
	$eHores = new EmpleatHores("23456789B", "Marta", 30, "Legal", 20);
} catch (Error $error) {
	$errors[] = $error->getMessage();
}

try {
	$eTemporal = new EmpleatTemporal("34567890C", "Jordi", 23, "Compres", new DateTimeImmutable("2025-04-21"), new DateTimeImmutable("2025-09-21"));
} catch (Error $error) {
	$errors[] = $error->getMessage();
}

//exemple d'error
try {
	$eError = new EmpleatHores("23456789B", null, 30, "Legal", 20);
} catch (Error $error) {
	$errors[] = $error->getMessage();
}


//consulta de tots els empleats
$empleats = Administracio::consultaEmpleats();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>POO</title>
	<style type="text/css">
		.empleats {
			width: 500px;
			padding: 10px;
			border: 2px solid grey;
			margin: auto;
			margin-bottom: 10px;
			background-color: lightblue;
		}

		.errors {
			width: 500px;
			padding: 10px;
			border: 2px solid grey;
			margin: auto;
			margin-bottom: 10px;
			background-color: orange;
		}

		table,
		td {
			border: 1px solid grey;
			margin: auto;
			padding: 5px;
		}
	</style>
</head>

<body>
	<div class='empleats'>
		<h3>Treballador Fix</h3>
		<?php
		//mostrar totes les dades del treballador fix
		echo $eFix->mostrarDades();
		echo "<br>Salari: " . $eFix->calcularSou();
		?>
	</div>
	<div class='empleats'>
		<h3>Treballador Hores</h3>
		<?php
		//mostrar totes les dades del treballador hores
		echo $eHores->mostrarDades();
		echo "<br>Salari: " . $eHores->calcularSou();
		?>
	</div>
	<div class='empleats'>
		<h3>Treballador Temporal</h3>
		<?php
		//mostrar totes les dades del treballador temporal
		echo $eTemporal->mostrarDades();
		echo "<br>Salari: " . $eTemporal->calcularSou();
		?>
	</div>
	<?php if (!empty($errors)): ?>
		<div class='errors'>
			<h3>Errors</h3>
			<?php
			foreach ($errors as $error)
				echo $error . "\n";
			?>
		</div>
	<?php endif; ?>
	<table>
		<?php
		foreach (($empleats ?? []) as $empleat) {
			echo "<tr>";
			foreach ($empleat as $dada) {
				echo "<td>$dada</td>";
			}
		}
		?>
	</table>
</body>

</html>