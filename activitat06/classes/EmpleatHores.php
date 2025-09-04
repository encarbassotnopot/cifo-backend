<?php
require_once("traits/GuardarFitxer.php");

final class EmpleatHores extends Empleat
{
	use GuardarFitxer;
	const PREU_HORA = 8.13;

	private int $hores;

	public function __construct(string $nif, string $nom, int $edat, string $departament, int $hores)
	{
		parent::__construct($nif, $nom, $edat, $departament);
		$this->setHores($hores);
		$this->altaEmpleat();
	}


	public function getHores(): int
	{
		return $this->hores;
	}

	public function setHores(int $hores): void
	{
		$this->hores = $hores;
	}

	function calcularSou(): float
	{
		return self::PREU_HORA * $this->getHores();
	}

	function mostrarDades(): string
	{
		return parent::mostrarDades() . " / " . $this->getHores();
	}

	private function altaEmpleat(): void
	{
		$csv = "Empleat hores;" . parent::dadesEmpleatCSV() . ";" .  $this->getHores();
		$this->guardar($csv);
	}
}
