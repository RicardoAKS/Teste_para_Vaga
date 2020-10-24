<?php

$paths = array(
  'controllers',
  'controllers/site',
  'controllers/user',
  'controllers/movie',
  'helpers',
  'models',
  'models/db',
  'models/user',
  'models/movie',
);

spl_autoload_register(function($classname) use ($paths){

  $found = false;

  foreach($paths as $path){

    $file = $path . DIRECTORY_SEPARATOR . $classname . '.php';

    if(file_exists($file)){
      require $file;
      $found = true;
      break;
    }

  }

  if(!$found){
    exit('Class ' . $classname . ' not found.');
  }

});