<?php

trait GuardarFitxer
{
	private function guardar(string $csv): void
	{
		$fitxer = fopen("fitxers/empleats.csv", "a");
		fwrite($fitxer, $csv . "\n");
		fclose($fitxer);
	}
}
