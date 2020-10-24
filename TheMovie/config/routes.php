<?php

// rotas normais
$commonRoutes = array(
	'/'               => 'SiteController/index',
	'Search'		  => 'SiteController/search',
	'Registrar'		  => 'SiteController/register',
	'Login'			  => 'SiteController/login',
	'verifica'		  => "SiteController/verify",
	'Detalhes'		  => "SiteController/details",
	'Favoritos'		  => "SiteController/favoritos",
	'Delete'	      => "MovieController/delete",
	'Logout'		  => 'UserController/logout',
);

// rotas POST
$commonPost = array(
	'search'		=> "SiteController/search",
	'submitUser'	=> "UserController/submitUser",
	'submitFav'		=> "MovieController/submitFav",
);

$commonRoutes = array_merge($commonRoutes, $commonPost);

return $commonRoutes;