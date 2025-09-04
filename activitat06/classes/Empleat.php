<?php

abstract class Empleat
{

	private string $nif;
	private string $nom;
	private int $edat;
	private string $departament;


	public function __construct(string $nif, string $nom, int $edat, string $departament)
	{
		$this->setNif($nif);
		$this->setNom($nom);
		$this->setEdat($edat);
		$this->setDepartament($departament);
	}

	// getters
	public function getNif(): string
	{
		return $this->nif;
	}

	public function getNom(): string
	{
		return $this->nom;
	}

	public function getEdat(): int
	{
		return $this->edat;
	}

	public function getDepartament(): string
	{
		return $this->departament;
	}

	// setters
	public function setNif(string $nif): void
	{
		$this->nif = $nif;
	}
	public function setNom(string $nom): void
	{
		$this->nom = $nom;
	}

	public function setEdat(int $edat): void
	{
		$this->edat = $edat;
	}

	public function setDepartament(string $departament): void
	{
		$this->departament = $departament;
	}

	abstract function calcularSou(): float;

	public function mostrarDades(): string
	{
		return "Dades: " . $this->getNif() . " / " . $this->getNom() . " / " . $this->getEdat() . " / " . $this->getDepartament();
	}

	protected function dadesEmpleatCSV(): string
	{
		return $this->getNif() . ";" . $this->getNom() . ";" . $this->getEdat() . ";" . $this->getDepartament();
	}
}
