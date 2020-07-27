<?php
namespace app\controller;
//use core\lib\model;
class indexCtrl extends controller {
	public function index(){
		$model = new \app\model\starkModel();
		$model->getLists();
		//$this->display('index.html');
	}


	public function getTest()
	{
		session_start();
		var_dump($_COOKIE,$_SESSION);
	}

}
