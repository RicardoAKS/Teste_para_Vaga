<?php
	$url = $this->helpers['URLHelper']->getURL();
	$location = $this->helpers['URLHelper']->getLocation();
	session_start();
	if(isset($_SESSION["User"])){
    	$user = $_SESSION["User"];
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="HTML, CSS, JS, PHP">
		<meta name="description" content="Descrição do site">
		<meta name="author" content="Code Universe">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="robots" content="index, follow">
		<title>The Movie</title>
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/brands.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/fontawesome/css/solid.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/libs/sweetalert2/dist/sweetalert2.min.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/header.css">
		<link rel="stylesheet" type="text/css" href="<?= $url; ?>/assets/css/site.css">
		<link rel="shortcut icon" href="<?=$url?>/assets/img/favicon.ico" />
	</head>
	<body>
		<header>
			<?php require 'header.php';?>
		</header>
		<main>
			<?php require $file;?>
		</main>
		<footer>
			<?php require 'footer.php';?>
		</footer>

		<script type="text/javascript">
			var URL = '<?= $url ?>';
			var Helpers = {};
		</script>
		<script type="text/javascript" src="<?= $url; ?>/assets/libs/jquery/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/libs/popper/popper.min.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/libs/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/js/site/layout.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/js/site/user.js"></script>
		<script type="text/javascript" src="<?= $url; ?>/assets/js/site/favorito.js"></script>
	</body>
</html>