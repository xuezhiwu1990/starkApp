<?php

/**
 * author stark
 * 2020-7-14
 **/	
 
date_default_timezone_set('Asia/Shanghai');
define('STARK', realpath('./'));
define('CORE', STARK.DIRECTORY_SEPARATOR.'core');
define('APP', STARK.DIRECTORY_SEPARATOR.'app');
define('MODULE', 'app');
include './vendor/autoload.php'; //引入compser

//dev web6 use Whoops
if( $_SERVER['SERVER_ADDR'] == '127.0.0.1' ){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}



define('DEBUG', true);
if(DEBUG){
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}

// use common function 
include CORE.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'function.php';
include CORE.DIRECTORY_SEPARATOR.'stark.php';
spl_autoload_register('\core\stark::Autoload');
\core\stark::run();