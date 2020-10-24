<?php

class UserCrud
{
	private $pdoCrud;
	private $table = 'usuarios';

	public function __construct()
	{
		$this->pdoCrud = new PDOCrud;
	}

	public function saveUser($id=null, $name, $senha)
	{
		$pdo = array(
			':nome'		=> $name,
			':senha'	=> $senha,
		);

		$columns = 'nome, senha';
		$values = ':nome, :senha';

		return $this->pdoCrud->insert($this->table, $columns, $values, $pdo);
    }
}
?>