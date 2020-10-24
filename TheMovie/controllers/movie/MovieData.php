<?php

class MovieData{

	private $pdoQuery;

	public function __construct(){ 	
		$this->pdoQuery = new PDOQuery;
	}

	public function searchFilme($id){
        $pdo = array(
            ':id'   => $id,
        );

		
		return $this->pdoQuery->fetchAll('SELECT * FROM filmes WHERE idUsuario = :id ', $pdo);		
	}

}



?>