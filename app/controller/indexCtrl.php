<?php
namespace app\controller;
//use core\lib\model;
class indexCtrl extends controller {
	public function index(){
		// $model = new \app\model\starkModel();
		// $model->getLists();
		//$this->display('index.html');
		var_dump($_COOKIE);
	}


	public function getTest()
	{
		session_start();
$accountInfo = [ '1111' ,2222];
$key = 1;
$time = time() + 60*10;
		setcookie("Auth_".$key, base64_encode(json_encode($accountInfo)), $time,'/','.stark.com',false);
        setcookie("ZhiD_Token", base64_encode(json_encode($accountInfo)), $time,'/','.stark.com',false);
		var_dump($_COOKIE,$_SESSION);
	}

}







