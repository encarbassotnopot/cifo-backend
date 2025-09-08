<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
class Database
{
	protected $connexio;
	public function __construct()
	{
		$this->connexio = new mysqli('127.0.0.1', 'root', 'pass', 'biblioteca');
		$this->connexio->set_charset('utf8');
	}
}
?>