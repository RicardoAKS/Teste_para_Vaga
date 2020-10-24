<?php

class MovieController extends Controller
{

    public function submitFav(){

		$id = null;
		$idFilme = $_POST["idFilme"];
		$nome = $_POST['nome'];
		$idUsuario = $_POST['idUsuario'];

		$saveFav = new MovieCrud;
		$saveFav = $saveFav->saveFav($id, $idFilme, $nome, $idUsuario);

		echo json_encode(array(
			'result' => $saveFav,
		));
	}
	
	public function delete()
	{
		$id = $_POST["id"];

		$deleteFav = new MovieCrud;
		$deleteFav = $deleteFav->deleteFav($id);

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/index.php');

	}

}

?>