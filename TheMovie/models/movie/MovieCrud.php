<?php

class MovieCrud
{
	private $pdoCrud;
	private $table = 'filmes';

	public function __construct()
	{
		$this->pdoCrud = new PDOCrud;
	}

	public function saveFav($id=null, $idFilme, $nome, $idUsuario)
	{
		$pdo = array(
            ':idFilme'           => $idFilme,
			':nome'		    => $nome,
			':idUsuario'	=> $idUsuario,
		);

		$columns = 'idFilme, nome, idUsuario';
		$values = ':idFilme, :nome, :idUsuario';

		return $this->pdoCrud->insert($this->table, $columns, $values, $pdo);
	}
	
	public function deleteFav($id)
	{
		return $this->pdoCrud->delete($this->table, $id);
	}
}
?>