<?php
require_once "connexio.php";

class LlibresModel extends Database
{

	public function consultaLlibre($id)
	{
		$sql = "SELECT * FROM libros WHERE idlibro = $id";
		$resultat = $this->connexio->query($sql);
		$llibre = $resultat->fetch_array(MYSQLI_ASSOC);
		if (!$llibre)
			throw new Exception('Llibre inexistent', 404);
		return $llibre;
	}
	public function consultaLlibres()
	{
		$sql = "SELECT * FROM libros ORDER BY titulo;";
		$resultat = $this->connexio->query($sql);
		$llibres = $resultat->fetch_all(MYSQLI_ASSOC);
		return $llibres;
	}
	public function altaLlibre($dades)
	{
		try {
			extract($dades);
			$stmt = $this->connexio->prepare("INSERT INTO libros (titulo, precio, autor, idcategoria) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("sdsi", addslashes($titol), $preu, addslashes($autor), $idcategoria);
			$stmt->execute();
		} catch (Exception $e) {
			if ($e->getCode() == 1062) {
				throw new Exception("Títol duplicat", 400);
			}
			if ($e->getCode() == 1452) {
				throw new Exception('Categoria invàlida', 400);
			}
			throw new Exception($e->getMessage(), 500);
		}

		$files = $this->connexio->affected_rows;
		if (!$files)
			throw new Exception('Llibre inexistent o cap dada modificada', 404);
		return "S'han modificat $files files";
	}
	public function modificacioLlibe($id, $dades)
	{
		try {
			extract($dades);
			$stmt = $this->connexio->prepare("INSERT INTO libros (titulo, precio, autor, idcategoria) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("sdsi", addslashes($titol), $preu, addslashes($autor), $idcategoria);
			$stmt->execute();
		} catch (Exception $e) {
			if ($e->getCode() == 1062) {
				throw new Exception("Títol duplicat", 400);
			}
			if ($e->getCode() == 1452) {
				throw new Exception('Categoria invàlida', 400);
			}
			throw new Exception($e->getMessage(), 500);
		}
		$files = $this->connexio->affected_rows;
		if (!$files)
			throw new Exception('Llibre inexistent o cap dada modificada', 404);
		return "S'han modificat $files files";
	}
	public function baixaLlibre($id)
	{
		$sql = "DELETE FROM libros WHERE idlibro = $id;";
		$this->connexio->query($sql);

		$files = $this->connexio->affected_rows;
		if (!$files)
			throw new Exception('Llibre inexistent', 404);
		return "S'han esborrat $files files";
	}
}
?>