<?php

$config = array(
	'dsn'      => 'mysql:dbname=the_movie;host=127.0.0.1',
	'username' => 'root',
	'password' => null
);

// Caso seja o ambiente de produção a configuração é trocada
if(ENV == 'prod'){
	$config['dsn'] 		= '';
	$config['username'] = '';
	$config['password'] = '';
}

return $config;