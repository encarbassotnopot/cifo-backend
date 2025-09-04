<?php

final class Administracio
{
	public static function consultaEmpleats(): array
	{
		$fitxer = fopen("fitxers/empleats.csv", "r");
		while (!feof($fitxer)) {
			$empleats[] = fgetcsv($fitxer, 0, ";");
		}
		return $empleats;
	}
}
