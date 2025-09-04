<?php
require_once("traits/GuardarFitxer.php");

final class EmpleatTemporal extends Empleat
{
	use GuardarFitxer;
	const SALARI_FIX = 1291.13;

	private DateTimeImmutable $alta;
	private DateTimeImmutable $baixa;

	public function __construct(string $nif, string $nom, int $edat, string $departament, DateTimeImmutable $alta, DateTimeImmutable $baixa)
	{
		parent::__construct($nif, $nom, $edat, $departament);
		$this->setDataAlta($alta);
		$this->setDataBaixa($baixa);
		$this->altaEmpleat();
	}


	public function getDataAlta(): DateTimeImmutable
	{
		return $this->alta;
	}

	public function getDataBaixa(): DateTimeImmutable
	{
		return $this->baixa;
	}

	public function setDataAlta(DateTimeImmutable $alta): void
	{
		$this->alta = $alta;
	}

	public function setDataBaixa(DateTimeImmutable $baixa): void
	{
		$this->baixa = $baixa;
	}

	function calcularSou(): float
	{
		return self::SALARI_FIX;
	}

	function mostrarDades(): string
	{
		return parent::mostrarDades() . " / " . date_format($this->getDataAlta(), "d/m/Y") . " / " . date_format($this->getDataBaixa(), "d/m/Y");
	}

	private function altaEmpleat(): void
	{
		$csv = "Empleat temporal;" . parent::dadesEmpleatCSV() . ";" .  date_format($this->getDataAlta(), "d/m/Y") . ";" . date_format($this->getDataBaixa(), "d/m/Y");
		$this->guardar($csv);
	}
}
