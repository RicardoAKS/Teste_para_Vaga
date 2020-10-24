<?php

class UserData{

	private $pdoQuery;

	public function __construct(){ 	
		$this->pdoQuery = new PDOQuery;
	}

	public function searchUser(){
		
		return $this->pdoQuery->fetchAll('SELECT * FROM usuarios');		
	}

}



?>