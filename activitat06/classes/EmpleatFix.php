<?php
require_once("traits/GuardarFitxer.php");

final class EmpleatFix extends Empleat
{
	use GuardarFitxer;
	const BASE = 1091.13;
	const COMPLEMENT = 103;

	private int $anyAlta;

	public function __construct(string $nif, string $nom, int $edat, string $departament, int $anyAlta)
	{
		parent::__construct($nif, $nom, $edat, $departament);
		$this->setAnyAlta($anyAlta);
		$this->altaEmpleat();
	}


	public function getAnyAlta(): int
	{
		return $this->anyAlta;
	}

	public function setAnyAlta(int $anyAlta): void
	{
		$this->anyAlta = $anyAlta;
	}

	function calcularSou(): float
	{
		return self::BASE + self::COMPLEMENT * (date("Y") - $this->getAnyAlta());
	}

	function mostrarDades(): string
	{
		return parent::mostrarDades() . " / " . $this->getAnyAlta();
	}

	private function altaEmpleat(): void
	{
		$csv = "Empleat fix;" . parent::dadesEmpleatCSV() . ";" .  $this->getAnyAlta();
		$this->guardar($csv);
	}
}
