<?php

class SiteController extends Controller
{

	public function index()
	{		

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/index.php');

	}

	public function search()
	{
		$this->setLayout('site/shared/layout.php');
		$this->view('site/search/index.php');
	}

	public function register()
	{
        $this->setLayout('site/shared/layout.php');
		$this->view('site/user/register/index.php');
	}
	
	public function login(){

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/login/index.php');

	}

	public function verify(){
		$nome = $_POST["nome"];
		$senha = md5(md5($_POST["senha"]));
		$searchUser = new UserData;
		$searchUser = $searchUser->searchUser();

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/verify/index.php', array(
			"list" => $searchUser,
		));

	}

	public function details()
	{		

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/details/index.php');

	}

	public function favoritos()
	{
		if(isset($_POST["idUsuario"])){
			$id = $_POST["idUsuario"];
		}else{
			$id = "0";
		}
		$searchFilme = new MovieData;
		$searchFilme = $searchFilme->searchFilme($id);

		$this->setLayout('site/shared/layout.php');
		$this->view('site/user/FilmesFav/index.php', array(
			'lists' => $searchFilme,
		));

	}

}