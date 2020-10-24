<?php

class UserController extends Controller
{

    public function submitUser(){

		$id = null;
		$name = $_POST['nome'];
		$senha = $_POST['senha'];
		$senhaCripto = md5(md5($senha));

		$saveUser = new UserCrud;
		$saveUser = $saveUser->saveUser($id, $name, $senhaCripto);

		echo json_encode(array(
			'result' => $saveUser,
		));
    }
    
    public function login(){
        $this->setLayout('site/shared/layout.php');
		$this->view('site/user/login/index.php');
    }

    public function valida(){
        $this->setLayout('site/shared/layout.php');
		$this->view('site/user/valida/index.php');
	}
	
	public function logout()
	{	
		session_start();
		unset($_SESSION["User"]);
		session_destroy();
		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/index.php');
	}

}

?>