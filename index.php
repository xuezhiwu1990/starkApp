<?php

/**
 * author @stark
 * 入口文件
 * 1.定义常量
 * 2.加载函数库
 * 3.启动框架
 **/



date_default_timezone_set('Asia/Shanghai');
define('STARK', realpath('./'));
define('CORE', STARK.DIRECTORY_SEPARATOR.'core');
define('APP', STARK.DIRECTORY_SEPARATOR.'app');
define('MODULE', 'app');
include './vendor/autoload.php';

define('DEBUG', true);
if(DEBUG){
	ini_set('display_error', 'On');
}else{
	ini_set('display_error', 'Off');
}

if($_SERVER['REMOTE_ADDR'] == '127.0.0.1' && DEBUG == true ){
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}
wwww();
include CORE.DIRECTORY_SEPARATOR.'common'.DIRECTORY_SEPARATOR.'function.php';
include CORE.DIRECTORY_SEPARATOR.'stark.php';
spl_autoload_register('\core\stark::load');
\core\stark::run();